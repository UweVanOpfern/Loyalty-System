<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag -->

@include('partials.errors')
@include('partials.success')

<div class="container">
   <div class="row">
        <div class="col-md-6 col-offset-3">
            <h2>USER API DATA</h2>
             <button type="submit"  onClick="refreshPage()">Refresh Button</button>
             <br>
             <br>
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
                  <?php echo $total;?>
                  </tbody>
                </table>
            </div>
        </div>    
    </div>
</div>


<script>
function refreshPage(){
    window.location.reload();
} 
</script>
