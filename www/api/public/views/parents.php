<section class="content" ng-show="views.list">
	<a ng-click="changeView('add')" class="floatRTL btn btn-success btn-flat pull-right marginBottom15">Add Parent</a>

	<div class="well">
		<h3>Parents</h3>
		<div class="box-body table-responsive" ng-init="parent.getParents()">
			<table class="table table-hover" ng-if="parent.parents">
				<tbody><tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Occupancy</th>
					<th>Phone</th>
					<th>Status</th>

				</tr>
				<tr ng-repeat="parent in parent.parents | filter:searchText">
					<td>{{parent.id}}</td>
					<td>{{parent.name}}</td>
					<td>{{parent.email}}</td>
					<td>{{parent.occupancy}}</td>
					<td>{{parent.phone}}</td>
					<td>{{parent.status}}</td>
					<td>
						<a ng-click="edit(parent.id)" type="button" class="btn btn-info btn-flat" title="Edit" tooltip><i class="fa fa-pencil"></i></a>
						<a ng-click="remove(class,$index)" type="button" class="btn btn-danger btn-flat" title="Delete" tooltip><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
				<tr ng-show="classes.length == '0'"><td class="noTableData" colspan="5">No Classes Found</td></tr>
				</tbody></table>
		</div>
		<div class="alert alert-danger" ng-if="class.error">
			<strong>There was an error: </strong> {{class.error.error}}
			<br>Please go back and login again
		</div>
	</div>
</section>

<section class="content" ng-show="views.add">
	<a ng-click="changeView('list')" class="floatRTL btn btn-danger btn-flat pull-right marginBottom15">Cancel Add</a>
	<div class="box col-xs-12">
		<div class="box-header">
			<h3 class="box-title">add Parent</h3>
		</div>
		<div class="box-body table-responsive">
			<form class="form-horizontal" name="addDorm" role="form" ng-submit="saveAdd()" novalidate>
				<div class="form-group" ng-class="{'has-error': addDorm.name.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Parent Name* </label>
					<div class="col-sm-10">
						<input type="text" name="name" ng-model="form.name" class="form-control" required placeholder="Parent Name">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.email.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Parent Email* </label>
					<div class="col-sm-10">
						<input type="text" name="email" ng-model="form.email" class="form-control" required placeholder="Parent Email">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.occupancy.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Occupancy * </label>
					<div class="col-sm-10">
						<input type="text" name="occupancy" ng-model="form.occupancy" class="form-control" required placeholder="occupancy">
					</div>
				</div>	<div class="form-group" ng-class="{'has-error': addDorm.phone.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Phone * </label>
					<div class="col-sm-10">
						<input type="text" name="phone" ng-model="form.phone" class="form-control" required placeholder="Phone">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.status.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Status* </label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.status" name="status" required>
							<option ng-repeat="state in status" value="{{state}}">{{state}}</option>
							<option value="married">married</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" ng-disabled="addDorm.$invalid">Add Parent</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<section class="content" ng-show="views.edit">
	<a ng-click="changeView('list')" class="floatRTL btn btn-danger btn-flat pull-right marginBottom15">Cancel Edit </a>
	<div class="box col-xs-12">
		<div class="box-header">
			<h3 class="box-title">Edit Class</h3>
		</div>
		<div class="box-body table-responsive">
			<form class="form-horizontal" name="editDorm" role="form" ng-submit="saveEdit()" novalidate>
				<div class="form-group" ng-class="{'has-error': addDorm.name.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Parent Name* </label>
					<div class="col-sm-10">
						<input type="text" name="name" ng-model="form.name" class="form-control" required placeholder="Parent Name">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.email.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Parent Email* </label>
					<div class="col-sm-10">
						<input type="text" name="email" ng-model="form.email" class="form-control" required placeholder="Parent Email">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.occupancy.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Occupancy * </label>
					<div class="col-sm-10">
						<input type="text" name="occupancy" ng-model="form.occupancy" class="form-control" required placeholder="occupancy">
					</div>
				</div>	<div class="form-group" ng-class="{'has-error': addDorm.phone.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Phone * </label>
					<div class="col-sm-10">
						<input type="text" name="phone" ng-model="form.phone" class="form-control" required placeholder="Phone">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.status.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Status* </label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.status" name="status" required>
							<option ng-repeat="state in status" value="{{state}}">{{state}}</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" ng-disabled="editDorm.$invalid">Edit Parent</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>