@extends('layouts.admin')

@section('content')
   <!-- page title -->
   <div class="container">
      <div class="row new-header-breadcrumbpading">

         <div class="col-md-12">
            <div class="wraper-breadcrumb">
              <h2 class="new-header-breadheding">
               Dashboard 
              </h2>
              <!-- nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav -->
            </div>
         </div>
      </div>
    </div>
    <!-- page title end-->
    <div class="container">
      <div class="row">

        <div class="col-md-5">
          <div class="defult-boxwrap">
            
          </div>
        </div>

        <div class="col-md-4">
          <div class="defult-boxwrap">
            <h3 class="pms-cardtitle">Projects</h3>
              <div class="wrap-titles">
                  <div class="total-task">
                     <h4>{{ $project_count }}</h4>
                     <label>Total Projects</label>
                  </div>
                  <div class="panding-task total-task">
                     <h4>1</h4>
                     <label>Working Projects</label>
                  </div>                  
              </div>
          </div> 
          <div class="defult-boxwrap">
            <h3 class="pms-cardtitle">Clients</h3>
              <div class="wrap-titles">
                  <div class="total-task">
                     <h4>{{ $clients_count }}</h4>
                     <label>Total Clients</label>
                  </div>
              </div>
          </div>
          <div class="defult-boxwrap">
            <h3 class="pms-cardtitle">Employees</h3>
              <div class="wrap-titles">
                  <div class="total-task">
                     <h4>{{ $employees_count }}</h4>
                  </div>
              </div>
          </div>          
        </div>

        <div class="col-md-3">
          <div class="defult-boxwrap hr-activities-wrap">
              <div class="wraper-hr">
                 <h3 class="pms-cardtitle">HR Activities</h3>

                 <div class="info-admindetails">
                     <ul class="aadmindetails-list">
                         <li>
                             <a href="#">
                                 <div class="img-radius">
                                  <img src="../images/birthday-cake.png" alt="Birthday" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Today Birthday</h4>
                                     <p>Sahil Patel</p>
                                 </div>
                             </a>
                         </li>

                         <li>
                             <a href="#">
                                 <div class="img-radius">
                                  <img src="../images/exit-door-sign.png" alt="Leave" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Today Leave</h4>
                                     <p>Hardik Patel</p>
                                 </div>
                             </a>
                         </li>

                         <li>
                             <a href="#">
                                 <div class="img-radius">
                                  <img src="../images/seminar.png" alt="Seminar" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>Upcomming Seminar</h4>
                                     <p>Sonali Patel</p>
                                 </div>
                             </a>
                         </li>

                         <li>
                             <a href="#">
                                 <div class="img-radius">
                                  <img src="../images/resort.png" alt="HOLIDAY" />
                                 </div>
                                 <div class="admin-info">
                                     <h4>UPCOMING HOLIDAY</h4>
                                     <p>Diwali</p>
                                 </div>
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="defult-boxwrap">
              <table class="table">
                  <thead>
                    <tr>
                      <th>PROJRCT NAME</th>
                      <th>TECHNOLOGY</th>
                      <th>DEVLOPER</th>                    
                      <th>START DATE</th>
                      <th>END DATE</th>
                      <th>Priority</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($projects as $project)
                    <tr>
                      <td>{{ $project->project_name }}</td>
                      <td>{{ $project->technology}}</td>
                      <td>{{ $project->employee->firstname }}</td>
                      <td>{{ ($project->start_date != '') ? date('d-m-Y', strtotime($project->start_date) ) : '' }}</td>
                      <td>{{ ($project->end_date != '') ? date('d-m-Y', strtotime($project->end_date) ) : '' }}</td>
                      <td>{{ $project->priority }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>    
                {{ $projects->links("pagination::bootstrap-4") }}
            </div>
        </div>
        
      </div>
    </div>

@endsection