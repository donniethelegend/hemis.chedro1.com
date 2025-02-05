
	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
                                <form class="login-form" action="<?= base_url()?>login/loadlogin">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1" ><img class="img-fluid" src="<?= base_url(); ?>assets/image/Commission_on_Higher_Education_(CHEd).svg"></i>
								<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Enter your credentials below</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name ="username" class="form-control" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							

							<div class="form-group">
                                                             <a href="forgotpassword" >Forgot Password</a>
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->


		

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
