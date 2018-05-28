<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo js_url('jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo js_url('bootstrap.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo js_url('app.min.js'); ?>"></script>
<script src="<?php echo js_url('jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo js_url('dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo js_url('jquery.validationEngine-en.js'); ?>"></script>
<script src="<?php echo js_url('jquery.validationEngine.js'); ?>"></script>
<script src="<?php echo js_url('toastr.min.js'); ?>"></script>
<script src="<?php echo js_url('bootbox.js'); ?>"></script>
<script src="<?php echo js_url('bootstrap-editable.min.js'); ?>"></script>
<script type="text/javascript">
var timeout_id = setTimeout(check_notif, 1000);

function check_notif() {
	var notif = 0;
	$('#notif-item').html('');

	$.get("<?php echo site_url('superadmin/check_notif/') ?>")
	.done(function(result) {
		if (jQuery.parseJSON(result).length > 0) {
			notif = notif+jQuery.parseJSON(result).length;
			$('#notif-count').text(notif);
			$.each(jQuery.parseJSON(result), function(key, val){
				$('#notif-item').append('<li><p style="margin-left:15px;"><a href="<?php echo site_url('superadmin/verifikasi'); ?>">Verifikasi data <b>'+val['nama_user']+'</b></a></p></li>');
			});
		};
	});

	$.get("<?php echo site_url('superadmin/check_notif2/') ?>")
	.done(function(result) {
		if (jQuery.parseJSON(result).length > 0) {
			notif = notif+jQuery.parseJSON(result).length;
			$('#notif-count').text(notif);
			$.each(jQuery.parseJSON(result), function(key, val){
				$('#notif-item').append('<li><p style="margin-left:15px;"><a href="<?php echo site_url('superadmin/tagihan').'/'; ?>'+val['id_user']+'">Tagihan baru dari guru <b>'+val['nama_user']+'</b></a></p></li>');
			});
		};
	});

	$.get("<?php echo site_url('superadmin/check_notif3/') ?>")
	.done(function(result) {
		if (jQuery.parseJSON(result).length > 0) {
			notif = notif+jQuery.parseJSON(result).length;
			$('#notif-count').text(notif);
			$.each(jQuery.parseJSON(result), function(key, val){
				$('#notif-item').append('<li><p style="margin-left:15px;"><a href="<?php echo site_url('superadmin/tagihan').'/'; ?>'+val['id_user']+'">Pembayaran tagihan oleh guru <b>'+val['nama_user']+'</b></a></p></li>');
			});
		};
	});
	var today = new Date();
	if (today.getDate() == 5) {
		notif = notif+1;
		$('#notif-count').text(notif);
		$('#notif-item').append('<li><p style="margin-left:15px;"><a href="<?php echo site_url('superadmin/tagihan'); ?>">Hari ini tanggal pengecekan <b>tagihan!</b></a></p></li>');
	}
};
</script>