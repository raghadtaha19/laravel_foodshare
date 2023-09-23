@extends('dashboard.dashboard_layouts.master')

@section('title','Show Volunteers')


@section('css')
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('title_page1')
Volunteers
@endsection

@section('title_page2')
Volunteers list
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div> @if(session()->has('success'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
            {{session()->get('success') }}
            @endif
          </div>
          <div class="card">
            <div class="card-header">
                <!-- Add a link to create a new user -->
                <a class="btn btn-primary btn-sm float-left" href="{{ route('volanteers.create') }}">
                    <i class="fas fa-hands-helping nav-icon"></i> Add New Volunteer
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>volanteer_name</th>
                    <th>volanteer_email</th>
                    <th>volanteer_mobile</th>
                    <th>volanteer_job</th>
                    <th>volanteer_comments</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  @php
                  $i=1;
                @endphp
                @foreach ($volanteers as $volanteer)
                <td>{{ $i }}</td>
                <td>{{ $volanteer->name }}</td>
                <td>{{ $volanteer->email }}</td>
                <td>{{ $volanteer->mobile }} </td>
                <td>{{ $volanteer->job }}</td>
                <td>{{ $volanteer->comments }}</td>
                <td class="project-actions ">
                  {{-- <a class="btn btn-primary btn-sm" href="#">
                      <i class="fas fa-folder">
                      </i>
                      View
                  </a> --}}
                  <a class="btn btn-info btn-sm" href="{{ route('volanteers.edit',$volanteer->id) }}">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                  </a>
                  {{-- <a class="btn btn-danger btn-sm" href="#">
                      <i class="fas fa-trash">
                      </i>
                      Delete
                  </a> --}}

                  <form action="{{route('volanteers.destroy',$volanteer->id)}}"  method="POST"  style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure you want to delete this volanteer?')">Delete</button>
                  </form>
              </td>
                
                @php
                  $i++;
                @endphp

                </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection











@section('scripts')
{{-- <script src="../../plugins/datatables/jquery.dataTables.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

{{-- <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

{{-- <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

{{-- <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

{{-- <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>

{{-- <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

{{-- <script src="../../plugins/jszip/jszip.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>

{{-- <script src="../../plugins/pdfmake/pdfmake.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>

{{-- <script src="../../plugins/pdfmake/vfs_fonts.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>

{{-- <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>

{{-- <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>

{{-- <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

@endsection