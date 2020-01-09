 <!-- reviews and comments -->
 <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card tabCard mt-2 p-2">
            <div class="tab-card-header">
              <ul class="nav nav-tabs" id="crTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="comment-tab" data-toggle="tab" href="#comments-pane" role="tab">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#reviews-pane" role="tab">Reviews</a>
                </li>
              </ul>
            </div>
    
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active p-0" id="comments-pane" role="tabpanel">
                 <div class="card-body commentsCard">
                      <div class="row commentRow">
                          <div class="col-md-2 col-sm-4">
                                <img src="{{asset('backend/assets/images/defaultImages/defaultUser.png')}}" class="rounded-circle avatar" alt="avatar">
                                <div class="text-muted">Dummy User</div>
                          </div>
                          <div class="col-md-10 col-sm-12">
                                <div class="comment">
                                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum qui dolore iure cupiditate fuga beatae quaerat magnam itaque sed repellendus asperiores sequi, illo a sapiente voluptates nostrum quia fugit autem?</p>
                                </div>
                          </div>
                      </div>

                      <div class="row commentRow">
                        <div class="col-md-2 col-sm-4">
                              <img src="{{asset('backend/assets/images/defaultImages/defaultUser.png')}}" class="rounded-circle avatar" alt="avatar">
                              <div class="text-muted">Dummy User</div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                              <div class="comment">
                                  <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum qui dolore iure cupiditate fuga beatae quaerat magnam itaque sed repellendus asperiores sequi, illo a sapiente voluptates nostrum quia fugit autem?</p>
                              </div>
                        </div>
                      </div>
                      <div class="row commentRow">
                        <div class="col-md-2 col-sm-4">
                              <img src="{{asset('backend/assets/images/defaultImages/defaultUser.png')}}" class="rounded-circle avatar" alt="avatar">
                              <div class="text-muted">Dummy User</div>
                        </div>
                        <div class="col-md-10 col-sm-12">
                              <div class="comment">
                                  <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum qui dolore iure cupiditate fuga beatae quaerat magnam itaque sed repellendus asperiores sequi, illo a sapiente voluptates nostrum quia fugit autem?</p>
                              </div>
                        </div>
                      </div>
                 </div>      
              </div>
              
              <div class="tab-pane fade p-3" id="reviews-pane" role="tabpanel">
                <h5 class="card-title">Reviews</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-danger">Go somewhere</a>              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>