<!-- https://www.thisprogrammingthing.com/what-the-f-ck-is-with-all-the-artisan-commands-make-component/ -->
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modalId }}" aria-hidden="true">
    <div class="modal-dialog {{ $modalSize ? $modalSize : 'modal-lg' }} modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"><i class="{{ $icon }}"></i> {{ $title }}</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    {{ $slot }}
                </div>
            </div>
            <div class="modal-footer">
                @if($yesOrNo === 'false')
                    <button form="{{ $formId }}" class="btn btn-success btn-noborder">
                        Submit
                    </button>
                @else
                    <button form="{{ $formId }}" class="btn btn-warning btn-noborder">
                        Confirm
                    </button>
                    <!-- adding type="button" acts like preventDefault() -->
                    <button type="button" form="{{ $formId }}" class="btn btn-primary btn-noborder" data-toggle="modal" data-target="#destroy-employee">
                        Cancel
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>