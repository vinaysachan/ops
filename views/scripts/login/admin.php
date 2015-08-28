<div class="login_box">
    <?php
    if (!empty($this->error)) {
        echo '<div class="alert alert-danger" role="alert"><ul>';
        foreach ($this->error as $err) {
            echo '<li>' . $err . '</li>';
        }
        echo '</ul></div>';
    }
    ?>
    <form action="" method="post" class="form-horizontal">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="form-group">
            <label for="username" class="col-sm-4 control-label">User Name :</label>
            <div class="col-sm-8">
                <input name="username" type="text" class="form-control" id="username" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-4 control-label">Password :</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <div class="checkbox">
                    <label>
                        <input name="rememberme" type="checkbox"> Remember me
                    </label>
                </div> 
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
    </form>
</div>