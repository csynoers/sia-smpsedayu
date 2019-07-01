

 <!-- Container Begin -->
                <div class="row" style="margin-top:-20px">

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
                                <h3 class="box-title"><i class="icon-graph-pie"></i>
                                    <span>Detail Instruksi</span>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body " style="display: block;">
                            <?php 
                    if (isset($_GET['instruksi'])) {
                        if ($_GET['instruksi'] == 'lihat_instruksi') {
                            
                            $no         =   1;
                            $instgs      =   mysql_query("select * from instgs order by instgs_id DESC limit 1");

                            while ($row=mysql_fetch_array($instgs)) {
                ?>
                    <h3 text align="center"><?php echo "$row[judul]";?></h3>
                    <p><?php echo "$row[info]";?></p>
                <?php
                $no++;
                            }
                        }
                    }
                ?>          
                            </div>
                            <!-- end .timeline -->


                        </div>
                        <!-- box -->
                    </div>
                </div>
                <!-- End of Container Begin -->