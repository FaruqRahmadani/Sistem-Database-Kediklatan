<template>
  <div>
    <div class="form-group">
      <label class="col-md-2 control-label">Kab/Kota</label>
      <div class="col-md-10">
        <select name="kota_id" id="kota" class="form-control input-lg" v-model="KotaId" :disabled="disable == 1" :required="!required">
          <option value=>Kota</option>
          <option v-for="datakota in this.datakota" :value="datakota.id">{{datakota.nama}}</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['api', 'kota', 'disabled', 'required'],
  data: function(){
    return {
      datakota : '',
      KotaId : this.kota,
      disable : this.disabled,
    }
  },
  mounted: function(){
    this.showKota()
  },
  methods: {
    showKota(){
      axios({
        method: 'get',
        url: '/api/datakota/',
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        this.datakota = response.data
      })
    }
  },
}
</script>
