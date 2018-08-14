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

                     @if ($total)
                        <div class="btn-toolbar">
                            <form method="POST" action="{{ route('delete')}}">

                                {{csrf_field()}}
                                <input type="hidden" value="10" name="points">
                                <button type="submit" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                        <br>
                        <h2>TOTAL POINTS : <?php echo $total?></h2>
                        <br>
                    @else
                        <h3>Oops, no point found</h3>
                    @endif 
                    
                    <button type="submit"  onClick="refreshPage()">Refresh Button</button>
                    <br>
                </div>
                    <div class="well">
                        <table class="table">
                        <thead>
                            <tr>
                            <th>Merchant name</th>
                            <th>Price</th>
                            <th>Points</th>
                            <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($json['data'] as $data)
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['price'] }}</td>
                            
                            @if($data['name'] == "Cafe Neo")
                            <td>{{ $data['price'] * 0.1 }}</td>
                            @elseif($data['name'] == "Abdoul Market")
                            <td>{{ $data['price'] * 0.2 }}</td>
                            @else
                            <td>{{ $data['points'] }}</td>
                            @endif
                            
                            <td>{{ $data['created_at']['date'] }}</td>
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

<script>
    function refreshPage(){
        window.location.reload();
    } 
</script>
