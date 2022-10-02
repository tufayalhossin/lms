@if($promotion)

<div class="form-group">
    <label>Type: <pub class="text-danger">*</pub></label>
    <select name="coupon_type" id="coupon_type"  class="form-control">
        <option <?php if($promotion->coupon_type == "best_price"){echo 'selected';}?> value="best_price">Best Price</option>
        <option <?php if($promotion->coupon_type == "custom_price"){echo 'selected';}?> value="custom_price">Custom Price</option>
        <option <?php if($promotion->coupon_type == "free_open"){echo 'selected';}?>value="free_open">Free Open</option>
    </select>
</div>


@else

<input type="hidden" id="currency_symbol" value="">
<div class="form-group">
    <label>Type: <pub class="text-danger">*</pub></label>
    <select name="coupon_type" id="coupon_type"  class="form-control" required>
        <option value="" selected disabled>Select Type </option>
        <option value="best_price">Best Price</option>
        <option value="custom_price">Custom Price</option>
        <option value="free_open">Free Open</option>
    </select>
</div>

<div class="mb-3">
  <label for="coupon_code" class="form-label">Coupon Code</label>
  <input type="coupon_code" class="form-control" id="coupon_code" placeholder="Write your coupon code.">
</div>

<div class="form-group">
    <label>Discount Type: <pub class="text-danger">*</pub></label>
    <select name="discount_type" id="discount_type"  class="form-control" required>
        <option value="" selected disabled>Select Type </option>
        <option value="flat">Flat</option>
        <option value="percentage">Percentage</option>
    </select>
</div>
<div class="discount-block d-none">
<label>Discount: <pub class="text-danger">*</pub></label>
<div class="form-check">
  <input class="form-check-input discount_value" value="10" type="radio" name="discount_value" id="discount_value1">
  <label class="form-check-label" for="discount_value1">
     10 <span class="currency_symbol font-monospace"></span>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input discount_value"  value="20"  type="radio" name="discount_value" id="discount_value2">
  <label class="form-check-label" for="discount_value2">
   20 <span class="currency_symbol font-monospace"></span>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input discount_value"  value="30"  type="radio" name="discount_value" id="discount_value3">
  <label class="form-check-label" for="discount_value3">
   30 <span class="currency_symbol font-monospace"></span>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input discount_value"  value="40"  type="radio" name="discount_value" id="discount_value4">
  <label class="form-check-label" for="discount_value4">
   40 <span class="currency_symbol font-monospace"></span>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input discount_value"  value="50"  type="radio" name="discount_value" id="discount_value5">
  <label class="form-check-label" for="discount_value5">
   50 <span class="currency_symbol font-monospace"></span>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input discount_value"  value="0"  type="radio" name="discount_value" id="discount_value0">
  <label class="form-check-label" for="discount_value0">
    Custom price
  </label>
</div>
</div>


<div class="input-group d-none">
  <input type="number" class="form-control"  placeholder="0.00"  max="{{solid_price($course->pricetiers)}}" name="custom_discount_value"  id="custom_discount_value">
  <span class="input-group-text currency_symbol font-monospace">$</span>
</div>


@endif
