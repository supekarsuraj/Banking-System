<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="width=100%;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">User Type</h3>
        </div>
        <div class="panel-body">
            <form action="./saveproject.php" method="POST" role="form">
                <div class="form-group">
                    <label for="">Customer ID</label>
                    <input type="text" class="form-control" id="" name="txtid" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">User type</label>
                    <input type="text" class="form-control" id="" name="txttype" placeholder="Input field">
                </div>
                <input type="hidden" name="page" value="usertype">
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div>