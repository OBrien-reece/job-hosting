<?php require APPROOT .'/views/inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto mt-3">
            <div class="div text-center">
<!--                <h3><strong>--><?php //echo APPNAME ?><!--</strong></h3>-->
                <h3 class="pt-2"><strong>Sign up and view available jobs</strong></h3>
            </div>
            <div class="row pt-2">
                <div class="col"><hr></div>
                <small>welcome</small>
                <div class="col"><hr></div>
            </div>
            <form method="POST" action="<?php echo URLROOT; ?>/users/register">
                <div class="form-group">
                    <div class="row">

                        <div class="col">
                            <label for="first_name"> Firstname</label>

                            <input type="text"
                                   name="first_name"
                                   class="<?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>
                                           form-control form-control-sm"
                                   value="<?php echo $data['first_name']; ?>">

                            <span class="invalid-feedback"><?php echo $data['first_name_err']?></span>
                        </div>

                        <div class="col">
                            <label for="last_name">Lastname</label>

                            <input type="text"
                                   name="last_name"
                                   class="<?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>
                                          form-control form-control-sm"
                                   value="<?php echo $data['last_name']; ?>">

                            <span class="invalid-feedback"><?php echo $data['last_name_err']?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>

                    <input type="text"
                           name="username"
                           class="<?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>
                                  form-control form-control-sm" value="<?php echo $data['username']; ?>">
                    <span class="invalid-feedback"><?php echo $data['username_err']?></span>
                </div>
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
                <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" class="<?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?> form-control form-control-sm" value="<?php echo $data['confirm_password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']?></span>
                    </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-block btn-success">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light">Already have an account? Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT .'/views/inc/footer.php'; ?>
