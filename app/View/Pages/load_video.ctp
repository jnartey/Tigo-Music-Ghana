<?php
	echo '<div class="large-12 columns video-screen">';
	echo '<div class="video-emb">';
	if($video['Video']['youtube'] == 1){
		echo '<div class="y-desktop">';
		$link = $video['Video']['youtube_link'];
		$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
		if(empty($video_id[1]))
		    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

		$video_id = explode("&", $video_id[1]); // Deleting any other params
		$video_id = $video_id[0];
		
		echo '<iframe width="100%" height="323" src="//www.youtube.com/embed/'.$video_id.'?rel=0&autoplay=0&loop=0" frameborder="0" allowfullscreen></iframe>';
		echo '</div>';
		echo '<div class="y-mobile">';
		$link = $video['Video']['youtube_link'];
		$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
		if(empty($video_id[1]))
		    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

		$video_id = explode("&", $video_id[1]); // Deleting any other params
		$video_id = $video_id[0];
		
		echo '<iframe width="100%" height="323" src="//www.youtube.com/embed/'.$video_id.'?rel=0&autoplay=0&loop=0" frameborder="0" allowfullscreen></iframe>';
		echo '</div>';
	}else{
		echo "<video id='player' src='".$this->Html->url(DS.'files'.DS.'videos'.DS.$video['Video']['video_mp4'], true)."' poster='".$this->Html->url(DS.'img'.DS.'videos'.DS.'thumb'.DS.'large'.DS.$video['Video']['video_poster'], true)."' width='800' height='485' style='width:100%; height:100%;' controls='controls' preload='none' autoplay='true'></video>";
	}
	echo '</div>';
	echo '<h4>'.$video['Video']['name'].'</h4>';
	echo '</div>';
?>