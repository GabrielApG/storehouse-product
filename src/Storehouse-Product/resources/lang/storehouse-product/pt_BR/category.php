<?php

/*
 * Favor ordenar pelo índice recursivamente.
 *
 */

return [
   "alert"             => [
       "error"             => "Erro!",

       "delete"            => [
           "title"             => 'Tem certeza que deseja excluir: :category:?',
           "text"             => 'Você não será capaz de recuperar novamente este cadastro!',
           "button"            => [
             "cancel"            => "Cancelar",
             "confirm"           => "Sim, tenho certeza",
           ],
       ],

       "success"           => "Sucesso!",
       "warning"           => "Aviso!",
   ],

   "general"     => [
       "actions"     => [
           "add"    => "Adicionar",
           "cancel" => "Cancelar",
           "delete" => "Excluir",
           "edit"   => "Editar",
           "search" => "Pesquisar",
           "update" => "Atualizar"
       ],

       "back_to_system" => "Voltar ao Sistema",

       "titles"     => [
           "success"    => "Sucesso!",
           "error" => "Erro!",
           "warning" => "Aviso!",
       ],
   ],

   "navigation"  => [
       "brand"   => "Result Systems",
       "product" => [
           "product"  => "Produto",
           "register" => "Cadastrar",
           "search"   => "Pesquisar",
       ],
   ],

   "category" => [
     "create"  => [
         "empty"   => "Não existem categoria cadastrada.",
         "heading" => "Cadastrar categoria",
         "label"   => "Nome da categoria",
      ],

     "edit"              => [
         "heading"           => "Editar categoria",
      ],

     "help"  => [
         "name"              => "* Obrigatório",
         "current_inventory" => "* Obrigatório",
         "category"          => [
           "new"  => "nova",
        ],
      ],

     "fields"  => [
         "name"         => "Nome",
         "category"     => [
              "category"    => "Category",
              "name"        => "Nome",
              "placeholder"      => "Informe a categoria"
         ],
         "current_inventory" => "Estoque atual",
         "description"       => "Descrição",
         "minimum_inventory" => "Estoque mínimo",
         "unit"              => "Unidade de medida",
         "units"             => [
              "unit"     => "unidade",
              "kilogram" => "kilo",
              "meter"    => "metro",
         ],
      ],

     "list"              => [
         "heading"             => "Lista de categorias",
      ],

      "placeholder" => [
         "name"         => "Nome",

         "category"     => [
              "category"    => "Category",
              "name"        => "Nome",
              "placeholder"      => "Informe a categoria"
         ],

         "current_inventory"  => "0,00",
         "description"  => "Descrição",
         "minimum_inventory"  => "0,00",
         "unit"  => "Unidade de medida",
      ],

     "search"  => [
         "empty"   => "Não existem categoria cadastrado.",
         "heading" => "Pesquisar categorias",
         "label"   => "Nome do produto",
         "no_results"   => "Nenhum resultado encontrado",
      ],
   ],
];
