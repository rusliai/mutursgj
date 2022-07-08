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
            <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Indikator</th>
                        <th>Nama Indikator</th>
                        <th>numerator</th>
                        <th>Denominator</th>
                        <th>Aktif</th>
                        <th>ACT</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($data_indikator as $value) { ?>
                        <tr>
                            <td><?php echo $value['idindikator'] ?></td>
                            <td><?php echo $value['nama_indikator'] ?></td>
                            <td><?php echo $value['numerator'] ?></td>
                            <td><?php echo $value['denominator'] ?></td>
                            <td><?php echo $value['aktif'] ?></td>
                            <td>
                                <div data-id="<?php echo  $value['idindikator']  ?>" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#ModalIndikator" id="btnEdit">Edit</div>
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
                    <input style="width: 5rem;" type="text" class="form-control" id="formStatus" value="new" disabled>
                    <div class="form-group">
                        <label for="Name">ID INDIKATOR</label>
                        <input style="width: 10rem;" type="text" class="form-control" id="idIndikator" placeholder="Automatic" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama Indikator</label>
                        <textarea class="form-control" id="nama_indikator" placeholder="Nama Indikator " rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Name">numerator</label>
                        <textarea class="form-control" id="numerator" placeholder="numerator " rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Name">Denominator</label>
                        <textarea class="form-control" id="denominator" placeholder="Denominator " rows="3"></textarea>
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
        let idindikator = $('#idIndikator');
        let nama_indikator = $('#nama_indikator');
        let numerator = $('#numerator');
        let denominator = $('#denominator');
        let aktif = $('#check_id').is(':checked');
        let formStatus = $('#formStatus');

        $('#btnEdit').click(function() {
            let id_indikator = $(this).attr('data-id');
            
            $.ajax({
                type: "GET",
                url: url + "indikator/get_detail_indikator/" + id_indikator,
                success: function(data) {
                    let indikator = JSON.parse(data);
                    idindikator.val(indikator.idindikator);
                    nama_indikator.val(indikator.nama_indikator);
                    numerator.val(indikator.numerator);
                    denominator.val(indikator.denominator);
                    formStatus.val("edit");
                },
            });
        });
        $('#bntNew').click(function() {
            idindikator.val('');
            nama_indikator.val('');
            numerator.val('');
            denominator.val('');
            formStatus.val("new");
        });
        $('#button_simpan').click(function() {
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
                            "nama_indikator": nama_indikator.val(),
                            "numerator": numerator.val(),
                            "denominator": denominator.val(),  
                            "aktif": aktif
                        },
                        success: function(data) {
                            console.log(data);
                            // window.location.reload();
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