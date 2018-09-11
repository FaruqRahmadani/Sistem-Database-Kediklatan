<template>
  <div>
    <div class="form-group">
      <label class="col-md-2 control-label">Provinsi</label>
      <div class="col-md-10">
        <select name="provinsi_id" class="form-control input-lg" v-model="ProvinsiId" @change="showKota" :disabled="disable == 1" required>
          <option value="">Provinsi</option>
          <option v-for="dataprovinsi in this.dataprovinsi" :value="dataprovinsi.id">{{dataprovinsi.nama}}</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-2 control-label">Kab/Kota</label>
      <div class="col-md-10">
        <select name="kota_id" id="kota" class="form-control input-lg" v-model="KotaId" :disabled="disable == 1" required>
          <option value="">Kota</option>
          <option v-for="datakota in this.datakota" :value="datakota.id">{{datakota.nama}}</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['api', 'provinsi', 'kota', 'disabled'],
  data: function(){
    return {
      dataprovinsi : '',
      datakota : '',
      ProvinsiId : this.provinsi,
      KotaId : this.kota,
      disable : this.disabled,
    }
  },
  mounted: function(){
    this.showProvinsi()
    if (this.KotaId) {
      this.showKota()
    }
  },
  methods: {
    showProvinsi(){
      axios({
        method: 'get',
        url: '/api/dataprovinsi',
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        this.dataprovinsi = response.data
      })
    },
    showKota(){
      axios({
        method: 'get',
        url: '/api/datakota/'+this.ProvinsiId,
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        this.datakota = response.data
      })
    }
  },
}
</script>
