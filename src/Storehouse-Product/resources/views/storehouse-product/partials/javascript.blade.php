<script>
var token='{{ csrf_token() }}';
var urlBase='{{ url('/') }}';
var storehouseConfig = {

	'product': {
		'alert': {
			'success' : '{{ trans('storehouse-product::product.alert.success') }}',
			'error' : '{{ trans('storehouse-product::product.alert.error') }}',
			'warning' : '{{ trans('storehouse-product::product.alert.warning') }}',
			'delete' : {
				'title' : '{{ utf8_encode(trans('storehouse-product::product.alert.delete.title')) }}',
				'text' : '{!! trans('storehouse-product::product.alert.delete.text') !!}',
				'button' : {
					'cancel' : '{{ trans('storehouse-product::product.alert.delete.button.cancel') }}',
					'confirm' : '{{ trans('storehouse-product::product.alert.delete.button.confirm') }}'
				}
			}
		},
		'route': '{{ url(config('storehouse-product.route_prefix','storehouse/product')) }}',
	},
	'category': {
		'alert': {
			'success' : '{{ trans('storehouse-product::category.alert.success') }}',
			'error' : '{{ trans('storehouse-product::category.alert.error') }}',
			'warning' : '{{ trans('storehouse-product::category.alert.warning') }}',
			'delete' : {
				'title' : '{{ utf8_encode(trans('storehouse-product::category.alert.delete.title')) }}',
				'text' : '{!! trans('storehouse-product::category.alert.delete.text') !!}',
				'button' : {
					'cancel' : '{{ trans('storehouse-product::category.alert.delete.button.cancel') }}',
					'confirm' : '{{ trans('storehouse-product::category.alert.delete.button.confirm') }}'
				}
			}
		},
	}
}
var units=[
		{unit:'unit','title':'{{ trans('storehouse-product::product.product.fields.units.unit') }}'},
		{unit:'meter','title':'{{ trans('storehouse-product::product.product.fields.units.meter') }}'},
		{unit:'kilogram','title':'{{ trans('storehouse-product::product.product.fields.units.kilogram') }}'}
	];
</script>
