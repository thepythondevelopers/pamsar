<?php
get_header();
?>

  
    <section class="inner-cap blog-cp">
      <div class="container col-xxl-8 px-4 py-2">
        <div class="row  d-flex align-items-center justify-content-center g-5 py-5 text-center">
          <div class="col-lg-8">
            <h1 class="mb-2 text-white">Our Blogs</h1>
            <!-- <h4 class="text-white">Pamsar is a highly reliable website development company, we have catered result-oriented and cost-competitive website</h4> -->
          </div>
      </div>
    </section>

    <!--FREE QUOTE FORM START HERE-->    
    <section class="blogs py-5">
      <div class="container">      
        <div class="row">
          <?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
         $date = $post->post_date;
         ?>
          <div class="col-md-8">
              <article class="blog-single">                                  
                
                <h2 class="blog-post-title mb-2"><?php echo get_the_title();?></h2>
                <p class="blog-post-meta mb-4"><?php pamsar_posted_by();?> <a href="#"><?php echo date('d M,Y',strtotime($date)) ?> </a></p>
                <div class="blog-img mb-3">
                  <img src="<?php echo $image[0] ?>" class="img-fluid" loading="lazy">
                </div>                 
              <?php echo the_content(); ?>
                
              </article>
              <div class="col-sm-12 col-lg-12 mt-5">            
                
                <?php 
                if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;?>
              </div>
          </div>
     <?php
  endwhile;
endif;
    ?>    
          <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
              <div class="p-4 mb-3 bg-light rounded">
                <!-- <h4>About</h4>
                <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
              </div>
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="card-title">Tags</h4>
                  <a class="btn btn-light btn-sm mb-1" href="#">Development</a>
                  <a class="btn btn-light btn-sm mb-1" href="#">Designing</a>
                  <a class="btn btn-light btn-sm mb-1" href="#">eCommerce</a>
                  <a class="btn btn-light btn-sm mb-1" href="#">Python</a>
                  <a class="btn btn-light btn-sm mb-1" href="#">PHP</a>
                  <a class="btn btn-light btn-sm mb-1" href="#">Wordpress</a>
                  <a class="btn btn-light btn-sm mb-1" href="#">HTML</a>
                  <a class="btn btn-light btn-sm mb-1" href="#">CSS</a>
                  <a class="btn btn-light btn-sm mb-1" href="#">Magento</a>
                </div>
              </div> -->
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="card-title">Popular Blogs</h4>
  
                                <?php  $args = array( 'post_type' => 'post','post_status'=>'publish','order'    => 'DESC', 'posts_per_page' => 3 );
                    $new_query = new WP_Query( $args );
                    $i =0; 
                    if ($new_query->have_posts()) {
                    while($new_query->have_posts()){
                      $i++;
                    $new_query->the_post();
                     $client_name = $post_metas['client_name'][0];
                    $title = $post->post_title; 
                    $date = $post->post_date;

                     $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
             ?>
                  <a href="<?php the_permalink(); ?>" class="d-inline-block mb-2">
                    <h6><?php echo $title?></h6>
                    <img src="<?php echo $image[0]?>" class="img-fluid" loading="lazy">
                  </a>
                  <time class="timeago" ><?php echo time_ago(); ?></time>
          <?php
              }
        }
    
    wp_reset_query();
    ?>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 
  
<?php
   get_footer();
   ?>