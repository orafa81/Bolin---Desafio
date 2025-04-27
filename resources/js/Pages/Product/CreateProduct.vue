<script setup>
import FormProduct from '../Components/FormProduct.vue'
import { route } from 'ziggy-js'
</script>

<template>
  <div>
    <FormProduct :action="route('product.store')" submit-label="Cadastrar" />
  </div>
</template>
