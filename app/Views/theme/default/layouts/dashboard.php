<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php echo $this->renderSection('head_metas'); ?>
  <?php echo $this->renderSection('head_include'); ?>
  <?php echo $this->include("theme/$theme/dashboard/includes/head_include"); ?>
</head>

<body>
    <div class="container-scroller">
        <?php echo $this->include("theme/$theme/dashboard/navbar"); ?>
        <div class="container-fluid page-body-wrapper">
            <?php echo $this->include("theme/$theme/dashboard/sidebar"); ?>
        
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <?php echo $this->renderSection('page_content'); ?>
                    </div>
                </div>
                <?php echo $this->include("theme/$theme/dashboard/footer"); ?>
            </div>
        </div>
    </div>
    <?php echo $this->renderSection('footer_includes'); ?>
</body>
</html>