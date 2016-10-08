<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
$custom_settings_footer=get_option('Cj_settings');
$phone=$custom_settings_footer['Cj_text_field_3'];
$copyright_text=$custom_settings_footer['Cj_text_field_4'];
$email=$custom_settings_footer['Cj_text_field_5'];
$gplus_link=$custom_settings_footer['Cj_text_field_6'];
$fb_link=$custom_settings_footer['Cj_text_field_7'];


?>
 <footer>
        <div class="ftr_tp" id="contact">
           <div class="container">
               <div class="footer-content">
                   <div class="row">
                       <div class="col-sm-6">
                           
                           <div class="footer-form">
                               <h6>request a</h6>
                                <h2> quote</h2>
								<?php echo do_shortcode('[contact-form-7 id="25" title="Contact Form Footer"]'); ?>
                               <!-- <form class="form">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="tel:" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <textarea placeholder="Message"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-submit" value="Submit">
                                </form>-->
                            </div>
                       </div>
                       <div class="col-sm-6">
                           <div class="footer-links">
                                
                                <ul>
                                    <li>
                                        <div class="contact_links">
                                            <figure> <i class="fa fa-phone" aria-hidden="true"></i></figure>
                                            <h3><span>phone</span><a href="tel:<?php if($phone) echo str_replace(' ', '', $phone); ?>" class="cont_no"><?php if($phone) echo $phone ;?></a></h3> 
                                        </div>
                                    </li>
                                     <li>
                                         <div class="contact_links">
                                            <figure> <i class="fa fa-envelope" aria-hidden="true"></i></figure>
                                            <h3><span>email</span><a href="mailto:<?php if($email) echo $email;?>"><?php if($email) echo $email;?></a></h3> 
                                        </div>
                                    </li>
                                </ul>
                               <ul class="social_links">
                                   <li><a target="_blank" href="<?php if($gplus_link) echo $gplus_link;?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                   <li><a target="_blank" href="<?php if($fb_link) echo $fb_link; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                               </ul>
                            </div>
                       </div>
                    </div>      
               </div>
           </div>         
       </div> 
         <div class="copyright">
            <div class="container">
                <p><?php if($copyright_text) echo $copyright_text;?></p>
            </div>
         </div>
<!--copyright end-->
       
   </footer>
    <!--footer end-->
   <a href="#0" class="cd-top">Top</a> 
        
    <!-- Jquery Files Link -->
    

   
		
<?php wp_footer(); ?>


  <script>
   jQuery(function () {
    jQuery('ul>li>a[href*=#]:not([href=#])').click(function () {
		jQuery("ul>li:first").removeClass("current-menu");
     if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      var winWidth = jQuery(window).width();
         
      if (winWidth > 1199) {
       var hgt = jQuery('.animated').height();
		var fin_hgt = (parseInt(hgt) * 1.1);
       if (target.length) {
        jQuery('html,body').animate({
         scrollTop: target.offset().top
        }, 1000);
		jQuery("nav>ul>li.current-menu").removeClass("current-menu");
		jQuery(this).parent().addClass("current-menu");
        return false;
       }
	   
      }     
      if (winWidth <= 480) {
       var hgt = jQuery('.animated').height();
		var fin_hgt = (parseInt(hgt) * 1);
       if (target.length) {
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
       if (target.length) {
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
       var hgt1 = jQuery('.animated').height();
		var fin_hgt1 = (parseInt(hgt1) * 1);
       if (target.length) {
        jQuery('html,body').animate({
         scrollTop: target.offset().top - fin_hgt1
        }, 1000);
		jQuery("nav>ul>li.current-menu").removeClass("current-menu");
		jQuery(this).parent().addClass("current-menu");
        return false;
       }
      }
if (winWidth >= 991)
	   {
       var hgt2 = jQuery('.animated').height();
       if (target.length) {
        jQuery('html,body').animate({
         scrollTop: target.offset().top - hgt2
        }, 1000);
		jQuery("nav>ul>li.current-menu").removeClass("current-menu");
		jQuery(this).parent().addClass("current-menu");
        return false;
       }
      }
     }
    });
   });
  </script>
<script>
                jQuery(function ($) {

            //Preloader
            var preloader = $('.preloader');
            jQuery(window).load(function () {
                preloader.remove();
            });
        });
    </script>
<script type="text/javascript">
   
       jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 1) {
               jQuery('header').addClass("sticky");
            }
            else {
                jQuery('header').removeClass("sticky");
            }
        });
    </script>
	<script>
	jQuery(document).ready(function () {
	jQuery('#contact-form-name,#footer-name').keydown(function (e) {
	if (e.shiftKey || e.ctrlKey || e.altKey) {
	e.preventDefault();
	} else {
	var key = e.keyCode;
	if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
	e.preventDefault();
	}
	}
	});
	});
</script>
</body>
</html>
