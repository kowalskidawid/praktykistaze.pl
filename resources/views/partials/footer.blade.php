<div class="p-4 bg-gray-900 flex justify-between">
    <p class="text-white text-xs">
        {{ __('index.lang') }}
    </p>
    <ul class="flex space-x-2">
        <li onclick="{{ App::setLocale('pl') }}">
            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="6" width="16" height="6" fill="#E31D1C"/>
                <rect width="16" height="6" fill="#F5F8FB"/>
            </svg>
        </li>
        <li onclick="{{ App::setLocale('en') }}">
            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0H16V12H0V0Z" fill="#41479B"/>
                <path d="M16 10.4375L10.0833 6.00001L16 1.5625V9.53674e-07H13.9167L8 4.43751L2.08333 9.53674e-07H0V1.5625L5.91667 6.00001L0 10.4375V12H2.08336L8 7.56251L13.9166 12H16V10.4375Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.47361e-06 0L0 3.29813e-06V0.625008L7.16667 6.00002L0 11.375V12H0.833366L8 6.62502L15.1666 12H16V11.375L8.83333 6.00002L16 0.625005V0H15.1667L8 5.37502L0.833323 0H2.47361e-06Z" fill="#DC251C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 4V0H10V4H16V8H10V12H6V8H0V4H6Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5V0H9V5H16V7H9V12H7V7H0V5H7Z" fill="#DC251C"/>
            </svg>
        </li>
        <li>
            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="16" height="6" fill="#3273D3"/>
                <rect y="6" width="16" height="6" fill="#FFD018"/>
            </svg>
        </li>
        <li>
            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="16" height="4" fill="#F5F8FB"/>
                <rect y="4" width="16" height="4" fill="#41479B"/>
                <rect y="8" width="16" height="4" fill="#DC251C"/>
            </svg>
        </li>
    </ul>
</div>