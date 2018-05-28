$(function() {
	var tanggal_lahir = <?php echo date('d', strtotime($data_tambahan->tanggal_lahir)) ?>;
	for (var i = 1; i <= $('#tanggal_lahir').children().length; i++) {
	  if (tanggal_lahir == $('#tanggal_lahir').children(":nth-child("+i+")").val()) {$('#tanggal_lahir').children(":nth-child("+i+")").attr('selected', 'true')};
	};

	var bulan_lahir = <?php echo date('m', strtotime($data_tambahan->tanggal_lahir)) ?>;
	for (var i = 1; i <= $('#bulan_lahir').children().length; i++) {
	  if (bulan_lahir == $('#bulan_lahir').children(":nth-child("+i+")").val()) {$('#bulan_lahir').children(":nth-child("+i+")").attr('selected', 'true')};
	};

	var tahun_lahir = <?php echo date('Y', strtotime($data_tambahan->tanggal_lahir)) ?>;
	for (var i = 1; i <= $('#tahun_lahir').children().length; i++) {
	  if (tahun_lahir == $('#tahun_lahir').children(":nth-child("+i+")").val()) {$('#tahun_lahir').children(":nth-child("+i+")").attr('selected', 'true')};
	};

	var nama_bank = <?php echo $data_tambahan->nama_bank ?>;
	for (var i = 1; i <= $('#nama_bank').children().length; i++) {
	  if (nama_bank == $('#nama_bank').children(":nth-child("+i+")").val()) {$('#nama_bank').children(":nth-child("+i+")").attr('selected', 'true')};
	};
});