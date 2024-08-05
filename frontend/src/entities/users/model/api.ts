import useStore from "@/entities/users/model/store";

const useApi = () => {
  const store = useStore();
  const url = new URL("http://127.0.0.1:8000/api/v1/users");

  const load = async (props: any) => {
    store.loading = true;

    try {
      url.searchParams.set("page", props.page);
      url.searchParams.set("per_page", props.itemsPerPage);
      url.searchParams.set("name", store.name);
      url.searchParams.set("activity_from", store.activityFrom);
      url.searchParams.set("activity_to", store.activityTo);

      if (store.active) {
        url.searchParams.set("active", "1");
      } else {
        url.searchParams.delete("active");
      }

      if (props.sortBy.length) {
        url.searchParams.set("sort_by", props.sortBy[0].key);
        url.searchParams.set("sort_direction", props.sortBy[0].order);
      }

      const result = await fetch(url.toString(), {
        method: "get",
        headers: {
          Accept: "application/json",
        },
      });

      const data = await result.json();

      store.serverItems = data.data;
      store.totalItems = data.meta.total;
    } catch (e) {
      console.log("Ошибка загрузки");
    }

    store.loading = false;
  };

  return { load };
};

export default useApi;
