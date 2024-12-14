<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    @include('partials.head')
    <body class="site com_content view-category layout-blog no-task itemid-101">
        <div class="body" id="top">
            <div class="container">
                @include('partials.header')
                @include('partials.navigation')
                <div class="row-fluid">
                    <main id="content" role="main" class="span12">
                        <!-- Begin Content -->
                        @include('partials.header-image')
                        @include('partials.bread-crumb')
                        <div id="system-message-container">
                            @include('partials.system-messages')
                        </div>
                        <div class="blog" itemscope itemtype="https://schema.org/Blog">
                            @yield('content')
                        </div>
                    </main>
                    <div id="aside" class="span3">
                        <!-- Begin Right Sidebar -->
                        <!-- include('partials.calllookup')-->

                        @include('partials.latest-posts')

                        @include('partials.blog-feed')

                        <!-- End Right Sidebar -->
                    </div>
                </div>
                <div>@include('partials.copy-message')</div>
                <?php if (Setting::has('core::analytics-script')): ?>
                {!! Setting::get('core::analytics-script') !!}
                <?php endif; ?>

                @stack('js-stack')

                @include('partials.footer-scripts')
            </div>
        </div>
    </body>
</html>
