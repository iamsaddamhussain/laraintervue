import { defineStore } from "pinia";
import { appUrl } from "src/consts";
import { get } from "src/utils/resources";

export const useUserStore = defineStore("user", {
  actions: {
    async storeInfo() {
      const user = await get(`${appUrl}/me`);
      localStorage.setItem("USER_PROFILE_INFO", JSON.stringify(user));
      this.$reset();
    },
  },
});
