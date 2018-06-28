<template>
  <button class="btn btn-primary btn-sm" @click="redirect(url)">
    <span class="fa fa-plus img-circle text-default"></span>
    Tambah Data
  </button>
</template>

<script>
export default {
  props: ['url'],
  methods: {
    redirect(link){
      window.location = link;
    }
  },
}
</script>
