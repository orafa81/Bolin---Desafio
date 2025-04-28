<template>
  <nav class="bg-white antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-8">
          <div class="shrink-0">
            <a href="#" title="" class="">
              <span class="self-center text-2xl font-semibold whitespace-nowrap"
                >Bolin</span
              >
            </a>
          </div>

          <ul
            class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center"
          >
            <li>
              <a
                href="#"
                title=""
                class="flex text-sm font-medium text-gray-900 hover:text-bombom-300"
              >
                Home
              </a>
            </li>
            <li class="shrink-0">
              <a
                href="#"
                title=""
                class="flex text-sm font-medium text-gray-900 hover:text-bombom-300"
              >
                Produtos
              </a>
            </li>
            <li class="shrink-0">
              <a
                href="#"
                title=""
                class="flex text-sm font-medium text-gray-900 hover:text-bombom-300"
              >
                Sobre nós
              </a>
            </li>
            
          </ul>
        </div>

        <div class="flex gap-2 items-center lg:space-x-2">
          <Link
            class="text-white bg-bombom-300 hover:bg-bombom-400 focus:ring-4 focus:outline-none focus:ring-bombom-200 font-medium rounded-lg text-sm px-4 py-2 text-center"
            :href="route('confectionery.create')"
            >Criar Confeitaria</Link
          >
          <Link
            class="text-bombom-300 border border-bombom-300 hover:bg-bombom-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-bombom-200 font-medium rounded-lg text-sm px-4 py-2 text-center"
            :href="route('confectionery.list')"
            >Nossas Confeitarias</Link
          >
          <button
            type="button"
            data-collapse-toggle="ecommerce-navbar-menu-1"
            aria-controls="ecommerce-navbar-menu-1"
            aria-expanded="false"
            class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md p-2 text-gray-900"
          >
            <span class="sr-only"> Open Menu </span>
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-width="2"
                d="M5 7h14M5 12h14M5 17h14"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import { ref } from "vue";


const isMenuOpen = ref(false);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
</script>

<style>

</style>