
<?php include('container.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <div class="container-fluid">
           <div class="navbar-brand">
              Admin Dashboard
           </div>
        </div>
    </nav>
    
    <!-- The sidebar -->
    <div class="sidebar">
      <a class="active" href="index.php">Jobs</a>
      <a  href="Candidates.php">Applied candidates</a>
    </div>

    <!-- Page content -->

    <div class="content">
        <p>
           <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
             Post Job
           </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
          <form method="post" action="index.php">
            <div class="mb-3">
              <label for="exampleInputCname" class="form-label">Company Name</label>
              <input type="text" class="form-control" id="exampleInputCname" name="cname">
            </div>
            <div class="mb-3">
              <label for="exampleInputPosition" class="form-label">Position</label>
              <input type="text" class="form-control" id="exampleInputPosition" name="position">
            </div>
            <div class="mb-3">
              <label for="exampleInputDescript" class="form-label">Job Description</label>
              <textarea class="form-control" id="exampleInputDescript" cols="30" rows="10" name="jdesc"></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleInputskill" class="form-label">Skills</label>
              <input type="text" class="form-control" id="exampleInputskill" name="skills">
            </div>
            <div class="mb-3">
              <label for="exampleInputloc" class="form-label">Location</label>
              <input type="text" class="form-control" id="exampleInputloc" name="location">
            </div>
            <div class="mb-3">
              <label for="exampleInputCtc" class="form-label">CTC</label>
              <input type="text" class="form-control" id="exampleInputCtc" name="ctc">
            </div>
            <button type="submit" class="btn btn-primary" name="index">Submit</button>

          </form>
          </div>
        </div>

        
       <table class="table table-striped table-hover">
           <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Company Name</th>
                <th scope="col">Position</th>
                <th scope="col">CTC</th>
              </tr>
            </thead>
            <tbody>
              <?php $fetchData = CallME(); if(is_array($fetchData)){ $sn=1;
                 foreach($fetchData as $data){ ?>
                <tr > 
                    <td scope="row"> <?php echo $sn ?> </td>
                    <td> <?php echo $data['cname']; ?> </td>
                    <td> <?php echo $data['position']; ?> </td>
                    <td> <?php echo $data['ctc']; ?> </td>
                </tr>
              <?php $sn++;} } ?>
            </tbody>
        </table>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


<!--  Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Launch demo modal
       </button>

        Modal 
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
        </div> -->