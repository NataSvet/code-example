<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
//echo '<pre>';
//var_dump($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["FILE_VALUE"][0]);
//echo '</pre>';
//die();
?>
<section class="section">
      
      <div class="site-section pb-0">
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-md-8" data-aos="fade-up">
              <img src="<?=$arResult['DETAIL_PICTURE']['SRC'];?>" alt="<?=$arResult["NAME"]?>" class="img-fluid">
            </div>
            <div class="col-md-3 ml-auto" data-aos="fade-up" data-aos-delay="100">
              <div class="sticky-content">
                <h3 class="h3"><?=$arResult["NAME"]?></h3>
                <p class="mb-4"><span class="text-muted"><?=$arResult["SECTION"]["PATH"][0]["NAME"]?></span></p>

                <div class="mb-5">
                	<?=$arResult["DETAIL_TEXT"]?>

                </div>
                <?if(!empty($arResult["DISPLAY_PROPERTIES"]["TECHNOLOGIES"]["DISPLAY_VALUE"])):?>
                <h4 class="h4 mb-3">What I did</h4>
                <ul class="list-unstyled list-line mb-5">
                <? foreach($arResult["DISPLAY_PROPERTIES"]["TECHNOLOGIES"]["DISPLAY_VALUE"] as $arItem):?>
                  <li><?=$arItem?></li>
                  <?endforeach;?>
                </ul>
                <?endif?>

                <?if(!empty($arResult["DISPLAY_PROPERTIES"]["LINK"]["VALUE"])):?>
                <p>
                	<a href="<?=$arResult["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" class="readmore" target="_blank">Visit Website</a>
                </p>
                <?endif?>
              </div>
            </div>
          </div>
          <?php foreach ($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["FILE_VALUE"] as $image): ?>
            <a href="<?=$image["SRC"]?>"  target="_blank">
              <img src="<?=$image["PREVIEW_SRC"]?>"> 
            </a>
            <?endforeach;?>
        </div>
    </section>
