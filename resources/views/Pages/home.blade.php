@extends('layout.app')

@section('content')

<section>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{url('/')}}">Coalition Technology Test</a>
        </div>
        
      </div>
    </nav>
</section>
<section class="margin-top design-a">
  <div class="container">
      <div class="col-12">
          <div class="row">
              <h3>Add or Update a Product</h3>
          </div>    
          <div class="row">
              <form id="addProductForm">
                  <div class="form-group">
                      <input class="form-control" required="required" type="hidden" name="id" id="id">
                  </div>
                  <div class="form-group">
                      <label for="product-name">Product Name</label>
                      <input class="form-control" required="required" type="text" name="product_name" id="product-name">
                  </div>
                  <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input class="form-control" required="required" type="number" name="quantity" id="quantity">
                  </div>
                  <div class="form-group">
                      <label for="price-per-item" >Price per Item</label>
                      <input class="form-control per_item_price" type="number" name="per_item_price" required="required" id="price-per-item">
                  </div>
                  <div class="form-group">
                      <label for="total">Total Value</label>
                      <input class="form-control"  type="text" name="total" id="total">
                  </div>
                  <div class="form-group">
                      <input class="btn btn-primary" type="submit">
                      {{-- <input class="btn btn-danger" value="Clear" id="clearData"> --}}
                  </div>
              </form>
          </div>    
      </div>    
  </div>    
</section>
<section class="design-b">
  <div class="container">
      <div class="col-12">
          <div class="row">
              <h3>Manage Your Product</h3>
          </div>    
          <div class="row">
               <table class="table data-table" id="mytable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price Per Product</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  </tbody>
                </table>
          </div>    
      </div>    
  </div>    
</section>
<section class="footer">
   <div class="container">
       <div class="col-12">
           <div class="row">
               <h3 class="text-center p-4">By K.S.Azim</h3>
           </div>
       </div>
   </div>
</section>


@endsection