<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>ADD TO CART</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<!-- Start Contact -->

<div class="contact-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                {{-- <form action="" method="post"> --}}

                    <table align="center" border="1" cellspacing="14" cellpadding="12" style="color: black; width:50%">

                        <tr align="center">

                            <td style="color: red"> Product ID </td>
                            <td> <input type="hidden" name="pid"
                                    value="{{ $data['menu'][0]['id'] }}">{{ $data['menu'][0]['id'] }}</td>

                        </tr>

                        <tr align="center">
                            <td style="color: red"> Menu </td>
                            <td> <input type="hidden" name="uid"
                                    value="{{ $data['menu'][0]['name'] }}">{{ $data['menu'][0]['name'] }}</td>
                        </tr>
                        <tr align="center">
                            <td style="color: red"> Price </td>
                            <td> <input type="hidden" name="price" id="price"
                                    value="{{ $data['menu'][0]['price'] }}">{{ $data['menu'][0]['price'] }}</td>
                        </tr>
                        <tr align="center">
                            <td style="color: red"> Quantity</td>
                            <td> <input type="number" name="qty" value="1" min=1 max=10 required id='qty'></td>
                        </tr>
                        </tr>
                        <tr align="center">
                            <td style="color: red"> Total</td>
                            <td> <span id='total'> 0 <span> </td>
                        </tr>

                        <tr align="center">
                            <td colspan="4"> <input type="submit" name="sb" value="Add to Cart" id='btn-add-to-cart' class="btn btn-common"></td>
                        </tr>
                    </table>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<!-- End Contact -->

@section('scripts')
<script>
$( document ).ready(function() {

    calculateTotal();

    // Add to cart Button
    $('#btn-add-to-cart').on('click', function(){
        addToCart();
    });

    $('#qty').on('change', function() {
        calculateTotal();
    });

    function calculateTotal() {
        let price = parseFloat($('#price').val());
        let qty = parseFloat($('#qty').val());
        let newTotalValue = price * qty ;
        $('#total').text(newTotalValue);
    }

    function addToCart() {
        let menuItemId = {!! json_encode($data['menu'][0]['id']) !!}
        let quantity = parseFloat($('#qty').val());
        let customerId = {!! json_encode($data['userId']) !!};
        postAddToCart(menuItemId, quantity, customerId)
    }

    function postAddToCart(menuItemId, quantity, customerId) {
        $.ajax({
            type: "POST",
            url: "/api/customer/add-to-cart",
            data: {
                'menu_item_id': menuItemId,
                'quantity': quantity,
                'customer_id': customerId
            },
            success : function(response){
                if (response.success == true) {
                    alert('Item is added to Cart.')
                    let menu = {!! json_encode(route('customer-menu')) !!};
                    window.location.replace(menu);
                    return;
                }
                alert('Something went wrong.');
                return;
            }
        });
    }
});
</script>
@endsection
