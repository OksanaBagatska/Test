<?php
get_header(); ?>

    <div class="row align-center section_rs">
        <div class="large-5 medium-5 small-12 columns section_rs_left">
            <div class="callout">
                <div class="block_callout">
                    <h3 class="title_section_rs"><?php the_field('title_proven_results') ?></h3>
                    <h3 class="sub_title_section_rs"><?php the_field('sub_title_proven_results') ?></h3>
                    <p class="text_section_rs"><?php the_field('text_proven_results') ?></p>
                    <a href="<?php the_field('button_link_proven_results') ?>"
                       class="button button_section_rs_left"><?php the_field('button_text_proven_results') ?></a>
                </div>
            </div>
        </div>
        <div class="large-5 medium-5 small-12 columns section_rs_right"
             style="background-image: url('<?php the_field("background_image_proven_results") ?>')">
            <a data-fancybox href="<?php the_field('link_video_proven_results') ?>">
                <img src="<?php the_field('icon_play_proven_results') ?>" alt="play">
            </a>
        </div>
    </div>


    <div class="row section_events expanded">
        <div class="bg_section"></div>


        <div class="column large-6 medium-6 small-12 left__slider">
            <h2><?php the_field('title_left_block'); ?></h2>

            <div class="slick-slider slider-nav">
                <?php
                $args = array(
                    'post_type' => 'tribe_events',
                    'orderby' => 'data',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    $count = 0;
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        $count++;
                        $index = $my_query->current_post + 1;
                        ?>
                        <div class="row">
                            <div class="column large-6 small-12 padding-0">
                                <div class="callout callout__event">
                                    <p class="callout__event__date"><span>
                                        <?php
                                        $release_artist1 = get_post_meta(get_the_ID(), '_EventStartDate');
                                        echo get_date_from_gmt($release_artist1[0], ' j');
                                        ?>
                                    </span>
                                        <?php
                                        echo get_date_from_gmt($release_artist1[0], 'M. Y');
                                        ?></p>
                                    <p class="callout__event__time"><?php
                                        echo get_date_from_gmt($release_artist1[0], 'g:i a');
                                        $endDate = get_post_meta(get_the_ID(), 'EventEndDate');
                                        echo '-';
                                        echo get_date_from_gmt($endDate[0], ' g:i a');
                                        ?></p>
                                    <h4><?php the_title(); ?>
                                    </h4>
                                    <div class="callout__event__text"><?php the_excerpt(); ?></div>
                                    <div class="callout__event__price">
                                        <img src="<?php echo get_template_directory_uri() . '/img/price.png' ?> "
                                             alt="price">
                                        <span><strong>$<?php echo tribe_get_cost(get_the_ID()); ?></span></strong></div>
                                    <div class="callout__event__location">
                                        <a href="<?php echo tribe_get_map_link(get_the_ID()); ?> " target="_blank">
                                            <img src="<?php echo get_template_directory_uri() . '/img/location.png' ?>"
                                                 alt="location"></a>
                                        <span><?php echo tribe_get_full_address(); ?></span></div>
                                </div>
                            </div>
                            <div class="column large-6 small-12 padding-0">
                                <div class="image-bg"
                                     style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                                </div>
                            </div>
                        </div>
                    <?php }
                }
                wp_reset_postdata();

                ?>

            </div>
            <div class="pgnt-slick">
                <button class="prev-btn">< Previous</button>
                <span>|</span>
                <button class="next-btn"> Next ></button>
            </div>
        </div>

        <div class="column large-6 medium-6 small-12 right_slider">
            <h2><?php the_field('title_right_block'); ?></h2>

            <div class="list__events slick-slider slider-for">
                <?php
                $args = array(
                    'post_type' => 'tribe_events',
                    'orderby' => 'data',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                        $my_query->the_post(); ?>
                        <div class="row margin-0">
                            <div class="small-12 medium-12 padding-0 column">
                                <div class="card card-product card-product-event horizontal">
                                    <img src="<?php the_field('logo_event'); ?>">
                                    <div class="card-section">
                                        <h4><?php the_title(); ?></h4>
                                        <p class="card-product-event-date"> <?php
                                            $release_artist1 = get_post_meta(get_the_ID(), '_EventStartDate');
                                            echo get_date_from_gmt($release_artist1[0], 'F j, Y @ g:i A');
                                            ?></p>
                                        <div class="card-product-event-text"><?php the_excerpt(); ?></div>
                                    </div>
                                    <div class="card-section card-product-details">
                                        <span class="card-product-link"><a target="_blank"
                                                                           href="<?php echo tribe_get_map_link(get_the_ID()); ?>">
                                                <i class="fas fa-map-marker-alt"></i></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
            <div class="column large-12 padding-0">
                <a href="<?php the_field('button_right_events'); ?>" class="button btn-view-all">
                    <?php the_field('button_text_events'); ?></a>
            </div>
        </div>


    </div>


    <div class="expanded row section_industries">
        <div class="bg_section"></div>
        <h2 class="section_industries_title column large-12 medium-12 small-12 text-center"><?php the_field('title_industries'); ?></h2>
        <h3 class="section_industries_sub_title column large-12 medium-12 small-12 text-center"><?php the_field('sub_title_industries'); ?></h3>
        <?php
        $terms = get_terms(array(
            'taxonomy' => 'industries_category',
            'number' => 3,
            'get' => 'all',
            'orderby' => 'name',
            'order' => 'ASC'
        ));
        ?>
        <div class="row block__industry">
            <?php
            foreach ($terms as $category) {
                ?>
                <div class="column column__industry large-4 medium-4 small-12">
                    <div class="card card__industry">
                        <img src="<?php the_field('image_industry_category', $category) ?>" alt="category-logo"
                             class="float-center">
                        <div class="card-section">
                            <h4 class="text-center">
                                <a href="<?php echo get_term_link($category) ?>"><?php echo $category->name ?>
                                    <i class="fas fa-chevron-right"></i></a></h4>
                        </div>
                    </div>
                </div>
            <?php }
            ?>


            <button class="button float-center load-more"
                    data-tax-count="<?php echo wp_count_terms('industries_category') ?>">
                <?php the_field('button_text_industries') ?></button>


        </div>
    </div>
    <div class="row section_slider expanded">
        <div class="slick_home row slick-slider">
            <?php
            $args = array(
                'post_type' => 'slider',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
            );
            $my_query = new wp_query($args);
            if ($my_query->have_posts()) {
                while ($my_query->have_posts()) {
                    $my_query->the_post(); ?>
                    <div class="column large-6 small-12 card_slick"
                         style='background-image: url("<?php the_post_thumbnail_url(); ?>")'>
                        <div class="card_slick_content">
                            <h3 class="text-center"><?php the_title(); ?></h3>
                            <h4 class="text-center"><?php the_field('sub_title_slick') ?> </h4>
                            <div class="card_slick_text text-center"><?php the_excerpt(); ?></div>
                            <a href='<?php the_field('button_link_slick') ?>' class="button float-center">
                                <?php the_field('button_text_slick') ?></a>
                        </div>
                    </div>
                <?php }
            }
            wp_reset_query(); ?>
        </div>
        <span class="prev"> <img src="<?php echo get_template_directory_uri() . '/img/left.png'; ?>" alt=""></span>
        <span class="next"> <img src="<?php echo get_template_directory_uri() . '/img/right.png'; ?>" alt=""></span>
    </div>

<?php get_footer();