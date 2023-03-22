@extends('layouts.admin')

@section('content')
     <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
          <form action="{{url('insert-products')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Choose Category</label>
                    <select name="categories" class="form-control @error('category') is-invalid @enderror">
                        <option value="">select</option>
                        @foreach(App\Models\Category::all() as $key=> $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach

                    </select>
                   
                </div>

                <div class="col-md-6">
                    <label for="">Choose Subcategory</label>
                    <select name="subcategory"
                        class="form-control @error('subcategory') is-invalid @enderror">
                        <option value=" ">select</option>
                    </select>
                </div><br>
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" rows="3"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number"class="form-control" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number"class="form-control" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number"class="form-control" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number"class="form-control" name="qty">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title"class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                  <textarea name="meta_keywords" id="" rows="3" class="form-control"></textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                  <textarea name="meta_description" id="" rows="3" class="form-control"></textarea>
                </div>

                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
          </form>
        </div>
    </div> 
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

$('select[name="categories"]').on('change', function(){
    var categoryId = $(this).val();
    if(categoryId) {
        $.ajax({
            url: 'subcategories/'+categoryId,
            type:"GET",
            dataType:"json",
            success:function(data) {

                $('select[name="subcategory"]').empty();

                $.each(data, function(key, value){

                    $('select[name="subcategory"]').append('<option value="'+ key +'">' + value + '</option>');

                });
            },
        });

    } else {
        $('select[name="subcategory"]').empty();
    }

});

});
</script>