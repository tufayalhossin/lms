<div class="col-12">
  @if(Session::has('warning'))
   <div class="alert alert-warning alert-dismissible text-white border-0 fade show" role="alert">
       <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
       <i class="dripicons-warning me-2"></i> {!! Session::get('warning') !!}
   </div>
   @endif
   @if(Session::has('success'))
   <div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert">
       <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
       <i class="dripicons-checkmark me-2"></i> {!! Session::get('success') !!}
   </div>
   @endif
   @if(Session::has('info'))
   <div class="alert alert-info alert-dismissible text-white border-0 fade show" role="alert">
       <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
       <i class="dripicons-information me-2"></i> {!! Session::get('info') !!}
   </div>
   @endif
   @if($errors->any())
   <div class="alert alert-danger alert-dismissible text-white border-0 fade show" role="alert">
   <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
       <i class="dripicons-wrong me-2"></i> Warning!
       <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif
   </div>