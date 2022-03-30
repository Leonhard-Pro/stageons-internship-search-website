<?php if ($page['pageName'] != "login"):?>
<header id="navbar">
  <nav class="navbar-container container">
    <div class="navbar-logo"><img class="navbar-logo-cesi" src="views/resources/logo_cesi_with_text.svg" alt="Icon_cesi"></div>
    <label id="navbar-title">Stageons</label>
    <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu" aria-expanded="false">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <div id="navbar-menu" aria-labelledby="navbar-toggle">
      <ul class="navbar-links">
        <li class="navbar-item"><a class="navbar-link" href="offers"><img class="navbar-icon" src="views/resources/icon_offers.png" alt="Icon_offer">Offers</a></li>
        <li class="navbar-item"><a class="navbar-link" href="companies"><img class="navbar-icon" src="views/resources/icon_companies.png" alt="Icon_companies">Companies</a></li>
        <?php if ($user['userType'] != "Student"): ?>
        <li class="navbar-item"><a class="navbar-link" href="management"><img class="navbar-icon" src="views/resources/icon_management.png" alt="Icon_management">Management</a></li>
        <?php endif; ?>
        <li class="navbar-item"><a class="navbar-link" href="advancement"><img class="navbar-icon" src="views/resources/icon_advancement.png" alt="Icon_advancement">Advancement</a></li>
        <li class="navbar-item"><a class="navbar-link" href="statistic"><img class="navbar-icon" src="views/resources/icon_statistic.png" alt="Icon_advancement">Statistic</a></li>
        <li class="navbar-item"><a class="navbar-link" href="notifications"><img class="navbar-icon" src="views/resources/icon_notifications.png" alt="Icon_notification">Notification</a></li>
        <li class="navbar-item"><a class="navbar-link" href="account"><img class="navbar-icon" src="views/resources/icon_account.png" alt="Icon_account"><?php if($user['userType'] != "Administrator") { echo $user['userObject']->getFirstName();}else{ echo "Account";}  ?></a></li>
      </ul>
    </div>
  </nav>
</header>
<?php endif; ?>