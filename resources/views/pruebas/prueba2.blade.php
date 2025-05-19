<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   User Profile Form
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-white p-6 sm:p-10">
  <main class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
   <!-- Left panel -->
   <section class="bg-white rounded-xl border border-gray-100 p-8 w-full max-w-sm flex flex-col items-center relative">
    <span class="absolute top-6 right-6 bg-amber-200 text-amber-700 text-[10px] font-semibold px-3 py-1 rounded-md select-none">
     Pending
    </span>
    <img alt="Avatar image of a person with red hair wearing red glasses and a blue hat" class="w-28 h-28 rounded-full border border-gray-200 mb-4" height="120" src="https://storage.googleapis.com/a1aa/image/e1f083e1-ece7-405f-f7d2-0b5dff8c4cdd.jpg" width="120"/>
    <p class="text-center text-xs text-gray-400 mb-8 leading-tight">
     Allowed *.jpeg, *.jpg, *.png, *.gif
     <br/>
     max size of 3 Mb
    </p>
    <div class="w-full mb-6">
     <label class="block font-semibold text-gray-900 mb-1" for="bannedToggle">
      Banned
     </label>
     <p class="text-sm text-gray-500 mb-2">
      Apply disable account
     </p>
     <label class="inline-flex relative items-center cursor-pointer" for="bannedToggle">
      <input checked="" class="sr-only peer" id="bannedToggle" type="checkbox"/>
      <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all relative">
      </div>
     </label>
    </div>
    <div class="w-full mb-8">
     <label class="block font-semibold text-gray-900 mb-1" for="emailVerifiedToggle">
      Email verified
     </label>
     <p class="text-sm text-gray-500 mb-2 leading-tight">
      Disabling this will automatically send
      <br/>
      the user a verification
          email
     </p>
     <label class="inline-flex relative items-center cursor-pointer" for="emailVerifiedToggle">
      <input checked="" class="sr-only peer" id="emailVerifiedToggle" type="checkbox"/>
      <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all relative">
      </div>
     </label>
    </div>
    <button class="bg-red-200 text-red-700 text-sm font-semibold rounded-md px-6 py-2" type="button">
     Delete user
    </button>
   </section>
   <!-- Right panel -->
   <section class="bg-white rounded-xl border border-gray-100 p-8 flex-1 max-w-4xl">
    <form class="grid grid-cols-1 sm:grid-cols-2 gap-6">
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="fullName">
       Full name
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="fullName" type="text" value="Lucian Obrien"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="emailAddress">
       Email address
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="emailAddress" type="email" value="ashlynn.ohara62@gmail.com"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="phoneNumber">
       Phone number
      </label>
      <div class="flex items-center border border-gray-200 rounded-lg px-3 py-2 text-gray-900 text-sm focus-within:ring-2 focus-within:ring-blue-400">
       <span class="flex items-center gap-1 pr-2 border-r border-gray-300">
        <span aria-label="Canada flag" class="text-red-600 text-lg leading-none">
         🇨🇦
        </span>
        <svg class="w-3 h-3 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
         <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round">
         </path>
        </svg>
       </span>
       <input class="flex-1 border-none focus:ring-0 text-sm text-gray-900" id="phoneNumber" type="tel" value="(416) 555-0198"/>
       <button aria-label="Clear phone number" class="text-gray-400 hover:text-gray-600" type="button">
        <i class="fas fa-times">
        </i>
       </button>
      </div>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="country">
       Country
      </label>
      <select class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="country">
       <option selected="" value="ca">
        🇨🇦 Canada
       </option>
       <option value="us">
        United States
       </option>
       <option value="uk">
        United Kingdom
       </option>
      </select>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="stateRegion">
       State/region
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="stateRegion" type="text" value="Virginia"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="city">
       City
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="city" type="text" value="Rancho Cordova"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="address">
       Address
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="address" type="text" value="908 Jack Locks"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="zipCode">
       Zip/code
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="zipCode" type="text" value="85807"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="company">
       Company
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="company" type="text" value="Gleichner, Mueller and Tromp"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="role">
       Role
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="role" type="text" value="CTO"/>
     </div>
     <div class="sm:col-span-2 flex justify-end">
      <button class="bg-gray-900 text-white text-sm font-semibold rounded-md px-5 py-2" type="submit">
       Save changes
      </button>
     </div>
    </form>
   </section>
  </main>
 </body>
</html>
