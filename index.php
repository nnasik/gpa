<?php 
    function result_dropdown($semester,$subject){
        $i=0;
        $grades = [["A+","4.00"],["A","4.00"],["A-","3.70"],["B+","3.30"],["B","3.00"],["B-","2.70"],["C+","2.30"],["C","2.00"],["C-","1.70"],["D+","1.30"],["D","1.00"],["E","0.00"]];
        echo "<select class='form-control col-lg-2 mr-2 float-left' id='sem-".$semester."-sub-".$subject."-grade' onchange='calculatePoints(".$semester.",".$subject.")'>";
        foreach ($grades as list($grade, $alias)){
            if ($i==0) {
                echo "<option value='0.00'></option>";
            }
            echo "<option value='".$alias."'>";
            echo $grade;
            echo "</option>";
            $i++;
        }
        echo "</select>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <title>GPA Calculator</title>
</head>
<body>
    <div class="wrappper col-lg-12 row m-0 p-0">
        <div class="col-lg-12 bg-light text-center p-0 pt-2 pb-2 text-dark navbar-fixed-top" id="heading">
            <h3 class="h3">GPA Calculator</h3>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 mt-3 pt-3 bg-light" id="semesters">
            <div id="output" class="mt-3">
                <b>Overall GPA : 0.00</b>
            </div>
            
            <div class="form-group mt-5">
                <button id="add-semester"class="btn btn-success col-lg4" onclick="addSemester()">Add Semester</button>
                <button id="add-semester"class="btn btn-danger col-lg-4" onclick="removeSemester()">Remove Semester</button>
                <button id="add-semester"class="btn btn-primary col-lg-2 pl-0 pr-0" onclick="refresh()">Calculate</button>
                <button id="add-semester"class="btn btn-warning col-lg-2" onclick="reset()">Reset</button>
            </div>

            <div class="form-group" id='semester-1'>
                <label for="" class="col-lg-4 p-0 pt-1 float-left">Semester 1 GPA</label>
                <input type="number" class="form-control col-lg-3" id="semester-1-GPA">
            </div>
            <div class="form-group" id='semester-2'>
                <label for="" class="col-lg-4 p-0 pt-1 float-left">Semester 2 GPA</label>
                <input type="number" class="form-control col-lg-3 " id="semester-2-GPA">
            </div>
            <div class="form-group" id='semester-3'>
                <label for="" class="col-lg-4 p-0 pt-1 float-left">Semester 3 GPA</label>
                <input type="number" class="form-control col-lg-3 " id="semester-3-GPA">
            </div>
            <div class="form-group" id='semester-4'>
                <label for="" class="col-lg-4 p-0 pt-1 float-left">Semester 4 GPA</label>
                <input type="number" class="form-control col-lg-3 " id="semester-4-GPA">
            </div>
            
        </div>
        <div class="col-lg-6 mt-3 pt-3 ml-2 bg-light" id="semesters-subjects">

            <p id="sem-col-btn">
                <button id="sem-col-btn-1" class="btn btn-dark" type="button" data-toggle="collapse" data-target="#sem-1" aria-expanded="false" aria-controls="collapseExample" onclick="collapseAll()">
                    Sem 1
                </button>
                <button id="sem-col-btn-2" class="btn btn-dark" type="button" data-toggle="collapse" data-target="#sem-2" aria-expanded="false" aria-controls="collapseExample" onclick="collapseAll()">
                    Sem 2
                </button>
                <button id="sem-col-btn-3" class="btn btn-dark" type="button" data-toggle="collapse" data-target="#sem-3" aria-expanded="false" aria-controls="collapseExample" onclick="collapseAll()">
                    Sem 3
                </button>
                <button id="sem-col-btn-4" class="btn btn-dark" type="button" data-toggle="collapse" data-target="#sem-4" aria-expanded="false" aria-controls="collapseExample" onclick="collapseAll()">
                    Sem 4
                </button>
            </p>

            <div class="collapse" id="sem-1">
                <div class="card card-body">
                    <h5>Semester 1</h5>
                    <div class="form-group">
                        <button class="btn btn-success col-lg-3 float-left" onclick="addSubject(1)">Add Subject</button>
                        <button class="btn btn-danger col-lg-3 ml-2 float-left" onclick="removeSubject(1)">Remove Subject</button>
                        <button class="btn btn-primary col-lg-2 ml-2 float-left" onclick="calculateSemesterGPA(1)">Add GPA</button>
                    </div>
                    <div class="form-group" id="sem-1-sub-1">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 1</label>
                        <?php result_dropdown(1,1); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-1-sub-1-credits" oninput="calculatePoints(1,1)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-1-sub-1-points" readonly>
                    </div>
                    <div class="form-group" id="sem-1-sub-2">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 2</label>
                        <?php result_dropdown(1,2); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-1-sub-2-credits" oninput="calculatePoints(1,2)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-1-sub-2-points" readonly>
                    </div>
                    <div class="form-group" id="sem-1-sub-3">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 3</label>
                        <?php result_dropdown(1,3); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-1-sub-3-credits" oninput="calculatePoints(1,3)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-1-sub-3-points" readonly>
                    </div>
                    <div class="form-group" id="sem-1-sub-4">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 4</label>
                        <?php result_dropdown(1,4); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-1-sub-4-credits" oninput="calculatePoints(1,4)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-1-sub-4-points" readonly>
                    </div>
                </div>
            </div>

            <div class="collapse" id="sem-2">
                <div class="card card-body">
                    <h5>Semester 2</h5>
                    <div class="form-group">
                        <button class="btn btn-success col-lg-3 float-left" onclick="addSubject(2)">Add Subject</button>
                        <button class="btn btn-danger col-lg-3 ml-2 float-left" onclick="removeSubject(2)">Remove Subject</button>
                        <button class="btn btn-primary col-lg-2 ml-2 float-left" onclick="calculateSemesterGPA(2)">Add GPA</button>
                    </div>
                    <div class="form-group" id="sem-2-sub-1">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 1</label>
                        <?php result_dropdown(2,1); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-2-sub-1-credits" oninput="calculatePoints(2,1)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-2-sub-1-points" readonly>
                    </div>
                    <div class="form-group" id="sem-2-sub-2">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 2</label>
                        <?php result_dropdown(2,2); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-2-sub-2-credits" oninput="calculatePoints(2,2)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-2-sub-2-points" readonly>
                    </div>
                    <div class="form-group" id="sem-2-sub-3">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 3</label>
                        <?php result_dropdown(2,3); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-2-sub-3-credits" oninput="calculatePoints(2,3)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-2-sub-3-points" readonly>
                    </div>
                    <div class="form-group" id="sem-2-sub-4">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 4</label>
                        <?php result_dropdown(2,4); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-2-sub-4-credits" oninput="calculatePoints(2,4)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-2-sub-4-points" readonly>
                    </div>
                </div>
            </div>

            <div class="collapse" id="sem-3">
                <div class="card card-body">
                    <h5>Semester 3</h5>
                    <div class="form-group">
                        <button class="btn btn-success col-lg-3 float-left" onclick="addSubject(3)">Add Subject</button>
                        <button class="btn btn-danger col-lg-3 ml-2 float-left" onclick="removeSubject(3)">Remove Subject</button>
                        <button class="btn btn-primary col-lg-2 ml-2 float-left" onclick="calculateSemesterGPA(3)">Add GPA</button>
                    </div>
                    <div class="form-group" id="sem-3-sub-1">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 1</label>
                        <?php result_dropdown(3,1); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-3-sub-1-credits" oninput="calculatePoints(3,1)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-3-sub-1-points" readonly>
                    </div>
                    <div class="form-group" id="sem-3-sub-2">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 2</label>
                        <?php result_dropdown(3,2); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-3-sub-2-credits" oninput="calculatePoints(3,2)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-3-sub-2-points" readonly>
                    </div>
                    <div class="form-group" id="sem-3-sub-3">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 3</label>
                        <?php result_dropdown(3,3); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-3-sub-3-credits" oninput="calculatePoints(3,3)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-3-sub-3-points" readonly>
                    </div>
                    <div class="form-group" id="sem-3-sub-4">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 4</label>
                        <?php result_dropdown(3,4); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-3-sub-4-credits" oninput="calculatePoints(3,4)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-3-sub-4-points" readonly>
                    </div>
                </div>
            </div>

            <div class="collapse" id="sem-4">
                <div class="card card-body">
                    <h5>Semester 4</h5>
                    <div class="form-group">
                        <button class="btn btn-success col-lg-3 float-left" onclick="addSubject(4)">Add Subject</button>
                        <button class="btn btn-danger col-lg-3 ml-2 float-left" onclick="removeSubject(4)">Remove Subject</button>
                        <button class="btn btn-primary col-lg-2 ml-2 float-left" onclick="calculateSemesterGPA(4)">Add GPA</button>
                    </div>
                    <div class="form-group" id="sem-4-sub-1">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 1</label>
                        <?php result_dropdown(4,1); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-4-sub-1-credits" oninput="calculatePoints(4,1)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-4-sub-1-points" readonly>
                    </div>
                    <div class="form-group" id="sem-4-sub-2">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 2</label>
                        <?php result_dropdown(4,2); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-4-sub-2-credits" oninput="calculatePoints(4,2)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-4-sub-2-points" readonly>
                    </div>
                    <div class="form-group" id="sem-4-sub-3">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 3</label>
                        <?php result_dropdown(4,3); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-4-sub-3-credits" oninput="calculatePoints(4,3)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-4-sub-3-points" readonly>
                    </div>
                    <div class="form-group" id="sem-4-sub-4">
                        <label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 4</label>
                        <?php result_dropdown(4,4); ?>
                        <input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-4-sub-4-credits" oninput="calculatePoints(4,4)">
                        <input class="form-control col-lg-2 alert-warning" type="number" id="sem-4-sub-4-points" readonly>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer bg-dark text-light p-3 fixed-bottom text-center">
        System Designed & Developed by <b><a href="https://www.facebook.com/teamnx/" target="_blank" class="text-light"> Team <span class="text-danger">NX</span></a></b>
    </div>
</body>
</html>