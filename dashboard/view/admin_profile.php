<?php 
                $_SESSION['id']         =   $id;
                    if (isset($_GET['users'])) {
                        if ($_GET['users'] == 'siswa') {
                            
                            $no         =   1;
                            $siswa      =   mysql_query("SELECT * FROM users WHERE users_level='siswa' ORDER BY users_id DESC");

                            while ($row=mysql_fetch_array($siswa)) {
                ?>