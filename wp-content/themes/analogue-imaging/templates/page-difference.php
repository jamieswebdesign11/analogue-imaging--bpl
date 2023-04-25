<!--/**
* Template Name: Difference Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('banner'); 
$mainImage = get_field('main_image');
$mainBackground = get_field('main_background');
$mainContentGroup = get_field('main_content_group');
$mainHeading = $mainContentGroup['main_heading']; $mainContent = $mainContentGroup['main_content'];
$testimonialsTitle = get_field('testimonials_title');
?>
<?php if($banner): ?>
<div id="interior-banner" <?php echo $banner ? 'style="background-image:url('. $banner[ 'url'] . ')"' : '' ?>></div>
<?php endif; ?>
<div id="main-interior" class="main-background" <?php echo $mainBackground ? 'style="background-image:url('. $mainBackground['url'] .')"' : ''; ?>>
    <div class="main-interior-inner main-background-inner container-fluid">
        <div class="main-content-container flex-display-align">
            <div class="main-content-box flex-70">
                <?php echo $mainHeading ? '<h1>'. $mainHeading .'</h1>' : ''; ?>
                <?php echo $mainContent ? $mainContent : ''; ?>
            </div>
        </div>
    </div>
</div>
<?php if(have_rows('feature_repeater')): ?>
<div id="feature">
    <?php while(have_rows('feature_repeater')): the_row(); 
    $title = get_sub_field('title'); $content = get_sub_field('content'); $image = get_sub_field('image'); $featureId = seo_friendly_url($title);
    ?>
    <div id="<?php echo $featureId; ?>" class="feature-container" <?php echo $image ? 'style="background-image:url('. $image['url'] .')"' : ''; ?>>
        <div class="container-fluid">
            <div class="feature-box flex-display-align">
                <div class="feature-content flex-70">
                    <?php echo $title ? '<h2>'. $title .'</h2>' : ''; ?>
                    <?php echo $content ? $content : ''; ?>
                    <?php if(have_rows('feature_extra_repeater')): while(have_rows('feature_extra_repeater')): the_row(); 
                    $icon = get_sub_field('icon'); $extraContent = get_sub_field('extra_content');
                    ?>
                    <div class="feature-extra-content flex-display-align">
                        <div class="feature-extra-icon flex-10">
                            <?php echo $icon ? '<div class="extra-icon">'. $icon .'</div>' : ''; ?>
                        </div>
                        <div class="feature-extra-content flex-90">
                            <?php echo $extraContent ? $extraContent : ''; ?>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>
<?php if(have_rows('testimonials')): ?>
<div id="testimonials">
    <div class="testimonials-inner container">
        <?php echo $testimonialsTitle ? '<h2>'. $testimonialsTitle .'</h2>' : ''; ?>
        <div class="testimonials-outer-box">
            <div class="testimonials-box">
                <?php while(have_rows('testimonials')): the_row(); 
                $name = get_sub_field('name'); $location = get_sub_field('location'); $content = get_sub_field('content');
                ?>
                <div class="testimonial-box flex-display-align">
                    <div class="testimonial-info flex-20">
                        <?php echo $name ? '<h3>'. $name .'</h3>' : ''; ?>
                        <?php echo $location ? '<span class="testimonial-location">'. $location .'</span>' : ''; ?>
                    </div>
                    <div class="testimonial-content flex-80">
                        <?php echo $content ? $content : ''; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endwhile; endif; get_footer(); ?>
