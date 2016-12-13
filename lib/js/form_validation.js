jQuery(document).ready(function($) {
	$('.date').datepicker({dateFormat: 'dd/mm/yy'});

	$( "#signupForm" ).validate( {
		rules: {
			firstname: {
				required: true,
				maxlength: 25
			},
			lastname: {
				required: true,
				maxlength: 25
			},
			name: {
				required: true
			},
			email: {
				required: true,
				maxlength: 25
			},
			country: {
				required: true,
				maxlength: 25
			},
			aid: {
				required: true,
				maxlength: 25
			},
			pass: {
				required: true,
			},
			year: {
				required: true,
				number: true,
				min: 15,
				max: 150
			},
			date: {
				required: true,
				date: true
			},
			phoneNumber: {
				required: true,
				matches1: true
			},
			check:{
				required : true
			}
		},
		messages: {
			firstname: {
				maxlength: "max length is 25 characters",
			},
			email: {
				maxlength: "max length is 100 characters",
			},
			country: {
				maxlength: "max length is 25 characters",
			},
			aid: {
			},
			lastname: {
				maxlength: "max length is 25 characters",
			},
			year:{
				number: "Please enter a number",
				min: "Min is 15",
				max: "Max is 150",
			},
			date:{
				date: "not true format"
			},
			phoneNumber:{
				matches1: "Please enter phone number exactly"
			},
			check:{
				required: "Tick OK if you finish your information"
			},
		},
		
	});
	});