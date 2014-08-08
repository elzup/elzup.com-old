<!-- jQuery include -->
<?= tag_script_js(URL_JQUERY); ?> 
<?= tag_script_js(base_url(PATH_LIB_FLIP)); ?> 
<?= tag_script_js(base_url(PATH_LIB_LIGHTBOX_JS)); ?> 
<!-- zClip jQuery plugins -->

<!-- LESS include -->
<?= tag_script_js(base_url(PATH_LIB_LESS)); ?> 
<!-- Incliude Twitter share button widgets -->
<?= tag_script_js(URL_TWITTER_WIDGETS); ?> 

<!-- js of act on all page-->
<?= tag_script_js(base_url(PATH_JS . 'helper.js')); ?>

<?php
if (!empty($jss)) {
    foreach ($jss as $js) {
        ?>
        <script src="<?= base_url(PATH_JS . "{$js}.js") ?>" type="text/javascript"></script>
        <?php
    }
}
?>