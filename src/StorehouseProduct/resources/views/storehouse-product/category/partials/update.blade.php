<!-- ___ -->
<!-- start partial update -->
<div ng-hide="category.id==undefined">
<form class="form-horizontal" ng-submit="save(category)">
<fieldset>

<!-- Form Name -->
<legend><section id="updCategpry">{{ trans('storehouse-product::category.category.edit.heading')}}: @{{category.name}}</section></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="name">{{ trans('storehouse-product::category.category.fields.name')}}</label>
  <div class="col-md-5">
  <input id="name" name="name" type="text" placeholder="{{ trans('storehouse-product::category.category.fields.name')}}" class="form-control input-md" ng-model="category.name" ng-required="true">
  <span class="help-block">{{ trans('storehouse-product::category.category.help.name')}}</span>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-5 control-label" for="description">{{ trans('storehouse-product::category.category.fields.description')}}</label>
  <div class="col-md-5">
    <textarea class="form-control" id="description" name="description" ng-model="category.description"></textarea>
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