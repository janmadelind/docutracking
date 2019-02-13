<div class="col-lg-6">
        <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-12">
        <div id="MCollege" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-6">
        <div id="MCOS" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-lg-6">
        <div id="QCOS" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-6">
        <div id="MCAFA" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-lg-6">
        <div id="QCAFA" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-6">
        <div id="MCOE" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-lg-6">
        <div id="QCOE" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-6">
        <div id="MCLA" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-lg-6">
        <div id="QCLA" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-6">
        <div id="MCIE" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-lg-6">
        <div id="QCIE" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-12">
        <div id="MCIT" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-12">
        <div id="QCIT" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-6">
        <div id="allmode" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-6">
        <div id="svpM" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-lg-6">
        <div id="svpQ" style="height: 370px; width: 100%;"></div>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-lg-6">
        <div id="npM" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-lg-6">
        <div id="npQ" style="height: 370px; width: 100%;"></div>
    </div>
</div> 

$arrlength = count($dataPoints1);
                    for($x = 0; $x < $arrlength; $x++) {
    echo $dataPoints1[$x];
}

$(function () {  
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
});

function getChartJs(type) {
    var config = null;

     if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }, {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        backgroundColor: 'rgba(233, 30, 99, 0.8)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}


window.onload = function () {    
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly PR Report"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "All Submitted PR",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly PR Report"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "All Submitted PR",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });
        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Per department"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "All Submitted PR",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        var chart4 = new CanvasJS.Chart("chartContainer4", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Per college"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "All Submitted PR",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
            }]
        });
        // montly report of all colleges
        var chart5 = new CanvasJS.Chart("MCollege", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly PR of COLLEGES(6)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "COS",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($moncol1, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "CLA",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($moncol2, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "CIE",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($moncol3, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "CIE",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($moncol4, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "CIE",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($moncol5, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "CIE",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($moncol6, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // monthly report of all department in COS
        var COSdept = new CanvasJS.Chart("MCOS", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly PR of COS DEPARTMENTS(3)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Math",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept1, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Physics",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept2, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Chemistry",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept3, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // monthly report of all department in CAFA
        var CAFAdept = new CanvasJS.Chart("MCAFA", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly PR of CAFA DEPARTMENTS(3)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Fine Arts",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept24, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Graphics",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept25, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Architecture",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept26, JSON_NUMERIC_CHECK); ?>
            }]
        });
        // monthly report of all department in CIE
        var CIEdept = new CanvasJS.Chart("MCIE", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly PR of CIE DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Technical Arts",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept20, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Home Economics",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept21, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Prof Industrial Educ",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept22, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Student Teaching",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept24, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // monthly report of all department in COE
        var COEdept = new CanvasJS.Chart("MCOE", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly PR of COE DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Mechanical Eng.",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept8, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Electrical Eng",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept9, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Civil Eng",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept10, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Electronics Eng",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept11, JSON_NUMERIC_CHECK); ?>
            }]
        });
        // monthly report of all department in CLA
        var CLAdept = new CanvasJS.Chart("MCLA", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly PR of CLA DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Social Science",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept4, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "English",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept5, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Filipino",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept6, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Physical Ed",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept7, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // monthly report of all department in CIT
        var CITdept = new CanvasJS.Chart("MCIT", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly PR of CIT DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Civil Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept12, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Electrical Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept13, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Electronics Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept14, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Food & Apparel Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept15, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Graphic Arts & Printing Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept16, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Mechanical Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept17, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Power Plant Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept18, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Basic Industrial Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($mondept19, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // quarterly report of all department in CLA
        var CLAdeptQ = new CanvasJS.Chart("QCLA", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly PR of CLA DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Social Science",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept4, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "English",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept5, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Filipino",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept6, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Physical Ed",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept7, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // quarterly report of all department in CIT
        var CITdeptQ = new CanvasJS.Chart("QCIT", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly PR of CIT DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Civil Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept12, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Electrical Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept13, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Electronics Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept14, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Food & Apparel Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept15, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Graphic Arts & Printing Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept16, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Mechanical Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept17, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Power Plant Eng Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept18, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Basic Industrial Tech",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept19, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // quarterly report of all department in COE
        var COEdeptQ = new CanvasJS.Chart("QCOE", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly PR of COE DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Mechanical Eng.",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept8, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Electrical Eng",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept9, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Civil Eng",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept10, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Electronics Eng",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept11, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // quarterly report of all department in CIE
        var CIEdeptQ = new CanvasJS.Chart("QCIE", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly PR of CIE DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Technical Arts",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept20, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Home Economics",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept21, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Prof Industrial Educ",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept22, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Student Teaching",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept24, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // quarterly report of all department in CAFA
        var CAFAdeptQ = new CanvasJS.Chart("QCAFA", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly PR of CAFA DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Fine Arts",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept24, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Graphics",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept25, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Architecture",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept26, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        // quarterly report of all department in COS
        var COSdeptQ = new CanvasJS.Chart("QCOS", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly PR of COS DEPARTMENTS(4)"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Math",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept1, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Physics",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept2, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Chemistry",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($qdept3, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        var allMode = new CanvasJS.Chart("allmode", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "FOR NP AND SVP"
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Small Value Procurement",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($svpcount, JSON_NUMERIC_CHECK); ?>
            },{
                type: "column",
                name: "Negotiated Procurement",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($npcount, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        var svpmon = new CanvasJS.Chart("svpM", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly Small Value procurement PR Report "
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "All Submitted PR",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($svpmon, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        var svpQ = new CanvasJS.Chart("svpQ", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly Small Value procurement PR Report "
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "All Submitted PR",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($svpQ, JSON_NUMERIC_CHECK); ?>
            }]
        });
        var npmon = new CanvasJS.Chart("npM", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly Negotiated procurement PR Report "
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "All Submitted PR",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($npmon, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        var npQ = new CanvasJS.Chart("npQ", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Quarterly Negotiated procurement PR Report "
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "All Submitted PR",
                indexLabel: "{y}",
                yValueFormatString: "#",
                showInLegend: true,
                dataPoints: <?php echo json_encode($npQ, JSON_NUMERIC_CHECK); ?>
            }]
        }); 
        chart.render();  
        chart2.render();     
        chart3.render();     
        chart4.render();     
        chart5.render();     
        COSdept.render();    
        CAFAdept.render();   
        CIEdept.render();    
        COEdept.render();    
        CLAdept.render();    
        CITdept.render();    
        COSdeptQ.render();   
        CAFAdeptQ.render();  
        CIEdeptQ.render();   
        COEdeptQ.render();   
        CLAdeptQ.render();   
        CITdeptQ.render();   
        svpmon.render();    
        svpQ.render();   
        npmon.render();  
        npQ.render();    
        allMode.render();
        var canvas = $("#npQ .canvasjs-chart-canvas").get(0);
        var dataURL = canvas.toDataURL();
        //console.log(dataURL);

        $("#exportButton").click(function(){
            var pdf = new jsPDF();
            pdf.addImage(dataURL, 'JPEG', 0, 0);
            pdf.save("download.pdf");
        });  
        function toggleDataSeries(e){
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else{
                e.dataSeries.visible = true;
            }
            chart.render();
        }    
    }