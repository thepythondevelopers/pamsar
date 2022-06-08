<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pamsar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Pamsar - IT Solutions</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo get_template_directory_uri();?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo get_template_directory_uri();?>/assets/style/custom.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>
<script src="<?php echo get_template_directory_uri();?>/assets/dist/js/bootstrap.bundle.min.js"></script>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'pamsar' ); ?></a>

<header>
    <section class="top-header d-sm-block d-none">
      <div class="container-fluid">
          <div class="top-content d-flex align-items-center justify-content-between py-2">
              <div class="top-headers">
                  <ul class="mb-0 pb-0">
                      <li>                        
                            <a href="#help" class="">
                              <img class="me-2 img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/location.svg" /><?php echo get_option('address'); ?></a>
                      </li>
                      <li>
                        <a href="tel:<?php echo get_option('phone'); ?>">
                          <img class="me-2 img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/call.svg" /><?php echo get_option('phone'); ?></a>
                      </li>
                      <li>
                        <a href="mailto:<?php echo get_option('email'); ?>">
                          <img class="me-2 img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/mail.svg" /><?php echo get_option('email'); ?></a>
                      </li>
                  </ul>
              </div>
              <div class="top-headers top-headers-2">
                  <ul class="my-0 py-0 me-3">
                      <li>
                          <a href="<?php echo get_option('facebook'); ?>"><img class="img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/fb.svg" /></a>
                      </li>
                      <li>
                          <a href="<?php echo get_option('twitter'); ?>"><img class="img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/tw.svg" /></a>
                      </li>
                      <li>
                          <a href="<?php echo get_option('youtube'); ?>"><img class="img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/yt.svg" /></a>
                      </li>
                      <li class="mr-0">
                          <a href="<?php echo get_option('skype'); ?>"><img class="img-fluid img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/skype.svg" /></a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
    </section>
      <nav class="tpd navbar navbar-expand-sm navbar-light" aria-label="Third navbar example">
        <div class="container-fluid">
          <a class="navbar-brand ms-4" href="<?php echo home_url() ?>">
            <img class="d-block mx-lg-auto img-fluid" src="<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    echo $image[0];?>" />
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbarsExample03" style="">
            <?php
wp_nav_menu( array( 
    'theme_location' => 'my-custom-menu', 
   ) ); 
?>
          </div>
        </div>
      </nav>
  </header>
