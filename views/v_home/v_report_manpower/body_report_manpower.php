<body class="materialdesign">
    <style type="text/css">
    tbody tr:nth-child(odd) {background-color: #f5f5f5;}

	#block1, #block2{
		display: inline;
	}   

    </style>
    <div class="wrapper-pro">

        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="#"><img src="../static/img/admin_photo.png" style="width:80px; height:80px" />
                    </a>
                    <h3>Spongebob</h3>
                    <p>Squarepants</p>
                </div>
                
<?php include '../../../views/v_home/v_karyawan_aktif/sidebar_aktif.php' ?>

        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#"><img src="../../pertamina/static/img/log.png" alt=""/></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                                <!-- PASS -->
                            </div>
                            
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="../routes/routeLogout.php" class="nav-link dropdown-toggle">
                                                <span style="float: right;">Keluar <i class="fas fa-sign-out-alt"></i> </span>
                                            </a>
                                        </li>            
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php include '../../../views/v_home/v_karyawan_aktif/view_mobile_aktif.php' ?>
            <div class="welcome-adminpro-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data table area Start-->
            <div class="admin-dashone-data-table-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline8-list shadow-reset">
                                
                                <div class="sparkline8-hd" style="margin-top: 15px;">
                                    <p align=center style="font-size:20px; font-color: black">Data Grafik Report Manpower</p>
                                </div>
									
                                    <div class="sparkline8-graph">
                                        <div class="datatable-dashv1-list custom-datatable-overright" >
                                            <div class="toolbar"></div>                                                              
                               
						            <canvas id="myChart1"></canvas>

                                   
                                   <?php 
                                      $halaman = 12;

                                      $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                      $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

                                      $result = mysqli_query(connDB(),"SELECT * FROM fungsi GROUP BY nama_fungsi ASC");
                                      $total = mysqli_num_rows($result);

                                      $pages = ceil($total/$halaman);
                                                
                                      $query = mysqli_query(connDB(),"select * from fungsi GROUP BY nama_fungsi ASC LIMIT $mulai, $halaman");
                                      $no =$mulai+1;

                                      
                                    ?>

										
                                        <!-- halaman auto -->
                                        -- Halaman --
                                        
                                        <div style="margin-top: 5px">
                                          <?php for ($i=1; $i<=$pages ; $i++){ ?>
                                          <a style="background-color: grey; font-size: 14px; color: white; padding: 3px" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

                                          <?php } ?>

                                        </div>
									
						            </div>
                        
                        <hr style="border: 3px solid red; border-radius: 5px;">
                    
                        <p align=center style="font-size:20px; font-color: black; margin-top: 4%">Data Tabel Report Manpower</p>
                    
                        <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="domainsTable" data-toggle="table" data-pagination="false" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar" data-filter-control="true" >
                                        <thead>
                                            <tr>
                                                    <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                    <th data-field="id"><center>No</center></th>
                                                    <th data-field="nopeg" data-editable="false"><center>Fungsi</center></th>
                                                    <th data-field="start_date" data-editable="false"><center>Total</center></th>
                                                    <th data-field="expired_date" data-editable="false"><center>Terisi</center></th>
                                                    <th data-field="kode" data-editable="false"><center>Kosong</center></th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                            <?php
                                                $halaman = 12;

                                                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

                                                $result = mysqli_query(connDB(),"SELECT * FROM fungsi GROUP BY nama_fungsi ASC");
                                                $total = mysqli_num_rows($result);

                                                $pages = ceil($total/$halaman);
                                                        
                                                $query = "SELECT nama_fungsi, count(fungsi.kbo) as total FROM posisi, fungsi WHERE fungsi.kbo = posisi.kbo GROUP by nama_fungsi Limit $mulai, $halaman";
                                                $hasil = mysqli_query(connDB(),$query);

                                                $query1 = "SELECT count(fungsi.kbo) as terisi FROM posisi, fungsi, data_karyawan WHERE fungsi.kbo = posisi.kbo and posisi.id_position = data_karyawan.id_position GROUP by nama_fungsi LIMIT $mulai, $halaman";
                                                $hasil1 = mysqli_query(connDB(),$query1);
                                                
                                                $no = 1;
                                                if (($hasil->num_rows > 0) && ($hasil1->num_rows > 0)) {
                                                    while ((($data = $hasil->fetch_assoc()) && ($data1 = $hasil1->fetch_assoc()))) {
                                                    

                                                    $nama_fungsi = $data['nama_fungsi'];
                                                    $total = $data['total'];
                                                    $terisi = $data1['terisi'];
                                                                                                        
                                            ?>
                                            <tr>
                                                <td><?php echo "<center><p style='margin-left:-9.6px'>$no</p></center>";
                                                    $no++;
                                                    ?>
                                                </td>

                                                <td><?php 
                                                // echo $nama_fungsi;
                                                if ($data['total'] ?? null) {
                                                    echo "<center><p style='margin-left:-9.6px'>$nama_fungsi</p></center>";
                                                }
                                                else {
                                                    echo "<center><p style='margin-left:-9.6px'>ANJAY</p></center>"; 
                                                    
                                                }?>
                                                </td>

                                                <td><?php echo "<center><p style='margin-left:-9.6px'>$total</p></center>";?></td>
                                                <td><?php echo "<center><p style='margin-left:-9.6px'>$terisi</p></center>";?></td>
                                                <?php echo
                                                "<td><center>" . ($total - $terisi) . "</center></td>";
                                                ?>
                                                 
                                            </tr>
                                                    
                                            <?php } } else { ?> 
                                                <tr>
                                                    <td colspan='9'>Tidak Terdapat Data Yang Ditemukan</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>



                                </div>


                                </div>
                    

                   

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Data table area End-->

        </div> <!-- INNER ALL END -->

    </div> <!-- WRAPPER PRO END -->


    <?php  
    	include 'body_chart_report_manpower.php';
    ?>

                                   

                                
