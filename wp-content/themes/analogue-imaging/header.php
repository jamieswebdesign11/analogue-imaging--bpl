<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- VIEWPORT FOR MOBILE DEVICES -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE & DESCRIPTION -->
    <title>
        <?php wp_title(); ?>
    </title>
    <!-- NO MORE THAN 75 CHAR.-->
    <?php wp_head(); ?>
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/photobox.css">
    <link href="<?php echo get_bloginfo('template_url'); ?>/assets/css/flex.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_bloginfo('template_url'); ?>/style.css?ver=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <?php include('assets/css/base.php'); ?>
    <?php include('assets/css/customStyles.php'); ?>
    <?php $gaCode = get_theme_mod('google_ga_code'); if($gaCode): echo $gaCode; endif; 
    $logo = get_theme_mod('logo_image');
    $businessName = get_theme_mod('business_name'); 
    $phone = get_theme_mod('phone_number'); $email = antispambot(get_theme_mod('email'),1);
    $facebook = get_theme_mod('facebook'); $instagram = get_theme_mod('instagram');
    ?>
</head>


<body <?php body_class(); ?>>
    <div id="header">
        <div class="header-inner flex-display-align">
            <?php echo $logo ? '<div class="logo-container flex-20"><a href="'. home_url('/') .'" title="Home"><img src="'. $logo .'" alt="'. $businessName .' Logo" title="'. $businessName .' Logo" class="img-responsive logo-img"></a></div>' : ''; ?>
            <div class="mobile-c2a">
                <a href="<?php echo home_url('/');?>" title="Home" class="home-link"><i class="fa fa-home"></i></a>
                <div class="c2a-icons">
                    <?php echo $phone ? '<span class="phone"><a href="tel:+1'. $phone .'"><i class="fa fa-phone"></i></a></span>' : ''; ?>
                    <?php echo $email ? '<span class="email"><a href="mailto:'. $email .'"><i class="fa fa-envelope"></i></a></span>' : ''; ?>
                    <?php echo $facebook ? '<a href="'. $facebook .'"><i class="fab fa-facebook"></i></a>' : ''; ?>
                    <?php echo $instagram ? '<a href="'. $instagram .'"><i class="fab fa-instagram"></i></a>' : ''; ?>
                </div>
            </div>
            <div id="main-nav" class="main-nav flex-60">
                <div id="mobile-nav" class="mobile-nav">
                    <?php wp_nav_menu(array('theme_location' => 'mobile_menu', 'items_wrap' => '<ul class="mobile-list">%3$s<li class="nav-toggler" id="nav-toggler"><span class="toggle-text toggle-more">More</span><span class="toggle-text toggle-less">Hide</span><i class="fa fa-angle-down"></i></li></ul>')); ?>
                </div>
                <div id="menu-wrap" class="menu-wrap">
                    <?php wp_nav_menu(array('theme_location' => 'main_menu', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new wp_bootstrap_navwalker())); ?>
                    <?php wp_nav_menu(array('theme_location' => 'mobile_dropdown_menu', 'items_wrap' => '<ul class="nav-list">%3$s</ul>', 'menu_class' => '', )); ?>
                </div>
            </div>
            <div class="social flex-5">
                <?php echo $facebook ? '<a href="'. $facebook .'" target="_blank"><i class="fab fa-facebook"></i></a>' : ''; ?>
                <?php echo $instagram ? '<a href="'. $instagram .'" target="_blank"><i class="fab fa-instagram"></i></a>' : ''; ?>
            </div>
            <div class="desktop-phone flex-15">
                <?php echo $phone ? '<a href="tel:+1'. $phone .'"><i class="fa fa-phone"></i>'. $phone .'</a>' : ''; ?>
            </div>
        </div>
    </div>
