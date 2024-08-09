<!DOCTYPE html>
<html lang="en">

    @include('layouts.partial.head')
    
    <body id="page-top"> 
    <div id="wrapper">
         @include('layouts.partial.leftbar')
               <!-- Content Wrapper -->
               <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                @include('layouts.partial.topbar')
                @yield('page')
                @include('layouts.partial.logout')
          
                </div>
               </div>

    </div>      
        @include('layouts.partial.footer_js')
        @yield('js')
    </body>
    
</html>