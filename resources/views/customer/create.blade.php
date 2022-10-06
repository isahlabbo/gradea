
<div class="modal fade" id="addCustomer" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW STAFF</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('customer.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{old('name')}}" name="name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="gender" id="" class="input-group form-control">
                                    <option value="">GENDER</option>
                                    <option value="Male">MALE</option>
                                    <option value="Female">FEMALE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="coupon" id="" class="input-group form-control">
                                    <option value="">COUPON CODE</option>
                                    @foreach(App\Models\Coupon::all() as $coupon)
                                        <option value="{{$coupon->id}}">{{$coupon->percentage}} % off</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="ADDRESS" value="{{old('address')}}" name="address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="EMAIL" value="{{old('email')}}" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="input-group form-control" placeholder="PASSWORD" value="{{old('password')}}" name="password">
                    </div>
                    <button class="btn btn-primary">REGISTER</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>