import useFetcher from "../utils/fetch";

const testd = {
    get: async ({ id, params }) => useFetcher().get(`/testd/${id}`, params),
    delete: async ({ id, params }) =>
        useFetcher().delete(`/testd/${id}`, params),
    update: async ({ id, data, params }) =>
        useFetcher().patch(`/testd/${id}`, data, params),
    getAll: async ({ params }) => useFetcher().get(`/testd`, params),
    create: async ({ data }) => useFetcher().post(`/testd`, data),
};

export default testd;