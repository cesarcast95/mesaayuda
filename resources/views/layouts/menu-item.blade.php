@if ($item["submenu"] == [])
        <a  class="dropdown-item" href="{{url($item['url'])}}">
          <i class="fa {{$item["icono"]}}"></i>
          {{$item["nombre"]}}
          <span class="caret"></span>
        </a>
@else

        <a  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

          {{$item["nombre"]}}
          <span class="caret"></span>
        </a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @foreach ($item["submenu"] as $submenu)
                @include("layouts.menu-item", ["item" => $submenu])
            @endforeach
         </div>
@endif


