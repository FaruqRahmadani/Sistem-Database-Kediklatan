<template>
  <div>
    <button class="btn btn-primary btn-sm" @click="redirect(url)">
      <span class="fa fa-reply img-circle text-default"></span>
      Kembali
    </button>
  </div>
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
