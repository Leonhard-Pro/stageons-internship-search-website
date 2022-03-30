<?php 

    var_dump($management['action']);
    if ($management['action'] == ""){
    $currentPage = 1;
    $numberArticle = 5;
    
        if($management['type'] == 'Offers'){
            $sizeArray = sizeof($SelectOffer);
        }else if($management['type'] == 'Companies'){
            $sizeArray = sizeof($SelectCompany);
        }else if($management['type'] == 'Pilot'){
            $sizeArray = sizeof($SelectPilot);
        }else if($management['type'] == 'Delegate'){
            $sizeArray = sizeof($SelectDelegate);
        }else if($management['type'] == 'Student'){
            $sizeArray = sizeof($SelectStudent);
        }
    

        if ($sizeArray%5 == 0){ $numberPages = $sizeArray/$numberArticle;}else{$numberPages = round($sizeArray/$numberArticle, 0) + 1;}

        if(isset(explode('=',$_SERVER['REQUEST_URI'])[1]))
        {
            if(explode('=',$_SERVER['REQUEST_URI'])[1])
            $currentPage = explode('=',$_SERVER['REQUEST_URI'])[1];
        }
        else
        {
            $currentPage = 1;
        }

        if($currentPage >= $numberPages){
            $currentPage = $numberPages;
        }
    }


    
?>

