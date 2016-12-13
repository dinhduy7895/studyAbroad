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
				maxlength: 25
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
				required: "Vui lòng nhập vào đây",
				maxlength: "Tên đăng nhập tối đa 25 ký tự",
			},
			email: {
				required: "Vui lòng nhập vào đây",
				maxlength: "Email tối đa 25 ký tự",
			},
			country: {
				required: "Vui lòng nhập vào đây",
				maxlength: "Tên quốc gia tối đa 25 ký tự",
			},
			aid: {
				required: "Vui lòng nhập vào đây",
			},
			lastname: {
				required: "Vui lòng nhập vào đây",
				maxlength: "Tên đăng nhập tối đa 25 ký tự",
			},
			pass: {
				required: "Vui lòng nhập vào đây",
				maxlength: "Tên đăng nhập tối đa 25 ký tự",
			},
			year:{
				required: "Vui lòng nhập vào đây",
				number: "Phải nhập kiểu chữ số",
				min: "Min là 15",
				max: "Max là 150",
			},
			date:{
				required: "Vui lòng nhập vào đây",
				date: "Không đúng định dạng"
			},
			phoneNumber:{
				required: "Vui lòng nhập vào đây",
				matches1: "nhap dung so dien thoai"
			},
			check:{
				required: "Tick OK if you finish your information"
			},
		},
		
	});
	});