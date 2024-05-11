<?php $this->extend("theme/$theme/layouts/dashboard"); ?>

<?php $this->section('canonical'); ?>
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
        <h4 class="font-weight-bold mb-0">Events</h4>
      </div>
    </div>
  </div>
</div>

<?php
if ( in_array("super-admin", session()->get('permissions')) || in_array('add-event', session()->get('permissions')) )
{
  /** show button only if user has rights */
?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <a href="<?php echo route_to('addevent'); ?>">
            <button type="button" class="btn btn-outline-primary btn-fw">Add Event</button>
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
              <th>Category</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($events as $event)
            {
                echo "<tr>";
                echo "<td>".$event->id."</td>";
                echo "<td>".$event->etitle."</td>";
                echo "<td>".$event->category."</td>";
                echo "<td align='left'>";
                echo "<a href='".url_to('updateevent',$event->id)."' class='roy-btn1'><i class='ti-pencil'></i></a>";
                echo "<a href='".site_url(route_to('event',$event->catgslug))."' target='blank' class='roy-btn1 roy-btn2'><i class='ti-new-window'></i></a>";
                echo "<a href='".route_to('deleteevent',$event->id)."' class='roy-btn1 roy-btn3'><i class='ti-trash'></i></a>";
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