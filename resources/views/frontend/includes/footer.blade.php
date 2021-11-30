  <!-- Footer section -->
  <footer class="footer-section">
    <div class="container">
      <div class="footer-content">
        <div class="footer-logo">
          <a href="{{route('frontend.index')}}">
            <img src="{{asset('logo/'.$setting->image)}}" alt="" class="rounded float-left" style="width:100px;">
        </a>
        </div>
        <div class="footer-copyright">
          <p>{{$setting->footer}} </p>
        </div>
        <div class="social-links">
          <ul>
            <li><a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a></li>
            <li><a href="{{$setting->whatsapp}}"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="{{$setting->linkedin}}"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer section end -->