export default {
    namespaced: true,
    state: {
        items: [],
        filters: {
            docum: { text: 'Tipo de Documento', value: 'docum.name' ,active: true, key: 'docum' },
            tech: { text: 'Tecnologia Asociada', value: 'tech.name', active: true, key: 'tech' },
            type: { text: 'Tipo de Archivo', value: 'type.name', active: true, key: 'type' },
            area: { text: 'Area Asociada', value: 'area.name', active: true, key: 'area' },
            owner: { text: 'Propietario', value: 'owner.name', active: true, key: 'owner' },
            available: { text: 'Disponible', value: 'available', active: false, key: 'available' },
            code: { text: 'Codigo', value: 'code', active: false, key: 'code' },
            description: { text: 'Descripcion', value: 'description', active: false, key: 'description' },
            revision: { text: 'N de Revision', value: 'revision', active: false, key: 'revision' },
            author: { text: 'Autor', value: 'author', active: false, key: 'author' },
            language: { text: 'Idioma', value: 'language', active: false, key: 'language' },
            year: { text: 'Año de Publicacion', value: 'year', active: false, key: 'year' },
            item: { text: 'Item', value: 'item', active: false, key: 'item' },
            user: { text: 'Usuario', value: 'user.name', active: false, key: 'user_id' },
        },
        historyMode: false,
        historyItems: [],
    },
    mutations: {
        setFilters(state, { filters }) {
            state.filters = filters
        },
        setItems(state, { items }) {
            state.items = items
        },
        setHistoryMode(state, { value }) {
            state.historyMode = value
        },
        setHistoryItems(state, { items }) {
            state.historyItems = items
        }
    },
    actions: {
        setHistoryItems({ commit }, { items }) {
            commit('setHistoryItems', { items })
        },
        setHistoryMode({ commit }, { value }) {
            commit('setHistoryMode', { value })
        },
        setFilters({ commit }, { filters }) {
            commit('setFilters', { filters })
        },
        setItems({ commit }, { items }) {
            commit('setItems', { items })
        }
    },
    getters: {
        historyItems: state => {
            return state.historyItems
        },
        historyMode: state => {
            return state.historyMode
        },
        activeFilters: state => {
            const activeFiltersKeys = Array.from(Object.keys(state.filters)).filter(key => state.filters[key].active)
            return activeFiltersKeys.map(key => state.filters[key])
        },
        filters: state => {
            return JSON.parse(JSON.stringify(state.filters))
        },
        items: state => {
            return state.items
        }
    }
}
