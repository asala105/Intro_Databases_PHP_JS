var Global_id=0;
$(document).ready(function () { 
    DrawPieChart()
    $("#login").click( function () {
        console.log("login");
        var formElement = $("#loginForm");
        var userValid = false;
        var passLen = false;
        var userValue = $("#username").val();
        console.log(formElement);
        console.log(userValue);
        if (
            userValue.length >= 5
        ){
            userValid = true;
        }
        console.log(userValid);
        if ($("#password").val().length >= 5) {
            passLen = true;
        }
        if(!userValid){
            alert("The username should be at least 5 characters long");
        }
        if(!passLen){
            alert("The password should be at least 5 characters long");
        }
        if(userValid && passLen){
            formElement.submit();
        }
    });

    $("#signup").click( function () {
        var formElement = $("#SignupForm");
        var username = $("#username").val();
        var password = $("#password").val();
        var confirmPass = $("#confirmPass").val();
        userValid = false;
        passwordValid = false;
        confirmPassValid = false;
        //username validation
        if (username.length >= 5){
                userValid = true;
        }
        if(!userValid){
            alert("The username should be at least 5 characters long");
        }
        //password validation
        if (password.length >= 5) {
            passwordValid = true;
        }
        if(!passwordValid){
            alert("The password must be at least 5 characters long");
        }
        //confirmPass validation
        if (password == confirmPass) {
            confirmPassValid = true;
        }
        if(!confirmPassValid){
            alert("The confirm password doesn't match the password");
        }
        if(userValid && passwordValid && confirmPassValid){
            formElement.submit();
        }
    });
    async function getExpenses(){
        var id = $("#userId").val();
        const response = await fetch('http://localhost/expensesTracker/php/getExpenses.php?q='+id);
        const results = await response.json();
        return results;
    }
    getExpenses().then(data => {
        for(i=0; i<data.length;i++){
            element = data[i];
            markup = '<tr><th scope="row">'+element.date+'</th>\
            <td>$ '+element.amount+'</td>\
            <td>'+element.category+'</td>\
            <td><input type="hidden" class="expense" value="'+element.id+'">\
            <button class="btn btn-outline-success" data-toggle="modal" \
            data-target="#editExpenseModal" onclick="getExpenseID('+element.id+')">\
            edit</button></td>\
            <td>delete</td></tr>';
            $("#expenses").append(markup);
        }
    })


    async function getCategories(){
        var id = $("#userId").val();
        const response = await fetch('http://localhost/expensesTracker/php/getAllCategories.php?q='+id);
        const results = await response.json();
        return results;
    }
    function getCat(){
        getCategories().then(data =>{
        for(i=0; i<data.length;i++){
            element = data[i];
            $("#chooseCategory").append($('<option></option>').attr('value', element.id).text(element.category));

            $("#editExpenseCategory").append($('<option></option>').attr('value', element.id).text(element.category));
        }
        });
    }
    $("#expenseAdd").click(getCat);

// Get the whole form, not the individual input-fields
const form = $("#addExpenseForm");
$("#addExpense").click(function(event){
    console.log(form[0][2].value)
    data = {
        date: form[0][0].value,
        amount: form[0][1].value,
        category: form[0][2].value,
    };
    postData(data);
});

async function postData(form_data){
    try{
        result = await $.ajax({
        type: "POST",
        url: 'http://localhost/expensesTracker/php/addExpenses.php',
        data: form_data,});

        var jsonData = await JSON.parse(result);
        markup = '<tr><th scope="row">'+jsonData.date+'</th>\
            <td>$ '+jsonData.amount+'</td>\
            <td>'+jsonData.category+'</td>\
            <td><input type="hidden" class="expense" value="'+jsonData.id+'">\
            <button class="btn btn-outline-success" data-toggle="modal" data-target="#editExpenseModal">\
            edit</button></td>\
            <td>delete</td></tr>';
            await $("#expenses").append(markup);
    }catch(error){
        console.log(error);
    }
}


const Categoryform = $("#addCategoryForm");
$("#addCategory").click(function(event){
    data = {
        category: Categoryform[0][0].value,
    };
    postCategoryData(data);
});

async function postCategoryData(form_data){
    try{
        result = await $.ajax({
        type: "POST",
        url: 'http://localhost/expensesTracker/php/addCategories.php',
        data: form_data,});

        var jsonData = await JSON.parse(result);
        $("#chooseCategory").append($('<option></option>').attr('value', jsonData.id).text(jsonData.category));
    }catch(error){
        console.log(error);
    }
}

const editform = $("#editExpenseForm");
$("#editExpense").click(function(event){
    console.log(form[0][2].value)
    data = {
        id : Global_id,
        date: editform[0][0].value,
        amount: editform[0][1].value,
        category: editform[0][2].value,
    };
    console.log(data)
    postEditData(data);
});

async function postEditData(form_data){
    try{
        result = await $.ajax({
        type: "POST",
        url: 'http://localhost/expensesTracker/php/addExpenses.php',
        data: form_data,});

        var jsonData = await JSON.parse(result);
        /* markup = '<tr><th scope="row">'+jsonData.date+'</th>\
            <td>$ '+jsonData.amount+'</td>\
            <td>'+jsonData.category+'</td>\
            <td><input type="hidden" class="expense" value="'+jsonData.id+'">\
            <button class="btn btn-outline-success" data-toggle="modal" data-target="#editExpenseModal">\
            edit</button></td>\
            <td>delete</td></tr>';
            await $("#expenses").append(markup); */
            console.log(jsonData);
    }catch(error){
        console.log(error);
    }
}


});

function getExpenseID(id)
{
    Global_id = id;
}

function DrawPieChart(){
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    async function getExpensesByCategory(){
    var id = $("#userId").val();
    const response = await fetch('http://localhost/expensesTracker/php/getExpensesByCat.php?q='+id);
    const results = await response.json();
    return results;
    }
    Chartdata = [['Category','Expenses']];
    getExpensesByCategory().then(data => {
        for(i=0; i<data.length;i++){
            element = data[i];
            a = [element.cat,element.amounts]
            console.log(element)
            Chartdata.push(a);
        }
    })
  // Draw the chart and set the chart values
    function drawChart() {
    var data = google.visualization.arrayToDataTable(Chartdata);
    // Optional; add a title and set the width and height of the chart
    var options = {'title':'Expenses per category',width:500, 'height':400};
    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
    }
}