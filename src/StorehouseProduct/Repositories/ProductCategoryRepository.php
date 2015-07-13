<?php

namespace ResultSystems\Storehouse\Product\Repositories;

use ResultSystems\Storehouse\Product\Models\StorehouseProductCategory;
use DB;

class ProductCategoryRepository implements iProductCategoryRepository
{
    /**
     * @var StorehouseProductCategory
     */
    protected $category;

    /**
     * Class consctruct
     *@param ResultSystems\Storehouse\Product\Models\StorehouseProductCategory $category
     */
    public function __construct(StorehouseProductCategory $category)
    {
        $this->category=$category;
    }

    /**
     * pesquisa os produtos com os dados passados via GET/POST
     * @param  array $request
     * @return object
     */
    public function search(array $request)
    {
        if (!isset($request['submit'])) {
            return [];
        }
        $category=$this->category;
        if (isset($request['category_id'])) {
            $category=$category->where('id', $request['category_id'])->get();
            return $category;
        }
        if (isset($request['name'])) {
            $category=$category->where('name', 'like', $request['name'].'%');
        }
        if (isset($request['description'])) {
            $category=$category->where('description', 'like', '%'.$request['description'].'%');
        }
        return $category->get();
    }

    /**
     * Cria uma nova categoria
     * @param  array $request
     * @return bool|\Illuminate\Database\Eloquent\Collection
     */
    public function store(array $request, $beginTransaction=true)
    {
        //        $category=new $this->category;
        $category=new $this->category;
        $category->fill($request);
        try {
            if ($beginTransaction) {
                DB::beginTransaction();
            }
            $category->save();
            if ($beginTransaction) {
                DB::commit();
            }
            return $this->findById($category->id);
        } catch (\Exception $e) {
            if ($beginTransaction) {
                DB::rollback();
            }
            return false;
        }
    }

    /**
     * atualiza uma categoria pelo id
     * @param  int $id
     * @param  array  $request
     * @return bool|int
     */
    public function update($id, array $request)
    {
        $category=$this->category->find($id);
        if (is_null($category)) {
            return false;
        }
        $category->fill($request);
        try {
            DB::beginTransaction();
            $category->save();
            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    /**
     * pega todos os produtos
     * @return object
     */
    public function all(array $with = [])
    {
        return $this->category->with($with)->paginate(10);
    }

    /**
     * Apaga uma ou mais categorias pelo id
     *
     * @param  array|int  $ids
     * @return int
     */
    public function destroy($ids)
    {
        return $this->category->destroy($ids);
    }

    /**
     * Devolve a categoria pelo id
     * @param  int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findById($id)
    {
        return $this->category->find($id);
    }
}
