$(document).ready(function(){
    "use strict";
    // Nombre de client par type
    var donut_chart = Morris.Donut({
    element: 'morris-donut-chart-quantite-stock',
    data: solde_annuel_dun_client,
    resize: true,
    colors:['#009efb','#dc46f0','#55ce63','#8d89f5' ,'#FF8300', '#2f3d4a']
    });
})