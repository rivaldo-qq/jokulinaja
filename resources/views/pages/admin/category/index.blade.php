@extends('layouts.admin')

@section('title')
    category   
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <h2 class="dashboard-title">Admin Dashboard</h2>
              <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
              <!--content-->
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('category.create')}}" class="btn btn-primary mb-3">
                                + tambah kategori baru
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="CrudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>nama</th>
                                            <th>foto</th>
                                            <th>slug</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('setelah-script')
          <script>
            var datatable = $('#CrudTable').DataTable({
                processing : true,
                serverSide : true,
                ordering : true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns:[
                    {data: 'id', name: 'id'},
                    {data: 'name', name :'name'},
                    {data: 'photo', name: 'photo'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action',name: 'action',orderable: false,searcable: false,width: '15%'},
                    
                ]
            })
          </script>
@endpush