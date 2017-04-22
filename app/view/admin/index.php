<?php
  session_start();
  if(isset($_SESSION['emp_id'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Dashboard</title>

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .dropdown .dropdown-toggle{ padding: 10% 20%; font-size: 20px ;border-radius: 20px; background-color: #26A69A; color: #263238; }
      .user-name{ padding: 5% 5% 5% 5%; color: #263238; font-size: 15px; font-weight: 600; text-align: center }
      .mdl-layout{ background: url("../../../assets/background.png") center; background-size: 30%}
    </style>
  </head>
  <body ng-app="AdminApp" ng-controller="AdminCtrl"  ng-init = initFun()>
    
    <!-- Teacher Details Modals -->
    <div class="modal fade" ng-repeat="t in teacher" id="modal{{t.sno}}" role="dialog" aria-labelledby="myModal{{t.sno}}">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{t.fname}}&nbsp;{{t.lname}}</h4>
          </div>
          <div class="modal-body">
            <table>
              <tr class="input-field">
                <td><strong>Employee ID </strong></td>
                <td>{{t.empid}}</td>
              </tr>
              <tr class="input-field">
                <td><strong>Designation </strong></td>
                <td>{{t.desig}}</td>
              </tr>
              <tr class="input-field">
                <td><strong>Department </strong></td>
                <td>{{t.dept}}</td>
              </tr>
              <tr class="input-field">
                <td><strong>Phone </strong></td>
                <td>{{t.contact}}</td>
              </tr>
              <tr class="input-field">
                <td><strong>E-Mail </strong></td>
                <td>{{t.email}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Student Details Modals -->
    <div class="modal fade modal2" ng-repeat="s in student" id="studentModal{{s.sno}}" role="dialog" aria-labelledby="myModal2{{s.sno}}">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{s.fname}}&nbsp;{{s.lname}}<br><small>{{s.gender}}</small></h4>
          </div>
          <div class="modal-body">
            <table>
              <tr class="input-field">
                <td><strong>Roll No </strong></td>
                <td>{{s.roll}}</td>
              </tr>
              <tr class="input-field">
                <td><strong>Course (Sem) </strong></td>
                <td>{{s.course}}({{s.sem}})</td>
              </tr>
              <tr class="input-field">
                <td><strong>Batch </strong></td>
                <td>{{s.batch}}</td>
              </tr>
              <tr class="input-field">
                <td><strong>Phone </strong></td>
                <td>{{s.contact}}</td>
              </tr>
              <tr class="input-field">
                <td><strong>E-Mail </strong></td>
                <td>{{s.email}}</td>
              </tr>
              <tr class="input-field">
                <td><strong>Address </strong></td>
                <td>{{s.address}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--blue-grey-200">
      <header class="mdl-layout__header mdl-color--blue-grey-900">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Admin Dashboard&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;<span style="color: #26A69A">{{title}}</span></span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" ng-click="setTitle('Manage Teacher')" ui-sref="/teacher" >Manage Teacher</a>
            <a class="mdl-navigation__link" ui-sref="/student" ng-click="setTitle('Manage Student')">Manage Student</a>
            <a class="mdl-navigation__link" ui-sref="/subject" ng-click="setTitle('Manage Subject')">Manage Subject</a>
            <a class="mdl-navigation__link" ui-sref="/course" ng-click="setTitle('Manage Course')">Manage Course</a>
            <a class="mdl-navigation__link">
              <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i></a>
              <ul class="dropdown-menu pull-right" style="margin-top: 50%">
                <li class="user-name"><span><?php echo $_SESSION['name']; ?><br><small>(Admin)</small></span></li>
                <li role="separator" class="divider"></li>
                <li><a ui-sref="/update-profile" ng-click="setTitle('Update Profile')"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Update Profile</a></li>
                <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/backend/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
              </ul>
            </div></a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title mdl-color--blue-grey-900">Admin Dashboard</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" ui-sref="/teacher">Add Teacher</a>
          <a class="mdl-navigation__link" ui-sref="/student">Add Student</a>
          <a class="mdl-navigation__link" ui-sref="/subject">Manage Subject</a>
          <a class="mdl-navigation__link" ui-sref="/course">Manage Course</a>
          <hr>
          <a class="mdl-navigation__link" ui-sref="/update" ng-click="setTitle('Update Profile')">Update Profile</a>
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
      var app = angular.module('AdminApp',['ui.router'])
      .config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider){
          $urlRouterProvider.otherwise('/');
          $stateProvider
          .state('/',{
            url: '/',
            templateUrl: 'teacher.php'
          })
          .state('/teacher',{
              url: '/teacher',
              templateUrl: 'teacher.php',
              controller: function($scope){
                $scope.title = "Manage Teacher";
              }
          })
          .state('/student',{
            url: '/student',
            templateUrl: 'student.php'
          })
          .state('/subject',{
            url: '/subject',
            templateUrl: 'manage_subject.php'
          })
          .state('/update-profile',{
            url : '/update-profile',
            templateUrl : 'update_profile.php'
          })
          .state('/course',{
            url : '/course',
            templateUrl : 'manage_course.php'
          })
      }]);
      
      app.controller('AdminCtrl', function($scope, $http, $location, $sce, $filter){

          $scope.title = "Manage Teacher";
          if($location.absUrl() == "http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/view/admin/#!/") $scope.title = "Manage Teacher"
          if($location.absUrl() == "http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/view/admin/#!/student") $scope.title = "Manage Student"
          if($location.absUrl() == "http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/view/admin/#!/subject") $scope.title = "Manage Subject"
          if($location.absUrl() == "http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/view/admin/#!/course") $scope.title = "Manage Course"
          $scope.setTitle = function(title){
            $scope.title = title
          }
          var view = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/view/';
          var backend = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/marks_analysis/app/backend/';
          $scope.callSnack = function(msg){
            var snackbarContainer = document.querySelector('#demo-toast-example');
            var data = {message: msg};
            snackbarContainer.MaterialSnackbar.showSnackbar(data);
          };

          $scope.teacher = [];
          $scope.student = [];
          $scope.course = [];
          $scope.subject = [];
          $scope.profileUpdate = [];
          $scope.initFun = function(){
            $http.get(backend+'admin/get_teacher.php').then(function(response){
              $scope.teacher = response.data;
            });

            $http.get(backend+'admin/get_student.php').then(function(response){
              $scope.student = response.data;
            });

            $http.get(backend+'admin/get_course.php').then(function(response){
              $scope.course = response.data;
            });

            $http.get(backend+'admin/get_subject.php').then(function(response){
              $scope.subject = response.data
            }); 
            $http.get(backend+"admin/get_profile.php").then(function(response){
              $scope.profileUpdate = response.data
            });
          };



          /*teacher controller start*/

            $scope.edit = false;
            $scope.add = true;
            $scope.teacherDetails = {};
            $scope.formReset = function(){
              $scope.edit = false;
              $scope.add = true;
              $scope.teacherDetails.fname = "";
              $scope.teacherDetails.lname = "";
              $scope.teacherDetails.eid = "";
              $scope.teacherDetails.desig = "";
              $scope.teacherDetails.dept = "";
              $scope.teacherDetails.contact = "";
              $scope.teacherDetails.email = "";
              $scope.initFun()
            };
            $scope.editTeacher = function(index){
              $scope.teacherDetails.fname = $scope.teacher[index].fname;
              $scope.teacherDetails.lname = $scope.teacher[index].lname;
              $scope.teacherDetails.eid = $scope.teacher[index].empid;
              $scope.teacherDetails.desig = $scope.teacher[index].desig;
              $scope.teacherDetails.dept = $scope.teacher[index].dept;
              $scope.teacherDetails.contact = $scope.teacher[index].contact;
              $scope.teacherDetails.email = $scope.teacher[index].email;
              $scope.edit = true;
              $scope.add = false;
            };

            $scope.noerror = true;
            $scope.addTeacher = function(){
              if($scope.add){
                $http.post(backend+'admin/add_teacher.php', $scope.teacherDetails).then(function(response){
                  if(response.data == "Teacher successfully added !!"){
                    $scope.callSnack(response.data);
                    $scope.initFun()
                    $scope.teacherDetails = [];
                    document.getElementById("myForm").reset();
                    $(".form-control").removeClass("ng-dirty");
                    $(".form-control").css("background-color","white");
                    $scope.details.fname.$dirty = false;
                    $scope.noerror = true;
                  }else $scope.callSnack(response.data);
                });
              }
              if($scope.edit){
                $http.post(backend+'admin/update_teacher.php',$scope.teacherDetails).then(function(response){
                  $scope.callSnack(response.data);
                  $scope.initFun()
                  $scope.edit = false;
                  $scope.add = true;
                  $scope.teacherDetails.fname = "";
                  $scope.teacherDetails.lname = "";
                  $scope.teacherDetails.eid = "";
                  $scope.teacherDetails.desig = "";
                  $scope.teacherDetails.dept = "";
                  $scope.teacherDetails.contact = "";
                  $scope.teacherDetails.email = "";
                });
              }
            };
            $scope.deleteTeacher = function(id){
              $http.post(backend+'admin/delete_teacher.php',{
                'id' : id
              }).then(function(response){
                $scope.callSnack(response.data)
                $scope.initFun()
              });
            };

          /*teacher controller end*/

          /*Student controller Start*/
            $scope.studentEdit = false;
            $scope.studentAdd = true;
            $scope.studentDetails = {};
            $scope.studentFormReset = function(){
              $scope.studentDetails.fname = "";
              $scope.studentDetails.lname = "";
              $scope.studentDetails.roll = "";
              $scope.studentDetails.sem = "";
              $scope.studentDetails.course = "";
              $scope.studentDetails.batch = "";
              $scope.studentDetails.contact = "";
              $scope.studentDetails.gender = "";
              $scope.studentDetails.address = "";
              $scope.studentDetails.email = "";
              $scope.studentEdit = false;
              $scope.studentAdd = true;
              $scope.initFun()
            };
            $scope.editStudent = function(index){
              $scope.studentDetails.fname = $scope.student[index].fname;
              $scope.studentDetails.lname = $scope.student[index].lname;
              $scope.studentDetails.roll = $scope.student[index].roll;
              $scope.studentDetails.sem = $scope.student[index].sem;
              $scope.studentDetails.course = $scope.student[index].course;
              $scope.studentDetails.batch = $scope.student[index].batch;
              $scope.studentDetails.contact = $scope.student[index].contact;
              $scope.studentDetails.gender = $scope.student[index].gender;
              $scope.studentDetails.address = $scope.student[index].address;
              $scope.studentDetails.email = $scope.student[index].email;

              $scope.studentEdit = true;
              $scope.studentAdd = false;
            };
            $scope.batch = [];
            $scope.setStudentVals = function(field, val){
              if(field === "sem"){
                $scope.studentDetails.sem = val;
              }            
              if(field == "course"){
                $scope.studentDetails.course = val;
              }
              if(field == "btch"){
                $scope.studentDetails.batch = val;
              }
              if($scope.studentDetails.course == "MCA"){
                $scope.batch = [];
                for(var i = 0; i<100; i++){
                  var start = 2015+i;
                  var end = 2015+(i+3);
                  var year = start+"-"+end;
                  $scope.batch.push({
                    "start" : year
                  });
                }
              }else{
                $scope.batch = [];
                for(var i = 0; i<100; i++){
                  var start = 2015+i;
                  var end = 2015+i+2;
                  var year = start+"-"+end;
                  $scope.batch.push({
                    "start" : year
                  });
                }
              }
            };

            $scope.deleteStudent = function(roll){
              $http.post(backend+'admin/delete_student.php',{
                'roll' : roll
              }).then(function(response){
                $scope.callSnack(response.data)
                $scope.initFun()
              });
            };

            $scope.addStudent = function(){
              if($scope.studentAdd){
                $http.post(backend+'admin/add_student.php', $scope.studentDetails).then(function(response){
                  $scope.callSnack(response.data)
                  $scope.initFun()
                });
              }
              if($scope.studentEdit){
                $http.post(backend+'admin/update_student.php', $scope.studentDetails).then(function(response){
                  $scope.callSnack(response.data)
                  $scope.initFun()
                  $scope.studentDetails.fname = "";
                  $scope.studentDetails.lname = "";
                  $scope.studentDetails.roll = "";
                  $scope.studentDetails.sem = "";
                  $scope.studentDetails.course = "";
                  $scope.studentDetails.batch = "";
                  $scope.studentDetails.contact = "";
                  $scope.studentDetails.gender = "";
                  $scope.studentDetails.address = "";
                  $scope.studentDetails.email = "";

                  $scope.studentEdit = false;
                  $scope.studentAdd = true;
                });
              }
            };


          /*Student controller end*/

          /* Subject Controller Start */

            $scope.new_sub = [];
            $scope.getSub = function(){
                $http.post(backend+"admin/get_subject_filter.php",{
                  'course' : $scope.sub_update.course,
                  'sem'    : $scope.sub_update.sem
                }).then(function(response){
                  $scope.new_sub = response.data
                });
            }

            $scope.subjectDetails = [];
            $scope.setSubjectVals = function(field, val){
              if(field === "sem"){
                $scope.subjectDetails.sem = val;
              }            
              if(field == "course"){
                $scope.subjectDetails.course = val;
              }
            };


            $scope.addSubject = function(){
              $http.post(backend+'admin/add_subject.php',{
                'code'   : $scope.subjectDetails.code,
                'name'   : $scope.subjectDetails.name,
                'sem'    : $scope.subjectDetails.sem,
                'course' : $scope.subjectDetails.course,
                'credit' : $scope.subjectDetails.credit 
              }).then(function(response){
                $scope.callSnack(response.data)
                $scope.initFun()
              });
            };

            $scope.sub_update = [];
            $scope.setSubjectTeacher = function(id, fname, lname){
              $scope.sub_update.teacher = id;
              $scope.sub_update.display_name = fname+" "+lname;
            };
            $scope.setUpdateSub = function(index){
              $scope.sub_update.code = $scope.new_sub[index].id;
              $scope.sub_update.name = $scope.new_sub[index].name;
              $scope.sub_update.sem = $scope.new_sub[index].sem;
              $scope.sub_update.course = $scope.new_sub[index].course;
              $scope.sub_update.teacher = $scope.new_sub[index].teacher;
              $scope.sub_update.display_name = $scope.new_sub[index].teacher_name;
              $scope.sub_update.credit = $scope.new_sub[index].credit;
            };
            $scope.setUpdate = function(field, val){
              if(field === "sem"){
                $scope.sub_update.sem = val;
              }            
              if(field == "course"){
                $scope.sub_update.course = val;
              }
            };

            $scope.updateSubject = function(){
              $http.post(backend+'admin/update_subject.php',{
                'code'   : $scope.sub_update.code,
                'name'   : $scope.sub_update.name,
                'sem'    : $scope.sub_update.sem,
                'course' : $scope.sub_update.course,
                'teacher': $scope.sub_update.teacher,
                'credit' : $scope.sub_update.credit 
              }).then(function(response){
                $scope.callSnack(response.data)
                $scope.initFun()
              });
            };

            $scope.deleteSubject = function(id){
              $http.post(backend+'admin/delete_subject.php',{
                'id' : id
              }).then(function(response){
                $scope.callSnack(response.data)
                $scope.initFun()
              });
            };

          /* Subject Controller End */

          /* Course Controller Start */
            
            $scope.courseDetails = [];
            $scope.addCourse = function(){
              $http.post(backend+'admin/add_course.php',{
                'code'      : $scope.courseDetails.code,
                'name'      : $scope.courseDetails.name,
                'duration'  : $scope.courseDetails.dur
              }).then(function(response){
                $scope.callSnack(response.data)
                $scope.initFun()
              });
            };

            $scope.course_update = [];
            $scope.setUpdateCourse = function(index){
              $scope.course_update.name = $scope.course[index].code;
              $scope.course_update.name_update = $scope.course[index].name;
              $scope.course_update.duration = $scope.course[index].duration;
            };
            $scope.updateCourse = function(){
              $http.post(backend+'admin/update_course.php',{
                'code'      : $scope.course_update.name,
                'name'      : $scope.course_update.name_update,
                'duration'  : $scope.course_update.duration 
              }).then(function(response){
                $scope.callSnack(response.data)
                $scope.initFun()
              });
            };

            $scope.deleteCourse = function(id){
              $http.post(backend+'admin/delete_course.php',{
                'code' : id
              }).then(function(response){
                $scope.callSnack(response.data)
                $scope.initFun()
              });
            };

          /* Course Controller Start */

          /* Profile Update Controller Start */

          $scope.confirmPass = function(){
            if($scope.profileUpdate.confirm_pass.length == 0) $scope.confirmError = false;
            if($scope.profileUpdate.confirm_pass != $scope.profileUpdate.new_pass) $scope.confirmError = true;
            else $scope.confirmError = false;
          };

          $scope.updateProfile = function(){
            $http.post(backend+"admin/update_profile.php", $scope.profileUpdate).then(function(response){
              $scope.callSnack(response.data)
              $scope.init()
            });
          }

          /* Profile Update Controller End */
      });
    </script>
    
  </body>
</html>
<?php 
}else header("Location: http://".$_SERVER['HTTP_HOST']."/marks_analysis/app/view");
?>