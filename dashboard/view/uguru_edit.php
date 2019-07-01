                 <?php 
                //$_SESSION['id']         =   $id;
                $v_user = $_SESSION['id'];
                    if (isset($_GET['users'])) {
                        if ($_GET['users'] == 'gwedit') {
                            $no         =   1;
                            $user      =   mysql_query("SELECT * FROM users WHERE users_id = '".$v_user."' ");
                            $row=mysql_fetch_array($user);
                ?>
                <form>
                <div class="from-group">
                  
                <div class="box-body " style="display block;" align="center">
                    <div class="large-4 columns">
                        <div class="box">
                           <div class="box-body " style="display: block;">                       
                              <div class="col-md-12">
                                <img src="<?php echo $row['users_foto']; ?>">;
                            </div>
                            </div>
                         </div>
                    </div>
                    </div>
                    </table>
                     <table  class="" style="width:60%">
                    <tr>
                        
                        <th width="30%">Nama</th>
                        <td>
                            <?php
                                if ($row['users_nama'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_nama'];
                            ?>
                        </td>
                     

                        <!-- 
                      
                        <th>Action</th> -->
                    </tr>
                    <tr>
                       <th>Alamat</th>
                    
                    <td>
                            <?php
                                if ($row['user_alamat'] == NULL) {
                                   
                                }

                                echo $row['users_alamat'];
                            ?>
                        </td>

                     </tr>
                     <tr>
                    <th>Telepon</th>  
                    <td>
                            <?php
                                if ($row['users_telp'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_telp'];
                            ?>
                        </td>  
                    </tr>
                <tr>
                    <th>E-mail</th>
                    <td>
                            <?php
                                if ($row['users_email'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_email'];
                            ?>
                        </td>
                      </tr>
                      <TR>
                      <th>status</th>
                        <td>
                            <?php
                                if ($row['pelajaran_nama'] == NULL) {
                                    echo "";
                                }

                                echo $row['users_status'];
                            ?>
                        </td>
                    <tr>
                       <td>
                            <a href="?guru-edit=<?php echo $row['users_id']; ?>"><span class="tiny radius fontello-edit button bg-black-solid" >Edit</span> </a>
                       </td>
                    </tr>
                <?php
                            $no++;
                            }
                        }
                    ?>                    
                </tbody>
                </div>
            </table>
            </form>
        </div>