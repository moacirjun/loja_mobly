<template>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2"
                v-for="produto of lista"
            >
                <produto :produto="produto"></produto>
            </div>
        </div>
    </div>
</template>

<script>
    import Produto from "./Produto";

    let recuperaDadosPaginacao = (paginacao) => {
        let json = JSON.parse(paginacao);
        return ("data" in json) ? json.data : json;
    };

    export default {
        name: "ListaProduto",
        props: ['produtos'],

        data() {
            return {
                lista : []
            }
        },

        mounted() {
            this.lista = recuperaDadosPaginacao(this.produtos);
        },

        components: {
            Produto
        }
    }
</script>