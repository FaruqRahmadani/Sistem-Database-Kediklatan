<template>
  <div>
    <div class="form-group">
      <label class="col-md-2 control-label">Satuan Kerja</label>
      <div class="col-md-10">
        <div class="input-group">
          <select id="satuankerja" name="satuan_kerja_id" class="form-control input-lg" v-model="SatKerjaId" required>
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 class="modal-title">Tambah Satuan Kerja</h3>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label class="col-md-2 col-sm-12 control-label">Nama Satuan Kerja</label>
                  <div class="col-md-10 col-sm-12">
                  <input type="text" v-model="nama" class="form-control">
                </div>
              </div>
              <div class="form-group">
                  <label class="col-md-2 col-sm-12 control-label">Alamat</label>
                  <div class="col-md-10 col-sm-12">
                  <input type="text" v-model="alamat" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Kab/Kota</label>
                <div class="col-md-10">
                  <select name="kota_id" class="form-control input-lg" v-model="KotaId">
                    <option value="">Kota</option>
                    <option v-for="datakota in this.datakota" :value="datakota.id">{{datakota.nama}}</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-md-2 col-sm-12 control-label">Nomor Telepon</label>
                  <div class="col-md-10 col-sm-12">
                  <input type="text" v-model="nomor_telepon" class="form-control">
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
  </div>
</template>

<script>
import FieldDaerah from './FieldDaerah-ProvKota'
export default {
  props: ['api', 'satkerja'],
  components: {
    FieldDaerah
  },
  data: function(){
    return {
      datakota: null,
      datasatkerja : null,
      SatKerjaId : this.satkerja,
      nama : null,
      alamat : null,
      nomor_telepon : null,
      KotaId : null,
    }
  },
  mounted: function(){
    this.getSatuanKerja()
    this.showKota()
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
    showKota(){
      axios({
        method: 'get',
        url: '/api/datakota/',
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
        this.kota_id=null
      }).catch(error => {
        notif('error', 'Data Kosong', 'Mohon Isi Seluruh Data')
      })
    },
  },
}
$(document).ready(function() {
  $(document).ready(function() {
    $('#satuankerja').select2()
  })
})
</script>
