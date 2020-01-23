<form action="{{route('basket.store')}}" method="POST">
    @csrf
    <input type="hidden" name="food_id" value="{{$food->id}}">
    <button
        class="btn btn-outline-danger btn-rounded btn-md my-4"
        type="submit"
        
        >
         Add to Basket
    </button>

</form>
