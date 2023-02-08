<template>
    <div>
        <v-dialog v-model="active">
            <v-card>
                <v-card-title>Esta usted seguro?</v-card-title>
                <v-card-actions>
                    <v-btn color="success" text @click.prevent="update">Guardar</v-btn>
                    <v-btn color="error" text @click="active = false">Cancelar</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-dialog v-model="show" v-if="tool !== null" scrollable>
            <v-card>
                <v-card-title>Herramienta {{ tool.item }}</v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <v-form v-model="valid">
                        <v-row>
                             <v-col cols="4">
                                <v-combobox label="Tipo de Documento/Document Type" v-model="tool.docum" item-text="name" :items="docums" item-value="name" disabled></v-combobox>
                            </v-col>
                             <v-col cols="4">
                                <v-combobox label="Tecnologia Asociada/Associated Technology" v-model="tool.tech" item-text="name" :items="techs" item-value="name" disabled></v-combobox>
                            </v-col>
                             <v-col cols="4">
                                <v-combobox label="Tipo de Archivo/Type of File" v-model="tool.type" item-text="name" :items="types" item-value="name" disabled></v-combobox>
                            </v-col>
                        </v-row>
                        <v-row>
                             <v-col cols="4">
                                <v-combobox label="Area Asociada/Associated Area" v-model="tool.area" item-text="name" :items="areas" item-value="name" disabled></v-combobox>
                            </v-col>
                             <v-col cols="4">
                                <v-combobox label="Propietario/Owner" v-model="tool.owner" item-text="name" :items="owners" item-value="name" disabled></v-combobox>
                            </v-col>
                            <v-col cols="4">
                                <v-text-field label="Disponible" v-model="tool.available" :rules="[rules.required]"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="4">
                                <v-text-field label="Codigo" v-model="tool.code" :rules="[rules.required]"></v-text-field>
                            </v-col>
                            <v-col cols="4">
                                <v-text-field label="Descripcion" v-model="tool.description" :rules="[rules.required]"></v-text-field>
                            </v-col>
                            <v-col cols="4">
                                <v-text-field label="N de Revision" v-model="tool.revision" :rules="[rules.required]"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="4">
                                <v-text-field label="Autor" v-model="tool.author" :rules="[rules.required]"></v-text-field>
                            </v-col>
                            <v-col cols="4">
                                <v-text-field label="Idioma" v-model="tool.lenguage"></v-text-field>
                            </v-col>
                            <v-col cols="4">
                                <v-text-field label="Año de Publicación" v-model="tool.year"></v-text-field>
                            </v-col>
                            <v-col cols="4">
                                <file-pond name="documents" ref="documents" label-idle="Archivos" accepted-file-types="application/pdf" :disabled="true"></file-pond>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn text color="success" @click="active = true">Guardar</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import { getToken } from "../../lib/auth";
import { required } from "../../lib/rules";
import vueFilePond, { setOptions } from "vue-filepond";
import "filepond/dist/filepond.min.css"
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type"
const FilePond = vueFilePond(FilePondPluginFileValidateType);

export default {
    name: "show",
    data: () => ({
        active: false,
        loading: false,
        valid: false,
        show: false,
        tool: null,
        movingQuantity: 0,
        menu: false,
        rules : { required: required },
        docums: [],
        techs: [],
        types: [],
        areas: [],
        owners: [],
    }),
    methods: {
        async update() {
            this.active = false
            this.tool = { ...this.tool, movingQuantity: this.movingQuantity }
            const response = await axios.put(`/api/tools/${this.tool.id}`, this.tool, getToken())
            if (response.status === 200) {
                const newItem = {
                    id: this.tool.id,
                    item: this.tool.item,
                    docum: this.tool.docum,
                    tech: this.tool.tech,
                    type: this.tool.type,
                    area: this.tool.area,
                    owner: this.tool.owner,
                    available: this.tool.available
                }
                this.$emit('updated', newItem)
                this.show = false
                this.movingQuantity = 0
            }

        },
        async open(tool) {
            const response = await axios.get(`/api/tools/${tool.id}`, getToken())
            this.tool = response.data
            this.show = true
        }
    },
    computed: {
        disabled() {
            if (this.tool.hasValidation && this.tool.calibrationExpiration === null) {
                return true
            }
            return !this.valid
        }
    },
    async mounted() {
        setOptions({
            server: {
                url: '/api/uploads',
                withCredentials: true,
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }
        })
        await axios.get('/api/docums', getToken()).then(response => this.docums =  response.data )
        await axios.get('/api/techs', getToken()).then(response => this.techs = response.data)
        await axios.get('/api/types', getToken()).then(response => this.types = response.data)
        await axios.get('/api/areas', getToken()).then(response => this.areas = response.data)
        await axios.get('/api/owners', getToken()).then(response => this.owners = response.data)
        this.loading = false
    },
    components: {
        FilePond
    }
}
</script>
