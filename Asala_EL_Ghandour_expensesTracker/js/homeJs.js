var Global_id=0;
$(document).ready(function () { 
    DrawPieChart();
    //view all expenses
    async function getExpenses(){
        var id = $("#userId").val();
        const response = await fetch('http://localhost/expensesTracker/php/getExpenses.php?q='+id);
        if(!response.ok){
            const message = "An Error has occurred";
            throw new Error(message);
        }
        const results = await response.json();
        return results;
    }
    getExpenses().then(data => {
        for(i=0; i<data.length;i++){
            element = data[i];
            markup = '<tr id="'+element.id+'"><th scope="row">'+element.date+'</th>\
            <td>$ '+element.amount+'</td>\
            <td>'+element.category+'</td>\
            <td><button class="btn btn-outline-success" data-toggle="modal" data-target="#editExpenseModal" onclick="editExpense('+element.id+'); getCat()">\
            edit</button></td>\
            <td><a class="btn btn-outline-danger delete" onclick="deleteExpense('+element.id+')">\
            delete</a></td></tr>';
            $("#expenses").append(markup);
        }
    }).catch(error => {
        console.log(error.message);
    });



    //adding a new expense
    $("#expenseAdd").click(getCat);
    // Get the whole form, not the individual input-fields
    const form = $("#addExpenseForm");
    $("#addExpense").click(function(event){
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
            markup = '<tr id="'+jsonData.id+'"><th scope="row">'+jsonData.date+'</th>\
            <td>$ '+jsonData.amount+'</td>\
            <td>'+jsonData.category+'</td>\
            <td><button class="btn btn-outline-success" data-toggle="modal" data-target="#editExpenseModal" onclick="editExpense('+jsonData.id+'); getCat()">\
            edit</button></td>\
            <td><a class="btn btn-outline-danger delete" onclick="deleteExpense('+jsonData.id+')">\
            delete</a></td></tr>';
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

});
function getExpenseID(id)
{
    Global_id = id;
}

async function deleteExpense(id){
    try{
        result = await $.ajax({
        type: "GET",
        url: 'http://localhost/expensesTracker/php/deleteExpense.php?q='+id,
    });
        var jsonData = await JSON.parse(result);
        $('#'+jsonData.id+'').remove();
    }catch(error){
        console.log(error);
    }
}

//const editform = $(".editExpenseForm");
function editExpense(id){
    $("form input[type=button]").click(function(event){
        var form = $(this).closest(".modal-content").find("form");
        data = {
            expense_id : id,
            date: form[0][0].value,
            amount: form[0][1].value,
            category: form[0][2].value,
        };
        postEditedData(data);
    })
}

async function getCategories(){
    var id = $("#userId").val();
    const response = await fetch('http://localhost/expensesTracker/php/getAllCategories.php?q='+id);
    if(!response.ok){
        const message = "An Error has occurred";
        throw new Error(message);
    }
    const results = await response.json();
    return results;
}

function getCat(){
    getCategories().then(data =>{
    for(i=0; i<data.length;i++){
        element = data[i];
        $("#chooseCategory").append($('<option></option>').attr('value', element.id).text(element.category));
        $(".chooseCategoryEdit").append($('<option></option>').attr('value', element.id).text(element.category));
    }
    }).catch(error => {
        console.log(error.message);
    });
}
async function postEditedData(form_data){
    try{
        result = await $.ajax({
        type: "POST",
        url: 'http://localhost/expensesTracker/php/editExpense.php',
        data: form_data,});

        var jsonData = await JSON.parse(result);
        $('#'+jsonData.id+'').remove();
        markup = '<tr id="'+jsonData.id+'"><th scope="row">'+jsonData.date+'</th>\
        <td>$ '+jsonData.amount+'</td>\
        <td>'+jsonData.category+'</td>\
        <td><button class="btn btn-outline-success" data-toggle="modal" data-target="#editExpenseModal" onclick="editExpense('+jsonData.id+'); getCat()">\
        edit</button></td>\
        <td><a class="btn btn-outline-danger delete" onclick="deleteExpense('+jsonData.id+')">\
        delete</a></td></tr>';
        await $("#expenses").append(markup);
    }catch(error){
        console.log(error);
    }
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