
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | numberbazaar.com</title>
    <!-- Core CSS - Include with every page -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="font-awesome/css/font-awesome.css" rel="stylesheet">-->
    <!-- Page-Level Plugin CSS - Dashboard -->
    <!--<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">-->
    <!--<link href="css/plugins/timeline/timeline.css" rel="stylesheet">-->
    <!-- SB Admin CSS - Include with every page -->
    <!--<link href="css/sb-admin.css" rel="stylesheet">-->
    <?php 
    echo Asset::css(array(
        'bootstrap.min.css',
        'plugins/morris/morris-0.4.3.min.css',
        'plugins/timeline/timeline.css',
        'font-awesome.css',
        'plugins/dataTables/dataTables.bootstrap.css',
        'plugins/dataTables/dataTables.keyTable.min.css',
        'plugins/dataTables/dataTables.fixedHeader.min.css',
        'bootstrap-select.min.css',
        'summernote.css',
        'sb-admin.css',
        'datepicker.css',
        'cp-admin.css'
    ));

    ?>

    <?php
    echo Asset::js(array(
        'libs/jquery.js',
        'libs/underscore.min.js',
        'libs/backbone.min.js'
    ));
    ?>

    <?php
    echo Asset::js(array(
        'libs/bootstrap.min.js',
        'libs/plugins/morris/raphael-2.1.0.min.js',
        'libs/plugins/morris/morris.js',
        'libs/plugins/metisMenu/jquery.metisMenu.js',
        'libs/plugins/dataTables/jquery.dataTables.js',
        // 'libs/plugins/dataTables/dataTables.keyTable.min.js',
        // 'libs/plugins/dataTables/dataTables.fixedHeader.min.js',
        'libs/plugins/dataTables/dataTables.bootstrap.js',
        'libs/summernote.min.js',
        'libs/bootstrap-datepicker.js',
        'libs/summernote.min.js',
        'libs/bootstrap-select.min.js',
        'sb-admin.js',
        'functions.js',
        'admin-func.js',
    ));
    ?>

    <script data-main="<?php echo Uri::base(false) ?>assets/js/main" src="<?php echo Asset::get_file('libs/require.min.js', 'js'); ?>"></script>

</head>
<body>
    <script>
        window.base = '<?php echo Uri::base(false) ?>';
    </script>
