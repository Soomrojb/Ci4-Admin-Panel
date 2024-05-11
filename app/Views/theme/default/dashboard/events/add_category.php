<?php $this->extend("theme/$theme/layouts/dashboard"); ?>

<?php $this->section('canonical'); ?>
    <link rel="canonical" href="<?php echo site_url(route_to('admindashboard')); ?>" />
<?php $this->endsection(); ?>

<?php $this->section('head_metas'); ?>
    <title>TradeKey Partner - Mirasys</title>
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
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Category</h4>
            
                <form class="forms-sample" method="post" action="<?php echo route_to('addcategory'); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="event_id" value="" />
        
                    <div class="form-group">
                        <label for="title">Category Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Event Title" value="">
                    </div>
            
                    <div class="form-group">
                        <label>File upload</label>
                        <div class="input-group col-xs-12">
                            <input type="file" class="form-control file-upload-info" name="userfile">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
            
              </form>
        </div>
    </div>
</div>
<?php $this->endsection(); ?>