<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import NavBar from "./Components/NavBar.vue";

const props = defineProps({
  list: Object,
});
</script>

<template>
  <NavBar />

  <section class="bg-chocolate py-8 md:py-16">
    <div
      class="mx-auto items-center grid max-w-screen-xl px-4 pb-8 md:grid-cols-12 lg:gap-12 lg:pb-16 xl:gap-0"
    >
      <div
        class="content-center justify-self-start md:col-span-7 md:text-start"
      >
        <h1
          class="mb-4 text-white text-4xl font-extrabold leading-none tracking-tight md:max-w-2xl md:text-5xl xl:text-6xl"
        >
          Traga sua confeitaria<br />para o nosso site!
        </h1>
        <p
          class="mb-4 max-w-2xl text-bombom-100 md:mb-12 md:text-lg mb-3 lg:mb-5 lg:text-xl"
        >
          Bolin é o melhor maketplace para sua confeitaria!
        </p>
        <Link
          :href="route('confectionery.create')"
          class="inline-block rounded-lg bg-bombom-300 px-6 py-3.5 text-center font-medium text-white hover:bg-bombom-400 focus:outline-none focus:ring-4 focus:ring-bombom-200"
          >Criar Confeitaria</Link
        >
      </div>
      <div class="hidden md:col-span-5 md:mt-0 md:flex">
        <img
          class=""
          src="/public/images/Bolo.png"
          alt="shopping illustration"
        />
        <img
          class="hidden"
          src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/girl-shopping-list-dark.svg"
          alt="shopping illustration"
        />
      </div>
    </div>
  </section>

  <section class="py-8 antialiased md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div
        class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4"
      >
        <div
          v-for="product in list"
          :key="product.id"
          class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm"
        >
          <div class="h-56 relative w-full">
            <a href="#">
              <img
                class="mx-auto h-full"
                v-if="product.imagens.length"
                :src="`/storage/${product.imagens[0].path}`"
                alt=""
              />
            </a>
          </div>
          <div class="pt-6">
            <a
              href="#"
              class="text-lg font-semibold leading-tight text-gray-900 hover:underline"
              >{{ product.name }}</a
            >

            <ul class="mt-2 flex items-center gap-4">
              <li class="flex items-center gap-2">
                <svg
                  class="h-4 w-4 text-gray-500"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"
                  />
                </svg>
                <p class="text-sm font-medium text-gray-500">Fast Delivery</p>
              </li>

              <li class="flex items-center gap-2">
                <svg
                  class="h-4 w-4 text-gray-500"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-width="2"
                    d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"
                  />
                </svg>
                <p class="text-sm font-medium text-gray-500">Melhor Preço</p>
              </li>
            </ul>

            <div class="mt-4 flex items-center justify-between gap-4">
              <p class="text-2xl font-extrabold leading-tight text-gray-900">
                R${{ product.value }}
              </p>

              <Link
                :href="route('product.show', product.id)"
                class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
              >
                Ver Doce
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div v-if="$page.props.flash.success" class="bg-green-200 p-2 rounded">
    {{ $page.props.flash.success }}
  </div>
</template>
