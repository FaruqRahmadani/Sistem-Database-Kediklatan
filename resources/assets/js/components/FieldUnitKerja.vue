<template>
  <div>
    <div class="form-group">
      <label class="col-md-2 control-label">Unit Kerja</label>
      <div class="col-md-10">
        <select name="unit_kerja_id" class="form-control input-lg" v-model="UnitKerjaId" required>
          <option value="0">Buat Baru</option>
          <option disabled>----------</option>
          <option v-for="dataunitkerja in this.dataunitkerja" :value="dataunitkerja.id">{{dataunitkerja.nama}}</option>
        </select>
      </div>
    </div>
    <div v-if="UnitKerjaId == 0">
      <hr>
      <div class="form-group">
        <label class="col-md-2 control-label">Nama Unit Kerja</label>
        <div class="col-md-10">
          <input type="text" v-model="nama" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Alamat</label>
        <div class="col-md-10">
          <input type="text" v-model="alamat" class="form-control" required>
        </div>
      </div>
      <div class="row">
        <div class="text-center">
          <div class="col-md-12">
            <button type="button" name="button" class="btn btn-info btn-fill" @click="submit">Simpan</button>
          </div>
        </div>
      </div>
      <hr>
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
  watch: {
    UnitKerjaId: function (val){
      if (val == 0) {
        $( "#submit" ).prop('disabled', true);
      }else{
        $( "#submit" ).prop('disabled', false);
      }
    }
  }
}
</script>
