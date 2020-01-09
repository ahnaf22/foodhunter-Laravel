<div class="col-md-6 col-sm-12 col-xs-12">
          <div class="card details-card">
            <div class="card-header detailscard-header">
              <h2 class="text-danger">{{$food->title}}</h2>
              <i class="fas fa-store-alt"></i><span> {{$food->shop->name}}</span> <br />
              <i class="fas fa-map-marker-alt mt-2"></i>
              <span>{{$food->shop->location}}</span><br />
              <!-- <small class="text-muted">1.5 km away from you</small> -->
            </div>
            <div class="card-body">
              <p class="text-justify">
                     {{
                       $food->description
                     }}
              </p>
              <p><Strong>Items</Strong></p>
              <p>
                3 quarter pieces of chickens <br />
                Polao for 3 people <br />
                Lacchi/borhani/coke <br />
                water 1.5 litre <br />
                additional food items will be charged
              </p>
            </div>
          </div>
</div>