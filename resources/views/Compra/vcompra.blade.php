@extends('app.ecommerse')

@section('titulo')
Compra
@endsection
@section('contenido')
<div class="container py-4 py-xl-5" id="app1"> 
        <div  v-for="elemento in lista" class="row gy-4 gy-md-0" >
            <div  class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div>
                    <h2 class="text-uppercase fw-bold">@{{elemento.skinname}}</h2>
                    <h3 class="text-uppercase fw-bold">$@{{elemento.price}} MX.</h3>
                    <p class="my-3">Skin Exclusiva de Run For Revenge</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-xl-5 m-xl-5"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" :src="'{{URL::to('/')}}/'+ elemento.foto" width="450" alt="" /></div>
            </div> 
        </div>
        
</div>
<div class="container py-4 py-xl-5"> 
<div id="app"></div>
</div>
@endsection

 
@section('javascripts')
<script src="https://js.stripe.com/v2/"></script>
<script>
      var llave_publica='pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q';
      var skin=<?php echo json_encode($lista);?>;
      var laravel_token='{{csrf_token()}}';
      var url_pago='{{action('CompraController@realizar_pago')}}';
</script>
<script src="{{asset('public/payment/build.js')}}"></script>
@endsection
 
@section('script')  
  <script>
    new Vue({
      el: '#app1',
      data:{
        lista:<?php echo json_encode($lista);?>
        

      }
      ,methods:{}
       });
  </script>
@endsection