@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:23px;">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($sum)
                        <h6 style="font-weight:bold;font-size:20px;">Total :{{ $sum }} points</h6>               
                        @else
                        <h6 style="color:#ff5050;">Oops, no point found</h6>        
                    @endif
                    @if($sum == 0)
                    <h6 style="color:#ff0000;">No bonus points ! you have 0 zero points on MURUGO</h6> 
                        @else
                        
                    <div class="btn-toolbar">
                    <form method="POST" action="{{ route('delete') }}">

                        {{csrf_field()}}
                        <input type="hidden" value="10" name="points">
                        <button type="submit" class="btn btn-primary">Buy</button>
                        </form>
                    </div>
                    <br>  
                    @endif
                    <div class="well">
                        <table class="table">
                        <thead>
                            <tr>
                            <th>Transaction ID</th>
                            <th>Murugo user email</th>
                            <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $transactions)
                            <tr>
                            <td>{{ $transactions->id }}</td>
                            <td>{{ Session::get('email') }}</td>
                            <td>{{ $transactions->points }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
