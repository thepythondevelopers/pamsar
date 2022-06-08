<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pamsar
 */

?>

	<footer class="pt-5 px-5">
    <div class="row">
      <div class="col-lg-3 col-md-2 mb-3">
        <a class="" href="<?php echo home_url() ?>">
          <img class="d-block align-items-left img-fluid ali" src="<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    echo $image[0];?>" />
        </a>
        <p class="mt-3"><?php dynamic_sidebar('footer_section1')?></p>
      </div>    
       <div class="col-lg-2 col-md-2 mb-3 ps-5 d-sm-block d-none">
        <?php dynamic_sidebar('footer_menu')?>
        <!-- <h5>Menus</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">About</a></li>
        </ul> -->
      </div>
      <div class="col-lg-2 col-md-2 mb-3 ps-4 d-sm-block d-none">
        <h5>Popular Post</h5>
        <ul class="nav flex-column">
          <?php  $args = array( 'post_type' => 'post','post_status'=>'publish','order'    => 'DESC', 'posts_per_page' => 5 );
                    $new_query = new WP_Query( $args );
                    $i =0; 
                    if ($new_query->have_posts()) {
                    while($new_query->have_posts()){
                      $i++;
                    $new_query->the_post();
                    $title = $post->post_title; 
             ?>
          <li class="nav-item mb-2"><a href="<?php the_permalink(); ?>" class="nav-link p-0"><?php echo wp_trim_words( $title, 5); ?></a></li>
          <?php
              }
        }
    
    wp_reset_query();
    ?>  
        </ul>
      </div>

    <!--   <div class="col-lg-2 col-md-2 mb-3 ps-4 d-sm-block d-none">
        <h5>Services</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">About</a></li>
        </ul>
      </div>
 -->      <div class="col-lg-3 col-md-2 mb-3 d-sm-block d-none">
        <h5>Get In touch</h5>
        <div class="contact-footer">
          <ul class="mx-0 px-0">
              <li> 
                      <img class="me-2 img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/footer-pin.svg"> 
                      <span class="ti">Address</span><br />
                      <span class="info"><?php echo get_option('address'); ?> </span>
              </li>
              <li>
                <a href="tel:<?php echo get_option('phone'); ?>">
                  <img class="me-2 img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/footer-call.svg">
                  <span class="ti">Phone:</span><br />
                  <span class="info"> <?php echo get_option('phone'); ?></span></a>
              </li>
              <li>
                <a href="mailto:pamsar@gmail.com">
                  <img class="me-2 img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/footer-mail.svg">
                  <span class="ti">Mail:</span><br />
                  <span class="info"><?php echo get_option('email'); ?></span></a>
              </li>
          </ul>
      </div>
      </div>
    </div>

    <div class="flex-column text-center flex-sm-row justify-content-between py-2 my-0 border-top">
      <p class="mb-0  justify-content-between"><?php echo get_option('copy'); ?></p>      
    </div>
  </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
