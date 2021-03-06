<?php
if ( ! defined( 'DUPLICATOR_VERSION' ) ) exit; // Exit if accessed directly
require_once (DUPLICATOR_PLUGIN_PATH . 'classes/package.archive.php');

/**
 *  DUP_ZIP
 *  Creates a zip file using the built in PHP ZipArchive class
 */
class DUP_Zip  extends DUP_Archive {
	
	//PRIVATE 
	private static $compressDir;	
	private static $countDirs  = 0;
	private static $countFiles = 0;
	private static $sqlPath;
	private static $zipPath;
	private static $zipFileSize;
	private static $zipArchive;
	
	private static $limitItems = 0;
	private static $networkFlush = false;
	private static $scanReport;
	
	/**
     *  CREATE
     *  Creates the zip file and adds the SQL file to the archive
     */
	static public function Create(DUP_Archive $archive) {
		  try {
		    
			$timerAllStart = DUP_Util::GetMicrotime();
			$package_zip_flush = DUP_Settings::Get('package_zip_flush');
			
			self::$compressDir		= rtrim(DUP_Util::SafePath($archive->PackDir), '/');
			self::$sqlPath			= DUP_Util::SafePath("{$archive->Package->StorePath}/{$archive->Package->Database->File}");
			self::$zipPath			= DUP_Util::SafePath("{$archive->Package->StorePath}/{$archive->File}");
			self::$zipArchive		= new ZipArchive();
			self::$networkFlush		= empty($package_zip_flush) ? false : $package_zip_flush;
			
			$filterDirs = empty($archive->FilterDirs) ? 'not set' : $archive->FilterDirs;
			$filterExts = empty($archive->FilterExts) ? 'not set' : $archive->FilterExts;
			$filterOn   = ($archive->FilterOn) ? 'ON' : 'OFF';
			
			//Load Scan Report
			$json = file_get_contents(DUPLICATOR_SSDIR_PATH_TMP . "/{$archive->Package->NameHash}_scan.json");
			self::$scanReport = json_decode($json);
			
			DUP_Log::Info("\n********************************************************************************");
			DUP_Log::Info("ARCHIVE (ZIP):");
			DUP_Log::Info("********************************************************************************");
			$isZipOpen = (self::$zipArchive->open(self::$zipPath, ZIPARCHIVE::CREATE) === TRUE);
			if (! $isZipOpen){
				DUP_Log::Error("Cannot open zip file with PHP ZipArchive.", "Path location [" . self::$zipPath . "]");
			}
            DUP_Log::Info("ARCHIVE DIR:  " . self::$compressDir);
            DUP_Log::Info("ARCHIVE FILE: " . basename(self::$zipPath));
			DUP_Log::Info("FILTERS: *{$filterOn}*");
			DUP_Log::Info("DIRS:  {$filterDirs}");
			DUP_Log::Info("EXTS:  {$filterExts}");
			
			DUP_Log::Info("----------------------------------------");
			DUP_Log::Info("COMPRESSING");
			DUP_Log::Info("SIZE:\t" . self::$scanReport->ARC->Size);
			DUP_Log::Info("STATS:\tDirs " . self::$scanReport->ARC->DirCount . " | Files " . self::$scanReport->ARC->FileCount . " | Links " . self::$scanReport->ARC->LinkCount);
			
			//ADD SQL 
			$isSQLInZip = self::$zipArchive->addFile(self::$sqlPath, "database.sql");
			if ($isSQLInZip)  {
				DUP_Log::Info("SQL ADDED: " . basename(self::$sqlPath));
			} else {
				DUP_Log::Error("Unable to add database.sql to archive.", "SQL File Path [" . self::$sqlath . "]");
			}
			self::$zipArchive->close();
			self::$zipArchive->open(self::$zipPath, ZipArchive::CREATE);
			
			
			//ZIP DIRECTORIES
			foreach(self::$scanReport->ARC->Dirs as $file){
				$zipPath = ltrim(str_replace(self::$compressDir, '', $file), '/');
				if (! self::$zipArchive->addEmptyDir($zipPath)) {
					if (self::$compressDir != $file)
						DUP_Log::Info("WARNING: Unable to zip directory: '{$file}'");

				} else {
					self::$countDirs++;
				}
			}
		
			//ZIP FILES
			foreach(self::$scanReport->ARC->Files as $file) {
				$zipPath = ltrim(str_replace(self::$compressDir, '', $file), '/');

				if (self::$zipArchive->addFile($file, $zipPath)) {
					self::$limitItems++;
					self::$countFiles++;
				} else {
					DUP_Log::Info("WARNING: Unable to zip file: {$file}");
				}

				if (self::$networkFlush)
					self::flushResponse();
			}

			self::$zipArchive->open(self::$zipPath, ZipArchive::CREATE);
			DUP_Log::Info(print_r(self::$zipArchive, true));

			//--------------------------------
			//LOG FINAL RESULTS
			DUP_Util::FcgiFlush();
            $zipCloseResult = self::$zipArchive->close();
			($zipCloseResult) 
				? DUP_Log::Info("COMPRESSION RESULT: '{$zipCloseResult}'")
				: DUP_Log::Error("ZipArchive close failure.", "This hosted server may have a disk quota limit.\nCheck to make sure this archive file can be stored.");
		
            $timerAllEnd = DUP_Util::GetMicrotime();
            $timerAllSum = DUP_Util::ElapsedTime($timerAllEnd, $timerAllStart);
			
			self::$zipFileSize = @filesize(self::$zipPath);
			DUP_Log::Info("COMPRESSED SIZE: " . DUP_Util::ByteSize(self::$zipFileSize));
            DUP_Log::Info("ARCHIVE RUNTIME: {$timerAllSum}");
        } 
        catch (Exception $e) {
			DUP_Log::Error("Runtime error in package.archive.zip.php constructor.", "Exception: {$e}");
        }
	}
	
	/* This allows the process to not timeout on fcgi 
	* setups that need a response every X seconds */
	private static function flushResponse() {
		//Check if were over our count*/
		if(self::$limitItems > DUPLICATOR_ZIP_FLUSH_TRIGGER) {
			$sumItems = (self::$countDirs + self::$countFiles);
			self::$zipArchive->close();
			self::$zipArchive->open(self::$zipPath);
			self::$limitItems = 0;
			DUP_Util::FcgiFlush();
			DUP_Log::Info("Items archived [{$sumItems}] flushing response.");
		}
	}
	
}
?>