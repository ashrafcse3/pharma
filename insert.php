<!-- Add new drugs php code -->
<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "pharmacy";

    // Create connection
    $connection = new mysqli($serverName, $userName, $password, $dbName);

    // Insert drags name with companyId
    if (isset($_POST['dragSubmit'])) {
        $data1 = isset($_POST['serialNumber']) ? $_POST['serialNumber'] : NULL;
        $data2 = isset($_POST['drag']) ? $_POST['drag'] : NULL;

        $sqlDrug = "INSERT INTO drags(c_id, drags_name) VALUES ($data1,'$data2')";
        $queryDrug = mysqli_query($connection, $sqlDrug);

        header("Location: " . "http://localhost/pharma/");
    }
    // Insert Company name
    else if (isset($_POST['companySubmit'])) {
        $data1 = isset($_POST['company']) ? $_POST['company'] : NULL;

        $sqlCompany = "INSERT INTO company(company_name) VALUES ('$data1')";
        $queryCompany = mysqli_query($connection, $sqlCompany);
        
        header("Location: " . "http://localhost/pharma/");
    }
    else { header("Location: " . "http://localhost/pharma/"); }
?>