<?php require APPROOT .'/views/inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto mt-3">
            <div class="div text-center">
                <!--                <h3><strong>--><?php //echo APPNAME ?><!--</strong></h3>-->
                <h3 class="pt-2"><strong>Sign in and view available jobs</strong></h3>
            </div>
            <div class="row pt-2">
                <div class="col"><hr></div>
                <small>welcome back</small>
                <div class="col"><hr></div>
            </div>
            <form method="POST" action="<?php echo URLROOT; ?>/users/login">

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?> form-control form-control-sm" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?> form-control form-control-sm" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-block btn-success">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light">Don't have an account? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT .'/views/inc/footer.php'; ?>
