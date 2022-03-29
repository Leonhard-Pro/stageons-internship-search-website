 <!-- https://www.chartjs.org/docs/latest/ -->

 <!DOCTYPE html>
 <html lang="en">

 <body>
     <div id="doughnut">
         <canvas id="graph" width="400%" height="100%"></canvas>
     </div>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

     <?php

        // Here you can add your data in php

        $value1 = 6;
        $value2 = 8;
        $value3 = 3;
        $value4 = 4;

        ?>

     <script>
         // Here you can convert your data in js

         var value1 = <?php echo json_encode($value1); ?>;
         var value2 = <?php echo json_encode($value2); ?>;
         var value3 = <?php echo json_encode($value3); ?>;
         var value4 = <?php echo json_encode($value4); ?>;

         // Here you have the principale code for the graph

         // https://www.chartjs.org/docs/latest/

         const graph = document.getElementById('graph').getContext('2d');

         let myChart = new Chart(graph, {
             type: "doughnut",
             data: {
                 labels: ["Student with an internship", "Student without an internship", "Work-study student", "Project student"], // The different titles
                 datasets: [{
                     label: "Student",
                     data: [value1, value2, value3, value4], // Your value
                     backgroundColor: ["red", "orange", "salmon", "blue"], // The color of the graph
                     hoverBorderWidh: 3,
                 }, ],
             },
             option: {
                 title: {
                     display: true,
                     text: "Student",
                     fontSize: 24,
                 },
                 legent: {
                     display: false,
                 },
                 devicePixelRatio: 0.1,
                 layout: {
                     padding: {
                         top: 20,
                     }
                 }
             },
         });
     </script>

 </body>