
<div class="modal fade" id="edit_{{$product->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT PRODUCT</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('category.collection.product.update',[$category->id, $product->id])}}" method="post">
                    @csrf
                    <img  src="{{$product->picture()}}" alt="#" width="200" height="140"/>
                    <input type="hidden" name="collection" value="{{$collection->id}}">
                    <div class="form-group row">
                        <div class="col-sm-6"><label for="">Change {{$category->name}} Image</label></div>
                        <div class="col-sm-6">
                            <input type="file" class="input-group form-control" placeholder="TITLE" value="{{old('image')}}" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="number" class="input-group form-control" placeholder="QUANTITY" value="{{$product->quantity}}" name="quantity">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="TITLE" value="{{$product->title}}" name="title">
                    </div>
                    
                    <div class="form-group">
                       <textarea name="description" class="form-control" id="" cols="30" rows="4" placeholder="write some thing about this product">{{$product->description}}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <input type="number" inputmode="numeric" class="input-group form-control" placeholder="PRICE" value="{{$product->price}}" name="price">
                    </div>
                    
                    <button class="btn btn-primary">UPDATE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>