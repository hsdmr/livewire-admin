<div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2)=='')active" aria-current="page @endif" href="{{route('admin.dashboard')}}">
            <i class="fas fa-home"></i>
            {{__('main.Dashboard')}}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2)=='post')active" aria-current="page @endif" href="{{route('admin.post')}}">
            <i class="fas fa-copy"></i>
            {{__('main.Posts')}}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2)=='user')active" aria-current="page @endif" href="#">
            <i class="fas fa-user"></i>
            {{__('main.Users')}}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2)=='media')active" aria-current="page @endif" href="{{route('admin.media')}}">
            <i class="fas fa-media"></i>
            {{__('main.Media')}}
          </a>
        </li>
    </ul>
</div>
