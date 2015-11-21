<? 
session_start();
require_once('function.php');
require_once('plugins/pagination.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<title>Administrator Panel</title>
<meta name="author" content="invedion.com">
<link rel="shortcut icon" href="images/admin.png" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script src="plugins/jquery-1.11.1.min.js"></script> 
<link rel="stylesheet" href="plugins/summernote/summernote-bs3.css" />

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="plugins/summernote/summernote.css">
<script type="text/javascript" src="plugins/summernote/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 350,
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }
        });
        function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            var url = "<?php echo $base_url.'/wp-content/plugins/turn-wp-to-android/server/images.php'; ?>";
            $.ajax({
                data: data,
                type: "POST",
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }
    });
</script>


		$(document).ready(function() {
		
			$("a[rel=example_group]").fancybox({
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.7,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'titlePosition' 	: 'outside',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
			$(".message").fancybox({
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.7,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'titlePosition' 	: 'outside',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over" style="text-align:center;">Message</span>';
				}
			});
		});
</script>
<? if(($_GET['addf'] && $_GET['addw']) || $_GET['af'] || $_GET['fp']){ ?>
<link href="plugins/uploadify/uploadify.css" type="text/css" rel="stylesheet" />

    $(document).ready(function() {		
	  <? if($_GET['addf'] && $_GET['addw']){ ?>
      $("#addf").uploadify({
        'uploader'  : 'plugins/uploadify/uploadify.swf',
        'script'    : 'plugins/uploadify/tails.php',
        'cancelImg' : 'plugins/uploadify/cancel.png',
        'folder'    : '../images/tails/',
		'fileExt'     : '*.jpg;*.gif;*.png',
        'fileDesc'    : 'Image Files',
		'scriptData'  : {'idc':<? echo $_GET['addf']; ?>, 'idw':<? echo $_GET['addw']; ?>},
		'multi' : true,
        'auto'      : true
      });
	  <? } ?>
	  <? if($_GET['af']){ ?>
      $("#af").uploadify({
        'uploader'  : 'plugins/uploadify/uploadify.swf',
        'script'    : 'plugins/uploadify/articles.php',
        'cancelImg' : 'plugins/uploadify/cancel.png',
        'folder'    : '../images/articles/',
		'fileExt'     : '*.jpg;*.gif;*.png',
        'fileDesc'    : 'Image Files',
		'scriptData'  : {'idc':<? echo $_GET['af']; ?>},
		'multi' : false,
        'auto'      : true
      });
	  <? } ?>
	  <? if($_GET['fp']){ ?>
      $("#fp").uploadify({
        'uploader'  : 'plugins/uploadify/uploadify.swf',
        'script'    : 'plugins/uploadify/gallery.php',
        'cancelImg' : 'plugins/uploadify/cancel.png',
        'folder'    : '../images/articles/',
		'fileExt'     : '*.jpg;*.gif;*.png',
        'fileDesc'    : 'Image Files',
		'scriptData'  : {'fpc':<? echo $_GET['fp']; ?>},
		'multi' : true,
        'auto'      : true
      });
	  <? } ?>
	  });
</script>
<? } ?>
<? if($_GET['id']==4){ ?>
<link rel="stylesheet" href="plugins/color_picker/colpick.css" type="text/css"/>

	
<? } ?>
</head>
<body>
<div class="wrapper">

<center>
<div style="height:60px;"></div>
<?
$login = addslashes(strip_tags(trim($_POST['login'])));
$haslo = addslashes(strip_tags(trim($_POST['haslo'])));
$logout_admin = addslashes(strip_tags($_GET['logout_admin']));


 if($logout_admin==1){ logout();}

 if (!$_SESSION['authorization_nta_admin'] && !$login && !$haslo) {   
	logowanie(); 
 }
 if ($login && $haslo) {
	
$lacz = lacz_bd();

 $wynik_logowanie = $lacz->query("SELECT * FROM nta_admin WHERE name ='$login' and pass = sha1('$haslo') ");
 
 if (!$wynik_logowanie)
 echo 'Login failed';
 if ($wynik_logowanie->num_rows>0)
 $_SESSION['authorization_nta_admin'] = $login;
 else{
 echo '<div class="tytul_web" style="color:#ff0000; font-size:18px;">Incorrect password or login</div><br />';
 echo '<a href="index.php" class="tytul_web" style="text-decoration:none; color:#141413;">back...</a>';
 }
}
if ($_SESSION['authorization_nta_admin']){
	
?>
<img src="images/sign_pa.png" width="347" height="70" style="margin-bottom:20px;" />
<div class="menu_bg">
<div class="menu_center">
	<a href="index.php" title="Home" class="menu_txt">Home</a>
	<a href="index.php?id=1" title="Settings" class="menu_txt">Settings</a>
    <a href="index.php?id=2" title="Tiles" class="menu_txt">Tiles</a>
    <a href="index.php?id=3" title="Articles" class="menu_txt">Articles</a>
    <a href="index.php?id=4" title="Message to Users" class="menu_txt">Messages to Users</a>
</div>
<a href="index.php?logout_admin=1" title="Logout" class="logout"></a>				
</div>
<?
$id = addslashes(strip_tags(trim($_GET['id'])));

if(!$id){statistic();}
if($id==1){change_password();}
if($id==2){tails($id);}
if($id==3){articles($id);}
if($id==4){messages($id);}
if($id==9){images($id);}

}
?>
<br /><br />
 
<div class="push"></div>
 
</center>
</div>
<div class="stopka"><? stopka(); ?></div>
</body>
</html>
