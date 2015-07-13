<!-- ___ -->
<!-- start partial search -->
<div ng-hide="product.id!=undefined">
<form class="form-horizontal" ng-submit="search(product)">
<input type="hidden" ng-model="product.submit" ng-init="product.submit=1">
<fieldset>

<!-- Form Name -->
<legend><section id="searchProduct">{{ trans('storehouse-product::product.product.search.heading')}}</section></legend>
<div class="form-group">
     <label class="col-md-5 control-label" for="description">{{ trans('storehouse-product::product.product.fields.category.category')}}</label>
    <div class="col-md-5" ng-show="selectedCategory.title==null">
      <input id="category" name="category" type="text" placeholder="{{ trans('storehouse-product::product.product.fields.category.placeholder')}}" class="form-control input-md" ng-model="product.category">
    </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="name">{{ trans('storehouse-product::product.product.fields.name')}}</label>
  <div class="col-md-5">
  <input id="name" name="name" type="text" placeholder="{{ trans('storehouse-product::product.product.fields.name')}}" class="form-control input-md" ng-model="product.name">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-5 control-label" for="description">{{ trans('storehouse-product::product.product.fields.description')}}</label>
  <div class="col-md-5">
    <textarea class="form-control" id="description" name="description" ng-model="product.description"></textarea>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label" for="selectbasic">{{ trans('storehouse-product::product.product.fields.unit')}}</label>
  <div class="col-md-5">
    <select ng-options="unit.title for unit in units" ng-model="product.unit" class="form-control">
      <option>Selecione a unidade de medida</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="textinput">{{ trans('storehouse-product::product.product.fields.current_inventory')}}</label>
  <div class="col-md-5">
  <input id="textinput" name="textinput" type="text" placeholder="{{ trans('storehouse-product::product.product.placeholder.current_inventory')}}" class="form-control input-md" ng-model="product.current_inventory">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="textinput">{{ trans('storehouse-product::product.product.fields.minimum_inventory')}}</label>
  <div class="col-md-5">
  <input id="textinput" name="textinput" type="text" placeholder="{{ trans('storehouse-product::product.product.placeholder.minimum_inventory')}}" class="form-control input-md" ng-model="product.minimum_inventory">
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group text-right">
  <div class="col-md-8">
    <button id="button1id" name="button1id" class="btn btn-success">{{ trans('storehouse-product::product.general.actions.search')}}</button>
    <button id="button2id" name="button2id" class="btn btn-warning" type="button" ng-click="reset()">{{ trans('storehouse-product::product.general.actions.cancel')}}</button>
  </div>
</div>

</fieldset>
</form>
</div>
<!-- end partial search -->