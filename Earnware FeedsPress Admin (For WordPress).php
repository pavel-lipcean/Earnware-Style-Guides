<?php
	/**
	* Provide a admin area view for the plugin
	*
	* This file is used to markup the admin-facing aspects of the plugin.
	*
	* @link       https://support.earnware.com/category/feedspress/
	* @since      1.0.0
	*
	* @package    Wp_Ew
	* @subpackage Wp_Ew/admin/partials
	*/ 
?>  

		<!-- Bootstrap core CSS --> 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- Custom styles for this template -->
		<link href="https://s3.us-east-1.amazonaws.com/new.ewfiles.com/02-28-21-ew-styles.css" rel="stylesheet">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet"> 
	

		<nav class="navbar flex-md-nowrap p-1 col-md-10 offset-md-1">
			<div class="col-sm-6 col-md-6 ml-0 mt-2" href="javascript:void(0)"><img src="http://s3.amazonaws.com/new.ewfiles.com/08-10-20-FeedsPress-Plugin.png" width="100%" style="max-width: 182px;" alt="FeedsPress"></div>
			<a class="col-sm-2 col-md-2 mr-0 mt-2 d-none d-lg-block" href="https://www.earnware.com/" target="_blank"><img src="http://s3.amazonaws.com/new.ewfiles.com/08-10-20-Plugin-Developed-By.png" width="100%" style="max-width: 211px;" alt="Developed By Earnware"></a>
		</nav> 
		

		<div class="container-fluid">
			<div class="row"> 
				<main role="main" class="col-md-12 ml-sm-auto mt-4">
					<div class="col-md-10 offset-md-1">  
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" aria-controls="nav-settings" aria-selected="true">Settings</button> 
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="nav-default-templates-tab" data-bs-toggle="tab" data-bs-target="#nav-default-templates" type="button" role="tab" aria-controls="nav-default-templates" aria-selected="false">Default Templates</button> 
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="nav-custom-templates-tab" data-bs-toggle="tab" data-bs-target="#nav-custom-templates" type="button" role="tab" aria-controls="nav-custom-templates" aria-selected="false">Custom Templates</button>  
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" onclick="window.location.href='https://support.earnware.com/category/feedspress/'">Help</button>  
							</li>
						</ul> 
						<form class="mt-5" method="post" action="options.php"> 
							<?php settings_fields( 'feedspress-settings-group' ); ?>
							<div class="tab-content" id="myTabContent"> 
								<div class="tab-pane show active" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">	
									<div class="row">
										<div class="col-lg-5">
											<h4>Cache Duration (In Seconds)</h4> 
										</div>
										<div class="col-lg-7">
											<div> 
												<input type="text" class="form-control mb-2" aria-describedby="CacheHelp" name="feedspress_cache_duration" value="<?php echo $cache_duration; ?>">
												<div id="CacheHelp" class="form-text text-muted">Enter 0 To Disable Cache</div>	   
												<input type="button" class="btn btn-dark float-end" value="Purge Cache" id="fp-purge">
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div> 
										<div class="col-lg-5">
											<h4>Querystring</h4> 
										</div>
										<div class="col-lg-7">
											<div> 
												<input type="text" class="form-control" aria-describedby="QueryStringHelp" name="feedspress_querystring" value="<?php echo $querystring; ?>"> 
												<div id="QueryStringHelp" class="form-text text-muted">Enter querystring to append to feedspress links.</div> 
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div> 
										<div class="col-lg-5">
											<h4>Allow Feeds in Widgets</h4>  
										</div>
										<div class="col-lg-7">
											<div> 
												<select required="" aria-describedby="MCEHelp" name="feedspress_enable_widget_shortcodes">
													<option value="0">Use current WordPress setting (<?php echo $enable_widget_shortcodes ? 'Unknown' : (has_filter( 'widget_text', 'do_shortcode') ? 'Enabled' : 'Disabled') ?>)</option>
													<option value="1"
													<?php 
														if ($enable_widget_shortcodes)
														{
															echo " selected=\"selected\"";
														}
													?>
													>Enabled</option>
												</select>
												<div id="MCEHelp" class="form-text text-muted">This will display a FeedsPress button in the Post/Page editor if enabled.</div>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div> 
										<div class="col-lg-5">
											<h4>FeedsPress MCE Editor Button</h4>  
										</div>
										<div class="col-lg-7">
											<div> 
												<select required="" aria-describedby="MCEHelp" name="feedspress_enable_editor_button">
													<option value="0">Disabled</option>
							                        <option value="1"
							                        <?php 
							                            if ( $enable_editor_button )
							                            {
							                                echo " selected=\"selected\"";
							                            }
							                        ?>
							                        >Enabled</option>
												</select>
												<div id="MCEHelp" class="form-text text-muted">This will display a FeedsPress button in the Post/Page editor if enabled.</div>
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div> 
										<div class="col-lg-5">
											<h4>Apply Detail Filter</h4>  
										</div>
										<div class="col-lg-7">
											<div> 
												<select required="" aria-describedby="MCEHelp" name="feedspress_apply_filter_to_all_feeds">
													<option value="0">To Relevant Feeds</option>
													<option value="1"
													<?php 
														if ($apply_filter_to_all_feeds)
														{
															echo " selected=\"selected\"";
														}
													?>
													>To All Feeds</option>
												</select>
												<div id="MCEHelp" class="form-text text-muted">This will display a FeedsPress button in the Post/Page editor if enabled.</div> 
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div> 
										<div class="col-lg-5">
											<h4>Timezone Offset for Merge Codes</h4>  
										</div>
										<div class="col-lg-7">
											<div> 
												<select required="" aria-describedby="TimezoneHelp" name="feedspress_timezone_offset">
													<option value="-8"<?=$timezone_offset=="-8" ? " selected=\"selected\"" : ""?>>-8</option>
													<option value="-7"<?=$timezone_offset=="-7" ? " selected=\"selected\"" : ""?>>-7</option>
													<option value="-6"<?=$timezone_offset=="-6" ? " selected=\"selected\"" : ""?>>-6</option>
													<option value="-5"<?=$timezone_offset=="-5" ? " selected=\"selected\"" : ""?>>-5</option>
													<option value="-4"<?=$timezone_offset=="-4" ? " selected=\"selected\"" : ""?>>-4</option>
													<option value="-3"<?=$timezone_offset=="-3" ? " selected=\"selected\"" : ""?>>-3</option>
													<option value="-2"<?=$timezone_offset=="-2" ? " selected=\"selected\"" : ""?>>-2</option>
													<option value="-1"<?=$timezone_offset=="-1" ? " selected=\"selected\"" : ""?>>-1</option>
													<option value="0"<?=!$timezone_offset ? " selected=\"selected\"" : ""?>>Disabled</option>
													<option value="1"<?=$timezone_offset=="1" ? " selected=\"selected\"" : ""?>>+1</option>
													<option value="2"<?=$timezone_offset=="2" ? " selected=\"selected\"" : ""?>>+2</option>
													<option value="3"<?=$timezone_offset=="3" ? " selected=\"selected\"" : ""?>>+3</option>
													<option value="4"<?=$timezone_offset=="4" ? " selected=\"selected\"" : ""?>>+4</option>
													<option value="5"<?=$timezone_offset=="5" ? " selected=\"selected\"" : ""?>>+5</option>
													<option value="6"<?=$timezone_offset=="6" ? " selected=\"selected\"" : ""?>>+6</option>
													<option value="7"<?=$timezone_offset=="7" ? " selected=\"selected\"" : ""?>>+7</option>
													<option value="8"<?=$timezone_offset=="8" ? " selected=\"selected\"" : ""?>>+8</option>
												</select>
												<div id="MCEHelp" class="form-text text-muted">Offset the {today}, {tomorrow}, and {yesterday} merge codes from your WordPress timezone.</div>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div> 
										<div class="col-lg-5">
											<h4>Add NoIndex</h4>  
										</div>
										<div class="col-lg-7">
											<div> 
												<select required="" aria-describedby="NoIndexHelp" name="feedspress_add_noindex">
													<option value="0">False</option>
							                        <option value="1"
							                        <?php 
							                            if ($add_noindex)
							                            {
							                                echo " selected=\"selected\"";
							                            }
							                        ?>
							                        >True</option>
												</select>
												<div id="NoIndexHelp" class="form-text text-muted">Adds the "&lt;meta name=”robots” content=”noindex”&gt;" tag to the head.</div>   
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Whitelist Urls</h4> 
										</div>
										<div class="col-lg-7">
											<div> 
												<input type="text" class="form-control" aria-describedby="WhitelistHelp" name="feedspress_whitelist_url" value="<?php echo $whitelist_url; ?>">
												<div id="WhitelistHelp" class="form-text text-muted">Enter urls separated by comma to render with script tag. You can use wild card character(*).</div>  
											</div> 
										</div> 
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Load FeedsPress Styles</h4> 
										</div>
										<div class="col-lg-7">
											<div> 
												<input id="LoadStylesHelp" type="checkbox" class="form-check-input" name="feedspress_load_styles" aria-describedby="LoadStylesHelp" value="1" <?php checked($load_styles, 1); ?>/> 
												<label class="form-check-label" for="LoadStylesHelp">Check to Load</label> 
											</div> 
										</div> 
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>										
										<!-- <div class="col-lg-5">
											<h4>Custom CSS Code</h4> 
										</div>
										<div class="col-lg-7">
											<div> 
												<textarea class="form-control" name="feedspress_css" cols="25" rows="5" aria-describedby="CustomCSSHelp"><?php echo $css; ?></textarea>   
											</div> 
										</div> 
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div> -->
										<div class="col-lg-5">
											<h4>Custom Javascript Code</h4> 
										</div>
										<div class="col-lg-7">
											<div> 
												<textarea class="form-control" name="feedspress_js" cols="25" rows="5" aria-describedby="CustomCSSHelp"><?php echo $js; ?></textarea>   
											</div> 
										</div>  
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Process Shortcodes in Templates</h4> 
										</div>
										<div class="col-lg-7">
											<div> 
												<select required="" aria-describedby="enable_template_shortcodesHelp" name="feedspress_enable_template_shortcodes">
													<option value="0">Disabled</option>
							                        <option value="1"
							                        <?php 
							                            if ($enable_template_shortcodes)
							                            {
							                                echo " selected=\"selected\"";
							                            }
							                        ?>
							                        >Enabled</option>
												</select>
												<div id="enable_template_shortcodesHelp" class="form-text text-muted">Use with caution, this can be resource intensive</div> 
											</div> 
										</div>  
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Error Message Template</h4> 
										</div>
										<div class="col-lg-7">
											<div> 
												<textarea class="form-control" name="feedspress_error_template" cols="25" rows="5" aria-describedby="CustomCSSHelp"><?php echo $error_template; ?></textarea>   
											</div> 
										</div>
								 	</div>
								</div> 
								<div class="tab-pane" id="nav-default-templates" role="tabpanel" aria-labelledby="nav-default-templates-tab">
									<div class="row">
										<div class="col-lg-5">
											<h4>Template 1</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="feedspress_html_1"><?php echo $html_1; ?></textarea>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Template 2</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="feedspress_html_2"><?php echo $html_2; ?></textarea>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Template 3</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="feedspress_html_3"><?php echo $html_3; ?></textarea>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Template 4</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="feedspress_html_4"><?php echo $html_4; ?></textarea>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Template 5</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="feedspress_html_5"><?php echo $html_5; ?></textarea>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Template 6</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="feedspress_html_6"><?php echo $html_6; ?></textarea>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Template 7</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="feedspress_html_7"><?php echo $html_7; ?></textarea>  
											</div> 
										</div>
										<div class="col-lg-12 mb-4 mt-4">
											<hr>
										</div>
										<div class="col-lg-5">
											<h4>Template 8</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="feedspress_html_8"><?php echo $html_8; ?></textarea>  
											</div> 
										</div> 
									</div> 
								</div> 
								<div class="tab-pane" id="nav-custom-templates" role="tabpanel" aria-labelledby="nav-custom-templates-tab">
                                    <div id="template_clone" class="template_clone row form-group mb-4" style="display: none;">
										<div class="col-lg-5">
											<h4>Custom Template</h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name=""><?php echo FEEDSPRESS_DEFAULT_HTML ?></textarea> 
												<br> 
												<input type="button" value="Remove Template" class="btn btn-dark float-end remove_template" /> 
											</div> 
										</div> 
									</div>
                                    <?php 
                                        if ($custom_htmls)
                                        {
                                            $templates = explode(',', $custom_htmls);
                                            $max_default_htmls = 8;
                                        
                                            foreach ($templates as $template) 
                                            {
                                                if ((int)$template <= $max_default_htmls) continue;
                                    ?>
                                    <div class="template_clone row form-group mb-4" data-count="<?php echo $template; ?>" id="template_clone_<?php echo $template; ?>">  
										<div class="col-lg-5">
											<h4>Custom Template <?php echo $template; ?></h4> 
										</div>  
										<div class="col-lg-7">
											<div> 
												<textarea cols="25" rows="5" class="form-control" name="<?php echo "feedspress_html_" . $template; ?>"><?php echo get_option('feedspress_html_' . $template, FEEDSPRESS_DEFAULT_HTML); ?></textarea> 
												<br> 
												<input type="button" value="Remove Template" class="btn btn-dark float-end remove_template" /> 
											</div> 
										</div> 
									</div>

                                    <?php 
                                            } 
                                        }
                                    ?>

									<div class="row">  
										<div class="col-lg-5">
											<input type="button" value="Add Template" class="btn btn-dark" id="add_template" />
										</div>  
									</div>	 
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 mb-4 mt-4">
									<hr>
								</div> 
								<div class="col-lg-12"> 
									<input type="hidden" value="<?php echo $custom_htmls; ?>" id="feedspress_custom_htmls" name="feedspress_custom_htmls" />
									<input type="hidden" value="<?php echo $custom_htmls; ?>" name="previous_feedspress_custom_htmls" />
									<input type="submit" class="btn btn-primary" value="<?php _e('Save Changes') ?>" /> 
								</div>
							</div>
						</form>  
					</div>
				</main>
			</div>
		</div>
		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
		<!-- Icons -->
		<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
		<script>
			feather.replace()
		</script> 