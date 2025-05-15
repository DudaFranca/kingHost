import { ref, computed } from 'vue';
import { defineStore } from 'pinia';
import api from '../services/axios';

export const useMoviesStore = defineStore('movies', {
  state: () => ({
    movies: ref([]),
    favoriteMovies: ref([]),
    favoriteMovie: ref([]),
  }),

  actions: {
    async getMoviesAction() {
      try {
        const response = await api.get('movies');
        this.movies.value = response.data.data;
      } catch (error) {
        console.error('Erro ao buscar filmes:', error);
      }
    },

    async searchMoviesAction(payload) {
      try {
        const response = await api.get('movies/search', {
          search: payload,
        });
        this.movies.value = response.data.data;
      } catch (error) {
        console.error('Erro ao buscar filmes:', error);
      }
    },

    async getFavoriteMoviesAction() {
      try {
        const response = await api.get('favorite-movie');
        console.log(response.data.data);

        this.favoriteMovies.value = response.data.data;
      } catch (error) {
        console.error('Erro ao buscar filmes favoritos:', error);
      }
    },

    async createFavoriteAction(payload) {
      try {
        const response = await api.post(
          `favorite-movie/${payload.id}`,
          payload,
        );
        this.favoriteMovie.value = response.data.data;
      } catch (error) {
        console.error('Erro ao favoritar filme:', error);
      }
    },

    async deleteFavoriteAction(payload) {
      try {
        await api.delete(`favorite-movie/${payload.id}`);
      } catch (error) {
        console.error('Erro ao desfavoritar filme:', error);
      }
    },
  },
});
