<script setup>
import OptionsDropdown from "../Components/OptionsDropdown.vue";
import { Link, router } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import { ref } from "vue";

defineProps({
  list: Array,
});

const deletar = (id) => {
  if (confirm("Tem certeza que deseja excluir este confectionery?")) {
    router.delete(route("confectionery.destroy", id));
  }
};

const openDropdownId = ref(null); // ID da confeitaria com dropdown aberto

const toggleDropdown = (id) => {
  openDropdownId.value = openDropdownId.value === id ? null : id;
};
</script>
 <!-- <Link :href="route('confectionery.create')" class="btn btn-blue mb-4">
      + Nova Confeitaria
    </Link> -->
<template>
  <section class="bg-gray-50 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
      <!-- Start coding here -->
      <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
        <div
          class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4"
        >
          <div class="w-full md:w-1/2">
            <form class="flex items-center gap-2">
              <label for="simple-search" class="sr-only">Search</label>
              <div class="relative w-full">
                <div
                  class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                >
                  <svg
                    aria-hidden="true"
                    class="w-5 h-5 text-gray-500"
                    fill="currentColor"
                    viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
                <input
                  type="text"
                  id="simple-search"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                  placeholder="Search"
                  required=""
                />
              </div>
              <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0"
              >
                <button
                  type="submit"
                  class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none"
                >
                  Buscar
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-4 py-3">Nome da Loja</th>
                <th scope="col" class="px-4 py-3">Endereço</th>
                <th scope="col" class="px-4 py-3">Cidade</th>
                <th scope="col" class="px-4 py-3">Telefone</th>
                <th scope="col" class="px-4 py-3">
                  <span class="sr-only">Actions</span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="confectionery in list"
                :key="confectionery.id"
                class="border-b border-gray-200"
              >
                <th
                  scope="row"
                  class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap"
                >
                  {{ confectionery.name }}
                </th>
                <td class="px-4 py-3">
                  {{ confectionery.road }}, {{ confectionery.neighborhood }},
                  {{ confectionery.number }}
                </td>
                <td class="px-4 py-3">
                  {{ confectionery.city }} - {{ confectionery.state }}
                </td>
                <td class="px-4 py-3">{{ confectionery.telephone }}</td>
                <td class="px-4 py-3 flex items-center justify-end">
                  <OptionsDropdown
                    :confectionery="confectionery"
                    :is-open="openDropdownId === confectionery.id"
                    @toggle="toggleDropdown(confectionery.id)"
                  />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</template>



