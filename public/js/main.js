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
	$(window).resize(function() {
		var tamanhoJanela = $(window).width();
		$(".nav-toggle").remove();
		
		if (tamanhoJanela < 800) {
		$('.nav').css('left', '-175px').addClass('side-fechado');
		$('.nav').append( "<div class='nav-toggle'>Menu</div>" );
		$('.foto').css("left", 0);
		} else {
		$('.nav').css('left', '0px').addClass('side-fechado');
		}
		});
		
		$(document).ready(function() {
		var tamanhoJanela = $(window).width();
		$(".nav-toggle").remove();
		
		if (tamanhoJanela < 800) {
		$('.nav').css('left', '-175px').addClass('side-fechado');;
		$('.nav').append( "<div class='nav-toggle'>Menu</div>" );
		} else {
		$('.nav').css('left', '0px').addClass('side-fechado');
		}
	});
	function menu() {
		$('.nav-toggle').click(function() {
		if($(".nav").hasClass("side-fechado")) {
		$('.nav').animate({
		left: "0px",
		}, 100, function() {
		$(".nav").removeClass("side-fechado");
		});
		}
		else {
		$('.nav').animate({
		left: "-175px",
		}, 100, function() {
		$(".nav").addClass("side-fechado");
		});
		}
		});
		}
});