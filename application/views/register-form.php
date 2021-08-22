
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>Razorpay</title>
</head>
<body style="background-color: blue !important;">
<div class="container">
    <div class="row">
        <div class="col-sm-5 col-md-5 col-lg-5 mx-auto">
           <h3 style="color:white !important; margin-top: 100px;">Razorpay  Payment Gateway Integration with Codeigniter Framework</h3>
           
        </div>
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Checkout</h5>
                    <form action="<?php echo base_url().'index.php/register/pay'; ?>" method="post" class="form-signin">
                        <div class="form-label-group">
                            <label for="name">Name <span style="color: #FF0000">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Customer Name"  required >
                        </div> <br/>
                        <div class="form-label-group">
                            <label for="email">Email <span style="color: #FF0000">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Customer Email address" required>
                        </div> <br/>
                        <label for="contact">Contact <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input type="text" id="contact" name="contact" class="form-control" placeholder="Customer Contact No" required>
                        </div><br/>
          <label for="subject">Amount <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input type="text" id="amount" name="amount"  class="form-control" placeholder="Amount" required>
                        </div><br/>
                       <br/>
                        <button type="submit" name="sendMailBtn" class="btn btn-lg btn-primary btn-block text-uppercase" >Pay with Razorpay</button>
                        <spam> <img src="<?php echo base_url('image/gaurav.png'); ?>"  style="width:100px; height:100px;margin-left: 30%;"/></spam>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>