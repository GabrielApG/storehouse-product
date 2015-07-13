<!-- ___ -->
<!-- start partial list -->
<div class="panel panel-default">
	<div class="panel-heading">{{ trans('storehouse-product::product.product.list.heading')}}</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4"><a href ng-click="order('name')">Produto</a></div>
			<div class="col-md-2">Categoria</div>
			<div class="col-md-2"><a href ng-click="order('current_inventory')">Estoque atual</a></div>
			<div class="col-md-2"><a href ng-click="order('minimum_inventory')">Estoque mínimo</a></div>
			<div class="col-md-2">Ações</div>
		</div>
		<div class="row bg-info">
		</div>
		<div ng-repeat="product in listProduct">
			<div class="row" ng-class-odd="'gridPar'" ng-class-even="'gridImpar'">
				<div class="col-md-4">@{{product.name}}</div>
				<div class="col-md-2">@{{product.categories[0].name}}</div>
				<div class="col-md-2">@{{product.current_inventory}}</div>
				<div class="col-md-2">@{{product.minimum_inventory}}</div>
				<div class="col-md-2">
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