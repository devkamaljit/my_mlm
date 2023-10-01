<x-app-layout>
   
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    {{-- <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                    </li> --}}
                      <li class="nav-item">
                        <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                  <div class="row">
                    <div class="col-sm-12">

                      <div class="statistics-details d-flex align-items-center justify-content-between">
                        {{-- 
                          <div>
                          <p class="statistics-title">Main Wallet{{ $user->withdrawals->sum('amount'); }}</p>
                          <h3 class="rate-percentage">{{ $user->wallet->main_wallet }}</h3>
                          <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                        </div>
                        <div>
                          <p class="statistics-title">Fund Wallet</p>
                          <h3 class="rate-percentage">{{ $user->wallet->fund_wallet }}</h3>
                          <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                        </div> --}}
                        @foreach (json_decode($settings['incomes']) as $ky=>$item)
                            <div>
                                <p class="statistics-title">{{$item; }}</p>
                                <h3 class="rate-percentage">{{ $user->income->$item}}</h3>
                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                            </div>
                        @endforeach
                        
                        
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-lg-8 d-flex flex-column">
              <div class="row ">
                <div class="col-6 grid-margin ">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash">Main Wallet </h4>
                         {{-- <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p> --}}
                        </div>
                       
                      </div>
                      <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                        <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                          <h2 class="me-2 fw-bold">{{ $user->Wallet->main_wallet}}</h2>
                          {{-- <h4 class="me-2">USD</h4><h4 class="text-success">(+1.37%)</h4> --}}
                        </div>
                        <div class="me-3"><div id="marketing-overview-legend"></div></div>
                      </div>
                       
                    </div>
                  </div>
                </div>
                <div class="col-6 grid-margin ">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash">Fund Wallet</h4>
                         {{-- <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p> --}}
                        </div>
                       
                      </div>
                      <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                        <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                          <h2 class="me-2 fw-bold">{{ $user->Wallet->fund_wallet}}</h2>
                          {{-- <h4 class="me-2">USD</h4><h4 class="text-success">(+1.37%)</h4> --}}
                        </div>
                        <div class="me-3"><div id="marketing-overview-legend"></div></div>
                      </div>
                       
                    </div>
                  </div>
                </div>
              </div>
              <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash">Recent Activities</h4>
                         {{-- <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p> --}}
                        </div>
                        {{-- <div>
                          <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                        </div> --}}
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table select-table">
                          <thead>
                            <tr>
                               
                              <th>TID</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th>Credit&Debit</th>
                              <th>Date&Time</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($user->transactions as $incomes)
                            <tr>
                               
                               
                              <td>
                                <h6>{{ $incomes->id}}</h6>
                                 
                              </td>
                              <td>
                                <h6>{{ $incomes->amount}}</h6>
                                 
                              </td>
                              <td>
                                <h6>{{ $incomes->tx_type}}
                                @if ($incomes->tx_type=='income')
                                    ({{ $incomes->income}})
                                @endif
                                </h6>
                                 
                              </td>
                              <td><div class="badge badge-opacity-warning">{{ $incomes->type}}</div></td>
                              <td>
                                <h6>{{ $incomes->created_at}}</h6>
                                 
                              </td>
                               
                            </tr>
                            @endforeach
                            
                            
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
            <div class="col-lg-4 d-flex flex-column">
              <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title card-title-dash">Withdrawals</h4>
                            <div class="add-items d-flex mb-0">
                              <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                              <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                            </div>
                          </div>
                          <div class="list-wrapper">
                            <ul class="todo-list todo-list-rounded">
                              <li class="d-block">
                                <div class="form-check w-100">
                                  
                                  <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3">{{$user->withdrawals->where('status',0)->sum('amount');}}</div>
                                    <div class="badge badge-opacity-warning me-3">Pending</div>
                                     
                                  </div>
                                </div>
                              </li>
                              <li class="d-block">
                                <div class="form-check w-100">
                                  
                                  <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3">{{$user->withdrawals->where('status',1)->sum('amount');}}</div>
                                    <div class="badge badge-opacity-success me-3">Done</div>
                                  </div>
                                </div>
                              </li>
                              <li>
                                <div class="form-check w-100">
                                   
                                  <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3">{{$user->withdrawals->where('status',2)->sum('amount');}}</div>
                                    <div class="badge badge-opacity-danger me-3">Rejected</div>
                                  </div>
                                </div>
                              </li>
                              
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              
              <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                              <h4 class="card-title card-title-dash">Team</h4>
                            </div>
                          </div>
                          <div class="mt-3">
                            <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                              <div class="d-flex">
                                
                                <div class="wrapper ms-3">
                                  <p class="ms-1 mb-1 fw-bold">Directs</p>
                                  <small class="text-muted mb-0">{{$user->directs->count()}}</small>
                                </div>
                              </div>
                              <div class="text-muted text-small">
                                1h ago
                              </div>
                            </div>
                            <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                              <div class="d-flex">
                                 
                                <div class="wrapper ms-3">
                                  <p class="ms-1 mb-1 fw-bold">Generation</p>
                                  <small class="text-muted mb-0">{{ count($user->team->gen)}}</small>
                                </div>
                              </div>
                              <div class="text-muted text-small">
                                1h ago
                              </div>
                            </div>
                             
                              
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </x-app-layout>
    