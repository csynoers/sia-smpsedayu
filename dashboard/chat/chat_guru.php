<?php
    require_once('../../config/db.php');
    session_start();
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from ndesaintheme.com/edumix/version_1.3/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 May 2015 20:31:21 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pembelajaran</title>

    <link rel="stylesheet" href="cs/css/foundation.css" />

    <!-- Custom styles for this template -->

    <link rel="stylesheet" href="cs/css/dashboard.css">
    <link rel="stylesheet" href="cs/css/style.css">
    <link rel="stylesheet" href="cs/css/dripicon.css">
    <link rel="stylesheet" href="cs/css/typicons.css" />
    <link rel="stylesheet" href="cs/css/font-awesome.css" />
    <link rel="stylesheet" href="cs/sass/css/theme.css">

    <!-- pace loader -->
    <script src="cs/js/pace/pace.js"></script>
    <link href="cs/js/pace/themes/orange/pace-theme-flash.css" rel="stylesheet" />
    <link rel="stylesheet" href="cs/js/slicknav/slicknav.css" />



    <script src="cs/js/vendor/modernizr.js"></script>

</head>

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- End of preloader -->

    <div class="off-canvas-wrap" data-offcanvas>
        <!-- right sidebar wrapper -->
        <div class="inner-wrap">


            <!-- Right sidemenu -->
           
            <!-- end of Rightsidemenu -->



            <div class="wrap-fluid" id="paper-bg">
                <!-- top nav -->
               <br>


                <!-- Container Begin -->
                <div class="row" style="margin-top:-20px">
                  


				
                <!-- Widget  -->
                <div class="center">
                    <div class="large-12 columns">
                        <div class="box">
                            <div class="box-header bg-transparent">
                                <!-- tools box -->
                                <div class="pull-right box-tools">

                                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                                    </span>
                                    <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                                    </span>
                                </div>
                                <h3 class="box-title"><i class=""></i>
                                    <span>
							<?php 
							$sql=" SELECT * FROM guru 
							where username = '$_SESSION[username]'";
							$result=mysqli_query($connect, $sql) or die ("error : ".mysqli_error($connect));
							$t=mysqli_fetch_array($result);							
							?>
                                </span>
								 <h4><img src="../img/<?php echo $t['gambar']; ?>" width="30" height="30" align="left"/> <?php if ($_SESSION['level']=='guru'){?><?php echo $_SESSION['nama']; ?><?php } ?></h4>
								
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="display: block;">
                                <div class="school-timetable">
                                    <form id="demo-form2"  class="form-horizontal form-label-left" method="POST" action="simpan_pesan.php">
										<input type="hidden" name="nik" value="<?php echo $t['nik']; ?>">
                                        <div class="form-group">
                                           <div class="col-md-1 col-md-offset-0">
                                        <textarea rows="5" name="pesan" class="form-control"></textarea>
										</div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Kirim</button>
                                            </div>
                                        </div>

                                    </form>
                                   

                                </div>




                            </div>
							
							<div class="box-header bg-transparent">
                                <!-- tools box -->
                                <div class="pull-right box-tools">

                                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                                    </span>
                                    <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                                    </span>
                                </div>
                                <h3 class="box-title"><i class=""></i>
                                    <span>
							<?php
							$o=" SELECT * FROM  guru 
							where
							username = '$_SESSION[username]'";
							$p=mysqli_query($connect, $o) or die ("error : ".mysqli_error($connect));
							$q=mysqli_fetch_array($p);							
							?>
							<?php
							$o=" SELECT * FROM forum,guru 
							where guru.nik=forum.nik 
							and guru.username = '$_SESSION[username]'
							order by id_forum DESC";
							$p=mysqli_query($connect, $o) or die ("error : ".mysqli_error($connect));
							while($c=mysqli_fetch_array($p)){							
							?>
                                </span>
								<h4><img src="../img/<?php echo $t['gambar']; ?>" width="30" height="30" align="left"/> <?php if ($_SESSION['level']=='guru'){?><?php echo $_SESSION['nama']; ?><?php } ?></h4>
							
                                </h3>
                            </div>
							
							 <div class="box-body" style="display: block;">
                                <div class="school-timetable">
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="simpan_pesan3.php">
						  <input type="hidden" name="nik" value="<?php echo $q['nik']; ?>">
							<input type="hidden" name="id_forum" value="<?php echo $c['id_forum']; ?>">

                                        <p><?php echo $c['nama']; ?><br><?php echo $c['post']; ?><br><?php echo date('d-m-Y',strtotime($c['tanggal_post'])); ?></p><a href=""><i class="fa fa-comments-o fa-fw"></i>Komentar</a></p>
                                       
									   
									    <?php
							$e=" SELECT * FROM detail_forum,siswa,forum 
							where detail_forum.nis=siswa.nis
							and forum.id_forum=detail_forum.id_forum
							and forum.id_forum='$c[id_forum]'";
							$f=mysqli_query($connect, $e) or die ("error : ".mysqli_error($connect));
							while($g=mysqli_fetch_array($f)){							
							?>
							<img src="../../assets/img/siswa/<?php echo $g['gambar']; ?>" width="30" height="30"/>
                                       <p><?php echo $g['nama_siswa']; ?><br><?php echo $g['komentar']; ?><br><?php echo date('d-m-Y',strtotime($g['tanggal_komentar'])); ?></p>
                                      
						<?php  }  
								
								?>
								   <?php
							$z=" SELECT * FROM reply_guru,guru,forum 
							where reply_guru.id_forum=forum.id_forum
							and forum.nik=guru.nik
							and forum.id_forum='$c[id_forum]'";
							$x=mysqli_query($connect, $z) or die ("error : ".mysqli_error($connect));
							while($b=mysqli_fetch_array($x)){							
							?>
							<img src="../img/<?php echo $b['gambar']; ?>" width="30" height="30"/>
                                       <p><?php echo $b['nama']; ?><br><?php echo $b['reply_guru']; ?><br><?php echo date('d-m-Y',strtotime($b['tanggal_reply'])); ?></p>
                                       
						<?php  }  
								
								?>
								<div class="form-group">
                                 
                                           <div class="col-md-12 col-md-offset-0">
                                        <textarea rows="5" name="pesan" class="form-control"></textarea>
                                    </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Kirim</button>
                                            </div>
                                        </div>

									   
								

                                    </form>
                                   

                                </div>




                            </div>
							<?php  }  
								
								?>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <!-- /.box -->
                </div>
                <!-- End of Widget  -->
				<center>


                <footer>
                    <div id="footer">Copyright &copy; 2015 <a href="http://themeforest.net/user/matirasa">Matirasa</a> Made with <i class="fontello-heart-1 text-green"></i></div>

                </footer>
            </div>

            <!-- End of Container Begin -->








            <!-- Right Menu -->
            <aside class="right-off-canvas-menu">
                <!-- whatever you want goes here -->
                <ul class="off-canvas-list">
                    <li>
                        <label class="bg-transparent" style="padding:25px 20px"><span class="label round bg-green">online</span><i class=" icon-gear right"></i>
                        </label>
                    </li>
                    <li>
                        <a href="#"><img alt="" class="chat-pic" src="../../../api.randomuser.me/portraits/thumb/men/25.jpg"><b>Walter M. Reed</b>
                            <br>Hi, there...</a>
                    </li>
                    <li>
                        <a href="#"><img alt="" class="chat-pic" src="../../../api.randomuser.me/portraits/thumb/women/26.jpg"><b>Evelyn G. Thrailkill</b>
                            <br>Ok, good luck!</a>
                    </li>
                    <li>
                        <a href="#"><img alt="" class="chat-pic" src="../../../api.randomuser.me/portraits/thumb/men/27.jpg"><b>Michael L. Merchant</b>
                            <br>Do you receive my email?</a>
                    </li>

                    <li>
                        <a href="#"><img alt="" class="chat-pic" src="../../../api.randomuser.me/portraits/thumb/men/29.jpg"><b>James S. Houchin</b>
                            <br>Thak you, you're wellcome</a>
                    </li>

                    <li>
                        <label class="bg-transparent" style="padding:25px 20px"><span class="label round bg-opacity-white">offline</span><i class="icon-gear right"></i>
                        </label>
                    </li>

                    <li>
                        <a href="#"><img alt="" class="chat-pic chat-pic-gray" src="../../../api.randomuser.me/portraits/thumb/men/30.jpg"><b>Allen M. Plant</b>
                            <br>Hi, there...</a>
                    </li>
                    <li>
                        <a href="#"><img alt="" class="chat-pic chat-pic-gray" src="../../../api.randomuser.me/portraits/thumb/men/31.jpg"><b>Arthur S. Galindo</b>
                            <br>Hi, there...</a>
                    </li>
                    <li>
                        <a href="#"><img alt="" class="chat-pic chat-pic-gray" src="../../../api.randomuser.me/portraits/thumb/women/32.jpg"><b>Joyce T. True</b>
                            <br>Hi, there...</a>
                    </li>
                    <li>
                        <a href="#"><img alt="" class="chat-pic chat-pic-gray" src="../../../api.randomuser.me/portraits/thumb/men/33.jpg"><b>Christopher A. Charpentier</b>
                            <br>Hi, there...</a>
                    </li>
                    <li>
                        <a href="#"><img alt="" class="chat-pic chat-pic-gray" src="../../../api.randomuser.me/portraits/thumb/women/34.jpg"><b>Teresa M. Boothe</b>
                            <br>Hi, there...</a>
                    </li>


                </ul>
            </aside>
            <!-- close the off-canvas menu -->
            <a class="exit-off-canvas"></a>
            <!-- End of Right Menu -->
        </div>
        <!-- end paper bg -->

    </div>
    <!-- end of off-canvas-wrap -->

    <!-- end of inner-wrap -->



    <!-- main javascript library -->
    <script type='text/javascript' src="cs/js/jquery.js"></script>
    <script type="text/javascript" src="cs/js/waypoints.min.js"></script>
    <script type='text/javascript' src='cs/js/preloader-script.js'></script>
    <!-- foundation javascript -->
    <script type='text/javascript' src="cs/js/foundation.min.js"></script>
    <script type='text/javascript' src="cs/js/foundation/foundation.html#111111.js"></script>
    <!-- main edumix javascript -->
    <script type='text/javascript' src='cs/js/slimscroll/jquery.slimscroll.js'></script>
    <script type='text/javascript' src='cs/js/slicknav/jquery.slicknav.js'></script>
    <script type='text/javascript' src='cs/js/sliding-menu.js'></script>
    <script type='text/javascript' src='cs/js/scriptbreaker-multiple-accordion-1.js'></script>
    <script type="text/javascript" src="cs/js/number/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="cs/js/circle-progress/jquery.circliful.js"></script>
    <script type='text/javascript' src='cs/js/app.js'></script>
    <!-- additional javascript -->
    <script type='text/javascript' src="cs/js/number-progress-bar/jquery.velocity.min.js"></script>
    <script type='text/javascript' src="cs/js/number-progress-bar/number-pb.js"></script>
    <script type='text/javascript' src="cs/js/loader/loader.js"></script>
    <script type='text/javascript' src="cs/js/loader/demo.js"></script>
    <!-- FLOT CHARTS -->
    <script src="cs/js/flot/jquery.flot.js" type="text/javascript"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="cs/js/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="cs/js/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="cs/js/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="cs/js/skycons/skycons.js"></script>

    <script type="text/javascript">
    $(function() {
        "use strict";


        //weather icons
        var icons = new Skycons({
                "stroke": 0.06,
                "color": "Gray",
                "cloudColor": "#666666",
                "sunColor": "#92cd18",
                "moonColor": "DodgerBlue",
                "rainColor": "RoyalBlue",
                "snowColor": "LightGray",
                "windColor": "LightSteelBlue",
                "fogColor": "#65C3DF"
            }),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);
        icons.play()

        /*
         * LINE CHART
         * ----------
         */
        //LINE randomly generated data

        var line_data1 = [
            [1, 800],
            [2, 1500],
            [3, 900],
            [4, 1900],
            [5, 4000],
            [6, 2800],
            [7, 2500],
            [8, 700],
            [9, 1500],
            [10, 1000],
            [11, 2000],
            [12, 4300],
            [13, 1756],
            [14, 2000],
            [15, 1500],
            [16, 1900],
            [17, 1200],
            [18, 2800],
            [19, 3200],
            [20, 2190]
        ];
        var line_data2 = [
            [1, 1800],
            [2, 2900],
            [3, 1950],
            [4, 3450],
            [5, 7000],
            [6, 5300],
            [7, 4890],
            [8, 2300],
            [9, 3900],
            [10, 2900],
            [11, 4500],
            [12, 2200],
            [13, 1120],
            [14, 1459],
            [15, 1100],
            [16, 1189],
            [17, 300],
            [18, 1250],
            [19, 1705],
            [20, 959]

        ];


        $.plot("#line-chart", [line_data1, line_data2], {
            grid: {
                hoverable: true,
                borderColor: "#E2E6EE",
                borderWidth: 1,
                tickColor: "#E2E6EE"
            },
            series: {
                shadowSize: 0,
                lines: {
                    show: true
                },
                points: {
                    show: true
                }
            },
            colors: ["#333333", "#cccccc"],
            lines: {
                fill: true,
            },
            yaxis: {
                show: false,
            },
            xaxis: {
                show: true
            }
        });
        //Initialize tooltip on hover
        $("<div class='tooltip-inner' id='line-chart-tooltip'></div>").css({
            position: "absolute",
            background: "#333333",
            padding: "3px 10px",
            color: "#ffffff",
            display: "none",
            opacity: 0.9
        }).appendTo("body");
        $("#line-chart").bind("plothover", function(event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

                $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
                    .css({
                        top: item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200);
            } else {
                $("#line-chart-tooltip").hide();
            }

        });
        /* END LINE CHART */

        /*
         * FULL WIDTH STATIC AREA CHART
         * -----------------
         */
        var areaData = [
            [2, 88.0],
            [3, 93.3],
            [4, 102.0],
            [5, 108.5],
            [6, 115.7],
            [7, 115.6],
            [8, 124.6],
            [9, 130.3],
            [10, 134.3],
            [11, 141.4],
            [12, 146.5],
            [13, 151.7],
            [14, 159.9],
            [15, 165.4],
            [16, 167.8],
            [17, 168.7],
            [18, 169.5],
            [19, 168.0]
        ];
        $.plot("#area-chart", [areaData], {
            grid: {
                borderWidth: 0
            },
            series: {
                shadowSize: 0, // Drawing is faster without shadows
                color: "#00c0ef"
            },
            lines: {
                fill: true //Converts the line chart to area chart                        
            },
            yaxis: {
                show: false
            },
            xaxis: {
                show: false
            }
        });

        /* END AREA CHART */

    });

    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
        return "<div style='font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
    }
    </script>


    <script>
    $(document).foundation();
    </script>



</body>


<!-- Mirrored from ndesaintheme.com/edumix/version_1.3/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 May 2015 20:32:42 GMT -->
</html>
