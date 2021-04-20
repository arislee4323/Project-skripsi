<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  background-color: #f1f1f1;
  font-family: Arial, Helvetica, sans-serif;
}

#navbar {
  background-color: #333;
  position: fixed;
  top: -50px;
  width: 107%;
  display: block;
  transition: top 0.3s;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 15px;
  text-decoration: none;
  font-size: 12px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}
</style>

<style>
            html, body {
                background-image: url('gambar/home7.jpg');
               background-size: 1400px;
                color: white;
               font-family: Arial, Helvetica, sans-serif;
                font-weight: 200;
                width: 100%;
                height: auto;
                
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                left:  100px;
                top: 10px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 20px;
            }

            .links > a {
                color: white;
                padding: 25px;
                font-size: 10px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                border-radius: 12px;

                 background:#2C97DF;
  color:white;
  border-top:5;
  border-left:0;
  border-right:0;
  border-bottom:1px;
  padding:7px 7px;
  text-decoration:none;
  font-family:sans-serif;
  font-size:6pt;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .c {
                margin-top: 30px;
            }

            #div {
  
  position: relative;
  animation-name: example;
  animation-duration: 6s;
}

@keyframes example {
  0%   { left:0px; }
  25%  { left:-200px; }
  50%  {left:-200px; }
  75%  {left:0px; }
  100% {left:0px; }
}

        </style>
</head>


<body class=" table-responsive btn-sm">
<div class="flex-center position-ref full-height" id="home" style="border-bottom: 1px solid gray;">
            
                <div  class="top-right links">
                     <h4>Barbershop <span style="color: #7CFC00">Danoe</span></h4>
                   
                </div>
            
            <div class="content">
               
                
                    <h6 class="title ">Antriannya Lebih Cepat dan Aman</h6>
                

                <div class="c">
                    <h5><span style="color: black">Contact Us:<br></span><br><label> 0895397186245 <br> Customer.service@barberfast.id </label></h5>
                </div>
                @if (Route::has('login'))
                <div class=" links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
</body>

</html>
