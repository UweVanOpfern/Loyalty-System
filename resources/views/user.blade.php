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
            
            <hr>
            @if($sum)
                <h2>Total :{{ $sum }} points</h2>               
                @else
                <h2>Oops, no point found</h2>        
            @endif
            <hr>
            @if($sum == 0)
            <h2>No bonus points ! you have 0 zero points on MURUGO</h2> 
                @else
                
            <div class="btn-toolbar">
               <form method="POST" action="{{ route('delete') }}">
                  {{csrf_field()}}
                  <input type="hidden" value="10" name="points">
                  <button type="submit" class="btn btn-primary">Buy</button>
                </form>
            </div>
                
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
