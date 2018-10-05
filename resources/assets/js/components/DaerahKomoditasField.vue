<template>
  <div>
    <FieldDaerah
      :api ="this.api"
      :kota ="this.kota"
    ></FieldDaerah>
    <div class="form-group">
      <label class="col-md-2 control-label">Komoditas</label>
      <div class="col-md-10">
        <select id="komoditas" name="komoditas_id[]" class="form-control input-lg"  multiple disabled required>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
import FieldDaerah from './FieldDaerah-ProvKota'
export default {
  props: ['api', 'kota', 'komoditas', 'keltani'],
  components: {
    FieldDaerah
  },
  mounted: function(){
    if (this.kota) {
      var idKota = this.kota
      var idKelTani = this.keltani
      $('#kota').ready(function(){
        $('#komoditas').prop('disabled', false)
        $("#kota").getKelTaniKomoditas(idKelTani)
        $("#kota").getKomoditas(idKota)
      })
    }
  },
}
$(document).ready(function() {
  $(document).ready(function() {
    var komoditasKelTani
    var selectedStatus
    $("#komoditas").select2()
    $('#kota').change(function(){
      if (this.value) {
        $("#kota").getKomoditas(this.value)
      }
    })
    $.fn.getKomoditas = function(idKota) {
      var $komoditas = $('#komoditas')
      $komoditas.find('option').remove().end()
      $komoditas.find('optgroup').remove().end()
      $komoditas.prop('disabled')
      axios({
        method: 'get',
        url: '/api/daerahkomoditas/'+idKota,
      }).then((response) => {
        $komoditas.append('<optgroup label="Komoditas Daerah Terpilih">')
        $.each(response.data.Selected, function(index, value) {
          if (komoditasKelTani) {
            selectedStatus = ""
            $.each(komoditasKelTani, function(indexKomoditas, valueKomoditas) {
              if (index == indexKomoditas) {
                selectedStatus = "selected"
              }
            })
          }
          $komoditas.append('<option value="' + value.id + '" '+selectedStatus+'>' + value.nama + '</option>')
        })
        $komoditas.append('</optgroup>')
        $komoditas.append('<optgroup label="Komoditas Lainnya">')
        $.each(response.data.notSelected, function(index, value) {
          $komoditas.append('<option value="' + value.id + '">' + value.nama + '</option>')
        })
        $komoditas.append('</optgroup>')
        $komoditas.prop('disabled', false)
      })
    }
    $.fn.getKelTaniKomoditas = function(idKelTani) {
      axios({
        method: 'get',
        url: '/api/keltanikomoditas/'+idKelTani,
      }).then((response) => {
        komoditasKelTani = response.data
      })
    }
  })
})
</script>
