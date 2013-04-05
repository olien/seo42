<?php
$myself = rex_request('page', 'string');
$subpage = rex_request('subpage', 'string');
$func = rex_request('func', 'string');

// config file
$config_file = $REX['INCLUDE_PATH'] . '/addons/rexseo42/settings.dyn.inc.php';

// save settings
if ($func == 'update') {
	$_url_schema = trim(rex_request('url_schema', 'string'));
	$_url_ending = trim(rex_request('url_ending', 'string'));
	$_hide_langslug = trim(rex_request('hide_langslug', 'int'));
	$_homeurl = trim(rex_request('homeurl', 'int'));
	$_homelang = trim(rex_request('homelang', 'int'));
	$_robots = trim(rex_request('robots', 'string'));

	$REX['ADDON']['rexseo42']['settings']['url_schema'] = $_url_schema;
	$REX['ADDON']['rexseo42']['settings']['url_ending'] = $_url_ending;
	$REX['ADDON']['rexseo42']['settings']['hide_langslug'] = $_hide_langslug;
	$REX['ADDON']['rexseo42']['settings']['homeurl'] = $_homeurl;
	$REX['ADDON']['rexseo42']['settings']['homelang'] = $_homelang;
	$REX['ADDON']['rexseo42']['settings']['robots'] = $_robots;

	$content = '
		$REX[\'ADDON\'][\'rexseo42\'][\'settings\'][\'url_schema\'] = \'' . $_url_schema . '\';
		$REX[\'ADDON\'][\'rexseo42\'][\'settings\'][\'url_ending\'] = \'' . $_url_ending . '\';
		$REX[\'ADDON\'][\'rexseo42\'][\'settings\'][\'hide_langslug\'] = ' . $_hide_langslug . ';
		$REX[\'ADDON\'][\'rexseo42\'][\'settings\'][\'homeurl\'] = ' . $_homeurl . ';
		$REX[\'ADDON\'][\'rexseo42\'][\'settings\'][\'homelang\'] = ' . $_homelang . ';
		$REX[\'ADDON\'][\'rexseo42\'][\'settings\'][\'robots\'] = \'' . $_robots . '\';
	';

	// write independent config file
	if (rex_replace_dynamic_contents($config_file, str_replace("\t", "", $content)) !== false) {
		echo rex_info($I18N->msg('rexseo42_config_ok'));
	} else {
		echo rex_warning($I18N->msg('rexseo42_config_error'));
	}
	
	rexseo_generate_pathlist('');
}

if (!is_writable($config_file)) {
	echo rex_warning($I18N->msg('rexseo42_config_file_no_perms'), $config_file);
}

// url schema select box
$url_schema_select = new rex_select();
$url_schema_select->setSize(1);
$url_schema_select->setName('url_schema');
$url_schema_select->addOption('rexseo','rexseo');
$url_schema_select->addOption('url_rewrite','url_rewrite');
$url_schema_select->setAttribute('style','width:250px');
$url_schema_select->setSelected($REX['ADDON'][$myself]['settings']['url_schema']);

// url ending select box
$url_ending_select = new rex_select();
$url_ending_select->setSize(1);
$url_ending_select->setName('url_ending');
$url_ending_select->addOption('.html','.html');
$url_ending_select->addOption('/','/');
$url_ending_select->addOption($I18N->msg('rexseo42_settings_url_ending_without'), '');
$url_ending_select->setAttribute('style','width:70px;margin-left:20px;');
$url_ending_select->setSelected($REX['ADDON'][$myself]['settings']['url_ending']);

// home url select box
$ooa = OOArticle::getArticleById($REX['START_ARTICLE_ID']);

if ($ooa) {
  $homename = strtolower($ooa->getName());
} else {
  $homename = 'Startartikel';
}

unset($ooa);

$homeurl_select = new rex_select();
$homeurl_select->setSize(1);
$homeurl_select->setName('homeurl');
$homeurl_select->addOption(rexseo42::getServerUrl().$homename.'.html',0);
$homeurl_select->addOption(rexseo42::getServerUrl(),1);
$homeurl_select->addOption(rexseo42::getServerUrl().'lang-slug/',2);
$homeurl_select->setAttribute('style','width:250px;');
$homeurl_select->setSelected($REX['ADDON'][$myself]['settings']['homeurl']);

// lang slug select box
if (count($REX['CLANG']) > 1) {
  $hide_langslug_select = new rex_select();
  $hide_langslug_select->setSize(1);
  $hide_langslug_select->setName('hide_langslug');
  $hide_langslug_select->addOption($I18N->msg('rexseo42_settings_langslug_all'),-1);

  foreach($REX['CLANG'] as $id => $str) {
    $hide_langslug_select->addOption($I18N->msg('rexseo42_settings_langslug_noslug') . ' '.$str,$id);
  }

  $hide_langslug_select->setSelected($REX['ADDON'][$myself]['settings']['hide_langslug']);
  $hide_langslug_select = '
          <div class="rex-form-row">
            <p class="rex-form-col-a rex-form-select">
              <label for="hide_langslug">' . $I18N->msg('rexseo42_settings_langslug') . '</label>
                '.$hide_langslug_select->get().'
                </p>
          </div><!-- /rex-form-row -->';
} else {
  $hide_langslug_select = '';
}

// home lang select box
if (count($REX['CLANG']) > 1) {
  $homelang_select = new rex_select();
  $homelang_select->setSize(1);
  $homelang_select->setName('homelang');

  foreach($REX['CLANG'] as $id => $str) {
    $homelang_select->addOption($str,$id);
  }

  $homelang_select->setSelected($REX['ADDON'][$myself]['settings']['homelang']);
  $homelang_select->setAttribute('style','width:70px;margin-left:20px;');
  $homelang_box = '
              <span style="margin:0 4px 0 4px;display:inline-block;width:100px;text-align:right;">
                ' . $I18N->msg('rexseo42_settings_language') . '
              </span>
              '.$homelang_select->get().'
              ';
} else {
  $homelang_box = '';
}

// form
echo '

<div class="rex-addon-output">
  <div class="rex-form">

  <form action="index.php" method="post">
    <input type="hidden" name="page" value="rexseo42" />
    <input type="hidden" name="subpage" value="" />
    <input type="hidden" name="func" value="update" />
';

echo '
      <fieldset class="rex-form-col-1">
        <legend>' . $I18N->msg('rexseo42_settings_main_section') . '</legend>
        <div class="rex-form-wrapper">

          <div class="rex-form-row">
            <p class="rex-form-col-a rex-form-select">
              <label for="url_schema">' . $I18N->msg('rexseo42_settings_schema') . '</label>
                '.$url_schema_select->get().'

              <span style="margin:0 4px 0 4px;display:inline-block;width:100px;text-align:right;">' . $I18N->msg('rexseo42_settings_extension') . '</span>
                '.$url_ending_select->get().'
            </p>
          </div>

          '.$hide_langslug_select.'

          <div class="rex-form-row">
            <p class="rex-form-col-a rex-form-select">
              <label for="homeurl">' . $I18N->msg('rexseo42_settings_startpage') . '</label>
                '.$homeurl_select->get().'
                '.$homelang_box.'
            </p>
          </div>';

if (count($REX['CLANG']) > 1) {
	echo '<div class="rex-form-row rex-form-element-v1">
			<p class="rex-form-col-a rex-form-read">
				<label for="lang_hint">' . $I18N->msg('rexseo42_settings_lang_hint') . '</label>
				<span class="rex-form-read" id="lang_hint"><code>/rexseo42/settings.lang.inc.php</code></span>
			</p>
		</div>';
}

	echo '<div class="rex-form-row rex-form-element-v1">
			<p class="rex-form-col-a rex-form-read">
				<label for="advanced_hint">' . $I18N->msg('rexseo42_settings_advanced_hint') . '</label>
				<span class="rex-form-read" id="advanced_hint"><code>/rexseo42/settings.advanced.inc.php</code></span>
			</p>
		</div>

        </div>
      </fieldset>

      <fieldset class="rex-form-col-1">
        <legend>robots.txt</legend>
        <div class="rex-form-wrapper">

          <div class="rex-form-row">
            <p class="rex-form-col-a rex-form-select">
              <label for="robots">' . $I18N->msg('rexseo42_settings_robots_additional') . '</label>
              <textarea id="rexseo_robots" name="robots" rows="2">'.stripslashes($REX['ADDON'][$myself]['settings']['robots']).'</textarea>
            </p>
          </div>

		  <div class="rex-form-row">
            <p class="rex-form-col-a rex-form-select">
              <label for="robots-txt">' . $I18N->msg('rexseo42_settings_robots_link') . '</label>
              <span class="rex-form-read" id="robots-txt"><a href="' . rexseo42::getBaseUrl() . 'robots.txt" target="_blank">' . rexseo42::getBaseUrl() . 'robots.txt</a></span>
            </p>
          </div>

        </div>
      </fieldset>


      <fieldset class="rex-form-col-1">
        <legend>sitemap.xml</legend>
        <div class="rex-form-wrapper">

          <div class="rex-form-row">
            <p class="rex-form-col-a rex-form-select">
              <label for="xml-sitemap">' . $I18N->msg('rexseo42_settings_sitemap_link') . '</label>
              <span class="rex-form-read" id="xml-sitemap"><a href="' . rexseo42::getBaseUrl() . 'sitemap.xml" target="_blank">' . rexseo42::getBaseUrl() . 'sitemap.xml</a></span>
            </p>
          </div>

        </div>
      </fieldset>

      <fieldset class="rex-form-col-1">
        <legend>&nbsp;</legend>
        <div class="rex-form-wrapper">

          <div class="rex-form-row rex-form-element-v2">

            <p class="rex-form-submit">
              <input style="margin-top: 5px; margin-bottom: 5px;" class="rex-form-submit" type="submit" id="sendit" name="sendit" value="' . $I18N->msg('rexseo42_settings_submit') . '" />
            </p>
          </div>

        </div>
      </fieldset>

  </form>
  </div>
</div>

';

unset($homeurl_select,$url_ending_select,$url_schema_select);


