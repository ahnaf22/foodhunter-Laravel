
// add xcsrf token for  ajax requests
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });




// add to cartdynamically
function addtoBasket(foodid,authid,authtype,usershopid)
{
    $.post( "http://localhost:8000/api/basket/store", 
      { 
          food_id: foodid,
          auth_id: authid,
          user_type: authtype,
          user_shopid: usershopid

      })
     .done(function( data ) {
         data= JSON.parse(data);
         console.log(data);
         if(data.hasOwnProperty('url'))
         {
            window.location= data.url;
         }
         else{
           
           if(data.success == 'success')
           {
             
           }

         }
         
    });

}

