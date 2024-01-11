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
  <nav class="bg-primary static top-0">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="../assets/256x26.png" class="h-12 w-12" alt="Shining RP logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-slate-200">ShiningRP</span>
      </a>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="flex text-sm bg-accent rounded-full md:me-0 focus:ring-4 focus:ring-contrast"
          id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
          data-dropdown-placement="right">
          <img class="w-12 h-12 rounded-full" src="../assets/boombox.jpg" alt="user photo">
        </button>
        <div class="px-4">
          <!-- You can fetch user information dynamically using PHP -->
          <span class="block text-md font-medium text-slate-200">Tormi</span>
          <span class="block text-md font-medium text-slate-200 ">200 coin</span>
        </div>
        <!-- Dropdown menu -->
        <div class="z-50 hidden text-base list-none bg-primary rounded-lg" id="user-dropdown">
          <ul class="py-2" aria-labelledby="user-menu-button">

            <li>
              <a href="#" class="block px-4 py-2 text-sm text-slate-200 hover:bg-contrast">Sign out</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="items-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul
          class="flex flex-col font-medium p-4 md:p-0 mt-4 bg-primary md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 ">
          <li>
            <a href="characters.php"
              class="block py-2 px-3 text-slate-200 text-lg rounded md:hover:text-contrast md:p-0">Karakterid</a>
          </li>
          <li>
            <a href="rules.php"
              class="block py-2 px-3 text-slate-200 text-lg rounded md:hover:text-contrast md:p-0">Reeglid</a>
          </li>
          <li>
            <a href="whitelist-form.php"
              class="block py-2 px-3 text-slate-200 text-lg rounded md:hover:text-contrast md:p-0">Whitelist</a>
          </li>
          <li>
            <a href="shop.php"
              class="block py-2 px-3 text-slate-200 text-lg rounded md:hover:text-contrast md:p-0">Pood</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@X.X.X/dist/flowbite.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>