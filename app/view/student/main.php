<style type="text/css">
	li .active{ border-radius: 20px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px }
	.subject-table{ margin-top: 5%; width: 80% }
	.student-grid{ margin-top: 5% }
	.upload-table{ margin-top: 2%; width: 50% }
	td a.btn{ width: 30% }
	.display-table{ margin-top: 5% }
	.fresh-message{ font-weight: 600; text-transform: uppercase; }
</style>
  
<!-- Selection Tabs -->
<center style="padding:2% 0 1% 0; border-bottom: 1px solid #DEDEDE">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="input-group">
	      <div class="input-group-btn">
	        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sem <span class="caret"></span></button>
	        <ul class="dropdown-menu">
	          <li><a href="javascript:0" ng-click="getMarks(1)">1</a></li>
	          <li><a href="javascript:0" ng-click="getMarks(2)">2</a></li>
	          <li><a href="javascript:0" ng-click="getMarks(3)">3</a></li>
	          <li><a href="javascript:0" ng-click="getMarks(4)">4</a></li>
	          <li><a href="javascript:0" ng-click="getMarks(5)">5</a></li>
	          <li><a href="javascript:0" ng-click="getMarks(6)">6</a></li>
	        </ul>
	      </div><!-- /btn-group -->
	      <input type="text" class="form-control" aria-label="sem" placeholder="Select Semester" ng-model="sem" ng-change="getMarks()" readonly required title={{sem}}  data-toggle="tooltip">
	    </div><!-- /input-group -->
		</div>
		<div class="col-md-4"></div>
	</div>
</center>
<!-- Ending Selection TAbs -->
<center class="fresh-message"><h1 ng-hide="marks">Select Semester</h1></center>
<div class="display-table row" ng-show="marks">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<th><center>Code</center></th>
				<th><center>Subject Name</center></th>
				<th><center>Internal (10)</center></th>
				<th><center>Internal (15)</center></th>
				<th><center>Total (25)</center></th>
			</thead>
			<tbody>
				<tr ng-repeat="m in marks">
					<td><center>{{m.sub_id}}</center></td>
					<td><center>{{m.sub_name}}</center></td>
					<td><center>{{m.internal_10}}</center></td>
					<td><center>{{m.internal_15}}</center></td>
					<td><center>{{m.total}}</center></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>



