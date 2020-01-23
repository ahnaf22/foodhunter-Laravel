<!-- search section -->
<section>
        <div class="container-fluid ">
                <div class="row searchFormContainer">
                    <div class="col-2">

                    </div>
                    <div class="form-group border d-flex col-6">
                        <input type="text" 
                               class="form-control form-control-md" 
                               id="searchShopValue" 
                               onkeyup="searchShop()"
                               placeholder="Search shops here"> 
                    </div>
                    <div class="col-4 searchButtonDiv">
                          <button
                            class="btn btn-outline-danger btn-md"
                            id="searchShop"
                            type="submit"
                            onclick="searchShop()"
                          >
                          Find Shop
                          </button>

                    </div>
                </div>
           </div>
    </section>