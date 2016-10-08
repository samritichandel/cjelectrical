<?php
/**
 * Template Name: Home
*/

get_header(); 

while ( have_posts() ) : the_post();
?>

 <section class="banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
				
				<div class="item active"> 
				<?php 
				if(has_post_thumbnail())
				{
					the_post_thumbnail( 'full' );
				}
				else
				{
					?>
					<img src="<?php //echo  get_stylesheet_directory_uri()?>/images/bg-banner.jpg" alt="banner">
					<?php
				}
				?>
				
				
                     <div class="banner_caption">
						<?php $caption_above=get_field('banner_caption_above',4);
							  $caption_below=get_field('banner_caption_below',4);
							?>
                        <h6><?php if($caption_above) echo $caption_above;?></h6>
                        <h5><?php if($caption_below) echo $caption_below; ?></h5>
                     </div>
                </div>
            </div>
        </div>
    </section>
   <!-- banner end-->
    <section class="home_descp">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
					
					<p><?php the_content();?></p>
					<a href="tel:<?php if($phone)  echo str_replace(' ', '', $phone);?>" title=""><i class="fa fa-phone" aria-hidden="true"></i><span><?php if($phone)  echo $phone;?></span></a> </div>
			 </div>
        </div>
    </section>
    <!--home_descp end-->
    <section class="services_sec">
        
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="services_content">
					<?php 
		$electrician_section_one_image=get_field('electrician_section_one_image',4);
		$electrician_section_one_title=get_field('electrician_section_one_title',4);
		$electrician_section_one_content=get_field('electrician_section_one_content',4);
					?>
                       <figure><img src="<?php if($electrician_section_one_image)  echo $electrician_section_one_image;?>" alt="electrcian-1"></figure>
                        <h4><?php if($electrician_section_one_title) echo $electrician_section_one_title;?></h4>
                        <p><?php if($electrician_section_one_content) echo $electrician_section_one_content; ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services_content">
					<?php 
		$electrician_section_twoimage=get_field('electrician_section_twoimage',4);
		$electrician_section_two_title=get_field('electrician_section_two_title',4);
		$electrician_section_two_content=get_field('electrician_section_two_content',4);
					?>
                      <figure><img src="<?php if($electrician_section_twoimage)  echo $electrician_section_twoimage;?>" alt="electrcian-1"></figure>
                        <h4><?php if($electrician_section_two_title) echo $electrician_section_two_title;?></h4>
                        <p><?php if($electrician_section_two_content) echo $electrician_section_two_content; ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services_content">
					<?php 
		$electrician_section_third_image=get_field('electrician_section_third_image',4);
		$electrician_section_third_title=get_field('electrician_section_third_title',4);
	$electrician_section_third_content=get_field('electrician_section_third_content',4);
					?>
                       <figure><img src="<?php if($electrician_section_third_image)  echo $electrician_section_third_image;?>" alt="electrcian-1"></figure>
                        <h4><?php if($electrician_section_third_title) echo $electrician_section_third_title;?></h4>
                        <p><?php if($electrician_section_third_content) echo $electrician_section_third_content; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--services end-->
    <section class="about_sec">
	<?php  $back_img=get_field('text_below_electrician_section_background',4); 
			$sty='style="background-image:url('.$back_img.')"';
	?>
        <div class="abt_bx" <?php if($sty) echo $sty;?>>
              <div class="container">
                  <div class="abt_descp">
                   <div class="abt_bx_descp">
                      <?php $text=get_field('text_below_electrician_section',4);
							if($text)
								echo $text;
					  ?>                         
                   </div>
                </div>
              </div>    
        </div>
        <!--abt_bx end-->
        <div class="container">
            <div class="about_us" id="about">
                <div class="row">
                    <div class="col-sm-8 about_us_lft">
                        <h5>Shortly</h5>
						<?php
							//get the content from about us page
							$title_about_us=get_field('about_us_title',4);
							$content_about_us = get_field('about_us_content',4);
						?>
                        <h2><?php if($title_about_us) echo $title_about_us; ?></h2>
                       <?php  if($content_about_us) echo wpautop( $content_about_us );$content_about_us;?>
                    </div>
                    <!--about_us_lft end-->
           
                    <div class="col-sm-4 about_form">
                        <div class="form">
                            
                            <h5>contact</h5>
                            <h2>form</h2>
							<?php  
								echo do_shortcode('[contact-form-7 id="24" title="Contact form"]');
							?>
                           <!-- <p>                               
                                <input type="text" placeholder="Name"> </p>
                            <p>
                                <input type="text" placeholder="Phone"> </p>
                            <p>
                                <input type="text" placeholder="Email"> </p>
                            <p>
                                <textarea type="text" placeholder="Enquiry"></textarea>
                            </p>
                            <p>
                                <input type="submit" value="SUBMIT"> </p>-->
                        </div>
                    </div>
                </div>
            </div>
            <!--about_us end-->
        </div>
    </section>
    <!--about_sec end-->
	    <a id="services"></a>
 <section class="elec_detail_sec">
        <div class="container">
            <div class="elec_details">
                <ul class="detail_list">
					<?php 
					$argms=array(
					'post_type'=> 'services',
					'post_status' => 'publish',
					'posts_per_page' =>-1
					);
					$the_query=new WP_Query( $argms );
					if($the_query->have_posts()){
						while ( $the_query->have_posts() ) {
						$the_query->the_post();
						?>
						<li><div class="list_img"><?php the_post_thumbnail('thumbnail'); ?></div><?php echo get_the_title(); ?></li>
						<?php }
					}?>
                </ul>
            </div>
        </div>
    </section>
    <!-- elec_detail_sec end -->
	<?php $background=get_field('testimonial_background',4);
	$style='style="background-image:url('.$background.')"';
	?>
    <section class="testmonials_sec" id="testimonials" <?php if($style) echo $style; ?> >
        <div class="container">
             <h3>Testimonials</h3>
			 
				<?php
					
					$args=array(
					'post_type'=> 'testimonials',
					'post_status' => 'publish',
					'posts_per_page' =>-1
					);
					$the_query=new WP_Query( $args );
					?>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
				<?php 
				if($the_query->have_posts()){
					$i=0;
					while ( $the_query->have_posts() ) {
					$the_query->the_post();
					?>
                    <div class="item <?php if($i==0) echo 'active';?> ">
                        <div class="carousel-caption">
                          <?php the_content();?>
						  <p><cite><?php echo get_the_title(); ?><span></span></cite></p>
                         
                        </div>
                      </div>
				<?php $i++;}}?>
     
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
             <a href="#" class="btn-review">TRUE LOCAL REVIEWS</a> 
        </div>      
    </section>
    <!-- testmonials_sec end -->
<script>
jQuery('nav ul li:first').addClass('current-menu');
</script>
<?php
endwhile;
 get_footer(); ?>
