jQuery( document ).ready(function() {
                jQuery('p.comment-form-comment label').html('Comment <span class="required">*</span>');
                //$('p.comment-form-comment label').text('Comment <span class="required">*</span>');
            });

            jQuery(window).scroll(function() {

                if (jQuery(this).scrollTop() > 1){  
                    jQuery('header').addClass("sticky");
                }
                else{
                    jQuery('header').removeClass("sticky");
                }
            });
     