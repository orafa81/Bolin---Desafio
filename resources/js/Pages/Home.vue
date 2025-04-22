<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";
</script>

<template>
  <div v-if="$page.props.flash.success" class="bg-green-200 p-2 rounded">
    {{ $page.props.flash.success }}
  </div>
  <h1>Welcome</h1>
  <p>Hello hei, welcome to your first Inertia app!</p>
  <Link :href="route('confectionery.create')">Nova Confeitaria</Link> <br />
  <Link :href="route('confectionery.list')">Listar Confeitaria</Link>
</template>