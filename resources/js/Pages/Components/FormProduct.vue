<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const page = usePage();
const confectionery = new URLSearchParams(page.url.split("?")[1]).get(
  "confectionery"
);

const props = defineProps({
  product: {
    type: Object,
    default: () => ({
      confectioneries_id: "",
      name: "",
      value: "",
      description: "",
      images_products: null,
      deleted_images: null,
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

const form = useForm({ ...props.product });
const files = ref([]);
const previewUrls = ref([]);
const inputRef = ref(null);

if (form.confectioneries_id == "") {
  form.confectioneries_id = confectionery;
}


const handleFiles = (e) => {
  const selectedFiles = Array.from(e.target.files);

  selectedFiles.forEach((file) => {
    files.value.push(file);
    previewUrls.value.push(URL.createObjectURL(file));
  });

  form.images_products = [...files.value];

  inputRef.value.value = "";
};

const removeImage = (index) => {
  files.value.splice(index, 1);
  URL.revokeObjectURL(previewUrls.value[index]);
  previewUrls.value.splice(index, 1);
  form.images_products = [...files.value];
};

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
        {{ submitLabel }} produto!
      </h2>
      <form
        @submit.prevent="submit"
        enctype="multipart/form-data"
        :disabled="form.processing"
      >
      <h1>{{form.confectioneries_id}}</h1>
        <input
          type="number"
          id="confectioneries_id"
          v-model="form.confectioneries_id"
          name="confectioneries_id"
          class="hidden"
          required=""
        />
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          <div class="sm:col-span-2">
            <label
              for="name"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Nome do Produto</label
            >
  
            <input
              type="text"
              id="name"
              v-model="form.name"
              name="name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
              placeholder="Ex: CakeBom"
              required=""
            />
            <p v-if="form.errors.name" class="text-red-500 text-sm">
              {{ form.errors.name }}
            </p>
          </div>
          <div class="w-full">
            <label
              for="value"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Valor</label
            >
            <input
              type="number"
              id="value"
              v-model="form.value"
              name="value"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
              placeholder="Ex: 68719-000"
              required=""
            />
            <p v-if="form.errors.value" class="text-red-500 text-sm">
              {{ form.errors.value }}
            </p>
          </div>
          <div class="w-full">
            <label class="block text-sm font-medium text-gray-700 mb-2"
              >Selecione Imagens</label
            >
            <input
              ref="inputRef"
              type="file"
              multiple
              accept="images_products/*"
              @change="handleFiles"
              class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
            />
            <p v-if="form.errors.images_products" class="text-red-500 text-sm">
              {{ form.errors.images_products }}
            </p>
          </div>
          <!-- Preview das Imagens -->
          <div
            v-if="previewUrls.length"
            class="grid grid-cols-2 md:grid-cols-3 gap-4"
          >
            <div
              v-for="(src, index) in previewUrls"
              :key="index"
              class="relative rounded overflow-hidden border"
            >
              <img :src="src" alt="preview" class="w-full h-40 object-cover" />
              <button
                type="button"
                @click="removeImage(index)"
                class="absolute top-1 right-1 bg-red-600 text-white rounded-full px-2 text-xs hover:bg-red-700"
              >
                ✕
              </button>
            </div>
          </div>

          <div class="sm:col-span-2">
            <label
              for="description"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Descrição</label
            >
            <textarea
              id="description"
              v-model="form.description"
              rows="8"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
              placeholder="Descrição do produto aqui!"
            ></textarea>
            <p v-if="form.errors.description" class="text-red-500 text-sm">
              {{ form.errors.description }}
            </p>
          </div>
        </div>
        <button
          type="submit"
          :disabled="form.processing"
          class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800"
        >
          <span v-if="form.processing">Enviando...</span>
          <span v-else>{{ submitLabel }}</span>
        </button>
      </form>
    </div>
  </section>
</template>