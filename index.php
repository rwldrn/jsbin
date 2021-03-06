<?php include('app.php'); 
if ($revision != 1 && $revision) {
  $code_id .= '/' . $revision;
}
if ($code_id) {
  $code_id = '/' . $code_id;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8 />
<title>JS Bin - Collaborative JavaScript Debugging</title>
<link rel="stylesheet" href="/css/style.css" type="text/css" />
</head>
<body class="source">
<div id="control">
  <div class="control">
    <div class="buttons">
      <a class="button source" accesskey="1" href="#source">Code</a>
      <a class="button preview" accesskey="2" href="#preview">Preview</a>
    </div>
    <?php if ($code_id) : ?>
    <a href="http://jsbin.com<?=$code_id?>">http://jsbin.com<?=$code_id?></a>
    <?php else : ?>
    <a id="save" class="save" href="/save">Create public link</a>
    <?php endif ?>
    <p><a class="light" id="revert" href="#">Revert</a><?php if ($code_id) : ?><span id="revision"> &ndash; <a id="save" class="light save" href="<?=$code_id?>/save">New revision</a></span><?php endif ?>
    </p>
  </div>
  <!-- <div class="starting">
    
  </div> -->
  <div class="help">
    <ul class="flat">
      <li><a id="startingpoint" href="#"><span>Save as my template</span></a></li>
      <!-- <li><a class="video" href="/about">About</a></li>
      <li><a class="video" href="#">Ajax Debugging</a></li> -->
      <li><a href="/help">Help &amp; tutorials</a></li>
    </ul>
  </div>
</div>
<div id="bin" class="stretch">
  <div id="source" class="binview stretch">
    <div class="code stretch javascript">
      <div class="label"><p>JavaScript<span> (hide panel)</span></p></div>
      <textarea id="javascript"></textarea>
    </div>
    <div class="code stretch html">
      <div class="label">
        <p>HTML<span> (show JavaScript)</span></p>
        <label for="library">Include</label>
        <select id="library">
          <option value="none">None</option>
          <option value="jquery">jQuery</option>
          <option value="jquery+jqueryui">jQuery UI</option>
          <option value="yui">YUI</option>
          <option value="prototype">Prototype</option>
          <option value="prototype+scriptaculous">Scriptaculous</option>
          <option value="mootools">Mootools</option>
          <option value="dojo">Dojo</option>
          <option value="ext">Ext js</option>
        </select>
      </div>
      <textarea id="html"></textarea>
    </div>
  </div>
  <div id="preview" class="binview stretch">
    <iframe class="stretch"></iframe>
  </div>
  <form method="post" action="<?=$code_id?>/save"></form>
</div>
<div id="help"><p><a href="/help/index.html">Help Menu</a></p><div id="content"></div></div>
<?php 
// construct the correct query string, if we're injecting the html or JS
$qs = '';
if (isset($_GET['js']) || isset($_GET['html'])) {
  $qs .= '?';
}

if (@$_GET['js']) {
  $qs .= 'js=' . rawurlencode(stripslashes($_GET['js']));
  
  if (@$_GET['html']) {
    $qs .= '&amp;';
  }
}

if (@$_GET['html']) {
  $qs .= 'html=' . rawurlencode(stripslashes($_GET['html']));
}
?>
<script src="<?=$code_id ? $code_id : '' ?>/source/<?=$qs?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<script src="/js/<?=VERSION?>/jsbin.js"></script>
<script>
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script>
var pageTracker = _gat._getTracker("UA-1656750-13");
pageTracker._trackPageview();
</script>
</body>
</html>