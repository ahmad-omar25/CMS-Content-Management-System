<div class="card-header">
    <form action="{{route($routeName.'.index')}}" method="get">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="{{__('search')}}" aria-label="Amount" value="{{request()->search}}">
                    <div class="input-group-prepend">
                        <button class="btn btn-success" ><i class="la la-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
    <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
        </ul>
    </div>
</div>
