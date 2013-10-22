<nav class="st-menu st-effect-2" id="">
     <div id="search">
     <form>
	     <span class="glyphicon glyphicon-search" id="nav-search-icon"></span> 
	     <input class="search-menu" type="text"  placeholder="Search">
     </form>	
     </div>
    
     <div class="menu-brand">
     	 <span class="menu-brand-logo"><img src="{{ asset('img/menu_logo.jpg')}}"></span>
          <span class="menu-brand-name"><h1>{{ trans('siteinfo.brandname') }}</h1></span>
     </div>
       	<ul>
          <li>
             <a class="first" href="#" id="movie">
             <span class="icon icon-fontawesome-webfont icon-big"></span>Movie
             <span class="icon icon-right-open-big icon-small"></span>
             </a>
          </li>
         
          <li>
           	 <a class="" href=""  id="event"> 
             <span class="icon icon-calendar icon-big"></span>Event
             <span class="icon icon-right-open-big icon-small"></span>
             </a>
          </li>
          <li>
             <a class="" href="" id="sport">
             <span class="icon icon-dribbble icon-big"></span>Sport
             <span class="icon icon-right-open-big icon-small"></span>
            </a>
          </li>
          <li class="{{(Route::currentRouteName()=='user.profile')?'active':''}}">
             <a class="" href="" id="transport">
             <span class="icon icon-bus icon-big"></span>Transportation
  			 <span class="icon icon-right-open-big icon-small"></span>
             </a>
          </li>
      
          @if(Sentry::check())
            <li class="{{(Route::currentRouteName()=='user.settings')?'active':''}}">
             <a class="" href="{{URL::route('user.settings')}}" id="setting">
             <span class="icon icon-settings-streamline-1 icon-big"></span>Account Settings
             <span class="icon icon-right-open-big icon-small"></span>
            </a>
          </li>

           <li>
             <a class="" href="{{ URL::route('user.logout')}}" id="logout">
             <span class="icon icon-logout icon-big"></span>Log Out
              <span class="icon icon-right-open-big icon-small"></span>
            </a>
          </li>
          @else
            <li>
               <a class="" href="{{ URL::route('user.login')}}" id="logout">
               <span class="icon icon-login icon-big"></span>Log In
               <span class="icon icon-right-open-big icon-small"></span>
              </a>
            </li>
           @endif

        
        </ul>
</nav>