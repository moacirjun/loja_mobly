<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "tb_pedido";

    protected $fillable = ['user_id', 'status', 'entrega_estado', 'entrega_cidade', 'entrega_logradouro', 'entrega_numero'];

    public function itens()
    {
        return $this->hasMany('App\PedidoItem')
                    ->select(\DB::raw('produto_id, sum(valor) as total_item, count(1) as qtde'))
                    ->groupBy('produto_id')
                    ->orderBy('produto_id', 'desc');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTotal()
    {
        $total = 0;

        foreach($this->itens as $item) {
            $total += $item->total_item;
        }

        return $total;
    }

    public function getTotalFormatted()
    {
        return "R$ " . number_format($this->getTotal(), 2, ',', '.');
    }

    public function getDataFormatted()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 'RE' :
                return 'Reservado';
                break;

            case 'PA' :
                return 'Pago';
                break;

            case 'CA' :
                return 'Cancelado';
        }
    }
}
