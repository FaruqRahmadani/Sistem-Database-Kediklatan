import swal from 'sweetalert'

Vue.component('field-daerah-provkota', require('./components/FieldDaerah-ProvKota.vue'))
Vue.component('field-satkerja', require('./components/FieldSatuanKerja.vue'))
Vue.component('field-unitkerja', require('./components/FieldUnitKerja.vue'))
Vue.component('field-komoditas', require('./components/FieldKomoditas.vue'))
Vue.component('daerah-komoditas', require('./components/DaerahKomoditasField.vue'))

window.notif = function (tipe, judul, pesan){
  swal({
    title: judul,
    text: pesan,
    icon: tipe,
    button: "OK",
  })
}
$(document).ready(function() {
  var vm = new Vue({
    el: '#app',
  })
  global.vm = vm

  var columnData = []
  var orderDisabled = $('#myTable').attr('data-order-disable')
  if (orderDisabled) {
    $.each(JSON.parse(orderDisabled), function( index, value ) {
      columnData.push({ "orderable": false, "targets": +value })
    });
  }

  $('#myTable').DataTable({
    columnDefs: columnData,
    responsive: true,
    language: {
      processing: "Sedang memproses...",
      search: "Cari Data&nbsp&nbsp:&nbsp",
      lengthMenu: "Tampilkan _MENU_ data",
      info: "(&nbsp Menampilkan _START_ sampai _END_, dari _TOTAL_ data &nbsp)",
      infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
      infoFiltered: "(disaring dari _MAX_ data keseluruhan)",
      infoPostFix: "",
      zeroRecords: "Tidak ditemukan data yang sesuai",
      paginate: {
        previous: "Sebelumnya&nbsp",
        next: "&nbspSelanjutnya",
      }
    }
  })

  $('#myTable').on('click','.btn-delete', function(){
    var status = $(this).attr('status')
    var url = $(this).attr('href')
    var id = $(this).attr('data')
    if (!status) {
      swal({
        title   : "Hapus",
        text    : "Yakin Ingin Hapus Data?",
        icon    : "warning",
        buttons : [
          "Batal",
          "Hapus",
        ],
      })
      .then((hapus) => {
        if (hapus) {
          swal({
            title  : "Berhasil",
            text   : "Data Akan dihapus",
            icon   : "success",
            timer  : 2500,
          })
          window.location = url+'/'+id+'/verify'
        } else {
          swal({
            title  : "Batal",
            text   : "Data Batal dihapus",
            icon   : "info",
            timer  : 2500,
          })
        }
      })
    }else{
      swal({
        title   : "Hapus",
        text    : status,
        icon    : "warning",
        buttons : "OK",
      })
    }
  })
  $("#select2").select2()
  $(".select2").select2({
    placeholder: "Pilih",
  })
  $("#logout").click(function(){
    swal({
      title   : "Logout",
      text    : "Yakin Ingin Keluar?",
      icon    : "warning",
      buttons : [
        "Batal",
        "Logout",
      ],
    })
    .then((logout) => {
      if (logout) {
        swal({
          title  : "Logout",
          text   : "Anda Telah Logout",
          icon   : "success",
          timer  : 2500,
        })
        window.location = "/logout"
      } else {
        swal({
          title  : "Batal Logout",
          text   : "Anda Batal Logout",
          icon   : "info",
          timer  : 2500,
        })
      }
    })
  })
})
