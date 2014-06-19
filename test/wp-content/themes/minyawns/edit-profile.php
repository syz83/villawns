
<?php
/**
  Template Name: Edit Profile
 */
get_header();
require 'templates/_jobs.php';
?>
<script>
    jQuery(document).ready(function($) {
  $(".inline li").removeClass("selected");
  
        if (is_logged_in.length === 0) {
            jQuery("#change-avatar-span").attr("href", "#")
            jQuery("#change-avatar-span").find("span").remove();
        }

        jQuery("#tab_identifier").val('1');
        
         $("#example_right").live('click', function() {

            $(".load_ajax_profile_comments").show();
            var Fetchusercomments = Backbone.Collection.extend({
                model: Usercomments,
                url: SITEURL + '/wp-content/themes/minyawns/libs/job.php/getcomments'
            });

            window.fetchc = new Fetchusercomments;
            window.fetchc.fetch({
                data: {
                    minion_id: $("#example_right").attr("user-id")
                            //job_id: jQuery("#job_id").val()
                },
                success: function(collection, response) {

                    console.log(collection.models);
                    var html;
                    if (collection.length > 0) {
                        var template = _.template(jQuery("#comment-popover").html());
                        _.each(collection.models, function(model) {


                            html = template({result: model.toJSON()});
                            //jQuery(".thumbnails").animate({left: '100px'}, "slow").prepend(html);
                        });

                        $(".load_ajax_profile_comments").hide();
                        $("#example_right").popover({placement: 'left', trigger: 'click', content: html}).popover('show');



                    }
                }
            });
            
            $(".close").live("click",function(){
            
            $("#example_right").popover('hide');
            });

        });
        
           	jQuery('#example').popover(
				{
					placement : 'bottom',
					html : true,
					trigger : 'hover',
					content : '<div id="profile-data" class="verfied-content">We personally verify Minion profiles to help you be sure that they are who they claim to be and they are safe to do business with. Minions with out Verified status have yet to go through the personal verification process</div>',
				}
			);

    });
</script>

<div class="container">
    <div id="main-content" class="main-content bg-white" >
        <div class="breadcrumb-text">

            <p id="bread-crumbs-id">

                <a href="<?php echo site_url() ?>/jobs/" class="view loaded">My Jobs</a>
                <a href="<?php echo site_url() ?>/profile" class="view loaded">My Profile</a>
               
<!--                <a href="#" class="view loaded edit-user-profile"><?php if(get_user_id()== get_current_user_id()) echo "My"; else if(strlen(user_profile_company_name())>0) echo mb_convert_case(user_profile_company_name(), MB_CASE_TITLE, "UTF-8"); else echo mb_convert_case(user_profile_first_name(), MB_CASE_TITLE, "UTF-8"); ?></a>-->
                <a href="<?php echo site_url() ?>/profile/<?php echo get_current_user_id() ?>" class="view loaded edit-user-profile">Edit Profile</a>
            </p>
        </div>
		  
        <div class="row-fluid profile-wrapper">
            <?php
            //if(check_access()===true)
            //{
            ?>
         
            <div class="span12" id="profile-edit" style="height:502px;">
                <div class="row-fluid">	
                    <div class="span8">
                    <form class="form-horizontal frm-edit" id="profile-edit-form">


                        <?php if (get_user_role() === 'minyawn'): ?>
                            <div class="control-group">
                                <label class="control-label" for="inputFirst">First Name</label>
                                <div class="controls">
                                    <input type="text" id="first_name" name="first_name" placeholder="" value="<?php user_profile_first_name() ?>" class="input">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputlast">Last Name</label>
                                <div class="controls">
                                    <input type="text" id="last_name"  name="last_name" placeholder="" value="<?php echo user_profile_last_name() ?>" class="input">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputemail">Email</label>
                                <div class="controls">
                                    <input type="text" id="profileemail" disabled  name="profileemail" placeholder="" value="<?php user_profile_email() ?>" class="input">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inptcollege">College</label>
                                <div class="controls">
                                    <input type="text" id="college"  name="college" placeholder="" value="<?php user_college() ?>" class="input">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputmajor">Major</label>
                                <div class="controls">
                                    <input type="text" id="major"  name="major"  placeholder="" value="<?php user_college_major() ?>" class="input">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputskill">Skill</label>
                                <div class="controls">

                                    <input name="user_skills2" id="user_skills2" class="tagsinput1" value="<?php echo get_user_skills(); ?>"  style="width:60%;"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="LinkedIn">LinkedIn url</label>
                                <div class="controls">
                                    <input type="text" id="linkedin"  name="linkedin" placeholder="www.linkedin.com/username" value="<?php echo user_profile_linkedin(); ?>" class="input">
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="control-group">
                                <label class="control-label" for="inputFirst">Company Name</label>
                                <div class="controls">
                                    <input type="text" id="company_name" name="company_name" placeholder="" value="<?php echo user_profile_company_name() ?>" class="input">

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputbody">Location</label>
                                <div class="controls">
                                    <input type="text" id="location"  name="location" placeholder="" value="<?php user_location(); ?>" class="input">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputbody">Company Website</label>
                                <div class="controls">
                                    <input type="text" id="company_website"  name="company_website" placeholder="www.companywebsite.com" value="<?php user_company_website(); ?>" class="input">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputbody">Profile Body</label>
                                <div class="controls">
                                    <textarea rows="5" type="text" id="profilebody"  name="profilebody"  placeholder="" class="input" style=" width: 90% !important; " ><?php user_profile_body(); ?></textarea>
                                </div>
                            </div>
                        <?php endif; ?>
                        <hr>
                        <a href="#" class="btn btn-large btn-block btn-inverse span3 float-right" id="update-profile-info"><i class="icon-refresh"></i>&nbsp; Update Info</a>
                        <input type="hidden" value="<?php user_id(); ?>" name="id" id="id"/>
                        <div class="clear"></div>
                    </form>
                   </div> 
                   <div class="span4">
                       <div class=" widget-sidebar">
							<?php
                                                                   
                    if (get_user_role() == 'employer') {
							echo '<h5>
							Stand out from the crowd with a complete profile</h5>
							<hr>
							Did you know? Adding your logo makes your profile 7 time more likely to have more applications. Simple updates like these make a difference.
							Here are quick steps to create a complete profile and ensure you’re putting your best foot forward:<br><br>
							Fill in the details on your left.<br>
							Add your company logo (.jpg image)<br><br>
							Click on Update Info to save your profile. ';
							} 
							
							?>
							<?php
                                                                   
                    if (get_user_role() == 'minyawn') {
							
							echo 'Complete profiles usually get more attention from employers, making you a more eligible candidate. Create more opportunities for yourself to earn extra money, and bag amazing ratings and reviews from your employers.
<br><br>
							If you have any issues, please feel free to drop us an email on <a href="mailto:support@minyawns">support@minyawns</a>';
							
							} ?>
							
                       </div>
                   </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php
//} 
            ?>
        </div>
    </div>
</div>
<?php
get_footer();