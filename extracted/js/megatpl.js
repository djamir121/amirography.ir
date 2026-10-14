$(document).ready(function()
{
    $("input[type=submit], a img").stop().fadeTo(555, 1);
$("input[type=submit], a img").hover(function () {
	jQuery(this).stop().fadeTo(555, 0.5);}, 
function () {
	jQuery(this).stop().fadeTo(555, 1);
});
    //***************************************
    $('.latest2 ul').cycle({ 
        fx: 'blindY',
        easing: 'easeInOutBack',
        speed: 1500,
        pause:true,
        timeout: 1500,
    	 next:  '.prev2',
        prev:  '.next2' 
    });
    $('.latest3 ul').cycle({ 
        fx: 'blindY',
        easing: 'easeInOutBack',
        speed: 1500,
        pause:true,
        timeout: 1500,
    	 next:  '.prev',
        prev:  '.next' 
    });
    //***************************************
       
    
});