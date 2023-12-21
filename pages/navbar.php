<html>

<head>
  <link href="../styles/output.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>

    const $targetEl = document.getElementById('targetEl');
    const $triggerEl = document.getElementById('triggerEl');

    const instanceOptions = {
      id: 'targetEl',
      override: true
    };

    const collapse = new Collapse($targetEl, $triggerEl, options, instanceOptions);
    collapse.toggle();

  </script>
</head>

<body>
  <nav class="bg-primary">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="../assets/sls_logo.png" class="h-12 w-12" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">ShiningRP</span>
      </a>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-accent"
          id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
          data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="../assets/boombox.jpg" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-primary divide-y divide-gray-100 rounded-lg shadow"
          id="user-dropdown">
          <div class="px-4 py-3">
            <!-- You can fetch user information dynamically using PHP -->
            <span class="block text-sm text-white ">Bonnie Green</span>
            <span class="block text-sm  text-white truncate">name@flowbite.com</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-contrast">Profile</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-contrast">Settings</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-contrast">Sign out</a>
            </li>
          </ul>
        </div>
        <button data-collapse-toggle="navbar-user" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-contrast focus:outline-none focus:ring-2 focus:ring-accent"
          aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul
          class="flex flex-col font-medium p-4 md:p-0 mt-4 bg-primary md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
          <li>
            <a href="characters.php"
              class="block py-2 px-3 text-white rounded md:hover:text-contrast md:p-0">Karakterid</a>
          </li>
          <li>
            <a href="rules.php" class="block py-2 px-3 text-white rounded md:hover:text-contrast md:p-0">Reeglid</a>
          </li>
          <li>
            <a href="whitelist-form.php"
              class="block py-2 px-3 text-white rounded md:hover:text-contrast md:p-0">Whitelist</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-white rounded md:hover:text-contrast md:p-0">Pood</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-white rounded md:hover:text-contrast md:p-0">Kontakt</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@X.X.X/dist/flowbite.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>