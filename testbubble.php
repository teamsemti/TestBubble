<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

	$listnumberstr = $_POST['listnumberstr'];
	$inisort = $_POST['inisort'];
	
	$arr_listnumber = explode(',', $listnumberstr);
	if ($arr_listnumber[$inisort] > $arr_listnumber[$inisort - 1]) {
		$max = $arr_listnumber[$inisort];
		$arr_listnumber[$inisort] = $arr_listnumber[$inisort - 1];
		$arr_listnumber[$inisort - 1] = $max;
	}

	$inisort -= 1;
	$listnumberstr = implode (',', $arr_listnumber);

	echo $listnumberstr . '*' . $inisort;
}
else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>TestBubble</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style type="text/css">
		.cell_blue{
			border: #0448c1 2px solid;
			padding: 5px 10px;
			font-size: 16px;
			font-weight: 700;
			text-align: center;
			background: linear-gradient(to top, #aac6f8, #cddcf7);
		}
		.cell_red{
			border: #ec4916 2px solid;
			padding: 5px 10px;
			font-size: 16px;
			font-weight: 700;
			text-align: center;
			background: linear-gradient(to top, #f8a890, #fbcfc1);
		}
		.cell_scs{
			border: #2a8605 2px solid;
			padding: 5px 10px;
			font-size: 16px;
			font-weight: 700;
			text-align: center;
			background: linear-gradient(to top, #9ef77b, #c9fbb5);
		}
		#tablenumbers{
			background: #fff url(https://i.pinimg.com/originals/54/85/09/54850938b723d820681a227decf5ed1d.jpg) center bottom;
		}
		#actions{
			background-color: #fcdf84;
			border-top: #dabb5b 1px solid;
		}
	</style>

</head>
<body>
	<!-- Footer -->
    <header class="py-5 bg-dark">
        <div class="container">
            <h1 class="text-center text-white">Third&Grove</h1>
            <p class="m-0 text-center text-white">BubbleSort Simulation</p>
        </div>
        <!-- /.container -->
    </header>
	<section id="tablenumbers" class="pt-5 pb-5">
		<div class="container">
			<div class="row mt-1">
				<div id="r0"></div>
			</div>
			<div class="row mt-1">
				<div id="r1"></div>
			</div>
			<div class="row mt-1">
				<div id="r2"></div>
			</div>
			<div class="row mt-1">
				<div id="r3"></div>
			</div>
			<div class="row mt-1">
				<div id="r4"></div>
			</div>
			<div class="row mt-1">
				<div id="r5"></div>
			</div>
			<div class="row mt-1">
				<div id="r6"></div>
			</div>
			<div class="row mt-1">
				<div id="r7"></div>
			</div>
			<div class="row mt-1">
				<div id="r8"></div>
			</div>
			<div class="row mt-1">
				<div id="r9"></div>
			</div>
		</div>
	</section>

	<section id="actions">
		<div class="container-fluid p-5">
			<div class="row">
				<div class="col-12">
					<div class="container p-0">
						<div class="row">
							<div class="col-12">
			                   <button type="button" class="btn btn-primary" onclick="setNumber()">Shuffle</button>
			                   <button id="stepbutton" type="button" class="btn btn-danger ml-4" onclick="bubblesortstep()">Step</button>
			                   <button id="playbutton" type="button" class="btn btn-danger ml-1" onclick="bubblesortplay()">Play</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Developer - Ing. Jos&eacute; Antonio Machado Garc&iacute;a</p>
        </div>
        <!-- /.container -->
    </footer>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script type="text/javascript">
	$( document ).ready(function() {
	    endsort   = 0;
		iteration = 1;
	    setNumber();
	});

    // Set width cell of numbers
    function setWidthNumber(list, listsort, bordered){
	    
	    listsort.sort((a, b) => a - b);

	    // Set width cell of numbers
		for (var k = 0; k < list.length; k++) {
			var inumsort = (listsort.indexOf(list[k])) + 1;
			if(bordered != null && (k == parseInt(bordered) || k == parseInt(bordered) + 1)){
				$('#r' + k).attr("class", "col-"+inumsort+" cell_red");
			}
			else if(bordered != null && k < endsort){
				$('#r' + k).attr("class", "col-"+inumsort+" cell_scs");
			}
			else{
				$('#r' + k).attr("class", "col-"+inumsort+" cell_blue");
			}
			console.log(k + ' * ' + endsort);
		}

		inisort   = list.length - 1;
	}

	// Set number for table
	function setNumber(){
		
		listnumbers = [];
		listnumbersort = [];
		listnumbers.length = 0;
	    listnumbersort.length = 0;

	    $('#stepbutton').attr("disabled", false);
	    $('#playbutton').attr("disabled", false);

		// Set Numbers
		for (var i = 0; i < 10; i++) {
	    	// 1 - 100
			var rdnumber = (Math.floor(Math.random() * 99) + 1) + 1;
			if(listnumbers.indexOf(rdnumber) == -1){
			        
			    listnumbers.push(rdnumber);			    
			    listnumbersort.push(rdnumber);
			    $('#r' + i).html(rdnumber);
			}	
			else{
				i = i - 1;
			}		
	    }

	    setWidthNumber(listnumbers, listnumbersort, null);
    }

	// Create Ajax Object
	function newAjax(){
		var xmlhttp=false;
	 	try {
		  	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false;
			}
		}

		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		 	xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}

	// Bubble Sort Step
	function bubblesortstep(){

		var listnumberstr = listnumbers.toString();
		
	    ajax = newAjax();

	    ajax.open("POST", "index.php", true);
		ajax.onreadystatechange = function() {
			
			if (ajax.readyState == 4){
				
				listnumbers = [];
				listnumbersort = [];
				listnumbers.length = 0;
			    listnumbersort.length = 0;

				var response = ajax.responseText,
					arr_resp = response.split('*'),
					list     = arr_resp[0].split(','),
					listsort = arr_resp[0].split(','),
					r1       = parseInt(arr_resp[1]),
					r2		 = parseInt(arr_resp[1]) + 1;
				
				$('#r' + r1).html(list[r1]);
				//console.log(r1);
				$('#r' + r2).html(list[r2]);
				//console.log(r2);

				setWidthNumber(list, listsort, parseInt(arr_resp[1]));
				
				listnumbers = list;
				listnumbersort = listsort;
				iteration = iteration + 1;
				console.log(iteration + ' * ' + endsort);
				if(iteration == (listnumbers.length - endsort)){
					endsort = endsort + 1;
					iteration = 1;
					inisort = listnumbers.length - 1;
				}
				else if(iteration < (listnumbers.length - endsort)){
					inisort = parseInt(arr_resp[1]);
				}

				if(endsort == listnumbers.length - 1){
					$('#stepbutton').attr("disabled", true);
					$('#playbutton').attr("disabled", true);
					$('#r' + r1).attr("class", "col-2 cell_scs");
					$('#r' + r2).attr("class", "col-1 cell_scs");
					return false;
				}

			}		
		}

		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("listnumberstr="+listnumberstr+"&inisort="+inisort);
	}

	// Bubble Sort Play
	async function bubblesortplay(){
       
        $('#playbutton').attr("disabled", true); 
        $('#stepbutton').attr("disabled", true);      

        while(endsort < listnumbers.length - 1){
            bubblesortstep();
            await sleep(1000);
        }
    };

    function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
    }
	</script>

</body>
</html>

<?php
}