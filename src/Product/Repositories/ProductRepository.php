<?php

namespace ResultSystems\Storehouse\Product\Repositories;

use DB;
use ResultSystems\Storehouse\Product\Entities\StorehouseProduct;

class ProductRepository implements iProductRepository
{
    protected $product;

    /**
     * Class consctruct.
     *@param ResultSystems\Storehouse\Product\Entities\StorehouseProduct $prod modelo de produtos
     */
    public function __construct(StorehouseProduct $prod)
    {
        $this->product = $prod;
    }

    //Adiciona estoque
    public function entryStock($idProduct, $amount)
    {
        $product = $this->findById($idProduct);
        if (!is_nulL($product)) {
            $product->current_inventory += $amount;
            try {
                $product->save();

                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        return false;
    }

    //Subtrai quantidade do estoque
    public function outputStock($idProduct, $amount)
    {
        $product = $this->findById($idProduct);
        if (!is_nulL($product)) {
            $product->current_inventory -= $amount;
            try {
                $product->save();

                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        return false;
    }

    /**
     * Retorna todos os produtos.
     * @param  array  $with [description]
     * @return [type]       [description]
     */
    public function all(array $with = [])
    {
        return $this->product->with($with)->paginate(10);
    }

    /**
     * Busca um produto pelo id dele.
     * @param  bigint $id
     * @return bool|\Illuminate\Database\Eloquent\Collection
     */
    public function findById($id)
    {
        return $this->product->where('id', $id)->with('categories')->first();
    }

    /**
     * Relatório de entrada e saída de produtos.
     * @param  int $id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function report($id)
    {
        $sql = "SELECT storehouse_product_id AS id,
                storehouse_nota_entrada_id As entrada_saida_id, quantidade, valor, 'entrada' As tipo, (SELECT created_at FROM storehouse_nota_entradas AS nfe WHERE nfe.id=nfep.storehouse_nota_entrada_id) AS created_at
            FROM storehouse_nota_entrada_produtos AS nfep
            WHERE storehouse_product_id=${id}
                UNION ALL(
                    SELECT storehouse_product_id AS id,
                        storehouse_ordem_saida_id As entrada_saida_id, quantidade,
                        '0,00' AS valor, 'saida' AS tipo,
                        (SELECT created_at FROM storehouse_ordem_saidas AS osaida WHERE osaida.id=osaidap.storehouse_ordem_saida_id) AS created_at
                    FROM storehouse_ordem_saida_produtos AS osaidap
                    WHERE storehouse_product_id=${id}
                )
            ORDER BY created_at";

        return DB::select($sql);
    }

    /**
     * pesquisa os produtos com os dados recebidos via GET/POST.
     * @param  array $request
     * @return bool|\Illuminate\Database\Eloquent\Collection
     */
    public function search(array $request)
    {
        if (!isset($request['submit'])) {
            return [];
        }
        $prod = $this->product;
        if (isset($request['product_id'])) {
            $prod = $prod->where('id', $request['id'])->get();

            return $prod;
        }
        if (isset($request['name'])) {
            $prod = $prod->where('name', 'like', $request['name'].'%');
        }
        if (isset($request['description'])) {
            $prod = $prod->where('description', 'like', '%'.$request['description'].'%');
        }
        if (isset($request['category'])) {
            $prod = $prod->whereHas('categories', function ($q) use ($request) {
                $q->where('name', 'like', $request['category'].'%');
            });
        }
        if (isset($request['category_id'])) {
            $prod = $prod->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request['category_id']);
            });
        }
        $prod = $prod->with(['categories']);

        return $prod->get();
    }

    /**
     * Criar um novo produto.
     * @param  array $request
     * @return bool|\Illuminate\Database\Eloquent\Collection
     */
    public function store(array $request)
    {
        $prod = new $this->product;
        $prod->fill($request);
        try {
            $prod->save();
            //$prod->categories()->attach($category);
            $prod->categories()->attach($request['category']['id']);

            return $this->findById($prod->id);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Atualiza um produto.
     * @param  bigint  $id
     * @param  array $request
     * @return bool
     */
    public function update($id, array $request)
    {
        $prod = $this->product->find($id);
        if (is_null($prod)) {
            return false;
        }
        $prod->fill($request);
        try {
            $prod->save();
            //$category=StorehouseProductCategory::find($request['category']['id']);
            //$prod->categories()->attach($category);
            $prod->categories()->sync([$request['category']['id']]);

            return $this->findById($prod->id);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Apaga um ou mais produto pelo id.
     *
     * @param  array|int  $ids
     * @return int
     */
    public function destroy($ids)
    {
        return $this->product->destroy($ids);
    }
}
