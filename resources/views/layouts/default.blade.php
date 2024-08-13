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
                 <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
          </div>

    </div>   
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>  
        @include('layouts.partial.logout')
        @include('layouts.partial.footer_js')
        @yield('js')
        
    </body>
    
</html>