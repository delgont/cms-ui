@extends('delgont::layout.master')

@section('title', 'Menus')

@section('pageHeading', 'Menus '.$menu->name)


@section('actions-right')
<a href="{{ route('delgont.menus') }}" class="text-primary" data-toggle="tooltip" title="Add Post"><i class="bx bx-menu bx-sm"></i></a>
<a href="{{ route('delgont.posts.trash') }}" class="text-primary" data-toggle="tooltip" title="Trash"><i class="bx bx-list-plus bx-sm"></i></a>
@endsection


@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-4">
                <div class="card p-0 alert alert-light">
                    <div class="card-header py-2 px-3">
                        <h6 class="mb-0 text-dark font-weight-bold">Posts</h6>
                    </div>
                    <div class="card-body py-2 pl-2 pr-1">
                        <div class="custom-scrollbar scrollable" style="max-height: 400px;">
                            @if (count($posts))
                                @foreach ($posts as $post)
                                <div class="row alert alert-info mb-1 rounded">
                                    <div class="col-lg-8 text-capitalize"><h6 class="mb-0">{{ str_limit($post->post_title, 15) }}</h6> <small>{{ $post->type }}</small></div>
                                    <div class="col-lg-4">
                                        <a href="" class="add-menuitem-to-menu d-inline-block" data-form="{{ '#addMenuItemForm'.$post->id }}"><i class="bx bx-sm bx-plus"></i></a>
                                        <a href="{{ '#addMenuItemToMenuFormWrapper'.$post->id }}" class="add-edit d-inline-block" data-toggle="collapse"><i class="bx bx-sm bx-list-plus"></i></a>
                                    </div>
                                </div>
                                <div class="row alert alert-primary rounded collapse" id="{{ 'addMenuItemToMenuFormWrapper'.$post->id }}">
                                    <form action="{{ route('delgont.menus.menuitem.store') }}" method="POST" class="row p-3 add-menuitem-form" id="{{ 'addMenuItemForm'.$post->id }}">
                                        @csrf
                                        <div class="col-lg-9">
                                            <label for="label">Label</label>
                                            <input type="text" class="form-control h-50" name="label" placeholder="Label.."  value="{{ str_limit($post->post_title, 15) }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="sort">Order</label>
                                            <input type="text" class="form-control h-50" name="sort" placeholder="Sort" value="1" />
                                        </div>
                                        <div class="col-lg-9">
                                            <label for="label">Parent</label>
                                            <select name="parent_id" id="parentId" class="form-control h-50 w-75">
                                                <option value="" selected>None</option>
                                                @if (count($menuItems))
                                                    @foreach ($menuItems as $menuItem)
                                                        <option value="{{ $menuItem->id }}">{{ $menuItem->label }}</option>
                                                    @endforeach
                                                @else
                                                @endif
                                            </select>
                                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                            <input type="hidden" name="menuable_id" value="{{ $post->id }}">
                                        </div>
                                        <input type="submit" value="hello" class="btn btn-sm">
                                    </form>
                                </div>
                                @endforeach
                            @else
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card p-0 alert alert-light">
                    <div class="card-header py-2 px-3">
                        <h6 class="mb-0 text-dark">Menu Items</h6>
                    </div>
                    <div class="card-body py-2 px-3">
                        <ul class="custom-scrollbar scrollable list-unstyled">
                           @if (count($menu->navMenuItems))
                               @foreach ($menu->navMenuItems as $menuItem)
                                   @if (count($menuItem->children) > 0)
                                       <li class="text-capitalize">
                                            <div class="parent-menu-item alert alert-primary p-2 mb-1 w-75" style="width: auto;">
                                                <h6 class="mb-0 d-inline">{{ $menuItem->label }}</h6>
                                                <div class="d-inline mt-3  ml-4 text-right">
                                                    <a href="{{ route('delgont.menus.menuitem.destroy', ['id' => $menuItem->id]) }}" class="alert-link"><i class="bx bx-trash"></i></a>
                                                    <a href=""><i class="bx bx-edit"></i>{{ $menuItem->sort }}</a>
                                                </div>
                                            </div>
                                            <ul class="children" style="list-style: georgian;">
                                                @foreach ($menuItem->children as $childMenuItem)
                                                <li class="child-menu-item">
                                                    <div class="alert alert-success p-2 mb-1 w-75">
                                                        <h6 class="mb-0 d-inline">{{ $childMenuItem->label }}</h6>
                                                        <div class="d-inline mt-3  ml-4 text-right">
                                                            <a href="{{ route('delgont.menus.menuitem.destroy', ['id' => $childMenuItem->id]) }}"><i class="bx bx-trash"></i></a>
                                                            <a href=""><i class="bx bx-edit"></i>{{ $childMenuItem->sort }}</a>
                                                        </div>
                                                    </div>
                                                    @if (count($childMenuItem->children))
                                                        <ul>
                                                            @foreach ($childMenuItem->children as $ChildChildMenuItem)
                                                            <li class="child-menu-item">
                                                                <div class="alert alert-info w-75 p-2 mb-1">
                                                                    <h6 class="mb-0 d-inline">{{ $ChildChildMenuItem->label }}</h6>
                                                                    <div class="d-inline mt-3  ml-4 text-right">
                                                                        <a href=""><i class="bx bx-trash"></i></a>
                                                                        <a href=""><i class="bx bx-edit"></i>{{ $ChildChildMenuItem->sort }}</a>
                                                                    </div>
                                                                </div>
                                                                @if (count($ChildChildMenuItem->children))
                                                                    <ul style="list-style: disc;">
                                                                        @foreach ($ChildChildMenuItem->children as $ChildChildChildMenuItem)
                                                                        <li class="child-menu-item">
                                                                            <div class="alert alert-secondary w-75 p-2 mb-1">
                                                                                <h6 class="mb-0 d-inline">{{ $ChildChildChildMenuItem->label }}</h6>
                                                                                <div class="d-inline mt-3  ml-4 text-right">
                                                                                    <a href=""><i class="bx bx-trash"></i></a>
                                                                                    <a href=""><i class="bx bx-edit"></i>{{ $ChildChildChildMenuItem->sort }}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                   @else
                                   <li class="text-capitalize">
                                        <div class="menu-item alert alert-primary w-75 p-2 mb-1">
                                            <h6 class="mb-0 d-inline">{{ $menuItem->label }}</h6>
                                                <div class="d-inline mt-3  ml-4 text-right">
                                                    <a href="{{ route('delgont.menus.menuitem.destroy', ['id' => $menuItem->id]) }}"><i class="bx bx-trash"></i></a>
                                                    <a href=""><i class="bx bx-edit"></i>{{ $menuItem->sort }}</a>
                                                </div>
                                        </div>
                                    </li>
                                   @endif
                               @endforeach
                           @else
                               
                           @endif
                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
        </div>
    </div>
</section>

@endsection