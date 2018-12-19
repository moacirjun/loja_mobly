<template>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Qtde</th>
            <th scope="col">Produto</th>
            <th scope="col">Preço</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item of itens">
            <th scope="row">{{item.qtde}}</th>
            <td>{{item.nome}}</td>
            <td>{{item.valor}}</td>
            <td><a :href="getUrl(item.produto_id)" class="btn btn-danger">Apagar</a></td>
        </tr>
        </tbody>
        <tfoot class="thead-dark">
            <tr>
                <td colspan="3" class="font-weight-bold text-uppercase">Total: {{total}}</td>
                <td width="100px"><span class="btn-checkout btn btn-dark">Comprar</span></td>
            </tr>
        </tfoot>
    </table>
</template>

<script>
    export default {
        name: "tabelaCarrinho",
        props: ['carrinho', 'carrinho_url'],
        data() {
          return {
              itens: [],
              total: 0
          }
        },
        methods: {
          getUrl: (id) => {
            return route('carrinho.remove', id);
          }
        },
        mounted() {
            let cart = JSON.parse(this.carrinho);

            this.itens = cart.itens;
            this.total = cart.total;
        }
    }
</script>

<style scoped>
    .btn {
        float: right;
    }
</style>