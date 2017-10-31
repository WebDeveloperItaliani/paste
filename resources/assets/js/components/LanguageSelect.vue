<template>
    <div class="form-row col-md-6">
        <div class="form-group col-md-6">
            <label for="paste-language">Linguaggio</label>
            <select name="language_id" id="paste-language" class="form-control" @change="changeLanguage">
                <option selected aria-selected="true" disabled>Seleziona un linguaggio</option>
                <option v-for="lang in languages" :value="lang.id" :selected="isSelectedLanguage(lang)">{{ lang.name}} </option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="paste-extension">Estensione</label>
            <select name="extension" id="paste-extension" class="form-control" :disabled="!isLanguageSelected">
                <option selected aria-selected="true" disabled>Seleziona un'estensione</option>
                <template v-if="isLanguageSelected">
                    <option v-for="name in this.selectedLanguage.extensions" :value="name" :selected="isSelectedExtension(name)">{{ name }} </option>
                </template>
            </select>
        </div>
    </div>
</template>

<script>
    const {
        Axios: {get},
        _: {find},
    } = window;

    export default {
        name: 'language-select',

        props: {
            language: {
                type: Object,
                required: false,
                default: () => null,
            },
            extension: {
                type: String,
                required:false,
                default: () => '',
            },
        },

        data() {
            return {
                languages: [],
                selectedLanguage: null,
            };
        },

        mounted() {
            get('/api/languages')
                .then(({data} = response) => this.languages = data.languages);

            this.selectedLanguage = this.language;
        },

        methods: {
            isSelectedLanguage(lang) {
                return (this.isLanguageSelected) ? lang.id === this.selectedLanguage.id : false;
            },

            isSelectedExtension(name) {
                return name === this.extension;
            },

            changeLanguage(e) {
                this.setLanguage(e.target.value);
            },

            setLanguage(id) {
                this.selectedLanguage = find(this.languages, (lang) => {
                    return lang.id - id === 0;
                });
            }
        },

        computed: {
            isLanguageSelected() {
                return this.selectedLanguage !== null;
            }
        }
    };
</script>
