/*
Script by Nashath Nasik
version : 1.022
*/
var noOfSemesters = 4;
var totalPoints = 0;
var GPAs = [];
var noOfSubjects = [4,4,4,4];
var overallGPA=0.00;

function calculateSemesterGPA(semester){
    let noOfSub = noOfSubjects[semester-1];
    let totalCredits = 0;
    let points = 0;
    for (let i = 1; i <= noOfSub; i++) {
        let grade = Number($("#sem-"+ semester +"-sub-"+ i +"-grade").val());
        let credit = Number($("#sem-"+ semester +"-sub-"+ i +"-credits").val());
        points+=(grade*credit);
        totalCredits+=credit;
    }
    GPAs[semester-1]=Math.round((points/totalCredits)*100)/100;
    $("#semester-"+semester+"-GPA").val(GPAs[semester-1]);
}

function removeSemester(){
    $('#semester-'+noOfSemesters).remove();
    $('#sem-col-btn-'+ noOfSemesters).remove();
    $('#sem'+ noOfSemesters +'sub').remove();
    $('#sem-'+ noOfSemesters).remove();
    noOfSubjects.pop();
    noOfSemesters--;
}

function addSemester(){
    noOfSubjects[noOfSemesters]=4;
    noOfSemesters++;

    $('#semesters').append(
        '<div class="form-group" id="semester-'+ noOfSemesters +'">'+
            '<label class="col-lg-4 p-0 pt-1 float-left">Semester '+ noOfSemesters +' GPA</label>'+
            '<input type="number" class="form-control col-lg-3" id="semester-'+ noOfSemesters +'-GPA">'+
        '</div>'
    );

    $('#sem-col-btn').append(
        '<button id="sem-col-btn-'+ noOfSemesters +'" class="btn btn-dark ml-2" type="button" data-toggle="collapse" data-target="#sem-'+ noOfSemesters +'" aria-expanded="false" aria-controls="collapseExample" onclick="collapseAll()">' + 
        'Sem ' + noOfSemesters +
        '</button>'
    );

    $('#semesters-subjects').append(
    '<div class="collapse" id="sem-'+ noOfSemesters +'">'+
        '<div class="card card-body">'+
            '<h5>Semester '+ noOfSemesters +'</h5>'+
        '<div class="form-group">'+
            '<button class="btn btn-success col-lg-3 float-left" onclick="addSubject('+ noOfSemesters +')">Add Subject</button>'+
            '<button class="btn btn-danger col-lg-3 ml-2 float-left" onclick="removeSubject('+ noOfSemesters +')">Remove Subject</button>'+
            '<button class="btn btn-primary col-lg-2 ml-2 float-left" onclick="calculateSemesterGPA('+ noOfSemesters +')">Add GPA</button>'+
        '</div>'+
        '<div class="form-group" id="sem-'+noOfSemesters+'-sub-1">'+
            '<label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 1</label>'+
            '<select class="form-control col-lg-2 mr-2 float-left" id="sem-'+noOfSemesters+'-sub-1-grade"><option value="0.00"></option><option value="4.00">A+</option><option value="4.00">A</option><option value="3.70">A-</option><option value="3.30">B+</option><option value="3.00">B</option><option value="2.70">B-</option><option value="2.30">C+</option><option value="2.00">C</option><option value="1.70">C-</option><option value="1.30">D+</option><option value="1.00">D</option><option value="0.00">E</option></select>'+
            '<input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-'+noOfSemesters+'-sub-1-credits" oninput="calculatePoints('+noOfSemesters+',1)">'+
            '<input class="form-control col-lg-2 alert-warning" type="number" id="sem-'+noOfSemesters+'-sub-1-points" readonly>'+
        '</div>'+
        '<div class="form-group" id="sem-'+noOfSemesters+'-sub-2">'+
            '<label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 2</label>'+
            '<select class="form-control col-lg-2 mr-2 float-left" id="sem-'+noOfSemesters+'-sub-2-grade"><option value="0.00"></option><option value="4.00">A+</option><option value="4.00">A</option><option value="3.70">A-</option><option value="3.30">B+</option><option value="3.00">B</option><option value="2.70">B-</option><option value="2.30">C+</option><option value="2.00">C</option><option value="1.70">C-</option><option value="1.30">D+</option><option value="1.00">D</option><option value="0.00">E</option></select>'+
            '<input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-'+noOfSemesters+'-sub-2-credits" oninput="calculatePoints('+noOfSemesters+',2)">'+
            '<input class="form-control col-lg-2 alert-warning" type="number" id="sem-'+noOfSemesters+'-sub-2-points" readonly>'+
        '</div>'+
        '<div class="form-group" id="sem-'+noOfSemesters+'-sub-3">'+
            '<label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 3</label>'+
            '<select class="form-control col-lg-2 mr-2 float-left" id="sem-'+noOfSemesters+'-sub-3-grade"><option value="0.00"></option><option value="4.00">A+</option><option value="4.00">A</option><option value="3.70">A-</option><option value="3.30">B+</option><option value="3.00">B</option><option value="2.70">B-</option><option value="2.30">C+</option><option value="2.00">C</option><option value="1.70">C-</option><option value="1.30">D+</option><option value="1.00">D</option><option value="0.00">E</option></select>'+
            '<input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-'+noOfSemesters+'-sub-3-credits" oninput="calculatePoints('+noOfSemesters+',3)">'+
            '<input class="form-control col-lg-2 alert-warning" type="number" id="sem-'+noOfSemesters+'-sub-3-points" readonly>'+
        '</div>'+
        '<div class="form-group" id="sem-'+noOfSemesters+'-sub-4">'+
            '<label for="" class="col-lg-2 p-0 pt-2 float-left">Subject 4</label>'+
            '<select class="form-control col-lg-2 mr-2 float-left" id="sem-'+noOfSemesters+'-sub-4-grade"><option value="0.00"></option><option value="4.00">A+</option><option value="4.00">A</option><option value="3.70">A-</option><option value="3.30">B+</option><option value="3.00">B</option><option value="2.70">B-</option><option value="2.30">C+</option><option value="2.00">C</option><option value="1.70">C-</option><option value="1.30">D+</option><option value="1.00">D</option><option value="0.00">E</option></select>'+
            '<input type="number" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-'+noOfSemesters+'-sub-4-credits" oninput="calculatePoints('+noOfSemesters+',4)">'+
            '<input class="form-control col-lg-2 alert-warning" type="number" id="sem-'+noOfSemesters+'-sub-4-points" readonly>'+
        '</div>'+
    '</div>'+
    '</div>'
    );
    
}

