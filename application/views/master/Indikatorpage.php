<?php //var_dump($data_indikator)
?>
<div class="card card-danger shadow mb-4">
    <div class="card-header py-3 bg-primary">
        <div class="row">
            <div class="col">
                <h4 class="m-0 font-weight-bold text-white"><?php echo $judul ?></h4>
            </div>
            <div class="col">
                <div class="float-right">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" id="bntNew" data-target="#ModalIndikator">
                        Tambah Indikator
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm table-striped" id="tableIndikator" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Indikator</th>
                        <th>Nama Indikator</th>
                        <th>Numerator</th>
                        <th>Denominator</th>
                        <th>Aktif</th>
                        <th>ACT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_indikator as $value) { ?>
                        <tr>
                            <td><?php echo $value['idindikator'] ?></td>
                            <td> <a href="#" data-id="<?php echo  $value['idindikator']  ?>" onclick="showDetail(this)" data-toggle="modal" data-target="#ModalIndikator"><?php echo $value['nama_indikator'] ?></a></td>
                            <td><?php echo $value['numerator'] ?></td>
                            <td><?php echo $value['denominator'] ?></td>
                            <td><?php
                                $button = "";

                                if ($value['aktif'] == '1') {
                                    $button = '<button  onclick="setAktif(this)" data-id="' . $value['idindikator'] . '"   data-status="false" class="btn btn-sm btn-danger"><i class="far fa-eye-slash"></i></button>';
                                } else {
                                    $button = '<button onclick="setAktif(this)"  data-id="' . $value['idindikator'] . '"   data-status="true" class="btn btn-sm btn-success"><i class="far fa-eye"></i></button>';
                                }

                                echo $button;


                                ?></td>
                            <td>
                                <div data-id="<?php echo  $value['idindikator']  ?>" onclick="showDetail(this)" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#ModalIndikator" id="btnEdit">Edit</div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalIndikator" tabindex="-1" role="dialog" aria-labelledby="ModalIndikatorLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="ModalIndikatorLabel">Input Data Indikator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-gradient-light">
                <form>
                    <input style="width: 5rem;" type="hidden" class=" form-control form-control-sm" id="formStatus" value="new" disabled>
                    <div class="form-group">
                        <label for="Name">ID INDIKATOR</label>
                        <input style="width: 10rem;" type="text" class="form-control form-control-sm" id="idIndikator" placeholder="Automatic" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama Indikator</label>
                        <textarea class="form-control form-control-sm" id="nama_indikator" placeholder="Nama Indikator " rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Name">numerator</label>
                        <textarea class="form-control form-control-sm" id="numerator" placeholder="numerator " rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Name">Denominator</label>
                        <textarea class="form-control form-control-sm" id="denominator" placeholder="Denominator " rows="3"></textarea>
                    </div>
                    <div class="form-group ">
                    <label for="Standar">Standar Mutu</label>
                    
                    </div>
                    
                    <div class="form-group row mx-md-1">
                        <label for="Standar"> Angka % : &nbsp;</label>
                        <input type="number" class="form-control form-control-sm col-md-3" id="standar">
                        &nbsp; &nbsp;<label for="Standar">Keterangan : &nbsp;</label>
                        <input type="text" class="form-control form-control-sm col" id="ket_standar" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="jenisCapaian">Jenis Capaian</label>
                        <select class="form-control form-control-sm" name="jenisCapaian" id="jenisCapaian">
                            <option value="">--pilih jenis capaian--</option>
                            <option value=">">Lebih besar dari Standar</option>
                            <option value="<">Lebih kecil dari Standar</option>
                            <option value=">=">Lebih besar sama dengan Standar</option>
                            <option value="<=">Lebih kecil sama dengan Standar</option>
                        </select>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="check_id"> Aktif / Non Aktif
                        </label>
                    </div>
                </form>
                <button id="button_simpan" onclick="simpan()" class="btn btn-sm btn-danger">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
<script>
    var url = "<?php echo base_url(); ?>";
    let idindikator = $('#idIndikator');
    let nama_indikator = $('#nama_indikator');
    let numerator = $('#numerator');
    let denominator = $('#denominator');
    let standar = $('#standar');
    let ket_standar = $('#ket_standar');
    let jenisCapaian = $('#jenisCapaian');
    const aktif = document.getElementById('check_id');
    let formStatus = $('#formStatus');

    function showDetail(data) {
        let id_indikator = data.dataset.id;
        $.ajax({
            type: "GET",
            url: url + "indikator/get_detail_indikator/" + id_indikator,
            success: function(data) {
                let indikator = JSON.parse(data);
                idindikator.val(indikator.idindikator);
                nama_indikator.val(indikator.nama_indikator);
                numerator.val(indikator.numerator);
                denominator.val(indikator.denominator);
                jenisCapaian.val(indikator.target_capaian);
                console.log(indikator.aktif);
                standar.val(indikator.standar);
                ket_standar.val(indikator.ket_standar);
                if (indikator.aktif == true) {
                    aktif.checked = true;
                } else {
                    aktif.checked = false;
                }
                formStatus.val("edit");
            },
        });
    };

    function simpan() {
        if (nama_indikator.val() == "" || nama_indikator.val().length < 4) {
            alert("Nama tidak boleh kosong atau terlalu pendek");
            nama_indikator.focus();
            return false;
        }
        switch (formStatus.val()) {
            case 'new':
                $.ajax({
                    type: "POST",
                    url: url + "indikator/add_indikator",
                    data: {
                        "namaIndiator": nama_indikator.val(),
                        "numerator": numerator.val(),
                        "denominator": denominator.val(),
                        "jenisCapaian": jenisCapaian.val(),
                        "standar": standar.val(),
                        "ket_standar": ket_standar.val(),
                        "aktif": aktif.checked
                    },
                    success: function(data) {
                        window.location.reload();
                    },
                });
                break;
            case 'edit':
                $.ajax({
                    type: "POST",
                    url: url + "indikator/update_indikator/" + idindikator.val(),
                    data: {
                        "namaIndiator": nama_indikator.val(),
                        "numerator": numerator.val(),
                        "denominator": denominator.val(),
                        "jenisCapaian": jenisCapaian.val(),
                        "standar": standar.val(),
                        "ket_standar": ket_standar.val(),
                        "aktif": aktif.checked
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                });
                break;
            default:
                console.log('test');
                break;
        }
    }


    function setAktif(data) {
        let id = data.dataset.id;
        let status = data.dataset.status;
        $.ajax({
            type: "POST",
            url: url + "indikator/setAktif/" + id,
            data: {
                "aktif": status
            },
            success: function(data) {
                window.location.reload();
            }
        });


    }

    $(document).ready(function() {
        $('#tableIndikator').DataTable();
        $('#bntNew').click(function() {
            idindikator.val('');
            nama_indikator.val('');
            numerator.val('');
            denominator.val('');
            standar.val(0);
            ket_standar.val('');
            jenisCapaian.val('');
            aktif.checked = true;
            formStatus.val("new");
        });
    });
</script>