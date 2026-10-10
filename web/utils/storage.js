export const SessionStorage = {
  get(key) {
    return sessionStorage.getItem(key);
  },

  set(key, value) {
    sessionStorage.setItem(key, value);
  },
};

export const LocalStorage = {
  get(key) {
    return localStorage.getItem(key);
  },

  set(key, value) {
    localStorage.setItem(key, value);
  },
};
