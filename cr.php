<html>
	<head>
		<title>Crop Recommendation System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <!-- Font Awesome JS -->
        <script src="https://kit.fontawesome.com/728d1d3dec.js" crossorigin="anonymous"></script>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


		<!-- Custom Theme files -->
		<link rel="stylesheet" href="cr.css">
		<!-- //Custom Theme files -->
		<!-- web font -->
		<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
		<!-- //web font -->
		
		<style>
            body {
/*                 background-image: url('https://wallpaperaccess.com/download/crop-field-3830838'); */
                background-image: url('imgs/field.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                opacity: 0;
                transition: opacity 1.5s;
            }
        </style>
		

	</head>



	<body onload="document.body.style.opacity='1.0'">
        <div class="main-container">
            
            <div class="info p-3 m-5" style="color: #000000">
                    <h1>CROP RECOMMENDATION <br><span><h2>using ML robust model</h2></span></h1>
                    <br>
                    <p><h4>trained over past 19 years data built using Random Forest algorithm</h4></p>
                </div>
            
            <div class="horizontal-container">
            
                <div class="container " id="part2" >
                    <div class="card myCard bg-pink p-2 m-3">
                        <!--<div class="myCard-img">
                            <img src="imgs/field.jpg" alt="">
                        </div>-->
                        <div class="myCard-title">Enter <br> soil details</div>
                        <div class="myCard-body">Enter your location and soil details to predict better crop suitable for your land.</div>
                    </div>
                    <div class="card myCard bg-grey p-2 m-3">
                        <!--<div class="myCard-img">
                            <img src="imgs/field.jpg" alt="">
                        </div>-->
                        <div class="myCard-title text-white">Automatically fetch goegraphic details</div>
                        <div class="myCard-body text-white">It will fetch Current weather details like temperature and humidity of your city</div>
                    </div>
                    <div class="card myCard bg-blue p-2 m-3">
                        <!--<div class="myCard-img">
                            <img src="imgs/field.jpg" alt="">
                        </div>-->
                        <div class="myCard-title text-white">Get <br> Recommendation</div>
                        <div class="myCard-body text-white">Get best crop recommendation for your soil and experience the increased productivity</div>
                    </div>
                    <div class="scrollIndicator"></div>
                </div>
                
                <div class="container" id="part1">
                    <div class="card shadow p-3">
                        <div class="card-header  text-center">
                            <h3>Crop Recommendation System </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="state">State:</label>
                                <select class="form-control" name="state" id="state"></select>
                            </div>
                            <div class="form-group">
                                <label for="district">District:</label>
                                <select class="form-control" name="district" id="district"></select>
                                
                            </div>
                            <div class="form-group">
                                <label for="pH">pH:</label>
                                <input type="number" min="1" max="14" class="form-control" id="pH" placeholder="Enter soil pH"> 
                            </div>
                            <div class="form-group">
                                <label for="potassium">Potassium:</label>
                                <input type="number" min="1" max="10000000" class="form-control" id="potassium" placeholder="Enter potassium"> 
                            </div>
                            <div class="form-predictiongroup">
                                <label for="phosphorous">Phosphorous:</label>
                                <input type="number" min="1" max="10000000" class="form-control" id="phosphorous" placeholder="Enter phosphorous"> 
                            </div>
                            <div class="form-group">
                                <label for="nitrogen">Nitrogen:</label>
                                <input type="number" min="1" max="10000000" class="form-control" id="nitrogen" placeholder="Enter nitrogen"> 
                            </div>
                            </div>
                            <div class="row">
                                <button class="btn btn-primary mx-auto" id="submit">Recommend</button>
                            </div>
                        </div>
                        <div class="card-footer" id="recommendation">
                        </div>
                    </div>
                </div>
                
                
                            
            
            </div>
            
            <footer>
                <p>
                    Developed by <b>MITians</b>
                </p> 
                <div class="media-icons">
                    <a href="https://github.com/obaidmit" target="_blank"><i class="fab fa-github"></i></a>            
                </div>
            </footer>
            
        </div>
               
            
     
    
    
    <script>
        $(document).ready(()=>{
            $('#submit').prop('disabled', true);
            $('#recommendation').hide();
            var input;
            $.get('input.json', (data, status)=>{
                input = JSON.parse(JSON.stringify(data));
            }).done(()=>{
                
                let opts = '<option value="" selected hidden disabled>Select state</option>';
                let states = input['state'];
                for (key in states){
                    if (states.hasOwnProperty(key))
                        opts += '<option value="'+key+'">'+key+'</option>';
                }
                $('#state').html(opts);
                
            });
            
            $(document.body).on('change','#state',function(){
//                 alert('State Change Happened');
                let opts = '<option value="" selected hidden disabled>Select district</option>';
                var val = $(this).val();
                let dists = input['state'][val];
                for(let i=0; i<dists.length; i++)
                    opts += '<option value="'+dists[i]+'">'+dists[i]+'</option>';
                $('#district').html(opts);
                
            });

        });
        
        $('select').change(()=>{
            var flag = 0;
            if(!$('#state').val()){ flag = 1; }
            if(!$('#district').val()){ flag = 1; }
            if($('#pH').val() == ""){ flag = 1; }
            if($('#potassium').val() == ""){ flag = 1; }
            if($('#phosphorous').val() == ""){ flag = 1; }
            if($('#nitrogen').val() == ""){ flag = 1; }
            $('#submit').prop('disabled', flag);
        })
        $('input').keyup(()=>{
            var flag = 0;
            if(!$('#state').val()){ flag = 1; }
            if(!$('#district').val()){ flag = 1; }
            if($('#pH').val() == ""){ flag = 1; }
            if($('#potassium').val() == ""){ flag = 1; }
            if($('#phosphorous').val() == ""){ flag = 1; }
            if($('#nitrogen').val() == ""){ flag = 1; }
            $('#submit').prop('disabled', flag);
        })
        
        $('#submit').click(()=>{
            var paras = 'state='+$('#state').val() + '&district='+$('#district').val()+ '&pH='+$('#pH').val() + '&potassium='+$('#potassium').val() + '&phosphorous='+$('#phosphorous').val() + '&nitrogen='+$('#nitrogen').val();
            var res;
            $.get('cr_utils.php?'+paras, (data, status)=>{
                // alert(data);
                res = data;
            }).done(()=>{
                $('#recommendation').html(res);
                $('#recommendation').show();
            });
        })
    </script>
    
    


	</body>


</html>
