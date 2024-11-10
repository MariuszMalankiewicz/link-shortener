<template>
  <div>
      <input v-model="url" placeholder="Wprowadź URL" class="text-[18px] min-w-[200px] w-[50%] border-b-2">
      <button @click="shortenUrl" class="text-[18px]">Skróć</button>

      <div v-if="shortUrl">
          Skrócony link: <a :href="url" target="_blank">{{ shortUrl }}</a>
      </div>
  </div>
</template>

<script>
export default {
  data() {
      return {
          url: '',
          shortUrl: ''
      };
  },
  methods: {
      async shortenUrl() {
          const response = await axios.post('/shorten', { original_url: this.url });
          this.shortUrl = response.data.short_url;
      }
  }
};
</script>
