<!-- ___ -->
<!-- start partial list -->
<div class="panel panel-default">
	<div class="panel-heading"><section id="listProduct">{{ trans('storehouse-product::product.product.list.heading')}}</section></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4"><a href ng-click="order('name')">Produto</a></div>
			<div class="col-md-2">Categoria</div>
			<div class="col-md-2"><a href ng-click="order('current_inventory')">Estoque atual</a></div>
			<div class="col-md-1"><a href ng-click="order('minimum_inventory')">Estoque mínimo</a></div>
			<div class="col-md-3">Ações</div>
		</div>
		<div class="row bg-info">
		</div>
		<div ng-repeat="product in listProduct">
			<div class="row" ng-class-odd="'gridPar'" ng-class-even="'gridImpar'">
				<div class="col-md-4"><section id="productId@{{product.id}}">@{{product.name}}</section></div>
				<div class="col-md-2">@{{product.categories[0].name}}</div>
				<div class="col-md-2">@{{product.current_inventory}}</div>
				<div class="col-md-1">@{{product.minimum_inventory}}</div>
				<div class="col-md-3">
					<button class="btn btn-xs btn-info" ng-click="report(product)">relatório</button>
					<button class="btn btn-xs btn-success" ng-click="edit(product)">editar</button>
					<button class="btn btn-xs btn-danger" ng-click="delete(product)">excluir</button>
				</div>
			</div>
		</div>
		<div class="row bg-success">
		</div>
	</div>
</div>
<!-- end partial list -->
