$(function() {
	var kabupaten3 = <?php echo $data_publik->kabupaten_mengajar ?>;
	for (var i = 1; i <= $('#kabupaten').children().length; i++) {
	  if (kabupaten3 == $('#kabupaten').children(":nth-child("+i+")").val()) {$('#kabupaten').children(":nth-child("+i+")").attr('selected', 'true')};
	};

	var pendidikan = <?php echo $data_publik->pendidikan_terakhir ?>;
	for (var i = 1; i <= $('#pendidikan_terakhir').children().length; i++) {
	  if (pendidikan == $('#pendidikan_terakhir').children(":nth-child("+i+")").val()) {$('#pendidikan_terakhir').children(":nth-child("+i+")").attr('selected', 'true')};
	};
});