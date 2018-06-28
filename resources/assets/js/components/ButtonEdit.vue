<template>
  <button class="btn btn-info btn-sm" @click.passive="redirect(url)">
    Edit
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
