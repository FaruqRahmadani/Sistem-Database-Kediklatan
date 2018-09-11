<template>
  <div>
    <FieldDaerah
      :api ="this.api"
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
  props: ['api'],
  components: {
    FieldDaerah
  },
}
$(document).ready(function() {
  $(document).ready(function() {
    $("#komoditas").select2();
    $('#kota').change(function(){
      if (this.value) {
        var $komoditas = $('#komoditas');
        $komoditas.find('option').remove().end();
        $komoditas.prop('disabled');
        axios({
          method: 'get',
          url: '/api/daerahkomoditas/'+this.value,
        }).then((response) => {
          $.each(response.data, function(index, value) {
            $komoditas.append('<option value="' + value.id + '">' + value.nama + '</option>');
          });
          $komoditas.prop('disabled', false);
        });
      }
    })
  })
});
</script>
