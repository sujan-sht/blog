  <!-- Footer section -->
  <footer class="footer-section">
    <div class="container">
      <div class="footer-content">
        <div class="footer-logo">
          <a href="{{route('frontend.index')}}">
            @isset($setting->image)
                <img src="{{(asset('logo/'.$setting->image))}}" alt="Logo" width="100px">
            @else
                <img src="{{(asset('logo/logo.png'))}}" alt="Logo" width="100px">
            @endisset
            
        </a>
        </div>
        <div class="footer-copyright">
          <p>
            @isset($setting->footer)
              {{$setting->footer}}        
            @endisset 
          </p>
        </div>
        <div class="social-links">
          <ul>
            <li><a href="@isset($setting->facebook)
              {{$setting->facebook}}        
          @endisset"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="@isset($setting->whatsapp)
              {{$setting->whatsapp}}        
          @endisset"><i class="fab fa-twitter"></i></a></li>
            <li><a href="@isset($setting->linkedin)
              {{$setting->linkedin}}        
          @endisset"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="@isset($setting->twitter)
              {{$setting->twitter}}        
          @endisset"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer section end -->