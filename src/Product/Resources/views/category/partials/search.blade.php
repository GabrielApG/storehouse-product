<!-- ___ -->
<!-- start partial search -->
<div ng-hide="category.id!=undefined">
<form class="form-horizontal" ng-submit="search(category)">
<input type="hidden" ng-model="category.submit" ng-init="category.submit=1">
<fieldset>

<!-- Form Name -->
<legend><section id="searchCategory">{{ trans('storehouse-product::category.category.search.heading')}}</section></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="name">{{ trans('storehouse-product::category.category.fields.name')}}</label>
  <div class="col-md-5">
  <input id="name" name="name" type="text" placeholder="{{ trans('storehouse-product::category.category.fields.name')}}" class="form-control input-md" ng-model="category.name">
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
    <button name="button1id" class="btn btn-success">{{ trans('storehouse-product::category.general.actions.search')}}</button>
    <button name="button2id" class="btn btn-warning" type="button" ng-click="reset()">{{ trans('storehouse-product::category.general.actions.cancel')}}</button>
  </div>
</div>

</fieldset>
</form>
</div>
<!-- end partial search -->