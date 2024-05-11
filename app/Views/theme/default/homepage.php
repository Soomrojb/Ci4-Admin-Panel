<?php $this->extend("theme/$theme/layouts/main"); ?>

<?php $this->section('canonical'); ?>

        <link rel="canonical" href="<?php echo site_url(route_to('homepage')); ?>" />
<?php $this->endsection(); ?>

<?php $this->section('head_metas'); ?>

        <title>Homepage</title>
<?php $this->endsection(); ?>

<?php $this->section('head_include'); ?>
<?php $this->endsection(); ?>

<?php $this->section('meta_properties'); ?>
<?php $this->endsection(); ?>

<?php $this->section('footer_subscribe'); ?>
<?php $this->endsection(); ?>

<?php $this->section('breadcrumbs'); ?>
<?php $this->endsection(); ?>

<?php $this->section('banners'); ?>
<?php $this->endsection(); ?>

<?php $this->section('page_content'); ?>
<?php $this->endsection(); ?>
