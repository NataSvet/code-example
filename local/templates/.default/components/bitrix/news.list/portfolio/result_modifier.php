<?php
$getiblock = CIBlockSection::GetList(
   Array("SORT"=>"ASC"),
   Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'])
);
$sections=[];
while($section = $getiblock->GetNext())
{
	$sections[$section['ID']] = $section;
};
$arResult['SECTIONS'] = $sections;
//r_dump($sections);
