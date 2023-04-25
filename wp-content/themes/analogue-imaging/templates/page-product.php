<!--/**
* Template Name: Product Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('banner'); 
$mainImageVideoGroup = get_field('main_image_video_group');
$mainImage = $mainImageVideoGroup['main_image']; $mainVideoCode = $mainImageVideoGroup['main_video_code'];
$mainContentGroup = get_field('main_content_group');
$mainHeading = $mainContentGroup['main_heading']; $mainContent = $mainContentGroup['main_content']; $learnMore = $mainContentGroup['learn_more']; $additionalContent = $mainContentGroup['additional_content'];
$productComparisonTitle = get_field('product_comparison_title');
$pdf = get_field('pdf'); $downloadBrochureBtnText = get_field('download_brochure_button_text');
$downloadBrochurePopup = get_field('download_brochure_popup');
$downloadBrochureTitle = $downloadBrochurePopup['download_brochure_title']; $downloadBrochureSubTitle = $downloadBrochurePopup['download_brochure_sub_title']; $downloadBrochureForm = $downloadBrochurePopup['download_brochure_form'];
?>
<?php if($banner): ?>
<div id="interior-banner" <?php echo $banner ? 'style="background-image:url('. $banner[ 'url'] . ')"' : '' ?>></div>
<?php endif; ?>
<div id="main-interior">
    <div class="main-interior container-fluid">
        <div class="main-content-container flex-display-align">
            <div class="img-and-vid-controls-box flex-40">
                <div class="img-and-vid-box">
                    <?php echo $mainImage ? '<img class="img-responsive center-block product-image"'. ($mainVideoCode ? 'style="position:absolute;width:100%;"' : '') .'src="'. $mainImage['url'] .'" title="'. $mainImage['title'] .'" alt="'. $mainImage['alt'] .'">' : ''; ?>
                    <?php echo $mainVideoCode ? '<div class="product-video-container embed-responsive embed-responsive-16by9"><iframe id="product-video" class="embed-responsive-item" src="https://player.vimeo.com/video/'. $mainVideoCode .'?api=1&player_id=product-video&color=ffffff&title=0&byline=0&portrait=0&playsinline=1" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>' : ''; ?>
                </div>
                <?php if($mainVideoCode): ?>
                <div class="product-player-controls">
                    <div id="play"><i class="fa fa-play" aria-hidden="true"></i></div>
                    <div id="pause"><i class="fa fa-pause" aria-hidden="true"></i></div>
                </div>
                <?php endif; ?>
            </div>
            <div class="main-product-content-box flex-60">
                <?php echo $mainHeading ? '<h1>'. $mainHeading .'</h1>' : ''; ?>
                <?php echo $mainContent ? $mainContent : ''; ?>
                <?php echo $learnMore ? '<a class="btn learn-more-link" href="'. $learnMore['url'] .'" title="'. $learnMore['title'] .'" target="'. $learnMore['target'] .'">'. $learnMore['title'] .' <i class="fa fa-angle-right" aria-hidden="true"></i></a>' : ''; ?>
            </div>
        </div>
        <div class="additional-content-container">
            <?php echo $additionalContent ? '<div class="additional-product-info">'. $additionalContent .'</div>' : ''; ?>
        </div>
    </div>
</div>
<?php if(have_rows('product_repeater')): ?>
<div id="product-comparisons">
    <div class="product-comparisons-inner container-fluid">
        <?php echo $productComparisonTitle ? '<h2>'. $productComparisonTitle .'</h2>' : ''; ?>
        <div class="product-selection-fields flex-display">
            <?php
            $productRepeater = get_field('product_repeater'); 
            $length = count($productRepeater);
            for($i=0; $i<3; $i++){
                echo '<select class="flex-col" id="select'. $i .'" data-num="'. $i .'">';
                echo '<option>Select Product</option>';
                for($j=0; $j<$length; $j++){
                    echo '<option value="'. $j .'">'. $productRepeater[$j]['heading'] .'</option>';
                }
                echo '</select>';
            }
            ?>
        </div>
        <div class="product-content-columns flex-display">
            <div class="product-content-box flex-col" id="col0"></div>
            <div class="product-content-box flex-col" id="col1"></div>
            <div class="product-content-box flex-col" id="col2"></div>
        </div>
        <?php echo $pdf ? '<a class="btn product-brochure-btn" data-pdf="'. $pdf['url'] .'" title="Download Brochure" data-popup-open="popup-emailModal">'. $downloadBrochureBtnText .'</a>' : ''; ?>
    </div>
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
