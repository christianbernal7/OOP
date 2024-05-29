<?php

use Config\Database;
use App\Models\UserModel;

require dirname(__DIR__).'/vendor/autoload.php';

$conn = ((New Database)->connect());
$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Basic Calculator</title>
</head>
<body style="background: #808B96;">
    <!-- <form action="http://localhost/OOP/app/requests/calculator.request.php" method="post">
        <select name="operator" id="">
            <option value="addition">Addition</option>
            <option value="subtraction">Substraction</option>
            <option value="multiplication">Multiplication</option>
            <option value="division">Division</option>
        </select>
        <input type="number" name="first_number" placeholder="First Number">
        <input type="number" name="second_number" placeholder="Second Number">
        <input type="submit" name="btn_submit">
    </form> -->

    <br><br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 w-100 text-center" id="exampleModalLabel" style="color:green;">INSERT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost/OOP/app/requests/calculator.request.php" method="post" class="d-flex flex-column gap-2">
                        <input type="text" name="first_name" placeholder="First Name" class="form-control">
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                        <input type="text" name="age" placeholder="Age" class="form-control">
                        <input type="text" name="email" placeholder="Email" class="form-control">
                        <input type="text" name="address" placeholder="Address" class="form-control">
                        <input type="text" name="contact" placeholder="Contact" class="form-control">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Insert</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--SEARCH-->
    <div class="container my-3">
        <form action="index.php" method="GET" class="row g-3">
            <div class="col-8 col-sm-10">
                <input type="text" name="search" class="form-control" placeholder="Search..." aria-describedby="button-addon2">
            </div>
            <div class="col-4 col-sm-2">
                <button type="submit" value="Search" class="btn btn-outline-secondary w-100" id="button-addon2" style="background-color: #AFAFAF ;"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>

    <div class="container mt-4 p-4 rounded" style="background-color: white; border:5px solid black;">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>

        <div class="table-responsive" >
            <table class="table table-hover">
                <thead class="table-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($stmt->rowCount() > 0) {
                        while($row = $stmt->fetch()){
                    ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['age'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td>
                            <!--UPDATE-->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_<?php echo $row['id'];?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>

                            <!-- Modal UPDATE-->
                            <div class="modal fade" id="modal_<?php echo $row['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 w-100 text-center" id="staticBackdropLabel" style="color: #FFBD00;">UPDATE</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="http://localhost/OOP/app/requests/update-request.php" method="post" class="d-flex flex-column gap-2">
                                                <input type="hidden" name="id" placeholder="ID" class="form-control" value="<?php echo $row['id'] ?>">
                                                <input type="text" name="first_name" placeholder="First Name" class="form-control" value="<?php echo $row['first_name'] ?>">
                                                <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="<?php echo $row['last_name'] ?>">
                                                <input type="text" name="age" placeholder="Age" class="form-control" value="<?php echo $row['age'] ?>">
                                                <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo $row['email'] ?>">
                                                <input type="text" name="address" placeholder="Address" class="form-control" value="<?php echo $row['address'] ?>">
                                                <input type="text" name="contact" placeholder="Contact" class="form-control" value="<?php echo $row['contact'] ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- DELETE -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_<?php echo $row['id'];?>">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>

                            <!-- Modal DELETE -->
                            <div class="modal fade" id="deleteModal_<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel" style="color:#FF3228;">Delete Record</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1 style="font-size: 20px; text-align: center;">Are you sure you want to delete this record?</h1>
                                            <form action="http://localhost/OOP/app/requests/delete-request.php" method="post" class="d-flex flex-column gap-2">
                                                <input type="hidden" name="id" placeholder="ID" class="form-control" value="<?php echo $row['id']; ?>" required>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>    
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php

/*
$obj = new UserModel();
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $result = $obj->search($search,'users');
    
    if($result){
        foreach($result as $row){
    echo "
            <tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['age']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['address']) . "</td>
                <td>" . htmlspecialchars($row['contact']) . "</td>
            </tr>
             
          
    
    ";
     }
    }

}
else {
    echo "
        <tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['first_name']) . "</td>
            <td>" . htmlspecialchars($row['last_name']) . "</td>
            <td>" . htmlspecialchars($row['age']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>" . htmlspecialchars($row['address']) . "</td>
            <td>" . htmlspecialchars($row['contact']) . "</td>
        </tr>
 


    ";
    
}
*/


?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
