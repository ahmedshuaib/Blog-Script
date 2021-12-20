@extends('layouts.master')
@section('pageTitle', 'Contact Us')
@section('meta-title', 'Green Light TFM Contact Us')
@section('meta-description', 'Green Light TFM Contact With Me')
@section('content')
    <section class="mt-3">
        <div class="container p-0">
            <h5 class="card-header">Contact Us</h5>
            <div class="row  p-4">
                <div class="col-md-7 col-xs-12 col-sm-12">
                    @include('dashboard.inc.message')
                    <div class="card card-primary">
                        <form action="{{ route('send.message') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold"><span class="text-danger">*</span> Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold"><span class="text-danger">*</span> Email </label>
                                    <input type="email" id="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="font-weight-bold"><span class="text-danger">*</span> Subject </label>
                                    <input type="text" id="subject" name="subject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="body" class="font-weight-bold"><span class="text-danger">*</span> Message</label>
                                    <textarea name="body" id="body" class="form-control" style="height: 200px" cols="30" rows="10"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"></i> Send Message</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
                <div class="col-md-5 col-sm-13 col-xs-12">
                    <div class="card border-0">
                        <table class="table">
                            <tr>
                                <td><label class="font-weight-bold"><i class="fas fa-envelope"></i> Contact Email</label></td>
                                <td><label class="text-muted">{{ $default->contact_email }}</label></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold"><label class="font-weight-bold"><i class="fas fa-phone"></i> Phone Number</label></td>
                                <td class="text-muted"><label class="text-muted">{{ $default->phone_number }}</label></td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold"><label class="font-weight-bold"><i class="fas fa-phone"></i> Bkash Number</label></td>
                                <td class="text-muted"><label class="text-muted">{{ $default->account_number }}</label></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        $(function() {
            $('.pagination').addClass(`justify-content-end`)
        });
    </script>
@endsection
