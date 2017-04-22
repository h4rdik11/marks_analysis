<?php
  session_start();
  if(!empty($_SESSION)){
    if(isset($_SESSION['type'])){
      echo $_SESSION['type'];
      if($_SESSION['type'] == 'student') header("Location:http://".$_SERVER['HTTP_HOST']."/marks_analysis/app/view/student/");
      if($_SESSION['type'] == 'teacher') header("Location:http://".$_SERVER['HTTP_HOST']."/marks_analysis/app/view/faculty/");
      if($_SESSION['type'] == 'admin') header("Location:http://".$_SERVER['HTTP_HOST']."/marks_analysis/app/view/admin/");
    }
  }else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design -->
    <link rel="stylesheet" href="../../css/material.min.css">
    <script src="../../js/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/3e23aa6e24.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Angular JS -->
    <script type="text/javascript" src="../../js/angular/angular.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">

      .main-block{ margin: 7% 0 0 0; padding: 0 0 0 0}
      .main-block .logo{ background: url("../../assets/logo.png") no-repeat center; background-size: 50%; padding: 15% 0 15% 0; background-color: white}
      .login-block{ padding: 10% 8% 15% 8%; background-color: #f7f7f7 }
      .login-form{ padding: 10% 10% 5% 10% }
      .nav-pills .nav a{ border-radius: 0px; }
      a{ color: #498af2 }
      input[type="text"], input[type="password"]{ border-radius: 0px }
      input.ng-touched.ng-invalid{ border-color: #d9534f; }
      input.ng-touched.ng-valid{ border-color: #5cb85c; }

    </style>
  </head>
  <body style="background-color: #B0BEC5; background-image: url('../../assets/background.png'); background-size: 30%; ">

    <div class="container" ng-app="MainApp" ng-controller="MainCtrl">
      
      <div class="row">
        <div class="col-xs-4"></div>

        
        <div class="col-md-4 mdl-shadow--6dp main-block">
          <div class="logo"></div>
          <div class="login-block">
            
            <center style="padding:1.5% 0 0 0%; width: 100%">

              <ul class="nav nav-pills nav-justified" style="background-color: #EEEEEE">
                  <li class="nav active"><a href="#admin-login" data-toggle="tab">Admin</a></li>
                  <li class="nav"><a href="#teacher-login" data-toggle="tab">Teacher</a></li>
                  <li class="nav"><a href="#student-login" data-toggle="tab">Student</a></li>
              </ul>

            </center>

            <div class="tab-content">

              <div class="tab-pane fade in active" id="admin-login">
                <form id="admin_form" ng-submit="login('admin')">
                  <div class="login-form">
                    <div class="form-group">
                      <input type="text" class="form-control id" ng-model="admin_id" placeholder="User Id / Email-Id / Phone">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control password" ng-model="admin_password" placeholder="Password..">
                    </div>
                  <center><button type="submit" class="btn btn-danger mdl-shadow--2dp" style="width: 100%; border-radius: 3px""><b>LOGIN</b></button></center>
                  </div>
                </form>
                <center><a href="javascript:0">Trouble logging in ?</a></center>
              </div>

              <div class="tab-pane fade in" id="teacher-login">
                <form id="teacher_login" ng-submit="login('teacher')">
                  <div class="login-form">
                    <div class="form-group">
                      <input type="text" class="form-control id" ng-model="teacher_id" placeholder="Employee-Id / Email-Id / Phone">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control password" ng-model="teacher_password" placeholder="Password..">
                    </div>
                  <center><button type="submit" class="btn btn-info mdl-shadow--2dp" style="width: 100%; border-radius: 3px""><b>LOGIN</b></button></center>
                  </div>
                </form>
                <center><a href="javascript:0">Trouble logging in ?</a></center>
              </div>

              <div class="tab-pane fade in" id="student-login">
                <form id="student_login" ng-submit="login('student')">
                  <div class="login-form">
                    <div class="form-group">
                      <input type="text" class="form-control id" ng-model="student_id" placeholder="User-Id / Email-Id / Phone">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control password" ng-model="student_password" placeholder="Password..">
                    </div>
                  <center><button type="submit" class="btn btn-success mdl-shadow--2dp" style="width: 100%; border-radius: 3px"><b>LOGIN</b></button></center>
                  </div>
                </form>
                <center><a href="javascript:0">Trouble logging in ?</a></center>
              </div>

            </div>
          </div>
        </div>
        
        <div class="col-md-4"></div>
      </div>

    </div>
    <script type="text/javascript">
      var app = angular.module('MainApp',[]);
      app.controller('MainCtrl', function($scope, $http, $location, $window){
        $scope.login = function(type){

          var backend = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/backend/';
          var frontend = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/view/';
          if(type == "teacher"){
            $http.post(backend+"login.php",{
              'type'        : type,
              'id'          : $scope.teacher_id,
              'password'    : $scope.teacher_password
            }).then(function(response){
                if(response.data == "success"){
                  window.location.href = frontend+"teacher/";
                }else if(response.data == "uid_error"){
                  if($("#teacher_login .password").hasClass('ng-invalid')){
                    $("#teacher_login .password").removeClass('ng-invalid');
                    $("#teacher_login .password").removeClass('ng-valid');
                  }
                  $("#teacher_login .id").removeClass('ng-valid');
                  $("#teacher_login .id").addClass('ng-invalid');
                }else{
                  if($("#teacher_login .id").hasClass('ng-invalid')){
                    $("#teacher_login .id").removeClass('ng-invalid');
                    $("#teacher_login .id").addClass('ng-valid');
                  }
                  $("#teacher_login .password").removeClass('ng-valid');
                  $("#teacher_login .password").addClass('ng-invalid');
                }
            });
          }else if(type == "admin"){
            $http.post(backend+"login.php",{
              'type'        : type,
              'id'          : $scope.admin_id,
              'password'    : $scope.admin_password
            }).then(function(response){
                if(response.data == "success"){
                  window.location.href = frontend+"admin/";
                }else if(response.data == "uid_error"){
                  $("#admin_login .id").removeClass('ng-valid');
                  $("#admin_login .id").addClass('ng-invalid');
                }else{
                  if($("#admin_login .id").hasClass('ng-invalid')){
                    $("#admin_login .id").removeClass('ng-invalid');
                    $("#admin_login .id").addClass('ng-valid');
                  }
                  $("#admin_login .password").removeClass('ng-valid');
                  $("#admin_login .password").addClass('ng-invalid');
                }
            });
          }else if(type == "student"){
            $http.post(backend+"login.php",{
              'type'        : type,
              'id'          : $scope.student_id,
              'password'    : $scope.student_password
            }).then(function(response){
                if(response.data == "success"){
                  window.location.href = frontend+"student/";
                }else if(response.data == "uid_error"){
                  $("#student_login .id").removeClass('ng-valid');
                  $("#student_login .id").addClass('ng-invalid');
                }else{
                  if($("#student_login .id").hasClass('ng-invalid')){
                    $("#student_login .id").removeClass('ng-invalid');
                    $("#student_login .id").addClass('ng-valid');
                  }
                  $("#student_login .password").removeClass('ng-valid');
                  $("#student_login .password").addClass('ng-invalid');
                }
            });
          }
        };
      });
    </script>
  </body>
</html>
<?php
  }
?>