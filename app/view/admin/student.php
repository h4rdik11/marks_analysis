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

	input.ng-touched.ng-invalid{ border-color: #d9534f; }
	input.ng-touched.ng-valid{ border-color: #5cb85c; }	
	.error-text{ color: #d9534f; }

	.modal{ margin-top: 10%; }
	.btn{ border-radius: 0px }

</style>


<div class="row">
	
	<!-- Entry Form -->
	<div class="col-md-6">
		<center>
			<div class="form-table mdl-shadow--4dp" style="background-color: #006B99">
				<form method="POST" name="details" ng-submit="addStudent()" id="myForm">
					<table>
						<tr>
							<td class="input-field">
								<div class="row">
									<div class="col-md-6"><input type="text" ng-model="studentDetails.fname" name="fname" class="form-control" placeholder="First Name.." id="fname" required></div>
									<div class="col-md-6"><input type="text" ng-model="studentDetails.lname" class="form-control" placeholder="Last Name.." id="lname"></div>
								</div>
								<div ng-show="details.fname.$touched">
									<span class="error-text" ng-show="details.fname.$error.required">First Name is Required</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="text" name="eid" ng-model="studentDetails.roll" class="form-control" placeholder="Roll No.." required>
								<div ng-show="details.eid.$touched">
									<span class="error-text" ng-show="details.eid.$error.required">Roll Number is required.</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<div class="row">
								  <div class="col-lg-6">
								    <div class="input-group">
								      <div class="input-group-btn">
								        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sem <span class="caret"></span></button>
								        <ul class="dropdown-menu">
								          <li><a href="javascript:0" ng-click="setStudentVals('sem',1)">1</a></li>
								          <li><a href="javascript:0" ng-click="setStudentVals('sem',2)">2</a></li>
								          <li><a href="javascript:0" ng-click="setStudentVals('sem',3)">3</a></li>
								          <li><a href="javascript:0" ng-click="setStudentVals('sem',4)">4</a></li>
								          <li><a href="javascript:0" ng-click="setStudentVals('sem',5)">5</a></li>
								          <li><a href="javascript:0" ng-click="setStudentVals('sem',6)">6</a></li>
								        </ul>
								      </div><!-- /btn-group -->
								      <input type="text" class="form-control" aria-label="sem" placeholder="Sem.." ng-model="studentDetails.sem" readonly required title={{studentDetails.sem}}  data-toggle="tooltip">
								    </div><!-- /input-group -->
								  </div><!-- /.col-lg-6 -->
								  <div class="col-lg-6">
								    <div class="input-group">
								      <input type="text" class="form-control" aria-label="course" placeholder="Course.." ng-model="studentDetails.course" readonly required title={{studentDetails.course}}  data-toggle="tooltip">
								      <div class="input-group-btn">
								        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Course <span class="caret"></span></button>
								        <ul class="dropdown-menu dropdown-menu-right">
								          <li ng-repeat="c in course"><a href="javascript:0" ng-click="setStudentVals('course',c.code)">{{c.code}}</a></li>
								        </ul>
								      </div><!-- /btn-group -->
								    </div><!-- /input-group -->
								  </div><!-- /.col-lg-6 -->
								</div><!-- /.row -->
							     
								<div ng-show="details.sem.$touched || details.course.$touched">
									<span class="error-text" ng-show="details.sem.$error.required">Semester is required.</span>
									<span class="error-text" ng-show="details.course.$error.required">Course is required.</span>
								</div>
							</td>	
						</tr>
						<tr>
							<td class="input-field">
								<div class="input-group" style="width: 100%">
							      <div class="input-group-btn">
							        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Batch <span class="caret"></span></button>
							        <ul class="dropdown-menu" style="height: 120px; overflow-y: scroll;">
							          <li ng-repeat="b in batch"><a href="javascript:0" ng-click="setStudentVals('btch',b.start)">{{b.start}}</a></li>
							        </ul>
							      </div><!-- /btn-group -->
							      <input type="text" class="form-control" aria-label="batch" placeholder="Batch.." ng-model="studentDetails.batch" readonly required title={{studentDetails.batch}}  data-toggle="tooltip" name="batch">
							    </div><!-- /input-group -->

								<div ng-show="details.dept.$touched">
									<span class="error-text" ng-show="details.batch.$error.required">Batch is required.</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field" style="color: white;padding: 1% 2% 2% 2%">
								<div class="row">
									<div class="col-md-4">
										Gender : 
									</div>
									<div class="col-md-4">
										<input type="radio" name="gender" ng-model="studentDetails.gender" value="male" required> : Male
									</div>
									<div class="col-md-4">
										<input type="radio" name="gender" ng-model="studentDetails.gender" value="female" required> : Female
									</div>
								</div>
								<div ng-show="details.gender.$touched">
									<span class="error-text" ng-show="details.gender.$error.required">Gender is required.</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="text" ng-model="studentDetails.contact" name="contact" class="form-control" placeholder="Contact.." required>
								<div ng-show="details.contact.$touched">
									<span class="error-text" ng-show="details.contact.$error.required">Contact is required.</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="email" ng-model="studentDetails.email" name="email" class="form-control" placeholder="E-Mail.." required>
								<div ng-show="details.email.$touched">
									<span class="error-text" ng-show="details.email.$error.required">Email is required.</span>
									<span class="error-text" ng-show="details.email.$error.email">Email is invalid.</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<textarea ng-model="studentDetails.address" name="address" class="form-control" placeholder="Address.." required></textarea>
								<div ng-show="details.address.$touched">
									<span class="error-text" ng-show="details.address.$error.required">Address is required.</span>
								</div>
							</td>
						</tr>
					</table>
					<input type="submit" ng-show="studentAdd" class="btn btn-success mdl-shadow--2dp" value="SUBMIT">
					<div class="row" ng-show="studentEdit">
						<div class="col-md-6">
							<input type="submit" class="btn btn-success mdl-shadow--2dp" value="UPDATE">
						</div>
						<div class="col-md-6">
							<input type="button" ng-click="studentFormReset()" class="btn btn-danger mdl-shadow--2dp" value="DISCARD">
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
				<div class="col-md-6"><input type="text" ng-model="roll_key" class="form-control" placeholder="Search by Roll No.."></div>
				<div class="col-md-6"><input type="text" ng-model="name_key" class="form-control" placeholder="Search by Name.."></div>	
			</div>
			<div class="inner-table">
				<table class="table table-hover">
					<thead>
						<th><center>RollNo.</center></th>
						<th><center>Name</center></th>
						<th><center>Course</center></th>
					</thead>
					<tbody>
						<tr ng-repeat="s in student | filter: {roll:roll_key,fname:name_key}">
							<td><center>{{s.roll}}</center></td>
							<td><center><a href="javascript:0" data-toggle="modal" data-target="#studentModal{{s.sno}}">{{s.fname}}&nbsp;{{s.lname}}</a></center></td>
							<td><center>{{s.course}}({{s.sem}})</center></td>
							<td><center><a href="javascript:0" class=" label label-primary" ng-click="editStudent($index)"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:0" class="label label-danger" ng-click="deleteStudent(s.roll)"><i class="fa fa-trash" aria-hidden="true"></i></a></center></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
