
<div id="main">
    <div class="menu-management">
        <form action="" method="POST">
            <input type="submit" name="typeManagement" value="Offers">
            <input type="submit" name="typeManagement" value="Companies">
            <input type="submit" name="typeManagement" value="Student">
            <input type="submit" name="typeManagement" value="Delegate">
            <?php if ($user['userType'] != "Pilot"): ?>
                <input type="submit" name="typeManagement" value="Pilot">
            <?php endif; ?>
        </form>
    </div>

    <div id="filters">
    <?php include("views/layout/filters.php"); ?>
    </div>
    

    <div class="management-interface">
        <?php if ($management['action'] == ""): ?>
            <?php if ($user['userAuthorization'][2] || $user['userAuthorization'][8] || $user['userAuthorization'][13] || $user['userAuthorization'][17] || $user['userAuthorization'][22]): ?>
                <form class="form-create" action="" method="POST">
                    <div class="polygon-form">
                        <input name="typeManagement" type="hidden" value="<?php echo $management['type']; ?>"></input>
                        <button type="submit" name="actionManagement" value="Create"></button>
                    </div>
                </form>
            <?php endif ?>


            <?php if ($management['type'] == "Offers"): ?>
                <div class="offer">
                    <div class="informations">
                        <h1 class="information-offer offer-title">Dévéloppement Informatique</h1>
                        <h2 class="information-offer offer-name-company">CESI</h2>
                        <h3 class="information-offer offer-locate">Villeurbanne (69001)</h3>
                        <h3 class="information-offer offer-degree">Bac+2</h3>
                        <h3 class="information-offer offer-date-publish">24/03/2022</h3>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][9]): ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][10]): ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>


            <?php if ($management['type'] == "Companies"): ?>
                <div class="company">
                    <div class="informations">
                        <h1 class="information-company offer-name-company">CESI</h1>
                        <h2 class="information-company offer-locate">Villeurbanne (69001)</h2>
                        <h2 class="information-company offer-domain-activity">Informatique</h2>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][3]): ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][5]): ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>



            <?php if ($management['type'] == "Student"): ?>
                <div class="student">
                    <div class="informations">
                        <h1 class="information-student offer-name">GUERREIRO</h1>
                        <h1 class="information-student offer-first-name">Jordan</h1>
                        <h2 class="information-student offer-center">Lyon</h2>
                        <h2 class="information-student offer-class">CPIA2 INFO</h2>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][23]): ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][24]): ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($management['type'] == "Delegate"): ?>
                <div class="delegate">
                    <div class="informations">
                        <h1 class="information-delegate offer-name">JAMBUT</h1>
                        <h1 class="information-delegate offer-first-name">Thomas (69001)</h1>
                        <h2 class="information-delegate offer-center">Lyon</h2>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][18]): ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][19]): ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>


            <?php if ($management['type'] == "Pilot"): ?>
                <div class="pilot">
                    <div class="informations">
                        <h1 class="information-pilot offer-name">SANTILARIO ELENA</h1>
                        <h1 class="information-pilot offer-first-name">Julio</h1>
                        <h2 class="information-pilot offer-center">Lyon</h2>
                        <h3 class="information-pilot offer-class">CPIA2 INFO-CPIA3 INFO</h3>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][14]): ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][15]): ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>


    <?php if ($management['action'] == "Create" || $management['action'] == "Update"): ?>
        <form method="POST" id="management-form">
            <div class="management-create-update">
                <?php if ($management['type'] == "Pilot" || $management['type'] == "Delegate" || $management['type'] == "Student"): ?>
                    <h1 id="personal-title">Personal information</h1>
                    <div class="personal-informations">
                        <label for="personal-login">Login:</label>
                        <input class="personal-login" id="personal-login" type="email" placeholder="Login" name="login" required>
                        <label for="personal-password">Password:</label>
                        <input class="personal-password" id="personal-password" type="password" placeholder="Password" name="password" required>
                        <label for="personal-name">Name:</label>
                        <input class="personal-name" id="personal-name" type="text" placeholder="Name" name="name" required>
                        <label for="personal-first-name">First Name:</label>
                        <input class="personal-first-name" id="personal-first-name" type="text" placeholder="First Name" name="first_name" required>
                        <label for="personal-email">Email:</label>
                        <input class="personal-email" id="personal-email" type="email" placeholder="Email" name="email" required>
                    </div>
                <?php endif; ?>
                <?php if (($management['type'] == "Delegate") && ($user['userAuthorization'][20])): ?>
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

                <?php if ($management['type'] == "Offers"): ?>
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
                        <label for="personal-login">Duration Type:</label>
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

                <?php if ($management['type'] == "Companies"): ?>
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
                            <input class="companies-visible"  type="checkbox" id="visible" name="visible" checked>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (($management['type'] == "Companies") || ($management['type'] == "Offers")): ?>
                    <h1 id="address-title">Address</h1>
                    <div class="address-informations">
                        <div class="address-street">
                            <label for="address-street-num">Number:</label>
                            <input class="address-street-num" id="address-street-num" type="number" placeholder="Number" name="adrss_number">
                            <label for="address-street-name">Street Name:</label>
                            <input class="address-street-name" id="address-street-name" type="text" placeholder="Street Name" name="adrss_street_name">
                        </div>
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
<?php if ($management['action'] == "Delete"): ?>
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