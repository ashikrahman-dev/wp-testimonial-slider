<?php
/*
* Plugin Name: LSU Testimonial slider
* Plugin URI: https://www.washcyqf.elementor.cloud
* Description: This is a slider plugin for Views Weekend
* Version: 1.0
*/



function lsu_testimony_register_cpt() {
    
    $labels = [
        'name' => 'LSU Testimony'
    ];

    $args = [
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'page_attributes', 'custom-fields']
    ];


    

    register_post_type('lsu-testimony-slider', $args);

}

add_action('init', 'lsu_testimony_register_cpt');


function lsu_testimony_short_code() {

    $args = [
        'post_type' => 'lsu-testimony-slider',
        'posts_per_page' => -1
    ];

    $query = new WP_Query($args);


    $html = '<div class="splide" id="lsu_testimony" role="group" aria-label="Splide Basic HTML Example">
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev">
                        
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.13281 9.56719L9.9875 17.2523C10.0555 17.3109 10.1422 17.3437 10.2336 17.3437L12.3078 17.3437C12.4812 17.3437 12.5609 17.1281 12.4297 17.0156L4.22187 9.89062L17.9375 9.89062C18.0406 9.89062 18.125 9.80625 18.125 9.70312L18.125 8.29688C18.125 8.19375 18.0406 8.10937 17.9375 8.10937L4.22422 8.10937L12.432 0.984375C12.5633 0.869531 12.4836 0.65625 12.3102 0.656249L10.1656 0.656249C10.1211 0.656249 10.0766 0.672656 10.0438 0.703124L1.13281 8.43281C1.05168 8.50337 0.986621 8.59051 0.942038 8.68836C0.897458 8.7862 0.874388 8.89247 0.874388 9C0.874388 9.10752 0.897458 9.2138 0.942038 9.31164C0.986621 9.40949 1.05168 9.49663 1.13281 9.56719Z" fill="#5D6878"/>
                    </svg>                                       
                    
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.8672 8.43281L9.0125 0.747656C8.94453 0.689062 8.85781 0.65625 8.76641 0.65625H6.69219C6.51875 0.65625 6.43906 0.871875 6.57031 0.984375L14.7781 8.10938H1.0625C0.959375 8.10938 0.875 8.19375 0.875 8.29688V9.70312C0.875 9.80625 0.959375 9.89062 1.0625 9.89062H14.7758L6.56797 17.0156C6.43672 17.1305 6.51641 17.3438 6.68984 17.3438H8.83438C8.87891 17.3438 8.92344 17.3273 8.95625 17.2969L17.8672 9.56719C17.9483 9.49663 18.0134 9.40949 18.058 9.31164C18.1025 9.2138 18.1256 9.10752 18.1256 9C18.1256 8.89248 18.1025 8.7862 18.058 8.68836C18.0134 8.59051 17.9483 8.50337 17.8672 8.43281V8.43281Z" fill="#5D6878"/>
                    </svg>
                    
                    </button>
                </div>
                <div class="splide__track">
                    <ul class="splide__list">';

    while($query->have_posts()) : $query->the_post();


    $html .= '<li class="splide__slide"> 
                    <div class="lsu-testimony-item">
                        <div class="lsu-testimony-author-img">
                            '.get_the_post_thumbnail().'
                        </div>
                        <div class="lsu-testimony-author-review">
                            '.get_the_content().'
                        </div>
                        <h3 class="lsu-testimony-author-name">
                            '.get_the_title().'
                        </h3>
                    </div>
                </li>
                ';


    endwhile; wp_reset_query();

    $html .= '</ul> </div> </div>';

    return $html;

};

add_shortcode('lsu_testimony_slider', 'lsu_testimony_short_code');



function lsu_testimony_plugin_assets() {
    $plugin_dir_url = plugin_dir_url(__FILE__);

    wp_enqueue_style('slick', $plugin_dir_url.'assets/css/splide.min.css');
    // wp_enqueue_style('slick', $plugin_dir_url.'assets/css/slick-theme.min.css');

    wp_enqueue_script('slick', $plugin_dir_url.'assets/js/splide.min.js', array(), '1.0', true);
    wp_enqueue_script('feelbive-mainjs', $plugin_dir_url.'assets/js/lsu-testimony-slider-activation.js', array(), '1.0', true);

}

add_action( 'wp_enqueue_scripts', 'lsu_testimony_plugin_assets' );





// function cw_post_type_news() {
//     $supports = array(
//         'title', // post title
//         'editor', // post content
//         'thumbnail', // featured images
//         'excerpt', // post excerpt
//         'custom-fields', // custom fields
//         'revisions', // post revisions
//     );
//     $labels = array(
//         'name' => _x('news', 'plural'),
//         'singular_name' => _x('news', 'singular'),
//         'menu_name' => _x('news', 'admin menu'),
//         'name_admin_bar' => _x('news', 'admin bar'),
//         'add_new' => _x('Add New', 'add new'),
//         'add_new_item' => __('Add New news'),
//         'new_item' => __('New news'),
//         'edit_item' => __('Edit news'),
//         'view_item' => __('View news'),
//         'all_items' => __('All news'),
//         'search_items' => __('Search news'),
//         'not_found' => __('No news found.'),
//     );
//     $args = array(
//         'supports' => $supports,
//         'labels' => $labels,
//         'public' => true,
//         'query_var' => true,
//         'rewrite' => array('slug' => 'news'),
//         'has_archive' => true,
//         'hierarchical' => false,
//     );
//     register_post_type('news', $args);
// }
// add_action('init', 'cw_post_type_news');