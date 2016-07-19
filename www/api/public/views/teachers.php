<section class="content" ng-show="views.list">
	<a ng-click="changeView('add')" class="floatRTL btn btn-success btn-flat pull-right marginBottom15">Add Teacher</a>

	<div class="well">
		<h3>Teachers</h3>
		<div class="box-body table-responsive" ng-init="teacher.getTeachers()">
			<table class="table table-hover" ng-if="teacher.teachers">
				<tbody><tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Birthday</th>
					<th>Degree</th>
					<th>Speciality</th>
					<th>Job Title</th>
<!--					<th>Skill</th>-->
					<th>Plla</th>
					<th>Qonagh</th>
<!--					<th>Status</th>-->

				</tr>
				<tr ng-repeat="teacher in teacher.teachers | filter:searchText">
					<td>{{teacher.id}}</td>
					<td>{{teacher.name}}</td>
					<td>{{teacher.email}}</td>
					<td>{{teacher.gender}}</td>
					<td>{{teacher.birthday}}</td>
					<td>{{teacher.degree}}</td>
					<td>{{teacher.speciality}}</td>
					<td>{{teacher.job_title}}</td>
<!--					<td>{{teacher.skill}}</td>-->
					<td>{{teacher.plla}}</td>
					<td>{{teacher.qonagh}}</td>
<!--					<td>{{teacher.maraital_state}}</td>-->
					<td>
						<a ng-click="edit(teacher.id)" type="button" class="btn btn-info btn-flat" title="Edit" tooltip><i class="fa fa-pencil"></i></a>
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
			<h3 class="box-title">add Teacher</h3>
		</div>
		<div class="box-body table-responsive">
			<form class="form-horizontal" name="addDorm" role="form" ng-submit="saveAdd()" novalidate>
				<div class="form-group" ng-class="{'has-error': addDorm.name.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Teachers Name* </label>
					<div class="col-sm-10">
						<input type="text" name="name" ng-model="form.name" class="form-control" required placeholder="Teacher Name">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.email.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Teacher Email* </label>
					<div class="col-sm-10">
						<input type="text" name="email" ng-model="form.email" class="form-control" required placeholder="Teacher Email">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.gender.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Gender * </label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.gender" name="gender" required>
							<option ng-repeat="gender in genders" value="{{gender}}">{{gender}}</option>
						</select>
					</div>
				</div>	<div class="form-group" ng-class="{'has-error': addDorm.Birthday.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Birthday * </label>
					<div class="col-sm-10">
						<input type="date" name="birthday" ng-bind="date | date:'MM/dd/yyyy'" ng-model="form.birthday" class="form-control" required placeholder="Birthday">
					</div>
				</div>	<div class="form-group" ng-class="{'has-error': addDorm.degree.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Degree * </label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.degree" name="degree" required>
							<option ng-repeat="degree in degrees" value="{{degree}}">{{degree}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.speciality.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">speciality * </label>
					<div class="col-sm-10">
						<input type="text" name="speciality" ng-model="form.speciality" class="form-control" required placeholder="speciality">
					</div>
				</div>	<div class="form-group" ng-class="{'has-error': addDorm.job_title.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Job Title* </label>
					<div class="col-sm-10">
						<input type="text" name="job_title" ng-model="form.job_title" class="form-control" required placeholder="Job Title">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.employment_date.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">employment_date * </label>
					<div class="col-sm-10">
						<input type="date" name="employment_date" ng-model="form.employment_date" class="form-control" required placeholder="employment_date">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': addDorm.employment_start.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">employment_start * </label>
					<div class="col-sm-10">
						<input type="date" name="employment_start" ng-model="form.employment_start" class="form-control" required placeholder="employment_start">
					</div>
				</div>

				<div class="form-group" ng-class="{'has-error': addDorm.plla.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Plla *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.plla" name="plla" required>
							<option ng-repeat="plla in pllas" value="{{plla}}">{{plla}}</option>
						</select>
					</div>
				</div>

				<div class="form-group" ng-class="{'has-error': addDorm.Qonagh.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Qonagh *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.qonagh" name="qonagh" required>
							<option ng-repeat="qonagh in qonaghs" value="{{qonagh}}">{{qonagh}}</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" ng-disabled="addDorm.$invalid">Add Teacher</button>
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
				<div class="form-group" ng-class="{'has-error': editDorm.name.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Teachers Name* </label>
					<div class="col-sm-10">
						<input type="text" name="name" ng-model="form.name" class="form-control" required placeholder="Teacher Name">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editDorm.email.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Teacher Email* </label>
					<div class="col-sm-10">
						<input type="text" name="email" ng-model="form.email" class="form-control" required placeholder="Teacher Email">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editDorm.gender.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Gender * </label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.gender" name="gender" required>
							<option ng-repeat="gender in genders" value="{{gender}}">{{gender}}</option>
						</select>
					</div>
				</div>	<div class="form-group" ng-class="{'has-error': editDorm.Birthday.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Birthday * </label>
					<div class="col-sm-10">
						<input type="date" name="birthday" ng-model="form.birthday" class="form-control" required placeholder="Birthday">
					</div>
				</div>	<div class="form-group" ng-class="{'has-error': editDorm.degree.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Degree * </label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.degree" name="degree" required>
							<option ng-repeat="degree in degrees" value="{{degree}}">{{degree}}</option>
						</select>
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editDorm.speciality.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">speciality * </label>
					<div class="col-sm-10">
						<input type="text" name="speciality" ng-model="form.speciality" class="form-control" required placeholder="speciality">
					</div>
				</div>	<div class="form-group" ng-class="{'has-error': editDorm.job_title.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">Job Title* </label>
					<div class="col-sm-10">
						<input type="text" name="job_title" ng-model="form.job_title" class="form-control" required placeholder="Job Title">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editDorm.employment_date.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">employment_date * </label>
					<div class="col-sm-10">
						<input type="date" name="employment_date" ng-model="form.employment_date" class="form-control" required placeholder="employment_date">
					</div>
				</div>
				<div class="form-group" ng-class="{'has-error': editDorm.employment_start.$invalid}">
					<label for="inputEmail3" class="col-sm-2 control-label">employment_start * </label>
					<div class="col-sm-10">
						<input type="date" name="employment_start" ng-model="form.employment_start" class="form-control" required placeholder="employment_start">
					</div>
				</div>

				<div class="form-group" ng-class="{'has-error': editDorm.plla.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Plla *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.plla" name="plla" required>
							<option ng-repeat="plla in pllas" value="{{plla}}">{{plla}}</option>
						</select>
					</div>
				</div>

				<div class="form-group" ng-class="{'has-error': addDorm.Qonagh.$invalid}">
					<label for="inputPassword3" class="col-sm-2 control-label">Qonagh *</label>
					<div class="col-sm-10">
						<select class="form-control" ng-model="form.Qonagh" name="dormitoryId" required>
							<option ng-repeat="qonagh in qonaghs" value="{{qonagh}}">{{qonagh}}</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" ng-disabled="editDorm.$invalid">Edit Teacher</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>