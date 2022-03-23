<?php
    $params = explode('/', $_GET['p']);
    if($params[0] === "offers")
    {
        echo('
            <div id="Filtres">
                <div id="Filtre_1" class="Filtre">
                    <input type="text" id="What" placeholder="What :">
                    <input type="text" id="Where" placeholder="Where :">
                    <input type="button" id="Search" value="Search">
                    <div id=Icon_filtre onclick="Show_all()"></div>
                    <div id=Icon_barre onclick="Show_all()"></div>
                </div>
                <div id="Filtre_2" class="Filtre">
                    <input type="text" id="Skills" placeholder="Skills :">
                    <input type="text" id="Date" placeholder="Date of beginning :">
                    <input type="text" id="Companies" placeholder="Companies :">
                    <input type="text" id="Duration" placeholder="Duration :">
                    <br><br>
                </div>
                <div id="Filtre_3" class="Filtre">
                    <input type="text" id="Class_concerned" placeholder="Concerned classes :">
                    <input type="text" id="Remuneration" placeholder="Remuneration :">
                    <input type="text" id="Number_places" placeholder="Number of places :">

                </div>
            </div>
            ');
    }
    elseif ($params[0] === "companies")
    {
        echo('
            <div id="Filtres">
                <div id="Filtre_1">
                    <input type="text" id="What" placeholder="What :">
                    <input type="text" id="Where" placeholder="Where :">
                    <input type="button" id="Search" value="Search">
                    <div id=Icon_filtre onclick="Show_all()"></div>
                    <div id=Icon_barre onclick="Show_all()"></div>
                </div>
                <div id="Filtre_2">
                    <input type="text" id="Domain_Activity" placeholder="Domain Activity :">
                    <input type="text" id="Number_of_CESI_trainees" placeholder="Number_of_CESI_trainees :">
                    <input type="text" id="Confidence" placeholder="Confidence :">
                    <input type="text" id="Evaluation_of_trainees" placeholder="Evaluation_of_trainees :">
                </div>
            </div>
        ');
    }
?>