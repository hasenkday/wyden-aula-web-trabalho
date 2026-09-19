export const Storage = {
  get(key) {
    return sessionStorage.getItem(key);
  },

  set(key, value) {
    sessionStorage.setItem(key, value);
  },
};
