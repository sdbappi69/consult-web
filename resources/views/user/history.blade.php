@extends('layout.app')

@section('content')
    <div class="container">
        <div class="col-sm-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Service Provider Name</th>
                                <th>Category</th>
                                <th>User</th>
                                <th>Medium</th>
                                <th>Date</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $sl = $appointment->appends($req)->firstItem(); @endphp
                            @forelse ($appointment as $user)
                                <tr class="text-center">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{($user->provider->name ?? 'No Name')}}</td>
                                    <td>{{ ($user->category->name ?? 'No Name')}}</td>
                                    <td>{{ ($user->client->name ?? 'No Name')}}</td>
                                    <td>{{ ($user->medium->name ?? 'No Name')}}</td>
                                    <td>{{ $user->date}}</td>
                                    <td>{{ $user->start}}</td>
                                    <td>{{ $user->end}}</td>
                                    <td> @if($user->date < date('Y-m-d')) Date Over @elseif ($user->status == 1) Active @else Pending @endif </td>
                                    <td>
                                        <a href="{{route('history.view',$user->id)}}" target="_blank">
                                            <button class="btn btn-primary ">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No appointment found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example" class="m-3">
                            <span>Showing {{ $appointment->appends($req)->firstItem() }} to {{ $appointment->appends($req)->lastItem() }} of {{ $appointment  ->appends($req)->total() }} entries</span>
                            <div>{{ $appointment->appends($req)->render() }}</div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
