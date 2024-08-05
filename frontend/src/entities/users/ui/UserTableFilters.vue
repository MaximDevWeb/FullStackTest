<script setup lang="ts">
import useStore from "../model/store";
import { VDateInput } from "vuetify/labs/VDateInput";

const store = useStore();

const updateData = () => {
  store.search = new Date().toString();
};
</script>

<template>
  <div class="d-flex ga-3 my-8">
    <div class="w-25">
      <VTextField
        label="Введите ФИО"
        v-model="store.name"
        @input="updateData"
      />
    </div>

    <div>
      <VSwitch
        label="Активные пользователи"
        color="primary"
        v-model="store.active"
        @change="updateData"
      />
    </div>

    <div class="w-[100px]">
      <VTextField
        label="Активность с"
        type="date"
        v-model="store.activityFrom"
        @change="updateData"
      />
    </div>

    <div class="w-[100px]">
      <VTextField
        label="Активность по"
        type="date"
        v-model="store.activityTo"
        @change="updateData"
      />
    </div>
  </div>
</template>
