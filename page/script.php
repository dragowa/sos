<!-- Scripts -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="<?=get_url();?>page/js/common.js"></script>
<? if ($script == 'formula' || $script == 'section') { ?>
<script src="<?=get_url();?>page/js/formula-build.js"></script>
<? } ?>
<? if ($script != null && file_exists('page/js/'.$script.'.js')) { ?>
<script src="<?=get_url();?>page/js/<?=$script?>.js"></script>
<? } ?>

<!-- End Scripts -->
