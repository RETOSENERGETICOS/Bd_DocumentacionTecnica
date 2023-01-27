<template>
    <div>
        <v-dialog v-model="active">
            <v-card>
                <v-card-title>Esta usted seguro?</v-card-title>
                <v-card-actions>
                    <v-btn color="success" text @click.prevent="createTool">Guardar</v-btn>
                    <v-btn color="error" text @click="active = false">Cancelar/Cancel</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-snackbar v-model="snackbar.active" :color="snackbar.color" :timeout="1500" > {{ snackbar.message }}</v-snackbar>
        <v-btn @click="active = true" :disabled="disabled" :loading="loading">Guardar</v-btn>
        <v-form v-model="valid">
            <div class="form-container">
                <div class="form-column">
                    <div class="form-row">
                        <v-combobox v-if="verifyAccess([1])" v-model.trim="tool.docum" label="Tipo de documento/Document type" :items="docums" item-text="name" clearable item-value="name"></v-combobox>
                        <v-select v-else v-model.trim="tool.docum" label="Tipo de documento/Document type" :items="docums" item-text="name" clearable item-value="name"></v-select>
                    </div>
                    <div class="form-row">
                        <v-combobox v-if="verifyAccess([1])" v-model.trim="tool.tech" label="Tecnologia asociada/Associated technology" :items="techs" item-text="name" clearable item-value="name"></v-combobox>
                        <v-select v-else v-model.trim="tool.tech" label="Tecnologia asociada/Associated technology" :items="techs" item-text="name" clearable item-value="name"></v-select>
                    </div>
                    <div class="form-row">
                        <v-combobox v-if="verifyAccess([1])" v-model.trim="tool.type" label="Tipo de archivo/Type of file" :items="types" item-text="name" :rules="[rules.required]" clearable item-value="name"></v-combobox>
                        <v-select v-else v-model.trim="tool.type" label="Tipo de archivo/Type of file" :items="types" item-text="name" :rules="[rules.required]" clearable item-value="name"></v-select>
                    </div>
                    <div class="form-row">
                        <v-combobox v-if="verifyAccess([1])" v-model.trim="tool.area" label="Area asociada/Associated area" :items="areas" item-text="name" :rules="[rules.required]" clearable item-value="name"></v-combobox>
                        <v-select v-else v-model.trim="tool.area" label="Area asociada/Associated area" :items="areas" item-text="name" :rules="[rules.required]" clearable item-value="name"></v-select>
                    </div>
                    <div class="form-row">
                        <v-combobox v-if="verifyAccess([1])" v-model.trim="tool.owner" label="Propietario/Owner" :items="owners" item-text="name" :rules="[rules.required]" clearable item-value="name"></v-combobox>
                        <v-select v-else v-model.trim="tool.owner" label="Propietario/Owner" :items="owners" item-text="name" :rules="[rules.required]" clearable item-value="name"></v-select>
                    </div>
                </div>
                <div class="form-column">
                    <div class="form-row">
                        <v-text-field v-model="tool.available" label="Disponible/Available"></v-text-field>
                    </div>
                    <div class="form-row">
                        <v-text-field v-model="tool.code" label="Codigo/Code"></v-text-field>
                    </div>
                    <div class="form-row">
                        <v-text-field v-model="tool.description" label="Descripcion/Description" :rules="[rules.required]"></v-text-field>
                    </div>
                    <div class="form-row">
                        <v-text-field v-model="tool.revision" label="N de revision/No revision"></v-text-field>
                    </div>
                    <div class="form-row">
                        <v-text-field v-model="tool.author" label="Autor/Author"></v-text-field>
                    </div>
                </div>
                 <div class="form-column">
                    <div class="form-row">
                        <v-text-field v-model="tool.language" label="Idioma/Lenguage" :rules="[rules.required]"></v-text-field>
                    </div>
                    <div class="form-row">
                        <v-text-field v-model="tool.year" label="Año de publicacion/Year of publication"></v-text-field>
                    </div>
                    <div class="form-row">
                        <file-pond name="documents" ref="documents" label-idle="Archivos/File" accepted-file-types="application/pdf" @processfile="onProcessFile" :allow-multiple="true"></file-pond>
                    </div>
                </div>
            </div>
        </v-form>
    </div>
</template>

<script>
import { getToken, verifyAccess } from "../../lib/auth";
import { required } from "../../lib/rules";
import vueFilePond, { setOptions } from "vue-filepond";
import "filepond/dist/filepond.min.css"
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type"
const FilePond = vueFilePond(FilePondPluginFileValidateType);

export default {
    name: "create",
    data: () => ({
        snackbar: { active: false, message: null, color: 'success' },
        active: false,
        loading: true,
        menu: false,
        valid: false,
        rules : { required: required },
        docums: [],
        techs: [],
        types: [],
        areas: [],
        owners: [],
        tool: {
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
            documents: []
        }
    }),
    methods: {
        verifyAccess(roles) {
            return verifyAccess(roles)
        },
        async onProcessFile(error, file) {
            if (error === null) {
                this.tool.documents.push(file.serverId)
            }
        },
        async createTool() {
            this.active = false
            this.loading = true
            const response = await axios.post('/api/tools', this.tool, getToken())
            if (response.status === 200) {
                this.snackbar = {
                    active: true,
                    message: 'Herramienta registrada',
                    color: 'success'
                }
                this.clearForm()
            } else {
                this.snackbar = {
                    active: true,
                    message: 'Error al registrar',
                    color: 'error'
                }
            }
            this.loading = false
        },
        clearForm() {
            this.tool = {
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
                documents: []
            }
            this.$refs.documents.removeFiles()
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
    async created() {
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

<style scoped>
.form-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1rem;
}
.form-row {
    margin: 1rem 0;
}
</style>
