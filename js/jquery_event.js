jQuery(document).ready(function($) {
	$("#firstName").change(function(event) {
	    var fullname = $("#fullName");
		fullname.text("Full Name: " + $("#lastName").val() + " " + $("#firstName").val() );
	});
	$("#lastName").change(function(event) {
		var fullname = $("#fullName");
		fullname.text("Full Name: " + $("#lastName").val() + " " + $("#firstName").val() );
	});
	$(".sex").change(function(event) {
		var sex = $("#sex");
		sex.text("Sex: " + $(this).val() );
	});
	$('select').change(function(event) {
		var nationality = $("#nationality");
		nationality.text("Nationality: " + $("select option:selected").text());
	});
});