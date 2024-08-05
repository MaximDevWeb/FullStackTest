<script setup lang="ts">
import "./assets/styles/app.scss";
import "@mdi/font/css/materialdesignicons.css";
import { DefaultLayout } from "@/pages/DefaultLayout";
</script>

<template>
  <DefaultLayout>
    <RouterView />
  </DefaultLayout>
</template>
