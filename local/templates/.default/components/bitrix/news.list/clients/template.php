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
	<div class="row justify-content-center text-center mb-4">
		<div class="col-5">
			<h3 class="h3 heading"><?=GetMessage("CT_BNL_SHOW_MY_CLIENTS");?></h3>
			<p>
				 Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.
			</p>
		</div>
	</div>
	<div class="row">
	<? foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="col-4 col-sm-4 col-md-2" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
 	<a href="#" class="client-logo">
 		<img alt="<?=$arItem['NAME'];?>" src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" class="img-fluid">
 	</a>
	</div>
	<?endforeach;?>
	</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
