	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo media_url('admin/js/plugins/loaders/pace.min.js').VERSION; ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/core/libraries/jquery.min.js').VERSION; ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/core/libraries/bootstrap.min.js').VERSION; ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/plugins/loaders/blockui.min.js').VERSION; ?>"></script>

	<!-- /core JS files -->
	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
	</script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/core/app.js').VERSION; ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/app.js').VERSION; ?>"></script>
	<?php
	if (isset($pageJs) && !empty($pageJs) && is_array($pageJs)) {
		foreach ($pageJs as $j => $j_val) { // $j_val -- true for external url
			if ($j != "") {
				if ($j_val == "false") {
					echo '<script src="' . media_url($j).VERSION . '"></script>' . "\n";
				} else {
					echo '<script src="' . $j . '"></script>' . "\n";
				}
			}
		}
	}
	?>
	
	<div id="loader" class="overlay hide"><i class="icon-spinner9 spinner"></i> </div>
	</body>

	</html>