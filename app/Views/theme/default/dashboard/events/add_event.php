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
            <h4 class="card-title">Add Event</h4>
            
                <form class="forms-sample" method="post" action="<?php echo route_to('addevent'); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="event_id" value="" />
        
                    <div class="form-group">
                        <label for="title">Event Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Event Title" value="">
                    </div>
            
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category">
                            <?php
                            
                            foreach($categories as $category)
                            {
                                echo "<option value='".$category->id."'";
                                if ($details[0]->cid == $category->id)
                                {
                                    echo " selected";
                                }
                                echo ">".$category->ectitle."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>File upload</label>
                        <div class="input-group col-xs-12">
                            <input type="file" class="form-control file-upload-info" name="fileuploads[]" multiple>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label for="descp">Event Description</label>
                        <textarea class="form-control" name="descp" rows="6"></textarea>
                    </div>
                    
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" checked>Status<i class="input-helper"></i></label>
                    </div>
            
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
            
              </form>
        </div>
    </div>
</div>
<?php $this->endsection(); ?>
<?php $this->endsection(); ?>