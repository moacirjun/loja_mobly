# Loja Mobly!

Uma loja fictícia com as funcionalidades básicas de um E-commerce real.


# Funcionalidades

- Listagem de produtos
- Listagem de categorias
- Pesquisa de produtos
- Carrinho de compra
- Carrinho para visitantes
- Checkouts separados entre visitantes e clientes logados

# Tecnologias usadas

- Framework Laravel v5.7
- Vue.js
- Bootstrap
- [Artesãos Warehouse V2](https://github.com/artesaos/warehouse) - Um repositório do Github que me auxiliou na implementação do Repository Pattern no projeto 

# Instalação

A instalação do sistema é simples. Vamos aos passos:

- Clone este repositório em algum lugar na sua máquina
> git clone https://moacirjun@bitbucket.org/moacirjun/loja_mobly.git loja_mobly

- Entre na pasta criada e rode o seguinte código no seu console de preferência para instalar as dependências do compser

> composer install

- Agora renomeie o arquivo '.env.example' para '.env' e defina o valor das variáveis para o seu ambiente de desenvolvimento. A atenção maior deve ser nos campos que definem a conexão com o banco de dados. No meu caso ficou assim:

![enter image description here](https://lh3.googleusercontent.com/r_MW_rLW_8r-MRCei2uN2hEb8PSLhv7AuZmeG6rHO3fp300mJ4jeAQFQRm9aIEiyUStwbAnM7xCWCg "Exemplo .env para desenvolvimento")

- Agora crie um banco de dados com o mesmo nome que você escolheu no arquivo .env

- Feito isso rode o comando abaixo para gerar toda a estrutura de tabelas da aplicação
>php artisan migrate

- O módulo de gerenciamento da loja ainda não foi implementando. Com isso não vai ter como instalar produtos, categorias e etc. Entretanto deixei uma base de dados pronta para você testar as funcionalidades da loja. para instalar você precisa rodar o comando abaixo.
>php artisan sample_data:install

- Agora instale as dependências da parte do fornt-end. Para isso você precisa ter o [Node.js](https://nodejs.org/en/) instalado. Rode o seguinte comando
>npm install

- E para gerar os assets front-end rode
>npm run prod

- E caso queira alterar elementos Vue e gerar o bundle.js automaticamente rode
>npm run watch

- Enfim estamos prontos. Agora basta rodar o comando do Laravel para subir um servidor na pasta do projeto
>php artisan serve

- Agora é só acessar a url que o prompt retornou do comando acima e curtir a loja.
