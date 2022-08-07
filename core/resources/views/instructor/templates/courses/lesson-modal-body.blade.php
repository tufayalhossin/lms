@if($lessondata)

<input type="hidden" id="lesson-section-id" value="{{$lessondata->section_id}}" name="section_id">
<div class="form-group">
    <label>Title: <pub class="text-danger">*</pub></label>
    <input type="text" placeholder="Enter a title" name="title" value="{{$lessondata->title}}" id="modal-lesson-name" class="form-control">
    <sub>Note: Maximum 100 character.</sub>
</div>
<div class="form-group"  >
    <label>Description: <pub class="text-danger">*</pub></label>
    <textarea name="lecture_description"  class="form-control lecture_description summernote" rows="3">{{$lessondata->lecture_description}}</textarea>
</div>
@else

<input type="hidden" id="lesson-section-id"  value="{{$section_id}}" name="section_id">
<div class="form-group">
    <label>Title: <pub class="text-danger">*</pub></label>
    <input type="text" placeholder="Enter a title" name="title"  id="modal-lesson-name" required class="form-control">
    <sub>Note: Maximum 100 character.</sub>
</div>

<div class="form-group"  >
    <label>Description: <pub class="text-danger">*</pub></label>
    <textarea name="lecture_description"  class="form-control lecture_description summernote" rows="3"></textarea>
</div>
@endif
