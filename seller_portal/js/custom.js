$(function(){
	'use-strict';

	// sidenav control right
	$(".sidenav-control").sideNav({
		edge: 'left',
		closeOnClick: false
	});

	// panel collapse icon
	$(document).on("click",".collapsible-header",function(e){
	    $(this).parent().siblings().find('span i').removeClass('fa-chevron-down')
		$(this).find('span i').toggleClass('fa-chevron-down')
	});

	// slick slider
	$('.slider-slick').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		autoplay: true
	});
	
	// faq collapse icon
	$(document).on("click",".faq-collapsible",function(e){
	    $(this).parent().siblings().find('i').removeClass('fa-minus')
		$(this).find('i').toggleClass('fa-minus')
	});

	// testimonial
	$(".testimonial").owlCarousel({
      	slideSpeed : 300,
      	paginationSpeed : 400,
      	singleItem: true,
  	});

	// tabs
	$('ul.tabs').tabs(); 


	// modal
	$('.modal').modal();
  

});