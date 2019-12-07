$(document).ready(function () {
    var baseUrl = "http://admin.sriwijaya.io/api/kunjungan"
    var kunjungan = []
    var hari = []

    getData(baseUrl, $('#range').val())

    $('#range').change(function(){
        getData(baseUrl, $(this).val())
    })
})
function getData(baseUrl, range) {
    baseUrl = baseUrl+'?range='+range
    $.ajax({
        url: baseUrl,
        data: {
            signature: "a7s6dtgyu6e3tshaijsa8y9dsa"
        },
        type: "GET",
        success: function (resp) {
            var data = []
            var label = []
            resp = resp.reverse()  
            resp.forEach(el => {
                data.push(el.hitungan)
                label.push(el.tgl)
            });
            initChart(data, label)
        }
    });
}
function initChart(data, label) {
    var ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Jumlah kunjungan',
                data: data,
                backgroundColor: [
                    'rgba(119, 44, 148, 0.2)',
                ],
                borderColor: [
                    'rgba(119, 44, 148, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    // return myChart
}