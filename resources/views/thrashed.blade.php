
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="CoreUI Pro - Bootstrap 4 Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content=",">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>CoreUI Pro - Bootstrap 4 Admin Template</title>

  <!-- Icons -->
  <link href="{{asset ('vendors/css/flag-icon.min.css')}}" rel="stylesheet">
  <link href="{{asset ('vendors/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset ('vendors/css/simple-line-icons.min.css')}}" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="{{asset ('css/style.css')}}" rel="stylesheet">

  <!-- Styles required by this views -->
  <link href="{{asset ('vendors/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  
  <div class="app-body">
    <!-- Main content -->
    <main class="main"> 
      
      @if (session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>;
      @endif
      
      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-edit"></i> DataTables
              <div class="card-actions">
                <a href="https://datatables.net">
                  <small class="text-muted">docs</small>
                </a>
              </div>
            </div>
            
            {{-- {{dd($inventories)}} --}}
            <div class="card-body">
              <table class="table table-striped table-bordered datatable" id="myTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Wei-ght</th>
                    <th>Col-our</th>
                    <th>Qty</th>
                    <th>Pick-Up</th>
                    <th>Dest-inat</th>
                    <th>W-H</th>
                    <th>Trans-port</th>
                    <th>Sta-tus</th>
                    <th>Pick-Date</th>
                    <th>Del.-Date</th>
                    <th>Image</th>
                    <th>Reason for deletion</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($inventory as $inventory)
                  <tr>
                    <td>{{$inventory["name"]}}</td>
                    <td>{{$inventory["weight"]}}</td>
                    <td>{{$inventory["colour"]}}</td>
                    <td>{{$inventory["qty"]}}</td>
                    <td>{{$inventory["pickup"]}}</td>
                    <td>{{$inventory["destination"]}}</td>
                    <td>{{$inventory["warehouse"]}}</td>
                    <td>{{$inventory["transportation_mode"]}}</td>
                    <td>{{$inventory["status"]}}</td>
                    <td>{{$inventory["pickup_date"]}}</td>
                    <td>{{$inventory["delivery_date"]}}</td>
                    <td><img class= "myimgs" src="/storage/{{$inventory["image"]}}"/></td>
                    <td></td>
                    <td>
                      <a class="btn btn-info" href="/undelete/{{$inventory['id']}}">
                        <i class="fa fa-undo "></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.conainer-fluid -->
    </main>
  </div>
 

  <!-- Bootstrap and necessary plugins -->
  <script src="{{asset ('vendors/js/jquery.min.js')}}"></script>
  <script src="{{asset ('vendors/js/popper.min.js')}}"></script>
  <script src="{{asset ('vendors/js/bootstrap.min.js')}}"></script>
  <script src="{{asset ('vendors/js/pace.min.js')}}"></script>

  <!-- Plugins and scripts required by all views -->
  <script src="{{asset ('vendors/js/Chart.min.js')}}"></script>

  <!-- CoreUI Pro main scripts -->

  <script src="{{asset ('js/app.js')}}"></script>

  <!-- Plugins and scripts required by this views -->
  <script src="{{asset ('vendors/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset ('vendors/js/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Custom scripts required by this view -->
  <script src="{{asset ('js/views/datatables.js')}}"></script>

</body>
</html>