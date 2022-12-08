<div class="dropdown d-inline show mr-1">
    <a id="my-dropdown" class="dropdown-toggle btn btn-sm btn-transparent border border-info font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class='bx bx-receipt text-dark' data-toggle="tooltip" title="Choose Menu"></i> Choose Menu
    </a>
    <div class="dropdown-menu dropdown-list shadow-sm animated--grow-in p-0 scrollable custom-scrollbar border border-light" aria-labelledby="my-dropdown" style="border-radius: 0.rem;">
        <h6 class="dropdown-header py-3 bg-light text-dark font-weight-bold">
            {{ $currentMenu }}
        </h6>
        @if (count($menus))
            @foreach ($menus as $menu)
                <a class="dropdown-item d-flex align-items-center py-2 select-post-parent" id="selectPostMenu" data-menuId="{{ $menu->id }}" data-menuName="{{ $menu->name }}" href="#">
                    <div>
                        <span class="text-capitalize">{{ str_limit($menu->name, 20) }}</span>
                    </div>
                </a>
            @endforeach
        @else
            
        @endif
            <a class="dropdown-item text-center small text-gray-500 py-2 border-top border-light" href=#">Show All Menus</a>
    </div>
</div>
