<!DOCTYPE html>
<html lang="en" data-ng-app="website">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>WOCE | WORLD OF CIRCULAR ECONOMY | Blog</title>
    <link rel="icon" href="assets/image/logo/woce.webp" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="description"
        content="Explore the Sustainable Future: Dive into the World of Circular Economy - Discover insightful articles and resources on sustainable practices, innovation, and eco-friendly solutions at WorldOfCircularEconomy.com. Join us in shaping a greener tomorrow">
    <meta name="keywords"
        content="WOCE, Circular economy, Sustainable development, Resource management, Eco-friendly solutions, Green business, Sustainable production, Renewable energy, Sustainable consumption, Circular economy models, Circular cities, Sustainable entrepreneurship, Carbon dioxide (CO2), Carbon footprint, Carbon emissions, Carbon sequestration, Carbon capture and storage (CCS), Carbo neutrality, Carbon offsetting, Carbon pricing, Carbon credits, Carbon trading, Carbon reduction strategies, Carbon tax, Carbon-intensive industries, Carbon dioxide equivalent (CO2e), Carbon sinks, Carbon-based fuels, Carbon accounting, Carbon disclosure, Carbon management">
    <meta property="og:image" content="assets/image/logo/woce.webp">
    <meta property="og:title" content="WOCE | WORLD OF CIRCULAR ECONOMY | Blog">
    <meta property="og:description"
        content="Explore the Sustainable Future: Dive into the World of Circular Economy - Discover insightful articles and resources on sustainable practices, innovation, and eco-friendly solutions at WorldOfCircularEconomy.com. Join us in shaping a greener tomorrow">
    <meta property="og:url" content="https://www.worldofcirculareconomy.com/blog.php">
    <meta property="og:site_name" content="WOCE | WORLD OF CIRCULAR ECONOMY | Blog">
    <meta property="og:type" content="website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="assets/fonts/fontawesome-webfont.woff">
    <link rel="canonical" href="https://www.worldofcirculareconomy.com/blog.php"/>
    <link rel="stylesheet" href="assets/css/assets.min.css"/>
    <style>
        @import url(//fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic|Oswald:regular,200,300,500,600,700&subset=latin,latin-ext,vietnamese,cyrillic);
    </style>
    <link rel="stylesheet" href="assets/css/styles.css" id="moto-website-style"/>
</head>

<body class="moto-background moto-website_live">
    <div class="page">
    <header id="section-header" class="header moto-section" data-widget="section" data-container="section">
        </header>
        <section id="section-content" class="content page-3 moto-section" data-widget="section" data-container="section">
            <div class="moto-widget moto-widget-row row-fixed row-gutter-0 moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="lala" style="background-image:url(https://img.freepik.com/premium-photo/classic-blue-background-exotic-leaves-is-painted-classic-blue-color_139863-92.jpg?w=740);background-position:center;background-repeat:no-repeat;background-size:cover;" data-bg-position="center">
                <div class="container-fluid">
                    <div class="row" data-container="container">
                        <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-animation="">
                                <div class="moto-widget-text-content moto-widget-text-editable">
                                    <h1 style="text-align: center;" class="moto-text_system_3">Blog</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="moto-widget moto-widget-row row-fixed row-gutter-0 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="lala" data-bg-position="center">
                <div class="container-fluid">
                    <div class="row" data-container="container">
                        <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-animation="">
                                <div class="moto-widget-text-content moto-widget-text-editable">
                                    <ul class="collapsed">
                                        <li><a href="index.html">Home</a></li>
                                        <li>Blog</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include_once(dirname(__FILE__) . "/assets/includes/connection_inner.php");
            $rsBlogs = $Q_obj->BlogsListing($_GET['query']);
            $Datanum = $Q_obj->numRows($rsBlogs);

            if (isset($_GET['page'])) {
                $pge = (int) $_GET['page'];
                $pgname = 'blog.php?page=';
            } else {
                $pge = 1;
                $pgname = 'blog.php?page=';
            }

            $size = 5; // number of messages to display

            $pagination->setLink($pgname . "%s");
            $pagination->setPage($pge);
            $pagination->setSize($size);
            $pagination->setTotalRecords($Datanum);

            $rsBlogs .= " " . $pagination->getLimitSql();
            $rsBlogs = $Q_obj->QueryExecuteList($rsBlogs);

            $blogRecent = $Q_obj->RecentBlogs('');
            ?>

            <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="row" data-spacing="lama" data-bg-position="left top">
                <div class="container-fluid">
                    <div class="row" data-container="container">
                        <div class="moto-cell col-sm-9 moto-widget moto-widget-row__column" data-container="container" data-widget="row.column" data-bg-position="left top">
                            <div data-widget-id="wid__blog_post_list__5afd5a6e949b2" class="moto-widget moto-widget-blog-post_list moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="blog.post_list">
                                <ul class="moto-blog-posts-list">
                                    <?php
                                    if ($Datanum > 0) {
                                        foreach ($rsBlogs as $record) {
                                    ?>
                                            <li class="moto-blog-posts-list-item">
                                                <article>
                                                    <div class="moto-widget moto-widget-row" data-widget="row">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="moto-cell col-sm-12" data-container="container">
                                                                    <div class="moto-widget moto-widget-text moto-preset-default moto-align-left  moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-preset="default" data-widget="text">
                                                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                                                            <h2 class="moto-text_221">
                                                                                <a href="blog-details.php?id=<?php echo $record['id']; ?>"><?php echo stripslashes($record['title']); ?></a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                    <div class="moto-widget moto-widget-row" data-widget="row">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="moto-cell col-sm" data-container="container">
                                                                                    <div data-widget-id="wid__blog_post_published_on__64394247f3651" class="moto-widget moto-widget-blog-post_published_on moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-preset="default" data-widget="blog.post_published_on" data-spacing="aasa" style="display: flex; justify-content: space-between;">
                                                                                        <div class="moto-text_219">
                                                                                            <span class="fa fa-calendar moto-widget-blog-post_published_on-icon"></span><span class="moto-widget-blog-post_published_on-date">
                                                                                                <?php echo date("d F, Y", strtotime($record['blog_date'])); ?>
                                                                                            </span>
                                                                                        </div>
                                                                                       <!-- Author Name Start -->
                                                                                       <div class="moto-text_219">
                                                                                       <?php if(!empty($record['author'])){ ?>
                                                                                            <span class="fa fa-address-book moto-widget-blog-post_published_on-icon"></span><span class="moto-widget-blog-post_published_on-date">
                                                                                                <?php echo $record['author']; ?>
                                                                                            </span>
                                                                                            <?php }?>
                                                                                        </div>
                                                                                       <!-- Author Name End -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div data-widget-id="wid__image__64394247f37cc" class="moto-widget moto-widget-image moto-widget_with-deferred-content moto-preset-3 moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="image">
                                                                        <a href="blog-details.php?id=<?php echo $record['id']; ?>" data-action="blog.post" class="moto-widget-image-link moto-link">
                                                                            <img data-src="<?php echo $record['blog_image']; ?>" src="<?php echo $record['blog_image']; ?>" class="moto-widget-deferred-content lazyload blog-image" data-id="" title="<?php echo stripslashes($record['title']); ?>" alt="<?php echo stripslashes($record['title']); ?>">
                                                                        </a>
                                                                    </div>
                                                                    <div class="moto-blog-post-content moto-widget-text moto-preset-default  moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto">
                                                                        <p class="moto-text_normal text-justify"><?php echo strip_tags(stripslashes($record['blog_desp'])); ?></p>
                                                                    </div>
                                                                    <div data-widget-id="wid__button__643942480006d" class="moto-widget moto-widget-button moto-preset-default moto-preset-provider-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="button">
                                                                        <a href="blog-details.php?id=<?php echo $record['id']; ?>" data-action="blog.post" class="moto-widget-button-link moto-size-small moto-link"><span class="fa moto-widget-theme-icon"></span><span class="moto-widget-button-divider"></span><span class="moto-widget-button-label">Read
                                                                                More</span></a>
                                                                    </div>
                                                                    <div class="moto-widget moto-widget-divider moto-preset-3 moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto moto-align-center" data-widget="divider_horizontal" data-divider-type="horizontal" data-preset="3">
                                                                        <hr class="moto-widget-divider-line">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                        <?php } ?>
                                </ul>
                            <?php } else { ?>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <div style="text-align: center; color:red">No Results</div>
                                </div>
                            <?php } ?>
                            <div class="moto-widget moto-widget-pagination moto-preset-default moto-spacing-top-small moto-spacing-bottom-small moto-align-left" data-widget="pagination" data-preset="default">
                                <?php $navigation = $pagination->create_links();
                                echo $navigation; ?>
                            </div>
                            </div>
                        </div>
                        <div class="moto-cell col-sm-3 moto-widget moto-widget-row__column" data-container="container" data-widget="row.column" data-bg-position="left top">
                            <div data-widget-id="wid_1575040381_oudq9dovw" class="moto-widget moto-widget-spacer moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto " data-widget="spacer" data-preset="default" data-spacing="aaaa" data-visible-on="+desktop,tablet,mobile-h,mobile-v">
                                <div class="moto-widget-spacer-block" style="height:19px"></div>
                            </div>
                            <div id="wid_1575040348_bwu4aovey" class="moto-widget moto-widget-google-search-box moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto  " data-widget="google_search.box">
                                <form class="moto-widget-google-search-box__form" action="blog.php" method="get">
                                    <div class="moto-form__element moto-form__element_input moto-form__element_field-with-button">
                                        <div class="moto-form__field ">
                                            <input class="moto-form__field-control moto-form__field-control_input moto-form__field-control_attachment" name="query" type="text" placeholder="Search..." value="" required>
                                            <div data-widget-id="wid__button__64394248028f5" class="moto-widget moto-widget-button moto-preset-default moto-preset-provider-default moto-align-left moto-align-small_left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto  " data-widget="button">
                                                <button type="submit" class="moto-widget-button-link moto-size-medium moto-link"><span class="fa moto-widget-theme-icon"></span><span class="moto-widget-button-divider"></span><span class="moto-widget-button-label">GO!</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr class="moto-widget-divider-line" style="max-width:100%;width:100%;">

                            <div data-widget-id="wid__blog_recent_posts__5afd5a6ea2f6b" class="moto-widget moto-widget-blog-recent_posts moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto " data-widget="blog.recent_posts">
                                <div class="moto-widget-blog-recent_posts-title">
                                    <div class="moto-widget moto-widget-text moto-preset-default moto-align-left  moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-preset="default" data-spacing="aasa">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            <p class="moto-text_240">Recent Posts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="moto-widget moto-widget-row" data-widget="row">
                                    <div class="container-fluid">
                                        <div class="row moto-widget-blog-recent_posts-list">

                                            <?php
                                            if (count($blogRecent) > 0) {
                                                foreach ($blogRecent as $recentBlog) {
                                            ?>
                                                    <div class="moto-cell col-sm-12 moto-widget-blog-recent_posts-item">
                                                        <div class="moto-widget-blog-recent_posts-item__content  moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto">
                                                            <div class="moto-widget-blog-recent_posts-item-preview">
                                                                <div data-widget-id="wid__image__6439424804b24" class="moto-widget moto-widget-image moto-widget_with-deferred-content moto-preset-3 moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="image">
                                                                    <a href="blog-details.php?id=<?php echo $recentBlog['id']; ?>" data-action="url" class="moto-widget-image-link moto-link">
                                                                        <img data-src="<?php echo $recentBlog['blog_image']; ?>" src="<?php echo $recentBlog['blog_image']; ?>" class="moto-widget-deferred-content lazyload blog-img" data-id="" title="<?php echo stripslashes($recentBlog['title']); ?>" alt="<?php echo stripslashes($recentBlog['title']); ?>">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="moto-widget-blog-recent_posts-item-title">
                                                                <div class="moto-widget moto-widget-text moto-align-left  moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-preset="default" data-spacing="aasa">
                                                                    <div class="moto-widget-text-content moto-widget-text-editable">
                                                                        <h2 class="blog-post-title moto-text_219">
                                                                            <a href="blog-details.php?id=<?php echo $recentBlog['id']; ?>"><?php echo stripslashes($recentBlog['title']); ?></a>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer id="section-footer" class="footer moto-section" data-widget="section" data-container="section">
    </footer>
    <div data-moto-back-to-top-button class="moto-back-to-top-button">
        <a ng-click="toTop($event)" class="moto-back-to-top-button-link">
            <span class="moto-back-to-top-button-icon fa"></span>
        </a>
    </div>
    <script data-cfasync="false">
        var websiteConfig = websiteConfig || {};
        websiteConfig.relativeAddress = '/';
        websiteConfig.addressHash = '83b9878aae843bac802aaed151ae15f1';
        websiteConfig.apiUrl = 'api.html';
        websiteConfig.preferredLocale = 'en_US';
        websiteConfig.preferredLanguage = websiteConfig.preferredLocale.substring(0, 2);
        websiteConfig.back_to_top_button = {
            "topOffset": 300,
            "animationTime": 500,
            "type": "theme"
        };
        websiteConfig.popup_preferences = {
            "loading_error_message": "The content could not be loaded."
        };
        websiteConfig.lazy_loading = {
            "enabled": true
        };
        if (window.websiteConfig.lazy_loading && !window.websiteConfig.lazy_loading.enabled) {
            window.lazySizesConfig = window.lazySizesConfig || {};
            window.lazySizesConfig.preloadAfterLoad = true;
        }
    </script>
    <script src="assets/js/website.assets.min.js" data-cfasync="false"></script>
    <script data-cfasync="false">
        angular.module('website.plugins', []);
    </script>
    <script src="assets/js/website.min.js" data-cfasync="false"></script>
    <script>
        $.fn.motoGoogleMap.setApiKey('AIzaSyCPbz3W389x_owB2TlrqPuMEYCTFVuRvMY');
    </script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/header-footer.js"></script>
       <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZPN589F6N3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZPN589F6N3');
</script>
</body>

</html>