<nav id="my-nav" @if( Request::is('blog') || Request::is('blog/*')) style="background-color: #FAFAFA; position: relative;" @endif>
          <div class="bar container">
            @unless( Request::is('blog') || Request::is('blog/*'))  
            <a class="logo" href=""><img src="/images/iv-social.png"></a>
            @endunless
            
            @unless($menuButton || $submitButton || $blogButton)
               <a class="toggle">
                <span class="toggle-icon top-bar" @if( Request::is('blog')) style="background-color: #01579B" @endif></span>
                <span class="toggle-icon middle-bar" @if( Request::is('blog')) style="background-color: #01579B" @endif></span>
                <span class="toggle-icon bottom-bar" @if( Request::is('blog')) style="background-color: #01579B" @endif></span>
               </a>
            @endunless
            @if($menuButton)
            <div class="menu-item">{{ link_to_action('HomeController@index', $menuButton) }}</div>
            @endif

            @if($submitButton)
            <div class="menu-item">
              <label for="submit-form">{{ $submitButton }}</label>
            </div>
            @endif

            @if($blogButton)
             <div class="menu-item"><a href="/blog{{ $queryString }}">{{ $blogButton }}</a></div>
            @endif
          </div>
          <div class="nav-background text-center row">
          <ul class="list-unstyled nav-list col-md-12">
            <li id="home" class="nav-list-item"><a href="/" class="animsition-link">Home</a></li> 
              <li id="about" class="nav-list-item"><a href="/about" class="animsition-link">About</a></li>
              <li id="smallgroup" class="nav-list-item"><a href="/smallgroups" class="animsition-link">Small Groups</a></li>
              <li id="contact" class="nav-list-item"><a href="/contact" class="animsition-link">Contact</a></li>
          </ul>
         
        </div>
        </nav>