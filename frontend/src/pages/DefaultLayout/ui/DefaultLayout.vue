<script setup lang="ts"></script>

<template>
  <VLayout>
    <VAppBar>
      <VAppBarTitle>Список пользователей</VAppBarTitle>
    </VAppBar>

    <VApp class="mt-16">
      <slot />
    </VApp>
  </VLayout>
</template>
