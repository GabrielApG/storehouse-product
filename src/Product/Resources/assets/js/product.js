/**
 * Aplicativo storehouseProduct
 * Authors: Leandro Henrique dos Reis
 * emtudo@gmail.com
 */

if (typeof storehouseConfig == "undefined") {
	storehouseConfig.module='storehouseProduct';
}

if (storehouseConfig.module=='storehouseProduct') {
	angular.module(storehouseConfig.module,['flashMessage', 'cacheSearch', 'angucomplete-alt']);
} else {
	angular.module(storehouseConfig.module).controller('storehouseProductCtrl', ['$scope', '$filter', '$http', 'flash', 'Search', storehouseProductCtrl]);
}

function storehouseProductCtrl($scope, $filter, $http, flash, Search) {
	//Inicializa as variáveis
	//Valores iniciais;
	$scope.categories = []; //array de categorias
	$scope.selectedCategory=[]; //array com categoria selecionada
	$scope.units=units; //unidades de medidas
	$scope.product={}; //objecto de produto
	$scope.listProduct=[]; //array de produtos
	$scope.reverse=true; //ordenar consultar reversa
	$scope.reportProduct=[]; //Relatório de produtos
	$scope.showReport=false;
	$scope.view=[];
	$scope.saldoInicial=0;
	$scope.saldo=0;

	//url da consulta de categorias
	searchCategory=storehouseConfig.product.route+'/category/search?submit=1&name=';
	//faz consulta de categorias
	$scope.queryHandlerCategory = function (q) {
		if (q.length>=2) {
			Search.filter(searchCategory, q, false).success(function (response) {
				$scope.categories = response;

/*
				if ($scope.categories.length===0) {
					Search.filter(searchCategory,'category',q, false).success(function (response) {
						$scope.categories = response;
					});
				}
*/
			});
		}
	};

	//remove a seleção da categoria selecionada
	$scope.changeCategory=function(){
		$("#category_id_value").val('');
		$scope.selectedCategory=[];
		$("#category_id_value").val('');
		$("#category_id_value").focus();
	};

	/**
	 * reseta o formulário
	 */
	$scope.reset=function(){
		$scope.product={};
		$scope.changeCategory();
		$scope._units=null;
	};

	/**
	 * edita um produto
	 * @param  object product
	 * @return object
	 */
	$scope.edit=function(product){
		for (var i = 0; i < units.length; i++) {
		    if (units[i].unit == product.unit) {
		        $scope._units = $scope.units[i];
		        break;
		    }
		}
		$scope.selectedCategory.description=product.categories[0];
		$scope.selectedCategory.title=product.categories[0].name;
		$scope.product=product;
	};

	/**
	 * ordena a lista de produtos
	 * @param  string|object property
	 * @return object
	 */
	$scope.order=function(property){
		$scope.listProduct=$filter('orderBy')($scope.listProduct,property,$scope.reverse);
		$scope.reverse=!$scope.reverse;
	};

	/**
	 * cria um novo produto ou edita um existente
	 * @param  object product
	 * @return bool|alert
	 */
	$scope.save=function(product){
		if ($scope._units==undefined){
			flash.error('Informe a unidade de medida');
			return false;
		}
		//Unidade de medida
		product.unit=$scope._units.unit;

		//Adiciona/Informa categoria
		category= {
			'name' : $("#category_id_value").val()
		}
		if ($scope.selectedCategory.description!=undefined)
			category.id=$scope.selectedCategory.description.id;
		product.category=category;

		/**
		 * verfica se está editando o produto ou criando um novo
		 */
		var _method=$http.post;
		var _urlSave=storehouseConfig.product.route;
		if (product.id!=undefined){
			_method=$http.put;
			_urlSave+='/'+product.id;
		}

		//Configuracoes headers
		var config = {
			'headers' : {
				'Content-Type': 'appplication/json',
				'X-CSRF-TOKEN': token,
				'X-XSRF-TOKEN': token
			}
		};

		_method(_urlSave,product,config).success(function(response){
			//$("#debug").html(response);
			flash.success(response.message,storehouseConfig.product.alert.success);
			if (response.data.id!=product.id){
				$scope.listProduct.push(response.data);
			};
			if (product.id!=undefined){
				$scope.changeCategory();
			}
			$scope.product={};
			if (category.name!='') {
				$scope.changeCategory();
			}
			$scope.selectedCategory.description=response.data.categories[0];
			$scope.selectedCategory.title=response.data.categories[0].name;
		}).error(function(response, status, headers, config){
			//$("#debug").html(response);
			flash.error(response.message,storehouseConfig.product.alert.error);
		});
	};

	/**
	 * pesquisa produtos
	 * @param  object product
	 * @return bool|alert
	 */
	$scope.search=function(product){
		window.location.href = '#listProduct';
		//Unidade de medida
		if (product.unit!=undefined){
			product.unit=product.unit.unit;
		}

		//Adiciona/Informa categoria
		category= {
			'name' : $("#category_id_value").val()
		}

		if ($scope.selectedCategory.description!=undefined) {
			category.id=$scope.selectedCategory.description.id;
		}

		if ($scope.selectedCategory.description!=undefined && cateroy.name!='') {
			product.category=category;
		}

		$http.post(storehouseConfig.product.route+'/search',product).success(function(response){
			//$("#debug").html(response);
			//flash.success('ok');
			$scope.listProduct=response;
		}).error(function(response, status, headers, config){
			flash.error(response.message,storehouseConfig.product.alert.error);
		});
	};

	/**
	 * apaga o produto
	 * @param  object product
	 * @return alert
	 */
	$scope.delete=function(product){
		var fContinue=function() {
			var config = {
				'headers': {
				'Content-Type': 'appplication/json',
					'X-CSRF-TOKEN': token,
					'X-XSRF-TOKEN': token
				}
			};
			$http.delete(storehouseConfig.product.route+'/'+product.id,config).success(function(response){
				var index=$scope.listProduct.indexOf(product);
				$scope.listProduct.splice(index,1);
				$scope.product={};
				flash.success(response.message,storehouseConfig.product.alert.success);
//				token=response._token;
			}).error(function(response, status, headers, config) {
				//$("#debug").html(response);
				flash.error(response.message,storehouseConfig.product.alert.error);
			});
		};
		var _title=storehouseConfig.product.alert.delete.title;
		_title=_title.replace(":product:",product.name);
		flash.confirm(fContinue,
			storehouseConfig.product.alert.delete.text,
			_title,
			storehouseConfig.product.alert.delete.button.confirm,
			storehouseConfig.product.alert.delete.button.cancel
		);
	};

	//Relatório de produtos
	$scope.report=function(product){
		var id=product.id;
		$scope.view=angular.copy(product);
		$scope.reportProduct=[];
		$scope.showReport=true;
		$scope.saldoInicial=angular.copy(product.current_inventory);
		$scope.saldo=parseFloat(angular.copy(product.current_inventory));

		var urlReport=storehouseConfig.product.route;

		//flash.success('Carregando o relatório, aguarde','Aviso!');
		$http.get(urlReport+'/'+id+'/report').success(function(response){
			$scope.reportProduct=angular.copy(response);
			angular.forEach($scope.reportProduct, function(value, key) {
				if (value.tipo=='entrada') {
				  	$scope.saldo+=parseFloat(value.quantidade);
				} else {
				  	$scope.saldo-=parseFloat(value.quantidade);
				}
				$scope.reportProduct[key].saldo=angular.copy($scope.saldo);
			});

			//flash.success('Carregado','Sucesso!');
		}).error(function(response){
			flash.error('Não foi possível carregar o relatório','Erro!');
			$scope.showReport=false;
		});
		window.location.href = '#productReport';
	};

	//Volta ao produto anterior
	$scope.gotoProduct=function(id) {
		window.location.href = '#productId'+id;
	}
};
