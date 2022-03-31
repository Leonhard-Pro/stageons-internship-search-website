
<div id="display_list">
    <div class="list" id="left_pannel">
        <?php 
            $currentPage = 1;
            $numberArticle = 5;
            if (sizeof($SelectCompany)%5 == 0){ $numberPages = sizeof($SelectCompany)/$numberArticle;}else if(sizeof($SelectCompany) < ($numberArticle + 1)) { $numberPages = 1; }else{$numberPages = round(sizeof($SelectCompany)/$numberArticle, 0) + 1;}

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
        if (sizeof($SelectCompany) > 0) {
            if ($currentPage == $numberPages){
                for ($i = (($numberPages * $numberArticle) - $numberArticle); $i < sizeof($SelectCompany); $i++) {
                    echo ('<div class="tab_list">
                            <div>
                                <h3>  '. $SelectCompany[$i]['Company_Name'] .'</h3>
                                <p> <b>Description:</b> '. $SelectCompany[$i]['Company_Description'] .'</p>
                                <p> <b>Email:</b> '. $SelectCompany[$i]['Email_Company'] .'</p>
                                <p> <b>Domain Activity:</b> '. $SelectCompany[$i]['Domain_Activity'] .'</p>
                                <p> <b>Street Number:</b> '. $SelectCompany[$i]['Street_Number'] .'</p>
                                <p> <b>Street Name:</b> '. $SelectCompany[$i]['Street_Name'] .'</p>
                                <p> <b>City:</b> '. $SelectCompany[$i]['City'] .'</p>
                                <p> <b>Postal Code:</b> '. $SelectCompany[$i]['Postal_Code'] .'</p>
                                <p> <b>CESI_Trainee_Accept:</b> '. $SelectCompany[$i]['CESI_Trainee_Accept'] .'</p>
                                <p> <b>Score Student:</b> '. $SelectCompany[$i]['scorestudent'] .'</p>
                                <p> <b>Score Pilot:</b> '. $SelectCompany[$i]['scorepilot'] .'</p>
                            </div>
                        </div>');
                }
            }
            else {
                for ($i = ($currentPage * $numberArticle) - $numberArticle; $i < $currentPage * $numberArticle; $i++) {
                    echo ('<div class="tab_list">
                            <div>
                                <h3> '. $SelectCompany[$i]['Company_Name'] .'</h3>
                                <p> <b>Description:</b> '. $SelectCompany[$i]['Company_Description'] .'</p>
                                <p> <b>Email:</b> '. $SelectCompany[$i]['Email_Company'] .'</p>
                                <p> <b>Domain Activity:</b> '. $SelectCompany[$i]['Domain_Activity'] .'</p>
                                <p> <b>Street Number:</b> '. $SelectCompany[$i]['Street_Number'] .'</p>
                                <p> <b>Street Name:</b> '. $SelectCompany[$i]['Street_Name'] .'</p>
                                <p> <b>City:</b> '. $SelectCompany[$i]['City'] .'</p>
                                <p> <b>Postal Code:</b> '. $SelectCompany[$i]['Postal_Code'] .'</p>
                                <p> <b>CESI_Trainee_Accept:</b> '. $SelectCompany[$i]['CESI_Trainee_Accept'] .'</p>
                                <p> <b>Score Student:</b> '. $SelectCompany[$i]['scorestudent'] .'</p>
                                <p> <b>Score Pilot:</b> '. $SelectCompany[$i]['scorepilot'] .'</p>
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