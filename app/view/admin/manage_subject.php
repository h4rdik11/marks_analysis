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

<!-- Selection Tabs -->
<center style="padding:1.5% 0 0 2%; border-bottom: 1px solid #DEDEDE">

<ul class="nav nav-pills no_print">
    <li class="nav active"><a href="javascript:0 #A" data-toggle="tab">Add Subject</a></li>
    <li class="nav"><a href="javascript:0 #B" data-toggle="tab">Update Subject</a></li>
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
						<form method="POST" name="details" ng-submit="addSubject()">
							<table>
								<tr>
									<td class="input-field">
										<input type="text" ng-model="subjectDetails.code" name="sub_code" class="form-control" placeholder="Subject Code.." id="sub_code" required>
										<div ng-show="details.sub_code.$touched">
											<span class="error-text" ng-show="details.sub_code.$error.required">Subject Code is Required</span>
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
										          <li><a href="javascript:0" ng-click="setSubjectVals('sem',1)">1</a></li>
										          <li><a href="javascript:0" ng-click="setSubjectVals('sem',2)">2</a></li>
										          <li><a href="javascript:0" ng-click="setSubjectVals('sem',3)">3</a></li>
										          <li><a href="javascript:0" ng-click="setSubjectVals('sem',4)">4</a></li>
										          <li><a href="javascript:0" ng-click="setSubjectVals('sem',5)">5</a></li>
										          <li><a href="javascript:0" ng-click="setSubjectVals('sem',6)">6</a></li>
										        </ul>
										      </div><!-- /btn-group -->
										      <input type="text" class="form-control" aria-label="sem" placeholder="Sem.." ng-model="subjectDetails.sem" readonly required title={{subjectDetails.sem}}  data-toggle="tooltip">
										    </div><!-- /input-group -->
										  </div><!-- /.col-lg-6 -->
										  <div class="col-lg-6">
										    <div class="input-group">
										      <input type="text" class="form-control" aria-label="course" placeholder="Course.." ng-model="subjectDetails.course" readonly required title={{subjectDetails.course}}  data-toggle="tooltip">
										      <div class="input-group-btn">
										        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Course <span class="caret"></span></button>
										        <ul class="dropdown-menu dropdown-menu-right">
										          <li ng-repeat="c in course"><a href="javascript:0" ng-click="setSubjectVals('course',c.code)">{{c.code}}</a></li>
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
										<input type="text" name="name" ng-model="subjectDetails.name" class="form-control" placeholder="Subject Name.." required>
										<div ng-show="details.name.$touched">
											<span class="error-text" ng-show="details.name.$error.required">Subject Name is required.</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="input-field">
										<input type="text" ng-model="subjectDetails.credit" name="credit" class="form-control" placeholder="Credits.." required>
										<div ng-show="details.credit.$touched">
											<span class="error-text" ng-show="details.credit.$error.required">Credits are required.</span>
										</div>
									</td>
								</tr>
							</table>
							<input type="submit" class="btn btn-success mdl-shadow--2dp" value="SUBMIT">
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
								<th><center>Subject ID</center></th>
								<th><center>Name</center></th>
								<th><center>Course</center></th>
								<th><center>Credits</center></th>
							</thead>
							<tbody>
								<tr ng-repeat="s in subject | filter: {id:code_key,name:name_key}">
									<td><center>{{s.id}}</center></td>
									<td><center>{{s.name}}</center></td>
									<td><center>{{s.course}} ({{s.sem}})</center></td>
									<td><center>{{s.credit}}</center></td>
									<td><center><a href="javascript:0" class="label label-danger" ng-click="deleteSubject(s.id)"><i class="fa fa-trash" aria-hidden="true"></i></a></center></td>
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
						<form method="POST" name="details" ng-submit="updateSubject()">
							<table>
								<tr>
									<td class="input-field">
										<div class="row">
										  <div class="col-lg-6">
										    <div class="input-group">
										      <div class="input-group-btn">
										        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Course <span class="caret"></span></button>
										        <ul class="dropdown-menu dropdown-menu-left">
										          <li ng-repeat="c in course"><a href="javascript:0" ng-click="setUpdate('course',c.code);getSub()">{{c.code}}</a></li>
										        </ul>
										      </div><!-- /btn-group -->
										      <input type="text" class="form-control" aria-label="course" placeholder="Course.." ng-model="sub_update.course" readonly required title={{sub_update.course}}  data-toggle="tooltip" ng-change="getSub()">
										    </div><!-- /input-group -->
										  </div><!-- /.col-lg-6 -->
										  <div class="col-lg-6">
										    <div class="input-group">
										      <div class="input-group-btn">
										        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sem <span class="caret"></span></button>
										        <ul class="dropdown-menu">
										          <li><a href="javascript:0" ng-click="setUpdate('sem',1);getSub()">1</a></li>
										          <li><a href="javascript:0" ng-click="setUpdate('sem',2);getSub()">2</a></li>
										          <li><a href="javascript:0" ng-click="setUpdate('sem',3);getSub()">3</a></li>
										          <li><a href="javascript:0" ng-click="setUpdate('sem',4);getSub()">4</a></li>
										          <li><a href="javascript:0" ng-click="setUpdate('sem',5);getSub()">5</a></li>
										          <li><a href="javascript:0" ng-click="setUpdate('sem',6);getSub()">6</a></li>
										        </ul>
										      </div><!-- /btn-group -->
										      <input type="text" class="form-control" aria-label="sem" placeholder="Sem.." ng-model="sub_update.sem" readonly required title={{sub_update.sem}}  data-toggle="tooltip" ng-change="getSub()">
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
									        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Subject <span class="caret"></span></button>
									        <ul class="dropdown-menu dropdown-menu-left">
									          <li ng-repeat="c in new_sub"><a href="javascript:0" ng-click="setUpdateSub($index)">{{c.name}}</a></li>
									        </ul>
									      </div><!-- /btn-group -->
									      <input type="text" class="form-control" aria-label="course" placeholder="Select Subject.." ng-model="sub_update.name" readonly required title={{sub_update.name}}  data-toggle="tooltip">
									    </div><!-- /input-group -->
								    </td>
								</tr>
								<tr>
									<td class="input-field">
										<input type="text" name="name" ng-model="sub_update.name" class="form-control" placeholder="Subject Name.." required>
										<div ng-show="details.name.$touched">
											<span class="error-text" ng-show="details.name.$error.required">Subject Name is required.</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="input-field">
										<div class="input-group" style="width: 100%">
									      <div class="input-group-btn">
									        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Teacher <span class="caret"></span></button>
									        <ul class="dropdown-menu dropdown-menu-left">
									          <li ng-repeat="te in teacher"><a href="javascript:0" ng-click="setSubjectTeacher(te.empid,te.fname,te.lname)">{{te.fname}}&nbsp;{{te.lname}}</a></li>
									        </ul>
									      </div><!-- /btn-group-->
									      <input type="text" class="form-control" aria-label="course" placeholder="Teacher.." ng-model="sub_update.display_name" readonly required title={{subjectDetails.display_name}}  data-toggle="tooltip">
									    </div><!-- /input-group-->
								    </td>
								</tr>
								<tr>
									<td class="input-field">
										<input type="text" ng-model="sub_update.credit" name="credit" class="form-control" placeholder="Credits.." required>
										<div ng-show="details.credit.$touched">
											<span class="error-text" ng-show="details.credit.$error.required">Credits are required.</span>
										</div>
									</td>
								</tr>
							</table>
							<input type="submit" class="btn btn-success mdl-shadow--2dp" value="UPDATE">
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
								<th><center>Sub ID</center></th>
								<th><center>Name</center></th>
								<th><center>Course</center></th>
								<th><center>Credits</center></th>
								<th><center>Teacher</center></th>
							</thead>
							<tbody>
								<tr ng-repeat="s in subject">
									<td><center>{{s.id}}</center></td>
									<td><center>{{s.name}}</center></td>
									<td><center>{{s.course}} ({{s.sem}})</center></td>
									<td><center>{{s.credit}}</center></td>
									<td><center>{{s.teacher_name}}</center></td>
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
