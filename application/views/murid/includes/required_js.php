<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo js_url('jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo js_url('bootstrap.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo js_url('app.min.js'); ?>"></script>
<script src="<?php echo js_url('jquery.validationEngine-en.js'); ?>"></script>
<script src="<?php echo js_url('jquery.validationEngine.js'); ?>"></script>
<script src="<?php echo js_url('toastr.min.js'); ?>"></script>
<script src="<?php echo js_url('jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo js_url('dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo js_url('bootbox.js'); ?>"></script>
<script type="text/javascript">
var timeout_id = setTimeout(check_notif, 1000);

function check_notif() {
	var notif = 0;
	$('#notif-item').html('');

	$.get("<?php echo site_url('murid/check_notif/') ?>")
	.done(function(result) {
		if (jQuery.parseJSON(result).length > 0) {
			notif = notif+jQuery.parseJSON(result).length;
			$('#notif-count').text(notif);
			$.each(jQuery.parseJSON(result), function(key, val){
				$('#notif-item').append('<li><p style="margin-left:15px;"><a href="<?php echo site_url('murid/kursus'); ?>">Pemesanan kursus <b>'+val['nama_pelajaran']+'</b> telah dilihat</a></p></li>');
			});
		};
	});

	$.get("<?php echo site_url('murid/check_notif2/') ?>")
	.done(function(result) {
		if (jQuery.parseJSON(result).length > 0) {
			notif = notif+jQuery.parseJSON(result).length;
			$('#notif-count').text(notif);
			$.each(jQuery.parseJSON(result), function(key, val){
				$('#notif-item').append('<li><p style="margin-left:15px;"><a href="<?php echo site_url('murid/kursus'); ?>">Pemesanan kursus <b>'+val['nama_pelajaran']+'</b> telah dilihat</a></p></li>');
			});
		};
	});
};
</script>