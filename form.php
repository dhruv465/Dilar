<?php
// Include the common header file
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>

<body>

  <!-- Main modal -->
  <div class="relative z-10 mt-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity dark:bg-slate-900"></div>
    <div class="inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white border border-gray-200 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg dark:bg-gray-800 dark:border-gray-700">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 dark:bg-gray-800 dark:border-gray-700">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white" id="modal-title">Customer Data Portal</h3>
                <!-- <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
              </div> -->
              </div>
            </div>
          </div>

          <div class="p-4 md:p-5 mt-4">
            <p class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-2">Connect with one of our available wallet providers or create a new one.</p>
            <?php
            // Include your database configuration
            include('./dbconnection.php');

            // Initialize response message variable
            $response_msg = '';

            // Check if the form has been submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
              // Collect form data
              $disposition = htmlspecialchars($_POST['disposition']);
              $data_id = htmlspecialchars($_POST['data_id']);

              // Fetch username from session
              //session_start();
              $username = $_SESSION['username'] ?? '';

              // Check if the disposition is empty
              if (empty($disposition)) {
                // Set error message
                $response_msg = '<div id="dismiss-alert" class="response-msg hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="flex-shrink-0 size-4 text-red-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <div class="ms-2">
                    <div class="text-sm font-medium">
                        Please select a disposition.
                    </div>
                </div>
                <div class="ps-3 ms-auto">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600 dark:bg-transparent dark:hover:bg-red-800/50 dark:text-red-600" data-hs-remove-element="#dismiss-alert">
                            <span class="sr-only">Dismiss</span>
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>';
              } else {
                // Get the current date and time
                $current_date = date('Y-m-d H:i:s');

                // Update the disposition, username, and disposition updated date in the database for the specific data ID
                $query_update_disposition = "UPDATE FormData SET Disposition = ?, DispoUpdate = ?, Username = ? WHERE DataID = ?";
                $stmt_update_disposition = mysqli_prepare($conn, $query_update_disposition);
                mysqli_stmt_bind_param($stmt_update_disposition, 'sssi', $disposition, $current_date, $username, $data_id);

                if (mysqli_stmt_execute($stmt_update_disposition)) {
                  // Success message
                  $response_msg = '<div id="dismiss-alert" class="response-msg hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="flex-shrink-0 size-4 text-blue-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <div class="ms-2">
                        <div class="text-sm font-medium">
                            Disposition updated successfully.
                        </div>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="#dismiss-alert">
                                <span class="sr-only">Dismiss</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>';
                } else {
                  // Error message
                  $response_msg = '<div id="dismiss-alert" class="response-msg hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="flex-shrink-0 size-                            .0 text-red-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                        </div>
                        <div class="ms-2">
                            <div class="text-sm font-medium">
                                Error updating disposition.
                            </div>
                        </div>
                        <div class="ps-3 ms-auto">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600 dark:bg-transparent dark:hover:bg-red-800/50 dark:text-red-600" data-hs-remove-element="#dismiss-alert">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>';
                }
              }
            }

            // Get the user ID and filter category from the URL parameters
            $userID = isset($_GET['userID']) ? $_GET['userID'] : '';
            $filterCategory = isset($_GET['filter']) ? $_GET['filter'] : '';

            if (!empty($userID) && !empty($filterCategory)) {
              // Fetch data for the user with the selected filter category
              $query_fetch_data = "SELECT DataID, Name, Mobile, City, Language, PAN, Category FROM FormData WHERE UserID = ? AND Disposition IS NULL AND Category = ? LIMIT 1";
              $stmt_fetch_data = mysqli_prepare($conn, $query_fetch_data);
              mysqli_stmt_bind_param($stmt_fetch_data, 'is', $userID, $filterCategory);
              mysqli_stmt_execute($stmt_fetch_data);
              $result = mysqli_stmt_get_result($stmt_fetch_data);

              // Check if there is any data available
              if ($row = mysqli_fetch_assoc($result)) {
                // Populate form fields with fetched data
                $data_id = $row['DataID'];
                $name = $row['Name'];
                $mobile = $row['Mobile'];
                $city = $row['City'];
                $language = $row['Language'];
                $pan = $row['PAN'];
                $prdcat = $row['Category'];
              } else {
                // Set the error message
                $response_msg = '<div id="dismiss-alert" class="response-msg hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="flex-shrink-0 size-4 text-red-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <div class="ms-2">
                        <div class="text-sm font-medium">
                            No data available for the selected category. 
                            <a href="modal.php" class="underline">Get new data</a>
                        </div>
                    </div>
                </div>
            </div>';
              }
            } else {
              // Set the error message if userID or filterCategory is not provided
              $response_msg = '<div id="dismiss-alert" class="response-msg hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="flex-shrink-0 size-4 text-red-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <div class="ms-2">
                    <div class="text-sm font-medium">
                    User ID or filter category not provided.
                    </div>
                </div>
            </div>
        </div>';
            }

            ?>



            <!-- Display response message -->
            <?php echo $response_msg; ?>

            <!-- Display the form -->
            <?php if ($row) : ?>
              <form action="#" method="POST" class="mt-2">
                <input type="hidden" name="data_id" value="<?php echo $data_id; ?>"> <!-- Hidden field to store DataID -->

                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                  <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                  </div>
                  <div>
                    <label for="mobileno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile No</label>
                    <div class="flex items-center">
                      <div class="relative w-full">
                        <input type="tel" name="mobileno" id="mobileno" value="<?php echo $mobile; ?>" class="bg-gray-50 border border-e-0 border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                      </div>
                      <button id="copy-number" class="flex-shrink-0 z-10 inline-flex items-center py-3 px-4 text-sm font-medium text-center text-gray-500 dark:text-gray-400 hover:text-gray-900 bg-gray-100 border border-gray-300 rounded-e-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:hover:text-white dark:border-gray-600" type="button" onclick="openPhoneApp()">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z" />
                        </svg>
                      </button>

                    </div>
                  </div>
                  <div>
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <input type="text" value="<?php echo $city; ?>" name="City" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                  </div>
                  <div>
                    <label for="language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Language</label>
                    <input type="text" value="<?php echo $language; ?>" name="Language" id="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                  </div>
                  <div>
                    <label for="pan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pan</label>
                    <input type="text" value="<?php echo $pan; ?>" name="Pan" id="pan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                  </div>
                  <div>
                    <label for="prdcat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <input type="text" value="<?php echo $prdcat; ?>" name="Prdcat" id="prdcat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                  </div>
                  <div>
                    <label for="disposition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disposition</label>
                    <select id="disposition" name="disposition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option selected disabled>Select an option</option>
                      <option value="Sales">Sales</option>
                      <option value="Not Interested">Not Interested</option>
                      <option value="Call Back">Call Back</option>
                      <option value="Wrong Number">Wrong Number</option>
                      <option value="Follow-Up">Follow-Up</option>
                      <option value="Ringing">Ringing</option>
                      <option value="Vkyc Done">Vkyc Done</option>
                      <option value="Not Eligible">Not Eligible</option>
                      <option value="Switch Off">Switch Off</option>
                      <option value="Already Carded">Already Carded</option>
                      <option value="Disconnect">Disconnect</option>
                    </select>
                  </div>

                </div>
                <br>
                <div class="flex items-center space-x-4">
                  <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update Data
                  </button>
                  <!-- <button type="button" class="text-red-600 inline-flex items-center hover:text-red-600 border border-red-600 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg class="mr-1 -ml-1 w-5 h-5 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                        </svg>
                        Refresh
                      </button> -->
                </div>
              <?php endif; ?>
              </form>
              <div>
              </div>
          </div>
        </div>
      </div>
      <br><br><br>
      <div class="fixed bottom-0 z-50 w-full -translate-x-1/2 bg-white border-t border-gray-200 left-1/2 dark:bg-gray-700 dark:border-gray-600">

        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
          <a href="home.php"> <button type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
              <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd" />
              </svg>
              <span class="sr-only">Home</span>
            </button>
          </a>

          <a href="bucket.php"> <button data-tooltip-target="tooltip-bookmark" type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
              <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd" />
              </svg>

              <span class="sr-only">Customer Data</span>
            </button></a>

          <a href="upload.php"> <button data-tooltip-target="tooltip-post" type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
              <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd" />
              </svg>

              <span class="sr-only">Upload Data</span>
            </button></a>

          <a href="#"> <button data-tooltip-target="tooltip-search" type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
              <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd" />
              </svg>
              <span class="sr-only">file</span>
            </button>
          </a>

          <a href="logout.php"><button data-tooltip-target="tooltip-settings" type="button" class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
              <svg class="w-[30px] h-[30px] mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
              </svg>
              <span class="sr-only">Log out</span>
            </button></a>

        </div>
      </div>
      <script>
        function openPhoneApp() {
          var phoneNumber = document.getElementById('mobileno').value;
          if (phoneNumber) {
            window.location.href = 'tel:' + phoneNumber;
          }
        }
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
      <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>