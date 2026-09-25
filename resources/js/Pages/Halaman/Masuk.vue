<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h2 class="text-2xl font-bold mb-6 text-center">Masuk - E-Laporan</h2>
      
      <div v-if="form.errors.username" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <span class="block sm:inline">{{ form.errors.username }}</span>
      </div>

      <form @submit.prevent="submit">
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2">Username / NIP</label>
          <input type="text" v-model="form.username" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required />
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2">Kata Sandi</label>
          <input type="password" v-model="form.password" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required />
        </div>
        <button type="submit" :disabled="form.processing" class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 disabled:opacity-50">
          Masuk
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    username: '',
    password: '',
});

const submit = () => {
    form.post('/masuk');
};
</script>
