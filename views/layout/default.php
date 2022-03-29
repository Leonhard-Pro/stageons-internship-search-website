

<?php require_once("views/layout/head.php");?>

<body>
<?php require_once("views/layout/header.php");?>
<?php if($page['pageName'] != "notifications" && $page['pageName'] != "management" && $page['pageName'] != "statistic" && $page['pageName'] != "account" && $page['pageName'] != "login" && $page['pageName'] && "notifications"):?>
<?php require_once("views/layout/filters.php");?>
<?php endif;?>
<?php echo $content_for_layout ?>
</body>