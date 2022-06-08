<?/*
Template name: Contact
*/?>
<?php 
get_header();
?>

    <section class="inner-cap contact-cp">
      <div class="container col-xxl-8 px-4 py-2">
        <div class="row  d-flex align-items-center justify-content-center g-5 py-5 text-center">
          <div class="col-lg-8">
            <?php the_content();?>
          </div>
      </div>
    </section>
    <!--FREE QUOTE FORM START HERE-->
    <section class="contact-form py-3">
      <div class="container px-5 py-5">
        <div class="row pb-0">
          <div class="col-sm-12 col-lg-6">
            <?php echo get_field( "contact_form_title" );?>
              <?php echo do_shortcode("[contact-form-7 id='26' title='Contact form']"); ?>
          </div>
          <div class="col-sm-12 col-lg-6 pt-5 mt-5 ps-5 inform">
            <h3 class="mb-3">Contact Information</h3>
            <div class="info-contact mb-4">
              <h5>ADDRESS</h5>
              <p><?php echo get_option('address'); ?> </p>
            </div>
            <div class="info-contact mb-4">              
                <h5>PHONE:</h5>
                <a href="tel:<?php echo get_option('phone'); ?>"></a>
                  <p> <?php echo get_option('phone'); ?></p>
                </a>
            </div>
            <div class="info-contact mb-4">              
                <h5>EMAIL</h5>
                <a  href="mailto:<?php echo get_option('email'); ?>">
                <p><?php echo get_option('email'); ?></p>
                </a>
            </div>
            <div class="info-contact mb-4">              
              <h5>FOLLOW US</h5>
              <ul class="my-0 py-0 me-3">
                <li>
                  <a href="<?php echo get_option('facebook'); ?>"><img class="img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/p-facebook.svg"></a>
                </li>
                <li>
                  <a href="<?php echo get_option('twitter'); ?>"><img class="img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/p-twitter.svg"></a>
                </li>
                <li>
                  <a href="<?php echo get_option('youtube'); ?>"><img class="img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/p-youtube.svg"></a>
                </li>
                <li class="mr-0">
                  <a href="<?php echo get_option('skype'); ?>"><img class="img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/p-skype.svg"></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <section class="map">
      <div class="">      
        <?php echo get_field( "maps" );?>
      </div>
    </section>
    <!---============================FAQ SECTION-->
    <section class="faq py-5">
      <div class="container px-4">      
        <div class="row d-flex align-items-center justify-content-center ">
          <div class="col-sm-12 col-lg-12 text-center">
            <?php echo get_field( "faq_title" );?>
            
          </div>       
        </div>
        <div class="row row-cols-lg-12 pt-4">   
          <div class="accordion" id="accordionExample">
            <?php   
          $i=1;
          if( have_rows('faq') ):

    // Loop through rows.
    while( have_rows('faq') ) : the_row(); ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading<?php echo $i?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i?>" aria-expanded="true" aria-controls="collapseOne">
                  <?php echo get_sub_field('title'); ?>
                </button>
              </h2>
              <div id="collapse<?php echo $i?>" class="accordion-collapse collapse <?php echo $i==1 ? 'show' : ''?>" aria-labelledby="heading<?php echo $i?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php echo get_sub_field('description'); ?>
                </div>
              </div>
            </div>
            <?php
              $i++; 
               endwhile;

        else :
        endif;
            ?>
            
          </div>
        </div>
      </div>
    </section>
 
  <?php 
get_footer();
?>