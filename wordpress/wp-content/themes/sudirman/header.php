<?php
/**
 * The header for our theme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
 
  <?php wp_head(); ?>
  
  
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
  get_template_part( 'template-parts/header/nav' );
  get_template_part( 'template-parts/header/intro' ); 
?>

<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">