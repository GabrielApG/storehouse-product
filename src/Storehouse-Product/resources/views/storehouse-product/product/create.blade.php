@extends(config("storehouse-product.layout.view", 'storehouse-product::master'))

@section(config("storehouse-product.layout.section", 'content'))

@include("storehouse-product::partials.javascript")

<div id="debug"></div>
<div class="container" ng-app="storehouseProduct" ng-controller="storehouseProductCtrl">
	<div class="col-md-10 col-md-offset-1">
		@include("storehouse-product::product.partials.create")
	</div>
</div>

@endsection
