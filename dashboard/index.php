<!-- konfirmasi kedatabase -->
<?php
    
    session_start();
    error_reporting(1);
    if (!isset($_SESSION['username'])) {
        header('Location: ../index.php');
    }
    require_once '../config/db.php';
    require_once 'layout/header.php';
?>
        <!-- end konfirmasi -->
            <div class="wrap-fluid" id="paper-bg">
                <!-- top nav -->
                <div class="top-bar-nest" style="background:#111;">
                    <nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false" style="background:#111;">
                            
                               
                         <!-- tombol untuk keluar   -->   
                        <ul class="pull-right">
                            <li>
                            <button class="fontello-power-outline" style="background-color: #f04124;border-radius: 5px;">
                                <a href="../logout.php" style="color: #ffffff"> Logout</a>
                            </button>
                            </li>                           
                        </ul>
                    </nav>
                </div>
                <!-- end of top nav -->

               <br><br><br>
                <!-- end of breadcrumbs -->
                <div class="large-12 columns">
    <div class="box">
       

       
            <form role="form" method="POST"> 
                <label>
                <!-- tampil pada ucapan selamat datang nama user -->
                    <th>
                         <h5 align="center"><img src="img/logo.jpg" width="150" height="50"><br>SMP N 1 Sedayu <br>Jl.Pedes-Nulis,Panggang,Argomulyo,Sedayu,Bantul,DIY
                                  
                        </h5>
                     </th>
                </label>
                <?php
                // echo '<pre>';
                // print_r([
                //     'get'=> $_GET,
                //     'post'=> $_POST,
                // ]);
                // echo '</pre>';
                ?>
            </form>
		
		 <?php 
                $v_user = $_SESSION['id'];
               
                            $no         =   1;
                            $user      =   mysql_query("SELECT * FROM users WHERE users_id = '".$v_user."' ");
                            $row=mysql_fetch_array($user);
                ?>
                <form>
                <div class="from-group">
                  
                <div class="box-body " style="display block;" align="center">
                    <div class="large-4 columns">
                       
                    </div>
                    </div>
                    </table>
                     <table  class="" style="width:100%">
					
                   
                      
                    </tr>
                                
                </tbody>
                </div>
            </table>
            </form>
        </div>
    </div>
</div>
        
               
<div class="row">
    <?php 
        require_once 'layout/content.php';
    ?>
</div>

<?php require_once 'layout/footer.php'; ?>