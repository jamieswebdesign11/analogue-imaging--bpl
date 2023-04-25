<!--/**
* Template Name: Sitemap Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('banner'); 
$mainHeading = get_field('main_heading');
?>
<?php if($banner): ?>
<div id="interior-banner" <?php echo $banner ? 'style="background-image:url('. $banner['url'] .')"' : '' ?>></div>
<?php endif; ?>
<div id="main-interior">
    <div class="main-interior container">
        <?php echo $mainHeading ? '<h1 class="sitemap-title">'. $mainHeading .'</h1>' : ''; ?>
    </div>
</div>
<div class="sitemap container">
    <?php wp_nav_menu(array( 'theme_location'=> 'sitemap', 'container' => false, 'menu_class' => 'sitemap-page')); ?>
</div>
<?php endwhile; endif; get_footer(); ?>
