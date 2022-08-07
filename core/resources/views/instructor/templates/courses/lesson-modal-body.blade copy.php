@if($lessondata)

<input type="hidden" id="lesson-section-id" value="{{$lessondata->section_id}}" name="section_id">
<div class="form-group">
    <label>Title: <pub class="text-danger">*</pub></label>
    <input type="text" placeholder="Enter a title" name="title" value="{{$lessondata->title}}" id="modal-lesson-name" class="form-control">
    <sub>Note: Maximum 100 character.</sub>
</div>
<div class="form-group">
    <label>Type: <pub class="text-danger">*</pub></label>
    <select name="type" id="lesson-type"  class="form-control">
        <option <?php if($lessondata->mediaFirst->type == "youtube"){echo 'selected';}?> value="youtube">Youtube</option>
        <option <?php if($lessondata->mediaFirst->type == "vimeo"){echo 'selected';}?> value="vimeo">Vimeo</option>
        <option <?php if($lessondata->mediaFirst->type == "link"){echo 'selected';}?> value="link">Link</option>
        <option <?php if($lessondata->mediaFirst->type == "file"){echo 'selected';}?> value="file">file</option>
        <option <?php if($lessondata->mediaFirst->type == "document"){echo 'selected';}?> value="document">Document</option>
        <option <?php if($lessondata->mediaFirst->type == "image"){echo 'selected';}?> value="image">Image</option>
        <option <?php if($lessondata->mediaFirst->type == "iframe"){echo 'selected';}?> value="iframe">Iframe</option>
    </select>
</div>

<div class="form-group">
    <label>Link: <pub class="text-danger">*</pub></label>
    <input type="text" placeholder="Enter your link" name="link" id="modal-lesson-link" class="form-control">
    <sub>Note: Maximum 100 character.</sub>
</div>
@else

<input type="hidden" id="lesson-section-id"  value="{{$section_id}}" name="section_id">
<div class="form-group">
    <label>Title: <pub class="text-danger">*</pub></label>
    <input type="text" placeholder="Enter a title" name="title"  id="modal-lesson-name" required class="form-control">
    <sub>Note: Maximum 100 character.</sub>
</div>

<div class="form-group">
    <label>Type: <pub class="text-danger">*</pub></label>
    <select name="type" id="lesson-type"  class="form-control" required>
        <option value="" selected disabled>Select Type </option>
        <option value="youtube">Youtube</option>
        <option value="vimeo">Vimeo</option>
        <option value="link">Link</option>
        <option value="file">file</option>
        <option value="document">Document</option>
        <option value="image">Image</option>
        <option value="iframe">Iframe</option>
    </select>
</div>

<div class="form-group  d-none"  id="modal-lesson-link" >
    <label>Link: <pub class="text-danger">*</pub></label>
    <input type="text" placeholder="Enter your link" name="resourse[link]" class="form-control type-block">
</div>
<div class="form-group d-none"  id="modal-lesson-file" >
    <label>Link: <pub class="text-danger">*</pub></label>
    <input type="file" name="resourse[file]" class="form-control type-block">
</div>
<div class="form-group d-none"  id="modal-lesson-document" >
    <label>Document: <pub class="text-danger">*</pub></label>
    <input type="file" name="resourse[document]" class="form-control type-block">
</div>
<div class="form-group d-none"  id="modal-lesson-image" >
    <label>Image: <pub class="text-danger">*</pub></label>
    <input type="file" name="resourse[image]" class="form-control type-block">
</div>
<div class="form-group d-none"  id="modal-lesson-iframe" >
    <label>Iframe: <pub class="text-danger">*</pub></label>
    <textarea name="resourse[iframe]"  class="form-control type-block" rows="2"></textarea>
</div>
<div class="form-group" >
    <label>Duration: <pub class="text-danger">*</pub></label>
    <input type="text" name="duration"  id="duration" placeholder="00:00:00" required class="form-control">
</div>
<div class="form-group"  >
    <label>Description: <pub class="text-danger">*</pub></label>
    <textarea name="lecture_description"  class="form-control lecture_description summernote" rows="3"></textarea>
</div>
@endif
