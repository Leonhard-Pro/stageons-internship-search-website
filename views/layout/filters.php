

<div id="main-filters">
    <div class="filters">
        <form method="POST" id="filters-form">
            <div class="filters1">
                <?php if ($filter['type'] == "Offers"): ?>
                <label for="what">What:  </label><input type="text" name="what" id="what" placeholder="internship name, keywords">
                <?php endif; ?>
                <?php if ($filter['type'] == "Companies"): ?>
                    <label for="name-company">Company's name:</label><input type="text" name="name-company" id="name-company" placeholder="Name of the company that posted the offer">
                <?php endif; ?>
                <?php if ($filter['type'] == "Pilot" || $filter['type'] == "Delegate" || $filter['type'] == "Student"): ?>
                <label for="name">Name:</label><input type="text" name="name" id="name" placeholder="Name person">
                <?php endif; ?>
            </div>
            <div class="filters2">
                <?php if ($filter['type'] == "Offers" || $filter['type'] == "Companies"): ?>
                <label for="where">Where:</label><input type="text" name="where" id="where" placeholder="city name">
                <?php endif; ?>
                <?php if ($filter['type'] == "Pilot" || $filter['type'] == "Delegate" || $filter['type'] == "Student"): ?>
                <label for="first-name">First name:</label><input type="text" name="first-name" id="first-name" placeholder="First name person">
                <?php endif; ?>
            </div>
            <div class="buttonSearch">
                <input type="submit" name="Search" id="Search" value="Filter">
                <img id="Icon_filter" src="views\resources\icon_filtre.png" alt="Icon_filter" onclick="filtersDisplay()">
            </div>
            <div class="filters3 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="skill">Skills:</label><input type="text" name="skill" id="skill" placeholder="Required skills">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="domain-activity">Domain activity:</label><input type="text" name="domain-activity" id="domain-activity" placeholder="Domain activity of the company">
            <?php endif; ?>
            <?php if ($filter['type'] == "Pilot" || $filter['type'] == "Delegate" || $filter['type'] == "Student"): ?>
                <label for="school">Name of the center:</label><input type="text" name="school" id="school" placeholder="Name of the center">
            <?php endif; ?>
            </div>
            <div class="filters4 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="name-company">Company's name:</label><input type="text" name="name-company" id="name-company" placeholder="Name of the company that posted the offer">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="student-rate-asc">Student rate asc:</label><input type="checkbox" name="student-rate" id="student-rate-asc">
            <?php endif; ?>
            <?php if ($filter['type'] == "Pilot" || $filter['type'] == "Student"): ?>
            <label for="class">Class code:</label><input class="filter5"type="text" name="class" id="class" placeholder="Class code">
            <?php endif; ?>
            </div>
            <div class="filters5 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="duration">Duration:</label><input type="number" name="duration" id="duration" placeholder="Duration (only in integer)">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="student-rate-desc">Student rate desc:</label><input type="checkbox" name="student-rate" id="student-rate-desc">
            <?php endif; ?>
            </div>
            <div class="filters6 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="type-duration">Duration type:</label><input type="text" name="type-duration" id="type-duration" placeholder="Examples: days, weeks, months, years">
            <?php endif; ?>
            </div>
            <div class="filters7 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="remuneration">Remuneration:</label><input type="number" name="remuneration" id="remuneration" placeholder="Internship remuneration">
            <?php endif; ?>
            </div>
            <div class="filters8 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                    <label for="date-published">Published date:</label><input type="date" name="date-published" id="date-published" placeholder="Date of publication">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="pilot-confidence-asc">Confidence rate asc:</label><input type="checkbox" name="pilot-confidence" id="pilot-confidence-asc">
            <?php endif; ?>
            </div>
            <div class="filters9 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="numberplaces">Places:</label><input type="number" name="numberplaces" id="numberplaces" placeholder="Number of places left">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="pilot-confidence-desc">Confidence rate desc:</label><input type="checkbox" name="pilot-confidence" id="pilot-confidence-desc">
            <?php endif; ?>
            </div>
            <div class="filters10 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="degree">Required degree:</label><input type="number" name="degree" id="degree" placeholder="Required degree">
            <?php endif; ?>
            </div>
            <?php if($page['pageName'] == "management"): ?>
                <input id="type" name="type" type="hidden" value="<?php echo $filter['type']; ?>">
            <?php endif; ?>
            <div class="space-left"></div>
            <div class="space-right"></div>
        </form>
    </div>
</div>