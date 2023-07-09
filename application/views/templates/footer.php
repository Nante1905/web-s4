</body>
<script type="text/javascript" src="<?= base_url() . "assets/mdbootstrap/js/mdb.min.js" ?>"></script>
<?php foreach($metadata['script'] as $js) { ?>
    <script type='module' src="<?= base_url() . "assets/js/" . $js . ".js" ?>"></script>
<?php } ?>
</html>