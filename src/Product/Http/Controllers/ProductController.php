<?php

namespace ResultSystems\Storehouse\Product\Http\Controllers;

use ResultSystems\Storehouse\Product\Http\Controllers\Controller;
use ResultSystems\Storehouse\Product\Services\ProductCreateService;
use ResultSystems\Storehouse\Product\Services\ProductUpdateService;
use ResultSystems\Storehouse\Product\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductCreateService
     */
    private $prodCreate;

    /**
     * @var ProductUpdateService
     */
    private $prodUpdate;

    /**
     * @var ProductRepository
     */
    private $prodRepo;
    /**
     * Construtor da classe
     * @param ProductCreateService $prodCreate
     * @param ProductUpdateService $prodUpdate
     */
    public function __construct(ProductCreateservice $prodCreate, ProductUpdateService $prodUpdate, ProductRepository $prodRepo)
    {
        $this->prodCreate=$prodCreate;
        $this->prodUpdate=$prodUpdate;
        $this->prodRepo=$prodRepo;
    }

    /**
     * exibir formulário para criar produto
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('storehouse-product::product.create');
    }

    /**
     * cria um novo produto
     * @param  \Illuminate\Contracts\Http\Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $prod=new \ResultSystems\Storehouse\Product\Models\StorehouseProduct;
        $prod->name='testexxx';
        $prod->units='unit';
        $prod->current_inventory=0;
        $prod->minimum_inventory=0;
        $prod->save();
        return response('xxxx', 422);
        return response(array('message'=>$prod->save()), 422);

*/
        return $this->prodCreate->store($request->all());
    }

    /**
     * exibir o produto pelo id
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product=$this->prodRepo->findById($id);
        return view('storehouse-product::show', compact($product));
    }

    /**
     * apaga um produto
     * @param  array|int  $ids
     * @return \Illuminate\Contracts\Http\Response
     */
    public function destroy($ids)
    {
        $result=$this->prodRepo->destroy($ids);
        if ($result>0) {
            return response()->json(array('message'=>'Produto(s) apagado(s) com sucesso'), 200);
        }
        return response()->json(array('message'=>'Falha ao tentar apagar o(s) produto(s)', 'error'=>true), 422);
    }

    /**
     * edita as informações do produto
     * @param  integer $id
     * @param  \Illuminate\Contracts\Http\Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function update($id, Request $request)
    {
        return $this->prodUpdate->update($id, $request->all());
    }

    /**
     * faz pesquisa de produtos
     * @param  Request $request
     * @return \Illuminate\Contracts\Http\Response
     */
    public function search(Request $request)
    {
        return response()->json($this->prodRepo->search($request->all()), 200);
    }

    /**
     * mostra formulário de pesquisa
     * @return \Illuminate\View\View
     */
    public function viewSearch()
    {
        return view("storehouse-product::product.search");
    }
}
