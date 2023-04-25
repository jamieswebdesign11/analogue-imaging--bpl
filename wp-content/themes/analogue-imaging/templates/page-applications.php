<!--/**
* Template Name: Applications Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('banner'); 
$mainHeading = get_field('main_heading');
$downloadBrochurePopup = get_field('download_brochure_popup');
$downloadBrochureTitle = $downloadBrochurePopup['download_brochure_title']; $downloadBrochureSubTitle = $downloadBrochurePopup['download_brochure_sub_title']; $downloadBrochureForm = $downloadBrochurePopup['download_brochure_form'];
?>
<?php if($banner): ?>
<div id="interior-banner" <?php echo $banner ? 'style="background-image:url('. $banner[ 'url'] . ')"' : '' ?>></div>
<?php endif; ?>
<div id="main-interior-center">
    <div class="main-interior-center-inner container">
        <?php echo $mainHeading ? '<h1>'. $mainHeading .'</h1>' : ''; ?>
    </div>
</div>
<?php if(have_rows('application_repeater')): ?>
<div id="applications">
    <?php $i=0; while(have_rows('application_repeater')): the_row(); $i++;
    $image = get_sub_field('image'); $applicationGroup = get_sub_field('application_group'); $title = $applicationGroup['title']; $content = $applicationGroup['content']; $requestSamples = $applicationGroup['request_samples']; $applicationsTitle = $applicationGroup['applications_title']; $applications = $applicationGroup['applications']; $recommendedProductsTitle = get_sub_field('recommended_products_title'); $requestBrochure = get_sub_field('request_brochure'); $applicationId = seo_friendly_url($title); 
    ?>
    <div id="<?php echo $applicationId; ?>" class="application-full" <?php echo $image ? 'style="background-image: url('. $image[ 'url'] . ')"' : ''; ?>>
        <div class="application-full-inner container-fluid flex-display">
            <div class="application-box flex-50-lg">
                <div class="application-content-box">
                    <?php echo $title ? '<h2>'. $title .'</h2>' : ''; ?>
                    <?php echo $content ? $content : ''; ?>
                    <?php echo $requestSamples ? '<div class="request-sample-btn"><a class="btn" href="'. $requestSamples['url'] .'" title="'. $requestSamples['title'] .'" target="'. $requestSamples['target'] .'">'. $requestSamples['title'] .'</a></div>' : ''; ?>
                    <?php echo $applicationsTitle ? '<h3>'. $applicationsTitle .'</h3>' : ''; ?>
                    <?php echo $applications ? '<div class="specific-applications">'. $applications .'</div>' : ''; ?>
                </div>
                <?php if(have_rows('recommended_products')): ?>
                <div class="recommended-products">
                    <?php echo $recommendedProductsTitle ? '<h3>'. $recommendedProductsTitle .'</h3>' : ''; ?>
                    <?php while(have_rows('recommended_products')): the_row(); 
                    $product = get_sub_field('product');
                    ?>
                    <?php echo $product ? '<span class="recommended-product">'. $product .'</span>' : ''; ?>
                    <?php endwhile; ?>
                    <div class="pdf-dropdown">
                        <?php echo $requestBrochure ? '<a class="request-brochure-btn btn">'. $requestBrochure['title'] .'</a>' : ''; ?>
                        <div class="pdf-dropdown-inner">
                            <?php $j=0; while(have_rows('recommended_products')): the_row(); $j++;
                            $pdf = get_sub_field('pdf'); $product = get_sub_field('product'); ?>
                            <?php echo $pdf ? '<a class="pdf-popup-link" data-pdf="'. $pdf['url'] .'" data-popup-open="popup-emailModal">'. $product .' Brochure</a>' : ''; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>
<div class="popup brochure-popup" data-popup="popup-emailModal" id="pdf-email-modal">
    <div class="popup-inner">
        <?php echo $downloadBrochureTitle ? '<h2>'. $downloadBrochureTitle .'</h2>' : ''; ?>
        <?php echo $downloadBrochureSubTitle ? '<h4>'. $downloadBrochureSubTitle .'</h4>' : ''; ?>
        <?php if($downloadBrochureForm): $formShort = '[gravityform id='. $downloadBrochureForm .' title=false description=false tabindex=49]'; echo do_shortcode($formShort); endif; ?>
        <a class="btn download-pdf-link" download>Submit and Download</a>
        <a class="close-link" data-popup-close="popup-emailModal">Close</a>
        <a class="popup-close" data-popup-close="popup-emailModal">x</a>
    </div>
</div>
<?php endwhile; endif; get_footer(); ?>
