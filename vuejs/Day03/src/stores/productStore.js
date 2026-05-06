import { defineStore } from "pinia";
import { ref } from "vue";
import { useApi } from "@/composables/useApi";

export const useProductStore = defineStore("product", () => {
  const products = ref([]);

  const { data, loading, error, getAll, update } = useApi(
    "http://localhost:3000/products",
  );

  const fetchProducts = async () => {
    await getAll();
    products.value = data.value;
  };
  const decreaseStock = async (id) => {
    const product = products.value.find((p) => p.id === id);

    if (!product || product.stock === 0) return;

    product.stock--;

    await update(id, product);
  };

  const getProductById = (id) => {
  return products.value.find(p => p.id === Number(id))
}

  return {
    products,
    loading,
    error,
    fetchProducts,
    decreaseStock,
    getProductById,
  };
});
