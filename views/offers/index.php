<div id="display_list">
    <div class="list" id="left_pannel">
        <?php 
            $currentPage = 1;
            $numberArticle = 10;
            $numberPages = 3;

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
        <div id="pages_buttons">
            <?php 
                for ($p = 1; $p <= $numberPages; $p++)
                {
                    if ($currentPage != $p) echo("<a href='?page=$p'>$p</a>");
                    else echo("<a>$p</a>");
                }
            ?>
        </div>

        <?php
        for ($i = ($currentPage * $numberArticle) - $numberArticle; $i < $currentPage * $numberArticle; $i++) {
            echo ('<div class="tab_list" onclick="PannelAppear()">
                    <div>
                        <h3>Title of the offer '.$i.'</h3>
                        <p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse. We continue, as we want to test responsiveness and any kind of automatic modification.</p>
                    </div>
                </div>');
        }
        ?>
    </div>
    <div class="container_info" id="right_pannel">
    </div>
</div>