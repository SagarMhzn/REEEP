@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">Menu</h6>
                  <h2> {{ $data['menu'] }} </h2>
                  <div class="btn-body row mx-auto">
                    <a href="{{ route('backend.menu.list') }}" class="btn btn-dark col mx-2">View List</a>
                    <a href="{{ route('backend.menu.create') }}" class="btn btn-dark col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">About Us</h6>
                  
                  <h2> {{ $data['about'] }} </h2>
                  <div class="btn-body row mx-auto">
                    <a href="{{ route('backend.aboutus.list') }}" class="btn btn-light col mx-2">View List</a>
                    <a href="{{ route('backend.aboutus.create') }}" class="btn btn-light col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">Working Areas</h6>
                  
                  <h2> {{ $data['workingarea'] }} </h2>
                  <div class="btn-body row">
                      <a href="{{ route('backend.workingareas.list') }}" class="btn btn-dark col mx-2">View List</a>
                      <a href="{{ route('backend.workingareas.create') }}" class="btn btn-dark col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">News and Events</h6>
                  
                  <h2> {{ $data['NaE'] }} </h2>
                  <div class="btn-body row">
                    <a href="{{ route('backend.news-and-events.list') }}" class="btn btn-warning col mx-2">View List</a>
                    <a href="{{ route('backend.news-and-events.create') }}" class="btn btn-warning col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">Partners</h6>
                  
                  <h2> {{ $data['partner'] }} </h2>
                  <div class="btn-body row">
                    <a href="{{ route('backend.partners.list') }}" class="btn btn-danger col mx-2">View List</a>
                    <a href="{{ route('backend.partners.create') }}" class="btn btn-danger col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">Knowledge and Resources</h6>
                  
                  <h2> {{ $data['knowledge'] }} </h2>
                  <div class="btn-body row">
                    <a href="{{ route('backend.knowledge.index') }}" class="btn btn-light col mx-2">View List</a>
                    <a href="{{ route('backend.knowledge.create') }}" class="btn btn-light col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-light mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">Banners</h6>
                  
                  <h2> {{ $data['banner'] }} </h2>
                  <div class="btn-body row">
                    <a href="{{ route('backend.banner.index') }}" class="btn btn-secondary col mx-2">View List</a>
                    <a href="{{ route('backend.banner.create') }}" class="btn btn-secondary col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">Album</h6>
                  
                  <h2> {{ $data['album'] }} </h2>
                  <div class="btn-body row">
                    <a href="{{ route('backend.album.index') }}" class="btn btn-primary col mx-2">View List</a>
                    <a href="{{ route('backend.album.create') }}" class="btn btn-primary col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">Socials</h6>
                  
                  <h2> {{ $data['social'] }} </h2>
                  <div class="btn-body row">
                    <a href="{{ route('backend.socials.index') }}" class="btn btn-dark col mx-2">View List</a>
                    <a href="{{ route('backend.socials.create') }}" class="btn btn-dark col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-center">
                  <h6 class=" ">Users</h6>
                  
                  <h2> {{ $data['user'] }} </h2>
                  <div class="btn-body row">
                    <a href="{{ route('backend.users.index') }}" class="btn btn-light col mx-2">View List</a>
                    <a href="{{ route('backend.users.create') }}" class="btn btn-light col mx-2">Create</a>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
