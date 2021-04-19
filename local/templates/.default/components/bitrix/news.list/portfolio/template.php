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
//var_dump($templateFolder);
$this->addExternalCss($templateFolder."/custom.css");
?>


<div class="container">
	<div class="row mb-5 align-items-center">
		<div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">

		<? if($arParams["SHOW_FILTER"] !=="N"):?>
			<h2>Hey, I'm Johan Stanworth</h2>
			<p class="mb-0">
				 Freelance Creative &amp; Professional Graphics Designer
			</p>
		<?endif;?>

		<? if($arParams["SHOW_FILTER"] =="N"):?>
		<h2><?=$arResult["SECTION"]["PATH"][0]["NAME"]?></h2>
		<?endif;?>
			
		</div>
		<? if($arParams["SHOW_FILTER"] !=="N"):?>
		<div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
			<div id="filters" class="filters">
				<a href="#" data-filter="*" class="active">
					<?=GetMessage("CT_BNL_SHOW_ALL");?></a>
				<?php foreach ($arResult['SECTIONS'] as $section): ?>
 					<a href="#" data-filter=".<?=$section['CODE'];?>"><?=$section['NAME'];?></a>
			<?php endforeach ?>
 
			</div>
		</div>
		<?endif;?>
	</div>
	<div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
		<? foreach($arResult["ITEMS"] as $arItem):
			$section = $arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']];
		?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item <?=$section['CODE'];?> col-sm-6 col-md-4 col-lg-4 mb-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item-wrap fancybox">
				<div class="work-info">
					<h3><?=$arItem['NAME'];?></h3>
				 	 <?=$section['NAME'];?>
				</div>
 			<img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" class="img-fluid"> 
		</a>
	</div>
	<?endforeach;?>

	</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
