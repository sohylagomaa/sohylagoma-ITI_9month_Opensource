import { ref } from "vue";
export function useApi(baseUrl) {
  const data = ref(null);
  const loading = ref(false);
  const error = ref(null);
  const getAll = async () => {
    loading.value = true;
    try {
      const res = await fetch(baseUrl);
      data.value = await res.json();
    } catch (err) {
      error.value = err.message;
    }

    loading.value = false;
  };
  const update = async (id, item) => {
    loading.value = true;

    try {
      await fetch(`${baseUrl}/${id}`, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(item),
      });
    } catch (err) {
      error.value = err.message;
    }

    loading.value = false;
  };

  return { data, loading, error, getAll, update };
}
