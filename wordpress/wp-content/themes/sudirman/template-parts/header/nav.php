<?php
    if (function_exists('get_field')):
        $acf_logo = get_field('logo','options');
        if ($acf_logo = get_field('logo','options')):
            $logo =  $acf_logo['url'];
        else: 
            $logo = get_theme_file_uri().'/assets/img/logo.svg';
        endif; 
    endif; 
?>

<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $logo; ?>"
                    alt="<?php bloginfo( 'name' ); ?>" /></a>
        </div>

        <?php
            wp_nav_menu(
                array(
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'bs-example-navbar-collapse-1',
                    'theme_location' => 'primary',
                    'menu_class' => 'nav navbar-nav navbar-right'
                )
            );
        ?>
    </div>
</nav>