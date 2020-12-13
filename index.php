<?php 

define('BASEURL', 'http://localhost/ongkir');

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Web Ongkir Ekspedisi</title>

    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/bootstrap.css">
    <script src="<?php echo BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASEURL; ?>/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo BASEURL; ?>/js/bootstrap.js"></script>
    <script src="<?php echo BASEURL; ?>/js/ajax.js"></script>

</head>
<body>

<div class="container h-100 col-5">
    <div class="row h-100 justify-content-center align-items-center">
        
        <div class="form-group">
            <div class="card text-white bg-secondary mb-3">
                <h5 class="card-header">Cek Ongkos Kirim</h5>
                    <div class="card-body">
                    
                        <p class="card-text font-weight-bold">Selamat datang di website ini, silahkan masukkan alamat asal dan alamat tujuan anda untuk melakukkan tracking ongkos kirim, untuk kurir JNE, TIKI dan POS Indonesia</p>
                            <div class="form-group">
                                <label for="province_origin" class="form-label">Masukkan Provinsi Asal :</label>
                                <select class="all_province form-control" name="province_origin" id="province_origin" onchange="get_city_origin(this);">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>


                        <div class="form-group">
                              <label for="city_origin" class="form-label">Masukkan Kota Asal :</label>
                                <select class="form-control" name="city_origin" id="city_origin">
                                    <option value="">Pilih Kota</option>
                                </select>
                        </div>
                        <div class="form-group">
                              <label for="province_destination" class="form-label">Masukkan Provinsi Tujuan :</label>
                                <select class="all_province form-control" name="province_destination" id="province_destination" onchange="get_city_destination(this);">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                        </div>

                        <div class="form-group">
                              <label for="city_destination" class="form-label">Masukkan Kota Tujuan :</label>
                                <select class="form-control" name="city_destination" id="city_destination">
                                    <option value="">Pilih Kota</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="weight">Berat (gram.) :</label>
                                <input class="form-control" name="weight" id="weight" type="number" placeholder="Berat (gram)">
                        </div>

                        <div class="form-group">
                              <label for="courier">Jasa Ekspedisi :</label>
                                <select class="form-control" name="courier" id="courier">
                                    <option value="">Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS Indonesia</option>
                                </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="get_cost(city_origin.value, city_destination.value, weight.value, courier.value);">
                        </div>
                    </div>
            </div>
        </div>
        
    </div>
</div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detail Pengiriman Ekspedisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                            <table class="table" border="1">
                                <thead>
                                <tr>
                                    <th scope="col">Service</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Biaya</th>
                                    <th scope="col">Estimasi</th>
                                    <th scope="col">Catatan</th>
                                </tr>
                                </thead>
                                <tbody id="detail">

                                </tbody>
                            </table>
                        </div>
                      <div class="modal-footer">
                        <a href="index.php" class="btn btn-primary">Tutup</a>
                      </div>
                    </div>
                  </div>
                </div>
    

</body>
</html>
