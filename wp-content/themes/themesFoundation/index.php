<?php

get_header(); ?>

    <div class="content">

        <div class="inner-content grid-x grid-margin-x grid-padding-x">

            <main class="main small-12 medium-8 large-8 cell" role="main">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                     <?php the_content(); ?>

                <?php endwhile; ?>


                <?php endif; ?>

            </main> <!-- end #main -->


        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->

<?php get_footer(); ?>