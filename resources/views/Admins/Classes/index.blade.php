@extends("Admins.Dashbord.index")

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-right col-md-12 col-12">
       

        <div class="row">
          <div class="" style="float: right">
            <div class="container bg-white mt-2" style=" margin-left: 14px; border: 1px solid #ebebeb;">
            
              <div class="row">
                  <div class="col-md-12">
                    <a href="#" class="btn btn-warning text-white btn-sm mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalAjoute" >Nouveau</a>
                        <div id="tableClasse">
          
                        </div>
                      
                  </div>
              </div>
          </div>
          </div>
        </div>


    </div>
  </div>
</div>

@include('Admins.Classes.Ajouet');
@include('Admins.Classes.modfierPrix');
@include('Admins.Classes.modfierCapacité');

@stop

@section('script')

    <script>
          $(document).ready(function(){

       /* Begin Code Pour Modifier La Capacité d'une Classe */

              $('body').on('click','#editCapacite',function(e){
                e.preventDefault();
                var formData ={
                  'CapaciteModcls':$('#CapaciteModcls').val(),
                  'id_hidden':$('#id_capaciter_hidden').val()
                };
                
                $.ajax({
                  type:'POST',
                  url:'{{ route("classe.modifierCapaciter")  }}',
                  data:formData,
                  success:function(data){
                    $('#exampleModalCapacité').modal('hide');
                    getAllClasse();
                    Swal.fire(
                    'La Modification du capaité class est reçu.',
                    data.msg,
                    'success'
                  );
                  },
                  error:function(reject){

                  }
                });
              });

                    $('body').on('click','#editPrix',function(e){
                e.preventDefault();
                var formData ={
                  'PrixModcls':$('#PrixModcls').val(),
                  'id_hidden':$('#id_prix_hidden').val()
                };
                
                $.ajax({
                  type:'POST',
                  url:'{{ route("classe.modifierPrix")  }}',
                  data:formData,
                  success:function(data){
                    $('#exampleModalPrix').modal('hide');
                    getAllClasse();
                    Swal.fire(
                    'La Modification du prix class est reçu.',
                    data.msg,
                    'success'
                  );
                  },
                  error:function(reject){

                  }
                });
              });

             /* End Code Pour Modifier La Capacité d'une Classe */

            /* Begin Code Pour Activer une Classe */

              $('body').on('click','.btnClickOne',function(e){
              e.preventDefault();
              var id = $(this).attr('id_Class');
              $.ajax({
                type:'POST',
                url:'{{route("change.status.classe")}}',
                data:{
                  'id_Classe' : id
                },
                success:function(data){
                  console.log(data);
                  getAllClasse();
                },
                error:function(reject){}
              });
            });

            /* End Code Pour Activer une Classe */
        

          /* Begin Code Pour Afficher Tous Les Classes Disponibles */

            getAllClasse();
            function getAllClasse(){
            $.ajax({
                type:'GET',
                dataType: 'json',
                url:"{{ route('get.all.classe') }}",
                success :function(response){
                 console.log(response);

                    var data='';
                    data = data + "<h4 class='py-1'>Les Classe Disponibles</h4>";
                    data=data+'<table class="table table-bordered table-small t table-striped bg-white"><thead><tr><th>Id</th><th>Libelle</th><th>Prix</th><th>Capaciter</th><th>Status</th><th>Operations</th></tr></thead><tbody>';
                    $.each(response,function(key,value){
                        
                         data=data+'<tr>';
                         data=data+'<td>'+value.id+'</td>';
                         data=data+'<td>'+value.libelle+'</td>';
                         data=data+'<td>'+value.prix+'</td>';
                         data=data+'<td>'+value.capaciter+'</td>';
                         data=data+'<td>';
                         if (value.status == 1) {
                          data = data + '<button id_Class="'+value.id+'" class="btn  btn-sm btn-primary btnClickOne">Activer</button>';
                         } else {
                          data = data + '<button id_Class="'+value.id+'" class="btn rounded btn-sm btn-danger btnClickOne">Désactiver</button>';
                         }
                         
                         data += '</td>';
                         data=data+'<td>';
                        data=data+'<a href="#" id_classe="'+value.id+'" data-bs-toggle="modal" data-bs-target="#exampleModalPrix" class="btn btn-warning text-white btn-sm ml-1 btnPrix">Modifier prix</a>';
                        data=data+'<a href="#" id_classe="'+value.id+'"  data-bs-toggle="modal" data-bs-target="#exampleModalCapacité" class="btn btn-success text-white btn-sm ml-1 btnCapaciterMSG">Modifier Capaciter</a>';
                        data=data+'</td></tr>';
                    });
                    
                        data=data+'</tbody></table>';
                    $('#tableClasse').html(data);
                },
            });
        
          }     
          
          /* End Code Pour Afficher Tous Les Classes Disponibles */

        });


        /* Begin Code Pour Modifier La Capacité d'une Classe */

          $('body').on('click', '.btnCapaciterMSG',function(e){
        e.preventDefault();
        var id_classCapaciter = $(this).attr('id_classe');
        $.ajax(
          {
            type:'POST',
            url:'{{ route("get.classe.byId") }}',
            data:{
              'id' : id_classCapaciter
            },
        success:function(data){
          $('#CapaciteModcls').val(data.capaciter);
          $('#id_capaciter_hidden').val(data.id);
          console.log(data);
        },
        error:function(reject){
        }
          }
        );
      });

              /* End Code Pour Modifier La Capacité d'une Classe */
      
          /* Begin Code Pour Modifier La Prix d'une Classe */

          $('body').on('click', '.btnPrix',function(e){
        e.preventDefault();
        var id_classPrix = $(this).attr('id_classe');
        $.ajax(
          {
            type:'POST',
            url:'{{ route("get.prix.byId") }}',
            data:{
              'id' : id_classPrix
            },
        success:function(data){
          $('#PrixModcls').val(data.prix);
          $('#id_prix_hidden').val(data.id);
          console.log(data);
        },
        error:function(reject){

        }
          }
        );
        console.log(id_classPrix);
      });

  /* Begin Code Pour Modifier La Prix d'une Classe */


            </script>
@endsection