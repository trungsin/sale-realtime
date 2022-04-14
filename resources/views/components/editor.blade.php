<div class="form-group col-md-12">
    <label for="{{ $field }}">{{ $title }}<strong class="text-danger ml-1" data-toggle="tooltip" data-placement="top" title="Not be empty">*</strong></label>
    <nav>
        <div class="nav nav-tabs" id="editorTab" role="tablist">
            <a class="nav-item nav-link nav-editor is-standard active" id="{{ $field }}-standard-tab" data-toggle="tab" href="#{{ $field }}-standard" role="tab" aria-controls="{{ $field }}-standard" aria-selected="true">Standard</a>
            <a class="nav-item nav-link nav-editor is-html" id="{{ $field }}-html-tab" data-toggle="tab" href="#{{ $field }}-html" role="tab" aria-controls="{{ $field }}-html" aria-selected="false">HTML</a>
        </div>
    </nav>
    <div class="tab-content" id="editorContainer">
        <div class="tab-pane fade show active p-0" id="{{ $field }}-standard" role="tabpanel" aria-labelledby="nav-home-tab">
            <div id="{{ $field }}Editor"></div>
        </div>
        <div class="tab-pane fade p-0" id="{{ $field }}-html" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="py-2 px-3 border-bottom text-muted">Enter details below (plain text or HTML)</div>
            <textarea name="{{ $field }}" rows="3" id="{{ $field }}" class="d-block w-100 py-2 px-3 border-0">{{ old($field, ${$field} ?? '') }}</textarea>
        </div>
    </div>
    @error($field)
    <span class="invalid-feedback d-block" role="alert">
        <span>{{ $message }}</span>
    </span>
    @enderror
</div>
@push('styles')
<style>#{{ $field }} { min-height: 130px; }</style>
@endpush
@push('scripts')
<script>
editorInit('#{{ $field }}Editor', '#{{ $field }}');
</script>
@endpush
