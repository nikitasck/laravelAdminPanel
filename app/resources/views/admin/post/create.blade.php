@extends('layouts.admin_layout')

@section('title', 'addCategory')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
            <div class="row">
                <div class="col-lg-12">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action=" {{route('post.store')}} " method="POST">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                            <label for="name">Post name</label>
                            <input type="text" name="name" class="form-control" id="nameInputText" placeholder="Enter post name" required>
                        </div>

                      <!-- select with categories -->
                        <div class="form-group">
                            <label>Choose category</label>
                            <select name="cat_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}"> {{ $category['title'] }} </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <textarea name="text" class="editor">
                                
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="feature_image">Feature Image</label>
                            <img class="img-uploaded">
                            <input type="text" id="feature_image" name="img" value="" class="form-control" readonly>
                            <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>
                        </div>
                        
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection