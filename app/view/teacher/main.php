<style type="text/css">
	li .active{ border-radius: 20px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px }
	.subject-table{ margin-top: 5%; width: 80% }
	.student-grid{ margin-top: 5% }
	.upload-table{ margin-top: 2%; width: 50% }
	.form-control{ height: 22px; width: 60%; border-radius: 2px; padding: 1px; text-align: center; }
	td a.btn{ width: 30% }
</style>
  
   <!-- Selection Tabs -->
  <center style="padding:1.5% 0 0 2%; border-bottom: 1px solid #DEDEDE">

    <ul class="nav nav-pills no_print">
        <li ng-repeat="c in course"  ng-class=getPillClass($index)><a href="#{{c.course}}" data-toggle="tab">{{c.course}}</a></li>
    </ul>

  </center>
  <!-- Ending Selection TAbs -->

  <div class="tab-content">

    <div ng-repeat="c in course" ng-class=setTabPaneClass($index) id="{{c.course}}">
    	<center>
    			
			<table class="table table-hover subject-table" ng-show="displayTable">
    			<thead>
    				<th style="width: 5%"><center>S.no</center></th>
    				<th style="width: 15%"><center>Subject Code</center></th>
    				<th style="width: 45%"><center>Subject Name</center></th>
    				<th style="width: 15%"><center>Semester</center></th>
    				<th style="width: 25%"><center>Action</center></th>
    			</thead>
    			<tbody>
    				<tr ng-repeat = "s in c.subject">
    					<td><center>{{$index+1}}</center></td>
    					<td><center>{{s.sub_id}}</center></td>
    					<td><center>{{s.name}}</center></td>
    					<td><center>{{s.sem}}</center></td>
    					<td><center><a href="javascript:0" class="btn btn-xs btn-danger" ng-click="finalEditMarks(s.sub_id); initFun(s.sub_id)" ng-show="doEdit(s.marks_avail)" ng-hide="hideEdit(s.marks_avail, s.final)">Edit</a><a href="javascript:0" class="btn btn-xs btn-info" ng-click="uploadMarks(s.sub_id, s.sem, c.course)" ng-hide="doEdit(s.marks_avail)">Upload</a>&nbsp;<a href="javascript:0" ng-click="viewReport(s.sub_id, s.sem)" target="_blank" class="btn btn-xs btn-primary">View</a>&nbsp;<a href="#" class="btn btn-xs btn-warning">Graph</a></center></td>
    				</tr>
    			</tbody>
			</table>

			<div class="student-grid" ng-show="displayStudent">
				<center><a href="#" ng-click="backToSubs()"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back To Subjects</a></center>
				<form method="POST" ng-submit="addMarks()">
				<table class="table table-hover upload-table">
					<thead>
						<th style="width: 5%"><center>S.no</center></th>
	    				<th style="width: 15%"><center>Roll.No</center></th>
	    				<th style="width: 30%"><center>Student Name</center></th>
	    				<th style="width: 15%"><center>Internal(10)</center></th>
	    				<th style="width: 15%"><center>Internal(15)</center></th>
	    				<th style="width: 15%"><center>Total</center></th>
					</thead>
					<tbody>
						<tr ng-repeat="s in students">
							<td><center>{{$index+1}}</center></td>
	    					<td><center>{{s.id}}</center></td>
	    					<td><center>{{s.fname}} {{s.lname}}</center></td>
	    					<td>
	    						<center>
	    							<input type="number" ng-model=marks[$index].internal_10 class="form-control" min="0" max="10" ng-change="setTotal($index)">
								</center>
							</td>
	    					<td>
	    						<center>
	    							<input type="number" ng-model=marks[$index].internal_15 class="form-control" min="0" max="15" ng-change="setTotal($index)">
								</center>
							</td>
							<td>
	    						<center>
	    							<input type="number" ng-model=marks[$index].total class="form-control" readonly min="0" max="25">
								</center>
							</td>
						</tr>
					</tbody>
				</table>
				<input type="submit" class="btn btn-sm btn-success" value="Save & Upload">
				</form>
			</div>

			<div class="student-grid" ng-show="displayEdit">
				<center><a href="#" ng-click="backToSubs()"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back To Subjects</a></center>
				<form ng-submit="editFinal()">
				<table class="table table-hover upload-table">
					<thead>
						<th style="width: 5%"><center>S.no</center></th>
	    				<th style="width: 15%"><center>Roll.No</center></th>
	    				<th style="width: 30%"><center>Student Name</center></th>
	    				<th style="width: 15%"><center>Internal(15)</center></th>
	    				<th style="width: 15%"><center>Internal(10)</center></th>
	    				<th style="width: 15%"><center>Total</center></th>
					</thead>
					<tbody>
						<tr ng-repeat="m in marksEdit">
							<td><center>{{$index+1}}</center></td>
	    					<td><center>{{m.student_id}}</center></td>
	    					<td><center>{{m.fname}} {{m.lname}}</center></td>
	    					<td>
	    						<center>
	    							<input type="text" name="" class="form-control" ng-model="marksEdit[$index].internal_10" max="10" min="0" ng-change="setTotalEdit($index)">
								</center>
							</td>
	    					<td>
	    						<center>
	    							<input type="text" name="" class="form-control" ng-model="marksEdit[$index].internal_15" max="15" min="0" ng-change="setTotalEdit($index)">
								</center>
							</td>
							<td>
	    						<center>
	    							<input type="text" name="" class="form-control" ng-model="marksEdit[$index].total" max="25" min="0" readonly>
								</center>
							</td>
						</tr>
					</tbody>
				</table>
				<button type="submit" class="btn btn-sm btn-danger">Submit</button>
				</form>
			</div>

    	</center>
    </div>

  </div>