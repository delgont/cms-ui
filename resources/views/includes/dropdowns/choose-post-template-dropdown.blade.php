<div class="dropdown d-inline show mr-1">
    <a id="my-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class='bx bx-layout bx-sm text-dark' data-toggle="tooltip" title="Choose Template"></i>
    </a>
    <div class="dropdown-menu dropdown-list shadow-sm animated--grow-in p-0 scrollable-menu scrollable custom-scrollbar" aria-labelledby="my-dropdown" style="border-radius: 0.rem;">
        <h6 class="dropdown-header py-3 bg-light text-dark font-weight-bold">
            Choose Post Template
        </h6>
        @if (count($templates) && count($templates) > 0)
            @foreach ($templates as $template)
                <a class="dropdown-item d-flex align-items-center py-2 select-post-template" data-toggle="tooltip" data-title="{{ $template->description }}" id="selectPostTemplate" data-templateId="{{ $template->id }}" href="#">
                    <div class="mr-3">
                        <div class="rounded-circle">
                        <i class='bx bx-layout bx-sm text-danger'></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-bold text-capitalize">{{ $template->name }}</span>
                        <div class="small text-primary">{{ str_limit($template->description, 15) }}</div>
                    </div>
                </a>
            @endforeach
        @else
            
        @endif
            <a class="dropdown-item text-center small text-gray-500 py-3" href="{{ route('delgont.account.notifications') }}">Show All Templates</a>
    </div>
</div>