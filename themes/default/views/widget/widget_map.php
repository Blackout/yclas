<?php defined('SYSPATH') or die('No direct script access.');?>

<?if ($widget->map_title!=''):?>
    <div class="panel-heading">
        <h3 class="panel-title"><?=$widget->map_title?></h3>
    </div>
<?endif?>

<div class="panel-body">
    <iframe frameborder="0" noresize="noresize" 
            height="<?=$widget->map_height+($widget->map_height*0.10)?>px" width="100%" 
            src="<?=Route::url('map')?>?height=<?=$widget->map_height?>&controls=0&zoom=<?=$widget->map_zoom?><?=(Model_Category::current()->loaded())?'&category='.Model_Category::current()->seoname:''?><?=(Model_Location::current()->loaded())?'&location='.Model_Location::current()->seoname:''?>&language=<?=i18n::get_gmaps_language(i18n::$locale)?>">
    </iframe>
</div>