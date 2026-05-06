import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import ProductView from '@/views/ProductView.vue'
import AboutView from '@/views/AboutView.vue'


const routes = [
  {
    path: "/",
    component: HomeView
  },
  {
    path: "/product/:id",
    component: ProductView
  },
  {
    path: "/about",
    component: AboutView
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router