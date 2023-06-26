@extends('layouts.admin')

@section('title')
    Admin dashboard   
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
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">Customer</div>
                      <div class="dashboard-card-subtitle">{{$customer}}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">revenue</div>
                      <div class="dashboard-card-subtitle">{{$revenue}}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">Transaction</div>
                      <div class="dashboard-card-subtitle">{{$transaction}}</div>
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