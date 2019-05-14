//event saat link di klik

$('.page-scroll').on('click', function(e){
	
	//ambil isi href
	var tujuan = $(this).attr('href');
	//tangkap element ybs
	var elemenTujuan = $(tujuan);

	$('html , body').animate({
		scrollTop: elemenTujuan.offset().top-50
	}, 2000,'easeInOutCubic');
	
	console.log('ok');
	e.preventDefault();

});

// parallax

$(window).scroll(function() {
	var wScroll = $(this).scrollTop();

	$('.jumbotron img').css({
		'transform' : 'translate(0px,'+ wScroll/4 +'% )'
	});
	$('.jumbotron h1').css({
			'transform' : 'translate(0px,'+ wScroll/2 +'% )'
		});
	$('.jumbotron p').css({
				'transform' : 'translate(0px,'+ wScroll/1.2 +'% )'
			});
	// about
	if( wScroll > $('.about').offset().top-55) {
		$('.sesi').addClass('pMuncul');
		$('.pKiri').addClass('pMuncul');
		$('.pKanan').addClass('pMuncul');
	};
	// portfolio
	if( wScroll > $('.portfolio').offset().top -100) {
		$('.portfolio .thumbnail').each(function(i){
			setTimeout(function(){
				$('.portfolio .thumbnail').eq(i).addClass('muncul');
			}, 300 * (i+1));
		});
	}
});











