@extends('lad::core.layouts.master')

@section('title' , 'Dashboard | '.$admin->username)

@section('pageHeading', $admin->username.' | Activity Log')




@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">

                <!-- Column 1 -->
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">Log Dates Here</div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            hello
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection