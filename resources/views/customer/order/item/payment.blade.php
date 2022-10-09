
<div class="modal fade" id="addPaymentMethod" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>UPDATE ORDER</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('customer.order.update',[$order->customer->id, $order->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <select name="payment" id="" class="input-group form-control">
                            <option value="">Payment Method</option>
                            @foreach(App\Models\PaymentMethod::all() as $payment)
                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="delivery" id="" class="input-group form-control">
                            <option value="">Delivery Method</option>
                            @foreach(App\Models\Delivery::all() as $delivery)
                                <option value="{{$delivery->id}}">{{$delivery->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button class="btn btn-primary">SAVE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>