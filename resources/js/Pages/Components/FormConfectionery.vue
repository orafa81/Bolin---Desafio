<script setup>
import { useForm } from "@inertiajs/vue3";
import { computed, toRefs } from "vue";
import axios from 'axios'

const props = defineProps({
  confectionery: {
    type: Object,
    default: () => ({
      name: "",
      cep: "",
      road: "",
      number: "",
      neighborhood: "",
      city: "",
      state: "",
      telephone: "",
      latitude: "",
      longitude: "",
    }),
  },
  method: {
    type: String,
    default: "post",
  },
  action: {
    type: String,
    required: true,
  },
  submitLabel: {
    type: String,
    default: "Salvar",
  },
});

const buscarEndereco = async () => {
  const cepLimpo = form.cep.replace(/\D/g, '')
  if (cepLimpo.length !== 8) return

  try {
    const response = await axios.get(`https://viacep.com.br/ws/${cepLimpo}/json/`)
    const data = response.data

    if (data.erro) {
      alert('CEP não encontrado.')
      return
    }

    form.road = data.logradouro
    form.neighborhood = data.bairro
    form.city = data.localidade
    form.state = data.uf
  } catch (error) {
    console.error('Erro ao buscar CEP:', error)
    alert('Erro ao buscar o CEP.')
  }
}


const form = useForm({ ...props.confectionery });

const submit = () => {
  if (props.method.toLowerCase() === "post") {
    form.post(props.action);
  } else if (props.method.toLowerCase() === "put") {
    form.put(props.action);
  }
};
</script>

<template>
  <section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900">
        {{ submitLabel }} confeitaria!
      </h2>
      <form @submit.prevent="submit" :disabled="form.processing">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          <div class="sm:col-span-2">
            <label
              for="name"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Nome da Confeitaria</label
            >
            <input
              type="text"
              id="name"
              v-model="form.name"
              name="name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: CakeBom"
              required=""
            />
            <p v-if="form.errors.name" class="text-red-500 text-sm">
              {{ form.errors.name }}
            </p>
          </div>
          <div class="w-full">
            <label
              for="cep"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Cep</label
            >
            <input
              type="text"
              id="cep"
              v-model="form.cep"
              @blur="buscarEndereco"
              name="cep"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: 68719-000"
              required=""
            />
            <p v-if="form.errors.cep" class="text-red-500 text-sm">
              {{ form.errors.cep }}
            </p>
          </div>
          <div class="w-full">
            <label
              for="city"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Cidade</label
            >
            <input
              type="text"
              id="city"
              v-model="form.city"
              name="city"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: Fortaleza"
              required=""
            />
            <p v-if="form.errors.city" class="text-red-500 text-sm">
              {{ form.errors.city }}
            </p>
          </div>
          <div class="w-full">
            <label
              for="state"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Estado</label
            >
            <input
              type="text"
              id="state"
              v-model="form.state"
              name="state"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: Ceará"
              required=""
            />
            <p v-if="form.errors.state" class="text-red-500 text-sm">
              {{ form.errors.state }}
            </p>
          </div>
          <div class="w-full">
            <label
              for="neighborhood"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Bairro</label
            >
            <input
              type="text"
              id="neighborhood"
              v-model="form.neighborhood"
              name="neighborhood"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: Cidade Velha"
              required=""
            />
            <p v-if="form.errors.neighborhood" class="text-red-500 text-sm">
              {{ form.errors.neighborhood }}
            </p>
          </div>
          <div class="sm:col-span-2">
            <label
              for="road"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Rua</label
            >
            <input
              type="text"
              id="road"
              v-model="form.road"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: Rua João Aphonso"
              required=""
            />
            <p v-if="form.errors.road" class="text-red-500 text-sm">
              {{ form.errors.road }}
            </p>
          </div>
          <div class="w-full">
            <label
              for="number"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Número</label
            >
            <input
              type="text"
              id="number"
              v-model="form.number"
              name="number"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: 345"
              required=""
            />
            <p v-if="form.errors.number" class="text-red-500 text-sm">
              {{ form.errors.number }}
            </p>
          </div>
          <div class="w-full">
            <label
              for="telephone"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Telefone</label
            >
            <input
              type="text"
              id="telephone"
              v-model="form.telephone"
              name="telephone"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: (84) 99966-5555"
              required=""
            />
            <p v-if="form.errors.telephone" class="text-red-500 text-sm">
              {{ form.errors.telephone }}
            </p>
          </div>
          <div>
            <label
              for="latitude"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Latitude</label
            >
            <input
              type="number"
              step="0.000001"
              id="latitude"
              v-model="form.latitude"
              name="latitude"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: 180"
              required=""
            />
            <p v-if="form.errors.latitude" class="text-red-500 text-sm">
              {{ form.errors.latitude }}
            </p>
          </div>
          <div>
            <label
              for="longitude"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Longitude</label
            >
            <input
              type="number"
              step="0.000001"
              id="longitude"
              v-model="form.longitude"
              name="longitude"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              placeholder="Ex: -54"
              required=""
            />
            <p v-if="form.errors.longitude" class="text-red-500 text-sm">
              {{ form.errors.longitude }}
            </p>
          </div>
        </div>
        <button
          type="submit"
          :disabled="form.processing"
          class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800"
        >
          <span v-if="form.processing">Enviando...</span>
          <span v-else>{{ submitLabel }}</span>
        </button>
      </form>
    </div>
  </section>
</template>