<h3><?php echo $judul ?></h3>
<?php
// print_pretty($all_menu);
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
                <div class="card-header py-3  bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white">Master Menu</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="masterArea" class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px ;">No.</th>
                                    <th>Menu</th>
                                    <th style="width:50px ;">Aktif</th>
                                </tr>
                            </thead>
                            <tbody id="rowMasterMenu">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3  bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white">Data menu group </h6>
                    <div class="form-group row m-3">
                        <select id="selectGroup" class="form-control form-control-sm col-sm-4" onchange="getMenuGroup()">
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
    const rowMasterMenu = document.getElementById('rowMasterMenu');

    const tableGroup = document.getElementById('tableGroup');

    window.addEventListener('DOMContentLoaded', (event) => {
        isiSelectGroup();
        setTimeout(() => {
            getMasterMenu();
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
    function getMasterMenu() {
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "admin/get_all_menu")
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (data.status == true) {
                    let html = "";
                    let no = 1;
                    
                    data.data_menu.forEach(row => {
                        let button = "";
                        if(row.aktif == '1'){
                            button = `<button disable="editMenu(this)" data-id="" class="btn btn-sm btn-danger"><i class="far fa-eye-slash"></i></button>`;    
                        }else{
                            button = `<button enable="editMenu(this)" data-id="" class="btn btn-sm btn-success"><i class="far fa-eye"></i></button>`   ;
                        }
                        html += `<tr>
                                        <td>${no++}</td>
                                        <td draggable="true" ondragstart="drag(this,event)"  ondragend="dragCancel()" data-id="${row.idmenu}"> <a href="#">${row.namamenu}</a> </td>
                                        <td> ${button}</td>
                                    </tr>`;
                        row.submenu.forEach(sub => {
                         
                            let button = "";
                        if(sub.aktif == '1'){
                            button = `<button onclic="disable(this)" data-id="" class="btn btn-sm btn-danger"><i class="far fa-eye-slash"></i></button>`;    
                        }else{
                            button = `<button onclic="enable(this)" data-id="" class="btn btn-sm btn-success"><i class="far fa-eye"></i></button>`   ;
                        }
                            html += `<tr>
                                            <td></td>
                                            <td draggable="true" ondragstart="drag(this,event)" data-id="${sub.idmenu}"> <i class="fas fa-chevron-circle-right"></i><a href="#"> ${sub.nama_menu} </a></td>
                                            <td>${button}</td>
                                        </tr>`
                        })
                    });
                    rowMasterMenu.innerHTML = html;
                }
            }
        }
    }
    function isiSelectGroup() {
        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "admin/get_group")
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        async function callback() {
            if (xhr.readyState == 4) {
                const data = await JSON.parse(xhr.responseText);
                if (data.status == true) {
                    let html = `<option value=""> - PILIH GROUP - </option>`;
                    data.data_group.forEach(row => {
                        html += ` <option value="${row.idgroup}">${row.nama_group}</option>`;
                    });
                    selectGroup.innerHTML = html;
                }
            }
        }
    }
    function getMenuGroup() {
        tableGroup.innerHTML = "";

        if(selectGroup.value == ""){
            tableGroup.innerHTML = "";
            return false;

        }

        xhr.onreadystatechange = callback;
        xhr.open('GET', base_url + "admin/get_menu_group/" + selectGroup.value)
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send();
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (data.status == true) {
                    let html = "";


                    html += `<table class="table table-sm table-striped table-hover table-bordered" > 
                    <thead>
                        <th style="width: 45px;">No.</th>
                        <th>Menu</th>
                        <th style="width: 100px;">Action</th>
                        
                    </thead> <tbody>`;

                    let no = 1;
                    data.data_menu.forEach(row => {
                        html += `<tr>
                                        <td style="text-align: center;">${no++}</td>
                                        <td  data-id="${row.nama_menu}"> <a href="#">${row.nama_menu}</a> </td>
                                        <td> 
                                             <button class="btn btn-sm btn-danger" onclick="deleteMenu(this)" data-id="${row.id_menu}"> 
                                             <i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>`;
                        row.submenu.forEach(sub => {
                            html += `<tr>
                                            <td></td>
                                            <td> <i class="fas fa-chevron-circle-right"></i><a href="#"> ${sub.nama_menu} </a></td>
                                            <td>
                                           <button class="btn btn-sm btn-danger" onclick="deleteMenu(this)" data-id="${sub.idmenu}">
                                            <i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>`;
                        })
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
    function addItem(idmenu) {
        let data = {
            "idgroup": selectGroup.value,
            "idmenu": idmenu
        };
        xhr.onreadystatechange = callback;
        xhr.open('POST', base_url + "admin/add_to_group")
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send(JSON.stringify(data));
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (data.status == true) {
                    getMenuGroup()
                } else {
                    return false;
                }
            }
        }
    }
    function deleteMenu(id) {
        let data = {
            "idgroup": selectGroup.value,
            "idmenu": id.dataset.id
        };

        xhr.onreadystatechange = callback;
        xhr.open('POST', base_url + "admin/delete_item_group")
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send(JSON.stringify(data));
        function callback() {
            if (xhr.readyState == 4) {
                const data = JSON.parse(xhr.responseText);
                if (data.status == true) {
                    getMenuGroup();
                } else {
                    return false;
                }
            }
        }
    }
</script>