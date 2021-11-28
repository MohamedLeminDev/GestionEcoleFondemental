
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('Admins.Layouts.NarBar.headInclude')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
@include('Admins.Layouts.NarBar.navHeader')



  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{ asset('app-assets/vendors/js/ui/prism.min.js') }}"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
  {{-- js botstrap --}}
  <script src="{{asset('JS/popper.min.js')}}" ></script>
<script src="{{asset('JS/bootstrap.min.js')}}" ></script>

<script src="{{asset('JS/jquery.min.js')}}"></script>
<script src="{{asset('Library/sweetalert2@11.js')}}"></script>

<script>
$.ajaxSetup({
  headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
  }
});

  $(document).ready(function(){
          getAnneActive();
          function getAnneActive(){
            $.ajax({
                type:'GET',
                dataType: 'json',
                url:"{{ route('get.anne.active') }}",
                success :function(response){
                console.log(response);
                var data='';
                    data = data + "<button class='btn btn-secondary mt-1 anneActiveNew'>";
                   
                    $.each(response,function(key,value){
                        
                          data=data+ value.libelle;

                    });
                    
                        data=data+'</<button>';
                    $('#activeAnne').html(data);
                    getAnneActive();
                },
            });
        
          } 
        });
</script>


@yield('script')
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
  
</body>

</html>