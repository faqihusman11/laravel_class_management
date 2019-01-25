<?php

/* Pages Routes */
Route::get('/', 'PageController@index');
Route::get('/login', 'PageController@login')->middleware(["guest"])->name("login");

/* Authentications Routes */
route::post('/loginUser', 'AuthenticationController@loginUser')->middleware(["guest"]);
route::get('/logout', 'AuthenticationController@logout');

/* CRUD Classrooms and Download PDF Routes */
Route::get('/listClassrooms', 'ClassroomController@listClassrooms')->middleware(["auth"]);
Route::get('/createClassroom', 'ClassroomController@createClassroom')->middleware(["auth"]);
Route::post('/addClassroom', 'ClassroomController@addClassroom')->middleware(["auth"]);
Route::get('/editClassroom/{id}', 'ClassroomController@editClassroom')->middleware(["auth"]);
Route::post('/updateClassroom', 'ClassroomController@updateClassroom')->middleware(["auth"]);
Route::post('/deleteClassroom', 'ClassroomController@deleteClassroom')->middleware(["auth"]);
route::get('/downloadPDF', 'ClassroomController@downloadPDF')->middleware(['auth']);

/* CRUD Teachers Routes */
Route::get('/listTeachers', 'TeacherController@listTeachers')->middleware(["auth"]);
Route::get('/createTeacher', 'TeacherController@createTeacher')->middleware(["auth"]);
Route::post('/addTeacher', 'TeacherController@addTeacher')->middleware(["auth"]);
Route::get('/editTeacher/{id}', 'TeacherController@editTeacher')->middleware(["auth"]);
Route::post('/updateTeacher', 'TeacherController@updateTeacher')->middleware(["auth"]);
Route::post('/deleteTeacher', 'TeacherController@deleteTeacher')->middleware(["auth"]);

/* CRUD Students Routes */
Route::get('/listStudents', 'StudentController@listStudents')->middleware(["auth"]);
Route::get('/createStudent', 'StudentController@createStudent')->middleware(["auth"]);
Route::post('/addStudent', 'StudentController@addStudent')->middleware(["auth"]);
Route::get('/editStudent/{id}', 'StudentController@editStudent')->middleware(["auth"]);
Route::post('/updateStudent', 'StudentController@updateStudent')->middleware(["auth"]);
Route::post('/deleteStudent', 'StudentController@deleteStudent')->middleware(["auth"]);

