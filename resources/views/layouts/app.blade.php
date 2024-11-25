<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Todo List') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
    <style>
        #wrapper { display: flex; min-height: 100vh; }
       
        #sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            transition: all 0.3s;
        }
       
        #sidebar .brand {
            padding: 20px;
            font-size: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
       
        #sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 4px 16px;
            border-radius: 6px;
            transition: all 0.3s;
        }
       
        #sidebar .nav-link:hover {
            color: white;
            background: rgba(255,255,255,0.1);
        }
       
        #sidebar .nav-link.active {
            color: white;
            background: #3498db;
        }
       
        #sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
       
        #content {
            flex: 1;
            background: #f8f9fa;
            padding: 2rem;
        }


        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                margin-left: 0;
            }
        }


        /* Toggle Button for mobile */
        #sidebarCollapse {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
        }


        @media (max-width: 768px) {
            #sidebarCollapse {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile toggle button -->
    <button id="sidebarCollapse" class="btn btn-primary d-md-none">
        <i class="bi bi-list"></i>
    </button>


    <div id="wrapper">
        <!-- Sidebar -->
      <!-- Sidebar -->
      <nav id="sidebar">
          <div class="brand">
              <i class="bi bi-check2-square"></i> Todo List
          </div>
          <ul class="nav flex-column mt-3">
              <li class="nav-item">
                  <a href="{{ route('tasks.index') }}"
                     class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
                      <i class="bi bi-list-task"></i>
                      <span>Danh sách công việc</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('tasks.create') }}"
                     class="nav-link {{ request()->routeIs('tasks.create') ? 'active' : '' }}">
                      <i class="bi bi-plus-circle"></i>
                      <span>Thêm công việc</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ url('/chart') }}"
                     class="nav-link {{ request()->is('chart') ? 'active' : '' }}">
                      <i class="bi bi-bar-chart"></i>
                      <span>Biểu đồ</span>
                  </a>
              </li>
          </ul>
      </nav>
        <!-- Content -->
        <div id="content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            @yield('content')
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile sidebar toggle
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
    @stack('scripts')
</body>
</html>



