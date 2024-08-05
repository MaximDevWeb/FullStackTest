<script setup lang="ts">
import useStore from "../model/store";
import useApi from "../model/api";

const store = useStore();
const { load } = useApi();
</script>

<template>
  <v-data-table-server
    v-model:items-per-page="store.perPage"
    :headers="store.header"
    :items="store.serverItems"
    :items-length="store.totalItems"
    :loading="store.loading"
    :search="store.search"
    @update:options="load"
  />
</template>
