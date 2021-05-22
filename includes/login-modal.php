<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content" align="center">
			    <!-- Nav tabs -->
        <ul class="nav nav-tabs" align="center" role="tablist">
          <?php if(!isset($_SESSION['user_id'])):?>
          <li class="nav-item">
            <button class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-tie"></i>
              Hostel Manager</button>
          </li>
          <?php endif;?>
        </ul>
        <div class="tab-content">
           <div class="tab-pane show active fade in" id="panel8" role="tabpanel">
           	<h5>Manager Sign In</h5>

            <!--Body-->
            <form method="POST" class="agent_login_form">

              <p id="agent_login_error"></p>
            <div class="modal-body mb-1">

              <div class="form-group">
              <div class="input-group credential_form">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input class="form-control credential_form" placeholder="Manager Email" type="text" name="agent_login_email" id="agent_login_email">
              </div>
            </div>

             <div class="form-group">
              <div class="input-group credential_form">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input class="form-control credential_form" placeholder="Password *" type="password" id="agent_login_password" name="agent_login_password">
              </div>
            </div>

              <div align="center">
                <button class="btn btn-info" type="submit" id="agent_login_btn" name="agent_login_btn">Log in <i class=""></i></button>
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