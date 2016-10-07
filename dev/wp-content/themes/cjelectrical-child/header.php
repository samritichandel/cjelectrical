<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	  <link rel="icon" href="<?php echo get_stylesheet_directory_uri()?>/images/favimg.png" type="image/x-icon">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php $custom_settings=get_option('Cj_settings');
$header_title=$custom_settings['Cj_text_field_0'];
$header_subtitle=$custom_settings['Cj_text_field_1'];
$phone_text=$custom_settings['Cj_text_field_2'];
$phone_number=$custom_settings['Cj_text_field_3'];
$GLOBALS['phone']=$phone_number;


?>
<!--preloader-->
    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i>
    </div>
    <!--preloader-->
	<header class="animated" id="masthead">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo">
                        <a href="<?php echo site_url(); ?>" title=""><img src="<?php echo get_stylesheet_directory_uri()?>/images/logo.png" alt="logo"></a>
                    </div>
                    <div class="header_middle_cntnt">
                        <h5><?php if($header_title)  echo $header_title;?></h5>
                        <p> <span><?php if($header_subtitle) echo $header_subtitle; ?></span></p>
                    </div>
					
                    <div class="contact_top">
						<figure> <i class="fa fa-phone" aria-hidden="true"></i></figure>
                            <h3><span><?php if($phone_text)  echo $phone_text;?></span><a href="tel:<?php if($phone_number) echo str_replace(' ', '', $phone_number); ?>" class="cont_no" target="_blank"><?php if($phone_number) echo $phone_number ;?></a></h3> 
                    </div>
                </div>
            </div>
        </div>
        <div class="header_btm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <nav>
                            
							<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
										'container'=> false
									 ) );
								?>
                            
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--nav end-->
    </header>
    <!--header end-->

