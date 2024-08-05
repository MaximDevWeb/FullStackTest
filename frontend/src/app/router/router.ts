import {
  createMemoryHistory,
  createRouter,
  type RouteRecordRaw,
} from "vue-router";
import { Index } from "@/pages";

const routes: RouteRecordRaw[] = [
  {
    path: "/",
    component: Index,
  },
];

const router = createRouter({
  history: createMemoryHistory(),
  routes,
});

export default router;
