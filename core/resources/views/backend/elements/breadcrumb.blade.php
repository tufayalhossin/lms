   <!-- start page title -->
   <div class="row">
       <div class="col-12">
           <div class="page-title-box">
               <div class="page-title-right">
                   <ol class="breadcrumb m-0">
                       @dd($breadcrumb)
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__("Home")}}</a></li>
                       @forelse($breadcrumb->menus as $value)
                       @if($value->active == true)
                       <li class="breadcrumb-item active">{{__($value->label)}} </li>
                       @else
                       <li class="breadcrumb-item"><a href="{{__($value->action)}}">{{__($value->label)}} </a></li>
                       @endif
                       @empty
                       @endforelse
                   </ol>
               </div>
               <h4 class="page-title">{{($breadcrumb)?$breadcrumb->title:''}} </h4>
           </div>
       </div>
   </div>
   <!-- end page title -->