@extends(config("storehouse-product.layout.view", 'storehouse-product::master'))

@section(config("storehouse-product.layout.section", 'content'))

@include("storehouse-product::partials.javascript")

<div id="debug"></div>
<div class="container" ng-app="storehouseProduct" ng-controller="storehouseProductCategoryCtrl">
	<div class="col-md-10 col-md-offset-1">
		@include("storehouse-product::category.partials.list")
		@include("storehouse-product::category.partials.search")
		@include("storehouse-product::category.partials.update")
	</div>
</div>

@endsection
