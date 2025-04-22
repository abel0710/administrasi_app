<?php 
session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // Arahkan ke halaman login jika belum login
  header("Location: login.php");
  exit();
}
include('nav.php'); ?>


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-primary" id="greeting"></h5>
                        <p class="mb-4" id="time"></p>
                    </div>

                    <script>
                        function getGreeting() {
                            const now = new Date();
                            const hours = now.getHours();
                            let greeting;

                            if (hours < 12) {
                                greeting = 'Selamat Pagi☀️';
                            } else if (hours < 18) {
                                greeting = 'Selamat Siang🌞';
                            } else if (hours < 21) {
                                greeting = 'Selamat Sore🎉';
                            } else {
                                greeting = 'Selamat Malam🌙';
                            }

                            return greeting;
                        }

                        function updateTime() {
                            const now = new Date();
                            const timeString = now.toLocaleTimeString();

                            document.getElementById('greeting').innerText = getGreeting();
                            document.getElementById('time').innerText = `Jam: ${timeString}`;
                        }

                        updateTime();
                        setInterval(updateTime, 1000);
                    </script>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Banner</span>
                          <small class="text-success fw-semibold">
                              <i class="bx bx-up-arrow-alt"></i>
                              <?php
                                  // Koneksi ke database
                                  $servername = "localhost";
                                  $username = "root";  
                                  $password = "";
                                  $dbname = "db_administrasi";
                                  $conn = new mysqli($servername, $username, $password, $dbname);

                                  if ($conn->connect_error) {
                                      die("Koneksi gagal: " . $conn->connect_error);
                                  }

                                  $sql = "SELECT COUNT(*) AS total FROM banner";
                                  $result = $conn->query($sql);

                                  if ($result->num_rows > 0) {
                                      $row = $result->fetch_assoc();
                                      echo  $row["total"] . " Data";
                                  } else {
                                      echo "Jumlah Data: 0";
                                  }
                                  $conn->close();
                              ?>
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span>Keuangan</span> <br>
                            <small class="text-success fw-semibold">
                                <i class="bx bx-up-arrow-alt"></i>
                                <?php
                                    $servername = "localhost";
                                    $username = "root";  
                                    $password = "";
                                    $dbname = "db_administrasi";
                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    if ($conn->connect_error) {
                                        die("Koneksi gagal: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT COUNT(*) AS total FROM keuangan";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        echo $row["total"] . " Data";
                                    } else {
                                        echo "Jumlah Data: 0";
                                    }
                                    $conn->close();
                                ?>
                            </small>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-4">
                        <div class="card-body">
                          <div class="text-center">

                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <h5 class="text-nowrap mb-2">Merchandise</h5>
                            </div>
                            <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold">
                                    <i class="bx bx-chevron-up"></i>
                                    <?php
                                        $servername = "localhost";
                                        $username = "root";  
                                        $password = "";
                                        $dbname = "db_administrasi";
                                        $conn = new mysqli($servername, $username, $password, $dbname);

                                        if ($conn->connect_error) {
                                            die("Koneksi gagal: " . $conn->connect_error);
                                        }

                                        $sql = "SELECT COUNT(*) AS total FROM merchandise";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            echo $row["total"] . " Data";
                                        } else {
                                            echo "Jumlah Data: 0";
                                        }
                                        $conn->close();
                                    ?>
                                </small>
                            </div>
                        </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <?php include('foot.php'); ?>