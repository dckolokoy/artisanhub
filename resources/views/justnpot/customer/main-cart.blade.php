@extends('justnpot.customer-main')
@section('title', 'Cart')
@section('content')

    {{-- ongoing transaction --}}

    <div>
        <div style="height: 50px;"></div>
        <div style="width: 90%; margin: 0 auto;">
            <center>
                @if (session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>
            @endif
                <img src="{{ url('justnpot/images/cart.jpg') }}" width="10%"> </center>
            <center>
                <p style="font-size: 2.4em; color: red"> VIEW CART PRODUCT HERE </p>
            </center>
            @if (count($transaction_items) != 0)
            <p align="center">
                Grand Total: ₱ {{ number_format($grandtotal) }}
                <br>

                {{-- <form action="{{ url('charge') }}" method="post">
                    <input type="text" name="amount" />
                    {{ csrf_field() }}
                    <input type="submit" name="submit" value="Pay Now">
                </form> --}}
            <p>
                <center>
                    <div style="" class="text-right py-2">
                        {{-- <form action="{{ url('charge') }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                            @csrf
                            {{ csrf_field() }}
                            <input type="text" name="amount" />
                            <button type="submit"  name="submit" class="btn btn-success" style="display:inline;"><i class="fas fa-check"> </i> Checkout</button>

                        </form> --}}

                        <form action="{{ url('charge') }}" method="post">
                            <input style="display:none" type="number" name="amount" value="{{ $grandtotal }}"/>
                            {{ csrf_field() }}
                            <input type="submit" name="submit" class="btn btn-success" style="display:inline;" value="Checkout" onclick="if (confirm('Do you want to proceed to payment?')){return true;}else{event.stopPropagation(); event.preventDefault();};">

                        </form>

                    </div>
                </center>



                <br>
                <div>
                    <div class="row">
                        <div class="col-12">
                        @if($errors->any())
                            {{ implode('', $errors->all(':message')) }}
                        @endif
                            <div class="tablesizes card-body table-responsive p-0" style="z-index: -99999">
                              <table id="table_id" class="table table-head-fixed text-nowrap table-striped table-hover">
                                <thead class="thead-light">
                                  <tr>
                                   <th>ID</th>
                                   <th>Image</th>
                                   <th>Name</th>
                                <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Action</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($transaction_items as $transaction_item)
                                  <tr>
                                    <td class="align-middle">{{$transaction_item ->t_id }}</td>
                                    <td>
                                        <img class="card-img rounded-0 img-fluid" style="  width:  100px;
                                        height: 100px;
                                        object-fit: cover;"
                                        src="{{ asset(''.$transaction_item->m_image.'') }}">
                                    </td>
                                    <td class="align-middle">{{$transaction_item ->m_name }}</td>
                                    <td class="align-middle">{{ $transaction_item->t_quantity }}  
                                        @php
                                        $type=DB::table('categories')
                                        ->select('type')
                                        ->where('categories.id',$transaction_item->cat_id)
                                        ->first();
                                        @endphp
                                        @if($type->type=='tangible')
                                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$transaction_item->t_id}}">+</button></td>
                                         @endif
                                    <td class="align-middle text-wrap" >{{number_format($transaction_item ->m_price)}}</td>
                                    <td class="align-middle text-wrap" >{{number_format($transaction_item ->m_price*$transaction_item->t_quantity)}}</td>
                                    <td class="align-middle text-wrap" >
                                        <form action="my-cart/{{$transaction_item ->t_id }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn  btn-danger" style="display:inline;" onclick="return confirm('Are you sure?')">DELETE</button>

                                        </form>
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$transaction_item->t_id}}">Edit</button> -->
                                    </td>
                          
                                        {{-- update modal --}}

                                    </td>

                                  </tr>
                                  <!-- Create the update modal for each row using a unique ID -->
<div class="modal fade" id="updateModal{{$transaction_item->t_id}}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{$transaction_item->t_id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel{{$transaction_item->t_id}}">Update Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Update form -->
        <form action="my-cart/{{$transaction_item->t_id}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- Input fields to update the data -->
          <div class="form-group">
            <label for="name">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value=" {{ $transaction_item->t_quantity }} ">
            <input type="hidden" class="form-control" id="price" name="price" value=" {{ $transaction_item->m_price }} ">
          </div>
          
          <!-- Add more input fields as needed -->

          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
                                @endforeach
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                        </div>


                @else
                    <p align="center">
                        -- Cart is Empty --
                    </p>
                @endIf
        </div>
    </div>
    
    <hr>

    </div>

    <div class="modal fade" id="updateCartOrder" tabindex="-1" role="dialog" aria-labelledby="updateCartOrderLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCartOrderLabel">Update Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <div class="">
                                <div class="col-sm-12 col-md" align="center">
                                    <img src="" width=100 height=100 id="order-Img">
                                </div>
                                <div class="text-center">
                                    {{-- menu name --}}
                                    <h1><span id="order-Name"></span></h1>
                                    {{-- <br> --}}
                                    {{-- <span id="order-Description"></span> --}}
                                    <div class="">
                                        <div class="">Price: <span id="order-Price"></span></div>
                                    </div>
                                    <div class="">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-dotted" viewBox="0 0 16 16">
                                            <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                          </svg> --}}


                                        <div class="">Qty: <input type="number" name="qty" value="1" min=1 max=10 maxlength=10
                                                 id="order-Qty" style="width: 70px;"></input></div>
{{--
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                                    <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                  </svg> --}}
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>


                        {{-- <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div> --}}
                    </form>
                </div>
                <div class="modal-footer">

                    <div>Total: <span id="order-Total"> </div>
                    <button type="button" class="btn-sm btn-secondary" data-dismiss="modal" id="modal-close-btn">Close</button>
                    <button type="button" class="btn-sm btn-disabled" id="modal-update-btn" disabled>Update</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function click (e) {
          if (!e)
            e = window.event;
          if ((e.type && e.type == "contextmenu") || (e.button && e.button == 2) || (e.which && e.which == 3)) {
            if (window.opera)
              window.alert("");
            return false;
          }
        }
        if (document.layers)
          document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown = click;
        document.oncontextmenu = click;
        </script>
@stop

