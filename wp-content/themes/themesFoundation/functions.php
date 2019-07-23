<?php
add_theme_support('menus');
add_theme_support('widgets');
add_theme_support('post-thumbnails');

function register_my_widgets()
{
    register_sidebar(array(
        'name' => "Правая боковая панель сайта",
        'id' => 'right-sidebar',
        'description' => 'Эти виджеты будут показаны в правой колонке сайта',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'register_my_widgets');


add_action('wp_enqueue_scripts', 'wp_script_files');
function wp_script_files()
{

    wp_enqueue_style('style-themes', get_template_directory_uri() . '/css/app.css');
    wp_enqueue_style('style-foundtn', "https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/css/foundation.min.css");
    wp_enqueue_style('style-fancybox', "https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css");
    wp_enqueue_style('style-fontawesome', "https://use.fontawesome.com/releases/v5.9.0/css/all.css");
    wp_enqueue_style('style-slick-slider', "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css", '', false, false);

    wp_enqueue_script('script-fancybox', "https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js", array('jquery'));
    wp_enqueue_script('script-foundtn', "https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/js/foundation.min.js");
    wp_enqueue_script('script-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'));

    wp_enqueue_script('script-slider-slick', get_template_directory_uri() . '/js/slick.min.js');

}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page('Theme Settings');

}


function load_more_scripts()
{
    global $wp_query;

    wp_register_script('my_loadmore', get_template_directory_uri() . '/js/ajax.js', array('jquery'));

    wp_localize_script('my_loadmore', 'loadmore_params', array(
        'ajaxurl' => admin_url('admin-ajax.php', 'relative'),
    ));

    wp_enqueue_script('my_loadmore');
}

add_action('wp_enqueue_scripts', 'load_more_scripts', 11);


function loadmore_ajax_handler()
{

    ob_start();

    if (isset($_POST['delta']) && !empty($_POST['delta'])) {
        $terms_count = wp_count_terms('industries_category');

        $delta = $_POST['delta'];

        $terms = get_terms(array(
            'taxonomy' => 'industries_category',
            'get' => 'all',
            'orderby' => 'name',
            'order' => 'ASC',
            'offset' => $delta
        ));

        if(count($terms) != 0) {
            for ($i = $delta; $i < count($terms) && $i < $delta + 3; $i++): ?>

                <div class="column column__industry large-4 medium-4 small-12">
                    <div class="card card__industry">
                        <img src="<?php the_field('image_industry_category', $terms[$i]) ?>" alt="category-logo"
                             class="float-center">
                        <div class="card-section">
                            <h4 class="text-center"><a
                                        href="<?php echo get_term_link($terms[$i]) ?>"><?php echo $terms[$i]->name ?>
                                    <i class="fas fa-chevron-right"></i></a></h4>
                        </div>
                    </div>
                </div>
            <?php
            endfor;
        }
        else
        {
            die();
        }
    }


    die();

}


add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
