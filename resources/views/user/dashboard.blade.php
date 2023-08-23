@extends('layout.user')

@section('title')
    User Dashboard
@endsection
@section('yamayama')
    <div class="container mt-5">
        <div class="mt-5">
            <div class="card">

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-7 shadow">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-sm-12 col-md-5 mt-5">
                <div class="mb-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <span class="text-secondary small"> <i class="fas fa-calendar-alt ser-friends fa-fw text-muted" style="font-size: 20px;"></i> {{\Carbon\Carbon::now()->format('d F Y  H:i:s e')}}</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="card shadow bg-body-tertiary border-0 rounded-top">
                            <div class="mt-1 mx-1 px-3 py-2 p-1 bg-opacity-10 text-light  text-center d-flex justify-content-between" style="background-color: #fe7ea4; border-radius:10px;">
                                <i class="fas fa-user-friends fa-fw fa-bounce small"></i>
                                <i class="fas fa-ellipsis-h fa-fw  small"></i>
                            </div>
                            <div class="card-body">

                                <div class="text-center h5 text-secondary">
                                    0
                                </div>
                                <div class="text-muted text-center" style="font-size: 10px">
                                    Friends
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow bg-body-tertiary border-0 rounded-top">
                            <div class="mt-1 mx-1 px-3 py-2 p-1 bg-opacity-10 text-light  text-center d-flex justify-content-between" style="background-color: #1cddff; border-radius:10px;">
                                <i class="fas fa-user-clock fa-fw fa-bounce small"></i>
                                <i class="fas fa-ellipsis-h fa-fw  small"></i>
                            </div>
                            <div class="card-body">

                                <div class="text-center h5 text-secondary">
                                    0
                                </div>
                                <div class="text-muted text-center" style="font-size: 10px">
                                    Friend Requests
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="card shadow bg-body-tertiary border-0 rounded-top">
                            <div class="mt-1 mx-1 px-3 py-2 p-1 bg-opacity-10 text-light  text-center d-flex justify-content-between" style="background-color: #c187fb; border-radius:10px;">
                                <i class="fas fa-comment-dots fa-fw fa-bounce small"></i>
                                <i class="fas fa-ellipsis-h fa-fw  small"></i>
                            </div>
                            <div class="card-body">

                                <div class="text-center h5 text-secondary">
                                    0
                                </div>
                                <div class="text-muted text-center" style="font-size: 10px">
                                    Chats
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow bg-body-tertiary border-0 rounded-top">
                            <div class="mt-1 mx-1 px-3 py-2 p-1 bg-opacity-10 text-center d-flex justify-content-between" style="background-color: #f5f5ff; border-radius:10px; color:#80639e;">
                                <i class="fas fa-bell fa-fw fa-bounce small"></i>
                                <i class="fas fa-ellipsis-h fa-fw  small"></i>
                            </div>
                            <div class="card-body">

                                <div class="text-center h5 text-secondary">
                                    0
                                </div>
                                <div class="text-muted text-center" style="font-size: 10px">
                                    Notifications
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
