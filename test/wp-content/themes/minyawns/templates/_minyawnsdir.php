
<script type="text/template" id="minyawn-directory-card">
    <li class="span3 thumbspan" id="minyawn<%= result.user_id %>">
                           <div class="thumbnail" id="thumbnail-10">
                              <div class="m1" onclick="return true">
                                 <div class="caption">
								
                                    <div class="minyawns-img">
                                      <%= result.user_avatar %>
                                    </div>
                                     <% if(result.user_verified === 'Y'){%>
    <!-- <img class="verfied" src="<?php echo get_template_directory_uri(); ?>/images/verifed.png" />-->
    <div class="verfied-txt">Verified Minion</div>
    <% } %> 
                                    <h4><a href=<?php echo site_url() ?>/profile/<%= result.user_id %> target="_blank"><%= result.minion_name %></a></h4>
                                    <div class="collage"> <%= result.college %></div>
                                    <div class="social-link">
                                   <!-- <a href='http://<% /*= result.linkedin.replace(/^http?:\/\//,'')*/ %>' target='_blank'><% /*= result.linkedin */ %></a> -->
                                        <% if((result.linkedin.indexOf("http://") <= -1) && (result.linkedin.indexOf("https://") <= -1) ){
                                            var linkedinUrl = "http://"+result.linkedin;
                                        }
                                        else{
                                            var linkedinUrl = result.linkedin;
                                        }
                                        %>
                                        <a href='<%= linkedinUrl %>' target='_blank'><%= result.linkedin %></a>
                                    </div>
									<div class="m1-invite">
									<a class="btn btn-primary invite-btn" id="invite-minion" minion-id="<%= result.user_id %>" employer-id=<?php echo get_current_user_id() ?>>
												   <i class="icon-ok"></i>
												 Invite Minion
												   </a>	
									</div>
                                    <div class="rating">
                                       <a href="#fakelink" id="thumbs_up_10">
                                       <i class="icon-thumbs-up"></i><%= result.rating_positive %>
                                       </a>
                                       <a href="#fakelink" class="icon-thumbs" id="thumbs_down_10">
                                       <i class="icon-thumbs-down"></i> <%= result.rating_negative %>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="m2">
                                 <div class="caption">
                                    <div class="minyawns-img">
<%= result.user_avatar %>
                                    </div>
                            <% if(result.user_verified === 'Y'){%>
        <div class="verfied-txt">Verified Minion</div>
    <% } %> 
                                    <div class="rating">
                                       <a href="#fakelink" id="thumbs_up_10">
                                       <i class="icon-thumbs-up"></i> <%= result.rating_positive %>
                                       </a>
                                       <a href="#fakelink" class="icon-thumbs" id="thumbs_down_10">
                                       <i class="icon-thumbs-down"></i><%= result.rating_negative %>
                                       </a>
                                    </div>
                                    <h4><a href=<?php echo site_url() ?>/profile/<%= result.user_id %> target="_blank"><%= result.minion_name %></a></h4>
                                    <div class="collage"><%= result.college %></div>
                                    <div class="collage"><%= result.major %></div>
                                    <div class="social-link">
                                     <% if (result.linkedin.length > 0 ){%>
                                   <!--  <a href='http://<% /*= result.linkedin.replace(/^http?:\/\//,'') */ %>' target='_blank'><% /*= result.linkedin  */%></a> -->
                                        <% if(  (result.linkedin.indexOf("https://") <= -1) &&   (result.linkedin.indexOf("http://") <= -1) ) {
                                            var linkedinUrl = "http://"+result.linkedin;
                                        }
                                        else{
                                            var linkedinUrl = result.linkedin;
                                        }
                                        %>
                                        <a href='<%= linkedinUrl   %>' target='_blank'><%= result.linkedin   %></a>
                                       <%}else{%>
                                      <a href='#'><%= result.linkedin %></a>
    <%}%>
                                      </div>
                                    <div class="social-link">
                                       <%= result.user_email %>
                                    </div>
					<a class="btn btn-primary invite-btn" id="invite-minion" minion-id="<%= result.user_id %>" employer-id=<?php echo get_current_user_id() ?>>
												   <i class="icon-ok"></i>
												 Invite Minion
												   </a>				
                                    <div class="tags">
                                     <% var sk=result.skills.split(',');
                                     if(result.skills.length > 0){ %>
                                       Tags:<br> 
                                      <% for(i=0;i<sk.length;i++){ %> <span class="label"><%= sk[i] %></span><%}%></li>
                                      <% } else {%>
                                      No skills added yet!
                                      <%}%>
                                      </div>
                                 </div>
                              </div>
                           </div>
                        </li>   
</script>    

<script type="text/template" id="load-more">
     <button class='btn' id='load_more'>Load More
     </button>   
</script>

<script type="text/templates" id="no-result-minyawn-dir">
    <div class="alert alert-info myjobs no-job ">
    <b style="text-align: center">No Minions yet ! </b>&nbsp;
    There doesn't seem to be anything here.
    </div>
</script>


<script type="text/templates" id="no-result-verfied-minyawn-dir">
    <div class="alert alert-info myjobs no-job ">
    <b style="text-align: center">No Minions Verified yet ! </b>&nbsp;
    There doesn't seem to be anything here.
    </div>
</script>


<script type="text/templates" id="no-more-results-pagination">
    <div class="alert alert-info myjobs no-job ">
    <b style="text-align: center">No More Results ! </b>&nbsp;
   
    </div>
</script>


<script type="text/templates" id="loader-image">
 <span class='load_ajax_large'"></span>
</script>

<script type="text/templates" id="filters-loader-image">
 <span class='modal_ajax_large_filter' id="filters-loader"></span>
</script>

<script type="text/templates" id="active_invites">
    <tr class="active" id="row-<%= result.job_id%>">
            <td class="td-job-title"><%= result.job_title%></td>
            <td class="sm-font"><%= result.job_start_date%></td>
            <td>
			<span id="loader<%= result.job_id%>" class="load_ajax" style="display:none"></span>
			<%= button %>
			
			</td>
          </tr>
    </script>


