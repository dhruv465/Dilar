<?php

// Include the common header file
//include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="./src/output.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-50 dark:bg-slate-900">
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <div class="flex justify-center space-x-3 mt-4" data-hs-pin-input>
                        <input type="text" id="pin1" class="block w-[38px] text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" data-hs-pin-input-item autofocus>
                        <input type="text" id="pin2" class="block w-[38px] text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" data-hs-pin-input-item>
                        <input type="text" id="pin3" class="block w-[38px] text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" data-hs-pin-input-item>
                        <input type="text" id="pin4" class="block w-[38px] text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" data-hs-pin-input-item>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        // Function to check if the entered pin is correct
        function verifyPin() {
            var enteredPin = document.getElementById("pin1").value + document.getElementById("pin2").value + document.getElementById("pin3").value + document.getElementById("pin4").value;
            var correctPin = "8520"; // Hardcoded correct pin

            if (enteredPin === correctPin) {
                window.location.href = "../register.php"; // Redirect to register.php if the pin is correct
            } else {
                alert("Incorrect PIN. Please try again.");
                // Clear the input fields for another attempt
                document.getElementById("pin1").value = "";
                document.getElementById("pin2").value = "";
                document.getElementById("pin3").value = "";
                document.getElementById("pin4").value = "";
            }
        }

        // Add event listener to each input field to check for Enter key press
        document.getElementById("pin1").addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                document.getElementById("pin2").focus(); // Move focus to the next input field
            }
        });

        document.getElementById("pin2").addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                document.getElementById("pin3").focus(); // Move focus to the next input field
            }
        });

        document.getElementById("pin3").addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                document.getElementById("pin4").focus(); // Move focus to the next input field
            }
        });

        document.getElementById("pin4").addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                verifyPin(); // Call the verifyPin function when Enter key is pressed in the last input field
            }
        });
    </script>


    <!-- ========== HEADER ========== -->
    <header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 lg:ps-64 dark:bg-gray-800 dark:border-gray-700">
        <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6 md:px-8" aria-label="Global">
            <div class="me-5 lg:me-0 lg:hidden">
                <a class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="Brand">Brand</a>
            </div>

            <div class="w-full flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
                <div class="sm:hidden">
                    <button type="button" class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </button>
                </div>

                <div class="hidden sm:block">
                    <form method="POST" action="" class="flex items-center space-x-4">
                        <label for="search" class="sr-only">Search</label>
                        <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="search_name" name="search_name" value="1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 ps-4">
                                <svg class="flex-shrink-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </div>
                            <input type="text" id="search" name="search" class="py-2 px-4 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Search Username">
                        </div>
                        <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="search_category" name="search_category" value="1">
                        <select name="category" class="py-2 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                            <option value="" selected>Select Category</option>
                            <option value="HDFC Physical">HDFC Physical</option>
                            <option value="HDFC Adobe Pan India">HDFC Adobe Pan India</option>
                            <option value="IDFC Vkyc Old">IDFC Vkyc Old</option>
                            <option value="IDFC Vkyc New">IDFC Vkyc New</option>
                            <option value="LIC">LIC</option>
                            <option value="Loan">Loan</option>
                            <option value="IDFC Drop-Off New">IDFC Drop-Off New</option>
                            <option value="IDFC Drop-Off Old">IDFC Drop-Off Old</option>
                        </select>

                        <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="search_date" name="search_date" value="1">
                        <div date-rangepicker class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                            </div>
                        </div>





                        <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
                    </form>

                </div>

                <div class="flex flex-row items-center justify-end gap-2">
                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">

                        &nbsp; &nbsp;
                        <button id="hs-dropdown-with-header" type="button" class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <img class="inline-block size-[38px] rounded-full ring-2 ring-white dark:ring-gray-800" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description">
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Sidebar Toggle -->
    <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center py-4">
            <!-- Navigation Toggle -->
            <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
            </button>
            <!-- End Navigation Toggle -->
        </div>
    </div>
    <!-- End Sidebar Toggle -->

    <!-- Sidebar -->
    <div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-6">
            <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#" aria-label="Brand">Brand</a>
        </div>

        <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-1.5">
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Dashboard
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->
    <!---
    /////////////////////////////////////////////////
    ////////////////////////////////////////////////
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    /////////////////////////////////////////////////
    ////////////////////////////////////////////////
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    /////////////////////////////////////////////////
    ////////////////////////////////////////////////
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    ----->
    <!-- Chart Section -->

    <?php
    // Database conn
    include 'dbconnection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_date = isset($_POST['search_date']) ? $_POST['search_date'] : null;
        $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : null;
        $search_category = isset($_POST['search_category']) ? $_POST['search_category'] : null;

        // Process the form data and sanitize input
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $search = $conn->real_escape_string($search);

        $category = isset($_POST['category']) ? $_POST['category'] : '';
        $category = $conn->real_escape_string($category);

        $start_date = isset($_POST['start']) ? $_POST['start'] : '';
        $end_date = isset($_POST['end']) ? $_POST['end'] : '';

        // Validate and format date inputs (assuming date format is YYYY-MM-DD)
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        // Query construction based on selected search options
        $query = "SELECT Disposition, COUNT(*) AS Count 
              FROM FormData 
              WHERE 1=1";

        if ($search_name) {
            $query .= " AND username = '$search'";
        }

        if ($search_category) {
            $query .= " AND Category = '$category'";
        }

        if ($search_date) {
            $query .= " AND DispoUpdate BETWEEN '$start_date' AND '$end_date'";
        }

        $query .= " GROUP BY Disposition";

        $result = $conn->query($query);

        // Check if query was successful
        if ($result) {
            // Initialize an array to store the counts
            $counts = array();

            // Fetch counts and store in the array
            while ($row = $result->fetch_assoc()) {
                $counts[$row['Disposition']] = $row['Count'];
            }

            // Display counts in the cards
        } else {
            // Query failed, handle the error
            echo "Error: " . $conn->error;
        }
    } else {
        // Fetch the count of each disposition value for all users
        $query = "SELECT Disposition, COUNT(*) AS Count FROM FormData GROUP BY Disposition";
        $result = $conn->query($query);

        // Check if query was successful
        if ($result) {
            // Initialize an array to store the counts
            $counts = array();

            // Fetch counts and store in the array
            while ($row = $result->fetch_assoc()) {
                $counts[$row['Disposition']] = $row['Count'];
            }

            // Display counts in the cards
        } else {
            // Query failed, handle the error
            echo "Error: " . $conn->error;
        }
    }

    // Close the database conn
    $conn->close();
    ?>





    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

                <!-- Card for Sales -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <!-- Card content here -->
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <!-- Card icon -->
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <!-- Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card">
                                <rect width="20" height="14" x="2" y="5" rx="2" />
                                <line x1="2" x2="22" y1="10" y2="10" />
                            </svg>
                        </div>
                        <!-- Card details -->
                        <div class="grow">
                            <!-- Card title and tooltip -->
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Sales
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Card number -->
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Sales']) ? $counts['Sales'] : 0; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card for Not Interested -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m15 9-6 6" />
                                <path d="m9 9 6 6" />
                            </svg>
                        </div>
                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Not Interested
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Not Interested']) ? $counts['Not Interested'] : 0; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card for Not Interested -->
                <!-- Card -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-forwarded">
                                <polyline points="18 2 22 6 18 10" />
                                <line x1="14" x2="22" y1="6" y2="6" />
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </div>

                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Call Back
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Call Back']) ? $counts['Call Back'] : 0; ?>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                        </div>

                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Wrong Number
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Wrong Number']) ? $counts['Wrong Number'] : 0; ?>
                                </h3>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-headset">
                                <path d="M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z" />
                                <path d="M21 16v2a4 4 0 0 1-4 4h-5" />
                            </svg>
                        </div>

                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Follow-Up
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Follow-Up']) ? $counts['Follow-Up'] : 0; ?>
                                </h3>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-audio-lines">
                                <path d="M2 10v3" />
                                <path d="M6 6v11" />
                                <path d="M10 3v18" />
                                <path d="M14 8v7" />
                                <path d="M18 5v13" />
                                <path d="M22 10v3" />
                            </svg>
                        </div>

                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Ringing
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Ringing']) ? $counts['Ringing'] : 0; ?>
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                        </div>

                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Already Carded
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Already Carded']) ? $counts['Already Carded'] : 0; ?>
                                </h3>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                        </div>

                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Switch Off
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Switch Off']) ? $counts['Switch Off'] : 0; ?>
                                </h3>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                        </div>

                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Disconnect
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Disconnect']) ? $counts['Disconnect'] : 0; ?>
                                </h3>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="p-4 md:p-5 flex gap-x-4">
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#636363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                        </div>

                        <div class="grow">
                            <div class="flex items-center gap-x-2">
                                <p class="text-xs uppercase tracking-wide text-gray-500">
                                    Vkyc Done
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                            <path d="M12 17h.01" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                    <?php echo isset($counts['Vkyc Done']) ? $counts['Vkyc Done'] : 0; ?>
                                </h3>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>



        <!-- End Chart Section -->
        <!---
    /////////////////////////////////////////////////
    ////////////////////////////////////////////////
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    /////////////////////////////////////////////////
    ////////////////////////////////////////////////
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    /////////////////////////////////////////////////
    ////////////////////////////////////////////////
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    ----->

        <!-- Table Section -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                            <!-- Header -->
                            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                        Users

                                    </h2>

                                </div>
                                <?php
                                // Check if a message is passed as a query parameter
                                if (isset($_GET['message'])) {
                                    $message = $_GET['message'];
                                    // Check if the message is a success or an error
                                    $alertClass = strpos($message, 'successfully') !== false ? 'bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500' : 'bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500';
                                    // Display the message with the specified style
                                    echo '<div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 ' . $alertClass . '" role="alert">';
                                    echo '<div class="flex">';
                                    echo '<div class="flex-shrink-0">';
                                    echo '<svg class="flex-shrink-0 size-4 text-blue-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>';
                                    echo '</div>';
                                    echo '<div class="ms-2">';
                                    echo '<div class="text-sm font-medium">';
                                    echo htmlspecialchars($message);
                                    echo '</div>';
                                    echo '</div>';

                                    echo '</div>';
                                    echo '</div>';
                                }
                                ?>


                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <label for="toggle" class="flex items-center cursor-pointer">
                                            <span class="ml-3 text-gray-700 font-medium">Personal Network</span>&nbsp;&nbsp;
                                            <span class="relative">
                                                <input type="checkbox" id="ip-toggle" class="relative w-[3.25rem] h-7 p-px bg-green-500 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                                            </span>
                                            <span class="ml-3 text-gray-700 font-medium">Wifi</span>
                                        </label>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            var isChecked = false;

                                            // Check the IP status on page load
                                            $.ajax({
                                                type: 'GET',
                                                url: 'get_ip_status.php', // Replace this with your server-side script URL to get the IP status
                                                success: function(response) {
                                                    var ipStatus = parseInt(response); // Assuming the server responds with the IP status as a number
                                                    isChecked = ipStatus === 1;
                                                    $('#ip-toggle').prop('checked', isChecked);
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Error getting IP Status:', error);
                                                }
                                            });

                                            $('#ip-toggle').change(function() {
                                                isChecked = $(this).prop('checked');
                                                if (isChecked) {
                                                    promptForPasswordAndToggle();
                                                } else {
                                                    promptForPasswordAndToggle();
                                                }
                                            });

                                            function promptForPasswordAndToggle() {
                                                var password = prompt('Enter password:');
                                                if (password !== null && password.trim() === 'proteinshake@2023') {
                                                    updateIPStatus(isChecked ? 1 : 0);
                                                } else {
                                                    alert('Incorrect password. Please try again.');
                                                    $('#ip-toggle').prop('checked', !isChecked); // Revert checkbox state
                                                }
                                            }

                                            function updateIPStatus(status) {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'update_ip_status.php', // Replace this with your server-side script URL
                                                    data: {
                                                        ipStatus: status
                                                    },
                                                    success: function(response) {
                                                        console.log('IP Status updated successfully');
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.error('Error updating IP Status:', error);
                                                    }
                                                });
                                            }
                                        });
                                    </script>




                                    &nbsp;
                                    <div class="inline-flex gap-x-2" data-modal-target="medium-modal" data-modal-toggle="medium-modal">
                                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#"><!--- ../register.php" Add user button -->

                                            Update Password
                                        </a>
                                    </div>
                                    <div class="inline-flex gap-x-2" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#"><!--- ../register.php" Add user button -->
                                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            Add user
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->
                            <div id="medium-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-lg max-h-full">
                                    <!-- Modal content -->
                                    <main class="w-full max-w-md mx-auto p-6">


                                        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                            <div class="p-4 sm:p-7">
                                                <div class="text-center">
                                                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Forgot password?</h1>

                                                </div>

                                                <div class="mt-5">
                                                    <!-- Form -->
                                                    <form method="POST" action="update_password.php" id="update-password-form">
                                                        <div class="grid gap-y-4">
                                                            <!-- Username -->
                                                            <div>
                                                                <label for="username" class="block text-sm mb-2 dark:text-white">Username</label>
                                                                <input type="text" id="username" name="username" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required>
                                                            </div>
                                                            <!-- End Username -->

                                                            <!-- New Password -->
                                                            <div>
                                                                <label for="new_password" class="block text-sm mb-2 dark:text-white">New Password</label>
                                                                <div class="relative">
                                                                    <input type="password" id="new_password" name="new_password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="new_password_error">
                                                                </div>
                                                            </div>
                                                            <!-- End New Password -->

                                                            <!-- Confirm Password -->
                                                            <div>
                                                                <label for="confirm_password" class="block text-sm mb-2 dark:text-white">Confirm New Password</label>
                                                                <input type="password" id="confirm_password" name="confirm_password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="confirm_password_error">
                                                            </div>
                                                            <!-- End Confirm Password -->
                                                            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Reset password</button>
                                                        </div>
                                                    </form>
                                                    <!-- End Form -->

                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                </div>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const updateButtons = document.querySelectorAll('.update-password-btn');
                                    const modalForm = document.querySelector('#update-password-form');
                                    const userIdInput = document.querySelector('#user_id');

                                    updateButtons.forEach(button => {
                                        button.addEventListener('click', function() {
                                            const userId = button.dataset.userid;
                                            console.log('User ID:', userId); // Log the user ID to the console

                                            // Set the user ID in the hidden input field of the modal form
                                            userIdInput.value = userId;

                                            // Open or show the modal
                                            const modal = document.querySelector(button.dataset.modalTarget);
                                            modal.classList.add('open');
                                        });
                                    });

                                    // Optional: Close the modal when the form is submitted
                                    modalForm.addEventListener('submit', function() {
                                        const modal = document.querySelector('#medium-modal');
                                        modal.classList.remove('open');
                                    });
                                });
                            </script>


                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-slate-800">
                                    <tr>
                                        <th scope="col" class="ps-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    userid
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Username
                                                </span>
                                            </div>
                                        </th>

                                        <!-- <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Password
                                                </span>
                                            </div>
                                        </th> -->

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Status
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Force Log Out
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Created
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-end"></th>
                                    </tr>
                                </thead>

                                <?php
                                include('dbconnection.php');
                                $query = "SELECT * FROM Users";
                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    echo '    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">';
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td class="size-px whitespace-nowrap">';
                                        echo '<div class="px-6 py-3">';
                                        echo          '<span class="text-sm text-gray-500">' . $row['UserID'] . '</span>';
                                        echo      '</div>';
                                        echo '</td>';
                                        echo '<td class="size-px whitespace-nowrap">';
                                        echo '<div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">';
                                        echo '<div class="flex items-center gap-x-3">';

                                        echo '<div class="grow">';
                                        echo '<span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">' . $row['Username'] . '</span>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</td>';

                                        // echo '<td class="h-px w-72 whitespace-nowrap">';
                                        // echo '<div class="px-6 py-3">';
                                        // echo '<span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">';
                                        // echo '<button data-userid="' . $userId . '" data-modal-target="medium-modal" data-modal-toggle="medium-modal" class="bg-blue-700 p-2 text-white rounded-xl update-password-btn">Update Password</button>';
                                        // echo '</span>';
                                        // echo '</div>';
                                        // echo '</td>';


                                        echo '<td class="size-px whitespace-nowrap">';
                                        echo '<div class="px-6 py-3">';
                                        echo '<span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium ';
                                        if ($row['SessionActive'] == 1) {
                                            echo 'bg-teal-100 text-teal-800';
                                        } else {
                                            echo 'bg-red-100 text-red-800';
                                        }
                                        echo ' rounded-full dark:bg-teal-500/10 dark:text-teal-500">';
                                        echo '<svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">';
                                        echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />';
                                        echo '</svg>';
                                        if ($row['SessionActive'] == 1) {
                                            echo 'Active';
                                        } else {
                                            echo 'Inactive';
                                        }
                                        echo '</span>';
                                        echo '</div>';
                                        echo '</td>';

                                        echo '<td class="size-px whitespace-nowrap">';
                                        echo '<div class="px-6 py-3">';
                                        echo '<div class="flex items-center">';
                                        // Check if SessionActive is 1, then set the checkbox as checked
                                        if ($row['SessionActive'] == 1) {
                                            echo '<input type="checkbox" id="hs-xs-switch" data-userid="' . $row['UserID'] . '" class="relative w-[35px] h-[21px] bg-gray-300 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-none disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-4 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200" checked>';
                                        } else {
                                            echo '<input type="checkbox" id="hs-xs-switch" data-userid="' . $row['UserID'] . '" class="relative w-[35px] h-[21px] bg-gray-300 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-none disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-4 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">';
                                        }
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</td>';


                                        echo   '<td class="size-px whitespace-nowrap">';
                                        echo      '<div class="px-6 py-3">';
                                        echo          '<span class="text-sm text-gray-500">' . $row['RegistrationDate'] . '</span>';
                                        echo      '</div>';
                                        echo  '</td>';
                                        echo '<td class="size-px whitespace-nowrap">';
                                        echo '<div class="px-6 py-1.5">';
                                        echo '<a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Edit</a>';
                                        echo '</div>';
                                        echo '</td>';

                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                mysqli_close($conn);
                                ?>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const hardcodedPassword = '1234'; // Hardcoded password for validation

                    // Select all buttons with the data-modal-target attribute
                    const updatePasswordBtns = document.querySelectorAll('[data-modal-target="medium-modal"]');
                    updatePasswordBtns.forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault(); // Prevent the default behavior of the button

                            // Ask for password validation before showing the modal
                            const enteredPassword = prompt('Please enter your password:');
                            if (enteredPassword === hardcodedPassword) {
                                // If the entered password matches the hardcoded password, show the modal
                                const modal = document.getElementById('medium-modal');
                                modal.classList.remove('hidden'); // Show the modal
                                modal.focus(); // Set focus to the modal
                            } else {
                                alert('Incorrect password. Redirecting to dashboard...');
                                window.location.href = 'dashboard.php'; // Redirect to dashboard.php
                            }
                        });
                    });
                });
            </script>
        </div>
        <!-- End Table Section -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hardcodedPin = '1234'; // Hardcoded PIN for validation

            const checkboxes = document.querySelectorAll('#hs-xs-switch');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('click', function() {
                    const userID = this.getAttribute('data-userid');
                    // Ask for PIN validation before toggling the checkbox
                    const enteredPin = prompt('Please enter your PIN:');
                    if (enteredPin === hardcodedPin) {
                        // If the entered PIN matches the hardcoded PIN, proceed with toggling the checkbox
                        const isChecked = this.checked ? 1 : 0;
                        toggleSessionActive(userID, isChecked);
                    } else {
                        alert('Invalid PIN. Access denied.');
                        // Uncheck the checkbox to revert the change
                        this.checked = !this.checked;
                    }
                });
            });

            function toggleSessionActive(userID, isChecked) {
                // Send AJAX request to update SessionActive value in the database
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_session_active.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle response from the server if needed
                        console.log(xhr.responseText);
                    }
                };
                xhr.send(`userID=${userID}&isChecked=${isChecked}`);
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>