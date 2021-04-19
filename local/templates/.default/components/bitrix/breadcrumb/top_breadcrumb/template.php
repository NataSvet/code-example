<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

?>
<?
$strReturn = '<div class="breadcrumbs-box">';
$strReturn .= '<div class="inner-wrap">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
		<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>';			
	}
	else
	{
		$strReturn .=$title;
	}
}

$strReturn .= '</div></div>';

return $strReturn;
?>
