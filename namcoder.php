<?php
/*
Plugin Name: Plugin Turn wp to Android App 
Plugin URI: Turn wp to Android Free
Description: Turn wp to Android
Version: 1.0.1
Author: Turn wp to Android App 
Author URI: i-imgs.com
*/
// echo "<div class='updated'>Test Plugin Notice</div>";

register_activation_hook(__FILE__, 'my_plugin_activation');


function my_plugin_activation() {
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  /*create table*/
  
  /*if($wpdb->get_var("SHOW TABLES LIKE 'nta_admin'") != 'nta_admin') {
      $sql = "CREATE TABLE nta_admin (
        name varchar(20) NOT NULL PRIMARY KEY,
        pass varchar(255) NOT NULL
      ) $charset_collate ;";
      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );
      $wpdb->insert( 
        'nta_admin', 
        array( 
          'name' => 'admin', 
          'pass' => '7110eda4d09e062aa5e4a390b0a572ac0d2c0220' , 
        ) 
      );
  }

  if($wpdb->get_var("SHOW TABLES LIKE 'nta_article'") != 'nta_article') {
      $sql = "CREATE TABLE nta_article (
        id int(11) NOT NULL,
        id_grid int(11) NOT NULL,
        photo varchar(255) NOT NULL,
        date date NOT NULL,
        title varchar(255) NOT NULL,
        information text NOT NULL,
        online int(11) NOT NULL
      ) $charset_collate ;";
      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );

  }*/


  $filename = plugin_dir_path( __FILE__ ).'sql.sql';
  $mysql_host = DB_HOST;
  $mysql_username = DB_USER;
  $mysql_password = DB_PASSWORD;
  $mysql_database = DB_NAME;
  mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
  mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
  $templine = '';
  $lines = file($filename);
  foreach ($lines as $line)
  {
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;
    $templine .= $line;
    if (substr(trim($line), -1, 1) == ';')
    {
        mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
        $templine = '';
    }
  }





  /*END create table*/

  $content = '<?';
  $content .= ' function data_base(){ ';
  $content .= ' $iba = new mysqli("'.DB_HOST.'", "'.DB_USER.'","'.DB_PASSWORD.'" ,"'.DB_NAME.'" ); ';
  $content .= ' if (!$iba) ';
  $content .= ' throw new Exception("Error..."); ';
  $content .= ' else ';
  $content .= ' return $iba; ';
  $content .= ' } ';
  $content .= ' $base_url = "'.get_bloginfo('wpurl').'"; ';
  $content .= ' $table_prefix = "'.$wpdb->prefix.'"; ';
  $content .= ' ?> ';

  // write into function.php
  $myfile = fopen(plugin_dir_path( __FILE__ )."server/function.php", "w") or die("Unable to open file!");
  fwrite($myfile, $content);
  fclose($myfile);

  $db2 =' <?php 
  function lacz_bd()
  {
     $wynik = new mysqli("'.DB_HOST.'", "'.DB_USER.'", "'.DB_PASSWORD.'", "'.DB_NAME.'");
     if (!$wynik)
        throw new Exception("Error...Please try again later...");
     else
        return $wynik;
  }
  $base_url = "'.get_bloginfo('wpurl').'";
      $table_prefix = "'.$wpdb->prefix.'";
   ';

  ;



  // write into admin_nta/db.php

  $myfile2 = fopen(plugin_dir_path( __FILE__ )."server/admin_nta/db.php", "w") or die("Unable to open file!");
  fwrite($myfile2, $db2);
  fclose($myfile2);


  // write for android html

  $js = '
    var url = "'.get_bloginfo('wpurl').'";


  ';
 
  $myfile3 = fopen(plugin_dir_path( __FILE__ )."android/base_url.js", "w") or die("Unable to open file!");
  fwrite($myfile3, $js);
  fclose($myfile3);

}

function Zip($source, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file)
        {
            $file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
            if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                continue;

            $file = realpath($file);

            if (is_dir($file) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true)
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}





add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
  add_submenu_page( 'options-general.php', 'Turn WP to Android', 'Turn WP to Android', 'manage_options', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' );
}

function my_custom_submenu_page_callback() {
  if(isset($_POST['createzip'])){
    Zip(plugin_dir_path( __FILE__ ).'android', plugin_dir_path( __FILE__ ).'android-'.date('d-m-Y').'.zip');
    echo '
    <div id="setting-error-settings_updated" class="updated settings-error"> 
<p><strong>Create success. <a href="'.get_bloginfo('wpurl').'/wp-content/plugins/turn-wp-to-android/android-'.date('d-m-Y').'.zip">Click here to download</a></strong></p></div>
    ';
  }
?>
  <div class="wrap"><div id="icon-tools" class="icon32"></div>
    <h2>Turn WP to Android Free version</h2>
Free version:<br>
- Support Only Uncategory, Upgrade to Pro to Get all category <a href="http://wordpress-mobile-app-plugin.xyz">BUY NOW</a><br>
- Get 10 lastest post from Uncategory, Pro Version to Get all post <a href="http://wordpress-mobile-app-plugin.xyz">BUY NOW</a><br>

Pro version:<br>
- Pro to Get all category<br>
- Pro Version to Get all post from your wordpress<br>
- Search Function<br>
- Abmod Ready<br>

Plugins To Turn WordPress Into A Mobile App<br>

Price: only 45 USD / Life Time<br>

<a href="http://wordpress-mobile-app-plugin.xyz">BUY NOW</a><br>


<img src="http://wordpress-mobile-app-plugin.xyz/wp-content/uploads/2015/07/intro-3-copy.png"><br>

    <form action="" method="post">
      <input type="submit" class="btn" name="createzip" value="Create Apk File">
    </form><br>
	
	Click buttom , create your app code, after Create Zip File, upload to Phonegap and you get your app. Watch video tutorial.
	
      <br>
     
    </p>

	Video Tutorial how to setup<br>
	
<li><strong>Video Tutorial 1: </strong>How to install Plugin</li>
</ul>
</ul>
<iframe src="https://www.youtube.com/embed/e3ZaWBaBw8o" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
<ul>
<ul>
	<li><strong>Video Tutorial 2 : How to generate app file, Build app using PhoneGap</strong></li>
</ul>
</ul>
<iframe src="https://www.youtube.com/embed/3zxDiA9OL0I" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
<iframe src="https://www.youtube.com/embed/Ssc9ERyHUQI" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
<ul>
<ul>
	<li><strong>Video Tutorial 3 : Test APP in real device</strong></li>
	
<iframe width="560" height="315" src="https://www.youtube.com/embed/GgRINQZoBy8" frameborder="0" allowfullscreen></iframe>	
</ul>
</ul>
<h2>FAQ</h2>
	<img src="http://wordpress-mobile-app-plugin.xyz/wp-content/uploads/2015/09/preview.png">

	
  </div>
<?php
}