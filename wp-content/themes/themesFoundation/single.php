<?php
get_header();
?>
<div class="single padding-vertical-2">
    <div class="row large-12 ">
        <h1 class="text-center"><?php the_title(); ?></h1>
    </div>
    <div class="large-10 medium-11 small-12 padding-horizontal-2 float-center">


            <?php the_content(); ?>




    </div>
</div>
<?php get_footer(); ?>
