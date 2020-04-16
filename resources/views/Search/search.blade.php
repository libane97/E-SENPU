<form action="{{route('products.search')}}" class="d-flex mr-3">
    @csrf
    <div class="form-group mb-0 mr-0">
        <input type="text" name="q" class="form-control" value="{{request()->q ?? ''}}">
    </div>
    <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
