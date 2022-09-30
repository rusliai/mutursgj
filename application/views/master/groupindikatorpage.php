<h3><?php echo $judul ?></h3>
<?php
// print_pretty($all_Indikator);
?>
<style>
    .user-akses {
        width: 100%;
        height: 200px;
        border: 1px dashed red;
    }
    .switch {
        display: inline-block;
        height: 34px;
        position: relative;
        width: 60px;
    }
    .switch input {
        display: none;
    }
    .slider {
        background-color: #ccc;
        bottom: 0;
        cursor: pointer;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transition: .4s;
    }
    .slider:before {
        background-color: #fff;
        bottom: 4px;
        content: "";
        height: 26px;
        left: 4px;
        position: absolute;
        transition: .4s;
        width: 26px;
    }
    input:checked+.slider {
        background-color: #66bb6a;
    }
    input:checked+.slider:before {
        transform: translateX(26px);
    }
    .slider.round {
        border-radius: 34px;
    }
    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header  bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white">Master Indikator</h6>
                    <div class="form-group row m-2">
                        <input onkeypress="cariMasterIndikator(this)" type="text" class="form-control form-control-sm" placeholder="Cari indikator" class="form-control form-control-sm col-sm-3 col-md-3 m-2">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="masterArea" class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px ;">No.</th>
                                    <th>Indikator</th>
                                    <th style="width:50px ;">Aktif</th>
                                </tr>
                            </thead>
                            <tbody id="rowMasterIndikator">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white">Unit</h6>
                    <div class="form-group row m-2">
                        <select id="selectGroup" class="form-control form-control-sm col-sm-3 col-md-3" onchange="getIndikatorGroup()">
                        </select>
                    </div>
                </div>
                <div class="card-body" id="groupArea" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="table-responsive" id="tableGroup">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = "<?php echo base_url() ?>";
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    const masterArea = document.getElementById('masterArea');
    const groupArea = document.getElementById('groupArea');
    const selectGroup = document.getElementById('selectGroup');
    const rowMasterIndikator = document.getElementById('rowMasterIndikator');
    const tableGroup = document.getElementById('tableGroup');
    window.addEventListener('DOMContentLoaded', (event) => {
        isiSelectGroup();
        setTimeout(() => {
            getMasterIndikator();
        }, 500);
    });
    function allowDrop(ev) {
        ev.preventDefault();
    }
    function drag(data, ev) {
        ev.dataTransfer.setData("id", data.dataset.id);
        if (groupArea.style.border = "none") {
            groupArea.style.border = "2px dashed red";
        }
    }
    function drop(ev) {
        ev.preventDefault();
        let id = ev.dataTransfer.getData("id");
        addItem(id);
    }
    function dragCancel() {
        groupArea.style.border = "none";
    }
    function getMasterIndikator() {
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "indikator/get_all_indikator")
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (data.status == true) {
                    let html = "";
                    let no = 1;
                    data.data_indikator.forEach(row => {
                        let button = "";
                        if (row.aktif == '1') {
                            button = `<button class="btn btn-sm btn-danger"><i class="far fa-eye-slash"></i></button>`;
                        } else {
                            button = `<button  class="btn btn-sm btn-success"><i class="far fa-eye"></i></button>`;
                        }
                        html += `<tr>
                                        <td>${no++}</td>
                                        <td draggable="true" ondragstart="drag(this,event)"  ondragend="dragCancel()" data-id="${row.idindikator}"> <a href="#">${row.nama_indikator}</a> </td>
                                        <td> ${button}</td>
                                    </tr>`;
                    });
                    rowMasterIndikator.innerHTML = html;
                }
            }
        }
    }
    function cariMasterIndikator(data) {
        let keyword = data.value;
        if (keyword.length > 3) {
            xhr.onreadystatechange = callback;
            xhr.open('GET', base_url + "indikator/cariIndikator?param=" + keyword)
            xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
            xhr.send();
            function callback() {
                if (xhr.readyState == 4) {
                    const data = JSON.parse(xhr.responseText);
                    if (data.status == true) {
                        let html = "";
                        let no = 1;
                        data.data_indikator.forEach(row => {
                            let button = "";
                            if (row.aktif == '1') {
                                button = `<button  class="btn btn-sm btn-danger"><i class="far fa-eye-slash"></i></button>`;
                            } else {
                                button = `<button class="btn btn-sm btn-success"><i class="far fa-eye"></i></button>`;
                            }
                            html += `<tr>
                                        <td>${no++}</td>
                                        <td draggable="true" ondragstart="drag(this,event)"  ondragend="dragCancel()" data-id="${row.idindikator}"> <a href="#">${row.nama_indikator}</a> </td>
                                        <td> ${button}</td>
                                    </tr>`;
                        });
                        rowMasterIndikator.innerHTML = html;
                    }
                }
            }
        }
    }
    function isiSelectGroup() {
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "unit/get_all_unit")
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        async function callback() {
            if (xhr.readyState == 4) {
                const data = await JSON.parse(xhr.responseText);
                if (data.status == true) {
                    let html = `<option value=""> - PILIH GROUP - </option>`;
                    data.data_unit.forEach(row => {
                        html += ` <option value="${row.idunit}">${row.nama_unit}</option>`;
                    });
                    selectGroup.innerHTML = html;
                }
            }
        }
    }
    function getIndikatorGroup() {
        tableGroup.innerHTML = "";
        if (selectGroup.value == "") {
            tableGroup.innerHTML = "";
            return false;
        }
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "indikator/get_indikator_group/" + selectGroup.value)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (data.status == true) {
                    let html = "";
                    html += `<table class="table table-sm table-striped table-hover table-bordered" id="tableIndikator" > 
                    <thead>
                        <th style="width: 45px;">No.</th>
                        <th>Indikator</th>
                        <th style="width: 100px;">Action</th>
                    </thead> <tbody>`;
                    let no = 1;
                    data.data_indikator.forEach(row => {
                        html += `<tr>
                                        <td style="text-align: center;">${no++}</td>
                                        <td  data-id="${row.idindikator}"> <a href="#">${row.nama_indikator}</a> </td>
                                        <td> 
                                             <button class="btn btn-sm btn-danger" onclick="deleteIndikator(this)" data-id="${row.idindikator}"> 
                                             <i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>`;
                    });
                    html += `</tbody> </table>`;
                    tableGroup.innerHTML = html;
                } else {
                    Swal.fire(
                        'Data tidak tersedia!',
                    );
                }
            }
        }
    }
    function addItem(idIndikator) {
        let data = {
            "idgroup": selectGroup.value,
            "idIndikator": idIndikator
        };
        xhr.onreadystatechange = callback;
        xhr.open('POST', base_url + "group_indikator/add_to_group")
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send(JSON.stringify(data));
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (data.status == true) {
                    getIndikatorGroup()
                } else {
                    return false;
                }
            }
        }
    }
    function deleteIndikator(id) {
        let data = {
            "idgroup": selectGroup.value,
            "idIndikator": id.dataset.id
        };
        xhr.onreadystatechange = callback;
        xhr.open('POST', base_url + "group_indikator/delete_item_group")
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send(JSON.stringify(data));
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (data.status == true) {
                    getIndikatorGroup();
                } else {
                    return false;
                }
            }
        }
    }
</script>