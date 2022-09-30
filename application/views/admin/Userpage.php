<div class="card card-danger shadow mb-4">
    <div class="card-header py-3 bg-primary">
        <div class="row">
            <div class="col">
                <h4 class="m-0 font-weight-bold text-white"><?php echo $judul ?></h4>
            </div>
            <div class="col">
                <div class="float-right">
                    <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" id="bntNew" data-target="#ModalUser"> -->
                    <button type="button" class="btn btn-sm btn-success" id="bntNew">
                        Tambah User
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm" id="tableUser" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama user</th>
                        <th>Unit</th>
                        <th>Aktif</th>
                        <th>ACT</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode</th>
                        <th>Nama user</th>
                        <th>Unit</th>
                        <th>Aktif</th>
                        <th>ACT</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data_user as $value) { ?>
                        <tr>
                            <td><?php echo $value['iduser'] ?></td>
                            <td><?php echo $value['nama_user'] ?></td>
                            <td><?php echo $value['nama_unit'] ?></td>
                            <td><?php echo $value['aktif'] ?></td>
                            <td>
                                <!-- <div data-id="<?php echo  $value['iduser']  ?>" class="btn btn-sm  btn-success" data-toggle="modal" data-target="#ModalUser" id="btnEdit">Edit</div> -->
                                <div data-id="<?php echo  $value['iduser']  ?>" class="btn btn-sm  btn-success" onclick="showDetail('<?php echo  $value['iduser']  ?>')">Edit</div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="ModalUserLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="ModalUserLabel">Input Data user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-gradient-light">
                <form autocomplete="off">
                    <input style="width: 5rem;" type="hidden" class="form-control" id="formStatus" value="new" >
                    <div class="form-group">
                       
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama user</label>
                        <input style="width: 10rem;" type="hidden" class="form-control" id="idUser" placeholder="ID user" disabled>

                        <input type="text" class="form-control" id="namaUser" name="namaUser" placeholder="Nama user " required>
                    </div>
                    <div class="form-group">
                        <label for="Name">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required minlength="6">
                    </div>
                    <div class="form-group">
                        <label for="Name">Password</label>
                        <input type="password"  autocomplete="off" class="form-control" id="password" name="password" placeholder="Min 6 character" required minlength="6">
                    </div>
                    <div class="form-group">
                        <label for="Inputselect">Unit</label>
                        <select class="form-control" id="selectUnit" name="selectUnit">
                           
                        </select>
                       
                    </div>
                    <div class="form-group">
                        <label for="Inputselect">Group User</label>
                        <select class="form-control" id="selectGroup" name="selectGroup">
                           
                        </select>
                       
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

    fill_unit();

    setTimeout(() => {
        fill_group();
    }, 300);
   
    const iduser = document.getElementById('idUser');
    const namaUser = document.getElementById('namaUser');
    const username = document.getElementById('username');
    const password = document.getElementById('password');

    const unit = document.getElementById('selectUnit');
    const group = document.getElementById('selectGroup');
    const aktif = document.getElementById('check_id');

    const formStatus = document.getElementById('formStatus');
    const bntNew = document.getElementById('bntNew');
    $('#tableUser').DataTable();

    function fill_unit() {
        xhr.open("GET", base_url + "user/get_list_unit");
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != "") {
                    unit.innerHTML = "";
                    data = JSON.parse(this.responseText);
                   
                    data.forEach(function callback(value, index) {
                        var option = document.createElement("option");
                        option.value = value.idunit;
                        option.text = value.nama_unit;
                        unit.add(option);
                    });

                } else {
                    console.warn("data tidak ada");
                }
            }
        };
        xhr.send();
    }

    function fill_group() {
        xhr.open("GET", base_url + "user/get_list_group");
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != "") {
                    group.innerHTML = "";
                    data = JSON.parse(this.responseText);
                   
                    data.forEach(function callback(value, index) {
                        var option = document.createElement("option");
                        option.value = value.idgroup;
                        option.text = value.nama_group;
                        group.add(option);
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
        iduser.value = "";
        namaUser.value = "";
        username.value = "";
        password.value = "";
        aktif.checked = true;
        fill_unit();
        $('#ModalUser').modal('show');
    };
    //TAMPILKAN DATA user PADA MODAL
    function showDetail(id) {
        $.ajax({
            type: "GET",
            url: base_url + "user/get_detail_user/" + id,
            success: function(data) {
                // fill_unit();
                
                let user = JSON.parse(data);

                formStatus.value = "edit";
                iduser.value = user.iduser;
                namaUser.value = user.nama_user;
                username.value = user.username;
                password.value = "";
                unit.value = user.idunit;
               group.value = user.idgroup;

                if (user.aktif == true) {
                    aktif.checked = true;
                } else {
                    aktif.checked = false;
                }
               
            },
        });
        $('#ModalUser').modal('show');
    }
    // SIMPAN DATA user BARU DAN UPDATE
    $('#button_simpan').click(function() {
        if (namaUser.value == "" || namaUser.value.length < 4) {
            alert("Nama tidak boleh kosong atau terlalu pendek");
            namaUser.focus();
            return false;
        }
        switch (formStatus.value) {
            case 'new':

                $.ajax({
                    type: "POST",
                    url: base_url + "user/add_user",
                    data: {
                        "username": username.value,
                        "password": password.value,
                        "namaUser": namaUser.value,
                        "unit": unit.value,
                        "group": group.value,
                    },
                    success: function(data) {
                        window.location.reload();
                    },
                });
                break;
            case 'edit':
                $.ajax({
                    type: "POST",
                    url: base_url + "user/update_user/" + iduser.value,
                    data: {
                        "username": username.value,
                        "password": password.value,
                        "namaUser": namaUser.value,
                        "unit": unit.value,
                        "group": group.value,
                        "aktif": aktif.checked
                    },
                    success: function(data) {
                        console.log(data);
                        // window.location.reload();
                    }
                });
                break;
            default:
                // code block
        }
    });
</script>