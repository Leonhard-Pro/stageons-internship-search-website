function CreateGraph(titleGraph, listLabels, listColors, listValues){

    const graph = document.getElementById('graph').getContext('2d');
    let myChart = new Chart(graph, {
        type: "doughnut",
        data: {
            labels: listLabels, // The different titles
            datasets: [{
                data: listValues, // Your value
                backgroundColor: listColors, // The color of the graph
                hoverBorderWidth: 3,
            }, ],
        },
        options: {
            legend: {
                display: false,
            },
            plugins:{
                title: {
                    display: true,
                    text: titleGraph,
                    font: {
                        size: 28
                    }
                } 
            },
            layout: {
                padding: {
                    top: 20
                }
            }
        }
    });
}