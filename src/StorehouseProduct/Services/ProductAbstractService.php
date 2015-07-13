<?php

namespace ResultSystems\Storehouse\Product\Services;

use ResultSystems\Storehouse\Product\Repositories\ProductRepository as ProductRepo;
use ResultSystems\Storehouse\Product\Repositories\ProductCategoryRepository as CateRepo;

/**
 * Service para cadastrar produtos
 * cadastrar categoria do produto
 * Alterar o produto
 * alterar a categoria do produto
 * fazer ligação do produto aos fornecedores
 * Class ProductAbstractService
 * @package ResultSystems\Storehouse\Product
 */
class ProductAbstractService
{
    /**
     * Repositório de produtos
     * @var ResultSystems\Storehouse\Product\Repositories\ProductRepository
     */
    protected $prodRepo;

    /**
     * repositório ode categorias
     * @var ResultSystems\Storehouse\Product\Repositories\ProductCategoriaRepository
     */
    protected $cateRepo;

    /**
     * Classe construtora
     * @param ProductRepo $repo
     * @param CateRepo    $cate
     */
    public function __construct(ProductRepo $prod, CateRepo $cate)
    {
        $this->prodRepo = $prod;
        $this->cateRepo = $cate;
    }
}
