<?php $this->extend("theme/$theme/layouts/main"); ?>

<?php $this->section('canonical'); ?>
        <link rel="canonical" href="<?php echo site_url(route_to('adminlogin')); ?>" />
<?php $this->endsection(); ?>

<?php $this->section('head_metas'); ?>

        <title>Login Page</title>
<?php $this->endsection(); ?>

<?php $this->section('head_include'); ?>
<?php $this->endsection(); ?>

<?php $this->section('meta_properties'); ?>
<?php $this->endsection(); ?>

<?php $this->section('footer_subscribe'); ?>
<?php $this->endsection(); ?>

<?php $this->section('breadcrumbs'); ?>
<?php $this->endsection(); ?>

<?php $this->section('page_content'); ?>
    <section class="gallery">
        <div class="container d-flex flex-column">

                <div class="d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome back,</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">

                                    <form action="<?php echo base_url(route_to('adminlogin')); ?>" method="post">
                                        <?= csrf_field() ?>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg frm <?php echo (session()->get('validation')) ? ((session()->get('validation')->hasError('email') || session()->get('validation')->hasError('password')) ? 'is-invalid' : '') : '' ?>" id="validationEmail" aria-describedby="validationEmailFeedback" type="email" name="email" value="<?= old('email') ?>" placeholder="이메일을 입력하세요 (i.e. admin@<?php echo $_SERVER['HTTP_HOST']; ?>)" />
                                            <div id="validationEmailFeedback" class="invalid-feedback">
                                                <?php echo (session()->get('validation')) ? ((session()->get('validation')->hasError('email')) ? session()->get('validation')->getError('email') : '') : '' ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg frm <?php echo (session()->get('validation')) ? ((session()->get('validation')->hasError('password')) ? 'is-invalid' : '') : '' ?>" id="validationPassword" aria-describedby="validationPasswordFeedback" type="password" name="password" placeholder="비밀번호를 입력하세요" />
                                            <div id="validationPasswordFeedback" class="invalid-feedback">
                                                <?php if (session()->get('validation')) : ?>
                                                    <?php if (session()->get('validation')->hasError('password')) : ?>
                                                        <?php echo session()->get('validation')->getError('password') ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3 rst-sml">
                                            <button type="submit" class="btn btn-primary butn-sn">Sign in</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
        </div>
    </section>
<?php $this->endsection(); ?>
