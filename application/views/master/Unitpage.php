<div class="card card-danger shadow mb-4">
    <div class="card-header py-3 bg-primary">
        <div class="row">
            <div class="col">
                <h4 class="m-0 font-weight-bold text-white"><?php echo $judul ?></h4>
            </div>
            <div class="col">
                <div class="float-right">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" id="bntNew" data-target="#ModalUnit">
                        Tambah Unit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Unit</th>
                        <th>Aktif</th>
                        <th>ACT</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Unit</th>
                        <th>Aktif</th>
                        <th>ACT</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data_unit as $value) { ?>
                        <tr>
                            <td><?php echo $value['idunit'] ?></td>
                            <td><?php echo $value['nama_unit'] ?></td>
                            <td><?php echo $value['aktif'] ?></td>
                            <td>
                                <div data-id="<?php echo  $value['idunit']  ?>" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#ModalUnit" id="btnEdit">Edit</div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalUnit" tabindex="-1" role="dialog" aria-labelledby="ModalUnitLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="ModalUnitLabel">Input Data Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-gradient-light">
                <form>
                    <input style="width: 5rem;" type="text" class="form-control" id="formStatus" value="new">
                    <div class="form-group">
                        <label for="Name">ID Unit</label>
                        <input style="width: 10rem;" type="text" class="form-control" id="idUnit" placeholder="ID Unit" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama Unit</label>
                        <input type="text" class="form-control" id="namaUnit" placeholder="Nama Unit " required>
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
    $(document).ready(function() {
        var url = "<?php echo base_url(); ?>";
        let idunit = $('#idUnit');
        let namaUnit = $('#namaUnit');
        let aktif = $('#check_id').is(':checked');
        let formStatus = $('#formStatus');

        $('#btnEdit').click(function() {
            let id_unit = $(this).attr('data-id');
            
            $.ajax({
                type: "GET",
                url: url + "unit/get_detail_unit/" + id_unit,
                success: function(data) {
                    let unit = JSON.parse(data);
                  
                    idunit.val(unit.idunit);
                    namaUnit.val(unit.nama_unit);
                    formStatus.val("edit");
                },
            });
        });
        $('#bntNew').click(function() {
            idUnit.val('');
            namaUnit.val('');
            formStatus.val("new");
        });
        $('#button_simpan').click(function() {
            if (namaUnit.val() == "" || namaUnit.val().length < 2) {
                alert("Nama tidak boleh kosong atau terlalu pendek");
                namaUnit.focus();
                return false;
            }
            switch (formStatus.val()) {
                case 'new':
                    $.ajax({
                        type: "POST",
                        url: url + "unit/add_unit",
                        data: {
                            "namaUnit": namaUnit.val(),
                            "aktif": aktif
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
                        url: url + "unit/update_unit/" + idunit.val(),
                        data: {
                            "namaUnit": namaUnit.val(),
                            "aktif": aktif
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
    });
</script>