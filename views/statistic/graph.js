
// https://www.chartjs.org/docs/latest/

const graph = document.getElementById('graph').getContext('2d');

let myChart = new Chart(graph, {
    type: "doughnut",
    data: {
        labels: ["Student with an internship", "Student without an internship", "Work-study student", "Project student"],
        datasets: [
            {
                label: "Student",
                data: [6, 8, 3, 4],
                backgroundColor: ["red", "orange", "salmon", "blue"],
                hoverBorderWidh: 3,
            },
        ],
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