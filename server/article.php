<? 
//header('content-type: text/html; charset=iso-8859-1');
header(base64_decode('Q29udGVudC1UeXBlOiB0ZXh0L2h0bWw7IGNoYXJzZXQ9dXRmLTg='));
header(base64_decode('QWNjZXNzLUNvbnRyb2wtQWxsb3ctT3JpZ2luOiAq'));
require_once(base64_decode('ZnVuY3Rpb24ucGhw'));

$id = addslashes(strip_tags($_GET[base64_decode('aWQ=')]));
$art = addslashes(strip_tags($_GET[base64_decode('YXJ0')]));	
	
	if($id){
		
		$connect = data_base();
		$qm1 = $connect->query(base64_decode('U0VUIE5BTUVTIHV0Zjg='));	
		
		$qm = $connect->query(base64_decode('U0VMRUNUICogRlJPTSBudGFfbWVzc2FnZSBXSEVSRSBpZCA9ICczJyBBTkQgb25saW5lID0gJzEn'));	
		if ($qm->num_rows>0){
			
			$sqm = $qm->fetch_row(); 
		?>
		
        <a href="message.html?id=3" class="message_alert" style="background-color:#<?  echo $sqm[1]; ?>; color:#<?  echo $sqm[2]; ?>;"><div style="padding:20px;"><?  echo $sqm[3]; ?></div></a>
        <? 
		}
		
		//$question = $connect->query("SELECT * FROM nta_article WHERE id = '$art' AND id_grid = '$id' AND online = '1' ORDER BY date DESC, id DESC");
		$question = $connect->query(base64_decode('U0VMRUNUIGlkLHBvc3RfYXV0aG9yLHBpbmdfc3RhdHVzLCBwb3N0X2RhdGUsIHBvc3RfdGl0bGUsIHBvc3RfY29udGVudCBGUk9NIA==').$table_prefix."posts WHERE id = '$art' ORDER BY post_date DESC, id DESC");
		$article = $question->fetch_row();		
		if ($question->num_rows>0){
			
			$y = substr($article[3], 0, 4); 
			$m = substr($article[3], 5, 2); 
			$d = substr($article[3], 8, 2);	
			
			$que = $connect->query(base64_decode('U0VMRUNUIGd1aWQgRlJPTSA=').$table_prefix."posts WHERE post_parent = '$article[0]' and post_type = 'attachment'"); 			
			$aaa = $que->fetch_row();			
		?>
		
        <div class="article_bg">
        <div class="article_date"><?  echo $d; ?>.<?  echo $m; ?>.<?  echo $y; ?></div>
            <div class="article_title">
			<p style="font-family: 'Trebuchet MS', Helvetica, sans-serif">
            <?  echo $article[4]; ?>
			</p>
            </div>
			<?php /* ?>
            <img src="<?php echo $base_url.'/wp-content/plugins/turn-wp-to-android/server'; ?>/images/articles/<? echo $article[2]; ?>" width="990" class="article_img">
			<?php */ ?>
			<img src="<?  echo $aaa[0]; ?>" width="990" class="article_img">
            
			<div style="width:990px;">
  <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.invedion.com" data-lang="en"></a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            
            <iframe src="http://www.facebook.com/plugins/like.php?href=http://invedion.com?id=<?  echo $article[0]; ?>&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=trebuchet+ms&amp;height=30" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:30px;" class="fbl" allowTransparency="true"></iframe>
            
            </div>
            <div style="clear:both;"></div>
			<div class="article_txt">
        	<p style="font-family: 'Trebuchet MS', Helvetica, sans-serif">
			<?  //echo utf8_encode($article[5]); ?>
			<?  echo $article[5]; ?>
			</p>
            <div style="width:100%; height:30px;"></div>
            <? 
			define(base64_decode('QU4='), $art);
			
			class ImageFilter extends FilterIterator { public function accept() { return preg_match(base64_decode('QFxf').AN.base64_decode('X2cuKGdpZnxqcGU/Z3xwbmcpJEBp'),$this->current()); } }
			
			foreach (new ImageFilter(new DirectoryIterator(base64_decode('aW1hZ2VzL2FydGljbGVzLw=='))) as $img) {
			?>          
			<img src="<?php echo $base_url.base64_decode('L3dwLWNvbnRlbnQvcGx1Z2lucy90dXJuLXdwLXRvLWFuZHJvaWQvc2VydmVy'); ?>/images/articles/<?  echo $img; ?>" style="margin-bottom:20px; width:100%;" />
			<?  } ?>
            
        	</div>
			<?php 
			$catalo_id = $connect->query(base64_decode('U0VMRUNUIHRlcm1fdGF4b25vbXlfaWQgRlJPTSA=').$table_prefix."term_relationships WHERE object_id = '$art'");
			$catalo_id_ = $catalo_id->fetch_row(); 
			?>
			<?php /* ?>
			<a href="article_list.html?id=<? echo $article[1]; ?>" class="article_back"></a>
			<?php */ ?>
			<a href="article_list.html?id=<?  echo $catalo_id_[0]; ?>" class="article_back"></a>
        <div style="clear:both;"></div>
		<div class="article_bg">
		<!-------------------------------------------------------------------------------------------------------->

		<? 
		$qm = $connect->query(base64_decode('U0VMRUNUICogRlJPTSBudGFfbWVzc2FnZSBXSEVSRSBpZCA9ICcyJyBBTkQgb25saW5lID0gJzEn'));	
		if ($qm->num_rows>0){
			
			$sqm = $qm->fetch_row(); 
		?>
        <a href="message.html?id=2" class="message_alert" style="background-color:#<?  echo $sqm[1]; ?>; color:#<?  echo $sqm[2]; ?>;"><div style="padding:20px;"><?  echo $sqm[3]; ?></div></a>
        <? 
		}
		
		//$question = $connect->query("SELECT * FROM nta_article WHERE id_grid = '$id' AND online = '1' ORDER BY date DESC, id DESC LIMIT 10");
		$question = $connect->query(base64_decode('U0VMRUNUIGFhLmlkLCBiYi50ZXJtX2lkLGFhLnBvc3Rfc3RhdHVzLCBhYS5wb3N0X2RhdGUsIGFhLnBvc3RfdGl0bGUgRlJPTSA=').$table_prefix.base64_decode('cG9zdHMgYWEsIA==').$table_prefix.base64_decode('dGVybXMgYmIsIA==').$table_prefix."term_relationships cc 
		WHERE aa.id = cc.object_id 
		and cc.term_taxonomy_id = bb.term_id
		and aa.post_status = 'publish'
		and aa.post_type = 'post'
		and cc.term_taxonomy_id = '$id'
		ORDER BY RAND() LIMIT 10");
		for ($lp = 0; $rz = $question->fetch_row(); ++$lp){ $tab[$lp] = $rz; }		
		if ($question->num_rows>0){
			
				$qe = $connect->query("SELECT article_effect FROM nta_grid WHERE id = '$id'");
				$wqe = $qe->fetch_row();		
			?>			
			
			<? 
			foreach ($tab as $article){ 
			
				$title = substr($article[4], 0, 150);
				$y = substr($article[3], 0, 4); 
				$m = substr($article[3], 5, 2); 
				$d = substr($article[3], 8, 2);

			$que = $connect->query(base64_decode('U0VMRUNUIGd1aWQgRlJPTSA=').$table_prefix."posts WHERE post_parent = '$article[0]' and post_type = 'attachment'"); 			
			$aaa = $que->fetch_row();
			?>
			
            
			<div class='box'>
                <div class="content" style="background:url(<?  echo $aaa[0]; ?>);background-size: 100% 100%;background-repeat: no-repeat;">
					<a href="article.html?id=<?  echo $article[1]; ?>&art=<?  echo $article[0]; ?>">
                    <div class="">
                        <div class="category_bg_data"><?  echo $d; ?>.<?  echo $m; ?>.<?  echo $y; ?></div>
                        <div class="category_bg_title">
						<p style="font-family: 'Trebuchet MS', Helvetica, sans-serif; width:50%;">
						<?  echo $title; if(strlen($title)==150){ echo base64_decode('Li4u');echo $tab1[0]; } ?>
						</p>
						</div>
                    </div>
					</a>
                </div>
			</div>
            
            
            <? 
			}
			?>                    
                                      		
            <? 
		} else {
		?>        
        <div class="alert_bg">
        <div style="padding:20px 50px 20px 50px;">No entries in this category</div>
        </div>

		<? 	
		}
		?>
		<!-------------------------------------------------------------------------------------------------------->
		</div>
        </div>         
        <?   
		}
	}
?>