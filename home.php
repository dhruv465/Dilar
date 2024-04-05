<?php

// Include the common header file
include 'header.php';

include('ip_check.php');
checkIPAllowed();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>

<body>
    <?php
    // Include the PHP file
    include('upprocess.php');
    ?>
    <?php
   

    // Check if UserID is set in the session
    if (isset($_SESSION['userID'])) {
        $userid = $_SESSION['userID'];

        // Include the db file
        include('dbconnection.php');

        // Query to fetch counts for each disposition type for the specific user
        $sql = "SELECT 
              SUM(CASE WHEN `Disposition` = 'Sales' THEN 1 ELSE 0 END) AS SalesCount,
              SUM(CASE WHEN `Disposition` = 'Not Interested' THEN 1 ELSE 0 END) AS NotInterestedCount,
              SUM(CASE WHEN `Disposition` = 'Call Back' THEN 1 ELSE 0 END) AS CallBackCount,
              SUM(CASE WHEN `Disposition` = 'Wrong Number' THEN 1 ELSE 0 END) AS WrongNumberCount,
              SUM(CASE WHEN `Disposition` = 'Follow-Up' THEN 1 ELSE 0 END) AS FollowUpCount,
              SUM(CASE WHEN `Disposition` = 'Ringing' THEN 1 ELSE 0 END) AS RingingCount
          FROM `FormData`
          WHERE `UserID` = $userid";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data for each disposition
            $row = $result->fetch_assoc();
            $salesCount = $row['SalesCount'];
            $notInterestedCount = $row['NotInterestedCount'];
            $callBackCount = $row['CallBackCount'];
            $wrongNumberCount = $row['WrongNumberCount'];
            $followUpCount = $row['FollowUpCount'];
            $ringingCount = $row['RingingCount'];
        } else {
            echo "No data found.";
        }

        $conn->close();
    } else {
        // UserID is not set in the session, handle this case (e.g., redirect to login page)
        header("Location: login.php");
        exit();
    }
    ?>

    <div class="relative z-10 mt-20" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity dark:bg-slate-900"></div>
        <div class="inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 ">
                <div class="relative transform overflow-hidden rounded-lg bg-white border border-gray-200 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg dark:bg-gray-800 dark:border-gray-700">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">

                                <svg class="w-6 h-6 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v15a1 1 0 0 0 1 1h15M8 16l2.5-5.5 3 3L17.273 7 20 9.667" />
                                </svg>

                            </div>

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left ">
                                <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white" id="modal-title">Chart</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">The performance chart illustrates your progress and achievements effectively.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                        <!-- Grid -->
                        <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Card -->
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                                <div class="p-4 md:p-5">
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
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700" role="tooltip">
                                                    The number of daily users
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-1 flex items-center gap-x-2">
                                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                                            <!-- add the dynamic Sales count from the db -->
                                            <?php echo $salesCount; ?>
                                        </h3>
                                        <!-- <span class="flex items-center gap-x-1 text-green-600">
                                            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                                                <polyline points="16 7 22 7 22 13" />
                                            </svg>
                                            <span class="inline-block text-sm">
                                                1.7%
                                            </span>
                                        </span> -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->

                            <!-- Card -->
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                                <div class="p-4 md:p-5">
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
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700" role="tooltip">
                                                    The number of daily users
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-1 flex items-center gap-x-2">
                                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                                            <!-- Add the Not Intrested Disposation from the db to that only specific user -->
                                            <?php echo $notInterestedCount; ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->

                            <!-- Card -->
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                                <div class="p-4 md:p-5">
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
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700" role="tooltip">
                                                    The number of daily users
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-1 flex items-center gap-x-2">
                                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                                            <!-- Add the Call Back Disposation from the db to that only specific user -->
                                            <?php echo $callBackCount ; ?>
                                        </h3>

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->

                            <!-- Card -->
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                                <div class="p-4 md:p-5">
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
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700" role="tooltip">
                                                    The number of daily users
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-1 flex items-center gap-x-2">
                                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                                            <!-- Add the Wrong Number Disposation from the db to that only specific user -->
                                            <?php echo $wrongNumberCount ; ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                            <!-- Card -->
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                                <div class="p-4 md:p-5">
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
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700" role="tooltip">
                                                    The number of daily users
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-1 flex items-center gap-x-2">
                                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                                            <!-- Add the Follow Up Disposation from the db to that only specific user -->
                                            <?php echo $followUpCount ; ?>
                                        </h3>

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->

                            <!-- Card -->
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                                <div class="p-4 md:p-5">
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
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700" role="tooltip">
                                                    The number of daily users
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-1 flex items-center gap-x-2">
                                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                                            <!-- Add the Ringining Disposation from the db to that only specific user -->
                                            <?php echo $ringingCount ; ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Grid -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- Bottom Navigation -->
    <div class="fixed bottom-0 z-50 w-full -translate-x-1/2 bg-white border-t border-gray-200 left-1/2 dark:bg-gray-700 dark:border-gray-600">

        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
            <a href="home.php"> <button type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group" >
                    <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Home</span>
                </button>
            </a>

            <a href="bucket.php"> <button type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd" />
                    </svg>

                    <span class="sr-only">Customer Data</span>
                </button></a>

            <a href="upload.php"> <button type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd" />
                    </svg>

                    <span class="sr-only">Upload Data</span>
                </button></a>

            <a href="modal.php"> <button type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">file</span>
                </button>
            </a>

            <a href="logout.php"><button type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                    </svg>
                    <span class="sr-only">Log out</span>
                </button></a>

        </div>
    </div>
    <script>
        window.addEventListener('beforeunload', function(e) {
            // Display the alert message
            var confirmationMessage = 'Are you sure you want to leave? Please log out first to ensure your data is saved.';
            e.returnValue = confirmationMessage;
            return confirmationMessage;
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>