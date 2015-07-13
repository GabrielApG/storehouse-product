<?php

namespace ResultSystems\Storehouse\Product\Repositories;

use ResultSystems\Storehouse\Product\Models\StorehouseProduct;

class ProductRepository implements iProductRepository
{
    protected $product;

    /**
     * Class consctruct
     *@param ResultSystems\Storehouse\Product\Models\StorehouseProduct $prod modelo de produtos
     */

    public function __construct(StorehouseProduct $prod)
    {
        $this->product=$prod;
    }

    /**
     * Retorna todos os produtos
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
     * pesquisa os produtos com os dados recebidos via GET/POST
     * @param  array $request
     * @return bool|\Illuminate\Database\Eloquent\Collection
     */
    public function search(array $request)
    {
        if (!isset($request['submit'])) {
            return [];
        }
        $prod=$this->product;
        if (isset($request['product_id'])) {
            $prod=$prod->where('id', $request['id'])->get();
            return $prod;
        }
        if (isset($request['name'])) {
            $prod=$prod->where('name', 'like', $request['name'].'%');
        }
        if (isset($request['description'])) {
            $prod=$prod->where('description', 'like', '%'.$request['description'].'%');
        }
        if (isset($request['category'])) {
            $prod=$prod->whereHas('categories', function ($q) use ($request) {
                $q->where('name', 'like', $request['category'].'%');
            });
        }
        if (isset($request['category_id'])) {
            $prod=$prod->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request['category_id']);
            });
        }
        $prod=$prod->with(['categories']);
        return $prod->get();
    }

    /**
     * Criar um novo produto
     * @param  array $request
     * @return bool|\Illuminate\Database\Eloquent\Collection
     */
    public function store(array $request)
    {
        $prod=new $this->product;
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
     * Atualiza um produto
     * @param  bigint  $id
     * @param  array $request
     * @return bool
     */
    public function update($id, array $request)
    {
        $prod=$this->product->find($id);
        if (is_null($prod)) {
            return false;
        }
        $prod->fill($request);
        try {
            $prod->save();
            //$category=StorehouseProductCategory::find($request['category']['id']);
            //$prod->categories()->attach($category);
            $prod->categories()->sync(array($request['category']['id']));
            return $this->findById($prod->id);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Apaga um ou mais produto pelo id
     *
     * @param  array|int  $ids
     * @return int
     */
    public function destroy($ids)
    {
        return $this->product->destroy($ids);
    }
}
