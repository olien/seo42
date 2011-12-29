<?php
/**
 * REXseo
 *  Based on the URL-Rewrite Addon
 * @author dh[at]gn2-netwerk[dot]de Dave Holloway
 * @author markus.staab[at]redaxo[dot]de Markus Staab
 * @author code[at]rexdev[dot]de jeandeluxe
 * @package redaxo4.2
 * @version 1.3
 * @version svn:$Id$
 */
 
// ADDON PARAMS
////////////////////////////////////////////////////////////////////////////////
$myself = 'rexseo';
$myroot = $REX['INCLUDE_PATH'].'/addons/'.$myself;

$Revision = '';
$REX['ADDON'][$myself]['VERSION'] = array
(
'VERSION'      => 1,
'MINORVERSION' => 4,
'SUBVERSION'   => preg_replace('/[^0-9]/','',"$Revision$")
);

$REX['ADDON']['rxid'][$myself]        = '750';
$REX['ADDON']['name'][$myself]        = 'RexSEO';
$REX['ADDON']['version'][$myself]     = implode('.', $REX['ADDON'][$myself]['VERSION']);
$REX['ADDON']['author'][$myself]      = 'Markus Staab, Wolfgang Huttegger, Dave Holloway, Jan Kristinus, jeandeluxe';
$REX['ADDON']['supportpage'][$myself] = 'forum.redaxo.de';
$REX['ADDON']['perm'][$myself]        = $myself.'[]';
$REX['PERM'][]                        = $myself.'[]';
$REX['ADDON'][$myself]['SUBPAGES']    = array (
  array ('',          'Einstellungen'),
  array ('redirects', 'Redirects'),
  array ('help',      'Hilfe')
  );
$REX['ADDON'][$myself]['redmine_url'] = 'http://www.gn2-code.de/projects/rexseo';
$REX['ADDON'][$myself]['redmine_key'] = '2437c4f8172c5c6e0020a236b576d5128029451b';
$REX['ADDON'][$myself]['settings']['default_redirect_expire'] = 60;
$REX['PROTOCOL'] = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';


// INCLUDES
////////////////////////////////////////////////////////////////////////////////
require_once $myroot.'/functions/function.rexseo_helpers.inc.php';


// USER SETTINGS
////////////////////////////////////////////////////////////////////////////////
// --- DYN
$REX["ADDON"]["rexseo"]["settings"] = array (
  'rexseo_version' => '1.3.223',
  'first_run' => 0,
  'alert_setup' => 0,
  'install_subdir' => '',
  'url_whitespace_replace' => '-',
  'compress_pathlist' => 1,
  'redirects_imported' => '1',
  'def_desc' => 
  array (
    0 => 'main desc @ backupfile',
    1 => '',
  ),
  'def_keys' => 
  array (
    0 => 'main keys @ backupfile',
    1 => '',
  ),
  'title_schema' => '%B - %S',
  'url_schema' => 'rexseo',
  'url_ending' => '.html',
  'hide_langslug' => -1,
  'rewrite_params' => 1,
  'params_starter' => '++',
  'homeurl' => 1,
  'homelang' => 0,
  'urlencode' => 1,
  'allow_articleid' => 0,
  'levenshtein' => 0,
  'default_redirect_expire' => '60',
  'robots' => 'User-agent: *
Disallow:  @ backupfile',
  'expert_settings' => 1,
);
// --- /DYN


// MAIN
////////////////////////////////////////////////////////////////////////////////
require_once $REX['INCLUDE_PATH'].'/addons/rexseo/classes/class.rexseo.inc.php';

if ($REX['MOD_REWRITE'] !== false)
{
  // REWRITE
  $levenshtein    = (bool) $REX['ADDON'][$myself]['settings']['levenshtein'];
  $rewrite_params = (bool) $REX['ADDON'][$myself]['settings']['rewrite_params'];
  require_once $myroot.'/classes/class.rexseo_rewrite.inc.php';
  $rewriter = new RexseoRewrite($levenshtein,$rewrite_params);
  $rewriter->resolve();
  rex_register_extension('URL_REWRITE', array ($rewriter, 'rewrite'));

  // FIX TEXTILE/TINY LINKS @ REX < 4.3
  if(intval($REX['VERSION']) == 4 && intval($REX['SUBVERSION']) < 3)
  {
    rex_register_extension('GENERATE_FILTER', 'rexseo_fix_42x_links');
  }

  // INJECT 301 URLS INTO REXSEO PATHLIST
  //rex_register_extension('REXSEO_PATHLIST_CREATED','rexseo_inject_301');
}

//include $REX['INCLUDE_PATH'].'/addons/'.$myself.'/controller.inc.php';


// RUN CACHER ON DB CHANGES
////////////////////////////////////////////////////////////////////////////////
if ($REX['REDAXO'])
{
  rex_register_extension('REX_FORM_SAVED','rexseo_ht_update_callback');
  function rexseo_ht_update_callback($params)
  {
    //FB::log($params,'REX_FORM_SAVED:');
    rexseo_htaccess_update_redirects();
  }
}


// AUTO CREATE REDIRECTS FROM CHANGED URLS
////////////////////////////////////////////////////////////////////////////////
if ($REX['REDAXO'] && $REX['MOD_REWRITE'] !== false)
{
  rex_register_extension('REXSEO_PATHLIST_BEFORE_REBUILD','rexseo_remember_prior_pathlist');
  function rexseo_remember_prior_pathlist($params)
  {
    global $REX;
    $REX['REXSEO_PRIOR_URLS'] = $params['subject']['REXSEO_URLS'];
  }

  rex_register_extension('REXSEO_PATHLIST_CREATED','rexseo_auto_301');
  function rexseo_auto_301($params)
  {
    global $REX;                                                                #FB::group('rexseo_auto_301');

    $diff = array();
    $diff = array_diff(array_keys($REX['REXSEO_PRIOR_URLS']),array_keys($params['subject']['REXSEO_URLS'])); #FB::log($diff,'$diff');

    if(is_array($diff) && count($diff)>0)
    {
      $db = new rex_sql;
      $qry = 'INSERT INTO `rex_rexseo_redirects` (`id`, `createdate`, `updatedate`, `expiredate`, `creator`, `status`, `from_url`, `to_article_id`, `to_clang`, `http_status`) VALUES';
      $date = time();
      $expire = $date + ($REX['ADDON']['rexseo']['default_redirect_expire']*24*60*60);
      foreach($diff as $k=>$url)
      {
        $qry .= PHP_EOL.'(\'\', \''.$date.'\', \''.$date.'\', \''.$expire.'\', \'rexseo\', 1, \''.$url.'\', '.$REX['REXSEO_PRIOR_URLS'][$url]['id'].', '.$REX['REXSEO_PRIOR_URLS'][$url]['clang'].', 301),';
      }
      $qry = rtrim($qry,',').';';                                               #FB::log($qry,'$qry');
      $db->setQuery($qry);
      rexseo_htaccess_update_redirects();
    }                                                                           #FB::groupEnd();
  }
}


// INCLUDE CONTROLLER AFTER ADDONS INLCUDED
////////////////////////////////////////////////////////////////////////////////
rex_register_extension('ADDONS_INCLUDED','rexseo_controller_include');
function rexseo_controller_include($params)
{
  global $REX;
  include $REX['INCLUDE_PATH'].'/addons/rexseo/controller.inc.php';
}


?>