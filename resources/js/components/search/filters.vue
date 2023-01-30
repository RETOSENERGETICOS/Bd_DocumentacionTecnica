<template>
    <v-expansion-panels v-model="panel">
        <v-expansion-panel>
            <v-expansion-panel-header>Filtros/Filters</v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-row>
                    <v-col>
                        <active-filters />
                    </v-col>
                    <v-col>
                        <v-btn color="success" text @click.prevent="search">Aplicar filtros/Apply field <v-icon>mdi-download</v-icon></v-btn>
                    </v-col>
                    <v-col>
                        <v-btn color="cyan" text @click.prevent="history">Consultar Historial/History <v-icon>mdi-history</v-icon></v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="4" v-if="filters.docum.active"><v-select v-model="filter.docum" label="Tipo de documento/Document type" :items="docums" item-text="name" return-object clearable></v-select></v-col>
                    <v-col cols="4" v-if="filters.tech.active"><v-select v-model="filter.tech" label="Tecnologia asociada/Associated technology" :items="techs" item-text="name" return-object clearable></v-select></v-col>
                    <v-col cols="4" v-if="filters.type.active"><v-select v-model="filter.type" label="Tipo de archivo/Type of file" :items="types" item-text="name" return-object clearable></v-select></v-col>
                    <v-col cols="4" v-if="filters.area.active"><v-select v-model="filter.area" label="Area asociada/Associated area" :items="areas" item-text="name" return-object clearable></v-select></v-col>
                    <v-col cols="4" v-if="filters.owner.active"><v-select v-model="filter.owner" label="Propietario/Owner" :items="owners" item-text="name" return-object clearable></v-select></v-col>

                    <v-col cols="4" v-if="filters.available.active"><v-text-field v-model="filter.available" label="Disponible" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.code.active"><v-text-field v-model="filter.code" label="Codigo" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.description.active"><v-text-field v-model="filter.description" label="Descripcion" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.revision.active"><v-text-field v-model="filter.revision" label="Revision" clearable></v-text-field></v-col>
                   
                    <v-col cols="4" v-if="filters.author.active"><v-text-field v-model="filter.author" label="Autor" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.language.active"><v-text-field v-model="filter.language" label="Idioma" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.year.active"><v-text-field v-model="filter.year" label="Año de publicacion" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.item.active"><v-text-field v-model="filter.item" label="Item" clearable></v-text-field></v-col>
                    <v-col cols="4" v-if="filters.user.active"><v-select v-model="filter.user" label="Usuario/User" :items="users" item-text="email" return-object clearable></v-select></v-col>
                </v-row>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script>
import { getToken } from "../../lib/auth";
import activeFilters from "./activeFilters";
import { mapGetters } from "vuex"

export default {
    name: "filters",
    data: () => ({
        panel: 0,
        docum: [{id: 0, name: 'TODOS'}],
        techs: [{id: 0, name: 'TODOS'}],
        types: [{id: 0, name: 'TODOS'}],
        areas: [{id: 0, name: 'TODOS'}],
        owners: [{id: 0, name: 'TODOS'}],
        users: [{id: 0, email: 'TODOS'}],
        menu: false,
        filter: {
            docum: null,
            tech: null,
            type: null,
            area: null,
            owner: null,
            available: null,
            code: null,
            description: null,
            revision: null,
            author: null,
            language: null,
            year: null,
            item: null,
            user: null,
        },
        historyHeaders: [
            {text: 'Item', value: 'tool.item'},
            {text: 'Tipo de documento', value: 'docum.name'},
            {text: 'Fecha', value: 'created_at'},
            {text: 'Ejecutor', value: 'user.email'},
            {text: 'Actividad', value: 'comment'},
            {text: 'Informacion Actual', value: 'after'},
            {text: 'Informacion Anterior', value: 'before'}
        ]
    }),
    methods: {
        async history() {
            await this.$store.dispatch('filters/setHistoryMode', { value: true })
            this.$emit('loading', true)
            const response = await axios.get('/api/history', getToken())
            if (response.status === 200) {
                const items = response.data.map(item => {
                    return {
                        ...item,
                        before: JSON.parse(item.before),
                        after: JSON.parse(item.after)
                    }
                })
                await this.$store.dispatch('filters/setHistoryItems', { items })
            }
            this.$emit('loading', false)
        },
        async search() {
            this.$emit('loading', true)
            await this.$store.dispatch('filters/setHistoryMode', { value: false })
            const query = {}
            const activeFilters = Object.keys(this.filters).filter(filter => this.filters[filter].active)
            for (let key of activeFilters) {
                if (!_.isEmpty(this.filter[key])) {
                    query[key] = this.filter[key]
                }
            }
            const response = await axios.post('/api/search', query, getToken())
            if (response.status === 200) {
                await this.$store.dispatch('filters/setItems', { items: response.data })
            }
            this.$emit('loading', false)
        }
    },
    computed: {
        ...mapGetters('filters', ['filters','activeFilters'])
    },
    created() {
        axios.get('/api/docums', getToken())
            .then(response => {
                this.docums = this.docums.concat(response.data)
                this.filter.docum = this.docums[0]
            })
        axios.get('/api/techs', getToken())
            .then(response => {
                this.techs = this.techs.concat(response.data)
                this.filter.tech = this.techs[0]
            })
        axios.get('/api/types', getToken())
            .then(response => {
                this.types = this.types.concat(response.data)
                this.filter.type = this.types[0]
            })
        axios.get('/api/areas', getToken())
            .then(response => {
                this.areas = this.areas.concat(response.data)
                this.filter.area = this.areas[0]
            })
        axios.get('/api/owners', getToken())
            .then(response => {
                this.owners = this.owners.concat(response.data)
                this.filter.owner = this.owners[0]
            })
        axios.get('/api/users', getToken())
          .then(response => {
              this.users = this.users.concat(response.data)
          })
    },
    components: {
        activeFilters
    }

}
</script>

<style scoped>

</style>
