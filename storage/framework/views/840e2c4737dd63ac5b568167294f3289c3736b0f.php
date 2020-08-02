<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Statistic</title>
        <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-firestore.js"></script>
		<link rel="stylesheet" href="<?php echo asset('assist/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('assist/css/all.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo asset('assist/css/home.css'); ?>"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
		<!--[if lt IE 9]>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            #chart text {
                fill: black;
                font: 20px sans-serif;
                text-anchor: end
            }
            .axis text {
                font: 50px sans-serif;
            }
            .axis path, .axis line {
                fill: none;
                /*stroke: #fff;*/
                shape-rendering: crispEdges;
            }
            body {
                /*background: #1a1a1a;*/
                color: blue;
                padding: 10px;
            }
            path {
                stroke: white;
                stroke-width: 1;
                fill: none;
            }
        </style>
    </head>
    <body>
        <!--Start Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="dashhomesboard"><img src="<?php echo asset('assist/images/Logo%201.png'); ?>" alt="Home" title="home"/></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="signouts" href="" onclick="signout();return false">Signout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--End Navbar-->
        
        <div id="chart" style="height:600px;width:80%"></div>

        <script src="<?php echo asset('assist/js/jquery-3.4.1.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/signout.js'); ?>"></script>
        <script src="https://d3js.org/d3.v2.min.js"></script>
        
        <script>
            var firebaseConfig = {
                apiKey: "AIzaSyAEluiTZW6QRLhP7tYa3KTR0NC54w5nYv0",
                authDomain: "pro-db-1.firebaseapp.com",
                databaseURL: "https://pro-db-1.firebaseio.com",
                projectId: "pro-db-1",
                storageBucket: "pro-db-1.appspot.com",
                messagingSenderId: "350598462471",
                appId: "1:350598462471:web:6dbaf59a3510475b937ea2",
                measurementId: "G-3V9V7MTPES"
            };

            firebase.initializeApp(firebaseConfig);
        </script>
        
        <script type="text/javascript">
            var salesData;
            var chartInnerDiv = '<div class="innerCont" style="top: 35px; left: 65px; height: 95%; Width:100%; position: relative; overflow: hidden;"/>';
            var truncLengh = 30;

            $(document).ready(function () {
                Plot();
            });

            function Plot() {
                TransformChartData(chartData, chartOptions, 0);
                BuildPie("chart", chartData, chartOptions, 0)
            }

            function BuildPie(id, chartData, options, level) {
                var xVarName;
                var divisionRatio = 2.5;
                var legendoffset = (level == 0) ? 0 : -40;

                d3.selectAll("#" + id + " .innerCont").remove();
                $("#" + id).append(chartInnerDiv);
                chart = d3.select("#" + id + " .innerCont");

                var yVarName = options[0].yaxis;
                width = $(chart[0]).outerWidth(),
                height = $(chart[0]).outerHeight(),
                radius = Math.min(width, height) / divisionRatio;

                if (level == 1) {
                    xVarName = options[0].xaxisl1;
                }
                else {
                    xVarName = options[0].xaxis;
                }

                var rcolor = d3.scale.ordinal().range(runningColors);

                arc = d3.svg.arc()
                        .outerRadius(radius)
                        .innerRadius(radius - 200);

                var arcOver = d3.svg.arc().outerRadius(radius + 20).innerRadius(radius - 180);

                chart = chart
                        .append("svg")  //append svg element inside #chart
                        .attr("width", width)    //set width
                        .attr("height", height)  //set height
                        .append("g")
                        .attr("transform", "translate(" + (width / divisionRatio) + "," + ((height / divisionRatio) + 30) + ")");

                var pie = d3.layout.pie()
                            .sort(null)
                            .value(function (d) {
                                return d.Total;
                            });

                var g = chart.selectAll(".arc")
                            .data(pie(runningData))
                            .enter().append("g")
                            .attr("class", "arc");

                var count = 0;

                var path = g.append("path")
                            .attr("d", arc)
                            .attr("id", function (d) { return "arc-" + (count++); })
                            .style("opacity", function (d) {
                                return d.data["op"];
                            });

                path.on("mouseenter", function (d) {
                    d3.select(this)
                        .attr("stroke", "white")
                        .transition()
                        .duration(200)
                        .attr("d", arcOver)
                        .attr("stroke-width", 1);
                })
                 .on("mouseleave", function (d) {
                     d3.select(this).transition()
                         .duration(200)
                         .attr("d", arc)
                         .attr("stroke", "none");
                 })
                 .on("click", function (d) {
                     if (this._listenToEvents) {
                         // Reset inmediatelly
                         d3.select(this).attr("transform", "translate(0,0)")
                         // Change level on click if no transition has started
                         path.each(function () {
                             this._listenToEvents = false;
                         });
                     }
                     d3.selectAll("#" + id + " svg").remove();
                     if (level == 1) {
                         TransformChartData(chartData, options, 0, d.data[xVarName]);
                         BuildPie(id, chartData, options, 0);
                     }
                     else {
                         var nonSortedChart = chartData.sort(function (a, b) {
                             return parseFloat(b[options[0].yaxis]) - parseFloat(a[options[0].yaxis]);
                         });
                         TransformChartData(nonSortedChart, options, 1, d.data[xVarName]);
                         BuildPie(id, nonSortedChart, options, 1);
                     }

                 });

                path.append("svg:title")
                .text(function (d) {
                    return d.data["title"] + " (" + d.data[yVarName] + ")";
                });

                path.style("fill", function (d) {
                    return rcolor(d.data[xVarName]);
                })
                 .transition().duration(1000).attrTween("d", tweenIn).each("end", function () {
                     this._listenToEvents = true;
                 });


                g.append("text")
                 .attr("transform", function (d) { return "translate(" + arc.centroid(d) + ")"; })
                 .attr("dy", ".35em")
                 .style("text-anchor", "middle")
                 .style("opacity", 1)
                 .text(function (d) {
                     return d.data[yVarName];
                 });

                count = 0;
                var legend = chart.selectAll(".legend")
                    .data(runningData).enter()
                    .append("g").attr("class", "legend")
                    .attr("legend-id", function (d) {
                        return count++;
                    })
                    .attr("transform", function (d, i) {
                        return "translate(15," + (parseInt("-" + (runningData.length * 10)) + i * 28 + legendoffset) + ")";
                    })
                    .style("cursor", "pointer")
                    .on("click", function () {
                        var oarc = d3.select("#" + id + " #arc-" + $(this).attr("legend-id"));
                        oarc.style("opacity", 0.3)
                        .attr("stroke", "white")
                        .transition()
                        .duration(200)
                        .attr("d", arcOver)
                        .attr("stroke-width", 1);
                        setTimeout(function () {
                            oarc.style("opacity", function (d) {
                                return d.data["op"];
                            })
                           .attr("d", arc)
                           .transition()
                           .duration(200)
                           .attr("stroke", "none");
                        }, 1000);
                    });

                var leg = legend.append("rect");

                leg.attr("x", width / 2)
                    .attr("width", 18).attr("height", 18)
                    .style("fill", function (d) {
                        return rcolor(d[yVarName]);
                    })
                    .style("opacity", function (d) {
                        return d["op"];
                    });
                legend.append("text").attr("x", (width / 2) - 5)
                    .attr("y", 9).attr("dy", ".35em")
                    .style("text-anchor", "end").text(function (d) {
                        return d.caption;
                    });

                leg.append("svg:title")
                .text(function (d) {
                    return d["title"] + " (" + d[yVarName] + ")";
                });

                function tweenOut(data) {
                    data.startAngle = data.endAngle = (2 * Math.PI);
                    var interpolation = d3.interpolate(this._current, data);
                    this._current = interpolation(0);
                    return function (t) {
                        return arc(interpolation(t));
                    };
                }

                function tweenIn(data) {
                    var interpolation = d3.interpolate({ startAngle: 0, endAngle: 0 }, data);
                    this._current = interpolation(0);
                    return function (t) {
                        return arc(interpolation(t));
                    };
                }

            }

            function TransformChartData(chartData, opts, level, filter) {
                var result = [];
                var resultColors = [];
                var counter = 0;
                var hasMatch;
                var xVarName;
                var yVarName = opts[0].yaxis;

                if (level == 1) {
                    xVarName = opts[0].xaxisl1;

                    for (var i in chartData) {
                        hasMatch = false;
                        for (var index = 0; index < result.length; ++index) {
                            var data = result[index];

                            if ((data[xVarName] == chartData[i][xVarName]) && (chartData[i][opts[0].xaxis]) == filter) {
                                result[index][yVarName] = result[index][yVarName] + chartData[i][yVarName];
                                hasMatch = true;
                                break;
                            }

                        }
                        if ((hasMatch == false) && ((chartData[i][opts[0].xaxis]) == filter)) {
                            if (result.length < 9) {
                                ditem = {}
                                ditem[xVarName] = chartData[i][xVarName];
                                ditem[yVarName] = chartData[i][yVarName];
                                ditem["caption"] = chartData[i][xVarName].substring(0, 10) + '...';
                                ditem["title"] = chartData[i][xVarName];
                                ditem["op"] = 1.0 - parseFloat("0." + (result.length));
                                result.push(ditem);

                                resultColors[counter] = opts[0].color[0][chartData[i][opts[0].xaxis]];

                                counter += 1;
                            }
                        }
                    }
                }
                else {
                    xVarName = opts[0].xaxis;

                    for (var i in chartData) {
                        hasMatch = false;
                        for (var index = 0; index < result.length; ++index) {
                            var data = result[index];

                            if (data[xVarName] == chartData[i][xVarName]) {
                                result[index][yVarName] = result[index][yVarName] + chartData[i][yVarName];
                                hasMatch = true;
                                break;
                            }
                        }
                        if (hasMatch == false) {
                            ditem = {};
                            ditem[xVarName] = chartData[i][xVarName];
                            ditem[yVarName] = chartData[i][yVarName];
                            ditem["caption"] = opts[0].captions != undefined ? opts[0].captions[0][chartData[i][xVarName]] : "";
                            ditem["title"] = opts[0].captions != undefined ? opts[0].captions[0][chartData[i][xVarName]] : "";
                            ditem["op"] = 1;
                            result.push(ditem);

                            resultColors[counter] = opts[0].color != undefined ? opts[0].color[0][chartData[i][xVarName]] : "";

                            counter += 1;
                        }
                    }
                }


                runningData = result;
                runningColors = resultColors;
                return;
            }

            chartOptions = [{
                "captions": [{ "Chicken": "Chicken", "Sandwich": "Sandwich", "Pizza": "Pizza","Meat": "Meat", "Fool&Tamia": "Fool&Tamia", "drinks": "drinks" }],
                "color": [{ "Chicken": "#dc3545","Meat": "red" , "Pizza": "blue", "Sandwich": "#ffc107", "Fool&Tamia": "#28a745", "drinks": "#007bff" }],
                "xaxis": "Type",
                "xaxisl1": "Model",
                "yaxis": "Total"
            }]

            var chartData = [
                {
                    "Type": "Pizza",
                    "Model": "ELHelaly",
                    "Total": 5
                },
                {
                    "Type": "Pizza",
                    "Model": "ELGomhoria",
                    "Total": 7
                },
                 {
                    "Type": "Pizza",
                    "Model": "sety",
                    "Total": 6
                },
                 {
                    "Type": "Pizza",
                    "Model": "makarm",
                    "Total": 2
                },
                {
                    "Type": "Chicken",
                    "Model": "ELHelaly",
                    "Total": 9
                },
                {
                    "Type": "Chicken",
                    "Model": "ELGomhoria",
                    "Total": 6
                },
                {
                    "Type": "Chicken",
                    "Model": "sety",
                    "Total": 3
                },
                {
                    "Type": "Meat",
                    "Model": "makarm",
                    "Total":7
                },
                {
                    "Type": "Meat",
                    "Model": "ELGomhoria",
                    "Total":1
                },

                {
                    "Type": "Meat",
                    "Model": "ELHelaly",
                    "Total":2
                },
                {
                    "Type": "Meat",
                    "Model": "sety",
                    "Total":9
                },
                {
                    "Type": "Meat",
                    "Model": "ElNimess",
                    "Total":4
                },
                {
                    "Type": "Sandwich",
                    "Model": "makarm",
                    "Total": 7
                },
                {
                    "Type": "Sandwich",
                    "Model": "ELHelaly",
                    "Total": 10
                },
                {
                    "Type": "Sandwich",
                    "Model": "ElNimess",
                    "Total":8
                },
                {
                    "Type": "Sandwich",
                    "Model": "sety",
                    "Total": 5
                },
                  {
                    "Type": "Fool&Tamia",
                    "Model": "sety",
                    "Total": 6
                },
                 {
                    "Type": "Fool&Tamia",
                    "Model": "makarm",
                    "Total": 5
                },
                 {
                    "Type": "Fool&Tamia",
                    "Model": "ElNimess",
                    "Total": 8
                },
                 {
                    "Type": "Fool&Tamia",
                    "Model": "ELHelaly",
                    "Total": 3
                },
                {
                    "Type": "drinks",
                    "Model": "ELHelaly",
                    "Total": 3
                },
                {
                    "Type": "drinks",
                    "Model": "ELGomhoria",
                    "Total": 2
                },
                {
                    "Type": "drinks",
                    "Model": "ElNimess",
                    "Total": 1
                }
            ];
        </script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\dashbordProject\resources\views/statistic.blade.php ENDPATH**/ ?>