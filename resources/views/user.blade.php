<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag -->

@include('partials.errors')
@include('partials.success')

<div class="container">
   <div class="row">
        <div class="col-md-6 col-offset-3">
            <h2>Dashboard of user data</h2>
            <div class="btn-toolbar">
               <form method="POST" action="{{ action('TransactionController@store') }}">
                  {{csrf_field()}}
                  <input type="hidden" value="10" name="points">
                  <button type="submit" class="btn btn-primary">Buy</button>
                </form>
                <button class="btn btn-danger">Delete</button>
            </div>

            @if($sum)
                <h2>Total :{{ $sum }} points</h2>               
                @else
                <h2>Oops, no point found</h2>        
            @endif
            <hr>
            @if($sum >= 100)
                <h2>You have reached 100 points , you have bonus</h2>
                @else
                <h2>No bonus yet! you must reach 100 points</h2> 
            @endif
            <div class="well">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Transaction ID</th>
                      <th>Points</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($data as $transactions)
                    <tr>
                      <td>{{ $transactions->id }}</td>
                      <td>{{ $transactions->points }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>    
    </div>
</div>
