<template>
  <div>
      <h2>Lista skróconych linków</h2>
      <ul>
          <li v-for="link in links" :key="link.short_code">
              <a :href="link.short_url" target="_blank">{{ link.short_url }}</a> - {{ link.original_url }}
          </li>
      </ul>
  </div>
</template>

<script>
export default {
  data() {
      return {
          links: []
      };
  },
  async created() {
      const response = await axios.get('/links');
      this.links = response.data;
  }
};
</script>
