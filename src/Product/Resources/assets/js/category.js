

angular.module('storehouseProduct').controller('storehouseProductCategoryCtrl', ['$scope', '$filter', '$http', 'flash', function($scope, $filter, $http, flash) {
	//Inicializa as variáveis
	//Valores iniciais;
	$scope.category = {}; //objeto de categoria
	$scope.listCategory=[]; //array de categorias
	$scope.reverse=true; //ordenar consultar reversa

	/**
	 * reseta o formulário
	 */
	$scope.reset=function(){
		$scope.category={};
	};

	/**
	 * edita uma categoria
	 * @param  object category
	 * @return object
	 */
	$scope.edit=function(category){
		$scope.category=category;
	};

	/**
	 * ordena a lista de categorias
	 * @param  string|object property
	 * @return object
	 */
	$scope.order=function(property){
		$scope.listCategory=$filter('orderBy')($scope.listCategory,property,$scope.reverse);
		$scope.reverse=!$scpoe.reverse;
	};

	/**
	 * cria uma nova categoria ou edita uma existente
	 * @param  object category
	 * @return bool|alert
	 */
	$scope.save=function(category){
		/**
		 * verfica se está editando a categoria ou criando uma nova
		 */
		var _method=$http.post;
		var _urlSave=storehouseConfig.product.route+'/category';
		if (category.id!=undefined){
			_method=$http.put;
			_urlSave+='/'+category.id;
		}

		//Configuracoes headers
		var config = {
			'headers' : {
				'Content-Type': 'appplication/json',
				'X-CSRF-TOKEN': token,
				'X-XSRF-TOKEN': token
			}
		};

		_method(_urlSave,category,config).success(function(response){
			$("#debug").html(response);
			flash.success(response.message,storehouseConfig.product.alert.success);
			if (response.data.id!=category.id){
				$scope.listCategory.push(response.data);
			};
			$scope.category={};
		}).error(function(response, status, headers, config){
			$("#debug").html(response);
			flash.error(response.message,storehouseConfig.product.alert.error);
		});
	};


	/**
	 * lista de produtos pela categoria;
	 * @param  object category
	 * @return redirect
	 */
	$scope.list=function(category) {
		flash.warning('Opção em desenvolvimento','Aviso');
	};

	/**
	 * pesquisa categorias
	 * @param  object category
	 * @return bool|alert
	 */
	$scope.search=function(category){
		$http.post(storehouseConfig.product.route+'/category/search',category).success(function(response){
			//$("#debug").html(response);
			//flash.success('ok');
			$scope.listCategory=response;
		}).error(function(response, status, headers, config){
			flash.error(response.message,storehouseConfig.product.alert.error);
		});
	};

	/**
	 * apaga a categoria
	 * @param  object category
	 * @return alert
	 */
	$scope.delete=function(category){
		var fContinue=function() {
			var config = {
				'headers': {
				'Content-Type': 'appplication/json',
					'X-CSRF-TOKEN': token,
					'X-XSRF-TOKEN': token
				}
			};
			$http.delete(storehouseConfig.product.route+'/category/'+category.id,config).success(function(response){
				var index=$scope.listCategory.indexOf(category);
				$scope.listCategory.splice(index,1);
				$scope.category={};
				flash.success(response.message,storehouseConfig.product.alert.success);
			}).error(function(response, status, headers, config) {
				flash.error(response.message,storehouseConfig.product.alert.error);
			});
		};
		var _title=storehouseConfig.category.alert.delete.title;
		_title=_title.replace(":category:",category.name);
		flash.confirm(fContinue,
			storehouseConfig.category.alert.delete.text,
			_title,
			storehouseConfig.category.alert.delete.button.confirm,
			storehouseConfig.category.alert.delete.button.cancel
		);
	};
}]);