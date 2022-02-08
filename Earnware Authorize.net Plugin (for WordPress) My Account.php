<?php
	// set dependencies for include path 
	set_include_path(
		get_include_path()
			.PATH_SEPARATOR.dirname(__FILE__).'/../'
	);		

	require('vendor/sdk-php-2.0.0/autoload.php');
	use net\authorize\api\contract\v1 as AnetAPI;
	use net\authorize\api\controller as AnetController;	
?>
<?php private_page(); ?>
<?php
get_header();
?>
<!-- Bootstrap core CSS --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Custom styles for this template -->
<link href="https://s3.us-east-1.amazonaws.com/new.ewfiles.com/02-28-21-ew-styles.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
<nav class="navbar flex-md-nowrap p-1 col-md-10 offset-md-1">
	<div class="col-sm-6 col-md-6 ml-0 mt-2" href="javascript:void(0)"><img src="http://s3.amazonaws.com/new.ewfiles.com/10-23-20-Earnware-Authorize-Net-Logo.png" width="100%" style="max-width: 182px;" alt="Earnware Authorize Net"></div>
	<a class="col-sm-2 col-md-2 mr-0 mt-2 d-none d-lg-block" href="https://www.earnware.com/" target="_blank"><img src="http://s3.amazonaws.com/new.ewfiles.com/08-10-20-Plugin-Developed-By.png" width="100%" style="max-width: 211px;" alt="Developed By Earnware"></a>
</nav>
<div class="container-fluid">
	<div class="row">
		<main role="main" class="col-md-12 ml-sm-auto mt-4">
			<div class="col-md-10 offset-md-1">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" aria-controls="nav-settings" aria-selected="true">Setup</button> 
					</li> 
					<li class="nav-item" role="presentation">
						<button class="nav-link" onclick="window.location.href='/my-account/'">My Account</button>  
					</li>
				</ul> 
				<form class="mt-5" method="post" name="cleanup_options" action="options.php" id="earnware-authorize-net-form">
					<?php
						$options = get_option($this->plugin_name);
						$authorize_net_login_id = '';
						$authorize_net_transaction_key = '';
						
						if (isset($options['authorize_net_login_id'])) {
							$authorize_net_login_id = $this->decrypt($options['authorize_net_login_id']);
						}
						
						if (isset($options['authorize_net_transaction_key'])) {
							$authorize_net_transaction_key = $this->decrypt($options['authorize_net_transaction_key']);
						}
						
						$authorize_net_api_uri = $options['authorize_net_api_uri'];
						
						?>
					<?php 
						settings_fields($this->plugin_name); 
						do_settings_sections($this->plugin_name);
						?>
					<!-- remove some meta and generators from the <head> -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane show active" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
							<div class="row">
								<div class="col-lg-5">
									<h4>Link Your Authorize.net Account</h4>
								</div>
								<div class="col-lg-7">
									<div class="mb-4"> 
										<label class="control-label earnware-authorize-net-subform-label" for="<?php echo $this->plugin_name; ?>-authorize_net_login_id">Login Id: </label> 
										<input type="text" class="form-control" id="<?php echo $this->plugin_name; ?>-authorize_net_login_id" name="<?php echo $this->plugin_name; ?>[authorize_net_login_id]" placeholder="5KP3u95bQpv" value="<?php echo $authorize_net_login_id; ?>"> 
									</div>
									<div class="mb-4"> 
										<label class="control-label earnware-authorize-net-subform-label" for="<?php echo $this->plugin_name; ?>-authorize_net_transaction_key">Transaction Key: </label>
										<input type="text" class="form-control" id="<?php echo $this->plugin_name; ?>-authorize_net_transaction_key" name="<?php echo $this->plugin_name; ?>[authorize_net_transaction_key]" placeholder="346HZ32z3fP4hTG2" value="<?php echo $authorize_net_transaction_key; ?>">
										<a class="form-text link-dark" href="https://support.authorize.net/s/article/How-do-I-obtain-my-API-Login-ID-and-Transaction-Key" target="_blank"><small id="InputTransactionKey">How to obtain Authorize.net Transaction Key?</small></a>
									</div>
									<div class="mb-4"> 
										<label class="control-label earnware-authorize-net-subform-label" for="<?php echo $this->plugin_name; ?>-authorize_net_api_uri">API URI: </label>
										<input type="text" class="form-control" id="<?php echo $this->plugin_name; ?>-authorize_net_api_uri" name="<?php echo $this->plugin_name; ?>[authorize_net_api_uri]" placeholder="https://apitest.authorize.net/xml/v1/request.api" value="<?php echo $authorize_net_api_uri; ?>">
										<a class="form-text link-dark" href="https://support.authorize.net/s/article/How-do-I-obtain-my-API-Login-ID-and-Transaction-Key" target="_blank"><small id="InputAPIURI">How to obtain Authorize.net API Login ID?</small></a>  
									</div>
								</div>
								<div class="col-lg-12 mb-2 mt-2">
									<hr>
								</div>
								<div class="col-lg-12 mb-2 mt-2">
									<input type="submit" class="btn btn-primary" value="Save Changes" /> 
								</div>
							</div>
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