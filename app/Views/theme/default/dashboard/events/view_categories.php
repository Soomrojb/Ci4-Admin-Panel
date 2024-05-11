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

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">Categories</h4>
      </div>
    </div>
  </div>
</div>

<?php
if ( in_array("super-admin", session()->get('permissions')) || in_array('add-category', session()->get('permissions')) )
{
  /** show button only if user has rights */
?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <a href="<?php echo route_to('addcategory'); ?>">
            <button type="button" class="btn btn-outline-primary btn-fw">Add Category</button>
        </a>
    </div>
</div>
<?php
}
?>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($categories as $category)
            {
                echo "<tr>";
                echo "<td>".$category->id."</td>";
                echo "<td>".$category->ectitle."</td>";
                echo "<td align='left'>";
                echo "<a href='".url_to('updatecategory',$category->id)."' class='roy-btn1'><i class='ti-pencil'></i></a>";
                echo "<a href='".route_to('deletecategory',$category->id)."' class='roy-btn1 roy-btn3'><i class='ti-trash'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php $this->endsection(); ?>