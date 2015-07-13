<!-- ___ -->
<!-- start partial list -->
<div class="panel panel-default">
	<div class="panel-heading">{{ trans('storehouse-product::category.category.list.heading')}}</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4"><a href ng-click="order('name')">Categoria</a></div>
			<div class="col-md-4">Descrição</div>
			<div class="col-md-4">Açõesxx</div>
		</div>
		<div class="row bg-info">
		</div>
		<div ng-repeat="category in listCategory">
			<div class="row" ng-class-odd="'gridPar'" ng-class-even="'gridImpar'">
				<div class="col-md-4">@{{category.name}}</div>
				<div class="col-md-4">@{{category.description}}</div>
				<div class="col-md-4">
					<button class="btn btn-xs btn-info" ng-click="list(category)">lista produtos</button>
					<button class="btn btn-xs btn-success" ng-click="edit(category)">editar</button>
					<button class="btn btn-xs btn-danger" ng-click="delete(category)">excluir</button>
				</div>
			</div>
		</div>
		<div class="row bg-success">
		</div>
	</div>
</div>

<!-- end partial list -->