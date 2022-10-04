
<div class="modal fade" id="edit_{{$customer->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT CUSTOMER</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('customer.update',[$customer->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{$customer->name}}" name="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <select name="gender" id="" class="input-group form-control">
                            <option value="{{$customer->gender}}">{{$customer->gender}}</option>
                            <option value="Male">MALE</option>
                            <option value="Female">FEMALE</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="ADDRESS" value="{{$customer->address}}" name="address">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="EMAIL" value="{{$customer->email}}" name="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" class="input-group form-control" placeholder="NEW PASSWORD"  name="password">
                    </div>
                    <br>
                    <button class="btn btn-primary">UPDATE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>