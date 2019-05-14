//event saat link di klik

$('.page-scroll').on('click', function(e){
	
	//ambil isi href
	var tujuan = $(this).attr('href');
	//tangkap element ybs
	var elemenTujuan = $(tujuan);

	$('html , body').animate({
		scrollTop: elemenTujuan.offset().top
	}, 2000,'easeInOutCirc');
	
	console.log('ok');
	e.preventDefault();

});

// parallax
$('#arrow').on('click', function(){
	$('html , body').animate({
		scrollTop: 0 }, 2000, 'easeInOutCirc');
});

$(window).scroll(function() {
	var wScroll = $(this).scrollTop();

	if( wScroll > 40){
		$('#arrow').fadeIn();
	}else{
		$('#arrow').fadeOut();
	}

	$('.carousel-caption').css({
		'transform': 'translate(0,-' + wScroll/8 + '%)'
	});
	// // about
	if( wScroll > $('.welcome').offset().top-55) {
		$('.lead').addClass('muncul');
		$('.shop').addClass('aMuncul');
	};
	if( wScroll > $('#order').offset().top-8.9){
		$('#order .card').each(function(i){
			setTimeout(function(){
				$('#order .card').eq(i).addClass('cMuncul');
			}, 800* (i+1));
		});
		
	}
	// if( wScroll > $('#produk').offset().top-8.9){
	// 	$('#produk .card').each(function(i){
	// 		setTimeout(function(){
	// 			$('#produk .card').eq(i).addClass('cMuncul');
	// 		}, 500* (i+1));
	// 	});
		
	// }
	if( wScroll > $('#about').offset().top-2.6){
		$('#about .development').addClass('cMuncul');
		$('#about .website').addClass('cMuncul');
		
	}
	if( wScroll > $('#contact').offset().top-8.9){
		$('#contact .personal #personal li').each(function(i){
			setTimeout(function(){
				$('#contact .personal #personal li').eq(i).addClass('cMuncul');
			}, 500* (i+1));
		});
		
	}
	if( wScroll > $('#contact').offset().top-8.9){
		$('#contact .social #menu li').each(function(i){
			setTimeout(function(){
				$('#contact .social #menu li').eq(i).addClass('cMuncul');
			}, 500* (i+1));
		});
		
	}
	if( wScroll > $('#contact').offset().top-8.9){
		$('#contact .address #address li').each(function(i){
			setTimeout(function(){
				$('#contact .address #address li').eq(i).addClass('cMuncul');
			}, 500* (i+1));
		});
		
	}
	// // portfolio
	// if( wScroll > $('.portfolio').offset().top -100) {
	// 	$('.portfolio .thumbnail').each(function(i){
	// 		setTimeout(function(){
	// 			$('.portfolio .thumbnail').eq(i).addClass('muncul');
	// 		}, 300 * (i+1));
	// 	});
	// }
});











