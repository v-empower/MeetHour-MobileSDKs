@extends('layout')
@section('body')
    <body>
    @include('nav')
    <div class="relative top-16">
    @if(Session::has('error'))
      <div id="error">
               <div class="flex fixed top-20 justify-center items-center text-lg font-medium w-96 rounded-md h-16 border border-red-600 bg-red-50 text-red-600">
                  <p>{{ Session::get('message') }}</p>
               </div>
            </div>
    @endif
         <div class="text-3xl flex justify-center font-bold mt-5 text-sky-500">
            <h1>Welcome to Meet Hour Laravel - Example</h1>
         </div>
         <div class="md:mx-40 mx-5 overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
               <h3 class="text-lg font-medium leading-6 text-gray-900">Steps to Authorize Meet Hour Developer
                  account and get access token.</h3>
               <p class="mt-1 text-sm text-gray-500">Steps given below - </p>
            </div>
            <div class="border-t border-gray-200">
               <dl id="steps">
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                     <dt class="text-sm font-medium text-gray-500">Step One</dt>
                     <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Go to <a target="_blank" class="text-blue-500" href="https://meethour.io">meethour.io</a> and signup for
                        Developer or Higher plan. Currently we offer 28 days free trial.</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                     <dt class="text-sm font-medium text-gray-500">Step Two</dt>
                     <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Go to the <a target="_blank" class="text-blue-500" href="https://portal.meethour.io">dashboard</a> and then click
                        on <a class="text-blue-500" target="_blank" href="https://portal.meethour.io/customer/developers">developers</a> menu.</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                     <dt class="text-sm font-medium text-gray-500">Step Three</dt>
                     <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Copy your Client ID, Client
                        Secret and Api Key. After copying, paste each copied text to the respective constant in
                        the source code js/constants.js</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                     <dt class="text-sm font-medium text-gray-500">Step Four</dt>
                     <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">After completing all the steps
                        given above, now click on Get Access Token given below.</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                     <dt class="text-sm font-medium text-gray-500">Step Five</dt>
                     <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">As you click, your access token
                        will be received and stored it in brower's localstorage. The received access token is
                        then used for making Meet Hour rest api calls.</dd>
                  </div>
                  <?php
                  if (Session::get('success') === true && Session::get('accessToken') !== null) { ?>
                     <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Step Six</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Token successfully got generated. Now you can schedule a meeting. <a class="text-blue-500 underline" href='/schedule-meeting'>Schedule a Meeting</a></dd>
                     </div>
                     <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-12 sm:gap-4 sm:px-12"><textarea class="" disabled><?php echo Session::get('accessToken') ?></textarea></div>
                  <?php
                  }
                  ?>
               </dl>
            </div>
         </div>
         <div class="grid w-screen justify-center mt-2">
            <div id="loader" class="flex justify-center">

            </div>
            <form action="/meetings/getaccesstoken " class="flex justify-center gap-1 mt-3" method="post">
               @csrf
               <input type="hidden" name="getaccesstoken" value="true" />
               <button type="submit" id="getaccesstoken" class="bg-sky-600 flex justify-center items-center text-white rounded-md h-9 w-40">Get Access
                  Token</button>
            </form>
         </div>
      </div>
@endsection