<div id="main">
    <div class="menu-management">
        <form action="" method="POST">
            <input type="submit" name="typeManagement" value="Offers">
            <input type="submit" name="typeManagement" value="Companies">
            <input type="submit" name="typeManagement" value="Student">
            <input type="submit" name="typeManagement" value="Delegate">
            <?php if ($user['userType'] != "Pilot") : ?>
                <input type="submit" name="typeManagement" value="Pilot">
            <?php endif; ?>
        </form>
    </div>

    <?php if ($filter['type'] != "") : ?>
        <div id="filters">
            <?php include("views/layout/filters.php"); ?>
        </div>
    <?php endif; ?>
    
    <div class="management-interface">
        <?php if ($management['action'] == ""): ?> 
        <div id="pages_buttons_up">
            <?php 
                for ($p = 1; $p <= $numberPages; $p++)
                {
                    if ($currentPage != $p) echo("<a href='?page=$p'>$p</a>");
                    else echo("<a>$p</a>");
                }
            ?>
        </div>
        <?php endif; ?> 

            
        <?php if ($management['action'] == ""): ?>
            <?php if ($user['userAuthorization'][2] || $user['userAuthorization'][8] || $user['userAuthorization'][13] || $user['userAuthorization'][17] || $user['userAuthorization'][22]): ?>
                <form class="form-create" action="" method="POST">
                    <div class="polygon-form">
                        <input name="typeManagement" type="hidden" value="<?php echo $management['type']; ?>"></input>
                        <button type="submit" name="actionManagement" value="Create"></button>
                    </div>
                </form>
            <?php endif ?>

            <?php
            if ($sizeArray > 0) {
                if ($currentPage == $numberPages){
                    for ($i = (($numberPages * $numberArticle) - $numberArticle); $i < $sizeArray; $i++) {
                        if ($management['type'] == "Offers"){
                            echo ('<div class="offer">
                                    <div class="informations">
                                        <h1 class="information-offer offer-title">'.$SelectOffer[$i]['Title'].'</h1>
                                        <h2 class="information-offer offer-name-company">'.$SelectOffer[$i]['Company_Name'].'</h2>
                                        <h3 class="information-offer offer-locate">'.$SelectOffer[$i]['City'].' ('.$SelectOffer[$i]['Postal_Code'].')</h3>
                                        <h3 class="information-offer offer-degree">'.$SelectOffer[$i]['Degree_Level_Required'].'</h3>
                                        <h3 class="information-offer offer-date-publish">'.$SelectOffer[$i]['Date'].'</h3>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][9]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][10]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                        if ($management['type'] == "Companies"){
                            echo ('<div class="company">
                                    <div class="informations">
                                        <h1 class="information-company company-name-company">'. $SelectCompany[$i]["Company_Name"].'</h1>
                                        <h2 class="information-company company-locate">'. $SelectCompany[$i]["City"].' ('. $SelectCompany[$i]["Postal_Code"].')</h2>
                                        <h2 class="information-company company-domain-activity">'. $SelectCompany[$i]["Domain_Activity"].'</h2>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][3]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][5]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                        if ($management['type'] == "Student"){
                            echo ('<div class="student">
                                    <div class="informations">
                                        <h1 class="information-student student-name">'. $SelectStudent[$i]["Person_Name"].'</h1>
                                        <h1 class="information-student student-first-name">'. $SelectStudent[$i]["Person_First_Name"].'</h1>
                                        <h2 class="information-student student-center">'. $SelectStudent[$i]["Center"].'</h2>
                                        <h2 class="information-student student-class">'. $SelectStudent[$i]["Class"].'</h2>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][23]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][24]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                        if ($management['type'] == "Delegate"){
                            echo ('<div class="delegate">
                                    <div class="informations">
                                        <h1 class="information-delegate delegate-name">'. $SelectDelegate[$i]["Person_Name"].'</h1>
                                        <h1 class="information-delegate delegate-first-name">'. $SelectDelegate[$i]["Person_First_Name"].'</h1>
                                        <h2 class="information-delegate delegate-center">'. $SelectDelegate[$i]["Center"].'</h2>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][18]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][19]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                        if ($management['type'] == "Pilot"){
                            echo ('<div class="pilot">
                                    <div class="informations">
                                        <h1 class="information-pilot pilot-name">'. $SelectPilot[$i]["Person_Name"].'</h1>
                                        <h1 class="information-pilot pilot-first-name">'. $SelectPilot[$i]["Person_First_Name"].'</h1>
                                        <h2 class="information-pilot pilot-center">'. $SelectPilot[$i]["Center"].'</h2>
                                        <h2 class="information-pilot pilot-class">'. $SelectPilot[$i]["Class"].'</h2>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][14]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][15]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }

                    }
                }
                else {
                    for ($i = ($currentPage * $numberArticle) - $numberArticle; $i < $currentPage * $numberArticle; $i++) {
                        if ($management['type'] == "Offers"){
                            echo ('<div class="offer">
                                    <div class="informations">
                                        <h1 class="information-offer offer-title">'.$SelectOffer[$i]['Title'].'</h1>
                                        <h2 class="information-offer offer-name-company">'.$SelectOffer[$i]['Company_Name'].'</h2>
                                        <h3 class="information-offer offer-locate">'.$SelectOffer[$i]['City'].' ('.$SelectOffer[$i]['Postal_Code'].')</h3>
                                        <h3 class="information-offer offer-degree">'.$SelectOffer[$i]['Degree_Level_Required'].'</h3>
                                        <h3 class="information-offer offer-date-publish">'.$SelectOffer[$i]['Date'].'</h3>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][9]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][10]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                        if ($management['type'] == "Companies"){
                            echo ('<div class="company">
                                    <div class="informations">
                                        <h1 class="information-company company-name-company">'. $SelectCompanies[$i]["Company_Name"].'</h1>
                                        <h2 class="information-company company-locate">'. $SelectCompanies[$i]["City"].' ('. $SelectCompanies[$i]["Postal_Code"].')</h2>
                                        <h2 class="information-company company-domain-activity">'. $SelectCompanies[$i]["Domain_Activity"].'</h2>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][3]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][5]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                        if ($management['type'] == "Student"){
                            echo ('<div class="student">
                                    <div class="informations">
                                        <h1 class="information-student student-name">'. $SelectStudent[$i]["Person_Name"].'</h1>
                                        <h1 class="information-student student-first-name">'. $SelectStudent[$i]["Person_First_Name"].'</h1>
                                        <h2 class="information-student student-center">'. $SelectStudent[$i]["Center"].'</h2>
                                        <h2 class="information-student student-class">'. $SelectStudent[$i]["Class"].'</h2>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][23]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][24]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                        if ($management['type'] == "Delegate"){
                            echo ('<div class="delegate">
                                    <div class="informations">
                                        <h1 class="information-delegate delegate-name">'. $SelectDelegate[$i]["Person_Name"].'</h1>
                                        <h1 class="information-delegate delegate-first-name">'. $SelectDelegate[$i]["Person_First_Name"].'</h1>
                                        <h2 class="information-delegate delegate-center">'. $SelectDelegate[$i]["Center"].'</h2>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][18]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][19]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                        if ($management['type'] == "Pilot"){
                            echo ('<div class="pilot">
                                    <div class="informations">
                                        <h1 class="information-pilot pilot-name">'. $SelectPilot[$i]["Person_Name"].'</h1>
                                        <h1 class="information-pilot pilot-first-name">'. $SelectPilot[$i]["Person_First_Name"].'</h1>
                                        <h2 class="information-pilot pilot-center">'. $SelectPilot[$i]["Center"].'</h2>
                                        <h2 class="information-pilot pilot-class">'. $SelectPilot[$i]["Class"].'</h2>
                                    </div>
                                    <div class="management-tools">
                                        <form class="form-update-delete" method="POST">');
                                            if ($user['userAuthorization'][14]) {
                                                echo ('<button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>');
                                            }
                                            if ($user['userAuthorization'][15]){
                                                echo ('<button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>');
                                            }
                                        echo ('</form>
                                    </div>
                                </div>');
                        }
                    }
                }
            }
            ?>
            <?php if ($management['action'] == ""): ?> 
            <div id="pages_buttons_down">
                <?php 
                    for ($p = 1; $p <= $numberPages; $p++)
                    {
                        if ($currentPage != $p) echo("<a href='?page=$p'>$p</a>");
                        else echo("<a>$p</a>");
                    }
                ?>
            </div>
            <?php endif; ?> 
        <?php endif; ?>
    </div>


    <?php if ($management['action'] == "Create" || $management['action'] == "Update") : ?>
        <form method="POST" id="management-form">
            <div class="management-create-update">
                <?php if ($management['type'] == "Pilot" || $management['type'] == "Delegate" || $management['type'] == "Student") : ?>
                    <h1 id="personal-title">Personal information</h1>
                    <div class="personal-informations">
                        <label for="personal-login">Login:</label>
                        <input class="personal-login" id="personal-login" type="email" placeholder="Login" name="login" required>
                        <label for="personal-password">Password:</label>
                        <div id="div-password">
                            <input class="personal-password" id="personal-password" type="password" placeholder="Password" name="password" required>
                            <i id="eye" class="fa fa-eye showpwd" onClick="showPwd('personal-password', this)"></i>
                        </div>
                        <label for="personal-name">Name:</label>
                        <input class="personal-name" id="personal-name" type="text" placeholder="Name" name="name" required>
                        <label for="personal-first-name">First Name:</label>
                        <input class="personal-first-name" id="personal-first-name" type="text" placeholder="First Name" name="first_name" required>
                        <label for="personal-email">Email:</label>
                        <input class="personal-email" id="personal-email" type="email" placeholder="Email" name="email" required>
                        <label for="personal-center">Center:</label>
                        <input class="personal-center" id="personal-center" type="text" placeholder="Center" name="center" required>
                        <label for="personal-class">Class:</label>
                        <input class="personal-class" id="personal-class" type="text" placeholder="Class" name="class" required>
                    </div>
                <?php endif; ?>
                <?php if (($management['type'] == "Delegate") && ($user['userAuthorization'][20])) : ?>
                    <h1 class="authorization-title">Authorization</h1>
                    <div class="authorization">
                        <div class="authorization-checkbox">
                            <h1 class="authorization-title authorization-subtitle">Offer</h1>
                            <input class="checkbox" type="checkbox" id="SFx2" name="SFx2"><label class="label-checkbox" for="SFx2">Search ?</label>
                            <input class="checkbox" type="checkbox" id="SFx3" name="SFx3"><label class="label-checkbox" for="SFx3">Create ?</label>
                            <input class="checkbox" type="checkbox" id="SFx4" name="SFx4"><label class="label-checkbox" for="SFx4">Update ?</label>
                            <input class="checkbox" type="checkbox" id="SFx5" name="SFx5"><label class="label-checkbox" for="SFx5">Rate ?</label>
                            <input class="checkbox" type="checkbox" id="SFx6" name="SFx6"><label class="label-checkbox" for="SFx6">Delete ?</label>
                            <input class="checkbox" type="checkbox" id="SFx7" name="SFx7"><label class="label-checkbox" for="SFx7">Consult Statistics ?</label>
                        </div>
                        <div class="authorization-checkbox">
                            <h1 class="authorization-title authorization-subtitle">Company</h1>
                            <input class="checkbox" type="checkbox" id="SFx8" name="SFx8"><label class="label-checkbox" for="SFx8">Search ?</label>
                            <input class="checkbox" type="checkbox" id="SFx9" name="SFx9"><label class="label-checkbox" for="SFx9">Create ?</label>
                            <input class="checkbox" type="checkbox" id="SFx10" name="SFx10"><label class="label-checkbox" for="SFx10">Update ?</label>
                            <input class="checkbox" type="checkbox" id="SFx11" name="SFx11"><label class="label-checkbox" for="SFx11">Delete ?</label>
                            <input class="checkbox" type="checkbox" id="SFx12" name="SFx12"><label class="label-checkbox" for="SFx12">Consult Statistics ?</label>
                        </div>
                        <div class="authorization-checkbox">
                            <h1 class="authorization-title authorization-subtitle">Pilot</h1>
                            <input class="checkbox" type="checkbox" id="SFx13" name="SFx13"><label class="label-checkbox" for="SFx13">Search ?</label>
                            <input class="checkbox" type="checkbox" id="SFx14" name="SFx14"><label class="label-checkbox" for="SFx14">Create ?</label>
                            <input class="checkbox" type="checkbox" id="SFx15" name="SFx15"><label class="label-checkbox" for="SFx15">Update ?</label>
                            <input class="checkbox" type="checkbox" id="SFx16" name="SFx16"><label class="label-checkbox" for="SFx16">Delete ?</label>
                        </div>
                        <div class="authorization-checkbox">
                            <h1 class="authorization-title authorization-subtitle">Delegate</h1>
                            <input class="checkbox" type="checkbox" id="SFx17" name="SFx17"><label class="label-checkbox" for="SFx17">Search ?</label>
                            <input class="checkbox" type="checkbox" id="SFx18" name="SFx18"><label class="label-checkbox" for="SFx18">Create ?</label>
                            <input class="checkbox" type="checkbox" id="SFx19" name="SFx19"><label class="label-checkbox" for="SFx19">Update ?</label>
                            <input class="checkbox" type="checkbox" id="SFx20" name="SFx20"><label class="label-checkbox" for="SFx20">Delete ?</label>
                            <input class="checkbox" type="checkbox" id="SFx21" name="SFx21"><label class="label-checkbox" for="SFx21">Assign rights ?</label>
                        </div>
                        <div class="authorization-checkbox">
                            <h1 class="authorization-title authorization-subtitle">Student</h1>
                            <input class="checkbox" type="checkbox" id="SFx22" name="SFx22"><label class="label-checkbox" for="SFx22">Search ?</label>
                            <input class="checkbox" type="checkbox" id="SFx23" name="SFx23"><label class="label-checkbox" for="SFx23">Create ?</label>
                            <input class="checkbox" type="checkbox" id="SFx24" name="SFx24"><label class="label-checkbox" for="SFx24">Update ?</label>
                            <input class="checkbox" type="checkbox" id="SFx25" name="SFx25"><label class="label-checkbox" for="SFx25">Delete ?</label>
                            <input class="checkbox" type="checkbox" id="SFx26" name="SFx26"><label class="label-checkbox" for="SFx26">Consult Statistics ?</label>
                        </div>
                        <div class="authorization-checkbox">
                            <h1 class="authorization-title authorization-subtitle">Management</h1>
                            <input class="checkbox" type="checkbox" id="SFx32" name="SFx32"><label class="label-checkbox" for="SFx32">Confirm Step 3 ?</label>
                            <input class="checkbox" type="checkbox" id="SFx33" name="SFx33"><label class="label-checkbox" for="SFx33">Confirm Step 4 ?</label>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($management['type'] == "Offers") : ?>
                    <h1 id="offers-title">Offer</h1>
                    <div class="offers-informations">
                        <label for="offer-title">Title:</label>
                        <input class="offer-title" id="offer-title" type="text" placeholder="Title" name="title" required>
                        <label for="offers-company">Company:</label>
                        <input class="offers-company" id="offers-company" type="text" placeholder="Company" name="company_name" required>
                        <label for="personal-login">Description:</label>
                        <textarea class="offers-description" id="offers-description" placeholder="Description" name="description" form="management-form"></textarea>
                        <label for="personal-login">Skill(s):</label>
                        <input class="offers-skill" id="offers-skill" type="text" placeholder="Skill(s): e.g. HTML - CSS - PHP" name="skills" required>
                        <label for="personal-login">Duration:</label>
                        <input class="offers-duration" id="offers-duration" type="number" placeholder="Duration" name="duration" required>
                        <label for="personal-login">Time Unit:</label>
                        <input class="offers-duration-type" id="offers-duration-type" type="text" placeholder="Time Unit" name="time_unit" required>
                        <label for="personal-login">Degree require:</label>
                        <input class="offers-degree" id="offers-degree" type="text" placeholder="Grade required" name="grade" required>
                        <label for="personal-login">Date:</label>
                        <input class="offers-date" id="offers-date" type="date" placeholder="Publish Date" name="publish_date" required>
                        <label for="personal-login">Remuneration:</label>
                        <input class="offers-remuneration" id="offers-remuneration" type="number" placeholder="Remuneration" name="remuneration" required>
                        <label for="personal-login">Number place:</label>
                        <input class="offers-number-places" id="offers-number-places" type="number" placeholder="Number of posts :" name="posts_number" required>
                        <label for="personal-login">Link:</label>
                        <input class="offers-link" id="offers-link" type="text" placeholder="Link" name="link" required>
                    </div>
                <?php endif; ?>

                <?php if ($management['type'] == "Companies") : ?>
                    <h1 id="companies-title">Company</h1>
                    <div class="companies-informations">
                        <label for="companies-title">Name:</label>
                        <input class="companies-title" id="companies-title" type="text" placeholder="Name" name="name" required>
                        <label for="companies-description">Description:</label>
                        <textarea class="companies-description" id="companies-description" placeholder="Description" name="description" form="management-form" required></textarea>
                        <label for="companies-email">Email:</label>
                        <input class="companies-email" id="companies-email" type="email" placeholder="Email" name="email" required>
                        <label for="companies-domain-activity">Domain Activity:</label>
                        <input class="companies-domain-activity" id="companies-domain-activity" type="text" placeholder="Domain Activity: e.g. WEB - Network - IT" name="domain_activity" required>
                        <label for="companies-cesi-accpet">Committed Intern:</label>
                        <input class="companies-cesi-accpet" id="companies-cesi-accpet" type="text" placeholder="Committed Intern" name="committed_intern">
                        <label for="companies-degree">Degree require:</label>
                        <input class="companies-degree" id="companies-degree" type="text" placeholder="Degree require" name="degree_require" required>
                        <div id="division-visible">
                            <label class="visible-label" for="visible">Visible ?</label>
                            <input class="companies-visible" type="checkbox" id="visible" name="visible" checked>
                        </div>
                        <label for="grade">Grade</label>
                        <div id="division-grade">
                            <input type="radio" name="grade" value="None" id="grade-no" class="grade">
                            <label for="grade-no" id="grade-no-label">None</label>
                            <input type="radio" name="grade" value="1" id="grade-1" class="grade">
                            <label for="grade-1">1</label>
                            <input type="radio" name="grade" value="2" id="grade-2" class="grade">
                            <label for="grade-2">2</label>
                            <input type="radio" name="grade" value="3" id="grade-3" class="grade">
                            <label for="grade-3">3</label>
                            <input type="radio" name="grade" value="4" id="grade-4" class="grade">
                            <label for="grade-4">4</label>
                            <input type="radio" name="grade" value="5" id="grade-5" class="grade">
                            <label for="grade-5">5</label>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (($management['type'] == "Companies") || ($management['type'] == "Offers")) : ?>
                    <h1 id="address-title">Address</h1>
                    <div class="address-informations">
                        <label for="address-street-num">Street Number:</label>
                        <input class="address-street-num" id="address-street-num" type="number" placeholder="Number" name="adrss_number">
                        <label for="address-street-name">Street Name:</label>
                        <input class="address-street-name" id="address-street-name" type="text" placeholder="Street Name" name="adrss_street_name">
                        <label for="pc">Postal Code:</label>
                        <input class="address-postal-code" id="pc" type="text" placeholder="Postal Code" name="adrss_postal_code" oninput="verifpc()">
                        <label for="city">City:</label>
                        <select class="address-city" id="city" name="adrss_city" form="management-form">

                        </select>

                    </div>
                <?php endif; ?>

                <div class="confirm-button">
                    <button type="submit" name="<?php echo $management['action']; ?>" value="<?php echo $management['type']; ?>"><?php echo $management['action']; ?></button>
                </div>
            </div>
            <div class="space-bottom"></div>
        </form>
    <?php endif; ?>
</div>
<?php if ($management['action'] == "Delete") : ?>
    <div class="delete-blur">
    </div>
    <form class="delete-popup">
        <div class="delete-popup-box">
            <h1 class="delete-title">Delete</h1>
            <p>Are you sure to delete this <?php echo $management['type'] ?> ?</p>
            <button type="submit" value="<?php echo $management['action'] ?>" class="delete-button">Sure</button>
        </div>
    </form>
<?php endif; ?>