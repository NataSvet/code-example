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
//echo "<pre>";
//var_dump($arResult["ITEMS"][0]);
//echo "</pre>";
//die();
?>
<div class="container">
	<div class="row justify-content-center text-center mb-4">
		<div class="col-5">
			<h3 class="h3 heading"><?=GetMessage("CT_BNL_SHOW_SERVICES");?></h3>
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
		<div class="col-12 col-sm-6 col-md-6 col-lg-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
 <span class="la <?=$arItem["PROPERTIES"]["ICON"]["VALUE"];?> la-3x mb-4"></span>
			<h4 class="h4 mb-2"><?=$arItem['NAME'];?></h4>
			<p>
				 <?=$arItem['PREVIEW_TEXT'];?>
			</p>
			<ul class="list-unstyled list-line">
				<? foreach($arItem["PROPERTIES"]["SERVICES_ITEMS"]["VALUE"] as $el):?>
				<li><?=$el;?></li>
				<?endforeach;?>
			</ul>
		</div>
		<?endforeach;?>
	</div>
	

</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
