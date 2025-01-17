  <div class="lg:flex hidden">
    <div class="relative">
        <input type="checkbox" id="drawer-toggle" class="relative sr-only peer" checked>
        <label id="iconocheck" for="drawer-toggle" class="fixed z-[60] top-20 left-0 inline-block py-2 px-1 cursor-pointer rounded-r-lg transition-all duration-500 bg-[#110B7999] peer-checked:left-20">
            <div id="icon-right" class="flex"><i class="fa-solid fa-chevron-right text-white"></i></div>
            <div id="icon-left" class="hidden"><i class="fa-solid fa-chevron-left text-white"></i></div>
        </label>

        <div id="sidebarcheck" class="group fixed top-0 left-0 z-50 w-20 h-full transition-all duration-500 transform -translate-x-full bg-[#110B7999] shadow-lg peer-checked:translate-x-0 hover:w-40">
            <div class="flex flex-col gap-24 px-4 py-4">
                <div class="flex flex-row justify-center">
                    <a href="{{route('index')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="46" viewBox="0 0 56 46" fill="none">
                            <path d="M35.134 8.74297C33.7662 8.74297 32.654 9.85509 32.654 11.2229C32.654 11.528 32.7174 11.8165 32.8183 12.0864C32.7667 12.1192 32.715 12.1544 32.6658 12.1966L29.8902 14.686C29.4373 15.0919 28.7476 15.0755 28.3135 14.6508L26.1784 12.5533C25.9602 12.3398 25.667 12.2201 25.3619 12.2224L13.7809 12.3233C12.7626 12.3327 12.2559 13.5645 12.9738 14.2871L20.6249 21.9828C21.0777 22.438 21.0707 23.177 20.6085 23.6228L0.351048 43.1857C-0.0126187 43.5377 -0.0947368 44.0703 0.109386 44.5043C0.161003 44.6146 0.233736 44.7202 0.322893 44.814C0.763985 45.2715 1.49367 45.2833 1.95118 44.8422L23.8885 23.658C24.3507 23.2122 24.3577 22.4732 23.9049 22.018L18.464 16.5442C17.746 15.8216 18.2505 14.5898 19.2711 14.5804L24.4305 14.5358C24.7355 14.5335 25.0288 14.6508 25.247 14.8667L28.2455 17.8088C28.6795 18.2335 29.3693 18.2499 29.8221 17.844L34.2049 13.9094C34.3081 13.8155 34.3879 13.7076 34.4489 13.5903C34.6671 13.6536 34.8947 13.6982 35.134 13.6982C36.5019 13.6982 37.614 12.5861 37.614 11.2183C37.614 9.8504 36.5019 8.73828 35.134 8.73828V8.74297ZM35.134 12.5486C34.402 12.5486 33.806 11.9526 33.806 11.2206C33.806 10.4886 34.402 9.89263 35.134 9.89263C35.866 9.89263 36.462 10.4886 36.462 11.2206C36.462 11.9526 35.866 12.5486 35.134 12.5486Z" fill="#61EDFF"/>
                            <path d="M55.6381 1.99045C56.1003 1.55405 56.1238 0.826721 55.6874 0.362166C55.251 -0.100043 54.5213 -0.123506 54.0591 0.312895L31.8613 21.2273C31.3944 21.6683 31.378 22.4051 31.8238 22.8673L37.199 28.4067C37.9099 29.1388 37.3891 30.3635 36.3684 30.3588L31.2114 30.34C30.9064 30.34 30.6131 30.2157 30.3996 29.9998L27.4363 27.0201C27.007 26.5884 26.3195 26.5649 25.862 26.9662L21.43 30.8468C21.3502 30.9172 21.2868 30.997 21.2305 31.0815C20.9537 30.9735 20.6557 30.9102 20.3413 30.9102C18.9734 30.9102 17.8613 32.0223 17.8613 33.3901C17.8613 34.758 18.9734 35.8701 20.3413 35.8701C21.7092 35.8701 22.8213 34.758 22.8213 33.3901C22.8213 33.1602 22.779 32.942 22.7204 32.7309C22.8002 32.6886 22.8752 32.6417 22.9456 32.5807L25.7517 30.1242C26.2092 29.723 26.899 29.7488 27.326 30.1782L29.4353 32.3015C29.6512 32.5173 29.9421 32.6394 30.2471 32.6417L41.8281 32.6816C42.8464 32.6863 43.3673 31.4592 42.6587 30.7295L35.1038 22.94C34.6557 22.4778 34.6721 21.7411 35.1414 21.3L55.6381 1.99045ZM20.3436 34.7181C19.6116 34.7181 19.0157 34.1222 19.0157 33.3901C19.0157 32.6581 19.6116 32.0622 20.3436 32.0622C21.0757 32.0622 21.6716 32.6581 21.6716 33.3901C21.6716 34.1222 21.0757 34.7181 20.3436 34.7181Z" fill="white"/>
                        </svg>
                    </a>
                </div>

                <div class="flex flex-col gap-3 justify-center items-start">
                    <a href="{{route('index')}}">
                        <div class="flex flex-row gap-2 items-center">
                                <div class="bg-white cursor-pointer w-10 h-10 rounded-full flex flex-row justify-center items-center group hover:bg-[#E29720]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                        <path   d="M16.441 10.0781C16.6752 8.46119 16.7832 7.62982 16.4853 6.89016C16.1776 6.12647 15.4951 5.60395 14.13 4.55892L13.1102 3.77813C11.4121 2.47813 10.563 1.82812 9.58333 1.82812C8.60367 1.82812 7.75462 2.47813 6.05653 3.77813L5.03664 4.55892C3.6716 5.60395 2.98908 6.12647 2.68145 6.89016C2.37382 7.65385 2.49885 8.51529 2.7489 10.2382L2.96213 11.7075C3.31662 14.1498 3.49386 15.371 4.32112 16.0995C5.14839 16.8281 6.35782 16.8281 8.77667 16.8281H9.16667" stroke="#110B79" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path   d="M10.834 13.8956C11.7913 13.1166 12.9347 12.6641 14.1628 12.6641C15.3947 12.6641 16.5415 13.1196 17.5007 13.9029M15.9792 15.9974C15.4325 15.6565 14.8156 15.4646 14.1628 15.4646C13.5133 15.4646 12.8993 15.6546 12.3547 15.9922" stroke="#110B79" stroke-width="1.25" stroke-linecap="round"/>
                                        <path   d="M14.166 18.5H14.1713" stroke="#110B79" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            <h2 class="font-gotham_book font-semibold text-white hidden group-hover:flex">Inicio</h2>
                        </div>
                     </a>
                     <a href="{{route('index')}}#planes" class="">
                        <div class="flex flex-row gap-2 items-center">
                                <div class="bg-white relative cursor-pointer w-10 h-10 rounded-full flex flex-row justify-center items-center  hover:bg-[#E29720]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                            <path  d="M14.9993 17.6667H4.99935C3.428 17.6667 2.64232 17.6667 2.15417 17.1785C1.66602 16.6903 1.66602 15.9047 1.66602 14.3333C1.66602 12.762 1.66602 11.9763 2.15417 11.4882C2.64232 11 3.428 11 4.99935 11H14.9993C16.5707 11 17.3563 11 17.8445 11.4882C18.3327 11.9763 18.3327 12.762 18.3327 14.3333C18.3327 15.9047 18.3327 16.6903 17.8445 17.1785C17.3563 17.6667 16.5707 17.6667 14.9993 17.6667Z" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path   d="M6.66602 3.05959C7.62337 2.28074 8.76677 1.82812 9.99485 1.82812C11.2268 1.82812 12.3735 2.2836 13.3327 3.06697M11.8113 5.16146C11.2645 4.82052 10.6476 4.62869 9.99485 4.62869C9.34535 4.62869 8.73135 4.81859 8.18666 5.15633" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"/>
                                            <path   d="M10 7.66406H10.0053" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path   d="M15 14.3281H15.0075" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path   d="M11.666 14.3281H11.6735" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path   d="M5 14.3281H8.33333" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            <h2 class="font-gotham_book font-semibold text-white hidden group-hover:flex">Planes</h2>
                        </div>
                     </a>

                     <a href="{{route('nosotros')}}">
                        <div class="flex flex-row gap-2 items-center">
                                <div class="bg-white cursor-pointer w-10 h-10 rounded-full flex flex-row justify-center items-center group hover:bg-[#E29720]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                        <path   d="M12.5 6.82812C12.5 8.20883 11.3807 9.32812 10 9.32812C8.61925 9.32812 7.5 8.20883 7.5 6.82812C7.5 5.44742 8.61925 4.32812 10 4.32812C11.3807 4.32812 12.5 5.44742 12.5 6.82812Z" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path   d="M13.334 3.5C14.7147 3.5 15.834 4.61929 15.834 6C15.834 7.01924 15.224 7.89603 14.3492 8.28525" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path   d="M11.4286 11.8281H8.57143C6.59898 11.8281 5 13.4271 5 15.3995C5 16.1885 5.63959 16.8281 6.42857 16.8281H13.5714C14.3604 16.8281 15 16.1885 15 15.3995C15 13.4271 13.401 11.8281 11.4286 11.8281Z" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path   d="M14.7617 11C16.7341 11 18.3331 12.599 18.3331 14.5714C18.3331 15.3604 17.6936 16 16.9046 16" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path   d="M6.66602 3.5C5.28531 3.5 4.16602 4.61929 4.16602 6C4.16602 7.01924 4.77596 7.89603 5.65075 8.28525" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path   d="M3.09459 16C2.30561 16 1.66602 15.3604 1.66602 14.5714C1.66602 12.599 3.265 11 5.23744 11" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            <h2 class="font-gotham_book font-semibold text-white hidden group-hover:flex">Nosotros</h2>
                        </div>
                     </a>

                     <a href="{{route('blog.all')}}">
                        <div class="flex flex-row gap-2 items-center">
                            
                                <div class="bg-white cursor-pointer w-10 h-10 rounded-full flex flex-row justify-center items-center group hover:bg-[#E29720]">
                                    
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                            <path   d="M14.9993 12.6641V7.66406C14.9993 5.30704 14.9993 4.12853 14.2671 3.3963C13.5348 2.66406 12.3563 2.66406 9.99935 2.66406H6.66602C4.30899 2.66406 3.13048 2.66406 2.39825 3.3963C1.66602 4.12853 1.66602 5.30704 1.66602 7.66406V12.6641C1.66602 15.0211 1.66602 16.1996 2.39825 16.9318C3.13048 17.6641 4.30899 17.6641 6.66602 17.6641H16.666" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path   d="M5 6.82812H11.6667" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path   d="M5 10.1641H11.6667" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path   d="M5 13.5H8.33333" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path   d="M15 6.82812H15.8333C17.0118 6.82812 17.6011 6.82812 17.9672 7.19424C18.3333 7.56036 18.3333 8.14962 18.3333 9.32812V15.9948C18.3333 16.9153 17.5872 17.6615 16.6667 17.6615C15.7462 17.6615 15 16.9153 15 15.9948V6.82812Z" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </div>
                            
                            <h2 class="font-gotham_book font-semibold text-white hidden group-hover:flex">Blog</h2>
                        </div>  
                     </a>
                     <a href="{{route('contacto')}}">
                        <div class="flex flex-row gap-2 items-center">
                            
                                <div class="bg-white cursor-pointer w-10 h-10 rounded-full flex flex-row justify-center items-center group hover:bg-[#E29720]">
                                    
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                            <path   d="M3.33398 8.49479C3.33398 5.35209 3.33398 3.78075 4.31029 2.80443C5.28661 1.82813 6.85795 1.82812 10.0007 1.82812H11.2507C14.3933 1.82812 15.9647 1.82813 16.941 2.80443C17.9173 3.78075 17.9173 5.35209 17.9173 8.49479V11.8281C17.9173 14.9708 17.9173 16.5422 16.941 17.5185C15.9647 18.4948 14.3933 18.4948 11.2507 18.4948H10.0007C6.85795 18.4948 5.28661 18.4948 4.31029 17.5185C3.33398 16.5422 3.33398 14.9708 3.33398 11.8281V8.49479Z" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25"/>
                                            <path   d="M8.16661 10.1425C7.8111 9.52257 7.63944 9.0164 7.53594 8.50323C7.38286 7.74441 7.73317 7.00311 8.31352 6.53011C8.55883 6.33021 8.84 6.39851 8.985 6.65871L9.31242 7.24616C9.572 7.71177 9.70175 7.94459 9.676 8.19141C9.65025 8.43823 9.47525 8.63923 9.12525 9.04132L8.16661 10.1425ZM8.16661 10.1425C8.88617 11.3971 10.0154 12.5271 11.2716 13.2475M11.2716 13.2475C11.8915 13.603 12.3977 13.7746 12.9108 13.8781C13.6697 14.0312 14.4109 13.6809 14.8839 13.1006C15.0838 12.8552 15.0156 12.5741 14.7553 12.4291L14.1679 12.1016C13.7022 11.8421 13.4695 11.7123 13.2227 11.7381C12.9758 11.7638 12.7748 11.9388 12.3727 12.2888L11.2716 13.2475Z" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linejoin="round"/>
                                            <path   d="M4.16732 5.16406H2.08398M4.16732 10.1641H2.08398M4.16732 15.1641H2.08398" stroke="#110B79" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    
                                </div>
                            
                            <h2 class="font-gotham_book font-semibold text-white hidden group-hover:flex">Contacto</h2>
                        </div>
                     </a>
                </div>
                
            </div>
        </div>
    </div>
  </div>


  <script>
    $(document).ready(function () {
        // Detect changes on the checkbox
        $('#drawer-toggle').change(function () {
            if ($(this).is(':checked')) {
                // Checkbox is checked
                // $('#drawer-label').removeClass('left-20').addClass('left-0');
                $('#iconocheck').removeClass('').addClass('group-hover:left-20 group-hover:ml-20');
                $('#icon-right').removeClass('hidden').addClass('flex');
                $('#icon-left').removeClass('flex').addClass('hidden');
            } else {
                // Checkbox is unchecked
                // $('#drawer-label').removeClass('left-0').addClass('left-20');
                $('#iconocheck').removeClass('group-hover:left-20 group-hover:ml-20').addClass('');
                $('#icon-right').removeClass('flex').addClass('hidden');
                $('#icon-left').removeClass('hidden').addClass('flex');
            }
        });
    });

    const sidebarCheck = document.getElementById('sidebarcheck');
    const iconCheck = document.getElementById('iconocheck');

   
    sidebarCheck.addEventListener('mouseenter', () => {
        iconCheck.style.marginLeft = '80px'; 
    });

    sidebarCheck.addEventListener('mouseleave', () => {
        iconCheck.style.marginLeft = '0'; 
    });
</script>
