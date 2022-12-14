@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories</h3>

                    <div class="card-tools">



                        <div class="input-group input-group-sm" style="width: 250px;">

                            <div  style="margin-right:50px;">
                                <a class="btn btn-primary btn-sm" href="{{route('admin-category-create')}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Add
                                </a>
                            </div>

                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: auto;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th width="100px">Modify</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->quantity}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{route('admin-category-edit',parameters: ['id'=>$category->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @if($category->quantity > 0)
                                        <button onclick="canNotDelete();"  class=" btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    @else
                                        <button data-id="{{$category->id}}"  class="btn_click_delete btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/jquery.nice-select.min.js")}}"></script>
    <script src="{{asset("js/jquery.nicescroll.min.js")}}"></script>
    <script src="{{asset("js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("js/jquery.countdown.min.js")}}"></script>
    <script src="{{asset("js/jquery.slicknav.js")}}"></script>
    <script src="{{asset("js/mixitup.min.js")}}"></script>
    <script src="{{asset("js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("js/main.js")}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function canNotDelete(){
            alert("Kh??ng th??? xo?? do danh m???c n??y t???n t???i s???n ph???m");
        }

        $(document).ready(function(){

            $(".btn_click_delete").click(function() {
                let btn_delete = $(this);
                let id = $(this).data('id');
                var r = confirm("B???n c?? ch???c ch???n mu???n x??a danh m???c n??y kh??ng ?");
                if (r == true) {
                    $.ajax({
                        url: '{{route('admin-category-delete')}}',
                        type: 'GET',
                        data: {id}
                    }).done(function () {
                        // let parent_tr = btn_delete.parents('tr');
                        // parent_tr.remove();
                    }).fail(function () {
                        alert("X??a danh m???c th???t b???i ");
                    });
                } else {
                    //x = "You pressed Cancel!";
                }


            });
        });
    </script>
@endsection
<!-- ./wrapper -->


