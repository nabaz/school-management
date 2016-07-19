<section class="content" ng-show="views.list">
	<a ng-click="changeView('add')" class="floatRTL btn btn-success btn-flat pull-right marginBottom15">Add Report</a>

	<div class="well">
		<h3>Reports</h3>
		<div class="box-body table-responsive" ng-init="report.getReports()">
			<table class="table table-hover" ng-if="report.reports">
				<tbody><tr>
					<th>ID</th>
					<th>Student Name</th>
					<th>Class Name</th>
					<th>Stage</th>
					<th>SEM 1</th>
					<th>SEM 2</th>
					<th>SEM 3</th>
					<th>SEM 4</th>
					<th>Sem 1 Total</th>
					<th>SEM 5</th>
					<th>SEM 6</th>
					<th>SEM 7</th>
					<th>SEM     8</th>
					<th>Sem2 Total</th>
				</tr>
				<tr ng-repeat="report in report.reports | filter:searchText">
					<td>{{report.id}}</td>
					<td>{{report.student_name}}</td>
					<td>{{report.class_name}}</td>
					<td>{{report.stage}}</td>
					<td>{{report.sem1_eval_1}}</td>
					<td>{{report.sem1_eval_2}}</td>
					<td>{{report.sem1_eval_3}}</td>
					<td>{{report.sem1_eval_4}}</td>
					<td ng-init="getSem1Total(report)">{{report.total}}</td>
					<td>{{report.sem2_eval_1}}</td>
					<td>{{report.sem2_eval_2}}</td>
					<td>{{report.sem2_eval_4}}</td>
					<td>{{report.sem2_eval_4}}</td>
					<td ng-init="getSem2Total(report)">{{report.total2}}</td>


					<td>
						<a ng-click="edit(report.id)" type="button" class="btn btn-info btn-flat" title="Edit" tooltip><i class="fa fa-pencil"></i></a>
						<a ng-click="remove(report,$index)" type="button" class="btn btn-danger btn-flat" title="Delete" tooltip><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
				<tr ng-show="students.length == '0'"><td class="noTableData" colspan="5">No Students Found</td></tr>
				</tbody></table>
		</div>
		<div class="alert alert-danger" ng-if="student.error">
			<strong>There was an error: </strong> {{student.error.error}}
			<br>Please go back and login again
		</div>
	</div>
</section>

