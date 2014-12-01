<?php
/**
 * Twitter Bootstrap 3 template for Dokuwiki
 * 
 * @link     https://github.com/dmeziere
 * @author   David Mézière <dmeziere@free.fr>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

defined('DOKU_INC') or die('This script cannot be called by itself.');
?>
<!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php tpl_metaheaders() ?>
    <link rel="icon" href="../../favicon.ico">

    <title><?php tpl_pagetitle() ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo tpl_getMediaFile(array("css/bootstrap-3.3.1-min.css")); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo tpl_getMediaFile(array("css/dmebootstrap.css")); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $conf['title']; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo $conf['baseurl'].$conf['basedir']; ?>">Accueil</a></li>
            <?php tpl_action('index', 1, 'li'); ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
              <ul class="dropdown-menu">
<?php
                tpl_action('edit', 1, 'li');
                tpl_action('revisions', 1, 'li');
                tpl_action('backlink', 1, 'li');
                tpl_action('subscribe', 1, 'li');
                tpl_action('revert', $textonly, 'li');
?>
                <li class="divider"></li>
<?php
                tpl_action('recent', 1, 'li');
                tpl_action('media', 1, 'li');
                tpl_action('index', 1, 'li');
?>
              </ul>
            </li>
<?php
            if (isset($_SERVER['REMOTE_USER'])) {
                echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">'.hsc($INFO['userinfo']['name']).'<b class="caret"></b></a>';
                echo '<ul class="dropdown-menu">';
                tpl_action('admin', 1, 'li');
                tpl_action('profile', 1, 'li');
                tpl_action('login', 1, 'li');
                echo '</ul>';
                echo '</li>';
            } else {
                tpl_action('login', 1, 'li', 0, '', '', 'Login / Register');
            }
?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Google AdSense block -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <?php
                if (!$conf['plugin']['adsense']['adsense_restrict'] || !isset($_SERVER['REMOTE_USER'])) {
                    require_once DOKU_INC . '/lib/plugins/adsense/syntax.php';
                    echo syntax_plugin_adsense::_adsense($conf['plugin']['adsense']['adsense_client'], 'slot_id');
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Main content block -->
    <div class="container">
      <div class="row">
          <div class="col-md-10">
            <?php tpl_content(false); ?>
          </div>
      </div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo tpl_getMediaFile(array("js/jquery-1.11.1-min.js")); ?>"></script>
    <script src="<?php echo tpl_getMediaFile(array("js/bootstrap-3.3.1-min.js")); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo tpl_getMediaFile(array("js/ie10-viewport-bug-workaround.js")); ?>"></script>
    
  </body>
</html>
