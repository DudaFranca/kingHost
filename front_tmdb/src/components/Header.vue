<template>
  <header class="w-full bg-[#782DC8]">
    <nav class="max-w-screen-lg m-auto flex justify-between px-2 py-4">
      <div class="">
        <router-link to="/">
          <img src="../assets/image/catalogo.svg" class="h-12 text-purple" alt="Flowbite Logo" />
        </router-link>
      </div>

      <ul class="flex gap-4 items-center justify-center text-[#EBE6F0] font-bold">
        <li>
          <router-link to="/">Filmes</router-link>
        </li>
        <li>
          <router-link to="/favorites">Favoritos</router-link>
        </li>
      </ul>

      <div class="flex items-center justify-center">
        <div class="relative">
          <svg @click="search(searchInput)" class="absolute w-[25px] right-[13px] top-[7px] cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#782dc8" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
          <input v-model="searchInput" class="block w-full bg-[#EBE6F0] p-2 rounded-lg border-[#EBE6F0]" type="text" name="" id="" placeholder="Buscar..." />
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup>
  import { ref } from 'vue'
  import { useMoviesStore } from '@/stores/movie.js'

  const movieStore = useMoviesStore();
  const searchInput = ref('');

  function search (e) {
    movieStore.searchMoviesAction(e);
    searchInput.value = '';
  }
</script>