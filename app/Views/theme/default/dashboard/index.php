<?php $this->extend("theme/$theme/layouts/dashboard"); ?>

<?php $this->section('canonical'); ?>
    <link rel="canonical" href="<?php echo site_url(route_to('admindashboard')); ?>" />
<?php $this->endsection(); ?>

<?php $this->section('head_metas'); ?>
    <title>Homepage</title>
<?php $this->endsection(); ?>

<?php $this->section('head_include'); ?>
<?php $this->endsection(); ?>

<?php $this->section('meta_properties'); ?>
<?php $this->endsection(); ?>

<?php $this->section('footer_includes'); ?>
    <?php echo $this->include("theme/$theme/dashboard/includes/footer_includes"); ?>
<?php $this->endsection(); ?>

<?php $this->section('breadcrumbs'); ?>
<?php $this->endsection(); ?>

<?php $this->section('page_content'); ?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Dashboard</h4>
      </div>
    </div>
  </div>
</div>

<?php
if (in_array('super-admin',session()->get('permissions')) || in_array('view-events',session()->get('permissions')))
{
?>
<div class="col-md-2 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Events</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $eventcount[0]->counts; ?></h3>
                <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<?php $this->endsection(); ?>