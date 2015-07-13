<?php

namespace ResultSystems\Storehouse\Product\Http\Controllers;

use ResultSystems\Storehouse\Product\Http\Controllers\Controller;
use ResultSystems\Storehouse\Product\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;
use DB;
use Exception;

class ProductCategoryController extends Controller
{
    /**
     * @var ProductCategoryRepository
     */
    protected $cateRepo;

    /**
     * classe construtora
     * @param ProductCategoryRepository $category
     */
    public function __construct(ProductCategoryRepository $category)
    {
        $this->cateRepo=$category;
    }

    /**
     * exibir formulário html para cadastro de produto
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('storehouse-product::category.create');
    }

    /**
     * cria uma nova categoria
     * @param  \Illuminate\Contracts\Http\Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function store(Request $request)
    {
        $category=$this->cateRepo->store($request->all());
        if (!$category) {
            return response()->json(array('message'=>'Falha ao cadastrar a categoria', 'error'=>true), 422);
        }
        return response()->json(array('message'=>'Categoria salva com sucesso', 'data'=>$category), 200);
    }

    /**
     * edita as informações da categoria
     * @param  integer $id
     * @param  \Illuminate\Contracts\Http\Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function update($id, Request $request)
    {
        $category=$this->cateRepo->update($id, $request->all());
        if (!$category) {
            return response()->json(array('message'=>'Falha ao atuaizar a categoria', 'error'=>true), 422);
        }
        return response()->json(array('message'=>'Categoria atualizada com sucesso', 'data'=>$category), 200);
    }

    /**
     * pesquisa produtos
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        return $this->cateRepo->search($request->all());
    }

    /**
     * mostra formulário de pesquisa
     * @return \Illuminate\View\View
     */
    public function viewSearch()
    {
        return view("storehouse-product::category.search");
    }

    /**
     * exibir a categoria pelo id
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $category=$this->cateRepo->findById($id);
        return view('storehouse-product::category.show', compact($category));
    }


    /**
     * apaga uma categoria
     * @param  array|int  $ids
     * @return \Illuminate\Contracts\Http\Response
     */
    public function destroy($ids)
    {
        $result=$this->cateRepo->destroy($ids);
        if ($result>0) {
            return response()->json(array('message'=>'Categoria(s) apagada(s) com sucesso'), 200);
        }
        return response()->json(array('message'=>'Falha ao tentar apagar a(s) categoria(s)', 'error'=>true), 422);
    }
}
