<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */ ?>
    <?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
    $image = get_field('single_blog_banner_image'); $title = get_field('main_heading'); $content = get_field('main_content');
    ?>
    <div id="banner">
        <div class="container-fluid banner-inner">
            <div class="row">
                <?php echo $image ? '<img src="'. $image['url'] . '" title="'. $image['title'] .'" alt="'. $image['alt'] .'" class="img-responsive">' : ''; ?>
            </div>
        </div>
    </div>
    </div>
    <div id="interior-main">
        <div class="interior-main-inner container">
            <?php echo $title ? '<h1>'. $title .'</h1>' : ''; ?>
            <?php echo $content ? $content : ''; ?>
        </div>
    </div>
    <?php endwhile; endif; get_footer(); ?>
