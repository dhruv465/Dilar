<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

  <title>Register User</title>
</head>

<body class="dark:bg-slate-900 bg-gray-100 flex h-full items-center py-16">
  <?php
  // Start a session to store messages
  session_start();

  // Your database configuration
  include('./dbconnection.php');

  // Initialize response message variable
  $response_msg = '';

  // Check if the form has been submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Collect form data
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm-password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
      $response_msg = '<div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
                    <div class="flex">
                      <div class="flex-shrink-0">
                        <svg class="flex-shrink-0 size-4 text-red-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                      </div>
                      <div class="ms-2">
                        <div class="text-sm font-medium">
                          Passwords do not match.
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
      // Hash the password using bcrypt
      $hashed_password = password_hash($password, PASSWORD_BCRYPT);

      // Use prepared statements to prevent SQL injection
      $query = 'INSERT INTO Users (Username, Email, Password) VALUES (?, ?, ?)';
      $stmt = mysqli_prepare($conn, $query);

      // Bind parameters and execute the statement
      mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashed_password);

      if (mysqli_stmt_execute($stmt)) {
        // Registration success
        $response_msg = '<div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
                        <div class="flex">
                          <div class="flex-shrink-0">
                            <svg class="flex-shrink-0 size-4 text-blue-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                          </div>
                          <div class="ms-2">
                            <div class="text-sm font-medium">
                              Registration successful. You can now log in.
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
        // Registration failed
        $response_msg = '<div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
                        <div class="flex">
                          <div class="flex-shrink-0">
                            <svg class="flex-shrink-0 size-4 text-red-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                          </div>
                          <div class="ms-2">
                            <div class="text-sm font-medium">
                              Registration failed. Please try again.
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
  ?>

  <main class="w-full max-w-md mx-auto p-6">
    <!-- Response Message -->
    <?php echo $response_msg; ?>
    <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Already have an account?
            <a class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="index.php">
              Sign in here
            </a>
          </p>
        </div>
        <br>

        <!-- Form -->
        <form method="POST">
          <div class="grid gap-y-4">
            <!-- Form Group -->
            <div>
              <label for="username" class="block text-sm mb-2 dark:text-white">Username</label>
              <input type="text" id="username" name="username" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="JohnD" required>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div>
              <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
              <input type="email" id="email" name="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="lO6yZ@example.com" required>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div>
              <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
              <input type="password" id="password" name="password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="••••••••" required>

            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div>
              <label for="confirm-password" class="block text-sm mb-2 dark:text-white">Confirm Password</label>
              <input type="password" id="confirm-password" name="confirm-password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="••••••••" required>
            </div>
            <!-- End Form Group -->

            <button type="submit" name="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign up</button>
          </div>
        </form>
      </div>
    </div>

  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>