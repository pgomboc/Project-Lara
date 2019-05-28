<html>
   
   <head>
      <title>Vezba</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
            <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lobster&display=swap" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         </head>
      <style>
   .full-height {
                height: 100vh;
                
    }

    .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                width:200vh;
                background-color:#F5F5F5;
                
  }

  .position-ref {
                position: relative;
                
   }  
   .pitanje{
               padding:15px;
               border-radius:10px;
               width:400px;
               height:120px;
               background-color:		#C0C0C0;
               font-family: Arial;
               font-size:30px;
   }
    .btn{
               width:400px;
               height:75px;
               background-color:	#B0C4DE !important;
               border-color:white;
               font-family: Arial;
               font-size: 40px;             
   }
   .par{
                text-align:left;
                font-style: bold;
                font-family: Arial;
                font-size:50px;
                margin-right:100px;

   }
   </style>
  
   
   <body>
   <div class="flex-center position-ref full-height">
   <p class="par">TEST</p>
      <form action='/proveravanje' method='POST'>
         @csrf
      @foreach ($pitanje as $p)
      <div class="pitanje">
         <label for='odg'>{{$p->pitanje}}</label>
         <input type='text' id='odg'  class = "col-lg-2 form-control" name='{{$p->id}}'>
         </div>
         <br>
         <br>
      @endforeach
         <input type="submit"  class="btn btn-warning">
      </form>
      </div>
      
   </body>
</html>