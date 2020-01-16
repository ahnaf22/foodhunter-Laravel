<div class="container p-4">
   <div class="card">
       <div class="p-4 text-danger"><h5>Order Info <i class="fas fa-file-invoice"></i></h5> </div>
        <div class="row p-4">
            @include('frontend.partials.messages')
            <div class="col-12 p-4">
                <form class="p-4" style="color: #757575;"  method="POST" action="{{ route('checkout.store') }}" >
                @csrf  
                    <!-- phone num -->
                    <div class="md-form">
                        <input id="phone" 
                            type="text" 
                            class="form-control" 
                            name="phone" 
                            placeholder="Enter orderer's phone" required
                            autofocus />
                    </div>
                    
                     <!-- order type -->
                    <div class="md-form p-4">
                            <div class="row">
                                <p>Order type: </p>
                                <label for="homedelivery">
                                    <input type="radio" id="homedelivery" value="home delivery" name="chktype" required /> Home Delivery 
                                </label>
                                <label for="homedelivery">
                                    <input type="radio" id="dinein" value="dine in" name="chktype" required /> Dine In 
                                </label>
                            </div>
                            <hr>
                            <!-- divs for orer types -->
                            <div id="dineindiv" style="display: none;" class="bg-danger container text-white p-4">
                                <p>Enter the time when you want to come</p>
                                <input type="text" id ="dinetime" name="dinetime" required placeholder="Dine in time like 10 a.m, 2 p.m" class="form-control"/>
                            </div>
                            <div id="homedeliverydiv" style="display: none" class="bg-danger container text-white p-4">
                                <p>Enter delivery address</p>
                                <input type="text" id ="address" name="address" required placeholder="Home delivery address" class="form-control"/>
                            </div>
                    </div>

                    <!-- instructions-->
                    <div class="md-form">
                        <input id="instructions" 
                            type="text" 
                            class="form-control" 
                            name="instructions" 
                            placeholder="Instruction to the seller"
                            />
                    </div>
                      
                    <input type="hidden" name="shop_id" value="{{$shopid}}">
                    <input type="hidden" name="totalprice" value="{{$totalprice}}">
                    <!-- confirm order button -->
                    <div class="md-form text-center">
                        <button
                            class="btn btn-outline-danger btn-md btn-rounded  my-4"
                            type="submit"
                        >
                            confirm order
                        </button>
                    </div>
                    

                </form>
            </div>
        </div>
   </div>
</div>





@push('custom-scripts')
<script>
        $(function() {
            $("input[name='chktype']").click(function() {
                if ($("#homedelivery").is(":checked")) {
                    $("#homedeliverydiv").show();
                    $("#dineindiv").hide();
                    $("#dinetime").removeAttr('required');
                    $("#address").attr('required','required');
                } else {
                    $("#homedeliverydiv").hide();
                    $("#dineindiv").show();
                    $("#address").removeAttr('required');
                    $("#dinetime").attr('required','required');
                }
            });
        });
</script>
@endpush

