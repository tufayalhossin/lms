@extends('instructor.layouts.course')
@section('page-title',"Course Add")
@section('coursecontent',"active")
@section('content-add',"active")
<!-- 
    - tools array 
    - this array will create a dynamic page info and breadcrumb.
 -->
<?php
$infoDonor = [
    "meta" => [
        "title" => "Create Course",
        "description" => "",
        "tags" => "",
    ],
    "breadcrumb" => [
        "title" => "Course",
        "menus" => [
            [
                'active' => false,
                'label' => 'course',
                'action' => route('instructor.course.pricing', [request()->operationID]),
            ],
            [
                'active' => true,
                'label' => 'content',
                'action' => '',
            ],
        ]
    ]
];
$subcategories = [];
?>

@section('content')

<div class="col-sm-8">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 text-dark card-title">{{__("Course")}} {{__("Pricing")}}</h5>
        </div>
        <div class="card-body pt-3">
            <form action="{{route('instructor.course.pricing_store',[request()->operationID])}}" id="coursecontent" method="post">
                @csrf
                <div class="mb-3 pt-3">
                    <h5>Course Price Tier <span class="text-muted">*</span></h5>
                    <p>Take a better meaningful title with in 80 character what will students catch easily.</p>
                </div>
                <div class="row pb-3">
                    <div class="col-4">
                        <select class="form-control" name="currency" id="pricetiers_currency" required>
                            <option value="" selected desiabled>Select Currency</option>
                            @forelse($countries as $country)
                            <option value="{{$country->currency_code}}" <?php echo $course->pricetiers?(($course->pricetiers->currency_code == $country->currency_code)?'selected':''):'';?> data-code="{{$country->currency_code}}">{{$country->currency_code}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-4"> 
                        <select class="form-control" name="pricetiers_id" id="pricetiers_data" required>
                            <option value="" selected desiabled>Select Price</option>   
                            @forelse($coursepricetiers as $pricetier)
                            <option value="{{$pricetier->id}}" <?php echo ($course->pricetiers_id == $pricetier->id)?'selected':'';?>>{{$pricetier->currency->currency_symbol}} {{display_price($pricetier)}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <input type="hidden" value="{{$course->pricetiers_id}}">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">{{__("Save")}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $("#pricetiers_currency").change(function(e) {
        e.preventDefault();
        let code = $('#pricetiers_currency option:selected').attr('data-code');
        $("#pricetiers_data").html('');
       let  options =  `<option value="" selected desiabled>Select Price</option>`;
        $.ajax({
            type: "post",
            url: "{{route('instructor.course.price_ajax',[request()->operationID])}}",
            data: {
                _token: "{{ csrf_token() }}",
                code: code
            },
            dataType: "json",
            success: function(response) {
                $.each(response, function(i, v) {
                    let tirer_display_amount = v.matrix_amount+ "."+v.point_amount;
                    console.log(v);
                    if(tirer_display_amount <= 0){
                        tirer_display_amount = "Free";
                    }
                    options += `<option value="${v.id}">${ v.currency.currency_symbol} ${tirer_display_amount}</option>`;
                });
                $("#pricetiers_data").html(options);
            }
        });
    });


</script>
@endsection