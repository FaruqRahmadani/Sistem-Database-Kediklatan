<template>
  <button class="btn btn-info btn-xs" @click.passive="redirect(url)">
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
