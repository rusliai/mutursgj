<style>
    .angka_indikator:hover {
        background-color: red;
        color: white;
    }
    .angka_indikator {
        font-weight: bold;
        text-align: center;
    }
    .warna_numerator {
        color: #007bff;
    }
    .warna_denominator {
        color: #139159;
    }
    .header-table {
        vertical-align: middle;
        text-align: center;
    }
    .standar {
        font-size: 1rem;
        font-weight: bolder;
        color: #007bff;
    }
    .total_normal {
        font-size: 1rem;
        font-weight: bolder;
        color: #139159;
    }
    .total_losttarget {
        font-weight: bold;
        font-size: 1rem;
        color: red;
    }
    .total_undefined {
        font-size: 1rem;
        font-weight: bolder;
        color: #404040;
    }
    .swal-wide {
        width: 20em !important;
    }
    .analisaDeskripsi {
        border: 1px solid #a6a6a9;
        padding: 12px;
    }
</style>
<div class="row">
    <?php
    // var_dump($_SESSION)
    ?>
</div>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Indikator Harian</button>
        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Indikator Bulanan</button>
        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Analisa dan Tindak Lanjut</button>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <?php
        $month = date('m');
        $year = date('Y');
        $jumlahhari  = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        ?>
        <div class="row mt-1">
            <div class="col-md-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-2">
                    <div class="card-header bg-gradient-primary">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="m-0 font-weight-bold text-white">TABEL RIWAYAT PENGISIAN MUTU HARIAN</h5> &nbsp; &nbsp;
                                    <div class="form-group row">
                                        <input type="date" id="cariTanggal" name="cariTanggal" class="form-control form-control-sm col-md-2" value="<?php echo date('Y-m-d') ?>"> &nbsp; &nbsp;
                                        <button id="btnCariTanggal" type="button" onclick=getListTanggal() class=" btn btn-primary btn-sm mr-2"><i class="fas fa-search"></i></button>
                                        <button type="button" onclick="newFormIndikator('')" class="btn btn-sm btn-success">
                                            INPUT MUTU
                                        </button>
                                        <input type="text" id="genNamaDokter" name="genNamaDokter" class="form-control ml-5 form-control-sm col-sm-2" placeholder="Dokter / Bagian">
                                        <input type="hidden" id="genIdDokter" name="genIdDokter" class="form-control form-control-sm col-sm-2">
                                        <button type="button" onclick="generate('')" class=" btn btn-danger btn-sm">
                                            Buat daftar Indikator otomatis
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover" id="tabelIndikatorMutu" style="font-family: arial;font-size: 12px;">
                                <thead>
                                    <tr class="m-0 font-weight-bold text-success">
                                        <td>No.</td>
                                        <td>Tanggal</td>
                                        <td>Dokter/Bagian</td>
                                        <td>Indikator</td>
                                        <td>Jumlah Numerator</td>
                                        <td>Jumlah Denominator</td>
                                        <td>Pencapaian(%)</td>
                                        <td>Standar(%)</td>
                                        <td>Keterangan Standar</td>
                                        <td>ACT</td>
                                    </tr>
                                </thead>
                                <tbody id="detailTabelIndikatorMutu">
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <!-- Rekap tabel 1 bulan -->
        <div class="row mt-1">
            <div class="col-md-12">
                <!-- Basic Card Example -->
                <div class="card card-sm shadow mb-2">
                    <div class="card-header bg-gradient-primary">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row m-1">
                                        <h5 class="m-0 font-weight-bold text-white">TABEL RIWAYAT PENGISIAN MUTU BULANAN</h5>
                                    </div>
                                </div>
                                <div class="col align-self-end">
                                    <div class="form-group row m-1">
                                        <?php echo input_select_bulan("list_bulan", date('m')) ?>
                                        &nbsp; &nbsp;
                                        <?php echo input_select_tahun("list_tahun", date('Y')) ?>
                                        &nbsp; &nbsp;
                                        <button id="btnTampilRekap" onclick="tampilRekap()" type="button" class=" btn btn-sm btn-primary">
                                            <i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelRekapIndikator" class="table table-sm table-bordered table-hover" style="font-family: arial;font-size: 12px;">
                                <tr>
                                    <th style="vertical-align: middle;text-align: center;" rowspan=2>NO</th>
                                    <th style="vertical-align: middle;text-align: center;" colspan=2 rowspan=2>INDIKATOR</th>
                                    <th style="vertical-align: middle;text-align: center;" rowspan=2>PARAMETER</th>
                                    <th style="vertical-align: middle;text-align: center;" id="colSpanHari" colspan="0">TANGGAL</th>
                                    <th style="vertical-align: middle;text-align: center;" colspan=2 rowspan=2>TOTAL</th>
                                    <th style="vertical-align: middle;text-align: center;" colspan=2 rowspan=2>STANDAR</th>
                                    <th style="vertical-align: middle;text-align: center;" colspan=2 rowspan=2>ACT</th>
                                </tr>
                                <tr id="kolomhari">
                                </tr>
                                <tbody id="dataRekap">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <!-- Rekap tabel 1 bulan -->
        <div class="row mt-1">
            <div class="col-md-12">
                <!-- Basic Card Example -->
                <div class="card card-sm shadow mb-2">
                    <div class="card-header bg-gradient-primary">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row m-1">
                                        <h5 class="m-0 font-weight-bold text-white">TABEL RIWAYAT PENGISIAN MUTU BULANAN</h5>
                                    </div>
                                </div>
                                <div class="col align-self-end">
                                    <div class="form-group row m-1">
                                        <?php echo input_select_bulan("list_bulan_analisa", date('m')) ?>
                                        &nbsp; &nbsp;
                                        <?php echo input_select_tahun("list_tahun_analisa", date('Y')) ?>
                                        &nbsp; &nbsp;
                                        <button id="btnTampilRekap" onclick="getListAnalisa()" type="button" class=" btn btn-sm btn-primary">
                                            <i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="listAnalisa" class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalInputIndikator" tabindex="-1" role="dialog" aria-labelledby="ModalInputIndikatorLabel" aria-hidden="true">
    <div class="modal-dialog   modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class=" modal-header bg-gradient-primary text-white  " style="font-family: arial;font-weight: bolder;font-size: 1em;">
                <h5 class="modal-title">INPUT DATA MUTU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-gradient-light">
                <!-- form isian indikator  -->
                <form id="formInputIndikator">
                    <p class="text-danger" id="pesanError"></p>
                    <div class="form-group row">
                        <input type="hidden" id="statusTrx" disabled>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" id="idTrx" disabled>
                    </div>
                    <div class="form-group row">
                        <label id="labelTanggal" class="col-sm-4 col-form-label">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control form-control-sm col-sm-4">
                    </div>
                    <div class="form-group row">
                        <label id="labelDokter" class="col-sm-4 col-form-label">Dokter</label>
                        <input type="text" id="namaDokter" name="namaDokter" class="form-control form-control-sm col-sm-4" placeholder="Masukan nama dokter">
                        <input type="hidden" id="idDokter" name="idDokter" class="form-control form-control-sm col-sm-2">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label ">Nama Indikator</label>
                        <textarea class="form-control form-control-sm col-sm-7 ui-widget" id="namaIndikator" name="namaIndikator" placeholder="Masukan Indikator" rows="2" required></textarea>
                        <input type="hidden" class="form-control form-control-sm col-sm-2 col-form-label" id="idIndikator" name="idIndikator">
                    </div>
                    <div class="form-group row">
                        <label id="labelNumerator" class="col-sm-4 form-label">---.</label>
                        <input type="number" id="numerator" name="jumlah_numerator" class="form-control form-control-sm col-sm-1">
                    </div>
                    <div class="form-group row">
                        <label id="labelDenominator" class="col-sm-4 form-label">---</label>
                        <input type="number" id="denominator" name="jumlah_denominator" class="form-control form-control-sm col-sm-1">
                    </div>
                </form>
                <div class="form-group row">
                    <label class="col-sm-4 form-label"></label>
                    <button onclick="saveIndikator()" class="btn btn-lg  btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Analsa dan tidak lajut -->
