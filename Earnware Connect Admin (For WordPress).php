<?php
	/**
	* Provide a admin area view for the plugin
	*
	* This file is used to markup the admin-facing aspects of the plugin.
	*
	* @link       https://support.earnware.com/category/wordpress-plugins/earnware-connect/
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
			<div class="col-sm-6 col-md-6 ml-0 mt-2" href="javascript:void(0)"><img src="http://s3.amazonaws.com/new.ewfiles.com/08-10-20-Earnware-Connect-Plugin.png" width="100%" style="max-width: 182px;" alt="Earnware Connect"></div>
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
								<button class="nav-link" onclick="window.location.href='https://support.earnware.com/category/wordpress-plugins/earnware-connect/'">Help</button>  
							</li>
						</ul>  
						<div class="tab-content" id="myTabContent"> 
							<div class="tab-pane show active" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
								<form class="row mt-5" method="post" name="cleanup_options" action="options.php">
									<?php
										$options = get_option($this->plugin_name);

										$user_id = $options['user_id'];
										$load_styles = @$options['load_styles'];
										$recaptcha_v2_site_key = @$options['recaptcha_v2_site_key'];
										$recaptcha_v2_secret_key = @$options['recaptcha_v2_secret_key'];
										$track_utm_campaign = $options['track_utm_campaign'];
										$track_utm_content = $options['track_utm_content'];
										$track_utm_medium = $options['track_utm_medium'];
										$track_utm_placement = $options['track_utm_placement'];
										$track_utm_term = $options['track_utm_term'];
										$track_utm_source = $options['track_utm_source'];
										$track_utm_custom = $options['track_utm_custom'];
										$save_origin = $options['save_origin'];
										$tracking_per_session = $options['tracking_per_session'];

									?>

									<?php 
										settings_fields($this->plugin_name); 
										do_settings_sections($this->plugin_name);
									?>

							        <!-- remove some meta and generators from the <head> --> 
									<div class="col-lg-5">
										<h4>Link Your Earnware Dashboard Account</h4> 
									</div>
									<div class="col-lg-7">
										<div> 
											<label for="<?php echo $this->plugin_name; ?>-user_id">User ID</label>
											<input type="text" class="form-control" id="<?php echo $this->plugin_name; ?>-user_id" aria-describedby="InpuAccountLinkHelp" name="<?php echo $this->plugin_name; ?>[user_id]" placeholder="asdfq34q345" value="<?php echo $user_id; ?>"> 
											<div id="InpuAccountLinkHelp" class="form-text text-muted">This value connects form posts to your Earnware account.</div> 
										</div> 
									</div>
									<div class="col-lg-12 mb-4 mt-4">
										<hr>
									</div>  
									<div class="col-lg-5">
										<h4>Load Earnware Styles</h4> 
									</div>
									<div class="col-lg-7">
										<div> 
											<input type="checkbox" class="form-check-input" id="<?php echo $this->plugin_name; ?>-load_styles" name="<?php echo $this->plugin_name; ?>[load_styles]" value="1" <?php checked($load_styles, 1); ?>/> 
											<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-load_styles">Click to Load</label>
											<div id="loadStylesHelp" class="form-text text-muted">The load styles option indicates you want to have the Earnware Connect styles loaded to style forms.</div>   
										</div> 
									</div>
									<div class="col-lg-12 mb-4 mt-4">
										<hr>
									</div> 
									<div class="col-lg-5">
										<h4>Google Recaptcha V2 (optional)</h4>
										<p><a href="https://support.earnware.com/wordpress-plugins/earnware-connect/recaptcha-for-earnware-connect-forms/">Quick Guide</a> on how to add Recaptcha to Earnware Connect Forms.</p>
									</div>
									<div class="col-lg-7">
										<div class="mb-4"> 
											<label for="<?php echo $this->plugin_name; ?>-recaptcha_v2_site_key">Google Recaptcha (V2) Site Key:</label>
											<input type="text" class="form-control" aria-describedby="InpuGoogleRec2SiteKeyHelp" placeholder="Enter Google Recaptcha (V2) Site Key" id="<?php echo $this->plugin_name; ?>-recaptcha_v2_site_key" name="<?php echo $this->plugin_name; ?>[recaptcha_v2_site_key]" value="<?php echo $recaptcha_v2_site_key; ?>">  
										</div> 
										<div> 
											<label for="<?php echo $this->plugin_name; ?>-recaptcha_v2_secret_key">Google Recaptcha (V2) Secret Key:</label>
											<input type="text" class="form-control" aria-describedby="InpuAccountLinkInpuGoogleRec2SecretKeyHelp" placeholder="Enter Google Recaptcha (V2) Secret Key" id="<?php echo $this->plugin_name; ?>-recaptcha_v2_secret_key" name="<?php echo $this->plugin_name; ?>[recaptcha_v2_secret_key]" value="<?php echo $recaptcha_v2_secret_key; ?>"> 
											<div id="InpuAccountLinkHelp" class="form-text text-muted">In addition to providing recaptcha keys the attribute recaptcha=true needs to be added to the Earnware short code to enable recaptcha.</div>   
										</div> 
									</div>
									<div class="col-lg-12 mb-4 mt-4">
										<hr>
									</div> 
									<div class="col-lg-5">
										<h4>Tracking</h4> 
										<p>Persist tracking values passed in through the querystring. The values are stored in the browser's localStorage and will be passed along any lead form subscriptions.</p>
									</div>
									<div class="col-lg-7">
										<div class="mb-3"> 
											<label>Default UTM Params</label>  
										</div> 
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">  
													<div>
														<input type="checkbox" class="form-check-input" id="<?php echo $this->plugin_name; ?>-track_utm_campaign" name="<?php echo $this->plugin_name; ?>[track_utm_campaign]" value="1" <?php checked($track_utm_campaign, 1); ?>/>
														<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-track_utm_campaign"><?php esc_attr_e('utm_campaign', $this->plugin_name); ?></label>
													</div>  
												</div>  
												<div class="mb-3">   
													<div>
														<input type="checkbox" class="form-check-input" id="<?php echo $this->plugin_name; ?>-track_utm_content" name="<?php echo $this->plugin_name; ?>[track_utm_content]" value="1" <?php checked($track_utm_content, 1); ?>/>
														<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-track_utm_content"><?php esc_attr_e('utm_content', $this->plugin_name); ?></label>
													</div>  
												</div> 
												<div class="mb-3">   
													<div>
														<input type="checkbox" class="form-check-input" id="<?php echo $this->plugin_name; ?>-track_utm_medium" name="<?php echo $this->plugin_name; ?>[track_utm_medium]" value="1" <?php checked($track_utm_medium, 1); ?>/>
														<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-track_utm_medium"><?php esc_attr_e('utm_medium', $this->plugin_name); ?></label>
													</div>  
												</div> 
											</div> 
											<div class="col-lg-6">
												<div class="mb-3">  
													<div>
														<input type="checkbox" class="form-check-input" id="<?php echo $this->plugin_name; ?>-track_utm_placement" name="<?php echo $this->plugin_name; ?>[track_utm_placement]" value="1" <?php checked($track_utm_placement, 1); ?>/>
														<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-track_utm_placement"><?php esc_attr_e('utm_placement', $this->plugin_name); ?></label>
													</div>  
												</div>  
												<div class="mb-3">   
													<div>
														<input type="checkbox" class="form-check-input" id="<?php echo $this->plugin_name; ?>-track_utm_term" name="<?php echo $this->plugin_name; ?>[track_utm_term]" value="1" <?php checked($track_utm_term, 1); ?>/>
														<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-track_utm_term"><?php esc_attr_e('utm_term', $this->plugin_name); ?></label>
													</div>  
												</div> 
												<div class="mb-3">   
													<div>
														<input type="checkbox" class="form-check-input" id="<?php echo $this->plugin_name; ?>-track_utm_source" name="<?php echo $this->plugin_name; ?>[track_utm_source]" value="1" <?php checked($track_utm_source, 1); ?>/>
														<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-track_utm_source"><?php esc_attr_e('utm_source', $this->plugin_name); ?></label>
													</div> 
												</div> 
											</div> 
										</div>
									</div>
									<div class="col-lg-12 mb-4 mt-4">
										<hr>
									</div> 
									<div class="col-lg-5">
										<h4>Custom Params</h4> 
									</div>
									<div class="col-lg-7">
										<div> 
											<textarea class="form-control" id="<?php echo $this->plugin_name; ?>-track_utm_custom" name="<?php echo $this->plugin_name; ?>[track_utm_custom]" aria-describedby="paramsHelp" placeholder="SID PID TID SUBID4"><?php echo $track_utm_custom ?></textarea>  
										</div> 
									</div>
									<div class="col-lg-12 mb-4 mt-4">
										<hr>
									</div> 
									<div class="col-lg-5">
										<h4>Save Origin</h4> 
									</div>
									<div class="col-lg-7">
										<div> 
											<input type="checkbox" class="form-check-input" id="<?php echo $this->plugin_name; ?>-save_origin" name="<?php echo $this->plugin_name; ?>[save_origin]" value="1" <?php checked($save_origin, 1); ?>/> 
											<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-save_origin">Click to Activate</label> 
											<div id="saveoriginelp" class="form-text text-muted">The save_origin option indicates you DO NOT want to have the tracking values updated once they are set. The default behavior is to override the tracking values when specified. You can also indicate this in any url as a querystring parameter: save_origin=true</div>   
										</div> 
									</div>
									<div class="col-lg-12 mb-4 mt-4">
										<hr>
									</div> 
									<div class="col-lg-5">
										<h4>Tracking Per Session</h4> 
									</div>
									<div class="col-lg-7">
										<div>
											<input type="checkbox" class="form-check-input" type="checkbox" id="<?php echo $this->plugin_name; ?>-tracking_per_session" name="<?php echo $this->plugin_name; ?>[tracking_per_session]" value="1" <?php checked($tracking_per_session, 1); ?>/> 
											<label class="custom-control-label" for="<?php echo $this->plugin_name; ?>-tracking_per_session">Click to Activate</label> 
											<div id="saveoriginelp" class="form-text text-muted">By default tracking values are stored forever. If you would like them to be stored per sesion check this option.</div>   
										</div> 
									</div>
									<div class="col-lg-12 mb-1 mt-4">
										<hr>
									</div> 
									<div class="col-lg-12"> 
										<?php submit_button('Save Changes', 'btn btn-primary', 'submit', TRUE); ?>
									</div>
								</form> 
							</div> 
						</div>  
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