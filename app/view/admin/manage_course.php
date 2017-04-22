<style type="text/css">
	
	.form-table{ margin-top: 5%; width: 80%; padding: 8% 10% 5% 10%; background-color: #fff }
	.form-table .input-field{ padding-bottom: 2%; }	
	.form-table form input[type="submit"]{ margin-top: 2%; width: 50% }
	.form-table form table{ width: 100%; }

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

<!-- Selection Tabs -->
<center style="padding:1.5% 0 0 2%; border-bottom: 1px solid #DEDEDE">

<ul class="nav nav-pills no_print">
    <li class="nav active"><a href="javascript:0 #A" data-toggle="tab">Add Course</a></li>
    <li class="nav"><a href="javascript:0 #B" data-toggle="tab">Update Course</a></li>
</ul>

</center>
<!-- Ending Selection TAbs -->

<div class="tab-content">
	<div class="tab-pane fade in active" id="A">
		<div class="row">
			<!-- Entry Form -->
			<div class="col-md-6">
				<center>
					<div class="form-table mdl-shadow--2dp" style="background-color: #006B99">
						<form method="POST" name="details" ng-submit="addCourse()">
							<table>
								<tr>
									<td class="input-field">
										<input type="text" ng-model="courseDetails.code" name="course_code" class="form-control" placeholder="Course Code.." id="course_code" required>
										<div ng-show="details.course_code.$touched">
											<span class="error-text" ng-show="details.course_code.$error.required">Course Code is Required</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="input-field">
										<input type="text" name="course_name" ng-model="courseDetails.name" class="form-control" placeholder="Course Name.." required>
										<div ng-show="details.course_name.$touched">
											<span class="error-text" ng-show="details.course_name.$error.required">Course Name is required.</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="input-field">
										<input type="text" ng-model="courseDetails.dur" name="course_dur" class="form-control" placeholder="Duration.." required>
										<div ng-show="details.course_dur.$touched">
											<span class="error-text" ng-show="details.course_dur.$error.required">Course Duration is required.</span>
										</div>
									</td>
								</tr>
							</table>
							<input type="submit" class="btn btn-danger mdl-shadow--2dp" value="SUBMIT">
						</form>
					</div>
				</center>
			</div>

			<!-- Display Table -->
			<div class="col-md-6">
				<div class="display-table">
					<div class="row">
						<div class="col-md-6"><input type="text" ng-model="code_key" class="form-control" placeholder="Search by Code.."></div>
						<div class="col-md-6"><input type="text" ng-model="name_key" class="form-control" placeholder="Search by Name.."></div>	
					</div>
					<div class="inner-table">
						<table class="table table-hover">
							<thead>
								<th><center>Course Code</center></th>
								<th><center>Course Name</center></th>
								<th><center>Duration</center></th>
							</thead>
							<tbody>
								<tr ng-repeat="c in course">
									<td><center>{{c.code}}</center></td>
									<td><center>{{c.name}}</center></td>
									<td><center>{{c.duration}}</center></td>
									<td><center><a href="javascript:0" class="label label-danger" ng-click="deleteCourse(c.code)"><i class="fa fa-trash" aria-hidden="true"></i></a></center></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="tab-pane fade in" id="B">
		<div class="row">
			<!-- Entry Form -->
			<div class="col-md-6">
				<center>
					<div class="form-table mdl-shadow--2dp" style="background-color: #006B99">
						<form method="POST" name="details" ng-submit="updateCourse()">
							<table>
								<tr>
									<td class="input-field">
										<div class="input-group" style="width: 100%">
									      <div class="input-group-btn">
									        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Course Code.. <span class="caret"></span></button>
									        <ul class="dropdown-menu dropdown-menu-left">
									          <li ng-repeat="c in course"><a href="javascript:0" ng-click="setUpdateCourse($index)">{{c.name}}</a></li>
									        </ul>
									      </div><!-- /btn-group -->
									      <input type="text" class="form-control" aria-label="course" placeholder="Select Subject.." ng-model="course_update.name" readonly required title={{course_update.name}}  data-toggle="tooltip">
									    </div><!-- /input-group -->
								    </td>
								</tr>
								<tr>
									<td class="input-field">
										<input type="text" name="name" ng-model="course_update.name_update" class="form-control" placeholder="Course Name.." required>
										<div ng-show="details.name.$touched">
											<span class="error-text" ng-show="details.name.$error.required">Course Name is required.</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="input-field">
										<input type="text" ng-model="course_update.duration" name="credit" class="form-control" placeholder="Course Duration.." required>
										<div ng-show="details.credit.$touched">
											<span class="error-text" ng-show="details.credit.$error.required">Duration required.</span>
										</div>
									</td>
								</tr>
							</table>
							<input type="submit" class="btn btn-danger mdl-shadow--2dp" value="UPDATE">
						</form>
					</div>
				</center>
			</div>

			<!-- Display Table -->
			<div class="col-md-6">
				<div class="display-table">
					<div class="row">
						<div class="col-md-6"><input type="text" ng-model="code_key" class="form-control" placeholder="Search by Code.."></div>
						<div class="col-md-6"><input type="text" ng-model="name_key" class="form-control" placeholder="Search by Name.."></div>	
					</div>
					<div class="inner-table">
						<table class="table table-hover">
							<thead>
								<th><center>Course Code</center></th>
								<th><center>Course Name</center></th>
								<th><center>Duration</center></th>
							</thead>
							<tbody>
								<tr ng-repeat="c in course | filter: {code:code_key,name:name_key}">
									<td><center>{{c.code}}</center></td>
									<td><center>{{c.name}}</center></td>
									<td><center>{{c.duration}}</center></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
