<template>
    <div class="form-row col-md-6">
        <div class="form-group col-md-6">
            <label for="paste-language">Linguaggio</label>
            <select name="language_id" id="paste-language" class="form-control" @change="setLanguage">
                <option selected aria-selected="true" disabled>Seleziona un linguaggio</option>
                <option v-for="language in languages" :value="language.id">{{ language.name}}</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="paste-extension">Estensione</label>
            <select name="extension" id="paste-extension" class="form-control" :disabled="language == null">
                <option selected aria-selected="true" disabled>Seleziona un'estensione</option>
                <template v-if="language != null">
                    <option v-for="(name, index) in language.extensions" :value="index">{{ name }}</option>
                </template>
            </select>
        </div>
    </div>
</template>

<script>
    const {
        Axios: { get },
        _: { find }
    } = window;

    export default {
        name: "language-select",

        data() {
            return {
                languages: [],
                language: null,
            }
        },

        mounted() {
            get("/api/languages")
                .then(({data} = response) => {
                    this.languages = data.languages;
                });
        },

        methods: {
            setLanguage(e) {
                this.language = find(this.languages, (lang) => {
                    return lang.id - e.target.value === 0;
                });
            }
        }
    }
</script>
