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
          <input type="text" name="nama_unitkerja" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Alamat</label>
        <div class="col-md-10">
          <input type="text" name="alamat_unitkerja" class="form-control" required>
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
    }
  },
  mounted: function(){
    axios({
      method: 'get',
      url: '/api/dataunitkerja',
      headers: { Authorization: 'Bearer '+this.api },
    }).then((response) => {
      this.dataunitkerja = response.data
    })
  },
}
</script>
