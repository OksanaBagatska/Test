<?php

?>

<footer role="contentinfo">
    <div class="row row-footer-top expanded">
        <div class="column large-2 medium-6 small-12 logo__footer">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php the_field('logo_footer', 'options') ?>" alt="logo-footer"></a>
        </div>
        <div class="column large-3 medium-6 small-12 search__footer">
            <form action="" class="search-form">
                <div class="input-group">
                    <input class="input-group-field input-group-field-search" id="s" name="s" type="text"
                           value="<?php the_search_query(); ?>"
                           placeholder="Search...">
                    <div class="input-group-button">
                        <button type="submit" class="button button_search"> <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="column large-5 medium-6 small-12 small-padding-collapse-0">
            <ul class="inline-list list-info">
                <li><a href="mailto:<?php the_field('email_footer', 'options') ?>"><img
                                src="<?php the_field('email_icon', 'options') ?>"
                                alt="email"><?php the_field('email_footer', 'options') ?></a></li>
                <li><a href="tel:<?php the_field('phone_number_footer', 'options') ?>"><img
                                src="<?php the_field('phone_icon', 'options') ?>"
                                alt="phone"><?php the_field('phone_number_footer', 'options') ?></a></li>
            </ul>
        </div>
        <div class="column large-2 medium-6 small-12 text-center">
            <ul class="social-list inline-list">
                <?php
                if (have_rows('social_menu_footer', 'options')):
                    while (have_rows('social_menu_footer', 'options')) : the_row(); ?>
                        <li><a href="<?php the_sub_field('link_item_footer', 'options'); ?>">
                                <img src="<?php the_sub_field('icon_item_footer', 'options'); ?>" alt="img">
                            </a></li>
                    <?php endwhile;
                endif; ?>
            </ul>
        </div>
    </div>
    <div class="row row-footer-bottom expanded align-center">
        <p><?php the_field('footer_text', 'options'); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html> <!-- end page -->