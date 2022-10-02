@extends('instructor.layouts.course')
@section('page-title',"Course Add")
@section('coursespublish',"active")
@section('promotion',"active")
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
                'action' => route('instructor.course.promotion', [request()->operationID]),
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
<div class="col-sm-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 text-dark card-title">{{__("Course")}} {{__("Promotion")}}</h5>
            @if(solid_price($course->pricetiers)>0)
            <button class="btn btn-outline-primary btn-sm promossionoperation" data-bs-toggle="modal" data-bs-target="#promossionoperation">Create Coupon</button>
            @endif
        </div>
        <div class="card-body pt-3">
            @if(count($promotions)>0)
            <table class="table">
                <tr>
                    <th>{{__("Title")}}</th>
                    <th>{{__("Coupon Type")}}</th>
                    <th>{{__("Coupon Code")}}</th>
                    <th>{{__("Discount")}}</th>
                    <th>{{__("Discount Type")}}</th>
                    <th>{{__("Start Date")}}</th>
                    <th>{{__("End Date")}}</th>
                    <th>{{__("Status")}}</th>
                </tr>
                @forelse($promotions as $key => $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->coupon_type}}</td>
                    <td>{{$value->coupon_code}}</td>
                    <td>{{$value->discount}}</td>
                    <td>{{$value->discount_type}}</td>
                    <td>{{$value->start_date}}</td>
                    <td>{{$value->end_date}}</td>
                    <td>
                        <?php
                        if (isset($value->start_date)) {
                            if (date("Y-m-d", strtotime($value->start_date)) < date("Y-m-d")) {
                                echo "Upcomming";
                            } elseif (date("Y-m-d", strtotime($value->start_date)) >= date("Y-m-d")) {
                                if (date("Y-m-d", strtotime($value->end_date)) >= date("Y-m-d")) {
                                    echo "Running";
                                } else {
                                    echo "Expired";
                                }
                            }
                        }
                        ?>
                    </td>
                </tr>
                @empty
                @endforelse
            </table>
            @else
            <div class="py-5 text-center">
                @if(solid_price($course->pricetiers)>0)
                    <h5>There is no coupon you created.</h5>
                @else
                    <h5>You cannot create coupons for a free course.</h5>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>

<!--section add Modal -->
<div class="modal fade text-left bg-light" id="promossionoperation" tabindex="-1" role="dialog" data-bs-backdrop="false" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="section-crud">{{__("Create")}} {{__("Coupon")}}</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <form action="{{route('instructor.course.promotion_store',[request()->operationID])}}" method="post">
                @csrf
                <div class="modal-body" id="promotion-modal-body">
                </div>
                <div class="modal-footer justify-content-between">
                    <span>Latest price: <strong id="latest_price" class="font-monospace">{{solid_price($course->pricetiers)}}{{$course->pricetiers->currency->currency_code}}</strong></span>
                    <div>
                    <button type="button" class="btn btn-light-secondary close-modal" data-bs-dismiss="modal">
                        <span>Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <span>Save</span>
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on('change', "#thumb-input", function(e) {
        e.preventDefault();
        let thumb = $(this).val();
        if (thumb) {
            let filename = thumb.split("\\")[2];
            $('.submit').removeClass('d-none');
            $('.file-uploader--fake-input-text--2t3aS').html(filename);
        }
    });
    $('.promossionoperation').on('click', function() {
        let sec_id = $(this).attr('data-section');
        // let form_url = "{{route('instructor.course.promotion_create',[request()->operationID])}}";
        // let id = $(this).attr('data-id');
        // $("#lesson-modal-body").parent().attr('action', form_url + "/" + sec_id);
        let url = "{{route('instructor.course.promotion_create',[request()->operationID])}}";
        // console.log(url+"/"+id);
        $.get(url ,
            function(data, textStatus, jqXHR) {
                $("#promotion-modal-body").html(data);
            }
        );
    });
    $(document).on('change','.discount_value',function(){
        let val= $(this).val();
        $("#custom_discount_value").val(0);
        if (val < 1) {
            $("#custom_discount_value").parent().removeClass('d-none');
            $("#custom_discount_value").attr('required',true);
            $("#custom_discount_value").attr('min','.99');
        }else{
            $("#custom_discount_value").parent().addClass('d-none');
            $("#custom_discount_value").attr('required',false);
            $("#custom_discount_value").removeAttr('min');
        }
    });
    $(document).on('change','#discount_type',function(){
        let val= $(this).val();
        $(".discount-block").removeClass('d-none');
        $(".currency_symbol").html('');
        if(val == 'percentage'){
            $(".currency_symbol").html('%');
        }else if(val == 'flat'){
            $(".currency_symbol").html("{{$course->pricetiers->currency->currency_code}}");
        }
        latestPrice();
        console.log(val);
    });
    function latestPrice() { 
        let current_price = "{{solid_price($course->pricetiers)}}";
        console.log(current_price);
     }
</script>
@endsection