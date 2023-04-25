<!--/**
* Template Name: Home Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$videoGroup = get_field('video_group');
$videoFile = $videoGroup['video_file']; $bannerLogo = $videoGroup['banner_logo']; $tagline = $videoGroup['tagline']; $productsBtn = $videoGroup['products_button'];
$mainGroup = get_field('main_group');
$mainHeading = $mainGroup['main_heading']; $mainContent = $mainGroup['main_content'];
?>
<?php if($videoFile): ?>
<div id="banner">
    <div class="banner-inner container-fluid">
        <div class="row">
            <?php echo $videoFile ? '<div class="parallax-video"><video autoplay muted loop playsinline><source src="'. $videoFile['url'] .'" type="video/mp4" /></video></div>' : ''; ?>
            <div class="banner-content">
                <div class="banner-content-inner">
                    <?php echo $bannerLogo ? '<a href="'. home_url('/') .'" title="Home"><img class="img-responsive center-block" src="'. $bannerLogo['url'] .'" title="'. $bannerLogo['title'] .'" alt="'. $bannerLogo['alt'] .'"></a>' : ''; ?>
                    <?php echo $tagline ? '<h2>'. $tagline .'</h2>' : ''; ?>
                    <?php echo $productsBtn ? '<a class="btn" href="'. $productsBtn['url'] .'" title="'. $productsBtn['title'] .'" target="'. $productsBtn['target'] .'">'. $productsBtn['title'] .'</a>' : ''; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="main">
    <div class="main-inner container">
        <?php echo $mainHeading ? '<h1>'. $mainHeading .'</h1>' : ''; ?>
        <?php echo $mainContent ? $mainContent : ''; ?>
    </div>
</div>
<?php if(have_rows('quick_link_boxes')): ?>
<div id="quick-link-boxes">
    <div class="quick-link-boxes-inner container">
        <div class="flex-display quick-link-container">
            <?php while(have_rows('quick_link_boxes')): the_row(); 
            $image = get_sub_field('image'); $title = get_sub_field('title'); $link = get_sub_field('link');
            ?>
            <div class="flex-50-sm quick-link-box">
                <?php echo $link ? '<a href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">' : ''; ?>
                <?php echo $image ? '<div class="image-container"><img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'"></div>' : ''; ?>
                <?php echo $title ? '<h3>'. $title .'</h3>' : ''; ?>
                <?php echo $link ? '</a>' : ''; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if(have_rows('features')): ?>
<div id="feature">
    <div class="feature-inner container-fluid">
        <?php while(have_rows('features')): the_row(); 
        $image = get_sub_field('image'); $title = get_sub_field('title'); $content = get_sub_field('content'); $link = get_sub_field('link');
        ?>
        <div class="row">
            <?php echo $image ? '<div class="parallax-img-container"><div class="feature-img" style="background-image:url('. $image['url'] .')"></div></div>' : ''; ?>
            <div class="container feature-content-box">
                <?php echo $title ? '<h2>'. $title .'</h2>' : ''; ?>
                <?php echo $content ? $content : ''; ?>
                <?php echo $link ? '<a class="btn" href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">'. $link['title'] .'</a>' : ''; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>
<?php endwhile; endif; get_footer(); ?>
