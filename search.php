<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar w/ text</a> -->
    <a class="navbar-brand" href="#">
<img style="background: linear-gradient(0deg, rgba(84,24,85,1) 0%, rgba(112,16,113,1) 100%);width: 45px;" src="https://cashrichapp.com/icon/logo-white-tagline.png" alt="Logo"
                    class="img ">
                    
            </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <span class="navbar-text">
        <?php 
        session_start();
        if(empty($_SESSION['name']))
        {
            header("Location: index.php");
        }
        
        echo $_SESSION['name'];
        ?>
        <a href="logout.php">Logout</a>
      </span>
    </div>
  </div>
</nav>
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card" style="padding: 25px;">
                    <div class="h4 text-center">Search</div>
                    <div class="input-group has-validation">
                        <input type="text" name="search" id="search" class="form-control" placeholder="search">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                        <span class="input-group-text btn btn-primary" id="inputGroupPrepend"
                            onclick="search()">Search</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <div class="card" id="card" style="display:none;padding: 15px;">
                    <span><span class="h3" id="name"></span> &emsp; <span id="pricechange"></span></span>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Price</td>
                                <td>Rank</td>
                            </tr>
                            <tr>
                                <td id="price"></td>
                                <td id="cmc"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script>
    function search() {
        var text = $('#search').val();
        // alert(text);
        $.ajax({
            "url": "https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=" + text,
            "method": "GET",
            "headers": {
                "X-CMC_PRO_API_KEY": "27ab17d1-215f-49e5-9ca4-afd48810c149"
            },
            success: function(data) {

                var price = data['data'][text]['quote']['USD']['price'];
                var percent_change_24h = data['data'][text]['quote']['USD']['percent_change_24h'];
                var cmc_rank = data['data'][text]['cmc_rank'];
                var name = data['data'][text]['name'];
                var symbol = data['data'][text]['symbol'];

                $('#card').css('display', 'block');
                $('#name').text(name + symbol);
                $('#price').text(price);
                $('#cmc').text(cmc_rank);
                $('#pricechange').text(percent_change_24h);
            }

        });
        var user_id="<?php echo $_SESSION['id'];?>";
        $.ajax({
        url:"storeapicalls.php",
        method:"POST",
        data:{"user_id":user_id},
        success:function(data)
        {
        }
      });
    }
    </script>
</body>

</html>