$(document).ready(function(){
/*
	$('.category-name>a').click(function(e){
		e.preventDefault();
		$(this).toggleClass('closed').parent().next().slideToggle();
	}).trigger('click');
*/
	try{
		var $acc_head = $('.categories-list>.category-item>.category-name>a'),
			$acc_body = $('.categories-list>.category-item>.estudos-list'),
			$check  = $('.categories-list>.category-item>.category-name>a.current');
		
		$acc_head.click(function(e){
			e.preventDefault();
			var $this = $(this);
			if (!$this.hasClass('active')) {
				$acc_body.slideUp('normal');
				$this.parent().next().stop(true,true).slideToggle('normal');
				$acc_head.removeClass('active');
				$this.addClass('active');
			}
		});

		$acc_body.slideUp(0);
		if ($check.length) $check.trigger('click')
		else $acc_head.first().trigger('click');
	}catch(e){}
});