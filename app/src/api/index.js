import axios from 'axios';

const baseURL = 'http://localhost:8000/api/';

const instance = axios.create({
  baseURL,
  headers: {
    'X-Localization': 'pt-br',
  },
});

instance.interceptors.request.use((config) => {
  let urlOrigin = window.location.origin;
  if (!urlOrigin) {
    const urlProtocol = window.location.protocol;
    const urlHost = window.location.hostname;
    urlOrigin = `${urlProtocol}//${urlHost}`;
  }
  config.headers.Platform = urlOrigin;

  return config;
}, (error) => Promise.reject(error));

instance.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    return Promise.reject(error);
  },
);

export default instance;
