<div class="controls">
    <form>
        <div class="row">
            <div class="col-6">
                <h5>Sort By</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <label class="form-check-label" for="sort_asc">
                                <input class="form-check-input" type="radio" name="sort" id="sort_asc" value="asc" {{ request()->get('sort') == 'asc' ? 'checked' : ''}}>
                                A->Z
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="sort_desc">
                                <input class="form-check-input" type="radio" name="sort" id="sort_desc" value="desc" {{ request()->get('sort') == 'desc' ? 'checked' : ''}}>
                                Z->A
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <label class="form-check-label" for="sort_new">
                                <input class="form-check-input" type="radio" name="sort" id="sort_new" value="new" {{ request()->get('sort') == 'new' ? 'checked' : ''}}>
                                Newest first
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="sort_old">
                                <input class="form-check-input" type="radio" name="sort" id="sort_old" value="old" {{ request()->get('sort') == 'old' ? 'checked' : ''}}>
                                Oldest first
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="user_filter">Filter By User</label>
                    <select class="form-control" multiple name="users[]">
                        @php
                            $userFilters = request()->get('users') ?: [];
                        @endphp
                        <option value="0">All</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ in_array($user->id, $userFilters) ? "selected" : '' }}>{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-success">Filter</button>
    </form>
</div>