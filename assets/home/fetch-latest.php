<?php


include_once("../includes/connection_inner.php");


$getdata = $_POST['getdata'];

//-----Latest Blogs-----------
if ($getdata == 'lastblog') {

  $views = '';
  $latestBlogs = $Q_obj->BlogsLatest();
  if (count($latestBlogs) > 0) {
    foreach ($latestBlogs as $latestData) {
      $views .= '<div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <div data-widget-id="wid_1526467528_x9i1vaf0y"
                        class="moto-widget moto-widget-image moto-widget_with-deferred-content moto-preset-3 moto-align-center moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                        data-widget="image">
                        <span class="moto-widget-image-link">
                          <img data-src="' . $latestData['blog_image'] . '" src="' . $latestData['blog_image'] . '"
                            class="moto-widget-image-picture moto-widget-deferred-content lazyload home-blog-image"
                            data-id="184" title="" alt="' . stripslashes($latestData['title']) . '" />
                        </span>
                      </div>
                      <div
                        class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                        data-widget="text" data-preset="default" data-spacing="sasa" data-visible-on="-"
                        data-animation="">
                        <div class="moto-widget-text-content moto-widget-text-editable">
                          <h3 class="moto-text_system_9">
                            <a data-action="" data-id="3" class="moto-link" href="blog-details.php?id=' . $latestData['id'] . '">' . stripslashes($latestData['title']) . '</a>
                          </h3>
                        </div>
                      </div>
                      <div
                        class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                        data-widget="text" data-preset="default" data-spacing="sasa" data-animation="">
                        <div class="moto-widget-text-content moto-widget-text-editable">
                          <p class="moto-text_204 text-justify">' . stripslashes($latestData['sub_title']) . '</p>
                        </div>
                      </div>
                      <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="moto-text_219">
                          <span class="fa fa-calendar moto-widget-blog-post_published_on-icon"></span><span
                            class="moto-widget-blog-post_published_on-date"> ' . date("d F, Y", strtotime($latestData['blog_date'])) . '</span>
                        </div>
                        <div data-widget-id="wid_1526467807_kzl9znmgx"
                          class="moto-widget moto-widget-button moto-preset-3 moto-preset-provider-default moto-align-right moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                          data-widget="button">
                          <a href="blog-details.php?id=' . $latestData['id'] . '" data-action=""
                            class="moto-widget-button-link moto-size-small moto-link"><span
                              class="fa moto-widget-theme-icon"></span><span
                              class="moto-widget-button-divider"></span><span class="moto-widget-button-label">READ
                              MORE</span></a>
                        </div>
                      </div>
                    </div>';
    }
  } else {
    $views = 'No Latest Blog Data';
  }
  echo json_encode(['html' => $views]);
}

