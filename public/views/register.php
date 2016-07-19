
    <div class="col-sm-5 col-sm-offset-4">
        <div class="well">
            <h3>Register</h3>

            <div class="box-body table-responsive">
                <form class="form-horizontal" name="addDorm" role="form" ng-submit="saveAdd()" novalidate>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name" ng-model="form.name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" ng-model="form.email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" ng-model="form.password">
                    </div>
                    <div class="form-group">
                        <select class="form-control" ng-model="form.role">
                            <option value="">Select One</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                            <option value="parent">Parent</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Add User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
