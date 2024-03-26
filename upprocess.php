<?php
$response_msg = ''; // Initialize $response_msg

include('./dbconnection.php');

// Initialize status variable
$status = '';

if (isset($_POST['save_excel_data'])) {
    // Check if a file was uploaded
    if ($_FILES['import_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['import_file']['tmp_name'])) {
        $fileName = $_FILES['import_file']['name'];
        $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

        // Check if the uploaded file is a CSV file
        if ($file_ext == 'csv') {
            $inputFileNamePath = $_FILES['import_file']['tmp_name'];

            $file = fopen($inputFileNamePath, "r");

            // Skip the header row
            fgetcsv($file);

            // Initialize arrays to track the number of records assigned to each user and each category
            $records_per_user = array();
            $records_per_category = array();

            while (($row = fgetcsv($file, 0, ",")) !== false) {
                $name = mysqli_real_escape_string($conn, $row[0]);
                $mobile = mysqli_real_escape_string($conn, $row[1]);
                $city = mysqli_real_escape_string($conn, $row[2]);
                $lang = mysqli_real_escape_string($conn, $row[3]);
                $pan = mysqli_real_escape_string($conn, $row[4]);
                $category = mysqli_real_escape_string($conn, $row[5]);

                // Store data in an array without assigning to users
                $data[] = array(
                    'Name' => $name,
                    'Mobile' => $mobile,
                    'City' => $city,
                    'Language' => $lang,
                    'PAN' => $pan,
                    'Category' => $category
                );
            }

            fclose($file);

            // Insert data into the database
            foreach ($data as $record) {
                $name = $record['Name'];
                $mobile = $record['Mobile'];
                $city = $record['City'];
                $lang = $record['Language'];
                $pan = $record['PAN'];
                $category = $record['Category'];

                $sql = "INSERT INTO FormData (Name, Mobile, City, Language, PAN, Category) VALUES ('$name', '$mobile', '$city', '$lang', '$pan', '$category')";

                if (mysqli_query($conn, $sql)) {
                    $status = 'success';
                } else {
                    $status = 'error';
                    break;
                }
            }

            // Redirect to the upload.php page with success or error status
            if ($status === 'success') {
                $response_msg = 'CSV file uploaded successfully.';
            } else {
                $response_msg = 'Error occurred during data insertion.';
            }
            header('Location: upload.php?status=' . $status . '&msg=' . $response_msg);
            exit();
        } else {
            // Invalid file type
            $status = 'invalid';
            $response_msg = 'Invalid file type. Please upload a CSV file.';
        }
    } else {
        // No file uploaded
        $status = 'no_file_uploaded';
        $response_msg = 'No CSV file uploaded. Please select a file to upload.';
    }

    // Redirect to the upload.php page with the appropriate status
    header('Location: upload.php?status=' . $status . '&msg=' . $response_msg);
    exit();
}
