import { defineStore } from "pinia";
import { ref, watchEffect } from "vue";

const useStore = defineStore("table_data", () => {
  const perPage = ref(25);
  const serverItems = ref<any[]>([]);
  const loading = ref(false);
  const totalItems = ref(0);
  const search = ref("");

  const name = ref("");
  const active = ref(false);
  const activityFrom = ref("");
  const activityTo = ref("");

  const header: any[] = [
    { title: "ФИО", align: "start", sortable: true, key: "full_name" },
    { title: "Активен", align: "end", sortable: true, key: "active" },
    {
      title: "Последняя активность",
      align: "start",
      sortable: true,
      key: "last_activity_at",
    },
  ];

  return {
    perPage,
    serverItems,
    loading,
    totalItems,
    header,
    search,

    name,
    active,
    activityFrom,
    activityTo,
  };
});

export default useStore;
