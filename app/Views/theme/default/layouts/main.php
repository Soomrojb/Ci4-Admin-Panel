<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <?php echo $this->renderSection('canonical'); ?>
        <?php echo $this->renderSection('head_metas'); ?>
        <?php echo $this->include("theme/$theme/includes/common-header"); ?> 
        <?php echo $this->renderSection('head_include'); ?>
        <?php echo $this->renderSection('customstyle'); ?>
        <?php echo $this->renderSection('meta_properties'); ?>
        <?php echo $this->include("theme/$theme/includes/preloads"); ?>
        <?php echo $this->include("theme/$theme/includes/googletag"); ?>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="90" class="side-nav">
        <div id="main">
            <?php echo $this->include("theme/$theme/includes/navbar"); ?>
            <?php echo $this->renderSection('banners'); ?>
            <?php echo $this->renderSection('breadcrumbs'); ?>
            <?php echo $this->renderSection('page_content'); ?>
            <?php echo $this->renderSection('footer_subscribe'); ?>
            <?php // echo $this->include("theme/$theme/includes/footer-subscribe"); ?> 
            <?php echo $this->include("theme/$theme/includes/footer"); ?> 
            <?php echo $this->include("theme/$theme/includes/footer-scripts"); ?> 
            <?php echo $this->renderSection('footer_modals'); ?>
        </div>
    </body>
</html>