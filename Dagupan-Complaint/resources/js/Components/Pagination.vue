<template>
  <div>
    <Component
      :is="link.url ? 'Link' : 'span'"
      v-for="link in links"
      v-bind:key="link.label"
      :href="link.url"
      v-html="link.label"
      class="text-black px-1"
      :class="{ 'text-gray-500': ! link.url, 'font-bold' : link.active }"
    />
  </div>
</template>

<script>
import {Link } from '@inertiajs/inertia-vue3'
export default {
  props: {
    links: Array
  },
  components:{
      Link
  }
};
</script>