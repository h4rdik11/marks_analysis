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
	
		<center>
			<div class="form-table mdl-shadow--4dp" style="background-color: #006B99">
				<form method="POST" name="details" ng-submit="updateProfile()()" id="myForm">
					<table>
						<tr>
							<td class="input-field">
								<div class="row">
									<div class="col-md-6"><input type="text" ng-model="profileUpdate.fname" name="fname" class="form-control" placeholder="First Name.." id="fname"></div>
									<div class="col-md-6"><input type="text" ng-model="profileUpdate.lname" class="form-control" placeholder="Last Name.." id="lname"></div>
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
										<input type="radio" name="gender" ng-model="profileUpdate.gender" value="male" > : Male
									</div>
									<div class="col-md-4">
										<input type="radio" name="gender" ng-model="profileUpdate.gender" value="female" > : Female
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="text" ng-model="profileUpdate.contact" name="desig" class="form-control" placeholder="Contact" maxlength="10">
							</td>	
						</tr>
						<tr>
							<td class="input-field">
								<input type="email" ng-model="profileUpdate.email" name="email" class="form-control" placeholder="E-Mail..">
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<textarea ng-model="profileUpdate.address" name="address" class="form-control" placeholder="Address.."></textarea>
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="password" ng-model="profileUpdate.new_pass" name="dept" class="form-control" placeholder="New Password" ng-blur="confirmPass()">
							</td>
						</tr>
						<tr>
							<td class="input-field">
								<input type="password" ng-model="profileUpdate.confirm_pass" name="contact" class="form-control" placeholder="Confirm Password" ng-blur="confirmPass()">
								<div ng-show="confirmError">
									<span class="error-text">Passwords don't match.</span>
								</div>
							</td>
						</tr>
					</table>
					<input type="submit" class="btn btn-success mdl-shadow--2dp" value="UPDATE">
				</form>
			</div>
		</center>

</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
