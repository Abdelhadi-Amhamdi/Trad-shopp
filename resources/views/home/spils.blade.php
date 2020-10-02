

<div id="pills">
                <ul class="nav flex-column nav-pills">
                            <li class="nav-item">
                                <img src="{{asset('img/logo/logo.gif')}}" > <h1>Wood</h1>
                            </li><br>
                            @if(Auth::user()->is_admin)
                            <li class="nav-item">
                                <a href="{{'home'}}" class="nav-link"><i class="fa fa-home"></i> Home
                                <span class="badge badge-pill badge-success">@{{data.length}} item</span>
                            </a>

                            </li><br>
                            <li class="nav-item">
                                <a href="{{'order'}}" class="nav-link"><i class="fa fa-server"></i> Orders
                                <span class="badge badge-pill badge-success">@{{ordersData.length}} order</span>
                            </a>
                            </li><br>
                            @endif
                            @if(!Auth::user()->is_admin)
                            <li class="nav-item">
                                <a href="{{'cards'}}" class="nav-link"><i class="fa fa-shopping-bag"></i> Cards
                                <span class="badge badge-pill badge-success">@{{dataCards.length}} item</span>
                            </a>
                            </li><br>
                            @endif
                            <li class="nav-item">
                                <a href="{{'saves'}}" class="nav-link"><i class="fa fa-save"></i> Saved Items
                                <span class="badge badge-pill badge-success">@{{dataSaves.length}} save</span>
                            </a>
                            </li><br>
                            <li class="nav-item">
                                <a href="{{'info'}}" class="nav-link"><i class="fa fa-address-book"></i> Infos</a>
                            </li><br>

                </ul>


    </div>
