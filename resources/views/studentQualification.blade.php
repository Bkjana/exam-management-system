<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Student Qualification</title>
    <style>
        body{
            background: #b2c0c0;
        }
        .parent{
            position: relative;
        }
        .icon{
            position: absolute;
            right: -17px;
            font-size: 34px;
            cursor: pointer;
        }
        .add{
            color: rgb(22, 228, 22);
        }
        .add1{
            color: rgb(22, 228, 22);
            top: 0;
        }
        .remove{
            color: red;
            bottom: 0;
        }
    </style>
  </head>
  <body>
    <h3 class="text-center">Student Qualification Form</h3>
    <form action="/studentQualification" method="post" class="text-center" id="form">
        @csrf
        <div class="border d-flex justify-content-between form-group m-3 p-3 bg-dark col-11 parent">
            <input class="form-control m-1" type="text" name="institute_name[]" placeholder="Enter Institute Name">
            <input class="form-control m-1" type="text" name="board_name[]" id="" placeholder="Enter Board Name">
            <input class="form-control m-1" type="number" name="passing_year[]" placeholder="Enter Passing Year (xxxx)">
            <input class="form-control m-1" type="number" name="percentage[]" id="" placeholder="Enter Your Percentage (xx)">
            <ion-icon name="add-circle-outline" class="add icon" onclick="addElement(this)"></ion-icon>
        </div>


        <input type="submit" class="btn btn-outline-success ml-auto mr-auto">

    </form>


    <div class="border d-flex justify-content-between form-group m-3 p-3 bg-dark col-11 parent" id="duplicate">
        <input class="form-control m-1" type="text" name="institute_name[]" placeholder="Enter Institute Name">
        <input class="form-control m-1" type="text" name="board_name[]" id="" placeholder="Enter Board Name">
        <input class="form-control m-1" type="number" name="passing_year[]" placeholder="Enter Passing Year (xxxx)">
        <input class="form-control m-1" type="number" name="percentage[]" id="" placeholder="Enter Your Percentage (xx)">
        <ion-icon name="add-circle-outline" class="add1 icon" onclick="addElement(this)"></ion-icon>
        <ion-icon name="remove-circle-outline" class="remove icon" onclick="removeElement(this)"></ion-icon>
    </div>

    <script src="{{ asset('js\studentQualification.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>   
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
  </html>