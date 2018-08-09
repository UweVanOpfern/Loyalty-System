<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag -->

@include('partials.errors')
@include('partials.success')

<div class="container">
   <div class="row">
        <div class="col-md-6 col-offset-3">
            <h2>Dashboard of data from Murugo</h2>
            <div class="btn-toolbar">
                <a href="/user" class="btn btn-link">View Local User Transaction</a>
            </div>
            <div class="well">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Names</th>
                      <th>Email</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Points</th>
                      <th style="width: 36px;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $name?></td>
                      <td><?php echo $email?></td>
                      <td><?php echo $created_at?></td>
                      <td><?php echo $updated_at?></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>    
    </div>
</div>
