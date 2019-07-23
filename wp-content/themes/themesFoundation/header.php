<!doctype html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">

    <!-- Force IE to use the latest rendering engine available -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta class="foundation-mq">


    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

</head>

<body>
<div class="bg-full-screen" style="background-image: url('<?php the_field('background_image_header', 'options') ?>')">
    <header class="row expanded" data-fixed-container>


        <div class="top-content-section expanded">
            <nav class="top-bar expanded">
                <div class="top-bar-left">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php the_field('header_logo', 'option') ?>" alt="logo">
                    </a>
                </div>
                <div class="top-bar-right">
                    <?php wp_nav_menu(
                        array(
                            'menu' => 'Header menu top',
                            'menu_class' => 'menu menu_header_top',
                            'container_id' => '',
                            'depth' => 2,
                        )
                    ); ?>
                    <?php wp_nav_menu(
                        array(
                            'menu' => 'Header menu bottom',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'menu menu_header_bottom',
                            'depth' => 2,
                        )
                    ); ?>
                </div>
            </nav>
        </div>
        <div class="mobile-menu">
            <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
                <button class="menu-icon" type="button" data-toggle="example-menu"></button>
            </div>

            <div class="top-bar" id="example-menu">
                <div class="top-bar-left">
                    <?php wp_nav_menu(
                        array(
                            'menu' => 'Header mobile',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'menu vertical',
                            'depth' => 2,
                            'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="medium-dropdown">%3$s</ul>',

                        )
                    ); ?>
                </div>
            </div>
        </div>
    </header>

    <div class="middle-content-section content-ps-ab">
        <h1 class="title-section"><?php the_field('title_header', 'options') ?></h1>
        <h2 class="sub-title"><?php the_field('sub_title_header', 'options') ?></h2>
        <p class="subheader"><?php the_field('text_header', 'options') ?></p>
        <a href="<?php the_field('button_link_header', 'options') ?>" class="button button-content-ps-ab">
            <?php the_field('button_text_header', 'options') ?></a>
    </div>
</div>


<div class="main">

