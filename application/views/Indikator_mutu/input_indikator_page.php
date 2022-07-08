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

    .standar{
        
        font-size: 1rem;
        font-weight: bolder;
        color: #007bff;
    }    
    .total_normal{
   
    font-size: 1rem;
    font-weight: bolder;
    color: #139159;
}


    .total_losttarget{
       
        font-weight: bold;
        font-size: 1rem;
        color: red;
    }
    .total_undefined{
    font-size: 1rem;
    font-weight: bolder;
    color: #404040;
    }

</style>
<div class="row">
    <?php   
    // var_dump($_SESSION)
    ?>
</div>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tasks Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .tanda {
        border: solid red 1px;
    }
</style>
<?php
$month = date('m');
$year = date('Y');
$jumlahhari  = cal_days_in_month(CAL_GREGORIAN, $month, $year);
?>
<div class="row">
    <div class="col-md-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-gradient-primary">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col ">
                            <div class="form-group row m-3">
                                <h4 class="m-0 font-weight-bold text-white">TABEL RIWAYAT PENGISIAN MUTU HARIAN</h4> &nbsp; &nbsp;
                                <input type="date" id="cariTanggal" name="cariTanggal" class="form-control col-sm-2" value="<?php echo date('Y-m-d') ?>"> &nbsp; &nbsp;
                                <button id="btnCariTanggal" type="button" onclick=getListTanggal() class=" btn btn-primary">Cari berdasarkan tanggal</button>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group row m-3">
                                <button type="button" onclick="newFormIndikator('')" class="btn btn-success">
                                    INPUT MUTU
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
                                <td>Dokter</td>
                                <td>Indikator</td>
                                <td>Jumlah Numerator</td>
                                <td>Jumlah Denominator</td>
                                <td>Persentase</td>
                                <td>Standar</td>
                            </tr>
                        </thead>
                        <tbody id="detailTabelIndikatorMutu">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rekap tabel 1 bulan -->
<div class="row">
    <div class="col-md-12">
        <!-- Basic Card Example -->
        <div class="card card-sm shadow mb-4">
            <div class="card-header bg-gradient-primary">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 ">
                            <div class="form-group row m-3">
                                <h4 class="m-0 font-weight-bold text-white">TABEL RIWAYAT PENGISIAN MUTU BULANAN</h4>

                            </div>
                        </div>
                        <div class="col-md-4 align-self-end">
                            <div class="form-group row m-3">
                                <?php echo input_select_bulan("list_bulan", date('m')) ?>
                                &nbsp; &nbsp;
                                <?php echo input_select_tahun("list_tahun", date('Y')) ?>
                                &nbsp; &nbsp;
                                <button id="btnTampilRekap" onclick="tampilRekap()" type="button" class=" btn btn-sm btn-primary"><span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span> Refresh</button>
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
<div class=" col-md-4">
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
                    <form id="formInputIndikator" onsubmit="saveIndikator()">
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
                        <div class="form-group row">
                            <label class="col-sm-4 form-label"></label>
                            <button type="submit" class="btn btn-lg  btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
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
        let idIndikator = document.getElementById('idIndikator');
        let namaIndikator = document.getElementById('namaIndikator');
        let labelNumerator = document.getElementById('labelNumerator');
        let labelDenominator = document.getElementById('labelDenominator');
        let numerator = document.getElementById('numerator');
        let denominator = document.getElementById('denominator');
        const dataRekap = document.getElementById('dataRekap');
        const btnTampilRekap = document.getElementById('btnTampilRekap');
        const inputBulan = document.getElementById('list_bulan');
        const inputTahun = document.getElementById('list_tahun');
        const colSpanHari = document.getElementById('colSpanHari');




        document.addEventListener("DOMContentLoaded", () => {
            getListTanggal();

            setTimeout(tampilRekap, 1000);


            $("#namaIndikator").autocomplete({
                source: function(request, response) {
                    jQuery.get(base_url + "indikator/cariIndikator/", {
                        param: $("#namaIndikator").val()
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

        });



        var getDaysInMonth = function(month, year) {
            return new Date(year, month, 0).getDate();
        };

        function getRekapDetail(data) {
            let source = data.dataset;

            console.log(source);


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
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                );
                window.setTimeout(function() {
                    location.reload()
                }, 2000)
            } else {
                console.log("update");
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
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                );
            }
            window.setTimeout(function() {
                location.reload()
            }, 2000)
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
                    console.log(data);


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


                        switch (value.target_capaian) {
                            case ">":
                                if (parseInt(value.standar) > parseInt(persen)) {
                                    warna_indikator = "total_losttarget";
                                }
                                break;
                            case "<":
                                if (parseInt(value.standar) < parseInt(persen)) {
                                    warna_indikator = "total_losttarget";
                                }
                                break;

                            default:
                                warna_indikator = "total_ubndefined";
                                break;
                        }


                        dataHtml += `<td rowspan="2" class="angka_indikator warna_numerator"> ${value.total_numerator} </td>
                                      <td rowspan="4" nowrap class="${warna_indikator} " style="text-align: center;vertical-align: middle;"> ${persen}%</td>
                                      <td rowspan="4" nowrap class="standar" style="text-align: center;vertical-align: middle;">${value.target_capaian + value.standar}% </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td>Denumerator</td>
                                        <td class="m-0 font-weight-bold text-success">${value.denominator}</td>`;
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
            xhr.open('GET', base_url + "input_indikator/get_dindikator_tgl/" + cariTanggal.value)
            xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
            xhr.send();

            function callback() {
                if (xhr.readyState == 4) {
                    const data = JSON.parse(xhr.responseText);
                    if (!data.status) {
                        Swal.fire(
                            "Data tidak tersedia untuk tanggal : " + cariTanggal.value,
                        );
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
                                    <td align="right">${value.standar} %</td>
                                </tr>`;
                        })
                        detailTabelIndikatorMutu.innerHTML = htmlIndikatorHarian;
                    }
                }
            }
        }
    </script>