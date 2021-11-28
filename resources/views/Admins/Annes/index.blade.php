@extends("Admins.Dashbord.index")

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-right col-md-12 col-12">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Niveau Annee Scolaire : </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div id="msgAlert" >
        
                </div>
                
                  <div class="">
        
                    <label for="recipient-name" class="col-form-label">Libelle:</label>
                    <input type="text" class="form-control" id="libelle" placeholder="Par exemple 2021-2022">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="insert">Save</button>
              </div>
            </div>
          </div>
        </div>


        <div class=" bg-white mt-2">

          <div class="row">
              <div class="col-md-12 p-2">
                  <a href="#" class="btn btn-warning text-white btn-sm mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Nouveau</a>
      
                    <div id="tableAnne">
      
                    </div>
      
              </div>
          </div>
      </div>


    </div>
  </div>
</div>

@stop
@section('script')
    <script>
        $(document).ready(function(){


          /* Begin  Code Pour Insert in Anne Into DataBase */

          $('#insert').click(function(e){
            e.preventDefault();
            var libelle= $('#libelle').val();
            console.log(libelle);
            $.ajax({
              type:'GET',
              dataType:'json',
              data:{
                'libelle':libelle
              },
                  url:'{{ route("anne.insert") }}',
              success:function(response){
                  $('#msgAlert').html('<div class="alert alert-success text-white" id="alertsuccess" >Ajout de donner est bien recus</div>');
             getAllAnne();
              }
            });
          });

          /* End  Code Pour Insert in Anne Into DataBase */

          /* Begin Code Pour Activer une Anne */

          $('body').on('click','.btnActive',function(e){
            e.preventDefault();
            var id=$(this).attr('id_anne');
            var url = '{{ route("anne.active", ":id") }}';
            url = url.replace(':id', id);
            console.log(id);
            $.ajax({
              type:'POST',
              dataType:'json',
              url:url,
              success:function(response){
                  getAllAnne();
                  getAnneActive();
                console.log(response);
              }
            });
          });

          /* End Code Pour Activer une Anne */
          
          /* Begin Afficher Les Classes Disponibles By Ajax End Laravel */

           getAllAnne();
            function getAllAnne(){
            $.ajax({
                type:'GET',
                dataType: 'json',
                url:"{{ route('get.all.anne') }}",
                success :function(response){
                 console.log(response);

                    var data='';
                    data = data + "<h4>Les Annes Scolaires Disponibles</h4>";
                    data=data+'<table class="table table-bordered table-small t table-striped bg-white"><thead><tr><th>Id</th><th>Libelle</th><th>Operations</th></tr></thead><tbody>';
                    $.each(response,function(key,value){
                        
                         data=data+'<tr>';
                         
                         data=data+'<td>'+value.id+'</td>';
                         data=data+'<td>'+value.libelle+'</td>';
                         data=data+'<td>';
                         if (value.status == 1) {
                          data = data + '<button id_anne="'+value.id+'" class="btn  btn-sm btn-primary btnActive">Activer</button>';
                         } else {
                          data = data + '<button id_anne="'+value.id+'" class="btn rounded btn-sm btn-danger btnActive">Désactiver</button>';
                         }
                        data=data+'</td></tr>';

                    });
                    
                        data=data+'</tbody></table>';
                    $('#tableAnne').html(data);
                },
            });
        
          }        
          
          /* End Afficher Les Classes Disponibles By Ajax End Laravel */

        });
        
 
    </script>
@endsection