<div class="modal fade" id="ModalInputAnalisa" tabindex="-1" role="dialog" aria-labelledby="ModalAnalisaLabel" aria-hidden="true">
    <div class="modal-dialog   modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class=" modal-header bg-gradient-success text-white  " style="font-family: arial;font-weight: bolder;font-size: 1em;">
                <h5 class="modal-title">Analisa dan Tindak Lanjut</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-gradient-light">
                <div class="analisaDeskripsi">
                    <table>
                        <tr>
                            <td>Indikator</td><td>:</td><td> <div id='judulAnalisa'></div></td> </tr>
                        <tr><td>Numerator</td><td>:</td><td> <div id='analisaNumerator'></div> </td></tr>
                        <tr><td>Denominator</td><td>:</td><td>   <div id='analisaDenominator'></td></div> </tr>
                        <tr><td>Standar</td><td>:</td> <td> <div id='analisaStandar'></div> </td></tr>
                        <tr><td>Pencapaian</td><td>:</td><td>  <div id='analisaCapaian'></div></td></tr>
                    </table>

                </div>
                <!-- form isian analisa  -->
                <form id="formInputAnalisa">
                    <div class="form-group ">
                        <input type="hidden" id="statusTrxAnalisa" placeholder="status"disabled>
                    </div>
                    <div class="form-group ">
                        <input type="hidden" id="idTrxAnalisa"  placeholder="idtrx" disabled>
                    </div>
                    <div class="form-group ">
                        <input type="hidden" id="idIndikatorAnalisa" placeholder="id indikator"disabled>
                    </div>
                    <div class="form-group ">
                        <input type="hidden" id="idDokterAnalisa"  placeholder="id dokter" disabled>
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label ">Analisa</label>
                        <textarea class="form-control form-control-sm ui-widget" id="uraianAnalisa" name="uraianAnalisa" placeholder="Uraian Analisa" rows="5" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label ">Tindak Lanjut</label>
                        <textarea class="form-control form-control-sm ui-widget" id="uralainTl" name="uralainTl" placeholder="Uraian Tindak Lanjut Indikator" rows="5" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label ">Catatan</label>
                        <input type="text" class="form-control form-control-sm ui-widget" id="ketAnalisa" name="ketAnalisa" placeholder="Catatan tambahan">
                    </div>
                </form>
                <div class="form-group ">
                    <label class="form-label"></label>
                    <button onclick="saveAnalisa()" class="btn btn-lg  btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="printArea" style="display: none;">
