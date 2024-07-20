@props([
    'modal_id',
    'modal_title' => '',
    'modal_body' => '',
    'form_id' => '',
    'modal_btn' => 'Submit'
])

<div class="modal fade" data-bs-backdrop="static" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="{{ $modal_id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $modal_id }}Label">{{ $modal_title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2 text-p">
                    {!! $modal_body !!}
                </p>
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="{{ $form_id }}" class="btn btn-primary">{{ $modal_btn }}</button>
            </div>
        </div>
    </div>
</div>