//-----Latest Media-----------
if ($getdata == 'lastmedia') {

  $Economictimes = $Q_obj->MediaLatest('economictimes.indiatimes.com');
  if ($Economictimes != null) {
    $Ecom_title = stripslashes($Economictimes['title']);
    $Ecom_link = $Economictimes['media_url'];
  } else {
    $Ecom_title = 'Be restorative or regenerative while capturing carbon footprint';
    $Ecom_link = 'https://economictimes.indiatimes.com/blogs/author/anup-garg/?source=app&frmapp=yes';
  }
  $Timesofindia = $Q_obj->MediaLatest('timesofindia.indiatimes.com');
  if ($Timesofindia != null) {
    $Time_title = stripslashes($Timesofindia['title']);
    $Time_link = $Timesofindia['media_url'];
  } else {
    $Time_title = 'World EV Day: Role of EVs and decarbonisation in path to Net Zero';
    $Time_link = 'https://timesofindia.indiatimes.com/auto/electric-cars/world-ev-day-role-of-evs-and-decarbonisation-in-path-to-net-zero/articleshow/94092142.cms';
  }
  $Zeebiz = $Q_obj->MediaLatest('zeebiz.com');
  if ($Zeebiz != null) {
    $Zeeb_title = stripslashes($Zeebiz['title']);
    $Zeeb_link = $Zeebiz['media_url'];
  } else {
    $Zeeb_title = 'Carbon emission management: Startup firm WOCE launches carbon ledger for corporates';
    $Zeeb_link = 'https://www.zeebiz.com/startups/news-carbon-emission-management-startup-firm-woce-launches-carbon-ledger-for-corporates-206289';
  }
  $Yourstory = $Q_obj->MediaLatest('yourstory.com');
  if ($Yourstory != null) {
    $Ystory_title = stripslashes($Yourstory['title']);
    $Ystory_link = $Yourstory['media_url'];
  } else {
    $Ystory_title = 'The business of climate action';
    $Ystory_link = 'https://yourstory.com/2022/08/business-climate-action-carbon-neutrality-';
  }
  $Dnaindia = $Q_obj->MediaLatest('dnaindia.com');
  if ($Dnaindia != null) {
    $Dna_title = stripslashes($Dnaindia['title']);
    $Dna_link = $Dnaindia['media_url'];
  } else {
    $Dna_title = 'Indian startup WOCE launches \'Carbon Book\' app, pledges to reduce carbon emissions by 150 million tonnes by 2024';
    $Dna_link = 'https://www.dnaindia.com/lifestyle/report-indian-startup-woce-launches-carbon-book-app-2977312';
  }
  $Carboncaptur = $Q_obj->MediaLatest('carboncapturemagazine.com');
  if ($Carboncaptur != null) {
    $Carbon_title = stripslashes($Carboncaptur['title']);
    $Carbon_link = $Carboncaptur['media_url'];
  } else {
    $Carbon_title = 'Startup WOCE Announces Platform to Offset Carbon Footprint';
    $Carbon_link = 'https://carboncapturemagazine.com/articles/221/startup-woce-announces-platform-to-offset-carbon-footprint';
  }
  $Energetica = $Q_obj->MediaLatest('energetica-india.net');
  if ($Energetica != null) {
    $Energ_title = stripslashes($Energetica['title']);
    $Energ_link = $Energetica['media_url'];
  } else {
    $Energ_title = 'Net-Zero Journey Accelerates as World of Circular Economy and EKI Energy Services Collaborate';
    $Energ_link = 'https://www.energetica-india.net/powerful-thoughts/online/anup-garg';
  }
  $Thenationalnews = $Q_obj->MediaLatest('thenationalnews.com');
  if ($Thenationalnews != null) {
    $Thena_title = stripslashes($Thenationalnews['title']);
    $Thena_link = $Thenationalnews['media_url'];
  } else {
    $Thena_title = 'How the oil price rally is making India\'s richest men richer';
    $Thena_link = 'https://www.thenationalnews.com/business/energy/2022/05/30/how-the-oil-price-rally-is-making-indias-richest-men-richer/';
  }
  $Indiacsr = $Q_obj->MediaLatest('indiacsr.in');
  if ($Indiacsr != null) {
    $India_title = stripslashes($Indiacsr['title']);
    $India_link = $Indiacsr['media_url'];
  } else {
    $India_title = 'The Growing Impact and Future of the Chief Sustainability Officer (CSO)';
    $India_link = 'https://indiacsr.in/the-growing-impact-and-future-of-the-chief-sustainability-officer-cso/';
  }
  $Cxotoday = $Q_obj->MediaLatest('cxotoday.com');
  if ($Cxotoday != null) {
    $Cxo_title = stripslashes($Cxotoday['title']);
    $Cxo_link = $Cxotoday['media_url'];
  } else {
    $Cxo_title = 'Paving the Way to Sustainability: India’s Budget 2023-24 and its Green Growth Focus';
    $Cxo_link = 'https://www.cxotoday.com/cxo-bytes/paving-the-way-to-sustainability-indias-budget-2023-24-and-its-green-growth-focus/';
  }
  $Freepress = $Q_obj->MediaLatest('freepressjournal.in');
  if ($Freepress != null) {
    $Freep_title = stripslashes($Freepress['title']);
    $Freep_link = $Freepress['media_url'];
  } else {
    $Freep_title = 'Startup WOCE announces platform to capture, calculate and offset carbon footprint';
    $Freep_link = 'https://www.freepressjournal.in/business/startup-woce-announces-platform-to-capture-calculate-and-offset-carbon-footprint';
  }
  $Ptinews = $Q_obj->MediaLatest('ptinews.com');
  if ($Ptinews != null) {
    $Ptin_title = stripslashes($Ptinews['title']);
    $Ptin_link = $Ptinews['media_url'];
  } else {
    $Ptin_title = 'Startup firm WOCE launches carbon ledger for corporates';
    $Ptin_link = 'https://www.ptinews.com/news/business/startup-firm-woce-launches-carbon-ledger-for-corporates/4/451882.html';
  }

  $views = '<div class="row" data-container="container">
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Ecom_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/1.webp" alt="mt-1345-home-recent-projects-gallery-01.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Ecom_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Time_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/2.webp" alt="mt-1345-home-recent-projects-gallery-02.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Time_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Zeeb_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/3.webp" alt="mt-1345-home-recent-projects-gallery-03.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Zeeb_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Ystory_link . '" target="_blank"
                        data-action="" data-moto-lightbox-item="" data-moto-lightbox-link="" class="media-container">
                        <img src="assets/image/media/4.webp" alt="mt-1345-home-recent-projects-gallery-04.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Ystory_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Dna_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/5.webp" alt="mt-1345-home-recent-projects-gallery-05.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Dna_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Carbon_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/6.webp" alt="mt-1345-home-recent-projects-gallery-06.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Carbon_title . '</p>
                        </div>
                      </a>
                    </div>
                  </div>
				  <div class="row" data-container="container">
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Energ_link . '" target="_blank"
                        data-action="" data-moto-lightbox-item="" data-moto-lightbox-link="" class="media-container">
                        <img src="assets/image/media/7.webp" alt="mt-1345-home-recent-projects-gallery-07.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Energ_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Thena_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/8.webp" alt="mt-1345-home-recent-projects-gallery-08.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Thena_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $India_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/9.webp" alt="mt-1345-home-recent-projects-gallery-09.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $India_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Cxo_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/10.webp" alt="mt-1345-home-recent-projects-gallery-10.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Cxo_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Freep_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/11.webp" alt="mt-1345-home-recent-projects-gallery-11.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Freep_title . '</p>
                        </div>
                      </a>
                    </div>
                    <div
                      class="moto-widget moto-widget-row__column moto-cell col-sm-2 col-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto div-media"
                      data-widget="row.column" data-container="container" data-spacing="aaaa"
                      data-bg-position="left top">
                      <a href="' . $Ptin_link . '"
                        target="_blank" data-action="" data-moto-lightbox-item="" data-moto-lightbox-link=""
                        class="media-container">
                        <img src="assets/image/media/12.webp" alt="mt-1345-home-recent-projects-gallery-12.webp"
                          class="media-img" />
                        <div class="overlay" data-moto-lightbox-caption="" style="
                              display: flex;
                              justify-content: center;
                              align-items: center;
                            ">
                          <p class="moto-text_203 media-text">' . $Ptin_title . '</p>
                        </div>
                      </a>
                    </div>
                  </div>';
  echo json_encode(['html' => $views]);
}
