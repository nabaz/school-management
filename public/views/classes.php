<section class="content" ng-show="views.list">
    <a ng-click="changeView('add')" class="floatRTL btn btn-success btn-flat pull-right marginBottom15">Add Class</a>

    <div class="well">
        <h3>Classes</h3>
        <div class="box-body table-responsive" ng-init="class.getClasses()">
            <table class="table table-hover" ng-if="class.classes">
                <tbody><tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Teacher</th>
                    <th>Email</th>
                    <th>Stage</th>

                </tr>
                <tr ng-repeat="class in class.classes | filter:searchText">
                    <td>{{class.id}}</td>
                    <td>{{class.name}}</td>
                    <td>{{class.teacher_name}}</td>
                    <td>{{class.email}}</td>
                    <td>{{class.stage}}</td>
                    <td>
                        <a ng-click="edit(class.id)" type="button" class="btn btn-info btn-flat" title="Edit" tooltip><i class="fa fa-pencil"></i></a>
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
            <h3 class="box-title">Add Class</h3>
        </div>
        <div class="box-body table-responsive">
            <form class="form-horizontal" name="addClass" role="form" ng-submit="saveAdd()" novalidate>
                <div class="form-group" ng-class="{'has-error': addClass.name.$invalid}">
                    <label for="inputEmail3" class="col-sm-2 control-label">Class Name* </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" ng-model="form.name" class="form-control" required placeholder="Name">
                    </div>
                </div>
                <div class="form-group" ng-class="{'has-error': AddClass.teacher_id.$invalid}">
                    <label for="inputPassword3" class="col-sm-2 control-label">Class Teacher *</label>
                    <div class="col-sm-10">
                        <select class="form-control" ng-model="form.teacher_id" name="teacher_id"  required>
                            <option ng-repeat="teacher in class.teachers" value="{{teacher.id}}" >{{teacher.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" ng-class="{'has-error': addClass.stage.$invalid}">
                    <label for="inputPassword3" class="col-sm-2 control-label">Class Stage *</label>
                    <div class="col-sm-10">
                        <select class="form-control" ng-model="form.stage" name="stage" required>
                                <option ng-repeat="stage in stages" value="{{stage}}">{{stage}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" ng-disabled="addDorm.$invalid">Add Class</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="content" ng-show="views.edit">
    <a ng-click="changeView('list')" class="floatRTL btn btn-danger btn-flat pull-right marginBottom15">Cancel Edit</a>
    <div class="box col-xs-12">
        <div class="box-header">
            <h3 class="box-title">Edit Class</h3>
        </div>
        <div class="box-body table-responsive">
            <form class="form-horizontal" name="editDorm" role="form" ng-submit="saveEdit()" novalidate>
                <div class="form-group" ng-class="{'has-error': addDorm.name.$invalid}">
                    <label for="inputEmail3" class="col-sm-2 control-label">class Name * </label>
                    <div class="col-sm-10">
                        <input type="text" name="className" ng-model="form.name" class="form-control" required placeholder="Name">
                    </div>
                </div>
                <div class="form-group" ng-class="{'has-error': addDorm.teacher_id.$invalid}">
                    <label for="inputPassword3" class="col-sm-2 control-label">class Teacher *</label>
                    <div class="col-sm-10">
                        <select class="form-control" ng-model="form.teacher_id" name="teacher_id" multiple required>
                            <option ng-repeat="teacher in class.teachers" value="{{teacher.id}}">{{teacher.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" ng-class="{'has-error': addDorm.stageId.$invalid}">
                    <label for="inputPassword3" class="col-sm-2 control-label">Stage *</label>
                    <div class="col-sm-10">
                        <select class="form-control" ng-model="form.stageId" name="stageId" required>
                            <option ng-repeat="stage in stages | filter:searchText" value="{{stage}}">{{stage}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" ng-disabled="editClass.$invalid">Edit Clase</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>