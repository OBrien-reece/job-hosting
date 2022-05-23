<?php require APPROOT .'/views/inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Job Vacancy</h1>
            <p class="big-text">Are you currently looking for a job?</p>
            <p>Signup to quickly find job opportunities hosted on this platform</p>
            <a href="<?php echo URLROOT; ?>/users/register" class="btn-styling btn btn-first">Signup</a>
            <a href="<?php echo URLROOT; ?>/users/login" class="btn-styling btn btn-subscribers">Login</a>
        </div>
        <div class="col-md-6">
            <img src="<?php echo URLROOT ;?>/images/jobs.png" alt="" class="img-responsive">
        </div>
    </div>
</div>

<?php require APPROOT .'/views/inc/footer.php'; ?>
