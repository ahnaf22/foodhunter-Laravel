@extends('backend.layouts.master')

@section('content') 
      <div class="mt-2 ">
            <!-- dashboard header -->
           <div class="foodhunterDashboard">
               <div class="aboutLayer text-right">
                  <div class="aboutHeaders">
                  <h1>Welcome to Dash-Board</h1>
                  <h4 class="btn bg-light">Keep Tracks here</h4> <br>
                  <a href="{{route('homePage')}}" target="_blank" class="btn btn-danger btn-xs">Go to the site</a>
               </div>
               <hr>
           </div>
           
      </div>
  
@endsection