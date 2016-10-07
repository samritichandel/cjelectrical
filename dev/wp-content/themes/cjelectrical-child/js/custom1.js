jQuery(document).ready(function(){
	
jQuery('#menu-item-21').addClass('current-menu');
jQuery('p.comment-form-comment label').html('Comment <span class="required">*</span>');
jQuery('nav>ul>li>a').each(function()
{
	jQuery(this).click(function () 
	{
		jQuery('nav ul li').removeClass('current-menu');
		var target = jQuery(this).attr('href');
		jQuery(this).parent('li').addClass('current-menu');
		jQuery('html,body').animate({
		scrollTop: jQuery(target).offset().top
		}, 3000);
		return false;
	});
});

        
jQuery('a[href*=#]:not([href=#])').click(function () 
{
jQuery("nav>ul>li:first").removeClass("current-menu");
if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) 
{
      var target = jQuery(this.hash);
	  target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
  if(target.selector !== "#myCarousel")
	  {
		var winWidth = jQuery(window).width();
		if (winWidth <= 480) 
		{
		var hgt = jQuery('.animated').height();
		var fin_hgt = (parseInt(hgt) * 1.1);
			if (target.length)
			{
				jQuery('html,body').animate({
				scrollTop: target.offset().top - fin_hgt
				}, 1000);
				jQuery("#responsive-menu>li.current-menu").removeClass("current-menu");
				jQuery(this).parent().addClass("current-menu");
				return false;
		   }
		}
	  
	  if ((winWidth <= 765)&&(winWidth >= 481))
	   {
        var hgt3 = jQuery('.animated').height();
		var fin_hgt2 = (parseInt(hgt3) * 1.1);
		if (target.length) 
		{
			jQuery('html,body').animate({
			 scrollTop: target.offset().top - fin_hgt2
			}, 1000);
			jQuery("#responsive-menu>li.current-menu").removeClass("current-menu");
			jQuery(this).parent().addClass("current-menu");
			return false;
       }
      }
	  
	if ((winWidth <= 991)&&(winWidth >= 767))	  
	{
	    jQuery('nav>ul>li>a').each(function()
		{	
		 var uri=jQuery(this).attr(href);
		 jQuery(this).parent('li').addClass('current-menu');
		 var pos = jQuery(uri).offset().top;
		 jQuery('body, html').animate({scrollTop: pos},3000);
		
		});
		
	}
	if ((winWidth <= 1199)&&(winWidth >= 991))	 
	{
		jQuery('nav>ul>li>a').each(function()
		{	
		 var uri=jQuery(this).attr(href);
		 jQuery(this).parent('li').addClass('current-menu');
		 var pos = jQuery(uri).offset().top;
		 jQuery('body, html').animate({scrollTop: pos},3000);
		
		});
		
	}
 
      } //target carousal
	  
	 } //hostname
}); //href click
}); //document ready

   
   
    jQuery('.linkk').click(function () {
    jQuery('html,body').animate({
    scrollTop: jQuery('#contact1').offset().top 
    }, 3000);
    });

    jQuery(function ($) 
	{
		var preloader = $('.preloader');
		jQuery(window).load(function () {
			preloader.remove();
		});
    });

jQuery(window).scroll(function () 
{
	if (jQuery(this).scrollTop() > 1) 
	{
		jQuery('header').addClass("sticky");
	}
	else 
	{
		jQuery('header').removeClass("sticky");
	}
});

