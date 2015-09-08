<div class="modal fade" id="modelProductReport" tabindex="-1" role="dialog" aria-labelledby="modelProductReport" aria-hidden="true" name="modelProductReport">
		<div class="modal-dialog">
		    <div class="modal-content">
		    	<div class="modal-header">
					<h4 class="modal-title">Relatório</h4>
				</div>
				<div class="modal-body">
					<div>
						<div class="panel panel-default">
							<div class="panel-body">

<!-- ___ -->
<!-- start partial report -->
<div class="panel panel-default">
	<div class="panel-heading">Relatório</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-2">Tipo</div>
			<div class="col-md-2 text-right">Quantidade</div>
			<div class="col-md-2 text-right">Valor</div>
			<div class="col-md-4">Data</div>
		</div>
		<div class="row bg-info">
		</div>
		<div ng-repeat="report in view">
			<div class="row" ng-class-odd="'gridPar'" ng-class-even="'gridImpar'">
				<div class="col-md-2">@{{report.tipo}}</div>
				<div class="col-md-2 text-right">@{{report.quantidade | comma2decimal}}</div>
				<div class="col-md-2 text-right">@{{report.valor | comma2decimal}}</div>
				<div class="col-md-4">@{{report.created_at | dateTimeMysqlToBR | removeTime}}</div>
			</div>
		</div>
		<div class="row bg-success">
		</div>
	</div>
</div>
<!-- end partial report -->

							</div>
						</div>
					</div>
			        <div class="modal-footer">
						<div class="row">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
