<template>
  <div>
    <div class="form-group">
      <label class="col-md-2 control-label">Satuan Kerja</label>
      <div class="col-md-10">
        <select name="satuan_kerja_id" class="form-control input-lg" v-model="SatKerjaId" required>
          <option value="0">Buat Baru</option>
          <option disabled>----------</option>
          <option v-for="datasatkerja in this.datasatkerja" :value="datasatkerja.id">{{datasatkerja.nama}}</option>
        </select>
      </div>
    </div>
    <div v-if="SatKerjaId == 0">
      <hr>
      <div class="form-group">
        <label class="col-md-2 control-label">Nama Satuan Kerja</label>
        <div class="col-md-10">
          <input type="text" name="nama_satkerja" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Alamat</label>
        <div class="col-md-10">
          <input type="text" name="alamat_satkerja" class="form-control" required>
        </div>
      </div>
      <field-daerah-provkota
        :api = this.api
      ></field-daerah-provkota>
      <div class="form-group">
        <label class="col-md-2 control-label">Nomor Telepon</label>
        <div class="col-md-10">
          <input type="text" name="nomor_telepon_satkerja" class="form-control" required>
        </div>
      </div>
      <hr>
    </div>
  </div>
</template>

<script>
export default {
  props: ['api', 'satkerja'],
  data: function(){
    return {
      datasatkerja : null,
      SatKerjaId : this.satkerja,
    }
  },
  mounted: function(){
    axios({
      method: 'get',
      url: '/api/datasatuankerja',
      headers: { Authorization: 'Bearer '+this.api },
    }).then((response) => {
      this.datasatkerja = response.data
    })
  },
}
</script>
