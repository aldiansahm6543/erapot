<?php view('template/header'); ?>  
<?php view('template/menu'); ?>
<?php view('template/navbar'); ?>
<?php view($page, isset($content) ? $content : '');?>
<?php view('template/footer'); ?>