<section class="content" ng-show="views.add">
	<a ng-click="changeView('list')" class="floatRTL btn btn-danger btn-flat pull-right marginBottom15">Cancel Add</a>
	<div class="box col-xs-12">
		<div class="box-header">
			<h3 class="box-title">Add Students</h3>
		</div>
		<div class="box-body table-responsive">
			<form class="form-horizontal" name="addReport" role="form" ng-submit="saveAdd()" novalidate>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Student Name* </label>
					<div class="col-sm-10">
						<select class="form-control"  ng-model="form.student_id" name="student" required>
							<option ng-repeat="student in report.students" value="{{student.id}}">{{student.name}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addReport.class.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Class *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.class" name="class" required>
							<option ng-repeat="class in report.classes" value="{{class.id}}">{{class.name}}</option>
						</select>
					</div>

				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_1 </label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_1" maxlength="2" ng-model="form.sem1_eval_1" class="form-control"  placeholder="sem1_eval_1">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_2</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_2" maxlength="2" ng-model="form.sem1_eval_2" class="form-control"  placeholder="sem1_eval_2">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_3</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_3" maxlength="2" ng-model="form.sem1_eval_3" class="form-control"  placeholder="sem1_eval_3">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_4</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_4" maxlength="2" ng-model="form.sem1_eval_4" class="form-control"  placeholder="sem1_eval_4">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_1 </label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_1" maxlength="2" ng-model="form.sem2_eval_1" class="form-control"  placeholder="sem2_eval_1">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_2</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_2" maxlength="2" ng-model="form.sem2_eval_2" class="form-control"  placeholder="sem2_eval_2">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_3</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_3" maxlength="2" ng-model="form.sem2_eval_3" class="form-control"  placeholder="sem2_eval_3">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_4</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_4" maxlength="2" ng-model="form.sem2_eval_4" class="form-control"  placeholder="sem2_eval_4">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" ng-disabled="addDorm.$invalid">Add Report</button>
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
			<h3 class="box-title">Edit Report</h3>
		</div>
		<div class="box-body table-responsive">
			<form class="form-horizontal" name="editStudent" role="form" ng-submit="saveEdit()" novalidate>
				<div class="form-group" ng-class="{'has-error': editStudent.student.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Student Name* </label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.student_id" name="student" required>
							<option ng-repeat="student in report.students" value="{{student.id}}">{{student.name}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.class.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Class *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.class_id" name="class" required>
							<option ng-repeat="class in report.classes" value="{{class.id}}">{{class.name}}</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_1 </label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_1" maxlength="2" ng-model="form.sem1_eval_1" class="form-control" placeholder="sem1_eval_1">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_2</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_2" maxlength="2" ng-model="form.sem1_eval_2" class="form-control"  placeholder="sem1_eval_2">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_3</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_3" maxlength="2" ng-model="form.sem1_eval_3" class="form-control"  placeholder="sem1_eval_3">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_4</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_4" maxlength="2" ng-model="form.sem1_eval_4" class="form-control"  placeholder="sem1_eval_4">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_1 </label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_1" maxlength="2" ng-model="form.sem2_eval_1" class="form-control"  placeholder="sem2_eval_1">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_2</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_2" maxlength="2" ng-model="form.sem2_eval_2" class="form-control"  placeholder="sem2_eval_2">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_3</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_3" maxlength="2" ng-model="form.sem2_eval_3" class="form-control"  placeholder="sem2_eval_3">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_4</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_4" maxlength="2" ng-model="form.sem2_eval_4" class="form-control"  placeholder="sem2_eval_4">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" ng-disabled="editStudent.$invalid">Edit Report</button>
				</div>
			</form>
		</div>
	</div>
</section>

<section class="content" ng-show="views.final">
	<a ng-click="changeView('list')" class="floatRTL btn btn-danger btn-flat pull-right marginBottom15">Print Result </a>
	<div class="box col-xs-12">
		<div class="box-header">
			<h3 class="box-title">Final Report</h3>
		</div>
		<div class="box-body table-responsive">
			<form class="form-horizontal" name="editStudent" role="form" ng-submit="saveEdit()" novalidate>
				<div class="form-group" ng-class="{'has-error': editStudent.student.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Student Name* </label>
					<div class="col-sm-10">
						{{report.student.name}}
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.class.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Class *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.class_id" name="class" required>
							<option readonly ng-repeat="class in report.classes" value="{{class.id}}">{{class.name}}</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_1 </label>
					<div class="col-sm-10">
						<input type="text" readonly name="sem1_eval_1" maxlength="2" ng-model="form.sem1_eval_1" class="form-control" placeholder="sem1_eval_1">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_2</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_2" maxlength="2" ng-model="form.sem1_eval_2" class="form-control"  placeholder="sem1_eval_2">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_3</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_3" maxlength="2" ng-model="form.sem1_eval_3" class="form-control"  placeholder="sem1_eval_3">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem1_eval_4</label>
					<div class="col-sm-10">
						<input type="text" name="sem1_eval_4" maxlength="2" ng-model="form.sem1_eval_4" class="form-control"  placeholder="sem1_eval_4">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_1 </label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_1" maxlength="2" ng-model="form.sem2_eval_1" class="form-control"  placeholder="sem2_eval_1">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_2</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_2" maxlength="2" ng-model="form.sem2_eval_2" class="form-control"  placeholder="sem2_eval_2">
					</div>
				</div>
				<div class="form-group" >
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_3</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_3" maxlength="2" ng-model="form.sem2_eval_3" class="form-control"  placeholder="sem2_eval_3">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">sem2_eval_4</label>
					<div class="col-sm-10">
						<input type="text" name="sem2_eval_4" maxlength="2" ng-model="form.sem2_eval_4" class="form-control"  placeholder="sem2_eval_4">
					</div>
				</div>
			</form>
		</div>
	</div>
</section>