@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
       Edit Categorie
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Edit Categorie
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('categorie.update',$categorie->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">

                        <div class="col">
                            <label for="name">اسم prodect</label>
                            <input type="text" name="name" value="{{ $categorie->name }}" class="form-control">
                            <input type="hidden" name="id" value="{{ $categorie->id }}" class="form-control">

                        </div>

                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <img src="{{ URL::asset('attachments/upload_attachments/'.$categorie->image) }}" type="application/jpg"   height="150px" width="100px"><br><br>
                            <div class="form-group">
                                <label for="image">المرفقات : <span class="text-danger">*</span></label>
                                <input type="file" accept="application/image" name="image" required>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">Next</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
