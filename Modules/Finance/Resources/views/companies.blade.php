<!-- Company Component View -->
<section>
    <div class="container py-5">
        <div class="row">

            <div class="search-box mb-4">
                <form method="GET" action="">
                    @csrf
                    <div class="input-group m-auto">
                        <!-- Reset -->
                        <a class="btn btn-danger pt-4" href="{{route('finance')}}">Reset</a>


                        <label class="input-group-prepend  ms-1">
                            <!-- OrderBy -->
                            <select name="orderBy" class="dropdown form-select mb-1">
                                <option class="dropdown-item"
                                        value="created_at">Created At
                                </option>
                            </select>

                            <!-- SortBy -->
                            <select name="sortBy" class="input-group-prepend dropdown form-select">
                                <option class="dropdown-item" value="asc">Asc
                                </option>
                                <option class="dropdown-item" value="desc">Desc
                                </option>
                            </select>
                        </label>

                        <!-- Search Bar -->
                        <input class="form-control ms-1" type="text" name="search"
                               placeholder="Search By Name" autofocus autocomplete>
                        <button class="btn btn-dark" type="submit">Search</button>
                    </div>
                </form>
                @error('companyName') <span class="error">{{ $message }}</span> <br> @enderror
            </div>


            <!-- Companies -->

            @foreach($companies as $company)
                <!-- Company -->
                <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                    <div class="card">
                        <div class="d-block justify-content-between p-3">
                            <!-- Name -->
                            <h5 class="lead mb-0">{{$company->name}}</h5>


                            <!-- Address -->
                            <small>{{@substr($company->address, 0, 50)}}</small>
                        </div>

                        <div class="d-block justify-content-between p-3">
                            <!-- Description -->
                            <small>{{@substr($company->description, 0, 50)}}</small>
                        </div>

                        <div class="d-block justify-content-between p-3">
                            <!-- Show Details -->
                            <form method="GET" target="_blank" action="">

                                <small>
                                    <button class="btn-sm btn btn-primary mb-1" type="submit">Show Details</button>
                                </small>
                            </form>
                        </div>

                        <!-- Image -->
                        <img
                            src="{{$company->logo}}"
                            class="card-img-top"/>

                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">

                            </div>
                        </div>

                    </div>
                    <br>
                </div>
            @endforeach

            <hr class="my-4">
            <div class="pagination justify-content-center">
                {{$companies->links()}}
            </div>

        </div>
    </div>
</section>
