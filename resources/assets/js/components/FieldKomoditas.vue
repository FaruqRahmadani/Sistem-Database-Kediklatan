<template>
  <div>
    <div class="form-group">
      <p v-for="datakomoditas in this.datakomoditas">{{datakomoditas.nama}}</p>
      <input type="text" name="komoditas_id[]" :value="this.selectedKomoditasId">
      <label class="col-md-2 control-label">Komoditas</label>
      <div class="col-md-10">
        <div class="input-group">
          <select name="komoditas_id" class="form-control input-lg" v-model="KomoditasId" required>
            <option v-for="komoditas in this.komoditas" :value="komoditas.id">{{komoditas.nama}}</option>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-info" type="button" @click="addKomoditas">
              <i class="fa fa-plus"></i>
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['api', 'komoditas'],
  data: function(){
    return {
      datakomoditas : [],
      KomoditasId : this.komoditas,
      selectedKomoditasId : [],
    }
  },
  mounted: function(){
    axios({
      method: 'get',
      url: '/api/datakomoditas',
      headers: { Authorization: 'Bearer '+this.api },
    }).then((response) => {
      this.komoditas = response.data
    })
  },
  methods: {
    addKomoditas: function(){
      axios({
        method: 'get',
        url: '/api/datakomoditas/'+this.KomoditasId,
        headers: { Authorization: 'Bearer '+this.api },
      }).then((response) => {
        this.KomoditasNama = response.data.nama
        this.datakomoditas.push({
          id: this.KomoditasId,
          nama: this.KomoditasNama
        })
        this.selectedKomoditasId.push(this.KomoditasId)
        this.KomoditasId = 0
      })
    },
  },
}
</script>
