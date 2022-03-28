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

    <?php include("views/layout/filter.php"); ?>

    <div class="management-interface">
        <?php if ($management['action'] == "") : ?>
            <?php if ($user['userAuthorization'][2] || $user['userAuthorization'][8] || $user['userAuthorization'][13] || $user['userAuthorization'][17] || $user['userAuthorization'][22]) : ?>
                <form class="form-create" action="" method="POST">
                    <div class="polygon-form">
                        <input name="typeManagement" type="hidden" value="<?php echo $management['type']; ?>"></input>
                        <button type="submit" name="actionManagement" value="Create"></button>
                    </div>
                </form>
            <?php endif ?>


            <?php if ($management['type'] == "Offers") : ?>
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
                            <?php if ($user['userAuthorization'][9]) : ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][10]) : ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>


            <?php if ($management['type'] == "Companies") : ?>
                <div class="company">
                    <div class="informations">
                        <h1 class="information-company offer-name-company">CESI</h1>
                        <h2 class="information-company offer-locate">Villeurbanne (69001)</h2>
                        <h2 class="information-company offer-domain-activity">Informatique</h2>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][3]) : ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][5]) : ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>



            <?php if ($management['type'] == "Student") : ?>
                <div class="student">
                    <div class="informations">
                        <h1 class="information-student offer-name">GUERREIRO</h1>
                        <h1 class="information-student offer-first-name">Jordan</h1>
                        <h2 class="information-student offer-center">Lyon</h2>
                        <h2 class="information-student offer-class">CPIA2 INFO</h2>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][23]) : ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][24]) : ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($management['type'] == "Delegate") : ?>
                <div class="delegate">
                    <div class="informations">
                        <h1 class="information-delegate offer-name">JAMBUT</h1>
                        <h1 class="information-delegate offer-first-name">Thomas (69001)</h1>
                        <h2 class="information-delegate offer-center">Lyon</h2>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][18]) : ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][19]) : ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>


            <?php if ($management['type'] == "Pilot") : ?>
                <div class="pilot">
                    <div class="informations">
                        <h1 class="information-pilot offer-name">SANTILARIO ELENA</h1>
                        <h1 class="information-pilot offer-first-name">Julio</h1>
                        <h2 class="information-pilot offer-center">Lyon</h2>
                        <h3 class="information-pilot offer-class">CPIA2 INFO-CPIA3 INFO</h3>
                    </div>
                    <div class="management-tools">
                        <form class="form-update-delete" method="POST">
                            <?php if ($user['userAuthorization'][14]) : ?>
                                <button type="submit" name="actionManagement" value="Update"><img class="icon-update" src="views/resources/icon_update.png"></button>
                            <?php endif; ?>
                            <?php if ($user['userAuthorization'][15]) : ?>
                                <button type="submit" name="actionManagement" value="Delete"><img class="icon-delete" src="views/resources/icon_delete.png"></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

<<<<<<< HEAD
=======
            <?php if ($management['type'] == "Offers"): ?>
            <h1 id="offers-title">Offer</h1>
            <div class="offers-informations">
                <label for="offer_title">blbllb</label>
                <input class="offers-title" type="text" placeholder="Title :" name="offer_title">
                <textarea class="offers-description" placeholder="Description :"></textarea>
                <input class="offers-skill" type="text" placeholder="Skill(s) :">
                <input class="offers-duration" type="number" placeholder="Duration :">
                <input class="offers-duration-type" type="text" placeholder="Time unit :">
                <input class="offers-degree" type="text" placeholder="Degree require :">
                <input class="offers-date" type="date" placeholder="Date publish :">
                <input class="offers-remuneration" type="number" placeholder="Remuneration :">
                <input class="offers-number-places" type="number" placeholder="Number place :">
                <input class="offers-link" type="text" placeholder="Link :">
            </div>
            <?php endif; ?>
>>>>>>> 2fcaf7167b8ab8206a6a5a82432ee17322400690

    <?php if ($management['action'] == "Create" || $management['action'] == "Update") : ?>
        <form method="POST">
            <div class="management-create-update">
                <?php if ($management['type'] == "Pilot" || $management['type'] == "Delegate" || $management['type'] == "Student") : ?>
                    <h1 id="personal-title">Personal information</h1>
                    <div class="personal-informations">
                        <input class="personal-login" type="email" placeholder="Login :">
                        <input class="personal-password" type="password" placeholder="Password :">
                        <input class="personal-name" type="text" placeholder="Name :">
                        <input class="personal-first-name" type="text" placeholder="First Name : :">
                        <input class="personal-email" type="email" placeholder="Email :">
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

<<<<<<< HEAD
                <?php if ($management['type'] == "Offers") : ?>
                    <h1 id="offers-title">Offer</h1>
                    <div class="offers-informations">
                        <input class="offers-title" type="text" placeholder="Title :">
                        <textarea class="offers-description" placeholder="Description :"></textarea>
                        <input class="offers-skill" type="text" placeholder="Skill(s) :">
                        <input class="offers-duration" type="number" placeholder="Duration :">
                        <input class="offers-duration-type" type="text" placeholder="Duration Type :">
                        <input class="offers-degree" type="text" placeholder="Degree require :">
                        <input class="offers-date" type="date" placeholder="Date publish :">
                        <input class="offers-remuneration" type="number" placeholder="Remuneration :">
                        <input class="offers-number-places" type="number" placeholder="Number place :">
                        <input class="offers-link" type="text" placeholder="Link :">
                    </div>
                <?php endif; ?>
=======
            <?php if (($management['type'] == "Companies") || ($management['type'] == "Offers")): ?>
            <h1 id="address-title">Address</h1>
            <div class="address-informations">
                <div class="address-street">
                    <input class="address-street-num" type="number" placeholder="Number :">
                    <input class="address-street-name" type="text" placeholder="Street name:">
                </div>
                <input class="address-postal-code" type="text" placeholder="Postal Code :">
                <select class="address-city">
>>>>>>> 2fcaf7167b8ab8206a6a5a82432ee17322400690

                <?php if ($management['type'] == "Companies") : ?>
                    <h1 id="companies-title">Company</h1>
                    <div class="companies-informations">
                        <input class="companies-title" type="text" placeholder="Title :">
                        <textarea class="companies-description" placeholder="Description :"></textarea>
                        <input class="companies-email" type="email" placeholder="Email :">
                        <input class="companies-domain-activity" type="text" placeholder="Domain Activity :">
                        <input class="companies-cesi-accpet" type="text" placeholder="Cesi Trainee Accept :">
                        <input class="companies-degree" type="text" placeholder="Degree require :">
                        <input class="companies-visible" type="checkbox" id="visible"><label class="visible-label" for="visible">Visible ?</label>
                    </div>
                <?php endif; ?>

                <?php if (($management['type'] == "Companies") || ($management['type'] == "Offers")) : ?>
                    <h1 id="address-title">Address</h1>
                    <div class="address-informations">
                        <div class="address-street">
                            <input class="address-street-num" type="number" placeholder="Num :">
                            <input class="address-street-name" type="text" placeholder="Name Street :">
                        </div>
                        <input class="address-postal-code" type="text" placeholder="Postal Code :">
                        <select class="address-city">

                        </select>

                    </div>
                <?php endif; ?>

                <div class="confirm-button">
                    <button type="submit" name="<?php echo $management['action']; ?>" value="<?php echo $management['action']; ?>"><?php echo $management['action']; ?></button>
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