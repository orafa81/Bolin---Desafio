<script setup>
import FormConfectionery from '../Components/FormConfectionery.vue'
import { route } from 'ziggy-js'

defineProps({
  confectionery: Object
})
</script>

<template>
  <div>
    <FormConfectionery :confectionery="confectionery" :action="route('confectionery.update', confectionery.id)" method="put" submit-label="Editar" />
  </div>
</template>

