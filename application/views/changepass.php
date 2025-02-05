<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Registration form -->
				<form class="login-form form-validate-jquery" action="./register/updatepassword">
					<div class="card mb-0">
						<div class="card-body">
							

							<div class="form-group text-center text-muted content-divider">
								<span class="px-2">Change Password</span>
							</div>

							

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input value="<?= $temp_pass ?>" required type="password" class="form-control" name="oldpassword" placeholder="Old Password">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
								<input required id="password" type="password" class="form-control" name="password" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
								<input required id="repeat_password" type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>

							

							

						

							<button type="submit" class="btn bg-teal-400 btn-block">Change Password <i class="icon-circle-right2 ml-2"></i></button>
						</div>
					</div>
				</form>
				<!-- /registration form -->

			</div>
			<!-- /content area -->



		</div>
		<!-- /main content -->

	</div>