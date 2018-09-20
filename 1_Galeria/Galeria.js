
	$(document).ready(function () {
			
		$(".imgGalery").each(function(i) {
			$(this).delay(50*i).fadeIn();
		});
		
		$(".imgGalery").hover(
		
			function (){
				$(this).animate({
					width: '400px',
					height: '380px'
				});
			},
			
			function (){
				$(this).animate({
					width: '230px',
					height: '200px'
				});
			}			
		);
		
	});
