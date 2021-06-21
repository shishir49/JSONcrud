<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Coalition Technology Skill Test</title>

       
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 
    </head>
    <body>

        @yield('content')
          
        <script>


        var table; 


        $(document).ready(function(){

          const Msg = Swal.mixin({
              toast: true
              , position: 'top-end'
              , icon: 'success'
              , showConfirmButton: false
              , timer: 3000
          })

          function clearData() {
             $('.clear').val('');
         }

          fetch_product();

          //----------------------------------Add/Update Product----------------------------------

          $('#addProductForm').on('submit',function(event){
              event.preventDefault();

              let id = $('#id').val();
              let product_name = $('#product-name').val();
              let quantity = $('#quantity').val();
              let per_item_price = $('#price-per-item').val();
              let total = $('#total').val();
             
            if (id=='') {
                $.ajax({
                url: "/add-product/",
                type:"POST",
                data:{
                  id:id,
                  product_name:product_name,
                  quantity:quantity,
                  per_item_price:per_item_price,
                  total:total,
                },
                success:function(response){
                  console.log(response);
                  table.destroy();
                  fetch_product();
                  clearData();
                  
                  Msg.fire({
                      type: 'success'
                      , icon: 'success'
                      , title: 'Product Added !'
                  });
                },
              });
            }else{
                $.ajax({
                url: "/edit-product/",
                type:"POST",
                data:{
                  id:id,
                  product_name:product_name,
                  quantity:quantity,
                  per_item_price:per_item_price,
                  total:total,
                },
                success:function(response){
                  console.log(response);
                  table.destroy();
                  fetch_product();
                  clearData();
                  
                  Msg.fire({
                      type: 'success'
                      , icon: 'success'
                      , title: 'Product Updated !'
                  });
                },
              });
            }
              
          });


        //----------------------------------Fetch Products----------------------------------
          

          function fetch_product(){
              table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'product_quanity', name: 'product_quanity'},
                    {data: 'per_item_price', name: 'per_item_price'},
                    {data: 'total_price', name: 'total_price'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
              });
          }


          //---------------------------------Input Activity---------------------------------


           $('input.per_item_price').keyup(function(){ 
                var per_item_price = $("#price-per-item").val();
                console.log(per_item_price); 
                var quantity = $("#quantity").val();
                var total_price = $("#total").val();
                total_price = (parseFloat(per_item_price) * parseFloat(quantity));
                $("#total").val(parseFloat(total_price));  
            });

            $('input#quantity').keyup(function(){ 
                var per_item_price = $("#price-per-item").val();
                console.log(per_item_price); 
                var quantity = $("#quantity").val();
                var total_price = $("#total").val();
                total_price = (parseFloat(per_item_price) * parseFloat(quantity));
                $("#total").val(parseFloat(total_price));
                
            });


            //--------------------------Get Product Data in the Form--------------------------


            $(document).on('click', '.edit', function(){
                event.preventDefault();

                let id = $(this).attr('id');
                
                $.ajax({
                  url: "/getProductById/"+id,
                  dataType:"json",
                       success:function(getProduct){
                        $('#id').val(id);
                        $('#product-name').val(getProduct.product_name);
                        $('input#quantity').val(getProduct.product_quanity);
                        $('input#price-per-item').val(getProduct.per_item_price);
                        $('input#total').val(getProduct.total_price);
                       }
                  })
            });
        });
          


        //----------------------------------CSRF TOKEN----------------------------------
                  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         

        </script>  
   
    </body>
</html>
