<style type="text/css">
	
	.form-table{ margin-top: 5%; width: 80%; padding: 8% 10% 5% 10%; background-color: #fff }
	.form-table .input-field{ padding-bottom: 2% }	
	.form-table form input[type="submit"]{ margin-top: 2%; width: 50% }

	.display-table{ margin-top: 5%;}
	.display-table .inner-table{  height: 520px; overflow-y: scroll; margin-top: 2%; }
	.display-table table{ width: 100% }

	.display-table .inner-table::-webkit-scrollbar-track{ -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); background-color: #F5F5F5; }
	.display-table .inner-table::-webkit-scrollbar{ width: 6px; background-color: #F5F5F5;	}
	.display-table .inner-table::-webkit-scrollbar-thumb{ background-color: #000000; }

	input.ng-dirty.ng-invalid{ border-color: #d9534f; }
	input.ng-dirty.ng-valid{ border-color: #5cb85c; }	
	.error-text{ color: #d9534f; }

	.modal{ margin-top: 10%; }

	.btn{ border-radius: 0px }

</style>


<div class="row">
	
	<!-- Entry Form -->
	<div class="col-md-6">
		<center> <!--#074e72-->
			<div class="form-table mdl-shadow--4dp" style="background-color: #006B99">
				<form method="POST" name="details" ng-submit="addTeacher()" id="myForm">
					<table>
						<tr>
							<td class="input-field">
								<div class="row">
									<div class="col-md-6"><input type="text" ng-model="teacherDetails.fname" name="fname" class="form-control" placeholder="First Name.." id="fname" required></div>
									<div class="col-md-6"><input type="text" ng-model="teacherDetails.lname" class="form-control" placeholder="Last Name.." id="lname"></div>
								</div>
								<div ng-show="details.fname.$dirty">
									<span class="error-text" ng-show="details.fname.$error.required">First Name is Required</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="text" name="eid" ng-model="teacherDetails.eid" class="form-control" placeholder="Employee ID.." required>
								<div ng-show="details.eid.$dirty">
									<span class="error-text" ng-show="details.eid.$error.required">EmployeeID is required.</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="text" ng-model="teacherDetails.desig" name="desig" class="form-control" placeholder="Designation.." required>
								<div ng-show="details.desig.$dirty">
									<span class="error-text" ng-show="details.desig.$error.required">Designation is required.</span>
								</div>
							</td>	
						</tr>
						<tr>
							<td class="input-field">
								<input type="text" ng-model="teacherDetails.dept" name="dept" class="form-control" placeholder="Department.." required>
								<div ng-show="details.dept.$dirty">
									<span class="error-text" ng-show="details.dept.$error.required">Department is required.</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="text" ng-model="teacherDetails.contact" maxlength="10" name="contact" class="form-control" placeholder="Contact.." required>
								<div ng-show="details.contact.$dirty">
									<span class="error-text" ng-show="details.contact.$error.required">Contact is required.</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="email" ng-model="teacherDetails.email" name="email" class="form-control" placeholder="E-Mail.." required>
								<div ng-show="details.email.$dirty">
									<span class="error-text" ng-show="details.email.$error.required">Email is required.</span>
									<span class="error-text" ng-show="details.email.$error.email">Email is invalid.</span>
								</div>
							</td>
						</tr>
					</table>
					<input type="submit" ng-show="add" class="btn btn-success mdl-shadow--2dp" value="SUBMIT">
					<div class="row" ng-show="edit">
						<div class="col-md-6">
							<input type="submit" class="btn btn-success mdl-shadow--2dp" value="UPDATE">
						</div>
						<div class="col-md-6">
							<input type="button" ng-click="formReset()" class="btn btn-danger mdl-shadow--2dp" value="DISCARD">
						</div>
					</div>
				</form>
			</div>
		</center>
	</div>

	<!-- Display Table -->
	<div class="col-md-6">
		<div class="display-table">
			<div class="row">
				<div class="col-md-6"><input type="text" ng-model="emp_key" class="form-control" placeholder="Search by Employee Id.."></div>
				<div class="col-md-6"><input type="text" ng-model="name_key" class="form-control" placeholder="Search by Name.."></div>	
			</div>
			<div class="inner-table">
				<table class="table table-hover">
					<thead>
						<th><center>E.ID</center></th>
						<th><center>Name</center></th>
						<th><center>Dept.</center></th>
						<th><center>E-Mail</center></th>
					</thead>
					<tbody>
						<tr ng-repeat="t in teacher | filter: {empid:emp_key,fname:name_key}">
							<td><center>{{t.empid}}</center></td>
							<td><center><a href="javascript:0" data-toggle="modal" data-target="#modal{{t.sno}}">{{t.fname}}&nbsp;{{t.lname}}</a></center></td>
							<td><center>{{t.dept}}</center></td>
							<td><center>{{t.email}}</center></td>
							<td><center><a href="javascript:0" class=" label label-primary" ng-click="editTeacher($index)"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:0" class="label label-danger" ng-click="deleteTeacher(t.empid)"><i class="fa fa-trash" aria-hidden="true"></i></a></center></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

