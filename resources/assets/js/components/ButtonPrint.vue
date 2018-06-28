<template>
  <button class="btn btn-info btn-sm" @click="redirect(url)">
    <span class="fa fa-print img-circle text-default"></span>
    Cetak
  </button>
</template>

<script>
export default {
  props: ['url'],
  methods: {
    redirect(link){
      window.open(link, '_blank');
    }
  },
}
</script>
