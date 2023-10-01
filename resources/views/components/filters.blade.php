

<form action="" method="get">
    <div class="form-inline">
        <div class="form-group">
            <input type="text" class="" name="search" value="{{ request()->input('search')}}">
        </div>
        <div class="form-group">
            <input type="submit" class="" value="Filter">
        </div>
    </div>
    
</form>