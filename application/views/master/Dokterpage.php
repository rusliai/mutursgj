<?php //var_dump($data_dokter)
?>
<div class="card card-danger shadow mb-4">
    <div class="card-header py-3 bg-primary">
        <div class="row">
            <div class="col">
                <h4 class="m-0 font-weight-bold text-white"><?php echo $judul ?></h4>
            </div>
            <div class="col">
                <div class="float-right">
                    <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" id="bntNew" data-target="#ModalDokter"> -->
                    <button type="button" class="btn btn-sm btn-success" id="bntNew">
                        Tambah Dokter
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm" id="tabelDokter" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Aktif</th>
                        <th>ACT</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Aktif</th>
                        <th>ACT</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data_dokter as $value) { ?>
                        <tr>
                            <td><?php echo $value['iddokter'] ?></td>
                            <td><?php echo $value['nama_dokter'] ?></td>
                            <td><?php echo $value['nama_spesialis'] ?></td>
                            <td><?php echo $value['aktif'] ?></td>
                            <td>
                                <!-- <div data-id="<?php echo  $value['iddokter']  ?>" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#ModalDokter" id="btnEdit">Edit</div> -->
                                <div data-id="<?php echo  $value['iddokter']  ?>" class="btn btn-sm  btn-success" onclick="showDetail('<?php echo  $value['iddokter']  ?>')">Edit</div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalDokter" tabindex="-1" role="dialog" aria-labelledby="ModalDokterLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="ModalDokterLabel">Input Data Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-gradient-light">
                <form>
                    <input style="width: 5rem;" type="text" class="form-control" id="formStatus" value="new">
                    <div class="form-group">
                        <label for="Name">ID Dokter</label>
                        <input style="width: 10rem;" type="text" class="form-control" id="idDokter" placeholder="ID Dokter" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama Dokter</label>
                        <input type="text" class="form-control" id="namaDokter" placeholder="Nama Dokter " required>
                    </div>
                    <div class="form-group">
                        <label for="Inputselect">Spesialis</label>
                        <select class="form-control" id="spesialis" name="nama_spesialis">
                            <?php
                            //Membuat koneksi ke database
                            // $kon = mysqli_connect("localhost", 'root', "", "dbmutursgj");
                            // if (!$kon) {
                            //     die("Koneksi database gagal:" . mysqli_connect_error());
                            // }
                            // //Perintah sql untuk menampilkan semua data pada tabel Spesialis
                            // $sql = "select * from master_spesialis";
                            // $hasil = mysqli_query($kon, $sql);
                            // $no = 0;
                            // while ($data = mysqli_fetch_array($hasil)) {
                            //     $no++;
                            ?>
                            <!-- <option value="<?php echo $data['idspesialis']; ?>"><?php echo $data['nama_spesialis']; ?></option> -->
                            <?php
                            // }
                            ?>
                        </select>
                        <!-- <select class="form-control" id="spesialis">
                            <option value="UM">Umum</option>
                            <option value="OBG">Kebidanan dan Kandungan</option>
                            <option value="INT">Penyakit Dalam</option>
                        </select> -->
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="check_id"> Aktif / Non Aktif
                        </label>
                    </div>
                </form>
                <button id="button_simpan" class="btn btn-sm btn-danger">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = "<?php echo base_url(); ?>";
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");


    const iddokter = document.getElementById('idDokter');
    const namaDokter = document.getElementById('namaDokter');
    const spesialis = document.getElementById('spesialis');
    const aktif = document.getElementById('check_id');
    const formStatus = document.getElementById('formStatus');
    const bntNew = document.getElementById('bntNew');

    fill_spesialis();
    $('#tabelDokter').DataTable();
    
    
    function fill_spesialis() {
        xhr.open("GET", base_url + "dokter/get_list_spesialis/");
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != "") {
                    spesialis.innerHTML = "";
                    data = JSON.parse(this.responseText);
                    data.forEach(function callback(value, index) {
                        var option = document.createElement("option");
                        option.value = value.idspesialis;
                        option.text = value.nama_spesialis;
                        spesialis.add(option);
                    });
                } else {
                    console.warn("data tidak ada");
                }
            }
        };
        xhr.send();
    }


    bntNew.onclick = function() {
        formStatus.value = "new";
        iddokter.value = "";
        namaDokter.value = "";
        aktif.checked = true;
        fill_spesialis();
        $('#ModalDokter').modal('show');
    };

    //TAMPILKAN DATA DOKTER PADA MODAL
    function showDetail(id) {
        $.ajax({
            type: "GET",
            url: base_url + "dokter/get_detail_dokter/" + id,
            success: function(data) {
                // fill_spesialis();
                let dokter = JSON.parse(data);
                formStatus.value = "edit";
                iddokter.value = dokter.iddokter;
                namaDokter.value = dokter.nama_dokter;
                spesialis.value = dokter.spesialis
                console.log(dokter.aktif);
                //isi status checkbox aktif
                if (dokter.aktif == true) {
                    aktif.checked = true;
                } else {
                    aktif.checked = false;
                }
                console.log(dokter.aktif)
            },
        });
        $('#ModalDokter').modal('show');
    }


    
    // SIMPAN DATA DOKTER BARU DAN UPDATE
    $('#button_simpan').click(function() {
        if (namaDokter.value == "" || namaDokter.value.length < 4) {
            alert("Nama tidak boleh kosong atau terlalu pendek");
            namaDokter.focus();
            return false;
        }
        switch (formStatus.value) {
            case 'new':
                $.ajax({
                    type: "POST",
                    url: base_url + "dokter/add_dokter",
                    data: {
                        "namaDokter": namaDokter.value,
                        "spesialis": spesialis.value,
                        "aktif": aktif.checked
                    },
                    success: function(data) {
                        console.log(data);
                        window.location.reload();
                    },
                });
                break;
            case 'edit':
                $.ajax({
                    type: "POST",
                    url: base_url + "dokter/update_dokter/" + iddokter.value,
                    data: {
                        "namaDokter": namaDokter.value,
                        "spesialis": spesialis.value,
                        "aktif": aktif.checked
                    },
                    success: function(data) {
                        console.log(data);
                        window.location.reload();
                    }
                });
                break;
            default:
                // code block
        }
    });
</script>