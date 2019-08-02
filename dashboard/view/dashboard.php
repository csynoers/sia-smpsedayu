<?php
    $sql= ("SELECT * FROM users WHERE users_id = '{$_SESSION['id']}'");
    foreach (query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
        echo '
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
                        <h3 class="box-title"><i class="fontello-th-large-outline"></i>
                            <span>Informasi Profil</span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
            
                    <div class="box-body small-5" style="display: block;">
                        <table style="width:100%;">

                            <tbody>
                                <tr>
                                    <td>Noel A. Rilley</td>
                                    <td>New member registered.</td>
                                    <td>07:45 PM</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>Paul L. Williams</td>
                                    <td>Getting job done , for task last night</td>
                                    <td>12:00 AM</td>
                                    <td>Verified</td>
                                </tr>
                                <tr>
                                    <td>Jeniffer L. Hewwit</td>
                                    <td>Joining new history class</td>
                                    <td>20:23 PM</td>
                                    <td>Pending</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- / table -->
                    </div>
                    <!-- end .timeline -->
                </div>
                <!-- box -->
            </div>
        ';
    }
?>