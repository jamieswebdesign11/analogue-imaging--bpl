<!--/**
* Template Name: About Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('banner'); 
$mainImage = get_field('main_image');
$mainContentGroup = get_field('main_content_group');
$mainHeading = $mainContentGroup['main_heading']; $mainContent = $mainContentGroup['main_content']; 
$timelineConclusion = get_field('timeline_conclusion');
$newsTitle = get_field('news_title');
?>
<?php if($banner): ?>
<div id="interior-banner" <?php echo $banner ? 'style="background-image:url('. $banner[ 'url'] . ')"' : '' ?>></div>
<?php endif; ?>
<div id="main-interior">
    <div class="main-interior-inner container-fluid">
        <div class="main-content-container flex-display-align">
            <div class="main-img flex-40">
                <?php echo $mainImage ? '<img class="img-responsive center-block" src="'. $mainImage['url'] .'" title="'. $mainImage['title'] .'" alt="'. $mainImage['alt'] .'">' : ''; ?>
            </div>
            <div class="main-content-box flex-60">
                <?php echo $mainHeading ? '<h1>'. $mainHeading .'</h1>' : ''; ?>
                <?php echo $mainContent ? $mainContent : ''; ?>
            </div> 
        </div>
    </div>
</div>
<?php if(have_rows('story_timeline')): ?>
<div id="story-timeline">
    <div class="story-timeline-inner container">
        <?php while(have_rows('story_timeline')): the_row(); 
        $date = get_sub_field('date'); $content = get_sub_field('content');
        ?>
        <div class="timeline-event">
            <div class="timeline-date">
                <?php echo $date ? '<h3>'. $date .'</h3>' : ''; ?>
            </div>
            <div class="timeline-content">
                <?php echo $content ? '<span class="timeline-content-inner">'. $content .'</span>' : ''; ?>
            </div>
        </div>
        <?php endwhile; ?>
        <div class="timeline-conclusion">
            <?php echo $timelineConclusion ? $timelineConclusion : ''; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if(have_rows('news')): ?>
<div id="news-and-events">
    <div class="news-and-events-inner container">
        <?php echo $newsTitle ? '<h2>'. $newsTitle .'</h2>' : ''; ?>
        <div class="news-and-events-box">
            <?php $count=0; $group=0; $newsArray = count(get_field('news')); while(have_rows('news')): the_row(); 
            $title = get_sub_field('title'); $location = get_sub_field('location'); $date = get_sub_field('date'); $image = get_sub_field('image'); $imageLink = get_sub_field('image_link'); $content = get_sub_field('content');
            ?>
            <?php if($count%3 == 0){ $group++; ?>
            <div id="news-<?php echo $group; ?>" class="news-group">
                <?php } ?>
                <div class="news-box flex-display-align">
                    <div class="news-info flex-20">
                        <?php echo $title ? '<h3>'. $title .'</h3>' : ''; ?>
                        <?php echo $location ? '<span class="news-location">'. $location .'</span>' : ''; ?>
                        <?php echo $date ? '<span class="news-date">'. $date .'</span>' : ''; ?>
                    </div>
                    <div class="news-img flex-20">
                        <?php echo $imageLink ? '<a href="'. $imageLink['url'] .'" title="'. $imageLink['title'] .'" target="'. $imageLink['target'] .'">' : ''; ?>
                        <?php echo $image ? '<img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'">' : ''; ?>
                        <?php echo $imageLink ? '</a>' : ''; ?>
                    </div>
                    <div class="news-content flex-60">
                        <?php echo $content ? $content : ''; ?>
                    </div>
                </div>
                <?php if($count%3 == 2 || $count + 1 == $newsArray){ ?>
            </div>
            <?php } $count++; ?>
            <?php endwhile; ?>
        </div>
        <div class="news-scrolls">
            <div class="news-scroll-up"><i class="fas fa-angle-up"></i></div>
            <div class="news-scroll-down"><i class="fas fa-angle-down"></i></div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endwhile; endif; get_footer(); ?>
