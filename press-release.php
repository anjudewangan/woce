<!DOCTYPE html>
<html lang="en" data-ng-app="website">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>WOCE | WORLD OF CIRCULAR ECONOMY | Press Release</title>
    <link rel="icon" href="assets/image/logo/woce.png" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="description" content="Stay updated with the latest news and announcements from World of Circular Economy through our press release page. Discover insights, achievements, and important updates in the world of sustainability and circular economy.">
    <meta name="keywords" content="WOCE, Circular economy, Sustainable development, Resource management, Eco-friendly solutions, Green business, Sustainable production, Renewable energy, Sustainable consumption, Circular economy models, Circular cities, Sustainable entrepreneurship, Carbon dioxide (CO2), Carbon footprint, Carbon emissions, Carbon sequestration, Carbon capture and storage (CCS), Carbo neutrality, Carbon offsetting, Carbon pricing, Carbon credits, Carbon trading, Carbon reduction strategies, Carbon tax, Carbon-intensive industries, Carbon dioxide equivalent (CO2e), Carbon sinks, Carbon-based fuels, Carbon accounting, Carbon disclosure, Carbon management">
    <meta property="og:image" content="assets/image/logo/woce.png">
    <meta property="og:title" content="WOCE | WORLD OF CIRCULAR ECONOMY | Press Release">
    <meta property="og:description" content="Stay updated with the latest news and announcements from World of Circular Economy through our press release page. Discover insights, achievements, and important updates in the world of sustainability and circular economy.">
    <meta property="og:url" content="https://www.worldofcirculareconomy.com/press-release.php">
    <meta property="og:site_name" content="WOCE | WORLD OF CIRCULAR ECONOMY | Press Release">
    <meta property="og:type" content="website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="assets/fonts/fontawesome-webfont.woff">
    <link rel="canonical" href="https://www.worldofcirculareconomy.com/press-release.php" />
    <link rel="stylesheet" href="assets/css/assets.min.css" />
    <style>
        @import url(//fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic|Oswald:regular,200,300,500,600,700&subset=latin,latin-ext,vietnamese,cyrillic);
    </style>
    <link rel="stylesheet" href="assets/css/styles.css" id="moto-website-style" />
</head>

<body class="moto-background moto-website_live">
    <div class="page">
    <header id="section-header" class="header moto-section" data-widget="section" data-container="section">
        </header>
        <section id="section-content" class="content page-16 moto-section" data-widget="section" data-container="section">
            <div class="moto-widget moto-widget-row row-fixed row-gutter-0 moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="lala" style="background-image:url(./assets/image/dashboard/background.avif);background-position:center;background-repeat:no-repeat;background-size:cover;" data-bg-position="center">
                <div class="container-fluid">
                    <div class="row" data-container="container">
                        <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="sasa" data-animation="">
                                <div class="moto-widget-text-content moto-widget-text-editable">
                                    <h1 style="text-align: center;" class="moto-text_system_3">Press Release</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="maaa" style="background-color: #0d1623;background-position:center;background-repeat:no-repeat;background-size:cover;" data-bg-position="left top">
                <div class="container-fluid">
                    <div class="row" data-container="container">
                        <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
                            <h2 class="moto-text_system_4" style="color: #fff;">
                                Latest Press Release
                            </h2>
                        </div>
                        <?php
                        include_once(dirname(__FILE__) . "/assets/includes/connection_inner.php");

                        $mediaSql = $Q_obj->PressReleaseLates_Listing(10);
                        if (count($mediaSql) > 0) {
                        ?>
                            <div class="container press-container">
                                <ul class="cards">
                                    <?php
                                    foreach ($mediaSql as $i => $record) {
                                    ?>
                                        <li class="card">
                                            <div>
                                                <h2 class="card-title">
                                                    <?php echo stripslashes($record['title']); ?>
                                                </h2>
                                            </div>
                                            <div class="card-link-wrapper">
                                                <div>
                                                    <i><?php echo date("d F, Y", strtotime($record['release_date'])); ?></i>
                                                </div>
                                                <?php
                                                if (file_exists($record['media_document'])) {
                                                ?>
                                                    <a href="<?php echo stripslashes($record['media_document']); ?>" class="card-link" target="_blank">View</a>
                                                    <a href="<?php echo stripslashes($record['media_document']); ?>" class="card-link" download>Download</a>
                                                <?php } ?>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
                            <div class="container press-container">
                                <div class="row" data-container="container">
                                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-4 moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
                                        <h2 class="moto-text_system_4" style="color: #fff;">
                                            All Press Release
                                        </h2>
                                    </div>
                                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-8 moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top" id="myBtnContainer">
                                        <button class="press-release-btn active" onclick="filterSelection('all')">
                                            <h6>All</h6>
                                        </button>
                                        <button class="press-release-btn" onclick="filterSelection('jan-dec-2024')">
                                            <h6>Jan - Dec 2024</h6>
                                        </button>
                                        <button class="press-release-btn" onclick="filterSelection('jan-dec-2023')">
                                            <h6>Jan - Dec 2023</h6>
                                        </button>
                                        <button class="press-release-btn" onclick="filterSelection('jan-dec-2022')">
                                            <h6>Jan - Dec 2022</h6>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                $PressRelease = $Q_obj->PressReleaseLates_Listing(10);
                                if (count($PressRelease) > 0) {
                                ?>
                                    <div class="cards-container">
                                        <?php
                                        foreach ($PressRelease as $PressData) {
                                            $year = date('Y', strtotime($PressData['release_date']));
                                            $monthName = date('m', strtotime($PressData['release_date']));

                                            if ($year == 2024 && ($monthName >= 1 && $monthName <= 12)) {
                                                $classfilter = 'jan-dec-2024';
                                            }
                                            if ($year == 2023 && ($monthName >= 1 && $monthName <= 12)) {
                                                $classfilter = 'jan-dec-2023';
                                            }
                                            if ($year == 2022 && ($monthName >= 1 && $monthName <= 12)) {
                                                $classfilter = 'jan-dec-2022';
                                            }


                                        ?>
                                            <div class="card <?php echo $classfilter; ?> filterDiv">
                                                <div>
                                                    <h2 class="card-title">
                                                        <?php if (strlen($PressData['title']) > 45) {
                                                            echo substr(stripslashes($PressData['title']), 0, 45) . '..';
                                                        } else {
                                                            echo stripslashes($PressData['title']);
                                                        }
                                                        ?>
                                                    </h2>
                                                </div>
                                                <div class="card-link-wrapper">
                                                    <div>
                                                        <i><?php echo date("d F, Y", strtotime($PressData['release_date'])); ?></i>
                                                    </div>
                                                    <?php
                                                    if (file_exists($PressData['media_document'])) {
                                                    ?>
                                                        <a href="<?php echo stripslashes($PressData['media_document']); ?>" class="card-link" target="_blank">View</a>
                                                        <a href="<?php echo stripslashes($PressData['media_document']); ?>" class="card-link" download>Download</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="cards-container col-md-12" style="margin-top:20px;">
                                        <div style="text-align: center; color:red">No Records</div>
                                    </div>
                                <?php } ?>
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
    <script type="text/javascript" data-cfasync="false">
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
    <script src="assets/js/website.assets.min.js" type="text/javascript" data-cfasync="false"></script>
    <script type="text/javascript" data-cfasync="false">
        angular.module('website.plugins', []);
    </script>
    <script src="assets/js/website.min.js" type="text/javascript" data-cfasync="false"></script>
    <script type="text/javascript">
        $.fn.motoGoogleMap.setApiKey('AIzaSyCPbz3W389x_owB2TlrqPuMEYCTFVuRvMY');
    </script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/data-filter.js"></script>
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