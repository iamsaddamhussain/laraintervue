import { defineStore } from "pinia";
import { post } from "src/utils/resources";
import { appUrl } from "src/consts.js";
import { useUserStore } from "./userStore";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: null,
  }),
  getters: {
    isLoggedIn: (state) => !!state.user,
  },
  actions: {
    updateState(payload) {
      this.user = payload;
      localStorage.removeItem("token");
      localStorage.setItem("token", JSON.stringify(payload.token));
    },
    async login(form) {
      const user = useUserStore();
      const response = await post(`${appUrl}/login`, form).catch({});
      this.updateState(response);
      await user.storeInfo(); //user data will save to the localstorage for `/me` route implementation
    },
    async logout() {
      await post(`${appUrl}/logout`).catch(() => {});
      this.$reset();
    },
  },
  persist: true,
});
