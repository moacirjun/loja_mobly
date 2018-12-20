<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class installSampleData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample_data:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::insert("INSERT INTO `tb_categorias` (`nome`, `descricao`) VALUES
            ('Estantes', 'Estantes pra a sua casa'),
            ('Quadros', 'Quadros para a melhor decoração do seu ambiente de trabalho ou familiar'),
            ('Cadeiras', 'Cadeiras Gamers para o seu melhor conforto e ergonomia'),
            ('Escrivanias', 'Escrivanias')");

        DB::insert("INSERT INTO `tb_categoria_caracter` (`categoria_id`, `nome`, `created_at`, `updated_at`) VALUES
            (3, 'Cor', '2018-12-20 13:32:00', '2018-12-20 13:32:02'),
            (3, 'Altura', '2018-12-20 13:32:14', '2018-12-20 13:32:16'),
            (4, 'Cor', '2018-12-20 13:32:26', '2018-12-20 13:32:27'),
            (4, 'Largura', '2018-12-20 13:33:33', '2018-12-20 13:33:33'),
            (2, 'Altura', '2018-12-20 13:34:37', '2018-12-20 13:34:39'),
            (2, 'Material', '2018-12-20 13:34:55', '2018-12-20 13:34:56'),
            (1, 'Cor', '2018-12-20 13:35:19', '2018-12-20 13:35:20'),
            (1, 'Material', '2018-12-20 13:35:33', '2018-12-20 13:35:33')");

        DB::insert("INSERT INTO `tb_produtos` (`nome`, `descricao`, `imagem_url`, `preco`) VALUES
            ('Estante Mobly', 'Estante perfeirta para seus estudos', 'https://cdn.leroymerlin.com.br/products/estante_decorativa_madeira_6_prateleiras_platina_castanho_88128383_0001_600x600.jpg', 101.50),
            ('Estante Modal', 'Estante ideal para seu quarto', 'https://www.casasbahia-imagens.com.br/Moveis/SaladeEstar/Estantes/8798930/809995534/estante-madeira-macica-estilo-ingles-dd913-8798930.jpg', 505.89),
            ('Estante Stylus', 'Estante para você que gosta de um estilo mais rústico', 'https://cdn.shopify.com/s/files/1/1670/0553/products/NQ5A9481_2048x.jpg?v=1509109498', 351.56),
            ('Quadro Mobly', 'Quadro ideal para sua decoração', 'https://img.elo7.com.br/product/zoom/EF25F9/quadro-quadrados-3d-colorido-01-textura.jpg', 125.78),
            ('Quadro Modal', 'Quadro para você que curte um estilo mais enterprise', 'https://www.fabrica9.com.br/media/catalog/product/cache/2/image/920x880/9df78eab33525d08d6e5fb8d27136e95/q/u/quadro-textura-organico.jpg', 252.45),
            ('Quadro Estilos', 'Quadros modestos', 'https://image.freepik.com/vetores-gratis/quadros-quadrados-e-redondos-realistas-3d-feitos-de-cordas-de-fibra_1441-2118.jpg', 215.54),
            ('Combo Mbly', 'Cadeira e escrivania ', 'https://a-static.mlcdn.com.br/618x463/escrivaninha-com-estante-elisa-permobili-branco-amarelo/madeiramadeira-openapi/198079/408702011e4db54c1702af648a020781.jpg', 254.55),
            ('Combo Modal', 'Combo Modal é idal para você que trabalha home office', 'https://www.casasbahia-imagens.com.br/Moveis/escritorio/MesasparaComputadorEscrivaninhas/12698774/1042503357/escrivaninha-com-estante-elisa-permobili-12698774.jpg', 900.54)");

        DB::insert("INSERT INTO `tb_produto_categoria` (`produto_id`, `categoria_id`, `created_at`, `updated_at`) VALUES
            (7, 3, '2018-12-20 17:46:15', '2018-12-20 17:46:16'),
            (7, 4, '2018-12-20 17:46:33', '2018-12-20 17:46:33'),
            (8, 3, '2018-12-20 17:46:50', '2018-12-20 17:46:52'),
            (8, 4, '2018-12-20 17:47:10', '2018-12-20 17:47:10'),
            (1, 1, '2018-12-20 17:47:28', '2018-12-19 17:47:28'),
            (2, 1, '2018-12-20 17:47:44', '2018-12-20 17:47:44'),
            (3, 1, '2018-12-20 17:47:59', '2018-12-20 17:47:59'),
            (4, 2, '2018-12-20 17:48:17', '2018-12-20 17:48:17'),
            (5, 2, '2018-12-20 17:48:39', '2018-12-20 17:48:39'),
            (6, 2, '2018-12-20 17:49:01', '2018-12-20 17:49:02')");
    }
}
