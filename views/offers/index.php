
<div id="display_list">
    <div class="list" id="left_pannel">
        <?php 
            $currentPage = 1;
            $numberArticle = 5;
            if (sizeof($SelectOffer)%5 == 0){ $numberPages = sizeof($SelectOffer)/$numberArticle;}else{$numberPages = round(sizeof($SelectOffer)/$numberArticle, 0) + 1;}

            if(isset(explode('=',$_SERVER['REQUEST_URI'])[1]))
            {
                if(explode('=',$_SERVER['REQUEST_URI'])[1])
                $currentPage = explode('=',$_SERVER['REQUEST_URI'])[1];
            }
            else
            {
                $currentPage = 1;
            }

            if($currentPage >= $numberPages)
                $currentPage = $numberPages;

        ?>
        <div id="pages_buttons_up">
            <?php 
                for ($p = 1; $p <= $numberPages; $p++)
                {
                    if ($currentPage != $p) echo("<a href='?page=$p'>$p</a>");
                    else echo("<a>$p</a>");
                }
            ?>
        </div>

        <?php
        
        if (sizeof($SelectOffer) > 0) {
            if ($currentPage == $numberPages){
                for ($i = (($numberPages * $numberArticle) - $numberArticle); $i < sizeof($SelectOffer); $i++) {
                    echo ('<div class="tab_list" onclick="PannelAppear()">
                            <div>
                                <h3> '. $SelectOffer[$i]['Title'] .'</h3>
                                <p>'. $SelectOffer[$i]['Description'] .'</p>
                            </div>
                        </div>');
                }
            }
            else {
                for ($i = ($currentPage * $numberArticle) - $numberArticle; $i < $currentPage * $numberArticle; $i++) {
                    echo ('<div class="tab_list" onclick="PannelAppear()">
                            <div>
                                <h3> '. $SelectOffer[$i]['Title'] .'</h3>
                                <p>'. $SelectOffer[$i]['Description'] .'</p>
                            </div>
                        </div>');
                }
            }
        }
        ?>

        <div id="pages_buttons_down">
            <?php 
                for ($p = 1; $p <= $numberPages; $p++)
                {
                    if ($currentPage != $p) echo("<a href='?page=$p'>$p</a>");
                    else echo("<a>$p</a>");
                }
            ?>
        </div>
    </div>
    <div class="container_info" id="right_pannel">

    </div>
</div>