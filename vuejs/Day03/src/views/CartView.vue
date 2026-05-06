<script setup>
import { useCartStore } from "@/stores/cartStore";

const cartStore = useCartStore();
</script>

<template>
  <div class="max-w-5xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    <div v-if="cartStore.items.length === 0">Your cart is empty</div>

    <table v-else class="table w-full">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in cartStore.items">
          <td>{{ item.name }}</td>

          <td>${{ item.price }}</td>

          <td>{{ item.qty }}</td>

          <td>${{ item.price * item.qty }}</td>

          <td>
            <button
              class="btn btn-error btn-sm"
              @click="cartStore.removeFromCart(item.id)"
            >
              Remove
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <h2 class="text-2xl mt-6">Total: ${{ cartStore.totalPrice }}</h2>
  </div>
</template>
