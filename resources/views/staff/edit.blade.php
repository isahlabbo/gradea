
<div class="modal fade" id="edit_{{$staff->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT STAFF</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('staff.update',[$staff->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{$staff->name}}" name="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <select name="gender" id="" class="input-group form-control">
                            <option value="{{$staff->gender}}">{{$staff->gender}}</option>
                            <option value="Male">MALE</option>
                            <option value="Female">FEMALE</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="ADDRESS" value="{{$staff->address}}" name="address">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="EMAIL" value="{{$staff->email}}" name="email">
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