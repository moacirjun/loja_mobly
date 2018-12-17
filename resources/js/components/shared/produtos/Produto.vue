<template>
    <div class="card">
        <img class="card-img-top" :src="item.imagem_url" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{item.nome}}</h5>
            <p class="card-text">{{item.descricao}}</p>
            <a href="#" class="btn btn-primary">Comprar</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Produto",
        props: ['produto'],

        data() {
            return {
                item : {}
            }
        },

        mounted() {
            this.item = this.produto;
        }
    }
</script>