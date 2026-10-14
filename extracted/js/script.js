



jQuery(document).ready(function($) {


    /*------------ Gallery ------------*/
    if( $('#gallery-slider').length ) {
        var galleryoptions = {
            $AutoPlay: true,
            $AutoPlayInterval: 6000,
            $SlideWidth: 205,
            $SlideHeight: 147,
            $SlideSpacing: 30,
            $Cols: 4,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $ChanceToShow: 2
            }
        };
        var jssor_galleryslider = new $JssorSlider$('gallery-slider', galleryoptions);

        // Scale slider 
        function ScaleSlider() {
            var refSize = jssor_galleryslider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                jssor_galleryslider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
    }


});


/*------------ Daily pic slider ------------*/
jssor_dailypic_starter = function(containerId) {
    var dailypicTransitions = [
        {$Duration:1400,x:0.25,$Zoom:1.5,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Zoom:$JssorEasing$.$EaseInSine},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1400,x:-0.25,$Zoom:1.5,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Zoom:$JssorEasing$.$EaseInSine},$Opacity:2,$ZIndex:-10}}
    ];
    var dailypicoptions = {
        $AutoPlay: true,
        $AutoPlayInterval: 4000,
        $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: dailypicTransitions
        },
        $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$,
            $ChanceToShow: 2,
            $SpacingX: 3
        }
    };
    var jssor_dailypic = new $JssorSlider$(containerId, dailypicoptions);
};