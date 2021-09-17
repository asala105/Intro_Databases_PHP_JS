<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Expenses</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a id="expenseAdd" class="dropdown-item" href="#" data-toggle="modal" data-target="#addExpenseModal">Add Expenses</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addCatModal">Add Categories</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid" style="margin-top:5rem">
  <div class="row">
    <div class="col-md-8 text-center">
      <h3>List of Expenses</h3>
      <input type="hidden" id="userId" name="userId" value=<?php echo $_SESSION["user_id"];?>>
      <table  class="table table-light">
        <thead class="thead-light">
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Category</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="expenses">
        </tbody>
      </table>
    </div>
    <div class="col-md-4 text-center">
    <div id="piechart" style="padding-top:3rem;width:auto"></div>
    </div>
  </div>
</div>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
      </div>
    </div>
  </main>
  <!-- Modal -->
<div class="modal fade" id="addExpenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addExpenseForm" action="php/addExpenses.php" method="POST">
      <div class="modal-body">
                  <div class="form-group">
                    <label for="date" class="sr-only">Date</label>
                    <input type="date" name="date" id="date" class="form-control form-data" placeholder="Date">
                  </div>
                  <div class="form-group mb-4">
                    <label for="amount" class="sr-only">Amount</label>
                    <input type="text" name="amount" id="amount" class="form-control form-data" placeholder="Amount">
                  </div>
                  <div class="form-group mb-4">
                  <select id="chooseCategory" name="category" class="form-select form-data" aria-label="Default select example">
                    <option selected>Choose a Category</option>
                  </select>
                  </div>
                  <a class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#addCatModal">Add New Category?</a>
                  
      </div>
      <div class="modal-footer">
          <input name="addExpense" id="addExpense" class="btn btn-block btn-outline-dark mb-4" type="button" value= "Add Expense"/>
      </div>
      </form>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      <form id="addCategoryForm" action="php/addCategories.php" method="POST">
      
      
      
      <div class="modal-body">
                  <div class="form-group mb-4">
                    <label for="category" class="sr-only">Category</label>
                    <input type="text" name="category" id="category" class="form-control" placeholder="category">
                  </div>
      </div>
      <div class="modal-footer">
        <input name="addCategory" id="addCategory" class="btn btn-block btn-outline-dark" type="button" value= "Add Category"/>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editExpenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editExpenseForm" action="php/addExpenses.php" method="POST">
      <div class="modal-body">
                  <div class="form-group">
                    <label for="date" class="sr-only">Date</label>
                    <input type="date" name="date" id="date" class="form-control form-data" placeholder="Date">
                  </div>
                  <div class="form-group mb-4">
                    <label for="amount" class="sr-only">Amount</label>
                    <input type="text" name="amount" id="amount" class="form-control form-data" placeholder="Amount">
                  </div>
                  <div class="form-group mb-4">
                  <select id="editExpenseCategory" name="category" class="form-select form-data" aria-label="Default select example">
                    <option selected value="">Choose a Category</option>
                  </select>
                  </div>
                  <a class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#addCatModal">Add New Category?</a>
                  
      </div>
      <div class="modal-footer">
          <input name="editExpense" id="editExpense" class="btn btn-block btn-outline-dark mb-4" type="button" value= "Edit Expense"/>
      </div>
      </form>
    </div>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
