<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
   
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
                        
                        <?php $__currentLoopData = json_decode($settings['incomes']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <p class="statistics-title"><?php echo e($item); ?></p>
                                <h3 class="rate-percentage"><?php echo e($user->income->$item); ?></h3>
                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                       
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
                         
                        </div>
                       
                      </div>
                      <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                        <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                          <h2 class="me-2 fw-bold"><?php echo e($user->Wallet->main_wallet); ?></h2>
                          
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
                         
                        </div>
                       
                      </div>
                      <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                        <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                          <h2 class="me-2 fw-bold"><?php echo e($user->Wallet->fund_wallet); ?></h2>
                          
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
                         
                        </div>
                        
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
                            <?php $__currentLoopData = $user->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incomes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                               
                               
                              <td>
                                <h6><?php echo e($incomes->id); ?></h6>
                                 
                              </td>
                              <td>
                                <h6><?php echo e($incomes->amount); ?></h6>
                                 
                              </td>
                              <td>
                                <h6><?php echo e($incomes->tx_type); ?>

                                <?php if($incomes->tx_type=='income'): ?>
                                    (<?php echo e($incomes->income); ?>)
                                <?php endif; ?>
                                </h6>
                                 
                              </td>
                              <td><div class="badge badge-opacity-warning"><?php echo e($incomes->type); ?></div></td>
                              <td>
                                <h6><?php echo e($incomes->created_at); ?></h6>
                                 
                              </td>
                               
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            
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
                                    <div class="ps-4 text-small me-3"><?php echo e($user->withdrawals->where('status',0)->sum('amount')); ?></div>
                                    <div class="badge badge-opacity-warning me-3">Pending</div>
                                     
                                  </div>
                                </div>
                              </li>
                              <li class="d-block">
                                <div class="form-check w-100">
                                  
                                  <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3"><?php echo e($user->withdrawals->where('status',1)->sum('amount')); ?></div>
                                    <div class="badge badge-opacity-success me-3">Done</div>
                                  </div>
                                </div>
                              </li>
                              <li>
                                <div class="form-check w-100">
                                   
                                  <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3"><?php echo e($user->withdrawals->where('status',2)->sum('amount')); ?></div>
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
                                  <small class="text-muted mb-0"><?php echo e($user->directs->count()); ?></small>
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
                                  <small class="text-muted mb-0"><?php echo e(count($user->team->gen)); ?></small>
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
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
    <?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/projects/mlm/p4/resources/views/dashboard.blade.php ENDPATH**/ ?>