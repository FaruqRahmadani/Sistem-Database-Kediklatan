<template>
  <div>
    <div class="form-group">
      <label class="col-md-2 control-label">Unit Kerja</label>
      <div class="col-md-10">
        <div class="input-group">
          <select id="unitkerja" name="unit_kerja_id" class="form-control input-lg" v-model="UnitKerjaId" required>
            <option v-for="dataunitkerja in this.dataunitkerja" :value="dataunitkerja.id">{{dataunitkerja.nama}}</option>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalUnitKerja">Tambah Baru</button>
          </span>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalUnitKerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title">Tambah Unit Kerja</h3>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="col-md-12">
                <label>Nama Unit Kerja</label>
                <input type="text" v-model="nama" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Alamat</label>
                <input type="text" v-model="alamat" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="button" name="button" class="btn btn-info btn-fill" @click="submit" data-dismiss="modal">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['api', 'unitkerja'],
  data: function(){
    return {
      dataunitkerja : null,
      UnitKerjaId : this.unitkerja,
      nama: null,
      alamat: null,
    }
  },
  mounted: function(){
    this.getUnitKerja()
  },
  methods: {
    getUnitKerja(){
      axios({
        method: 'get',
        url: '/api/unitkerja/data',
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        this.dataunitkerja = response.data
      })
    },
    submit(){
      axios({
        method: 'post',
        url: '/api/unitkerja/tambah',
        data: {
          nama: this.nama,
          alamat: this.alamat,
        },
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        console.log(response.data)
        this.getUnitKerja()
        this.UnitKerjaId = response.data
      }).catch(error => {
        notif('error', 'Data Kosong', 'Mohon Isi Seluruh Data');
      });
    }
  },
}
$(document).ready(function() {
  $(document).ready(function() {
    $('#unitkerja').select2();
  });
});
</script>
