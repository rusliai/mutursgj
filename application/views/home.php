<style>
  .word {
    word-wrap: break-word;
  }
</style>
<?php
?>
<!-- <div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary">
        <h6 class="m-0 font-weight-bold text-white">Grafik Capaian Perbulan</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="chart" class="chart-area">
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary">
        <div class="col">
          <div class="form-group row m-1">
            <h5 class="m-0 font-weight-bold text-white">Grafik Capaian Perindikator <span id="titleGrafik"></span></h5>
          </div>
        </div>
        <div class="col">
          <div class="form-group row m-1">
            <?php
            $option =  "<select id='list_unit' class='form-control form-control-sm col-sm-3'> ";
            foreach ($unit as $row) {
              $option .= "<option value='" . $row['idunit'] . "'>" . $row['nama_unit'] . "</option>";
            }
            $option .= "</select>";
            echo $option;
            ?>
            &nbsp;
            <?php echo input_select_bulan("list_bulan", date('m')) ?>
            &nbsp;
            <?php echo input_select_tahun("list_tahun", date('Y')) ?>
            &nbsp;
            <button id="btnTampilRekap" onclick="tampilDetail()" type="button" class=" btn btn-sm btn-primary">
              <i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <th style="width: 10%;"><a href="#">Standar</th>
              <th>Grafik Perhari</th>
            </thead>
            <tbody id="rowDetail">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  var base_url = "<?php echo base_url() ?>";
  var today = new Date();
  var hari = String(today.getDate()).padStart(2, '0');
  var bulan = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var tahun = today.getFullYear();
  const titleGrafik = document.getElementById('titleGrafik');
  const inputUnit = document.getElementById('list_unit');
  const inputBulan = document.getElementById('list_bulan');
  const inputTahun = document.getElementById('list_tahun');
  var getDaysInMonth = function(month, year) {
    return new Date(year, month, 0).getDate();
  };
  let jumlah_hari = getDaysInMonth(bulan, tahun);
  // tampilRekap();
  // setTimeout(() => {
  //   tampilDetail();
  // }, 100);
  function toMonthName(monthNumber) {
    const date = new Date();
    date.setMonth(monthNumber - 1);
    return date.toLocaleString('en-US', {
      month: 'long',
    });
  }
  // function tampilRekap() {
  //   let param = `tahun=${tahun}&bulan=${bulan}&tipe=perunit&idunit=${inputUnit.value}`;
  //   xhr.onreadystatechange = callback;
  //   xhr.open('GET', base_url + "input_indikator/getRekap?" + param)
  //   xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
  //   xhr.send();
  //   function callback() {
  //     if (this.readyState == 4 && this.status == 200) {
  //       let data = JSON.parse(this.responseText)
  //       console.warn(data);
  //       var namaindikator = [];
  //       var standar = [];
  //       var capaian = [];
  //       data.forEach(e => {
  //         namaindikator.push(e.nama_indikator.split(" "));
  //         namaindikator.push(e.nama_indikator);
  //         let persen = (e.total_numerator / e.total_denominator) * 100;
  //         persen = parseFloat(persen).toFixed(2);
  //         standar.push(e.standar)
  //         capaian.push(persen)
  //       });
  //       var options = {
  //         chart: {
  //           type: 'bar',
  //           height: 480
  //         },
  //         plotOptions: {
  //           bar: {
  //             horizontal: true,
  //             dataLabels: {
  //               position: 'bottom',
  //             },
  //           }
  //         },
  //         colors: ["#007bff"],
  //         stroke: {
  //           show: true,
  //           width: 1,
  //         },
  //         tooltip: {
  //           shared: true,
  //           intersect: false
  //         },
  //         xaxis: {
  //           categories: namaindikator,
  //           labels: {
  //             show: true,
  //             formatter: function(value) {
  //               return value + "%";
  //             }
  //           },
  //         },
  //         yaxis: {
  //           min: 0,
  //           max: 100,
  //           tickAmount: 5,
  //           labels: {
  //             show: false,
  //             // formatter: function(value) {
  //             //   // return value + "%";
  //             // }
  //           }
  //         },
  //         series: [{
  //             name: "Capaian",
  //             data: capaian,
  //           },
  //           // {
  //           //   name: "Standar",
  //           //   data: standar
  //           // },
  //         ],
  //         dataLabels: {
  //           enabled: false,
  //           style: {
  //             fontSize: '12px',
  //             fontWeight: 'bold',
  //           },
  //           formatter: function(value) {
  //             return value + "%";
  //           },
  //           enabled: true,
  //           textAnchor: 'start',
  //           style: {
  //             colors: ['#000000']
  //           },
  //           formatter: function(val, opt) {
  //             return opt.w.globals.labels[opt.dataPointIndex] + " :  " + val + "%"
  //           },
  //           offsetX: 0,
  //           dropShadow: {
  //             enabled: false
  //           }
  //         },
  //       }
  //       var chart = new ApexCharts(document.querySelector("#chart"), options);
  //       chart.render();
  //     }
  //   }
  // }


  function tampilDetail() {
    const rowDetail = document.getElementById('rowDetail');

    let param = `tahun=${inputTahun.value}&bulan=${inputBulan.value}&tipe=perunit&idunit=${inputUnit.value}`;

    xhr.onreadystatechange = callback;
    xhr.open('GET', base_url + "input_indikator/getRekap?" + param)
    xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
    xhr.send();
    function callback() {
      if (this.readyState == 4 && this.status == 200) {
        titleGrafik.innerHTML = `${toMonthName(bulan)} ${tahun}`;
        let data = JSON.parse(this.responseText)
        let html = '';

        data.forEach(e => {
          console.warn(e);
         
          let persen_pencapaian = 0;
          if (e.pencapaian == NaN || e.pencapaian == undefined) {
            persen_pencapaian = 0;
          } else {
            persen_pencapaian = parseFloat(e.pencapaian).toFixed(2);
          }
        
          html += `<tr>
                      <td> 
                      <h5>Standar</h5>
                        <span href="#" style="font-size: 3rem;font-weight: bold;font-family: arial;"> ${parseFloat(e.standar).toFixed(2)}%</span>
                        <h5>Pencapaian</h5>
                        <span href="#" style="font-size: 3rem;font-weight: bold;font-family: arial;"> ${persen_pencapaian}%</span> <br>
                        <span><b>Numerator : </b>${e.total_numerator}</span><br>
                        <span><b>Denominator : </b>${e.total_denominator}</span>
                      </td>
                      <td id="${e.idindikator+"-"+e.iddokter}"> 
                     </td>
                    </tr>`;


        });
          
        rowDetail.innerHTML = html;

        

        for (let x = 0; x < data.length; x++) {
          let dataTanggal = [];
          let dataIndikator = [];
          let dataNumerator = [];
          let dataDenominator = [];
          let item = data[x];
          for (let y = 1; y <= jumlah_hari;) {
            dataTanggal.push(y);
            let persen = 0
            let num_numerator = 0;
            let num_denominator = 0;
            item.detail.forEach(e => {
              const date = new Date(e.tanggal);
              const date_num = date.getDate();
              if (date_num == y) {
                persen = (e.numerator / e.denominator) * 100;
                persen = parseFloat(persen).toFixed(2);
                num_numerator = e.numerator;
                num_denominator = e.denominator;
                if (isNaN(persen)) {
                  persen = 0;
                  num_numerator = 0;
                  num_denominator = 0;
                }
              }
            })
            dataIndikator.push(persen);
            dataNumerator.push(num_numerator)
            dataDenominator.push(num_denominator)
            y++
          }
          var options = {
            series: [{
              name: "X",
              data: dataIndikator,
              numerator: dataNumerator,
              denominator: dataDenominator
            }],
            tooltip: {
              custom: function({
                series,
                seriesIndex,
                dataPointIndex,
                w
              }) {
                let angkaNum = w.globals.initialSeries[seriesIndex].numerator[dataPointIndex];
                let angkaDenom = w.globals.initialSeries[seriesIndex].denominator[dataPointIndex];
                let angkaCapaian = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
                return `<div class="card card-sm  text-white bg-dark " >
                <div class="card-header">
               <span>${item.nama_indikator.toUpperCase()} <span>
                </div>
                          <div class="card-body">
                          ${item.numerator} : <b> ${angkaNum} </b>  <br>
                          ${item.denominator} :<b> ${angkaDenom}  </b> <br>
                          Standar :<b> ${item.standar} %</b> <br>
                          Pencapaian :<b> ${angkaCapaian} %</b> <br>
                          </div>
                          </div>`
              },
            },
            chart: {
              type: 'area',
              height: 350,
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            title: {
              text: item.nama_indikator.toUpperCase() + "( " + item.nama_dokter.toUpperCase() + " )",
              align: 'left'
            },
            subtitle: {
              text: '',
              align: 'left'
            },
            labels: dataTanggal,
            xaxis: {
              type: 'category',
            },
            yaxis: {
              opposite: true
            },
            legend: {
              horizontalAlign: 'left'
            }
          };
          
          var chart = new ApexCharts(document.getElementById(`${item.idindikator+"-"+item.iddokter}`), options);
          chart.render();

          
        }

      



      }
    }
  }
</script>