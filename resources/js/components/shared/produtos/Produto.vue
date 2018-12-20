<template>
    <div class="card">
        <img class="card-img-top" :src="item.imagem_url" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><a :href="itemUrl">{{item.nome}}</a></h5>
            <p class="card-text">{{item.descricao}}</p>
            <a :href="addToCartUrl" class="btn btn-primary">Comprar</a>
        </div>
    </div>
</template>

<script>

    export default {
        name: "Produto",
        props: ['produto'],

        data() {
            return {
                item : {},
                addToCartUrl: "",
                itemUrl: ""
            }
        },

        mounted() {
            this.item = this.produto;
            this.addToCartUrl = route('carrinho.add', this.item.id);
            this.itemUrl = route('produtos.mostrar', this.item.id);
        }
    }
</script>