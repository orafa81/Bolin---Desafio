<script setup>
import NavBar from '../Components/NavBar.vue'
import { Link, router } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import { onMounted } from "vue";
import L from "leaflet";
import "leaflet/dist/leaflet.css";

const props = defineProps({
  data: Object,
  data_product: Object,
});

const deletar = (id) => {
  if (confirm("Tem certeza que deseja excluir este confectionery?")) {
    router.delete(route("product.destroy", id));
  }
};

onMounted(() => {
  const map = L.map("map").setView(
    [props.data.latitude, props.data.longitude],
    15
  );

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "&copy; OpenStreetMap contributors",
  }).addTo(map);

  L.marker([props.data.latitude, props.data.longitude])
    .addTo(map)
    .bindPopup(props.data.name)
    .openPopup();
});
</script>

<template>
  <NavBar/>
  <section class=" py-8 antialiased md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="py-4 md:py-8">
        <div class="mb-4 grid gap-4 sm:grid-cols-2 sm:gap-8 lg:gap-16">
          <div class="space-y-4">
            <div class="flex space-x-4">
              <div>
                <span
                  class="mb-2 inline-block rounded bg-bombom-50 px-2.5 py-0.5 text-xs font-medium text-bombom-400"
                >
                  Perfil da Confeitaria
                </span>
                <h2
                  class="flex items-center text-xl font-bold leading-none text-gray-900 sm:text-2xl"
                >
                  {{ data.name }}
                </h2>
              </div>
            </div>

            <dl>
              <dt class="font-semibold text-gray-900">Telefone</dt>
              <dd class="text-gray-500">
                {{ data.telephone }}
              </dd>
            </dl>
            <dl>
              <dt class="font-semibold text-gray-900">Eendereço</dt>
              <dd class="flex items-center gap-1 text-gray-500">
                <svg
                  class="hidden h-5 w-5 shrink-0 text-gray-400 lg:inline"
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
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"
                  />
                </svg>
                {{ data.road }}, {{ data.neighborhood }}, {{ data.number }},
                {{ data.city }} - {{ data.state }}
              </dd>
            </dl>
            <dl>
              <dt class="font-semibold text-gray-900">My Companies</dt>
              <dd class="text-gray-500">FLOWBITE LLC, Fiscal code: 18673557</dd>
            </dl>
            <dl>
              <dt class="mb-1 font-semibold text-gray-900">Payment Methods</dt>
              <dd class="flex items-center space-x-4 text-gray-500">
                <div
                  class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-gray-100"
                >
                  <img
                    class="h-4 w-auto"
                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg"
                    alt=""
                  />
                  <img
                    class="hidden h-4 w-auto dark:flex"
                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa-dark.svg"
                    alt=""
                  />
                </div>
                <div>
                  <div class="text-sm">
                    <p class="mb-0.5 font-medium text-gray-900">
                      Visa ending in 7658
                    </p>
                    <p class="font-normal text-gray-500">Expiry 10/2024</p>
                  </div>
                </div>
              </dd>
            </dl>
          </div>
          <div class="space-y-4">
            <div>
              <h1>{{ data.nome }}</h1>

              <div id="map" style="height: 400px; width: 100%"></div>
            </div>
          </div>
        </div>
        <div
          class="mb-4 grid gap-2 sm:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7"
        >
          <Link
            :href="route('confectionery.edit', data.id)"
            class="inline-flex w-full items-center justify-center rounded-lg bg-bombom-300 px-5 py-2.5 text-sm font-medium text-white hover:bg-bombom-400 focus:outline-none focus:ring-4 focus:ring-bombom-00 sm:w-auto"
          >
            <svg
              class="-ms-0.5 me-1.5 h-4 w-4"
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
                stroke-linejoin="round"
                stroke-width="2"
                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"
              ></path>
            </svg>
            Editar Confeitaria
          </Link>

          <Link
            :href="route('product.create', { confectionery: data.id })"
            class="inline-flex w-full items-center justify-center rounded-lg bg-bombom-300 px-5 py-2.5 text-sm font-medium text-white hover:bg-bombom-400 focus:outline-none focus:ring-4 focus:ring-bombom-100 sm:w-auto"
          >
            Add Produto
          </Link>
        </div>
      </div>

      <div class="rounded-lg border border-gray-200  p-4 md:p-8">
        <div
          class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4"
        >
          <div
            v-for="product in data_product.data"
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
              <button
                @click="deletar(product.id)"
                class="absolute top-1 right-1 bg-red-600 text-white rounded-full px-2 text-xs hover:bg-red-70"
              >
                X
              </button>
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
                  :href="route('product.edit', product.id)"
                  class="inline-flex items-center rounded-lg bg-bombom-300 px-5 py-2.5 text-sm font-medium text-white hover:bg-bombom-400 focus:outline-none focus:ring-4 focus:ring-bombom-100"
                >
                  Editar Produto
                </Link>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-4 flex gap-2">
          <button @click="$inertia.visit(data_product.prev_page_url)">
            Anterior
          </button>
          <button @click="$inertia.visit(data_product.next_page_url)">
            Próximo
          </button>
        </div>
      </div>
    </div>
  </section>
</template>


<style>
</style>