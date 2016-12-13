jQuery(document).ready(function($) {
	$('#firstname').change(function(event) {
		var fullname = $('#name');
		fullname.text($('#lastname').val() + " " + $('#firstname').val());
	});
	$('#lastname').change(function(event) {
		var fullname = $('#name');
		fullname.text($('#lastname').val() + " " + $('#firstname').val());
	});
	$('select').change(function(event) {
		var str = "";
		$( "select option:selected" ).each(function() {
			str += $( this ).text() + " ";
		});
		$( "h5#nationality" ).text( str );
	});
	$('.sex').click(function(event) {
		$('h5#sex').text($(this).val());
	});
});