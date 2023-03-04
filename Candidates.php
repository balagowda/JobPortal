<?php include('container.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <div class="content">
       <table class="table table-striped">
           <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Candidate Name</th>
                <th scope="col">Position</th>
                <th scope="col">E-mail</th>
                <th scope="col">YearOfPassout</th>
              </tr>
            </thead>
            <tbody>
              <?php $fetchData = CallME2(); if(is_array($fetchData)){ $sn=1;
                 foreach($fetchData as $data){ ?>
                <tr > 
                    <td scope="row"> <?php echo $sn ?> </td>
                    <td> <?php echo $data['name']; ?> </td>
                    <td> <?php echo $data['position']; ?> </td>
                    <td> <?php echo $data['email']; ?> </td>
                    <td> <?php echo $data['passout']; ?> </td>
                </tr>
              <?php $sn++;} } ?>
            </tbody>
        </table>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>