<nav class="admin-nav-bar navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if(isset($page))
                    <li class=""><a href="{{ $page->getEditUrl() }}">{{ trans('page::pages.edit-page') }}</a></li>
                @endif
                <li class=""><a href="{{ route('dashboard.index') }}">{{ trans('core::core.back to backend') }}</a></li>
            </ul>
        </div>
    </div>
</nav>
