<!--/**
* Template Name: Single Product Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('banner'); 
$mainImage = get_field('main_image');
$mainContentGroup = get_field('main_content_group');
$mainHeading = $mainContentGroup['main_heading']; $mainContent = $mainContentGroup['main_content'];
?>
<?php if($banner): ?>
<div id="interior-banner" <?php echo $banner ? 'style="background-image:url('. $banner['url'] .')"' : '' ?>></div>
<?php endif; ?>
<div id="main-interior">
    <div class="main-interior container-fluid">
        <?php echo $mainImage ? '<img class="img-responsive pull-left" src="'. $mainImage['url'] .'" title="'. $mainImage['title'] .'" alt="'. $mainImage['alt'] .'">' : ''; ?>
        <?php echo $mainHeading ? '<h1>'. $mainHeading .'</h1>' : ''; ?>
        <?php echo $mainContent ? $mainContent : ''; ?>
    </div>
</div>
<?php endwhile; endif; get_footer(); ?>
