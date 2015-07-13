<!-- ___ -->
<!-- start partial update -->
<div ng-hide="product.id==undefined">
<form class="form-horizontal" ng-submit="save(product)">
<fieldset>

<!-- Form Name -->
<legend><section id="updProduct">{{ trans('storehouse-product::product.product.edit.heading')}}: @{{product.name}}</section></legend>
<div class="form-group">
     <label class="col-md-5 control-label" for="description">{{ trans('storehouse-product::product.product.fields.category.category')}}</label>
    <div class="col-md-4" ng-show="selectedCategory.title==null">
      <div angucomplete-alt id="category_id" placeholder="{{ trans('storehouse-product::product.product.fields.category.placeholder')}}" maxlength="45" pause="300" selected-object="selectedCategory" local-data="categories" name-data="categories" search-fields="name" title-field="name" minlength="1" input-class="form-control form-control-small" match-class="highlight" input-changed="queryHandlerCategory" ng-model="category" text-searching="Pesquisando..." text-no-results="{{ trans('storehouse-product::category.category.search.no_results')}}" ></div>
    </div>
    <div class="col-md-1" ng-show="selectedCategory.title==null">*{{ trans('storehouse-product::product.product.help.category.new')}}</div>
    <label class="col-md-4 control-label" ng-show="selectedCategory.title!=null">@{{selectedCategory.title}}</label>
    <button type="button" class="btn btn-info col-md-1" ng-click="changeCategory()" ng-show="selectedCategory.title!=null">Trocar</button>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="name">{{ trans('storehouse-product::product.product.fields.name')}}</label>
  <div class="col-md-5">
  <input id="name" name="name" type="text" placeholder="{{ trans('storehouse-product::product.product.fields.name')}}" class="form-control input-md" ng-model="product.name" ng-required="true">
  <span class="help-block">{{ trans('storehouse-product::product.product.help.name')}}</span>
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
    <select ng-options="unit.title for unit in units" ng-model="_units" class="form-control">
      <option>Selecione a unidade de medida</option>
    </select>
  <span class="help-block">{{ trans('storehouse-product::product.product.help.units')}}</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="textinput">{{ trans('storehouse-product::product.product.fields.current_inventory')}}</label>
  <div class="col-md-5">
  <input id="textinput" name="textinput" type="text" placeholder="{{ trans('storehouse-product::product.product.placeholder.current_inventory')}}" class="form-control input-md" ng-model="product.current_inventory" ng-required="true">
  <span class="help-block">{{ trans('storehouse-product::product.product.help.current_inventory')}}</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="textinput">{{ trans('storehouse-product::product.product.fields.minimum_inventory')}}</label>
  <div class="col-md-5">
  <input id="textinput" name="textinput" type="text" placeholder="{{ trans('storehouse-product::product.product.placeholder.minimum_inventory')}}" class="form-control input-md" ng-model="product.minimum_inventory">
  <span class="help-block">{{ trans('storehouse-product::product.product.help.minimum_inventory')}}</span>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group text-right">
  <div class="col-md-8">
    <button name="button1id" class="btn btn-primary">{{ trans('storehouse-product::product.general.actions.edit')}}</button>
    <button name="button2id" class="btn btn-warning" type="button" ng-click="reset()">{{ trans('storehouse-product::product.general.actions.cancel')}}</button>
  </div>
</div>

</fieldset>
</form>
</div>
<!-- end partial update -->