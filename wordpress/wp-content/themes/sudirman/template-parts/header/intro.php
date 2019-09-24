<?php
    if (function_exists('get_field')):
        $default_headerbg = get_field('default_header_background','options');
        $default_header_title = get_field('default_header_title', 'options');
        $default_header_subtitle = get_field('default_header_sub_title', 'options');
 

        if ($acf_logo = get_field('logo','options')):
            $logo =  $acf_logo['url'];
        else: 
            $logo = get_theme_file_uri().'/assets/img/logo.svg';
        endif; 
    endif; 
    
    if (is_home() || is_front_page() || is_page()) {
        if ($getheaderbg = get_field('header_background', get_the_ID())) {
            $bg_url = $getheaderbg['url'];
        } else if (!empty($default_headerbg['url'])) {
            $bg_url = $default_headerbg['url'];
        }

        if ($get_header_title = get_field('header_title', get_the_ID())) {
            $header_title = $get_header_title;
        } else {
            $header_title = $default_header_title;
        }

        if ($get_header_sub_title = get_field('header_sub_title', get_the_ID())) {
            $header_sub_title = $get_header_sub_title;
        } else{
            $header_sub_title =  $default_header_subtitle; 
        }
    } else if (get_post_type() === 'post') {
        $header_title = get_the_title();
        $header_sub_title = get_the_excerpt();

        if (has_post_thumbnail()) :
            $bg_url = get_the_post_thumbnail_url();
        else:
            $bg_url = $default_headerbg['url'];
        endif; 
    }
?>
 

<header class="intro-header" style="<?php echo(!empty($bg_url) ? ' background-image: url('.$bg_url.')' : '' ); ?>">
    <div class="container">
        <div class="row">
            <div>
                <div class="<?php echo((get_post_type() == 'post' && !is_front_page()) ?  'post-heading': 'site-heading' );?>">
                    <h1><?php echo $header_title; ?></h1>
                    <hr class="small">
                    <?php
                        echo (!empty($header_sub_title) ? '<span class="subheading">'.$header_sub_title.'</span>' : ''); 
                    ?>
                    <?php 
                        if (is_singular('post')):
                            site_post_meta();
                    ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>