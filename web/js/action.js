/**
 * 
 */
$(document).ready(function() {
    function scrollToAnchor(aid){
        var aTag = $("[name='"+ aid +"']");
        $('html,body').animate({scrollTop: aTag.offset().top-70},'slow');
    }
    $("a").click(function() {
        var href = $(this).attr('href').replace('#', '')
        scrollToAnchor(href);
    });            
});

$('.timeline-item .more-tl span').click(function(){
	if($(this).hasClass('glyphicon-plus')){$(this).removeClass('glyphicon-plus').addClass('glyphicon-minus');}
	else{$(this).removeClass('glyphicon-minus').addClass('glyphicon-plus');}
});

$('.timeline-item .content-tl h3').click(function(){
	$trigger = $(this).parent().parent().parent().find('.more-tl span');
	console.log($trigger);
	if($trigger.hasClass('glyphicon-plus')){$trigger.removeClass('glyphicon-plus').addClass('glyphicon-minus');}
	else{$trigger.removeClass('glyphicon-minus').addClass('glyphicon-plus');}
});

//Function to change the tcontent of the head block
$('.block_title .fa-arrow-circle-right').click(function(){
	nb = $('.block_title .active').attr('id').replace("choix","");
	if(nb<3){
		nb++;
	} else {
		nb=1;
	}
	$('.block_title .active').removeClass('active');
	$('.block_content .active').removeClass('active');
	id="#choix"+nb;
	content="#content"+nb;
	$(id).addClass('active');
	$(content).addClass('active');
});


$('.block_title .fa-arrow-circle-left').click(function(){
	nb = $('.block_title .active').attr('id').replace("choix","");
	if(nb>1){
		nb--;
	} else {
		nb=3;
	}
	$('.block_title .active').removeClass('active');
	$('.block_content .active').removeClass('active');
	id="#choix"+nb;
	content="#content"+nb;
	$(id).addClass('active');
	$(content).addClass('active');

});