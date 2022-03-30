<div id="main">
    <div class="menu-stat">
        <form action="" method="POST">
            <input type="submit" name="typeStat" value="Offers">
            <input type="submit" name="typeStat" value="Companies">
            <input type="submit" name="typeStat" value="Student">
        </form>
    </div>
</div>


<!-- https://www.chartjs.org/docs/latest/ -->

<body>
    <div id="doughnut">
        <canvas id="graph" width="400%" height="100%"></canvas>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <?php
    // Here you can add your data in php
    $valuesOffers = array(50, 100, 60);
    $valuesCompanies = array(60, 78, 92);
    $valuesStudents = array(125, 98, 100, 200);
    ?>

    <script>
        // Here you can convert your data in js
        var colours = ["green", "blue", "orange", "red", "yellow", "purple"];
        var labels = [];
        var values = [];

        // Here you have the principale code for the graph
        // https://www.chartjs.org/docs/latest/

        if( "<?php echo $statistic['type']; ?>" == "Offers")
        {
            labels = ["Offers no one applied to", "Availlable offers", "Finished offers"];
            values = <?php echo json_encode($valuesOffers) ?>;

            CreateGraph("Offers",
                        labels,
                        colours,
                        values);
        }
        else if ("<?php echo $statistic['type']; ?>" == "Companies")
        {
            labels = ["Companies without any CESI intern", "Companies with one CESI intern", "Companies with two or more CESI interns"];
            values = <?php echo json_encode($valuesCompanies) ?>;

            CreateGraph("Companies",
                        labels,
                        colours,
                        values);
        }
        else
        {
            labels = ["Student with an internship", "Student without an internship", "Work-study student", "Project student"];
            values = <?php echo json_encode($valuesStudents) ?>;

            CreateGraph("Students",
                        labels,
                        colours,
                        values);
        }
    </script>

</body>