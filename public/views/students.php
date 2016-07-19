<section class="content" ng-show="views.list">
	<a ng-click="changeView('add')" class="floatRTL btn btn-success btn-flat pull-right marginBottom15">Add Student</a>

	<div class="well">
		<h3>Students</h3>
		<div class="box-body table-responsive" ng-init="student.getStudents()">
			<table class="table table-hover" ng-if="student.students">
				<tbody><tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Birthday</th>
					<th>Stage</th>
					<th>Parents</th>
					<th>Telephone</th>
				</tr>
				<tr ng-repeat="student in student.students | filter:searchText">
					<td>{{student.id}}</td>
					<td>{{student.name}}</td>
					<td>{{student.email}}</td>
					<td>{{student.gender}}</td>
					<td>{{student.birthday}}</td>
					<td>{{student.stage}}</td>
					<td>{{student.parent_name}}</td>
					<td>{{student.phone}}</td>

					<td>
						<a ng-click="edit(student.id)" type="button" class="btn btn-info btn-flat" title="Edit" tooltip><i class="fa fa-pencil"></i></a>
                        <a ng-click="final(student.id)" type="button" class="btn btn-info btn-flat" title="Final Result" tooltip><i class="fa fa-graduation-cap"></i></a>
                        <a ng-click="remove(student,$index)" type="button" class="btn btn-danger btn-flat" title="Delete" tooltip><i class="fa fa-trash-o"></i></a>
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
			<form class="form-horizontal" name="addDorm" role="form" ng-submit="saveAdd()" novalidate>
				<div class="form-group" ng-class="{'has-error': editStudent.classNamee.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Student Name* </label>
					<div class="col-sm-10">
						<input type="text" name="name" ng-model="form.name" class="form-control" required placeholder="Class Name">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.gender.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Gender *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.gender" name="gender" required>
							<option ng-repeat="gender in genders" value="{{gender}}">{{gender}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.birthday.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">birthday* </label>
					<div class="col-sm-10">
						<input type="date" name="birthday" ng-model="form.birthday" class="form-control" required placeholder="birthday">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="text" name="email" ng-model="form.email" class="form-control" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Telephone</label>
					<div class="col-sm-10">
						<input type="text" name="telephone" ng-model="form.telephone" class="form-control"  placeholder="telephone">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.parent_id.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.parent_id" name="parent_id"  required>
							<option ng-repeat="parent in student.parentstudents" value="{{parent.id}}">{{parent.name}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.stage.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Stage *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.stage" name="stage" required>
							<option ng-repeat="stage in stages" value="{{stage}}">{{stage}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.group.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">group *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.group" name="group" required>
							<option ng-repeat="group in groups" value="{{group}}">{{group}}</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" ng-disabled="addDorm.$invalid">Add Student</button>
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
			<h3 class="box-title">Edit Student</h3>
		</div>
		<div class="box-body table-responsive">
			<form class="form-horizontal" name="editStudent" role="form" ng-submit="saveEdit()" novalidate>
				<div class="form-group" ng-class="{'has-error': editStudent.className.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Student Name* </label>
					<div class="col-sm-10">
						<input type="text" name="name" ng-model="form.name" class="form-control" required placeholder="Class Name">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.gender.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Gender *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.gender" name="gender" required>
							<option ng-repeat="gender in genders" value="{{gender}}">{{gender}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.birthday.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">birthday* </label>
					<div class="col-sm-10">
						<input type="date" name="birthday" ng-model="form.birthday" class="form-control" required placeholder="birthday">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="text" name="email" ng-model="form.email" class="form-control" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Telephone</label>
					<div class="col-sm-10">
						<input type="text" name="telephone" ng-model="form.telephone" class="form-control"  placeholder="telephone">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.parent_id.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.parent_id" name="parent_id"  required>
							<option ng-repeat="parent in student.parentstudents" value="{{parent.id}}">{{parent.name}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.stage.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Stage *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.stage" name="stage" required>
							<option ng-repeat="stage in stages" value="{{stage}}">{{stage}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editStudent.group.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">group *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.group" name="group" required>
							<option ng-repeat="group in groups" value="{{group}}">{{group}}</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" ng-disabled="editStudent.$invalid">Edit Student</button>
				</div>
			</form>
		</div>
	</div>
</section>

<section class="content" ng-show="views.final">
    <a ng-click="printDiv('printableArea');" class="floatRTL btn btn-danger btn-flat pull-right marginBottom15">Print Result </a>
    <div class="box col-xs-12">
        <div class="box-header">
            <h3 class="box-title">Final Report</h3>
        </div>
        <div class="box-body table-responsive">
            <div class="well">

                <div class="box-body table-responsive" ng-init="student.final()"  id="printableArea">
                    <div class="box-body table-responsive">
                        <h3 >Student Name: {{student.reports[0].name}}</h3>
                        <h4>Stage: {{student.reports[0].stage}}</h4>
                        <h4>Year: 2015 - 2016</h4>
                    </div>
                    <table class="table table-hover" ng-if="student.reports">
                        <tbody><tr>
                            <th>Class Name</th>
                            <th>sem1_eval_1</th>
                            <th>sem1_eval_2</th>
                            <th>sem1_eval_3</th>
                            <th>sem1_eval_4</th>
                            <th>Sem1_Total</th>

                            <th>sem2_eval_1</th>
                            <th>sem2_eval_2</th>
                            <th>sem2_eval_3</th>
                            <th>sem2_eval_4</th>
                            <th>sem2_total</th>
                            <th>FINAL RESULT</th>
                        </tr>
                        <tr ng-repeat="student in student.reports | filter:searchText">
                            <td>{{student.class_name}}</td>
                            <td>{{student.sem1_eval_1}}</td>
                            <td>{{student.sem1_eval_2}}</td>
                            <td>{{student.sem1_eval_3}}</td>
                            <td>{{student.sem1_eval_4}}</td>
                            <td ng-init="getSem1Total(student)">{{student.total}}</td>
                            <td>{{student.sem2_eval_1}}</td>
                            <td>{{student.sem2_eval_2}}</td>
                            <td>{{student.sem2_eval_3}}</td>
                            <td>{{student.sem2_eval_4}}</td>
                            <td ng-init="getSem2Total(student)">{{student.total2}}</td>
                            <td ng-init="getSemFinalResult(student,student,student)">{{student.finalResult}}</td>

                        </tr>
                        <tr ng-show="students.length == '0'"><td class="noTableData" colspan="5">No Report Found</td></tr>
                        </tbody></table>
                </div>
                <div class="alert alert-danger" ng-if="student.error">
                    <strong>There was an error: </strong> {{student.error.error}}
                    <br>Please go back and login again
                </div>
            </div>
        </div>
    </div>
</section>