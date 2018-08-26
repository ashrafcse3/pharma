
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>

    <?php
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "pharmacy";

        // Create connection
        $connection = new mysqli($serverName, $userName, $password, $dbName);
        
        $sql = 'SELECT drags.id, company.company_name, drags.drags_name
                FROM drags
                INNER JOIN company ON drags.c_id = company.id';
        $sqlAllCompany = 'SELECT company_name 
                          FROM company';
        $sqlAgainAllCompany = 'SELECT *
                                FROM company';
		
        $query = mysqli_query($connection, $sql);
        $queryAllCompany = mysqli_query($connection, $sqlAllCompany);
        $queryAgainAllCompany = mysqli_query($connection, $sqlAgainAllCompany);
    ?>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg justify-content-center navbar-dark default-color">
       <!-- Navbar brand -->
       <a class="navbar-brand px-lg-4 mr-0" href="#">
        <img src="assets/pharma_icon.png" height="30" alt="">
       </a>
   
    </nav>
    <!--/.Navbar-->

    <!--Main layout-->
    <main class="pt-5 mx-5">

        <!-- Table Start -->
        <div class="z-depth-1 mb-4">
            <table class="table">
                <!--Company select-->
                <div class="">
                
                <form name="PostName" action="" method="GET">
                    <select class="mdb-select colorful-select dropdown-primary custom-select" name="tableCompanySelect" onchange="PostName.submit()">
                        <option>All Data</option>
                        <?php
                            while ($rowAllCompany = mysqli_fetch_array($queryAllCompany)) {
                            if ($_GET['tableCompanySelect'] == $rowAllCompany['company_name']) { $select = "selected"; }
                            else { $select = ""; }
                            echo '<option '.$select.'>'.$rowAllCompany['company_name'].'</option>';
                            }
                        ?>
                    </select>
                </form>
                </div>
                <!--/Company select-->
                <thead class="default-color-light white-text">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Drugs Name</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($_GET['tableCompanySelect'])) {
                        $company = $_GET['tableCompanySelect'];
                        if ($company == "All Data") {
                            header("Location: " . "http://localhost/pharma/");
                        } else {
                        $sqlByCompany = "SELECT drags.id, company.company_name, drags.drags_name
                                        FROM drags
                                        INNER JOIN company ON drags.c_id = company.id
                                        WHERE company.company_name='$company'";
                        //var_dump($sqlByCompany);
                        $queryByCompany = mysqli_query($connection, $sqlByCompany);
                        //var_dump(mysqli_fetch_array($queryByCompany));

                        $number = 1;
                        while ($rowByCompany = mysqli_fetch_array($queryByCompany)) {
                        echo '<tr class="hoverable">
                                <td scope="row">'.$number.'</td>
                                <td>'.$rowByCompany['company_name'].'</td>
                                <td>'.$rowByCompany['drags_name'].'</td>
                            </tr>';
                        $number++;
                        }
                    }} else {
                        $no = 1;
                        //var_dump($query);
                        while ($row = mysqli_fetch_array($query)) {
                        echo '<tr class="hoverable">
                                <td scope="row">'.$no.'</td>
                                <td>'.$row['company_name'].'</td>
                                <td>'.$row['drags_name'].'</td>
                            </tr>';
                        $no++;
                        }
                    }    
                ?>
                </tbody>
            </table>
        </div>
        <!-- Table End -->

        <!--Grid row-->
        <div class="row">
            
            <!--Grid column-->
            <div class="col-md-6 mb-4">

                <!-- Add new Comapany -->
                <div class="card">

                    <h5 class="card-header default-color-light white-text py-4">
                        <strong>Add Comapany Name</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-lg-5">

                        <!-- Form -->
                        <form class="text-center" style="color: #757575;" action="http://localhost/pharma/insert.php" method="post">

                            <!-- Company Name -->
                            <div class="md-form mt-3">
                                <input type="text" name="company" id="company" class="form-control" required>
                                <label for="company">Company Name</label>
                            </div>

                            <!-- Insert button -->
                            <button class="btn btn-outline-default btn-rounded btn-block z-depth-1 my-4 waves-effect" type="submit" name="companySubmit" >Insert</button>

                        </form>
                        <!-- Form -->

                    </div>

                </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 mb-4">

                <!-- Add new Drags -->
                <div class="card">

                    <h5 class="card-header default-color-light white-text py-4">
                        <strong>Add Drags Name</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-lg-5">

                        <!-- Form -->
                        <form style="color: #757575;" action="http://localhost/pharma/insert.php" method="post">

                            <!--Company select-->
                            <!-- <label>Select Company</label> -->
                            <select class="mdb-select colorful-select dropdown-primary custom-select" name="serialNumber">
                            <?php
                                $value = 1;
                                while ($rowAgainAllCompany = mysqli_fetch_array($queryAgainAllCompany)) {
                                echo '<option value="'.$rowAgainAllCompany['id'].'" >'.$rowAgainAllCompany['company_name'].'</option>';
                                $value++;
                                }
                            ?>
                            </select>
                            <!--/Company select-->

                            <!-- Drags Name -->
                            <div class="md-form mt-3">
                                <input type="text" name="drag" id="company" class="form-control" required>
                                <label for="company">Drags Name</label>
                            </div>

                            <!-- Insert button -->
                            <button class="btn btn-outline-default btn-rounded btn-block z-depth-1 my-4 waves-effect" type="submit" name="dragSubmit">Insert</button>

                        </form>
                        <!-- Form -->

                    </div>

                </div>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->    

    </main>
    <!--Main layout-->    

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
