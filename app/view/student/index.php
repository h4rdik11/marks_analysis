<?php
  session_start();
  if(isset($_SESSION['stu_id'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Dashboard</title>

    <!-- Bootstrap -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design -->
    <link rel="stylesheet" href="../../../css/material.min.css">
    <script src="../../../js/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/3e23aa6e24.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../js/bootstrap.min.js"></script>

    <!-- Angular JS -->
    <script type="text/javascript" src="../../../js/angular/angular.min.js"></script>
    <script type="text/javascript" src="../../../js/roundProgress.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .dropdown .dropdown-toggle{ padding: 10% 20%; font-size: 20px ;border-radius: 20px; background-color: #26A69A; color: #263238; }
      .user-name{ padding: 5% 5% 5% 5%; color: #263238; font-size: 15px; font-weight: 600; text-align: center }
      .modal-table .input-field input[type="password"]{ width: 350px; padding: 4%; margin-bottom: 1% }
      .error-msg{ color: #d9534f; }
      .mdl-layout{ background: url("../../../assets/background.png") center; background-size: 30%}
    </style>
  </head>
  <body ng-app="StudentApp" ng-controller="StudentCtrl" ng-init="initFun()">
    <!-- Teacher Details Modals -->
    <div class="modal fade" id="modal" role="dialog" aria-labelledby="myModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            <h6 class="modal-title">Do you want to change your password ?</h6>
          </div>
          <div class="modal-body">
            <center>
            <form ng-submit="changePass()">
            <table class="modal-table">
              <tr>
                <td class="input-field">
                  <input type="password" class="form-control" ng-model="new_pass" placeholder="New Password" required>
                </td>
              </tr>
              <tr>
                <td class="input-field">
                  <input type="password" class="form-control" ng-model="confirm_pass" placeholder="Confirm password" required>
                </td>
              </tr>
            </table>
            <span class="error-msg">{{error_msg}}</span>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-2"></div>
              <div class="col-md-4"><button type="submit" class="btn btn-sm btn-success mdl-shadow--2dp">Change Password</button></div>
              <div class="col-md-4"><a href="" class="btn btn-link" aria-label="Close" data-dismiss="modal">Continue anyway.</a></div>
              <div class="col-md-2"></div>
            </div>
            </form>
            </center>
          </div>
        </div>
      </div>
    </div>

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header  mdl-color--blue-grey-200">
      <header class="mdl-layout__header mdl-color--blue-grey-900">
      
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Student Dashboard</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" ui-sref="/course" ng-click="setTitle('Manage Course')">
              <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i></a>
                <ul class="dropdown-menu pull-right" style="margin-top: 50%">
                  <li class="user-name"><span><?php echo $_SESSION['name']; ?><br><small>( <?php echo $_SESSION['stu_id']; ?> )</small></span></li>
                  <li role="separator" class="divider"></li>
                  <li><a ui-sref="/update-profile"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Update Profile</a></li>
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/backend/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
                </ul>
              </div>
            </a>  
          </nav>
        </div>
      
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title mdl-color--blue-grey-900">Teacher Dashboard</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" ui-sref="/update-profile">Update Profile</a>
          <a class="mdl-navigation__link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/backend/logout.php">Logout</a>
        </nav>
      </div>
      <main class="mdl-layout__content container mdl-shadow--6dp mdl-color--grey-100">
        <div class="page-content">

            <div ui-view></div>
            <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
              <div class="mdl-snackbar__text"></div>
              <button class="mdl-snackbar__action" type="button"></button>
            </div>
        </div>
      </main>
    </div>

    <script type="text/javascript" src="../../../js/ui-router.min.js"></script>
    <script type="text/javascript">
      var app = angular.module('StudentApp',['ui.router'])
      .config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider){
          $urlRouterProvider.otherwise('/');
          $stateProvider
          .state('/',{
              url: '/',
              templateUrl: 'main.php'
          })
          .state('/update-profile',{
            url : '/update-profile',
            templateUrl : 'update_profile.php'
          })
      }]);
      
      app.controller('StudentCtrl', function($scope, $http, $location, $sce, $filter){
          
          $scope.changePass = function(){
            if($scope.confirm_pass != $scope.new_pass) $scope.error_msg = "Passwords Don't Match."
            else{
              $http.post(backend+"student/change_pass.php",{
                'pass' : $scope.new_pass
              }).then(function(response){
                $('#modal').modal('hide');
                $scope.callSnack(response.data);
              });
            }
          };

          $scope.callSnack = function(msg){
            var snackbarContainer = document.querySelector('#demo-toast-example');
            var data = {message: msg};
            snackbarContainer.MaterialSnackbar.showSnackbar(data);
          };
          
          $scope.profileUpdate = [];
          $scope.initFun = function(){
            $http.get(backend+"student/get_profile.php").then(function(response){
              $scope.profileUpdate = response.data
            });
            $http.get(backend+"student/first_login.php").then(function(response){
              if(response.data == 1){
                $('#modal').modal('show');
              }
            });
          };

          var backend = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/backend/';
          // $scope.marks = [];
          $scope.getMarks = function(sem){
            $scope.sem = sem;
            $http.post(backend+"student/get_marks.php",{
              'sem' : $scope.sem
            }).then(function(response){
              $scope.marks = response.data;
            });
          }

          $scope.confirmPass = function(){
            if($scope.profileUpdate.confirm_pass.length == 0) $scope.confirmError = false;
            if($scope.profileUpdate.confirm_pass != $scope.profileUpdate.new_pass) $scope.confirmError = true;
            else $scope.confirmError = false;
          };

          $scope.updateProfile = function(){
            $http.post(backend+"student/update_profile.php", $scope.profileUpdate).then(function(response){
              $scope.callSnack(response.data)
              $scope.init()
            });
          }

      });
    </script>

    
  </body>
</html>
<?php 
}else header("Location: http://".$_SERVER['HTTP_HOST']."/marks_analysis/app/view");
?>