<?php

namespace ResultSystems\Storehouse\Product\Services;

use DB;
use Exception;

/**
 * Service criar um novo produto
 * Class ProductCreateservice
 * @package ResultSystems\Storehouse\Product\Services
 */
class ProductCreateService extends ProductAbstractService
{
    /**
     * Cria um novo produto
     * Pesquisa se existe a categoria informada,
     * caso não exista cria uma nova categoria,
     * caso exista faz o relacionamento com o produto
     * futuro: faz o relacionamento com o(s) fornecedor(es)
     * @param  array  $request
     * @return \Illuminate\Http\Response
     */
    public function store(array $request)
    {
        try {
            DB::beginTransaction();
            if (!isset($request['category']['id']) && !isset($request['category']['name'])) {
                throw new Exception('Informe a categoria');
            }

            if (!isset($request['category']['id'])) {
                $category=$this->cateRepo->store($request['category'], false);
                if (!$category) {
                    throw new Exception('Erro ao cadastrar categoria');
                }
                $request['category']['id']=$category->id;
            }

            if (isset($request['category']['id'])) {
                $category=$this->cateRepo->findById($request['category']['id']);
            }
            if (is_null($category)) {
                throw new Exception('Categoria não encontrada');
            }
            $product=$this->prodRepo->store($request, $category);
            if (!$product) {
                throw new Exception('Erro ao cadastrar produto');
            }
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('message'=>$e->getMessage(), 'error'=>true), 422);
        } finally {
            DB::commit();
        }
        return response()->json(array('message'=>'Salvo com sucesso', 'data'=>$product), 200);
    }
}
