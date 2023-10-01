<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
       
        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Account</li>
      <li class="nav-item">       
        <a class="nav-link" href="<?php echo e(route('profile.edit')); ?>">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item nav-category">Team Section</li>
      <li class="nav-item">       
        <a class="nav-link" href="<?php echo e(route('team.directs')); ?>">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Directs</span>
        </a>
      </li>
      <li class="nav-item">       
        <a class="nav-link" href="<?php echo e(route('team.generation')); ?>">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Generation</span>
        </a>
      </li>
      <li class="nav-item nav-category">Membership</li>
      <li class="nav-item">       
        <a class="nav-link" href="<?php echo e(route('investment.topup')); ?>">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Topup</span>
        </a>
      </li>
      <li class="nav-item">       
        <a class="nav-link" href="<?php echo e(route('investment.investments')); ?>">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Investments</span>
        </a>
      </li>
      <li class="nav-item nav-category">Withdrawal</li>
      <li class="nav-item">       
        <a class="nav-link" href="<?php echo e(route('withdrawal.withdraw')); ?>">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Withdraw</span>
        </a>
      </li>
      <li class="nav-item nav-category">History</li>
      <li class="nav-item">       
        <a class="nav-link" href="<?php echo e(route('transactions.all')); ?>">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Transactions</span>
        </a>
      </li>
      
      
      <li class="nav-item">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
          <?php echo csrf_field(); ?>

          <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                              this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                              this.closest(\'form\').submit();']); ?>
              <?php echo e(__('Log Out')); ?>

           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
      </form>       
        
      </li>
      
    </ul>
  </nav><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/projects/mlm/p4/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>