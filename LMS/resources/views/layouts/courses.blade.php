<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LMS</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="/assets/css/tailwind.output.css" />
     <script src="/assets/js/init-alpine.js"></script> 
    <!-- <script>@yield('js1')</script> THIS IS OLD-->
    
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
     <script src="/assets/js/init-alpine.js"></script> 
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
     <!-- <script src="assets/js/charts-lines.js" defer></script> 
    <script src="assets/js/charts-pie.js" defer></script> -->
      <!-- <style>@yield('css')</style> THIS IS OLD -->
  </head>

  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href=""
          >
            Windmill
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="{{ route('home') }}"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('user.grades') }}"
              >
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
</svg>
                <span class="ml-4">Grades</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="cards.html"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg>
                <span class="ml-4">Attendance</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="charts.html"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
</svg>
                <span class="ml-4">Finances</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('user.courses') }}"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                  ></path>
                </svg>
                <span class="ml-4">Courses</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="#"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg>
                <span class="ml-4">Exam dates</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="tables.html"
              >
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-plus" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
  <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM8 8a.5.5 0 0 1 .5.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5A.5.5 0 0 1 8 8z"/>
</svg>
                <span class="ml-4">Staff weekly schedule</span>
              </a>
            </li>
            @if(Auth::check() && Auth::user()->role == "admin")
            <li class="relative px-6 py-3">
              <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesMenu"
                aria-haspopup="true"
              >
                <span class="inline-flex items-center">
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                    ></path>
                  </svg>
                  <span class="ml-4">Pages</span>
                </span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template x-if="isPagesMenuOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="{{ route('login') }}">Login</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="{{ route('register') }}">
                      Create account
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/forgot-password.html">
                      Forgot password
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/404.html">404</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/blank.html">Blank</a>
                  </li>
                </ul>
              </template>
            </li>
            @endif
          </ul>
          
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            Windmill
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="index.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="forms.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                  ></path>
                </svg>
                <span class="ml-4">Forms</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="cards.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                  ></path>
                </svg>
                <span class="ml-4">Cards</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="charts.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                  ></path>
                  <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                </svg>
                <span class="ml-4">Charts</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="buttons.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                  ></path>
                </svg>
                <span class="ml-4">Buttons</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="modals.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                  ></path>
                </svg>
                <span class="ml-4">Modals</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="tables.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <span class="ml-4">Tables</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesMenu"
                aria-haspopup="true"
              >
                <span class="inline-flex items-center">
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                    ></path>
                  </svg>
                  <span class="ml-4">Pages</span>
                </span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template x-if="isPagesMenuOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/login.html">Login</a>
                  </li> 
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/create-account.html">
                      Create account
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/forgot-password.html">
                      Forgot password
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/404.html">404</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                  <a class="w-full" href="pages/blank.html">Blank</a>
                  </li>
                </ul>
              </template>
            </li>
            
          </ul>
          <div class="px-6 my-6">
            <button
              class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Create account
              <span class="ml-2" aria-hidden="true">+</span>
            </button>
          </div>
        </div>
      </aside>
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <input
                  class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                  type="text"
                  placeholder="Search for projects"
                  aria-label="Search"
                />
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Theme toggler -->
              <li class="flex">
                <button
                  class="rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleTheme"
                  aria-label="Toggle color mode"
                >
                  <template x-if="!dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                  </template>
                  <template x-if="dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </template>
                </button>
              </li>
              <!-- Notifications menu -->
              <li class="relative">
                <button
                  class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleNotificationsMenu"
                  @keydown.escape="closeNotificationsMenu"
                  aria-label="Notifications"
                  aria-haspopup="true"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                    ></path>
                  </svg>
                  <!-- Notification badge -->
                  <span
                    aria-hidden="true"
                    class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"
                  ></span>
                </button>
                <template x-if="isNotificationsMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeNotificationsMenu"
                    @keydown.escape="closeNotificationsMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Messages</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          13
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Sales</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          2
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Alerts</span>
                      </a>
                    </li>
                  </ul>
                </template>
              </li>
              <!-- Profile menu -->
              <li class="relative">
                <button
                  class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                    alt=""
                    aria-hidden="true"
                  />
                </button>
                <template x-if="isProfileMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeProfileMenu"
                    @keydown.escape="closeProfileMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                    aria-label="submenu"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="{{ route('user.profile',auth()->user()) }}"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                          ></path>
                        </svg>
                        <span >{{ auth()->user()->name }}</span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                          ></path>
                          <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Settings</span>
                      </a>
                    </li>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li class="flex">
                      <a href="javascript:{}" onclick="document.getElementById('logoutForm').submit();"
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                      > 
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                          ></path>
                        </svg>
                        
                        <span>Log out</span>    
                        
                      </a>
                    </li>
                    </form>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Courses
            </h2>
            <!-- CTA -->
            <span
              class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
              
            >
              <div class="flex items-center">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>Welcome to courses</span>
              </div>
            </span>
            <!-- Cards -->
           

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">ECTS</th>
                      <th class="px-4 py-3">Total points</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  @if(count($query))
                  @foreach($query as $q)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="data:image/jpeg;base64,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"
                              alt="img of course"
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">{{ $q->name }}</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{ $q->ects }}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{ $q->sum }}
                      </td>
                      
                    </tr>@endforeach
                    @else
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="https://media.istockphoto.com/vectors/question-mark-icon-flat-vector-illustration-design-vector-id1162198273?k=6&m=1162198273&s=612x612&w=0&h=3V-VGVRpaD77MFXao1_ZjoTXI8E2KjOJLYOlbv1DDIs="
                              alt="not found"
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">No records</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        Not defined
                      </td>
                      <td class="px-4 py-3 text-sm">
                        Not defined
                      </td>
                      
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>


