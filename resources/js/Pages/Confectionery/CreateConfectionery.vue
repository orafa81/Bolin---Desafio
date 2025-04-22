<script setup>
import FormConfectionery from '../Components/FormConfectionery.vue'
import { route } from 'ziggy-js'
</script>

<template>
  <div>
    <FormConfectionery :action="route('confectionery.store')" submit-label="Cadastrar" />
  </div>
</template>

