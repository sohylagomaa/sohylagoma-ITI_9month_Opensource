import { defineStore } from "pinia";
import { computed } from "vue";
import { useLocalStorage } from "@/composables/useLocalStorage";
import { useProductStore } from "./productStore";

export const useCartStore = defineStore("cart", () => {
  const items = useLocalStorage("cart", []);

  const productStore = useProductStore();

  const totalItems = computed(() =>
    items.value.reduce((sum, i) => sum + i.qty, 0),
  );

  const totalPrice = computed(() =>
    items.value.reduce((sum, i) => sum + i.price * i.qty, 0),
  );
  const addToCart = (product) => {
    const item = items.value.find((i) => i.id === product.id);

    if (item) {
      item.qty++;
    } else {
      items.value.push({ ...product, qty: 1 });
    }

    productStore.decreaseStock(product.id);
  };

  const removeFromCart = (id) => {
    items.value = items.value.filter((i) => i.id !== id);
  };

  const clearCart = () => {
    items.value = [];
  };
  return {
    items,
    totalItems,
    totalPrice,
    addToCart,
    removeFromCart,
    clearCart,
  };
});
