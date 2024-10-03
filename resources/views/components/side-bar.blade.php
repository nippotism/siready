<aside id="sidebar" class="fixed w-52 top-0 left-0 z-20 font-poppins flex flex-col flex-shrink-0 sm:hidden h-full pt-12 font-normal duration-75 lg:flex transition-width" aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-blek-800 dark:border-gray-700">
      <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
        <div class="flex-1 px-3 space-y-1 divide-y divide-gray-200 dark:divide-gray-700">
          <ul class="pb-2 text-sm space-y-2">
            <li>
              <form action="#" method="GET" class="lg:hidden">
                <label for="mobile-search" class="sr-only">Search</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                  </div>
                  <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
                </div>
              </form>
            </li>
            <li>
              <img src="{{ asset('profile.png') }}" class="rounded-full flex mx-auto" width="100" alt="">
            </li>
            <ul class=" font-semibold text-base text-center p-2 text-gray-900 rounded-lg dark:text-gray-200 tracking-normal"> 
                <li>{{ $user->name }}</li>
                <li>1973893374432</li>
            </ul>
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">  
            @props(['active'])
            <li>
              <a href="/dashboard" class="{{ $active==='dashboard' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">
                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M5 3a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5Zm14 18a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4ZM5 11a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H5Zm14 2a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4Z"/>
                </svg>                
                <span class="ml-3" sidebar-toggle-item>Dashboard</span>
              </a>
            </li>
            @if($user->pa == 1)
                <li>
                <a href= "/ajuanIrs" class="{{ $active==='ajuanIrs' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path clip-rule="evenodd" fill-rule="evenodd" d="M8.34 1.804A1 1 0 019.32 1h1.36a1 1 0 01.98.804l.295 1.473c.497.144.971.342 1.416.587l1.25-.834a1 1 0 011.262.125l.962.962a1 1 0 01.125 1.262l-.834 1.25c.245.445.443.919.587 1.416l1.473.294a1 1 0 01.804.98v1.361a1 1 0 01-.804.98l-1.473.295a6.95 6.95 0 01-.587 1.416l.834 1.25a1 1 0 01-.125 1.262l-.962.962a1 1 0 01-1.262.125l-1.25-.834a6.953 6.953 0 01-1.416.587l-.294 1.473a1 1 0 01-.98.804H9.32a1 1 0 01-.98-.804l-.295-1.473a6.957 6.957 0 01-1.416-.587l-1.25.834a1 1 0 01-1.262-.125l-.962-.962a1 1 0 01-.125-1.262l.834-1.25a6.957 6.957 0 01-.587-1.416l-1.473-.294A1 1 0 011 10.68V9.32a1 1 0 01.804-.98l1.473-.295c.144-.497.342-.971.587-1.416l-.834-1.25a1 1 0 01.125-1.262l.962-.962A1 1 0 015.38 3.03l1.25.834a6.957 6.957 0 011.416-.587l.294-1.473zM13 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="ml-3" href sidebar-toggle-item>Ajuan IRS</span>
                </a>
              </li>
              <li>
                <a href= "/p/perwalian" class="{{ $active==='perwalian' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path clip-rule="evenodd" fill-rule="evenodd" d="M8.34 1.804A1 1 0 019.32 1h1.36a1 1 0 01.98.804l.295 1.473c.497.144.971.342 1.416.587l1.25-.834a1 1 0 011.262.125l.962.962a1 1 0 01.125 1.262l-.834 1.25c.245.445.443.919.587 1.416l1.473.294a1 1 0 01.804.98v1.361a1 1 0 01-.804.98l-1.473.295a6.95 6.95 0 01-.587 1.416l.834 1.25a1 1 0 01-.125 1.262l-.962.962a1 1 0 01-1.262.125l-1.25-.834a6.953 6.953 0 01-1.416.587l-.294 1.473a1 1 0 01-.98.804H9.32a1 1 0 01-.98-.804l-.295-1.473a6.957 6.957 0 01-1.416-.587l-1.25.834a1 1 0 01-1.262-.125l-.962-.962a1 1 0 01-.125-1.262l.834-1.25a6.957 6.957 0 01-.587-1.416l-1.473-.294A1 1 0 011 10.68V9.32a1 1 0 01.804-.98l1.473-.295c.144-.497.342-.971.587-1.416l-.834-1.25a1 1 0 01.125-1.262l.962-.962A1 1 0 015.38 3.03l1.25.834a6.957 6.957 0 011.416-.587l.294-1.473zM13 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="ml-3" href sidebar-toggle-item>Perwalian</span>
                </a>
              </li>
            @endif
            @if($user->kp == 1)
                <li>
                <a href= "/matakuliah" class="{{ $active==='matakuliah' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">               
                  <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                  </svg>                    
                  <span class="ml-3"sidebar-toggle-item>Buat Mata Kuliah</span>
                </a>
                </li>
                <li>
                  <a href= "/buatjadwal" class="{{ $active==='buatjadwal' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M12.512 8.72a2.46 2.46 0 0 1 3.479 0 2.461 2.461 0 0 1 0 3.479l-.004.005-1.094 1.08a.998.998 0 0 0-.194-.272l-3-3a1 1 0 0 0-.272-.193l1.085-1.1Zm-2.415 2.445L7.28 14.017a1 1 0 0 0-.289.702v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .703-.288l2.851-2.816a.995.995 0 0 1-.26-.189l-3-3a.998.998 0 0 1-.19-.26Z" clip-rule="evenodd"/>
                      <path fill-rule="evenodd" d="M7 3a1 1 0 0 1 1 1v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h1V4a1 1 0 0 1 1-1Zm10.67 8H19v8H5v-8h3.855l.53-.537a1 1 0 0 1 .87-.285c.097.015.233.13.277.087.045-.043-.073-.18-.09-.276a1 1 0 0 1 .274-.873l1.09-1.104a3.46 3.46 0 0 1 4.892 0l.001.002A3.461 3.461 0 0 1 17.67 11Z" clip-rule="evenodd"/>
                    </svg>                    
                    <span class="ml-3"sidebar-toggle-item>Buat Jadwal</span>
                  </a>
                </li>
                @endif
                @if($user->dk == 1)
                <li>
                  <a href= "/ajuanJadwal" class="{{ $active==='ajuanjadwal' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd"/>
                        </svg>                    
                        <span class="ml-3"sidebar-toggle-item>Ajuan Jadwal</span>
                    </a>
                </li>
                <li>
                    <a href= "/ajuanRuang" class="{{ $active==='ajuanruang' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M8.34 1.804A1 1 0 019.32 1h1.36a1 1 0 01.98.804l.295 1.473c.497.144.971.342 1.416.587l1.25-.834a1 1 0 011.262.125l.962.962a1 1 0 01.125 1.262l-.834 1.25c.245.445.443.919.587 1.416l1.473.294a1 1 0 01.804.98v1.361a1 1 0 01-.804.98l-1.473.295a6.95 6.95 0 01-.587 1.416l.834 1.25a1 1 0 01-.125 1.262l-.962.962a1 1 0 01-1.262.125l-1.25-.834a6.953 6.953 0 01-1.416.587l-.294 1.473a1 1 0 01-.98.804H9.32a1 1 0 01-.98-.804l-.295-1.473a6.957 6.957 0 01-1.416-.587l-1.25.834a1 1 0 01-1.262-.125l-.962-.962a1 1 0 01-.125-1.262l.834-1.25a6.957 6.957 0 01-.587-1.416l-1.473-.294A1 1 0 011 10.68V9.32a1 1 0 01.804-.98l1.473-.295c.144-.497.342-.971.587-1.416l-.834-1.25a1 1 0 01.125-1.262l.962-.962A1 1 0 015.38 3.03l1.25.834a6.957 6.957 0 011.416-.587l.294-1.473zM13 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="ml-3" sidebar-toggle-item>Ajuan Ruang</span>
                    </a>
                </li>
            @endif
            @if($user->ba==1)
                <li>
                <a href= "/ruang" class="{{ $active==='ruang' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1 ">
                  <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3.87H4v16h8v-13h5v13h3v-16h-8Z"/>
                  </svg>                  
                    <span class="ml-3"sidebar-toggle-item>Ruang</span>
                </a>
              </li>
              <li>
                <a href= "/plotruang" class="{{ $active==='plotruang' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">
                  <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z" clip-rule="evenodd"/>
                  </svg>
                  
                    <span class="ml-3" sidebar-toggle-item>Plot Ruang</span>
                </a>
              </li>
            @endif
            @if($user->mhs == 1)
                <li>
                <a href= "/m/registrasi" class="{{ $active==='registration' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path clip-rule="evenodd" fill-rule="evenodd" d="M8.34 1.804A1 1 0 019.32 1h1.36a1 1 0 01.98.804l.295 1.473c.497.144.971.342 1.416.587l1.25-.834a1 1 0 011.262.125l.962.962a1 1 0 01.125 1.262l-.834 1.25c.245.445.443.919.587 1.416l1.473.294a1 1 0 01.804.98v1.361a1 1 0 01-.804.98l-1.473.295a6.95 6.95 0 01-.587 1.416l.834 1.25a1 1 0 01-.125 1.262l-.962.962a1 1 0 01-1.262.125l-1.25-.834a6.953 6.953 0 01-1.416.587l-.294 1.473a1 1 0 01-.98.804H9.32a1 1 0 01-.98-.804l-.295-1.473a6.957 6.957 0 01-1.416-.587l-1.25.834a1 1 0 01-1.262-.125l-.962-.962a1 1 0 01-.125-1.262l.834-1.25a6.957 6.957 0 01-.587-1.416l-1.473-.294A1 1 0 011 10.68V9.32a1 1 0 01.804-.98l1.473-.295c.144-.497.342-.971.587-1.416l-.834-1.25a1 1 0 01.125-1.262l.962-.962A1 1 0 015.38 3.03l1.25.834a6.957 6.957 0 011.416-.587l.294-1.473zM13 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="ml-3" href ="/registration" sidebar-toggle-item>Registrasi</span>
                </a>
              </li>
              <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1" aria-controls="dropdown-layouts" data-collapse-toggle="dropdown-layouts">
                  <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                  </svg>                  
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Akademik</span>
                    <svg sidebar-toggle-item class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-layouts" class="{{ in_array($active, ['buatIrs', 'irs', 'khs', 'transkrip']) ? '' : 'hidden' }}  py-2 space-y-2">
                  <li>
                    <a href="/buat-irs" class="{{ $active==='buatIrs' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">Buat IRS</a>
                  </li>
                  <li>
                    <a href="/irs" class="{{ $active==='irs' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">IRS</a>
                  </li>
                  <li>
                    <a href="/khs" class="{{ $active==='khs' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">KHS</a>
                  </li>
                  <li>
                    <a href="/m/transkrip" class="{{ $active==='transkrip' ? 'bg-gray-200 dark:bg-blek-600' : '' }} flex items-center p-2 text-gray-900 duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 transition-transform hover:translate-x-1">Transkrip</a>
                  </li>
                </ul>
              </li>
            @endif
          </ul>
          
        </div>
      </div>
    </div>

    <script>
      const sidebar = document.getElementById('sidebar');

      if (sidebar) {
          const toggleSidebarMobile = (sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose) => {
              sidebar.classList.toggle('hidden');
              sidebarBackdrop.classList.toggle('hidden');
              toggleSidebarMobileHamburger.classList.toggle('hidden');
              toggleSidebarMobileClose.classList.toggle('hidden');
          }
          
          const toggleSidebarMobileEl = document.getElementById('toggleSidebarMobile');
          const sidebarBackdrop = document.getElementById('sidebarBackdrop');
          const toggleSidebarMobileHamburger = document.getElementById('toggleSidebarMobileHamburger');
          const toggleSidebarMobileClose = document.getElementById('toggleSidebarMobileClose');
          const toggleSidebarMobileSearch = document.getElementById('toggleSidebarMobileSearch');
          
          toggleSidebarMobileSearch.addEventListener('click', () => {
              toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose);
          });
          
          toggleSidebarMobileEl.addEventListener('click', () => {
              toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose);
          });
          
          sidebarBackdrop.addEventListener('click', () => {
              toggleSidebarMobile(sidebar, sidebarBackdrop, toggleSidebarMobileHamburger, toggleSidebarMobileClose);
          });
      }
    </script>
</aside>