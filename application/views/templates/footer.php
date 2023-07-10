</body>
<script src="<?= base_url() . "assets/js/snackbar-js/snackbar.min.js" ?>"></script>
<script type="module" src="<?= base_url() . "assets/js/env.js" ?>"></script>
<script type="text/javascript" src="<?= base_url() . "assets/mdbootstrap/js/mdb.min.js" ?>"></script>
<?php foreach($metadata['script'] as $js) { ?>
    <script type='module' src="<?= base_url() . "assets/js/" . $js . ".js" ?>"></script>
<?php } ?>
</html>