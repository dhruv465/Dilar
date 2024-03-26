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
</head>

<body class="bg-gray-50 dark:bg-slate-900">
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
                    <form method="POST" action="">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                                <svg class="flex-shrink-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </div>
                            <input type="text" id="search" name="search" class="py-2 px-4 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Search">

                        </div>

                    </form>
                </div>

                <div class="flex flex-row items-center justify-end gap-2">
                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
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

            <!-- Breadcrumb -->
            <ol class="ms-3 flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                <li class="flex items-center text-sm text-gray-800 dark:text-gray-400">
                    Application Layout
                    <svg class="flex-shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-400" aria-current="page">
                    Dashboard
                </li>
            </ol>
            <!-- End Breadcrumb -->
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
        // Process the form data and sanitize input
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $search = $conn->real_escape_string($search);

        // Query to fetch counts for the searched username
        $query = "SELECT Disposition, COUNT(*) AS Count FROM FormData WHERE Username = '$search' GROUP BY Disposition";
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
                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
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
                                                    <form>
                                                        <div class="grid gap-y-4">
                                                            <!-- Form Group -->
                                                            <div>
                                                                <label for="text" class="block text-sm mb-2 dark:text-white">New Password</label>
                                                                <div class="relative">
                                                                    <input type="text" id="text" name="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="email-error">
                                                                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

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

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Password
                                                </span>
                                            </div>
                                        </th>

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

                                        echo '<td class="h-px w-72 whitespace-nowrap">';
                                        echo '<div class="px-6 py-3">';
                                        echo '<span class="block text-sm font-semibold text-gray-800 dark:text-gray-200 ">';
                                        echo '<button data-modal-target="medium-modal" data-modal-toggle="medium-modal" class="bg-blue-700 p-2 text-white rounded-xl ">Update Password</button>';
                                        echo '</span>';
                                        echo '</div>';
                                        echo '</td>';
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
        </div>
        <!-- End Table Section -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('#hs-xs-switch');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('click', function() {
                    const userID = this.getAttribute('data-userid');
                    const isChecked = this.checked ? 1 : 0;
                    updateSessionActive(userID, isChecked);
                });
            });

            function updateSessionActive(userID, isChecked) {
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>