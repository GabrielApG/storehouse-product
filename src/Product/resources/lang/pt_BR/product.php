<?php

/*
 * Favor ordenar pelo índice recursivamente.
 *
 */

return [
   "alert"             => [
       "error"             => "Erro!",

       "delete"            => [
           "title"             => 'Tem certeza que deseja excluir: :product:?',
           "text"             => 'Você não será capaz de recuperar novamente este cadastro!',
           "button"            => [
             "cancel"            => "Cancelar",
             "confirm"           => "Sim, tenho certeza",
           ],
       ],

       "success"           => "Sucesso!",
       "warning"           => "Aviso!",
   ],

   "general"           => [
       "actions"           => [
         "add"               => "Adicionar",
         "cancel"            => "Cancelar",
         "delete"            => "Excluir",
         "edit"              => "Editar",
         "search"            => "Pesquisar",
         "update"            => "Atualizar"
       ],

     "back_to_system"    => "Voltar ao Sistema",

   ],

   "navigation"        => [
       "brand"             => "Result Systems",
       "product"           => [
           "product"           => "Produto",
           "register"          => "Cadastrar",
           "search"            => "Pesquisar",
        ],
   ],

   "product"           => [
       "create"            => [
           "empty"             => "Não existem produto cadastrado.",
           "heading"           => "Cadastrar produto",
           "label"             => "Nome do produto",
        ],

       "edit"              => [
           "heading"           => "Editar produto",
        ],

       "help"              => [
           "name"              => "* Obrigatório",
           "current_inventory" => "* Obrigatório",

           "category"          => [
              "new"               => "nova",
            ],

           "minimum_inventory" => "* Obrigatório",

           "units" => "* Obrigatória",

        ],

       "fields"            => [
           "name"              => "Nome",

           "category"          => [
               "category"          => "Categoria",
               "name"              => "Nome",
               "placeholder"       => "Informe a categoria"
            ],

           "current_inventory" => "Estoque atual",
           "description"       => "Descrição",
           "minimum_inventory" => "Estoque mínimo",
           "unit"              => "Unidade de medida",
           "units"             => [
               "unit"              => "unidade",
               "kilogram"          => "kilo",
               "meter"             => "metro",
            ],
        ],

       "list"              => [
           "heading"             => "Lista de produtos",
        ],

       "placeholder"       => [
           "name"              => "Nome",

           "category"          => [
               "category"          => "Category",
                   "name"              => "Nome",
                   "placeholder"       => "Informe a categoria"
            ],

           "current_inventory" => "0,00",
           "description"       => "Descrição",
           "minimum_inventory" => "0,00",
           "unit"              => "Unidade de medida",
        ],

       "search"            => [
           "empty"             => "Não existem produto cadastrado.",
           "heading"           => "Pesquisa de produtos",
           "label"             => "Nome do produto",
       ],
   ],
];
