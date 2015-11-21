<? 
header(base64_decode('Q29udGVudC1UeXBlOiB0ZXh0L2h0bWw7IGNoYXJzZXQ9dXRmLTg='));
header(base64_decode('QWNjZXNzLUNvbnRyb2wtQWxsb3ctT3JpZ2luOiAq'));
require_once(base64_decode('ZnVuY3Rpb24ucGhw'));
		//20150422 add
		$effect[1] = base64_decode('c2Nyb2xsSG9yeg==');
		$effect[2] = base64_decode('ZmxpcEhvcno=');
		$effect[3] = base64_decode('c2Nyb2xsVmVydA==');	
		$effect[4] = base64_decode('c2Nyb2xsSG9yeg==');
		$effect[5] = base64_decode('c2Nyb2xsSG9yeg==');
		$effect[6] = base64_decode('dGlsZVNsaWRl');
		$effect[7] = base64_decode('c2Nyb2xsSG9yeg==');
		$effect[8] = base64_decode('c2Nyb2xsVmVydA==');
		$effect[9] = base64_decode('c2Nyb2xsSG9yeg==');
		$effect[10] = base64_decode('ZmxpcFZlcnQ=');
		$effect[11] = base64_decode('dGlsZVNsaWRl');
		
		$delay[1] = -200;
		$delay[2] =  -1000;
		$delay[3] =  -1400;	
		$delay[4] =  -800;
		$delay[5] =  -1100;
		$delay[6] =  -1800;
		$delay[7] =  -1900;
		$delay[8] =  -2500;
		$delay[9] = -600;
		$delay[10] =  -700;
		$delay[11] =  -100;
		
		$width[1] =  577;
		$width[2] =  473;
		$width[3] = 474;	
		$width[4] = 576;
		$width[5] =  344;
		$width[6] =   384;
		$width[7] = 312;
		$width[8] =  649;
		$width[9] =  401;
		$width[10] = 434;
		$width[11] =  616;
		
		$title_position[1] =  base64_decode('Ym90dG9t');
		$title_position[2] =  base64_decode('dG9w');
		$title_position[3] = base64_decode('Ym90dG9t');	
		$title_position[4] = base64_decode('dG9w');
		$title_position[5] =  base64_decode('dG9w');
		$title_position[6] =   base64_decode('Ym90dG9t');
		$title_position[7] = base64_decode('dG9w');
		$title_position[8] =  base64_decode('dG9w');
		$title_position[9] =  base64_decode('Ym90dG9t');
		$title_position[10] = base64_decode('dG9w');
		$title_position[11] =  base64_decode('dG9w');
		
		$article_effect[1] =  base64_decode('Z3Jvdw==');
		$article_effect[2] =  base64_decode('emlwcGVy');
		$article_effect[3] = base64_decode('Y3VybA==');	
		$article_effect[4] = base64_decode('d2F2ZQ==');
		$article_effect[5] =  base64_decode('ZmxpcA==');
		$article_effect[6] =   base64_decode('Zmx5');
		$article_effect[7] = base64_decode('Zmx5LXNpbXBsaWZpZWQ=');
		$article_effect[8] =  base64_decode('Zmx5LXJldmVyc2U=');
		$article_effect[9] =  base64_decode('c2tldw==');
		$article_effect[10] = base64_decode('ZmFu');
		$article_effect[11] =  base64_decode('aGVsaXg=');

		//20150422 add

		$connect = data_base();
		$qm1 = $connect->query(base64_decode('U0VUIE5BTUVTIHV0Zjg='));
		$qm = $connect->query(base64_decode('U0VMRUNUICogRlJPTSBudGFfbWVzc2FnZSBXSEVSRSBpZCA9ICcxJyBBTkQgb25saW5lID0gJzEn'));	
		if ($qm->num_rows>0){
			
			$sqm = $qm->fetch_row(); 
		?>
        <a href="message.html?id=1" class="message_alert" style="background-color:#<?  echo $sqm[1]; ?>; color:#<?  echo $sqm[2]; ?>;"><div style="padding:20px;"><?  echo $sqm[3]; ?></div></a>
        <? 
		}
		

		$question = $connect->query(base64_decode('U0VMRUNUICogRlJPTSA=').$table_prefix.base64_decode('dGVybXMgd2hlcmUgdGVybV9pZCA9ICcxJw=='));
		for ($lp = 0; $rz = $question->fetch_row(); ++$lp){ $tab[$lp] = $rz; }		
		if ($question->num_rows>0){ 
			?><? 
			$count = 1;
			foreach ($tab as $grid){ 
				
			?>
	
			
			<a href="article_list.html?id=<?  echo $grid[0]; ?>" class="" data-cycle-fx='<?  echo $effect[$count]; ?>' data-cycle-delay="<?  echo $delay[$count]; ?>" style="">

<div style="width:100%;height:auto; float:left; padding: 5px;position: relative;display: inline-block;" >
			<p style="font-family: 'Trebuchet MS', Helvetica, sans-serif;position: absolute; padding:10px; font-size: 2.5em;margin-top: 180px; background-color: black; opacity:0.5; color:white;height:100px;width:94%; float:center;"><?  echo substr($grid[1],0,40);?></p>
			
			<?php  ?>
             <? 
			 

			$question_2 = $connect->query(base64_decode('c2VsZWN0IGd1aWQgZnJvbSA=').$table_prefix.base64_decode('cG9zdHMgd2hlcmUgaWQgaW4gKHNlbGVjdCBtZXRhX3ZhbHVlIGZyb20g').$table_prefix.base64_decode('cG9zdG1ldGEgd2hlcmUgcG9zdF9pZCBpbiAoIFNFTEVDVCBtYXgob2JqZWN0X2lkKSBGUk9NIA==').$table_prefix."term_relationships WHERE term_taxonomy_id = '$grid[0]') and meta_key ='_thumbnail_id') and post_type = 'attachment'");
			for ($lp_2 = 0; $rz_2 = $question_2->fetch_row(); ++$lp_2){ $tab_2[$lp_2] = $rz_2; }
			$pn = 1;		
			if ($question_2->num_rows>0){
				foreach ($tab_2 as $pt){  
					?>
					<img src="<?  echo $pt[0]; ?>" style="max-width:100%;max-height:100%;width:100%;height:auto;">
					<? 
break;
					$pn++;
			} 
			unset($tab_2); }
			?>
            </a>
</div>


    <?php     $count = $count + 1;
    }
?>
<div style="padding:20px 50px 20px 50px;"><p style="font-size:25em;"></p></div>
<?php }  else {
?>

<div class="alert_bg">
<div style="padding:20px 50px 20px 50px;">No entries in this category</div>
</div>

<?php }
?>


<script src="plugins/jquery.cycle2.js"></script>
<script src="plugins/jquery.cycle2.scrollVert.js"></script>
<script src="plugins/jquery.cycle2.flip.min.js"></script>
<script src="plugins/jquery.cycle2.shuffle.min.js"></script>
<script src="plugins/jquery.cycle2.tile.min.js"></script>