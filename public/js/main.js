$(document).ready(function(){
	$("#btn-login").click(function(){
		if ($(this).hasClass('active'))
		{} else{
		$(this).addClass('active');
		$("#btn-cadast").removeClass('active');
		$("form").toggleClass("form-login-hide");
		}
	});
	$("#btn-cadast").click(function(){
		if ($(this).hasClass('active'))
		{} else{
		$(this).addClass('active');
		$("#btn-login").removeClass('active');
		$("form").toggleClass("form-login-hide");
		}
	});
	$(".profile-pic").click(function(){
		$("#profile-picture").modal("show")
	});
});