<template>
  <div>
    <div class="form-group">
      <label class="col-md-2 control-label">Satuan Kerja</label>
      <div class="col-md-10">
        <div class="input-group">
          <select name="satuan_kerja_id" class="form-control input-lg" v-model="SatKerjaId">
            <option v-for="datasatkerja in this.datasatkerja" :value="datasatkerja.id">{{datasatkerja.nama}}</option>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalSatuanKerja">Tambah Baru</button>
          </span>
        </div>
      </div>
    </div>
    <div>
      <div class="modal fade" id="modalSatuanKerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 class="modal-title">Tambah Satuan Kerja</h3>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="col-md-12">
                  <label>Nama Satuan Kerja</label>
                  <input type="text" v-model="nama" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label>Alamat</label>
                  <input type="text" v-model="alamat" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label>Provinsi</label>
                  <select class="form-control input-lg" v-model="ProvinsiId" @change="showKota(ProvinsiId)">
                    <option value="">Provinsi</option>
                    <option v-for="dataprovinsi in this.dataprovinsi" :value="dataprovinsi.id">{{dataprovinsi.nama}}</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label>Kab/Kota</label>
                  <select class="form-control input-lg" v-model="KotaId">
                    <option value="">Kota</option>
                    <option v-for="datakota in this.datakota" :value="datakota.id">{{datakota.nama}}</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label>Nomor Telepon</label>
                  <input type="text" v-model="nomor_telepon" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" name="button" class="btn btn-info btn-fill" @click="submit" data-dismiss="modal">Simpan</button>
            </div>
          </div>
        </div>
      </div>
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
        this.nama=null
        this.alamat=null
        this.nomor_telepon=null
        this.provinsi_id=null
        this.kota_id=null
      }).catch(error => {
        notif('error', 'Data Kosong', 'Mohon Isi Seluruh Data');
      });
    },
  },
}
</script>
