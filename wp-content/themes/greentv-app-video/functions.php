<?php
if (!defined('ABSPATH')) exit;
function gtva_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
    register_nav_menus(['primary' => __('GreenTV App Primary Menu','greentv-app-video')]);
}
add_action('after_setup_theme','gtva_setup');
function gtva_assets(){
    wp_enqueue_style('gtva-fonts','https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',[],null);
    wp_enqueue_style('gtva-style',get_stylesheet_uri(),['gtva-fonts'],wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts','gtva_assets');
function gtva_nav(){
    wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'gtva-menu','fallback_cb'=>'gtva_nav_fallback','depth'=>1]);
}
function gtva_nav_fallback(){
    echo '<ul class="gtva-menu"><li><a href="'.esc_url(home_url('/')).'">Home</a></li><li><a href="'.esc_url(home_url('/streaming/')).'">Streaming</a></li><li><a href="'.esc_url(home_url('/video-categories/')).'">Video Categories</a></li><li><a href="'.esc_url(home_url('/contributors/')).'">Contributors</a></li></ul>';
}
function gtva_video_categories(){
    $cats = get_categories(['hide_empty'=>false,'orderby'=>'name','order'=>'ASC']);
    if (!$cats) return;
    echo '<nav class="gtva-category-list" aria-label="Video categories">';
    foreach($cats as $cat){
        if ($cat->slug === 'uncategorized') continue;
        echo '<a href="'.esc_url(get_category_link($cat)).'"><span>'.esc_html($cat->name).'</span><strong>'.esc_html(number_format_i18n($cat->count)).'</strong></a>';
    }
    echo '</nav>';
}
function gtva_placeholder_video_url(){
    return set_url_scheme(content_url('/uploads/greentv-placeholders/placeholder-loop.mp4'), 'https');
}
