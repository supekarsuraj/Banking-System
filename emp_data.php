
<?php include 'table_records.php'; ?>
<?php 
$sql = "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='$tblname'";
$res=mysqli_query($link,$sql);
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Emp data</h3>
    </div>
    <div class="panel-body">       
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <?php while($rec = mysqli_fetch_array($res)){ ?>  
                    <th><?php echo $rec[0]; ?> </th>
                <?php } ?>        
                    <th>Option</th>            
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="select * from $tblname";
                    $res=mysqli_query($link,$sql);
                    while($r=mysqli_fetch_array($res)){   
                        $i = 0;  
                ?>
                    <tr>   
                        <?php while($i < (sizeof($r)/2)){  ?>
                        <td><?php echo $r[$i];?></td> 
                        <?php $i++; } ?>
                        <td> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
                    </tr>
                <?php
                    }
                    mysqli_close($link);
                ?>
            </tbody>
        </table>        
    </div>
</div>
        
</div>
</div>
