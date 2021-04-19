<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>

  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?$APPLICATION->ShowTitle()?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=SITE_TEMPLATE_PATH?>/img/favicon.png" rel="icon">
  <link href="<?=SITE_TEMPLATE_PATH?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=https://fonts.googleapis.com/css?family=Inconsolata:400,500,600,700|Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <?
  use Bitrix\Main\Page\Asset;
  $assets = Asset::getInstance();

 $assets->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/css/bootstrap.min.css");
 $assets->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/icofont/icofont.min.css");
 $assets->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/aos/aos.css");
 $assets->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/line-awesome/css/line-awesome.min.css");
 $assets->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/owl.carousel/assets/owl.carousel.min.css");
 $assets->addCss(SITE_TEMPLATE_PATH . "/assets/css/style.css");

 $assets->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/jquery/jquery.min.js");
 $assets->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/js/bootstrap.bundle.min.js");
 $assets->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/jquery.easing/jquery.easing.min.js");
 $assets->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/php-email-form/validate.js");
 $assets->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/aos/aos.js");
 $assets->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/isotope-layout/isotope.pkgd.min.js");
 $assets->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/owl.carousel/owl.carousel.min.js");
 $assets->addJs(SITE_TEMPLATE_PATH . "/assets/js/main.js");
  ?>


  <?$APPLICATION->ShowHead();?>

  <!-- =======================================================
  * Template Name: MyPortfolio - v2.2.1
  * Template URL: https://bootstrapmade.com/myportfolio-bootstrap-portfolio-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?$APPLICATION->ShowPanel();?>
  <!-- ======= Navbar ======= -->
  <div class="collapse navbar-collapse custom-navmenu" id="main-navbar">
    <div class="container py-2 py-md-5">
      <div class="row align-items-start">
        <div class="col-md-2">

                          <?$APPLICATION->IncludeComponent("bitrix:menu", "top_left", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "leftfirst",	// Тип меню для остальных уровней
		"COMPONENT_TEMPLATE" => ".default",
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "leftfirst",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>
        </div>
        <div class="col-md-6 d-none d-md-block  mr-auto">
          <div class="tweet d-flex">
            <span class="icofont-twitter text-white mt-2 mr-3"></span>
            <div>
              <?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "header_twit",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "sect_header_twit.php",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_TEMPLATE_PATH . "/include/sect_header_twit.php"
	),
	false
);?>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-none d-md-block">
          <?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "header_hire",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "sect_header_hire.php",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_TEMPLATE_PATH . "/include/sect_header_hire.php"
	),
	false
);?>
        </div>
      </div>

    </div>
  </div>

  <nav class="navbar navbar-light custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">MyPortfolio.</a>

      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>

    </div>
  </nav>

  <main id="main">
    <?
    if(!CSite::InDir('/index.php')):
    ?>
    <div class="container">
      <?$APPLICATION->IncludeComponent(
  "bitrix:breadcrumb",
  "",
  Array(
    "PATH" => "",
    "SITE_ID" => "s1",
    "START_FROM" => "0"
  )
);?>

    </div>
<?endif;?>    