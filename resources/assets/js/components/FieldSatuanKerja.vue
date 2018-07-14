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
          <input type="text" v-model="nama" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Alamat</label>
        <div class="col-md-10">
          <input type="text" v-model="alamat" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Provinsi</label>
        <div class="col-md-10">
          <select class="form-control input-lg" v-model="ProvinsiId" @change="showKota(ProvinsiId)" required>
            <option value="">Provinsi</option>
            <option v-for="dataprovinsi in this.dataprovinsi" :value="dataprovinsi.id">{{dataprovinsi.nama_provinsi}}</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Kab/Kota</label>
        <div class="col-md-10">
          <select class="form-control input-lg" v-model="KotaId" required>
            <option value="">Kota</option>
            <option v-for="datakota in this.datakota" :value="datakota.id">{{datakota.nama_kota}}</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Nomor Telepon</label>
        <div class="col-md-10">
          <input type="text" v-model="nomor_telepon" class="form-control" required>
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
  props: ['api', 'satkerja', 'provinsi', 'kota'],
  data: function(){
    return {
      dataprovinsi : '',
      datakota : '',
      ProvinsiId : this.provinsi,
      KotaId : this.kota,
      datasatkerja : null,
      SatKerjaId : this.satkerja,
      nama : null,
      alamat : null,
      nomor_telepon : null,
    }
  },
  mounted: function(){
    this.getSatuanKerja(),
    axios({
      method: 'get',
      url: '/api/dataprovinsi',
      headers: { Authorization: 'Bearer '+this.api },
    }).then((response) => {
      this.dataprovinsi = response.data
      if (this.kota != null) {
        this.searchKey(this.dataprovinsi, this.provinsi)
      }
    })
  },
  methods: {
    getSatuanKerja(){
      axios({
        method: 'get',
        url: '/api/satuankerja/data',
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        this.datasatkerja = response.data
      })
    },
    searchKey(data, key = null){
      var returnData = []
      $.each(data, function(index, value){
        returnData.push(value.id)
      })
      console.log(returnData.lastIndexOf(parseInt(key)))
      if (returnData.lastIndexOf(parseInt(key)) != '-1') {
        this.showKota(this.ProvinsiId)
      }
    },
    showKota(ProvinsiId){
      axios({
        method: 'get',
        url: '/api/datakota/'+ProvinsiId,
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        this.datakota = response.data
      })
    },
    submit(){
      axios({
        method: 'post',
        url: '/api/satuankerja/tambah',
        data: {
          nama: this.nama,
          alamat: this.alamat,
          nomor_telepon: this.nomor_telepon,
          provinsi_id: this.ProvinsiId,
          kota_id: this.KotaId,
        },
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        console.log(response.data)
        this.getSatuanKerja()
        this.SatKerjaId = response.data
      }).catch(error => {
        notif('error', 'Data Kosong', 'Mohon Isi Seluruh Data');
      });
    },
  },
  watch: {
    SatKerjaId: function (val){
      if (val == 0) {
        $( "#submit" ).prop('disabled', true);
      }else{
        $( "#submit" ).prop('disabled', false);
      }
    }
  }
}
</script>
