<div class="container p-4">
   <div class="card">
       <div class="p-4 text-danger"><h5>Order Info <i class="fas fa-file-invoice"></i></h5> </div>
        <div class="row p-4">
            <div class="col-12 p-4">
                <div>Order type: </div>
                    <label for="chkYes">
                        <input type="radio" id="chkYes" name="chkPinNo" /> Home Delivery
                    </label>
                    <label for="chkNo">
                        <input type="radio" id="chkNo" name="chkPinNo" /> Dine In
                    </label>
                    <hr>
                    <div id="dvPinNo" style="display: none">
                    Pin No:
                    <input type="text" id="txtPinNo" />
                </div>
            </div>
        </div>
   </div>
</div>

@push('custom-scripts')
<script>
        $(function() {
            $("input[name='chkPinNo']").click(function() {
                if ($("#chkYes").is(":checked")) {
                $("#dvPinNo").show();
                } else {
                $("#dvPinNo").hide();
                }
            });
        });
</script>
@endpush

