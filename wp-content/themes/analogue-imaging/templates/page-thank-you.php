<!--/**
* Template Name: Thank You Page
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
        <?php echo $mainHeading ? '<h1 class="thank-you">'. $mainHeading .'</h1>' : ''; ?>
    </div>
</div>
<?php endwhile; endif; get_footer(); ?>
