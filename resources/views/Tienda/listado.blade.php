@extends('app.ecommerse')

@section('titulo')
Tienda
@endsection
@section('style')
<style>
  .background-image {
             background-image: url(../public/Homeresources/Fondo.png);
              /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 400px;
        }
        .content {
            left: 0;
            position: fixed;
            right: 0;
            z-index: 2;
        }  
</style>
@endsection

@section('contenido')
<header class="bg py-5 background-image" style="background-color: rgb(246, 243, 190);">
     <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-black ">
             <h1 class="display-4 fw-bolder">Skins a la venta</h1>
             <p class="lead fw-normal text-black-50 mb-0">Exclusivos de Run For Revenge</p>
        </div>
    </div>
</header>
<section class="py-5" style="background-color: rgb(141, 209, 216);">
<section id = "app" class="py-5">
            <div class="container px-4 px-lg-5 mt-5" >
                <div  class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div  v-for="elemento in lista"  class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" :src="'{{URL::to('/')}}/'+ elemento.foto" width="450" alt="" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">@{{elemento.skinname}}</h5>
                                    <!-- Product price-->
                                    $ @{{elemento.price}}
                                    <h6 class="fw-bolder">@{{elemento.descrip}}</h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" :href="url_skin+'?idskins='+elemento.idskins">Comprar</a></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>     
</section>
@endsection

@section('script')  
  <script>
    new Vue({
      el: '#app',
      data:{
        lista:<?php echo json_encode($lista);?>
        ,url_skin:'{{action("CompraController@vcompra")}}'

      }
      ,methods:{
      }
       });
  </script>
@endsection