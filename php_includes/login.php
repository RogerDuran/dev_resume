<!--  Login form -->
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Login Form</h4>
    </div>
    <!--Modal Body-->
    <div class="modal-body">
        <form class="form-inline" id="loginform" onSubmit="return false;">
            <input type="text" id="email" name="email" class="input-small" placeholder="Email"> <br>
            <input type="password" id="password" name="password" class="input-small" placeholder="Password"> <br>
            <label class="checkbox">
                <input type="checkbox"> Remember me
            </label>
            <button type="submit" id="loginbtn" class="btn btn-primary">Sign in</button>
            <p id="status"></p>
        </form>
        <a href="#">Forgot your password?</a>
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->