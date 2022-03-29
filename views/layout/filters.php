

<div id="main-filters">
    <div class="filters">
        <form method="POST" id="filters-form">
            <div class="filters1">
                <?php if ($filter['type'] == "Offers" || $filter['type'] == "Companies"): ?>
                <label for="what">What:  </label><input type="text" name="what" id="what" placeholder="traineeship name, keyword">
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
                <input type="submit" id="Search" value="Search">
                <img id="Icon_filter" src="views\resources\icon_filtre.png" alt="Icon_filter" onclick="filtersDisplay()">
            </div>
            <div class="filters3 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="skill">Skills:</label><input type="text" name="skill" id="skill" placeholder="Skills required">
            <?php endif; ?>
            <?php if ($filter['type'] == "Pilot" || $filter['type'] == "Delegate" || $filter['type'] == "Student"): ?>
                <label for="school">Name of the center:</label><input type="text" name="school" id="school" placeholder="Name of the center">
            <?php endif; ?>
            </div>
            <div class="filters4 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="name-company">Name company:</label><input type="text" name="name-company" id="name-company" placeholder="Name of the company that posted the offer">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="name-company">Name company:</label><input type="text" name="name-company" id="name-company" placeholder="Name of the company that posted the offer">
            <?php endif; ?>
            <?php if ($filter['type'] == "Pilot" || $filter['type'] == "Student"): ?>
            <label for="class">Class code:</label><input class="filter5"type="text" name="class" id="class" placeholder="Class code">
            <?php endif; ?>
            </div>
            <div class="filters5 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="duration">Duration:</label><input type="number" name="duration" id="duration" placeholder="Duration only in integer">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="domain-activity">Domain activity:</label><input type="text" name="domain-activity" id="domain-activity" placeholder="Domain activity of the company">
            <?php endif; ?>
            </div>
            <div class="filters6 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="type-duration">Type duration:</label><input type="text" name="type-duration" id="type-duration" placeholder="Examples: days, weeks, months, years">
            <?php endif; ?>
            </div>
            <div class="filters7 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="remuneration">Remuneration:</label><input type="number" name="remuneration" id="remuneration" placeholder="Internship remuneration">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="student-rate-asc">Student rate asc:</label><input type="checkbox" name="student-rate" id="student-rate-asc">
            <?php endif; ?>
            </div>
            <div class="filters8 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                    <label for="date-published">Published date:</label><input type="date" name="date-published" id="date-published" placeholder="Date of publication">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="student-rate-desc">Student rate desc:</label><input type="checkbox" name="student-rate" id="student-rate-desc">
            <?php endif; ?>
            </div>
            <div class="filters9 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                <label for="numberplaces">Number places:</label><input type="number" name="numberplaces" id="numberplaces" placeholder="Number places left">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="pilot-confidence-asc">Confidence rate asc:</label><input type="checkbox" name="pilot-confidence" id="pilot-confidence-asc">
            <?php endif; ?>
            </div>
            <div class="filters10 filters-hidden">
            <?php if ($filter['type'] == "Offers"): ?>
                    <label for="skill">Skills:</label><input type="text" name="skill" id="skill" placeholder="Skills required">
            <?php endif; ?>
            <?php if ($filter['type'] == "Companies"): ?>
                <label for="pilot-confidence-desc">Confidence rate desc:</label><input type="checkbox" name="pilot-confidence" id="pilot-confidence-desc">
            <?php endif; ?>
            </div>
            <div class="space-left"></div>
            <div class="space-right"></div>
        </form>
    </div>
</div>