</div>
<div id="preview" style="display: none;">
</div>
<script>
    var base_url = "<?php echo base_url() ?>";
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    const formIndikator = document.getElementById('formInputIndikator');
    const detailTabelIndikatorMutu = document.getElementById('detailTabelIndikatorMutu');
    const btnCariTanggal = document.getElementById('btnCariTanggal');
    let pesanError = document.getElementById('pesanError');
    let statusTrx = document.getElementById('idTrx');
    let idTrx = document.getElementById('idTrx');
    let tanggal = document.getElementById('tanggal');
    let idDokter = document.getElementById('idDokter');
    let namaDokter = document.getElementById('namaDokter');
    let genIdDokter = document.getElementById('genIdDokter');
    let genNamaDokter = document.getElementById('genNamaDokter');
    let idIndikator = document.getElementById('idIndikator');
    let namaIndikator = document.getElementById('namaIndikator');
    let labelNumerator = document.getElementById('labelNumerator');
    let labelDenominator = document.getElementById('labelDenominator');
    let numerator = document.getElementById('numerator');
    let denominator = document.getElementById('denominator');
    const tabelRekapIndikator = document.getElementById('tabelRekapIndikator');
    const dataRekap = document.getElementById('dataRekap');
    const btnTampilRekap = document.getElementById('btnTampilRekap');
    const inputBulan = document.getElementById('list_bulan');
    const inputTahun = document.getElementById('list_tahun');
    const colSpanHari = document.getElementById('colSpanHari');
    //Analisa
    const listAnalisa = document.getElementById('listAnalisa');
    const inputBulanAnalisa = document.getElementById('list_bulan_analisa');
    const inputTahunAnalisa = document.getElementById('list_tahun_analisa');
    const statusTrxAnalisa = document.getElementById('statusTrxAnalisa');
    const idTrxAnalisa = document.getElementById('idTrxAnalisa');
    const idIndikatorAnalisa = document.getElementById('idIndikatorAnalisa');
    const idDokterAnalisa = document.getElementById('idDokterAnalisa');
    const judulAnalisa = document.getElementById('judulAnalisa');
    const analisaNumerator = document.getElementById('analisaNumerator');
    const analisaDenominator = document.getElementById('analisaDenominator');
    const analisaStandar = document.getElementById('analisaStandar');
    const analisaCapaian = document.getElementById('analisaCapaian');
    const uraianAnalisa = document.getElementById('uraianAnalisa');
    const uralainTl = document.getElementById('uralainTl');
    const ketAnalisa = document.getElementById('ketAnalisa');
    //laporan 
    var preview = document.getElementById('preview');
    var printHeader = document.getElementById('printHeader');
    var printArea = document.getElementById('printArea');
    var printFooter = document.getElementById('printFooter');
    document.addEventListener("DOMContentLoaded", () => {
        getListTanggal();
        setTimeout(tampilRekap, 1000);
        $("#namaIndikator").autocomplete({
            source: function(request, response) {
                jQuery.get(base_url + "indikator/cariIndikatorunit/", {
                    param: $("#namaIndikator").val(),
                }, function(data) {
                    pesanError.innerHTML = "";
                    if ($.trim(data) == null || $.trim(data) == undefined || $.trim(data) == "") {
                        pesanError.innerHTML = "Indikator tidak ditemukan!. silahkan lakukan pencarian kembali";
                        return false;
                    } else {
                        response($.map(JSON.parse(data), function(item) {
                            return {
                                label: item.nama_indikator,
                                value: item.idindikator,
                                numerator: item.numerator,
                                denominator: item.denominator
                            }
                        }));
                    }
                });
            },
            select: function(event, ui) {
                namaIndikator.value = ui.item.label;
                idIndikator.value = ui.item.value;
                labelNumerator.innerHTML = ui.item.numerator;
                labelDenominator.innerHTML = ui.item.denominator;
                return false;
            },
            minLength: 3,
        });
        $("#namaIndikator").autocomplete("option", "appendTo", "#formInputIndikator");
        $("#namaDokter").autocomplete({
            source: function(request, response) {
                jQuery.get(base_url + "dokter/cariDokter/", {
                    param: $("#namaDokter").val()
                }, function(data) {
                    pesanError.innerHTML = "";
                    if ($.trim(data) == null || $.trim(data) == undefined || $.trim(data) == "") {
                        pesanError.innerHTML = "Dokter tidak ditemukan!. silahkan lakukan pencarian kembali";
                        return false;
                    } else {
                        response($.map(JSON.parse(data), function(item) {
                            return {
                                label: item.nama_dokter,
                                value: item.iddokter,
                            }
                        }));
                    }
                });
            },
            select: function(event, ui) {
                namaDokter.value = ui.item.label;
                idDokter.value = ui.item.value;
                return false;
            },
            minLength: 3,
        })
        $("#namaDokter").autocomplete("option", "appendTo", "#formInputIndikator");
        namaDokter.addEventListener("keyup", (event) => {
            if (namaDokter.value == '') {
                idDokter.value = '';
            }
        });
        $("#genNamaDokter").autocomplete({
            source: function(request, response) {
                jQuery.get(base_url + "dokter/cariDokter/", {
                    param: $("#genNamaDokter").val()
                }, function(data) {
                    pesanError.innerHTML = "";
                    if ($.trim(data) == null || $.trim(data) == undefined || $.trim(data) == "") {
                        pesanError.innerHTML = "Dokter tidak ditemukan!. silahkan lakukan pencarian kembali";
                        return false;
                    } else {
                        response($.map(JSON.parse(data), function(item) {
                            return {
                                label: item.nama_dokter,
                                value: item.iddokter,
                            }
                        }));
                    }
                });
            },
            select: function(event, ui) {
                genNamaDokter.value = ui.item.label;
                genIdDokter.value = ui.item.value;
                return false;
            },
            minLength: 3,
        })
        $("#genNamaDokter").autocomplete("option", "appendTo");
        genNamaDokter.addEventListener("keyup", (event) => {
            if (genNamaDokter.value == '') {
                genIdDokter.value = '';
            }
        });
    });
    var getDaysInMonth = function(month, year) {
        return new Date(year, month, 0).getDate();
    };
    function getRekapDetail(data) {
        let source = data.dataset;
        if (source.idtrans != "") {
            getDetailIndikator(source.idtrans);
        } else {
            statusTrx.value = '';
            tanggal.value = source.tanggal;
            idTrx.value = '';
            idIndikator.value = source.idindikator;
            namaIndikator.value = source.namaindikator;
            idDokter.value = source.iddokter;
            namaDokter.value = source.namadokter;
            labelDenominator.innerHTML = source.labeldenominator;
            labelNumerator.innerHTML = source.labelnumerator;
            numerator.value = 0;
            denominator.value = 0;
            $('#ModalInputIndikator').modal('show');
        }
    }
    function newFormIndikator(data) {
        statusTrx.value = '';
        tanggal.value = yyyy + '-' + mm + '-' + dd;
        idTrx.value = '';
        idIndikator.value = '';
        namaIndikator.value = '';
        idDokter.value = '';
        namaDokter.value = '';
        labelDenominator.innerHTML = '';
        labelNumerator.innerHTML = '';
        numerator.value = 0;
        denominator.value = 0;
        $('#ModalInputIndikator').modal('show');
    }
    function newFormAnalisa(data) {
        let dataIndikator = data.dataset;

      
        //cek dulu inputan analisa sudah ada atau belum
        idIndikatorAnalisa.value = dataIndikator.idindikator;
        idDokterAnalisa.value = dataIndikator.iddokter;

        //Kolom Rangkumana Indikator 

        judulAnalisa.innerHTML = `${dataIndikator.namaindikator} - ${dataIndikator.namadokter}`;
        analisaNumerator.innerHTML = `${dataIndikator.labelnumerator} ${dataIndikator.total_numerator}`;
        analisaDenominator.innerHTML = `${dataIndikator.labeldenominator} ${dataIndikator.total_denominator}`;
        analisaStandar.innerHTML = `${dataIndikator.standar}`;
        analisaCapaian.innerHTML = `${dataIndikator.persen}`;

       
        if (!dataIndikator.idanalisa=="") {
            statusTrxAnalisa.value = 'update'
            idTrxAnalisa.value = dataIndikator.idanalisa;
            uraianAnalisa.value =dataIndikator.uraian_analisa;

            uralainTl.value = dataIndikator.uraian_tindak_lanjut;
            ketAnalisa.value =dataIndikator.keterangan;

        } else {
            statusTrxAnalisa.value = 'add'
            idTrxAnalisa.value = '';
            uraianAnalisa.value = '';
            uralainTl.value = '';
            ketAnalisa.value = '';
        }
        $('#ModalInputAnalisa').modal('show');
    }
    function saveIndikator() {
        if (idTrx.value == "" || idTrx.value == undefined) {
            xhr.open("POST", base_url + "input_indikator/add_indikator_mutu/", true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            var data = {
                tanggal: tanggal.value,
                iddokter: idDokter.value,
                idindikator: idIndikator.value,
                numerator: numerator.value,
                denominator: denominator.value
            };
            xhr.send(JSON.stringify(data));
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil disimpan',
                customClass: 'swal-wide',
                showConfirmButton: false,
                timer: 1500
            })
            $('#ModalInputIndikator').modal('toggle');
            getListTanggal();
            setTimeout(tampilRekap, 1000);
        } else {
            xhr.open("POST", base_url + "input_indikator/update_indikator_mutu/" + idTrx.value, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            var data = {
                tanggal: tanggal.value,
                iddokter: idDokter.value,
                idindikator: idIndikator.value,
                numerator: numerator.value,
                denominator: denominator.value
            };
            xhr.send(JSON.stringify(data));
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil disimpan',
                customClass: 'swal-wide',
                showConfirmButton: false,
                timer: 1500
            })
            $('#ModalInputIndikator').modal('toggle');
            getListTanggal();
            setTimeout(tampilRekap, 1000);
        }
    }
    function saveAnalisa() {
        if (idTrxAnalisa.value == "" || idTrxAnalisa.value == undefined) {
            xhr.open("POST", base_url + "input_indikator/add_analisa", true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            var data = {
                idindikator: idIndikatorAnalisa.value,
                iddokter: idDokterAnalisa.value,
                bulan: list_bulan.value,
                tahun: list_tahun.value,
                analisa: uraianAnalisa.value,
                tindak_lanjut: uralainTl.value,
                keterangan: ketAnalisa.value,
            };
            xhr.send(JSON.stringify(data));
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil disimpan',
                customClass: 'swal-wide',
                showConfirmButton: false,
                timer: 1500
            })
            tampilRekap() 
        } else {
            xhr.open("POST", base_url + "input_indikator/update_analisa/" + idTrxAnalisa.value, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            var data = {
                idindikator: idIndikatorAnalisa.value,
                iddokter: idDokterAnalisa.value,
                bulan: list_bulan.value,
                tahun: list_tahun.value,
                analisa: uraianAnalisa.value,
                tindak_lanjut: uralainTl.value,
                keterangan: ketAnalisa.value,
            };
            xhr.send(JSON.stringify(data));
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil disimpan',
                customClass: 'swal-wide',
                showConfirmButton: false,
                timer: 1500
            })
            tampilRekap() 
        }
        $('#ModalInputAnalisa').modal('toggle');
       
    }
    function getDetailIndikator(idtrx) {
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "input_indikator/get_detail_indikator_mutu/" + idtrx)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                let data = JSON.parse(xhr.responseText);
                idTrx.value = data.idtrx;
                tanggal.value = data.tanggal;
                idIndikator.value = data.idindikator;
                idDokter.value = data.iddokter;
                namaIndikator.value = data.nama_indikator;
                namaDokter.value = data.nama_dokter;
                labelNumerator.innerHTML = data.numerator;
                labelDenominator.innerHTML = data.denominator;
                numerator.value = data.jumlah_numerator;
                denominator.value = data.jumlah_denominator;
                $('#ModalInputIndikator').modal('show');
            }
        }
    }
    function tampilRekap() {
        let param = `tahun=${inputTahun.value}&bulan=${inputBulan.value}`;
        let hari = getDaysInMonth(inputBulan.value, inputTahun.value);
        let kolomhari = document.getElementById('kolomhari');
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "input_indikator/getRekap?" + param)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);


                let dataHtml = "";
                let dataHtmlKolom = "";
                //looping header 
                for (x = 1; x <= hari; x++) {
                    dataHtmlKolom += `<th style="font-size: 0.8rem;width: 30px;text-align: center;">${x}</th>`;
                }
                kolomhari.innerHTML = dataHtmlKolom;
                colSpanHari.setAttribute("colspan", hari);
                data.forEach(function(value, index) {
                    dataHtml += `  <tr>
                                            <td rowspan=3>${index+1}</td>
                                            <td rowspan=3 class="m-0 font-weight-bold text-primary" >${value.nama_indikator.toUpperCase()} <br><small>${value.nama_dokter}<small> </td>
                                            <td>Numerator</td>
                                            <td class="m-0 font-weight-bold text-primary">${value.numerator}</td>`
                    //ini looping numerator
                    for (x = 1; x <= hari; x++) {
                        let out = "-";
                        let idtrans = "";
                        value.detail.forEach(function callback(val, ind) {
                            const date = new Date(val.tanggal);
                            const date_num = date.getDate();
                            if (x == date_num) {
                                out = val.numerator;
                                idtrans = val.idTrx;
                            }
                            // if (x == date_num) {
                            //     out = val.numerator;
                            //     idtrans = val.idTrx;
                            // }
                        })
                        dataHtml += `<td onclick="getRekapDetail(this)" 
                                                        class="angka_indikator warna_numerator"
                                                        data-tanggal='${list_tahun.value+"-"+  list_bulan.value.padStart(2, '0') +"-"+ String(x).padStart(2, '0')}'
                                                        data-idindikator="${value.idindikator}"
                                                        data-namaindikator="${value.nama_indikator}"
                                                        data-iddokter="${value.iddokter}"
                                                        data-namadokter="${value.nama_dokter}"
                                                        data-labelNumerator="${value.numerator}"
                                                        data-labelDenominator="${value.denominator}"
                                                        data-idtrans="${idtrans}"
                                                        >${out}</td>`;
                    }
                    let persen = 0
                    let warna_indikator = "total_normal";
                    if (parseInt(value.total_denominator) !== 0) {
                        persen = (value.total_numerator / value.total_denominator) * 100;
                        persen = parseFloat(persen).toFixed(2);
                    }
                    let simbol = '';
                    switch (value.target_capaian) {
                        case ">":
                            if (parseInt(value.standar) > parseInt(persen)) {
                                warna_indikator = "total_losttarget";
                            }
                            simbol = '&gt;';
                            break;
                        case ">=":
                            if (parseInt(value.standar) >= parseInt(persen)) {
                                warna_indikator = "total_losttarget";
                            }
                            simbol = '&ge;';
                            break;
                        case "<":
                            if (parseInt(value.standar) < parseInt(persen)) {
                                warna_indikator = "total_losttarget";
                            }
                            simbol = '&lt;';
                            break;
                        case "<=":
                            if (parseInt(value.standar) <= parseInt(persen)) {
                                warna_indikator = "total_losttarget";
                            }
                            simbol = '&le;';
                            break;
                        default:
                            warna_indikator = "total_undefined";
                            simbol = '';
                            break;
                    }

                   

                    let idanalisa ='';
                    let titleAnalisa ='Analsia & Tidak lanjut';
                    let buttonAnalisa ='btn-success';

                    if((value.analisa.id_analisa !== undefined) || value.analisa.id_analisa ==""   ){
                        titleAnalisa = "Analisa kembali";
                        buttonAnalisa = "btn-warning";
                        idanalisa = value.analisa.id_analisa;
                    }
                    
                    

                   
                    let analisa = `<button class="btn ${buttonAnalisa} btn-block" 
                                                style= "white-space:normal;" 
                                                onclick ="newFormAnalisa(this)"
                                               
                                               
                                                data-idanalisa="${idanalisa}"
                                                data-uraian_analisa="${value.analisa.uraian_analisa}"
                                                data-uraian_tindak_lanjut="${value.analisa.uraian_tindak_lanjut}"
                                                data-keterangan="${value.analisa.keterangan}"
                                               
                                                data-idindikator="${value.idindikator}"
                                                data-namaindikator="${value.nama_indikator}"
                                                data-iddokter="${value.iddokter}"
                                                data-namadokter="${value.nama_dokter}"
                                                data-labelNumerator="${value.numerator}"
                                                data-labelDenominator="${value.denominator}"
                                                data-total_numerator="${value.total_numerator}"
                                                data-total_denominator="${value.total_denominator}"
                                                data-persen="${persen}"
                                                data-standar="${value.standar}"
                                                >${titleAnalisa}</button>`;


                    dataHtml += `<td rowspan="2" class="angka_indikator warna_numerator"> ${value.total_numerator} </td>
                                      <td rowspan="4" nowrap class="${warna_indikator} " style="text-align: center;vertical-align: middle;"> ${persen}%</td>
                                      <td rowspan="4" nowrap class="standar" style="text-align: center;vertical-align: middle;">${simbol} ${value.standar}% </td>
                                      <td colspan="2" rowspan="4" nowrap class="standar" style="">${analisa}</td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td>Denumerator</td>
                                        <td class="m-0 font-weight-bold text-success">${simbol} ${value.denominator}</td>`;
                    //ini looping denominator
                    for (x = 1; x <= hari; x++) {
                        let out = "-";
                        value.detail.forEach(function callback(val, ind) {
                            const date = new Date(val.tanggal);
                            const date_num = date.getDate();
                            if (x == date_num) {
                                out = val.denominator;
                            }
                        })
                        dataHtml += `<td class="angka_indikator warna_denominator">${out}</td>`;
                    }
                    dataHtml += `
                        <td class="angka_indikator warna_denominator">${value.total_denominator} </td>
                        </tr>
                        <tr>
                        </tr>`;
                });
                dataRekap.innerHTML = dataHtml;
            }
        }
    }
    function getListTanggal() {
        const tgl = cariTanggal.value;
        if (tgl == "" || tgl == undefined) {
            Swal.fire(
                "Tanggal harus ditentukan",
            );
            return false
        }
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "input_indikator/get_indikator_tgl/" + cariTanggal.value)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (!data.status) {
                    // Swal.fire(
                    //     "Data tidak tersedia untuk tanggal : " + cariTanggal.value,
                    // );
                    detailTabelIndikatorMutu.innerHTML = `<h3> Data tidak ditemukan</h3>`;
                    return false;
                } else {
                    let htmlIndikatorHarian = "";
                    data.data_indikator.forEach(function(value, index) {
                        htmlIndikatorHarian += `<tr>
                                    <td>${index+1}</td>
                                    <td>${value.tanggal}</td>
                                    <td class="m-0 font-weight-bold text-primary">${value.nama_dokter}</td>
                                    <td class="m-0 font-weight-bold text-primary"><a href="#" onclick="getDetailIndikator(${value.idtrx})">${value.nama_indikator}</a></td>
                                    <td align="right">${value.jumlah_numerator}</td>
                                    <td align="right">${value.jumlah_denominator}</td>
                                    <td align="right">`;
                        let persen = 0;
                        if (value.jumlah_denominator !== 0) {
                            persen = (value.jumlah_numerator / value.jumlah_denominator) * 100;
                        }
                        htmlIndikatorHarian += `${parseFloat(persen).toFixed(2)} % </td>
                                    <td align="right">${value.standar}</td>
                                    <td >${value.ket_standar}</td>
                                    <td> 
                                    <button class="btn btn-sm btn-danger" onclick="deleteInput(${value.idtrx})"> 
                                             <i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>`;
                    })
                    detailTabelIndikatorMutu.innerHTML = htmlIndikatorHarian;
                }
            }
        }
    }

    function getListAnalisa() {
        let param = `tahun=${inputTahunAnalisa.value}&bulan=${inputBulanAnalisa.value}`;
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "input_indikator/get_listanalisa?" + param)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);


                if (!data.status) {
                    Swal.fire("Belum ada analisa");
                } else {
                    let analisaHTML = `<div class="row">`;
                    data.data_analisa.forEach(function(value, index) {
                        analisaHTML += `
                         <div class="col-md-4 col-sm-12">
                         <div class="card card-sm mt-1 ">
                            <div class="card-header bg-gradient-success text-white">
                                <h5>${value.nama_indikator.toUpperCase()}</h5>
                                <smal>${value.nama_dokter}</smal> <br>
                                <small>Dibuat tanggal : ${value.tgl_dibuat}</small> 
                                <button onClick="fillReport(this,'print')"  
                                    class=" btn btn-warning btn-sm border border-dark"
                                    data-idindikator = "${value.idindikator}"
                                    data-iddokter = "${value.iddokter}"
                                    data-idunit = "${value.idunit}"
                                    data-idtrx = "${value.id_analisa}"
                                > Print
                                <i class="fa fa-print" aria-hidden="true"></i> 
                                </button>
                                <button onClick="fillReport(this,'excel')" 
                                class="btn btn-success btn-sm border border-dark" 
                                    data-idindikator = "${value.idindikator}"
                                    data-iddokter = "${value.iddokter}"
                                    data-idunit = "${value.idunit}"
                                    data-idtrx = "${value.id_analisa}"
                                
                                >MS Excel <i class="fas fa-file-excel"></i></button>
                                <button onClick="fillReport(this,'word')" 
                                class="btn btn-primary btn-sm border border-dark"
                                data-idindikator = "${value.idindikator}"
                                    data-iddokter = "${value.iddokter}"
                                    data-idunit = "${value.idunit}"
                                    data-idtrx = "${value.id_analisa}"

                                >MS Word <i class="far fa-file-word"></i></button>
                            </div>
                            <div class="card-body">
                            <b>Analisa : </b> <p>${value.uraian_analisa.substring(0,50)}...</p>
                            <b>Tindak Lanjut : </b> <p>${value.uraian_tindak_lanjut.substring(0,50)}...</p>
                            </div>
                            </div>
                        </div>`
                    });
                    analisaHTML += '</div>'
                    listAnalisa.innerHTML = analisaHTML;
                }
            }
        }
    }
    function generate() {
        const tgl = cariTanggal.value;
        const iddokter = genIdDokter.value;
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + `input_indikator/add_all_indikator/${tgl}/${iddokter}`)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = xhr.responseText;
                getListTanggal();
            }
        }
    }
    function deleteInput(idtrx) {
        xhr.onreadystatechange = callback;
        xhr.open('POST', base_url + `input_indikator/hapus_indikator_mutu/${idtrx}`)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = xhr.responseText;
                getListTanggal();
            }
        }
    }
    function getData(url, cb) {
        let xhttp = new XMLHttpRequest();
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        // xhttp.onload = function () {
        // 	return cb(this.responseText);
        // }
        xhttp.open("GET", url);
        xhttp.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhttp.onreadystatechange = function() {
            // In local files, status is 0 upon success in Mozilla Firefox
            if (xhttp.readyState === XMLHttpRequest.DONE) {
                var status = xhttp.status;
                if (status === 0 || (status >= 200 && status < 400)) {
                    return cb(xhttp.responseText);
                    // The request has been completed successfully
                    // console.log(xhttp.responseText);
                } else {
                    console.log("Errors...");
                    return cb(false);
                }
            }
        };
        xhttp.withCredentials = false;
        xhttp.send();
    }
    function fillReport(input,tipe) {
        let payload = input.dataset;


        let param = `tahun=${list_tahun_analisa.value}&bulan=${list_bulan_analisa.value}&tipe=perunit&idunit=${payload.idunit}&idindikator=${payload.idindikator}&iddokter=${payload.iddokter}`;
        let hari = getDaysInMonth(list_bulan_analisa.value, list_tahun_analisa.value);
        let htmlTable = '';
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "input_indikator/getRekap?" + param)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                let dataHtmlKolom = "";
                //looping header 
                for (x = 1; x <= hari; x++) {
                    dataHtmlKolom += `<td style="text-align: center;">${x}</td>`;
                }
                // colSpanHari.setAttribute("colspan", hari);
                kolomhari.innerHTML = dataHtmlKolom;
                data.forEach(function(value, index) {


                    htmlTable +=
                        `<table class="table table-sm  table-borderless">
                                        <tr style="height:3cm">
                                        	<td colspan="${4 + hari}">
                                                <div class="row">
                                                <div class="col-2">
                                                    <img src="<?php echo base_url() ?>assets/img/logo.png" width="70" height="70" />
                                                </div>
                                                <div class="col-8">
                                                    <h3>FORM MONITORING ${ value.nama_indikator.toUpperCase()}</h3> 
                                                    <h5>${ value.nama_dokter.toUpperCase()}</h5> 
                                                        <span>
                                                          Unit / Ruang :   ${value.nama_unit}
                                                        </span><br>
                                                        <span>
                                                          Periode :   ${ list_bulan_analisa.options[list_bulan_analisa.selectedIndex].text   + " " + list_tahun_analisa.value}
                                                        </span>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                           
                                        <tr class="border-detail">
                                                <td rowspan="2" style="font-weight: bolder;">No</td>
                                                <td rowspan="2"  style="font-weight: bolder;width: 22%;">Parameter</td>
                                                <td colspan="${hari}" style="font-weight: bolder;">Tanggal</td>
                                                <td rowspan="2" style="font-weight: bolder;">Total</td>
                                                <td rowspan="2" style="font-weight: bolder;">%</td>
                                        </tr>`;
                    htmlTable += `<tr class="border-detail">${kolomhari.innerHTML }</tr>`;
                    htmlTable += `<tr class="border-detail">
                                    <td style="font-weight: bolder;">1</td>
                                    <td style="font-weight: bolder;">${value.numerator}</td>`;
                    //looping  numerator
                    for (x = 1; x <= hari; x++) {
                        let out = "-";
                        let idtrans = "";
                        value.detail.forEach(function callback(val, ind) {
                            const date = new Date(val.tanggal);
                            const date_num = date.getDate();
                            if (x == date_num) {
                                out = val.numerator;
                            }
                            if (x == date_num) {
                                out = val.numerator;
                            }
                        })
                        htmlTable += `<td>${out}</td> 
                                       `;
                    }
                    htmlTable += ` <td>${value.total_numerator}</td>
                                    <td rowspan="2">${parseFloat(value.pencapaian).toFixed(2)} %</td>
                                    </tr>
                                    <tr class="border-detail">`;
                    htmlTable += `<td style="font-weight: bolder;">2</td>
                                  <td style="font-weight: bolder;">${value.denominator}</td>`;
                    for (x = 1; x <= hari; x++) {
                        let out = "-";
                        let idtrans = "";
                        value.detail.forEach(function callback(val, ind) {
                            const date = new Date(val.tanggal);
                            const date_num = date.getDate();
                            if (x == date_num) {
                                out = val.denominator;
                            }
                        })
                        htmlTable += `<td>${out}</td> `;
                    }
                    htmlTable += `
                                    <td>${value.total_denominator}</td>
                            </tr>

                            <tr>
                                <td colspan="${4 + hari}" style="height:1cm">
                               
                                </td>
                            </tr>
                            <tr>
                                <td colspan="${4 + hari}" style="height:1cm">
                                <b>Analisa :  </b> <p>${value.analisa.uraian_analisa}</p>
                                <b>Tindak Lanjut :  </b> <p>${value.analisa.uraian_tindak_lanjut}</p>
                                <small>Tanggal dibuat: ${value.analisa.tgl_dibuat}  </small> / 
                                <small>Tanggal Diperbaharui : ${value.analisa.tgl_update}  </small>
                               
                                </td>
                            </tr>
                            <tr>
                                <td colspan="${4 + hari}" style="height:5mm">
                               <hr>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="${4 + hari}">
                            
                                    <div class="row">
                                        <div class="col">
                                        <span> <i> Tanggal Cetak : ${new Date().toLocaleDateString('id-ID',{year: 'numeric', month: 'long', day: 'numeric'})}</i></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                        <span>Kepala Bidang ${value.nama_bidang}</span> 
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span> <b> ${value.ka_bidang} </b></span>
                                        </div>
                                        <div class="col-4">
                                        <span>Koordinator  ${value.nama_unit} </span> 
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span>  <b>  ${value.kepala_ruangan} </b>  </span>
                                        </div>
                                        <div class="col-4">
                                        <span>PJ Mutu  ${value.nama_unit}</span> 
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span> <b><?php echo $_SESSION['user_nama'] ?> <b> </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>`;
                });
            }
            printArea.innerHTML = htmlTable;
        }


                switch(tipe){
                    case 'print' : 
                        setTimeout(function() {
                            printLaporan()
                        }, 100);
                    break;
                    case 'excel' : 
                        setTimeout(function() {
                            exportExcel()
                        }, 100);
                        break;
                        case 'word' : 
                        setTimeout(function() {
                            downloadInnerHtml()
                        }, 100);


                }
                        

    }


    function printLaporan() {
        const style_laporan = `<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
                            <style>
                                    @page {
                                    size: A4 landscape;
                                    }
                                    .border-detail > td {
                                        border: 1px solid black;
                                    }
                            </style>    
                            `;
        var frame1 = document.createElement('iframe');
        frame1.name = "frame1";
        frame1.style.position = "revert";
        frame1.style.minWidth = "100%";
        frame1.style.height = "500px";
        frame1.style.border = "1";
        preview.appendChild(frame1);
        var frameDoc = (frame1.contentWindow) ? frame1.contentWindow : (frame1.contentDocument.document) ? frame1.contentDocument.document : frame1.contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><head>');
        frameDoc.document.write(style_laporan);
        frameDoc.document.write('</head><body>');
        frameDoc.document.write(printArea.innerHTML);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            preview.removeChild(frame1);
        }, 500);
        return false;
    }

    function exportExcel() {
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('printArea');
        var table_html = table_div.innerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = 'download.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
    }

    function downloadInnerHtml() {
        var elHtml = document.getElementById('printArea').innerHTML;
        var link = document.createElement('a');
        link.setAttribute('download', 'tags.doc');   
        link.setAttribute('href', 'data:' + 'text/doc' + ';charset=utf-8,' + encodeURIComponent(elHtml));
        link.click(); 
        }

        

        
</script>