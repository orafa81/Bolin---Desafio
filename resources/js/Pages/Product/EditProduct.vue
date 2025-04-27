<script setup>
import FormProduct from '../Components/FormProduct.vue'
import { route } from 'ziggy-js'

defineProps({
  product: Object
})
</script>

<template>
  <div>
    <FormProduct :product="product" :action="route('product.update', product.id)" method="put" submit-label="Editar" />
  </div>
</template>

