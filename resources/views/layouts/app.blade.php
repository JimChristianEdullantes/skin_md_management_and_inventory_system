<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{asset('./css/dashboard.css')}}"/>
      <link rel="stylesheet" href="{{asset('./css/create.css')}}"/>
      <link rel="stylesheet" href="{{asset('./css/view.css')}}"/>


      <!-- BoxIcon CDN Link -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <title>SKIN MD</title>
</head>
<body>
      
      <div class="sidebar">
            <div class="logo-details">
                  <i class='bx bxl-stripe'></i>
                  <span class="logo_name">SKIN MD</span>
            </div>
            
                  <ul class="nav-links">
                        <li>
                              <a href="#">
                                    <i class='bx bxs-grid-alt'></i>
                                    <span class="link_name">Dashboard</span>
                              </a>
                        </li>

                        <li>
                              <a href="{{route('patients.index')}}">
                                    <i class='bx bxs-user-circle'></i>
                                    <span class="link_name">Patients</span>
                              </a>
                        </li>
                
                        <li>
                              <a href="{{route('appointment.index')}}">
                                    <i class='bx bx-notepad'></i>
                                    <span class="link_name">Appointments</span>
                              </a>
                        </li>

                        <li>
                              <a href="{{route('inventory.index')}}">
                                    <i class='bx bx-list-ol' ></i>
                                    <span class="link_name">Inventory</span>
                              </a>
                        </li>

                        <li>
                              <a href="{{route('users.index')}}">
                                    <i class='bx bxs-user-account'></i>
                                    <span class="link_name">User Management</span>
                              </a>
                        </li>

                        <li>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <i class='bx bx-log-out' ></i>
                                    <span class="link_name">Log out</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                
                        </li>
                  </ul>
      </div>

      <!-- HOME CONTENT -->

      <section class="home-section">
            <nav>
                  <div class="sidebar-button">
                        <i class='bx bx-menu sidebarBtn' ></i>
                        <span class="dashboard">@yield('title')</span>
                  </div>

                  <div class="profile-details">
                        <img src="{{asset('images/logo.jpg')}}" alt="profile"/>
                        <span class="admin-name">
                              Jim Christian S. Edullantes
                        </span>
                        <i class='bx bxs-chevron-down' ></i>
                  </div>
            </nav>

            <div>
                  @yield('content');
            </div>

            
      </section>

      <script src="{{asset('js/dashboard.js')}}">

      </script>
</body>
</html>