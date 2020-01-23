@extends('frontend.layouts.master')


@section('content')

  @include('frontend.shopFiles.header')
  @include('frontend.shopFiles.searchbox')
  @include('frontend.shopFiles.shops')

@endsection


@push('custom-scripts')
<Script>

          function searchShop()
          {

              var searchValue=$("#searchShopValue").val();
              var url= "{{route('search.shops')}}";
              //alert(searchValue);
              
              $.get(url, 
                { 
                    search_string: searchValue

                })
              .done(function( data ) {
                  
                  $("#shopContainer").html(data);
                  
                  
              });
              
          }

</Script>
@endpush