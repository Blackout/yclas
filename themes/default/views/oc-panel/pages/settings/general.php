<?php defined('SYSPATH') or die('No direct script access.');?>


 <?=Form::errors()?>
<div class="page-header">
    <h1><?=__('General Configuration')?></h1>
    <p class="">
        <?=__('General site settings.')?>
        <a class="btn btn-default pull-right ajax-load" href="<?=Route::url('oc-panel',array('controller'=>'config'))?>"><?=__('All configurations')?></a>

    </p>
</div>

<div class="well">
<?= FORM::open(Route::url('oc-panel',array('controller'=>'settings', 'action'=>'general')), array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'))?>
    <fieldset>
        
        
        <div class="form-group">
            <?= FORM::label($forms['maintenance']['key'], "<a target='_blank' href='http://open-classifieds.com/2013/10/15/how-to-activate-maintenance-mode/'>".__("Maintenance Mode")."</a>", array('class'=>'control-label col-sm-3', 'for'=>$forms['maintenance']['key']))?>
            <div class="col-sm-4">
                <div class="onoffswitch">
                    <?= Form::checkbox($forms['maintenance']['key'], 1, (bool) $forms['maintenance']['value'], array(
                    'placeholder' => "TRUE or FALSE", 
                    'class' => 'onoffswitch-checkbox', 
                    'id' => $forms['maintenance']['key'], 
                    'data-content'=> __("Enables the site to maintenance"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Maintenance Mode"),
                    ))?>
                    <?= FORM::label($forms['maintenance']['key'], "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$forms['maintenance']['key']))?>
                    <?= FORM::hidden($forms['maintenance']['key'], 0);?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?= FORM::label($forms['site_name']['key'], __('Site name'), array('class'=>'control-label col-sm-3', 'for'=>$forms['site_name']['key']))?>
            <div class="col-sm-4">
                <?= FORM::input($forms['site_name']['key'], $forms['site_name']['value'], array(
                'placeholder' => 'Open-classifieds', 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['site_name']['key'],
                'data-content'=> __("Here you can declare your display name. This is seen by everyone!"),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Site Name"), 
                ))?> 
            </div>
        </div>

        <div class="form-group">
            <?= FORM::label($forms['site_description']['key'], __('Site description'), array('class'=>'control-label col-sm-3', 'for'=>$forms['site_description']['key']))?>
            <div class="col-sm-4">
                <?= FORM::textarea($forms['site_description']['key'], $forms['site_description']['value'], array(
                'placeholder' => __('Description of your site in no more than 160 characters.'),
                'rows' => 3, 'cols' => 50, 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['site_description']['key'],
                'data-content'=> __('Description used for the <meta name="description"> of the home page. Might be used by Google as search result snippet. (max. 160 chars)'),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Site Description"), 
                ))?> 
            </div>
        </div>

        <div class="form-group">
            <?= FORM::label($forms['moderation']['key'], "<a target='_blank' href='http://open-classifieds.com/2013/08/30/how-to-earn-money/'>".__('Moderation')."</a>", array('class'=>'control-label col-sm-3', 'for'=>$forms['moderation']['key']))?>
            <div class="col-sm-4">
                <?= FORM::select($forms['moderation']['key'], array(0=>__("Post directly"),1=>__("Moderation on"),2=>__("Payment on"),3=>__("Email confirmation on"),4=>__("Email confirmation with Moderation"),5=>__("Payment with Moderation")), $forms['moderation']['value'], array(
                'placeholder' => $forms['moderation']['value'], 
                'class' => 'tips form-control input-sm ', 
                'id' => $forms['moderation']['key'],
                'data-content'=> __("Moderation is how you control newly created advertisements. You can set it up to fulfill your needs. For example, 'Post directly' will enable new ads to be posted directly, and get published as soon they submit."),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Moderation"), 
                ))?> 
            </div>
        </div>
        
        <div class="form-group">
            <?= FORM::label($forms['landing_page']['key'], __('Landing page'), array('class'=>'control-label col-sm-3', 'for'=>$forms['landing_page']['key']))?>
            <div class="col-sm-4">
                <?= FORM::select($forms['landing_page']['key'], array('{"controller":"home","action":"index"}'=>'HOME','{"controller":"ad","action":"listing"}'=>'LISTING'), $forms['landing_page']['value'], array(
                'class' => 'tips form-control input-sm', 
                'id' => $forms['landing_page']['key'], 
                'data-content'=> __("It changes landing page of website"),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Landing page"),
                ))?> 
            </div>
        </div>
        
        <?=FORM::hidden($forms['base_url']['key'], $forms['base_url']['value'])?>
        
        <?$pages = array(''=>__('Deactivated'))?>
        <?foreach (Model_Content::get_pages() as $key => $value) {
            $pages[$value->seotitle] = $value->title;
        }?>
        <div class="form-group">
            <?= FORM::label($forms['alert_terms']['key'], "<a target='_blank' href='http://open-classifieds.com/2013/10/14/activate-access-terms-alert/'>".__('Accept Terms Alert')."</a>", array('class'=>'control-label col-sm-3', 'for'=>$forms['alert_terms']['key']))?>
            <div class="col-sm-4">
                <?= FORM::select($forms['alert_terms']['key'], $pages, $forms['alert_terms']['value'], array( 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['alert_terms']['key'], 
                'data-content'=> __("If you choose to use alert terms, you can select page you want to render. And to edit content, select link 'Content' on your admin panel sidebar. Find page named <name_you_specified> click 'Edit'. In section 'Description' add content that suits you."),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Accept Terms Alert"),
                ))?> 
            </div>
        </div>

        <div class="form-group">
            <?= FORM::label($forms['analytics']['key'], __('Analytics Tracking ID'), array('class'=>'control-label col-sm-3', 'for'=>$forms['analytics']['key']))?>
            <div class="col-sm-4">
                <?= FORM::input($forms['analytics']['key'], $forms['analytics']['value'], array(
                'placeholder' => 'UA-XXXXX-YY', 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['analytics']['key'],
                'data-content'=> __("Once logged in your Google Analytics, you can find the Tracking ID in the Accounts List or in the Property Settings"),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Analytics Tracking ID"), 
                ))?> 
            </div>
        </div>

        <div class="form-group">
            <?= FORM::label($forms['akismet_key']['key'], "<a target='_blank' href='http://akismet.com/'>".__('Akismet Key')."</a>", array('class'=>'control-label col-sm-3', 'for'=>$forms['akismet_key']['key']))?>
            <div class="col-sm-4">
                <?= FORM::input($forms['akismet_key']['key'], $forms['akismet_key']['value'], array(
                'placeholder' => "", 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['akismet_key']['key'],
                'data-content'=> __("Providing akismet key will activate this feature. This feature deals with spam posts and emails."),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Akismet Key"), 
                ))?> 
            </div>
        </div>

        <hr>
        <h2><?=__("Regional Settings")?></h2>
        <div class="form-group">
            
                <?= FORM::label($forms['number_format']['key'], "<a target='_blank' href='http://open-classifieds.com/2013/08/06/how-to-currency-format/'>".__('Money format')."</a>", array('class'=>'control-label col-sm-3','for'=>$forms['number_format']['key']))?>
            <div class="col-sm-4">
                <?= FORM::input($forms['number_format']['key'], $forms['number_format']['value'], array(
                'placeholder' => "20", 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['number_format']['key'],
                'data-content'=> __("Number format is how you want to display numbers related to advertisements. More specific advertisement price. Every country have a specific way of dealing with decimal digits."),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Decimal representation"), 
                ))?> 
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['date_format']['key'], __('Date format'), array('class'=>'control-label col-sm-3', 'for'=>$forms['date_format']['key']))?>
            <div class="col-sm-4">
                <?= FORM::input($forms['date_format']['key'], $forms['date_format']['value'], array(
                'placeholder' => "d/m/Y", 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['date_format']['key'], 
                'data-content'=> __("Each advertisement has a publish date. By selecting format, you can change how it is shown on your website."),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Date format"),
                ))?> 
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3"><?=__("Time Zone")?>:</label>                
            <div class="col-sm-4">
            <?= FORM::select($forms['timezone']['key'], Date::get_timezones(), core::request('TIMEZONE',date_default_timezone_get()), array(
                    'placeholder' => "Madrid [+1:00]", 
                    'class' => 'tips form-control', 
                    'id' => $forms['timezone']['key'], 
                    ))?> 
            </div>
        </div>
        
        <hr>
        <h2><?=__("Listings Options")?></h2>
        <div class="form-group">
            <?= FORM::label($forms['advertisements_per_page']['key'], __('Advertisements per page'), array('class'=>'control-label col-sm-3', 'for'=>$forms['advertisements_per_page']['key']))?>
            <div class="col-sm-4">
                <?= FORM::input($forms['advertisements_per_page']['key'], $forms['advertisements_per_page']['value'], array(
                'placeholder' => "20", 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['advertisements_per_page']['key'], 
                'data-content'=> __("This is to control how many advertisements are being displayed per page. Insert an integer value, as a number limit."),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Number of ads per page"),
                ))?> 
            </div>
        </div>
        <div class="form-group">
           <?= FORM::label($forms['feed_elements']['key'], __('Advertisements in RSS'), array('class'=>'control-label col-sm-3', 'for'=>$forms['feed_elements']['key']))?>
           <div class="col-sm-4">
               <?= FORM::input($forms['feed_elements']['key'], $forms['feed_elements']['value'], array(
               'placeholder' => "20", 
               'class' => 'tips form-control input-sm', 
               'id' => $forms['feed_elements']['key'], 
               'data-original-title'=> __("Number of Ads"),
               'data-trigger'=>"hover",
               'data-placement'=>"right",
               'data-toggle'=>"popover",
               'data-content'=>__("How many ads are going to appear in the RSS of your site."),
               ))?> 
           </div>
       </div>
       <div class="form-group">
           <?= FORM::label($forms['map_elements']['key'], __('Advertisements in Map'), array('class'=>'control-label col-sm-3', 'for'=>$forms['map_elements']['key']))?>
           <div class="col-sm-4">
               <?= FORM::input($forms['map_elements']['key'], $forms['map_elements']['value'], array(
               'placeholder' => "20", 
               'class' => 'tips form-control input-sm', 
               'id' => $forms['map_elements']['key'], 
               'data-original-title'=> __("Number of Ads"),
               'data-trigger'=>"hover",
               'data-placement'=>"right",
               'data-toggle'=>"popover",
               'data-content'=>__("How many ads are going to appear in the map of your site."),
               ))?> 
           </div>
       </div>

        <div class="form-group">
            <?= FORM::label($forms['sort_by']['key'], __('Sort by in listing'), array('class'=>'control-label col-sm-3', 'for'=>$forms['sort_by']['key']))?>
            <div class="col-sm-4">
                <?= FORM::select($forms['sort_by']['key'], array('title-asc'=>"Name (A-Z)",
                                                                     'title-desc'=>"Name (Z-A)",
                                                                     'price-asc'=>"Price (Low)",
                                                                     'price-desc'=>"Price (High)",
                                                                     'featured'=>"Featured",
                                                                     'published-desc'=>"Newest",
                                                                     'published-asc'=>"Oldest"), 
                $forms['sort_by']['value'], array(
                'placeholder' => $forms['sort_by']['value'], 
                'class' => 'tips form-control input-sm ', 
                'id' => $forms['sort_by']['key'],
                'data-content'=> __("Sort by in listing"),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Sort by in listing"), 
                ))?> 
            </div>
        </div>

        <hr>
        <h2><?=__("Images Options")?></h2>
        <div class="form-group">
            <?= FORM::label($forms['allowed_formats']['id'], __('Allowed image formats'), array('class'=>'control-label col-sm-3', 'for'=>$forms['allowed_formats']['id']))?>
            <div class="col-sm-4">
                <?= FORM::select($forms['allowed_formats']['key'], array('jpeg'=>'jpeg','jpg'=>'jpg','png'=>'png','webp'=>'webp','gif'=>'gif','raw'=>'raw'), explode(',', $forms['allowed_formats']['value']), array(
                'placeholder' => $forms['allowed_formats']['value'],
                'multiple' => 'true',
                'class' => 'tips form-control input-sm', 
                'id' => $forms['allowed_formats']['id'],
                'data-content'=> __("Set this up to restrict image formats that are being uploaded to your server."),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Allowed image formats"), 
                ))?> 
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['max_image_size']['key'], __('Max image size'), array('class'=>'control-label col-sm-3', 'for'=>$forms['max_image_size']['key']))?>
            <div class="col-sm-4">
                <div class="input-group">
                    <?= FORM::input($forms['max_image_size']['key'], $forms['max_image_size']['value'], array(
                    'placeholder' => "5", 
                    'class' => 'tips form-control input-sm span', 
                    'id' => $forms['max_image_size']['key'],
                    'data-content'=> __("Control the size of images being uploaded. Enter an integer value to set maximum image size in mega bites(Mb)."),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Image size in mega bites(Mb)"), 
                    ))?>
                    <span class="input-group-addon">MB</span>
                </div> 
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['height']['key'], __('Image height'), array('class'=>'control-label col-sm-3', 'for'=>$forms['height']['key']))?>
            <div class="col-sm-4">
                <div class="input-group">
                    <?= FORM::input($forms['height']['key'], $forms['height']['value'], array(
                    'placeholder' => "700", 
                    'class' => 'tips form-control input-sm', 
                    'id' => $forms['height']['key'], 
                    'data-content'=> __("Each image is resized when uploaded. This is the height of big image. Note: you can leave this field blank to set AUTO height resize."),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Image height in pixels(px)"),
                    ))?>
                    <span class="input-group-addon">px</span>
                </div> 
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['width']['key'], __('Image width'), array('class'=>'control-label col-sm-3', 'for'=>$forms['width']['key']))?>
            <div class="col-sm-4">
                <div class="input-group">
                    <?= FORM::input($forms['width']['key'], $forms['width']['value'], array(
                    'placeholder' => "1024", 
                    'class' => 'tips form-control input-sm', 
                    'id' => $forms['width']['key'],
                    'data-content'=> __("Each image is resized when uploaded. This is the width of big image."),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Image width in pixels(px)"), 
                    ))?>
                    <span class="input-group-addon">px</span>
                </div> 
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['height_thumb']['key'], __('Thumb height'), array('class'=>'control-label col-sm-3', 'for'=>$forms['height_thumb']['key']))?>
            <div class="col-sm-4">
                <div class="input-group">
                    <?= FORM::input($forms['height_thumb']['key'], $forms['height_thumb']['value'], array(
                    'placeholder' => "200", 
                    'class' => 'tips form-control input-sm', 
                    'id' => $forms['height_thumb']['key'],
                    'data-content'=> __("Thumb is a small image resized to fit certain elements. This is the height for this image."),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Thumb height in pixels(px)"), 
                    ))?>
                    <span class="input-group-addon">px</span>
                </div> 
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['width_thumb']['key'], __('Thumb width'), array('class'=>'control-label col-sm-3', 'for'=>$forms['width_thumb']['key']))?>
            <div class="col-sm-4">
                <div class="input-group">
                    <?= FORM::input($forms['width_thumb']['key'], $forms['width_thumb']['value'], array(
                    'placeholder' => "200", 
                    'class' => 'tips form-control input-sm', 
                    'id' => $forms['width_thumb']['key'],
                    'data-content'=> __("Thumb is a small image resized to fit certain elements. This is width of this image."),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Thumb width in pixels(px)"),

                    ))?>
                    <span class="input-group-addon">px</span>
                </div> 
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['quality']['key'], __('Image quality'), array('class'=>'control-label col-sm-3', 'for'=>$forms['quality']['key']))?>
            <div class="col-sm-4">
                <div class="input-group">
                    <?= FORM::input($forms['quality']['key'], $forms['quality']['value'], array(
                    'placeholder' => "95", 
                    'class' => 'tips form-control input-sm', 
                    'id' => $forms['quality']['key'],
                    'data-content'=> __("Choose the quality of the stored images (1-100% of the original)."),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Image Quality"),

                    ))?>
                    <span class="input-group-addon">%</span>
                </div> 
            </div>
        </div>
        
        <div class="form-group">
            <?= FORM::label($forms['watermark']['key'], __('Watermark'), array('class'=>'control-label col-sm-3', 'for'=>$forms['watermark']['key']))?>
            <div class="col-sm-4">
                <div class="onoffswitch">
                    <?= Form::checkbox($forms['watermark']['key'], 1, (bool) $forms['watermark']['value'], array(
                    'placeholder' => "TRUE or FALSE", 
                    'class' => 'onoffswitch-checkbox', 
                    'id' => $forms['watermark']['key'], 
                    'data-content'=> __("Appends watermark to images"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Watermark"),
                    ))?>
                    <?= FORM::label($forms['watermark']['key'], "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$forms['watermark']['key']))?>
                    <?= FORM::hidden($forms['watermark']['key'], 0);?>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <?= FORM::label($forms['watermark_path']['key'], __('Watermark path'), array('class'=>'control-label col-sm-3', 'for'=>$forms['watermark_path']['key']))?>
            <div class="col-sm-4">
                <?= FORM::input($forms['watermark_path']['key'], $forms['watermark_path']['value'], array(
                'placeholder' => "images/watermark.png", 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['watermark_path']['key'],
                'data-content'=> __("Relative path to the image to use as watermark"),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Watermark path"), 
                ))?> 
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['watermark_position']['key'], __('Watermark position'), array('class'=>'control-label col-sm-3', 'for'=>$forms['watermark_position']['key']))?>
            <div class="col-sm-4">
                <?= FORM::select($forms['watermark_position']['key'], array(0=>"Center",1=>"Bottom",2=>"Top"), $forms['watermark_position']['value'], array(
                'placeholder' => $forms['watermark_position']['value'], 
                'class' => 'tips form-control input-sm ', 
                'id' => $forms['watermark_position']['key'],
                'data-content'=> __("Watermark position"),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-original-title'=>__("Watermark position"), 
                ))?> 
            </div>
        </div>

        <hr>
        <h2><?=__("Enable Special Features")?></h2>
        <div class="form-group">
            <?= FORM::label($forms['blog']['key'], __("Activates Blog posting"), array('class'=>'control-label col-sm-3', 'for'=>$forms['blog']['key']))?>
            <div class="col-sm-4">
                <div class="onoffswitch">
                    <?= Form::checkbox($forms['blog']['key'], 1, (bool) $forms['blog']['value'], array(
                    'placeholder' => "TRUE or FALSE", 
                    'class' => 'onoffswitch-checkbox', 
                    'id' => $forms['blog']['key'], 
                    'data-content'=> __("Once set to TRUE, enables blog posts"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Activates Blog posting"),
                    ))?>
                    <?= FORM::label($forms['blog']['key'], "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$forms['blog']['key']))?>
                    <?= FORM::hidden($forms['blog']['key'], 0);?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['forums']['key'], __("Activates Forums"), array('class'=>'control-label col-sm-3', 'for'=>$forms['forums']['key']))?>
            <div class="col-md-4">
                <div class="onoffswitch">
                    <?= Form::checkbox($forms['forums']['key'], 1, (bool) $forms['forums']['value'], array(
                    'placeholder' => "TRUE or FALSE", 
                    'class' => 'onoffswitch-checkbox', 
                    'id' => $forms['forums']['key'], 
                    'data-content'=> __("Once set to TRUE, enables forums posts"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Activates Forums"),
                    ))?>
                    <?= FORM::label($forms['forums']['key'], "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$forms['forums']['key']))?>
                    <?= FORM::hidden($forms['forums']['key'], 0);?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['faq']['key'], __("Activates FAQ"), array('class'=>'control-label col-sm-3', 'for'=>$forms['faq']['key']))?>
            <div class="col-sm-4">
                <div class="onoffswitch">
                    <?= Form::checkbox($forms['faq']['key'], 1, (bool) $forms['faq']['value'], array(
                    'placeholder' => "TRUE or FALSE", 
                    'class' => 'onoffswitch-checkbox', 
                    'id' => $forms['faq']['key'], 
                    'data-content'=> __("Once set to TRUE, enables FAQ"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Activates FAQ"),
                    ))?>
                    <?= FORM::label($forms['faq']['key'], "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$forms['faq']['key']))?>
                    <?= FORM::hidden($forms['faq']['key'], 0);?>
                </div>
            </div>
        </div>
        
         <div class="form-group">
            <?= FORM::label($forms['minify']['key'], __("Minify CSS/JS"), array('class'=>'control-label col-sm-3', 'for'=>$forms['minify']['key']))?>
            <div class="col-sm-4">
                <div class="onoffswitch">
                    <?= Form::checkbox($forms['minify']['key'], 1, (bool) $forms['minify']['value'], array(
                    'placeholder' => "TRUE or FALSE", 
                    'class' => 'onoffswitch-checkbox', 
                    'id' => $forms['minify']['key'], 
                    'data-content'=> __("Once set to TRUE, enables minify CSS and JS to speed up your site"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Activates Minify CSS/JS"),
                    ))?>
                    <?= FORM::label($forms['minify']['key'], "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$forms['minify']['key']))?>
                    <?= FORM::hidden($forms['minify']['key'], 0);?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?= FORM::label($forms['black_list']['key'], __("Black List"), array('class'=>'control-label col-sm-3', 'for'=>$forms['black_list']['key']))?>
            <div class="col-sm-4">
                <div class="onoffswitch">
                    <?= Form::checkbox($forms['black_list']['key'], 1, (bool) $forms['black_list']['value'], array(
                    'placeholder' => "TRUE or FALSE", 
                    'class' => 'onoffswitch-checkbox', 
                    'id' => $forms['black_list']['key'], 
                    'data-content'=> __("If advertisement is marked as spam, user is also marked to be spammer. Next time is not able to publish new advertisement. Until removed from Black List!"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Black List"),
                    ))?>
                    <?= FORM::label($forms['black_list']['key'], "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$forms['black_list']['key']))?>
                    <?= FORM::hidden($forms['black_list']['key'], 0);?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?= FORM::label($forms['search_by_description']['key'], __("Include search by description"), array('class'=>'control-label col-sm-3', 'for'=>$forms['search_by_description']['key']))?>
            <div class="col-sm-4">
                <div class="onoffswitch">
                    <?= Form::checkbox($forms['search_by_description']['key'], 1, (bool) $forms['search_by_description']['value'], array(
                    'placeholder' => "TRUE or FALSE", 
                    'class' => 'onoffswitch-checkbox', 
                    'id' => $forms['search_by_description']['key'], 
                    'data-content'=> __("Once set to TRUE, enables search to look for key words in description"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-original-title'=>__("Include search by description"),
                    ))?>
                    <?= FORM::label($forms['search_by_description']['key'], "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$forms['search_by_description']['key']))?>
                    <?= FORM::hidden($forms['search_by_description']['key'], 0);?>
                </div>
            </div>
        </div>

        <hr>
        <h2><?=__("Comments Configuration")?></h2>
        <div class="form-group">
                <?= FORM::label($forms['blog_disqus']['key'], __('Disqus for blog'), array('class'=>'control-label col-sm-3', 'for'=>$forms['blog_disqus']['key']))?>
                <div class="col-sm-4">
                    <?= FORM::input($forms['blog_disqus']['key'], $forms['blog_disqus']['value'], array(
                    'placeholder' => "", 
                    'class' => 'tips form-control input-sm', 
                    'id' => $forms['blog_disqus']['key'], 
                    'data-original-title'=> __("Disqus for Blog Comments"),
                    'data-trigger'=>"hover",
                    'data-placement'=>"right",
                    'data-toggle'=>"popover",
                    'data-content'=>__("You need to write your disqus ID to enable the service."),
                    ))?> 
                </div>
        </div>
        <div class="form-group">
            <?= FORM::label($forms['faq_disqus']['key'], __('Disqus for FAQ'), array('class'=>'control-label col-sm-3', 'for'=>$forms['faq_disqus']['key']))?>
            <div class="col-sm-4">
                <?= FORM::input($forms['faq_disqus']['key'], $forms['faq_disqus']['value'], array(
                'placeholder' => "", 
                'class' => 'tips form-control input-sm', 
                'id' => $forms['faq_disqus']['key'], 
                'data-original-title'=> __("Disqus for FAQ Comments"),
                'data-trigger'=>"hover",
                'data-placement'=>"right",
                'data-toggle'=>"popover",
                'data-content'=>__("You need to write your disqus ID to enable the service."),
                ))?> 
            </div>
        </div>

            <?= FORM::button('submit', __('Save'), array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('oc-panel',array('controller'=>'settings', 'action'=>'general'))))?>
        
    </fieldset> 
</div><!--end well-->
