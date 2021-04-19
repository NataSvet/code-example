<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
        <?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "footer_inc",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "sect_footer_inc.php",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_TEMPLATE_PATH .  "/include/sect_footer_inc.php"
	),
	false
);?>
    </div>
        <div class="col-sm-6 social text-md-right">
          <?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "footer_icon",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "sect_footer_icon.php",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_TEMPLATE_PATH .  "/include/sect_footer_icon.php"
	),
	false
);?>
        </div>
      </div>
      <?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"",
	Array(
		"PAGE" => "#SITE_DIR#search/",
		"USE_SUGGEST" => "Y"
	)
);?> 
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

</html>