   

    @if(Session::has('warning'))
        <div class="col-sm-12 mb-3" id="flashmessage" style="padding: 0 15px;">
        <div  style="width: 100%; margin:0 auto" class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered" role="alert">
            <button class="close" type="button" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            {!! Session::get('warning') !!}&nbsp;&nbsp;&nbsp;
        </div>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="col-sm-12 mb-3" id="flashmessage" style="padding: 0 15px;">
        <div  style="width: 100%; margin:0 auto" class="alert alert-success alert-styled-left alert-arrow-left alert-bordered" role="alert">
            <button class="close" type="button" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            {!! Session::get('success') !!}&nbsp;&nbsp;&nbsp;
        </div>
        </div>
    @endif
    @if(Session::has('info'))
        <div class="col-sm-12 mb-3" id="flashmessage" style="padding: 0 15px;">
        <div  style="width: 100%; margin:0 auto" class="alert alert-info alert-styled-left alert-arrow-left alert-bordered" role="alert">
            <button class="close" type="button" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            {!! Session::get('info') !!}&nbsp;&nbsp;&nbsp;
        </div>
        </div>
    @endif
    @if($errors->any())
        <div class="col-sm-12 mb-3" id="flashmessage" style="padding: 0 15px;">
            <div  style="width: 100%; margin:0 auto" class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered" role="alert">
                <button class="close" type="button" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">Warning!</span> 
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
            </div>
        </div>
    @endif