function calculateGPA(){
    let totalGPA = 0.0;
    for (let i = 1; i <= noOfSemesters; i++) {
        let thisGPA = Number($('#semester-'+i+'-GPA').val());
        totalGPA+=thisGPA;
    }
    overallGPA =  Math.round((totalGPA/noOfSemesters)*100)/100;
}

function refresh(){
    calculateGPA();
    $('#output').html(
        '<b>Overall GPA : '+ overallGPA.toFixed(2)
    );
}

function addSubject(semester){
    noOfSubjects[semester-1]++;
    $("#sem-"+semester+ ">div").append(
        '<div class="form-group" id="sem-'+semester+'-sub-'+noOfSubjects[semester-1]+'">'+
            '<label for="" class="col-lg-2 p-0 pt-2 float-left">Subject '+ noOfSubjects[semester-1] +'</label>' +
                '<select onchange="calculatePoints('+semester+','+noOfSubjects[semester-1]+')" class="form-control col-lg-2 mr-2 float-left" id="sem-'+ semester +'-sub-'+noOfSubjects[semester-1]+'-grade">'+
                '<option value="0.00"></option>'+
                '<option value="4.00">A+</option>'+
                '<option value="4.00">A</option>'+
                '<option value="3.70">A-</option>'+
                '<option value="3.30">B+</option>'+
                '<option value="3.00">B</option>'+
                '<option value="2.70">B-</option>'+
                '<option value="2.30">C+</option>'+
                '<option value="2.00">C</option>'+
                '<option value="1.70">C-</option>'+
                '<option value="1.30">D+</option>'+
                '<option value="1.00">D</option>'+
                '<option value="0.00">E</option>'+
            '</select>'+
            '<input type="number" oninput="calculatePoints('+semester+','+noOfSubjects[semester-1]+')" placeholder="Credits" class="form-control col-lg-2 mr-2 float-left" id="sem-'+semester+'-sub-'+noOfSubjects[semester-1]+'-credits">'+
            '<input class="form-control col-lg-2 alert-warning" type="number" id="sem-'+semester+'-sub-'+noOfSubjects[semester-1]+'-points" readonly="">'+
        '</div>'
    );
}

function removeSubject(semester){
    $('#sem-'+semester+'-sub-'+noOfSubjects[semester-1]+'').remove();
    noOfSubjects[semester-1]--;
}

function calculatePoints(semester,subject){
    let grade = $('#sem-'+ semester +'-sub-'+ subject +'-grade').val();
    let credit = $('#sem-'+ semester +'-sub-'+ subject +'-credits').val();
    let points = Math.round(grade * credit*100)/100;
    $('#sem-'+ semester +'-sub-'+ subject +'-points').val(points);
}

function reset(){
    location.reload();
}

function collapseAll(){
    $('.show').removeClass('show');
}