<?/*
Template name: Services
*/?>
<?php 
get_header();
?>

  <section class="inner-cap services-cp">
    <div class="container col-xxl-8 px-4 py-2">
      <div class="row  d-flex align-items-center justify-content-center g-5 py-5 text-center">
        <div class="col-lg-8">
          <?php the_content();?>
        </div>
    </div>
  </section>
  <section class="serivces py-3">
    <div class="container px-4 py-5">       
      <div class="row d-flex align-items-center justify-content-center ">
        <div class="col-sm-12 col-lg-9 text-center">
          <h2><?php echo get_field( "title" );?></h2>
          <hr class="hr align-items-left justify-content-left mb-3" />
          <p class="mb-3"><?php echo get_field( "description" );?></p>
        </div>       
      </div>
      <div class="container mt-2">
        <div class="row row-cols-lg-3 pt-4">
          <?php  $args = array( 'post_type' => 'service','post_status'=>'publish','order'    => 'DESC', 'posts_per_page' => -1 );
                    $new_query = new WP_Query( $args );
                    if ($new_query->have_posts()) {
                    while($new_query->have_posts()){
                    $new_query->the_post();
                    $title = $post->post_title; 
                    $description = $post->post_content;

                     $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
             ?>
          <div class="process col mb-0 mb-2">
            <div class="card">
              <div class="feature-icon d-inline-flex align-items-center justify-content-center mb-3">
                <img src="<?php echo $image[0];?>" class="img-fluid" loading="lazy">
              </div>
              <h5 class="text-center"><?php echo $title; ?></h5>
              <p class="mb-0 text-center"><?php echo wp_trim_words( $description, 20); ?> </p>
              <a href="<?php the_permalink(); ?>" class="read text-center">Read More         
              </a>
            </div>
          </div>
                                    <?php
              }
        }
    
    wp_reset_query();
    ?>

        <div class="row d-flex align-items-center justify-content-center mt-5">
        <button type="button" class="aplwhte-btn btn btn-primary btn-lg px-4 me-md-2">Let’s Get Started</button> 
        </div> 
      </div>
    </div>
  </section>
  <section class="success py-3">
    <div class="container px-4 py-5">      
      <div class="row flex-lg-row-reverse align-items-center"> 
        <div class="col-sm-8 col-lg-6">
          <img src="<?php echo get_field( "c_image" );?>" class="img-fluid" loading="lazy">
        </div> 
        <div class="col-sm-8 col-lg-6">
          <h2 class="mb-0"><?php echo get_field( "c_title" );?></h2>
          <hr class="hr align-items-center justify-content-center mb-5">   <br />        
            <button type="button" class="aplwhte-btn btn btn-primary btn-lg px-4 me-md-2 "><?php echo get_field( "c_button" );?></button>           
        </div>       
      </div>
    </div>
  </section>
  <?php 
    $expert = get_post(71); 
    $src = wp_get_attachment_image_src( get_post_thumbnail_id(71), 'thumbnail_size' );
    $expert_image = $src[0];
  ?>
  <section class="quote-form py-3">
    <div class="container px-4 py-5">      
      <div class="row align-items-center"> 
        <div class="col-sm-6 col-lg-6 pe-5">
          <img src="<?php echo  $expert_image;?>" class="img-fluid" loading="lazy">
        </div>       
        <div class="col-sm-6 col-lg-6">            
         <?php echo $expert->post_content;?>
          


          <?php echo do_shortcode("[contact-form-7 id='70' title='Our Expert']"); ?> 
        </div>     
      </div>
    </div>
  </section> 
    <section class="testimonials py-3">
    <div class="container px-4 py-5">      
      <div class="row d-flex align-items-center justify-content-center ">
        <div class="col-sm-12 col-lg-6 text-center">
          <h2><?php echo get_field( "title",24 );?></h2>
          <hr class="hr align-items-left justify-content-left mb-5" />
        </div>       
      </div>
      <div class="container mt-5">
        <div class="row">
          <?php if( have_rows('testimonial', 24) ): ?>
    <?php while( have_rows('testimonial', 24) ): the_row(); ?>
            <div class="col-md-6 mb-2">
                <div class="testimonial rounded">
                  <img class="rounded-circle test-pic img-fluid" src="<?php the_sub_field('image'); ?>" width="100">
                  <img class="mb-3" src="<?php echo get_template_directory_uri();?>/assets/images/quote.svg" width="50">
                    <p><?php the_sub_field('description'); ?></p>
                    <div class="d-flex flex-row align-items-center">
                        <div class="ml-2 about"><h5 class="d-block name"><?php the_sub_field('title'); ?></h5><span class="place"><?php the_sub_field('position'); ?></span></div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5 pamsar-clients--classic ">
    <div class="container">      
      <div class="row d-flex align-items-center justify-content-center ">
        <div class="col-sm-12 col-lg-9 text-center">
          <h2><?php echo get_field( "main_title",37 );?></h2>          
          <hr class="hr align-items-left justify-content-left mb-2" />
          <p><?php echo get_field( "description",37 );?></p>
        </div>       
      </div>
      <div class="container mt-5">
        <div class="pamsar-clients__wrapper">
          <?php if( have_rows('partner_logo', 37) ): ?>
    <?php while( have_rows('partner_logo', 37) ): the_row(); ?>
          <div class="pamsar-clients__holder">
          <a href="#" target="_self">
          <img src="<?php the_sub_field('image'); ?>" data-lazy-src="<?php the_sub_field('image'); ?>" class="attachment-full size-full" alt="" loading="lazy" width="69" height="67"> </a>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
          </div>
      </div>
    </div>
  </section>    
 
  <?php 
get_footer();
?>