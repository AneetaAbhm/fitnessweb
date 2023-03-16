<?php
//For Including Config.php
include 'config.php';
//Posting Data
if (isset($_POST['submit'])) {
    //Getting Values From Form

    $eby = "josh";
    $numbere = test_input($_POST['invoicenumber']);
    $datee = test_input($_POST['invoicedate']);
    $deliv_datee = test_input($_POST['delivereddate']);
    $supplier = test_input($_POST['supplier']);
    $noofitems = (int)test_input($_POST['numberofitems']);
    $amount = (int)test_input($_POST['amount']);
    $sgst = (int)test_input($_POST['sgst']);
    $cgst = (int)test_input($_POST['cgst']);
    $igst = (int)test_input($_POST['igst']);
    $totAftDis = (int)test_input($_POST['totalafterdiscount']);
    $remarks = test_input($_POST['remarks']);

    $getQuery = "SELECT * FROM inv_supplier WHERE sup_name='$supplier'";
    $getRun = mysqli_query($conn, $getQuery);
    $getResult = mysqli_fetch_assoc($getRun);

    $supplier_id = $getResult['sup_sl'];

    $file = $_FILES['invfile'];
    $file_name = $_FILES['invfile']['name'];
    $file_type = $_FILES['invfile']['type'];
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_size = $_FILES['invfile']['size'];
    $file_temp_loc = $_FILES['invfile']['tmp_name'];

    $file_store = "uploads/" . $numbere . '.' . $file_extension;
    move_uploaded_file($file_temp_loc, $file_store);

    // Query For inserting Invoice Data Into Database
    $query = "INSERT INTO inv_master (inv_inv_no, inv_date, inv_delivered_date, inv_sup_id,inv_no_items,inv_amount,inv_sgst,inv_cgst,inv_igst,inv_tot_after_discount,inv_entered_by,inv_remarks) VALUES('$numbere','$datee','$deliv_datee','$supplier_id','$noofitems','$amount','$sgst','$cgst','$igst','$totAftDis','$eby','$remarks')";
    $run = mysqli_query($conn, $query);
}

function test_input($data)
{
    // Removing extra spaces
    $data = trim($data);
    //Removing Slashes
    $data = stripslashes($data);
    //Removing Special Charachters
    $data = htmlspecialchars($data);
    return $data;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/buttons.css">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Invoice Entry</title>

</head>

<body>
    <!--Form For Inputing Data -->
    <form action="profile.html" method="post" enctype="multipart/form-data">
        <label for="fname">First name: </label>
        <input type="text" name="fname" id="fname">
        <br>
        <label for="lname">Last Name: </label>
        <input type="text" name="lname" id="lname">
        <br>
        <label for="phoneno">Phone: </label>
        <input type="text" name="phoneno" id="phoneno">
        <br>
        <label for="supplier">Supplier: </label>
        <input type="text" list="supplier" name="supplier" id="suppliers">
        <datalist id="supplier" id="supplierDataList">
            <?php
            $query = "SELECT * FROM inv_supplier";
            $run = mysqli_query($conn, $query);
            if ($num = mysqli_num_rows($run) > 0) {
                while ($result = mysqli_fetch_assoc($run)) {
                    echo "<option value='" . strval($result['sup_name']) . "'>" . $result['sup_name'] . "</option>";
                }
            }
            ?>
        </datalist>
        <a href="./supplier.php" class="button-3" role="button">Add Supplier</a>

        <br>
        <label for="numberofitems">Number of Items: </label>
        <input type="text" name="numberofitems" id="numberofitems">
        <br>
        <label for="amount">Amount : </label>
        <input type="text" name="amount" id="amount">
        <br>
        <label for="sgst">SGST: </label>
        <input type="text" name="sgst" id="sgst">
        <br>
        <label for="cgst">CGST: </label>
        <input type="text" name="cgst" id="cgst">
        <br>
        <label for="igst">IGST: </label>
        <input type="text" name="igst" id="igst">
        <br>
        <label for="totalafterdiscount">Total After Discount: </label>
        <input type="text" name="totalafterdiscount" id="totalafterdiscount">
        <br>
        <label for="remarks">Remarks: </label>
        <input type="text" name="remarks" id="remarks">
        <br>
        <label for="invfile">Upload Invoice: </label>
        <input type="file" name="invfile" id="invfile">
        <br>
        <input class="button-54" role="button" type="submit" name="submit" value="Submit">
    </form>
    <br>
    <a href="./showInvoice.php" class="button-3" role="button">Show Invoice</a>


    <script>

    </script>
</body>

</html>







