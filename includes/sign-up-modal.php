<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content" align="center">
			    <!-- Nav tabs -->
        <ul class="nav nav-tabs" align="center" role="tablist">
          <li class="nav-item">
            <button class="nav-link" data-toggle="tab" href="#panel11" role="tab"><i class="fas fa-user-plus"></i>
              Hostel Manager</button>
          </li>
        </ul>
        <div class="tab-content">
           <div class="tab-pane show active fade in" id="panel11" role="tabpanel">
           	<h5>Sign Up as Manager</h5>

            <!--Body-->
            <form class="agent_sign_up_form" method="POST">
              <p id="agent-sign-up-error"></p>
            <div class="modal-body mb-1">
              <div class="form-group">
              <div class="input-group credential_form">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input class="form-control credential_form" placeholder="Full Name" type="text" name="agent_full_name" id="agent_full_name">
              </div>
            </div>
             <div class="form-group">
              <div class="input-group credential_form">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input class="form-control credential_form" placeholder="Phone" type="text" name="agent_phone" id="agent_phone">
              </div>
            </div>
              <div class="form-group">
              <div class="input-group credential_form">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input class="form-control credential_form" placeholder="Email" type="email" name="agent_email" id="agent_email">
              </div>
            </div>

             <div class="form-group">
              <div class="input-group credential_form">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input class="form-control credential_form" placeholder="Password *" type="password" name="agent_password" id="agent_password">
              </div>
            </div>
              <div align="center">
                <button class="btn btn-info" type="submit" id="agent_sign_up_btn" name="agent_sign_up_btn">Sign Up</button>
              </div>
            </div>
          </form>
            <!--Footer-->
            <div class="modal-footer">
              <div class="options text-center text-md-right mt-1">
                <p>Forgot your <a href="#" class="blue-text">Password?</a></p>
              </div>
              <button type="button" class="btn btn-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
		</div>
	</div>
</div>
