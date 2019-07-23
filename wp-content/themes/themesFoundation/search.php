<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
?>

<div class="wrapper" id="search-wrapper">


    <div class="row p-0 m-0">
        <header class="page-header page-header-search">

            <h1 class="page-title"><?php printf(

                    esc_html__('Search Results for: ', 'understrap'),
                    '<span>' . get_search_query() . '</span>'); ?>
                <br>
                <?php printf(esc_html__(' %s', 'understrap'), '<span>' . get_search_query() . '</span>'); ?>
            </h1>

        </header><!-- .page-header -->
        <main class="site-main" id="main"></main><!-- #main -->
    </div>
    <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="column large-4 small-12">
                <div class="card">
                    <div class="card_image" style="background-image: url('<?php
                    if(!empty(get_the_post_thumbnail_url())) {
                      echo  get_the_post_thumbnail_url();
                    }else{
                     echo  get_template_directory_uri() . '/img/no-image.png';
                    }

                    ?>')">
                    </div>
                     <div class="card-section">
                        <h4> <a href="<?php the_permalink(); ?>" class="thumbnail-image">
                                <?php the_title(); ?>
                            </a></h4>
                        <div class="card_content"><?php the_content() ?></div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>

    </div>

</div>

</div>
</div>
<?php get_footer(); ?>
