
<?php include('container.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  
  <div class="position-relative" >
    <div class="position-absolute top-50 start-50 translate-middle">
      <h4 class="fs-1 ">Apply For What You Deserve &#10002;</h4>
    </div>
  </div>
  <div class=" mt-3 container">
    <?php $fetchData = CallME(); if(is_array($fetchData)){ 
      foreach($fetchData as $data){ ?>
      <div class="row gap-5">
        <div class="col border shadow p-3 mb-5 bg-body rounded">
          <h2 class="text-center "><?php echo $data['cname']; ?></h2><br>
          <h3 class="text-center"><?php echo $data['position']; ?></h3><br>
          <p><?php echo $data['jdesc']; ?></p>
          <p class="ps"><strong>Skills: </strong><?php echo $data['skills']; ?></p>
          <p class="ps"><i class="fas fa-map-marker-alt pe-2"></i><?php echo $data['location']; ?></p>
          <p class="ps"><strong>CTC: </strong><?php echo $data['ctc']; ?></p>
          
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Apply
          </button>
          <!-- Modal -->

          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Appling for <?php echo $data['cname'].", ".$data['position']; ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <form method="post" action="container.php">
                  <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" name="name">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPosition" class="form-label">Position</label>
                    <input type="text" class="form-control" id="exampleInputPosition" name="position">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputResume" class="form-label">YearOfPassout</label>
                    <input type="number" class="form-control" id="exampleInputResume" name="passout">
                  </div>
                  </div>  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" value="Submit" name="candidates" class="btn btn-primary" />
                  </div>
                </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php unset($data);}  } ?>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>