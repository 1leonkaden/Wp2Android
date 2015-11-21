<? 
//header('content-type: text/html; charset=iso-8859-2');
header(base64_decode('Q29udGVudC1UeXBlOiB0ZXh0L2h0bWw7IGNoYXJzZXQ9dXRmLTg='));
header(base64_decode('QWNjZXNzLUNvbnRyb2wtQWxsb3ctT3JpZ2luOiAq'));
require_once(base64_decode('ZnVuY3Rpb24ucGhw'));

$id = addslashes(strip_tags($_GET[base64_decode('aWQ=')]));
	
	if($id){
		
		$connect = data_base();
		$question = $connect->query("SELECT * FROM nta_message WHERE id = '$id' AND online = '1'");
		$article = $question->fetch_row();		
		if ($question->num_rows>0){
					
		?>
        <div class="article_bg">
        	<br /><br />
            <div class="article_title">
            <?  echo $article[4]; ?>
            </div>
            
			<div class="article_txt">
        	<?  echo $article[5]; ?>
        	</div>
        <a href="index.html" class="article_back"></a>
        <div style="clear:both;"></div>
        </div>  
        <?   
		}
	}
?>