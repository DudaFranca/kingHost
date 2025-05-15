<template>
  <div>
    <Header />
    <div class="flex flex-wrap max-w-screen-lg m-auto mt-10">
      <div v-for="movie in movies" :key="movie.title" class="flex w-1/5 p-2">
        <Card :movie="movie" :favorites="favorites" />
      </div>      
    </div>
  </div>
</template>

<script setup>
    import { ref, onMounted, computed } from 'vue'
    import Header from '@/components/Header.vue'
    import Card from '@/components/Card.vue'
    import { useMoviesStore } from '@/stores/movie.js'

    const movieStore = useMoviesStore();  
    
    const movies = computed( () => movieStore.movies ? movieStore.movies.value : '');
    const favorites = computed( () => movieStore.favoriteMovies ? movieStore.favoriteMovies.value : '');

    onMounted(async () => {
      movieStore.getMoviesAction();
      movieStore.getFavoriteMoviesAction();
   });
</script>