<?php

namespace ResultSystems\Storehouse\Product\Services;

use DB;
use Exception;

/**
 * Service editar um produto
 * Class ProductUpdateService
 * @package ResultSystems\Storehouse\Product\Services
 */
class ProductUpdateService extends ProductAbstractService
{
    /**
     * Atualiza um produto
     * Pesquisa se existe a categoria informada,
     * caso não exista cria uma nova categoria,
     * caso exista faz o relacionamento com o produto
     * futuro: fazer o relacionamento com o(s) fornecedor(es)
     * @param  int  $id
     * @param  array  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, array $request)
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
            $product=$this->prodRepo->update($id, $request);
            if (!$product) {
                throw new Exception('Erro ao atualizar produto');
            }
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('message'=>$e->getMessage(), 'error'=>true), 422);
        } finally {
            DB::commit();
        }
        return response()->json(array('message'=>'Atualizado com sucesso', 'data'=>$product), 200);
    }
}
