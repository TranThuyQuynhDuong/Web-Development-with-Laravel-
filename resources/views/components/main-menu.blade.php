<div class="container">
    <div class="row">
        <div class="col-sm-9">
            {{-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> --}}
            <div class="mainmenu pull-left">
                <ul class="nav navbar-nav collapse navbar-collapse">
                        @foreach ($listmenu as $rowmenu)
                            <x-main-menu-item :rowmenu="$rowmenu" />
                        @endforeach
                </ul>
            </div>
        </div>
        
    </div>
</div>
</div><!--/header-bottom-->



