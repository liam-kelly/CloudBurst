<?php

//includes
if(!(defined('ABSPATH'))){
    require_once('../../path.php');
}
require_once(ABSPATH.'includes/models/video.php');
?>

<h2>New Shows</h2>
<ul class="bxsliderCar">

    <?php

    //get the list of videos
    $video = new video;
    $list = $video->get_library();

    foreach($list as $item){

        echo '<li class="slide"><a href="./?p=video&id="'.$item['imdb_id'].'"><img src="'.$item['cover'].'" title="'.$item['title'].'"></a></li>'."\r\n";
    }

    ?>

</ul>
<!--
<h2>Favorites</h2>
<ul class="bxsliderCar">
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%201"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%202"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%203"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%204"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%205"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%206"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%207"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%208"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%209"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%2010"></li>
    <li class="slide"><img src="http://placehold.it/200x230&text=Show%2011"></li>
</ul>
-->
<script>
    $(document).ready(function(){
        $(".bxsliderCar").bxSlider({
            slideMargin: 10,
            slideWidth: 200,
            minSlides: 1,
            maxSlides: 10,
            moveSlides: 3,
            infiniteLoop: false
        });
    });
</script>
<style>
    .bx-wrapper .bx-viewport{
        background: transparent;
        border-top: solid #000 3px;
        border-bottom: solid #000 3px;
        border-left: none;
        border-right: none;
    }
    
    .bxsliderCar {
        padding-top: 0px;
        margin-top: 0px;
    }
</style>

