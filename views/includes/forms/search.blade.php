<form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ $action }}" method="POST">
    @csrf
    <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for... posts" aria-label="Search" name="search_key" />
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
          <i class="bx bx-search"></i>
        </button>
      </div>
    </div>
  </form>