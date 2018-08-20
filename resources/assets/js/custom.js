import swal from 'sweetalert';

Vue.component('button-tambah', require('./components/ButtonTambah.vue'));
Vue.component('button-kembali', require('./components/ButtonKembali.vue'));
Vue.component('button-logout', require('./components/ButtonLogout.vue'));
Vue.component('button-print', require('./components/ButtonPrint.vue'));
Vue.component('field-daerah-provkota', require('./components/FieldDaerah-ProvKota.vue'));
Vue.component('button-edit', require('./components/ButtonEdit.vue'));
Vue.component('button-delete', require('./components/ButtonDelete.vue'));
Vue.component('field-satkerja', require('./components/FieldSatuanKerja.vue'));
Vue.component('field-unitkerja', require('./components/FieldUnitKerja.vue'));
Vue.component('field-komoditas', require('./components/FieldKomoditas.vue'));

window.notif = function (tipe, judul, pesan){
  swal({
    title: judul,
    text: pesan,
    icon: tipe,
    button: "OK",
  });
}
$(document).ready(function() {
  var vm = new Vue({
    el: '#app',
  });

  global.vm = vm;

  var langDataTable = {
    processing: "Sedang memproses...",
    search: "Cari Data&nbsp&nbsp;:&nbsp",
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
  };

  $('#table_penyuluh').DataTable({
    scrollX: true,
    language: langDataTable,
    "autoWidth": true,
  });

  $('#table_satkerja').DataTable({
    responsive: true,
    columns: [
      { responsivePriority: 1 },
      { responsivePriority: 3 },
      { responsivePriority: 4 },
      { responsivePriority: 5 },
      { responsivePriority: 6 },
      { responsivePriority: 2 },
    ],
    language: langDataTable,
  });

  $('#table_unitkerja').DataTable({
    responsive: true,
    columns: [
      { responsivePriority: 1 },
      { responsivePriority: 3 },
      { responsivePriority: 2 }
    ],
    language: langDataTable,
  });

  $('#table_komoditas').DataTable({
    responsive: true,
    columns: [
      { responsivePriority: 1 },
      { responsivePriority: 3 },
      { responsivePriority: 2 }
    ],
    language: langDataTable,
  });

  $('#table_kotakomoditas').DataTable({
    responsive: true,
    columns: [
      { responsivePriority: 3 },
      { responsivePriority: 1 },
      { responsivePriority: 4 },
      { responsivePriority: 2 }
    ],
    language: langDataTable,
  });

  $('#table_komoditas_tambah').DataTable({
    responsive: true,
    columns: [
      { responsivePriority: 1 },
      { responsivePriority: 2 },
      { responsivePriority: 3 },
    ],
    language: langDataTable,
  });

  $('#table_kelompoktani').DataTable({
    scrollX: true,
    language: langDataTable,
  });

  $('#table').DataTable({
    language: langDataTable,
  });

  $("#select2").select2();

});
