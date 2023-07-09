</body>
<?php foreach($metadata['script'] as $js) { ?>
    <script type='module' src="<?= base_url() . "assets/js/" . $js . ".js" ?>"></script>
<?php } ?>
</html>