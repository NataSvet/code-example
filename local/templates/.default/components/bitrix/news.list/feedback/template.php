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

<div class="container">
	
        <div class="owl-carousel testimonial-carousel">
        	<? foreach($arResult["ITEMS"] as $arItem):?>
       	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
          <div class="testimonial-wrap" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="testimonial">
              <img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" alt="<?=$arItem['NAME'];?>" class="img-fluid">
              <blockquote>
                <p><?=$arItem["PREVIEW_TEXT"];?></p>
              </blockquote>
              <p>&mdash; <?=$arItem['NAME'];?></p>
            </div>
          </div>
          <?endforeach;?>
        </div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>


 