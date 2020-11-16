<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
if(!isset($_SESSION['admin_userid']))
{
    header('location:adminLogin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <style>
        h1 {
        color: #333;
        font-family: arial, sans-serif;
        margin: 1em auto;
        width: 80%;
        }

        .tabordion {
        color: #333;
        display: block;
        font-family: arial, sans-serif;
        margin: auto;
        position: relative;
        width: 80%;
        }

        .tabordion input[name="sections"] {
        left: -9999px;
        position: absolute;
        top: -9999px;
        }

        .tabordion section {
        display: block;
        }

        .tabordion section label {
        background: #ffadb1;
        border:1px solid #fff;
        cursor: pointer;
        display: block;
        font-size: 1.2em;
        font-weight: bold;
        padding: 15px 20px;
        position: relative;
        width: 180px;
        z-index:100;
        }

        .tabordion section article {
        display: none;
        left: 230px;
        min-width: 300px;
        padding: 0 0 0 21px;
        position: absolute;  
        top: 0;
        }

        .tabordion section article:after {
        background-color: #ffadb1;
        bottom: 0;
        content: "";
        display: block;
        left:-229px;
        position: absolute;
        top: 0;
        width: 220px;
        z-index:1;
        }

        .tabordion input[name="sections"]:checked + label { 
        background: #6e4747;
        color: #fff;
        }

        .tabordion input[name="sections"]:checked ~ article {
        display: block;
        }


        @media (max-width: 533px) {
        
        h1 {
            width: 100%;
        }

        .tabordion {
            width: 100%;
        }
        
        .tabordion section label {
            font-size: 1em;
            width: 160px;
        }  

        .tabordion section article {
            left: 200px;
            min-width: 270px;
        } 
        
        .tabordion section article:after {
            background-color: #ffadb1;
            bottom: 0;
            content: "";
            display: block;
            left:-199px;
            position: absolute;
            top: 0;
            width: 200px;

        }  
        
        }


        @media (max-width: 768px) {
        h1 {
            width: 96%;
        }

        .tabordion {
            width: 96%;
        }
        }


        @media (min-width: 1366px) {
        h1 {
            width: 70%;
        }

        .tabordion {
            width: 70%;
        }
        }
        
        
  
    body {
    	background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
    	color: #444;
    	font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
    	text-shadow: 0 1px 0 #fff;
    	
    	* {box-sizing: border-box;}
    }
    
    strong {
    	font-weight: bold; 
    }
    
    em {
    	font-style: italic; 
    }
    
    table {
    	background: #f5f5f5;
    	border-collapse: separate;
    	box-shadow: inset 0 1px 0 #fff;
    	font-size: 12px;
    	line-height: 24px;
    	margin: 30px auto;
    	text-align: left;
    	width: 1000px;
    }	
    
    th {
    	background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
    	border-left: 1px solid #555;
    	border-right: 1px solid #777;
    	border-top: 1px solid #555;
    	border-bottom: 1px solid #333;
    	box-shadow: inset 0 1px 0 #999;
    	color: #fff;
        font-weight: bold;
    	padding: 10px 15px;
    	position: relative;
    	text-shadow: 0 1px 0 #000;	
    }
    
    th:after {
    	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
    	content: '';
    	display: block;
    	height: 25%;
    	left: 0;
    	margin: 1px 0 0 0;
    	position: absolute;
    	top: 25%;
    	width: 100%;
    }
    
    th:first-child {
    	border-left: 1px solid #777;	
    	box-shadow: inset 1px 1px 0 #999;
    }
    
    th:last-child {
    	box-shadow: inset -1px 1px 0 #999;
    }
    
    td {
    	border-right: 1px solid #333;
    	border-left: 1px solid #333;
    	border-top: 1px solid #333;
    	border-bottom: 1px solid #333;
    	padding: 10px 15px;
    	position: relative;
    	transition: all 300ms;
    }
    
    td:first-child {
    	box-shadow: inset 1px 0 0 #fff;
    }	
    
    td:last-child {
    	border-right: 1px solid #e8e8e8;
    	box-shadow: inset -1px 0 0 #fff;
    }	
    
    tr {
    	background: #ffdedf url(https://jackrugile.com/images/misc/noise-diagonal.png);	
    }
    
    tr:nth-child(odd) td {
    	background: #ffdedf url(https://jackrugile.com/images/misc/noise-diagonal.png);	
    }
    
    tr:last-of-type td {
    	box-shadow: inset 0 -1px 0 #fff; 
    }
    
    tr:last-of-type td:first-child {
    	box-shadow: inset 1px -1px 0 #fff;
    }	
    
    tr:last-of-type td:last-child {
    	box-shadow: inset -1px -1px 0 #fff;
    }	
    
    tbody:hover td {
    	color: transparent;
    	text-shadow: 0 0 3px #aaa;
    }
    
    tbody:hover tr:hover td {
    	color: #444;
    	text-shadow: 0 1px 0 #fff;
    }  
    

        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
          background-color: #555;
          color: white;
          padding: 16px 20px;
          border: none;
          cursor: pointer;
          opacity: 0.8;
          position: fixed;
          bottom: 23px;
          right: 28px;
          width: 150px;
        }
        
        /* The popup form - hidden by default */
        .form-popup {
          display: none;
          position: fixed;
          bottom: 0;
          right: 15px;
          border: 3px solid #f1f1f1;
          z-index: 9;
        }
        
        /* Add styles to the form container */
        .form-container {
          max-width: 300px;
          padding: 10px;
          background-color: white;
        }
        
        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          border: none;
          background: #f1f1f1;
        }
        
        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }
        
        /* Set a style for the submit/login button */
        .form-container .btn {
          background-color: #4CAF50;
          color: white;
          padding: 16px 20px;
          border: none;
          cursor: pointer;
          width: 100%;
          margin-bottom:10px;
          opacity: 0.8;
        }
        
        /* Add a red background color to the cancel button */
        .form-container .cancel {
          background-color: red;
        }
        
        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
          opacity: 1;
        }
        
        
    #snackbar, #snackbarQ {
      visibility: hidden; /* Hidden by default. Visible on click */
      min-width: 250px; /* Set a default minimum width */
      margin-left: -125px; /* Divide value of min-width by 2 */
      background-color: #823c3f; 
      color: #fff; /* White text color */
      text-align: center; /* Centered text */
      border-radius: 2px; /* Rounded borders */
      padding: 16px; /* Padding */
      position: fixed; /* Sit on top of the screen */
      z-index: 1; /* Add a z-index if needed */
      left: 50%; /* Center the snackbar */
      bottom: 30px; /* 30px from the bottom */
    }
    
    #snackbar.show, #snackbarQ.show {
      visibility: visible; 
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }
    
  
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
   
</head>
<body style="background-color:#e0eeff;">

<div id="snackbar">Product Added</div>
<div id="snackbarQ">Category Added</div>

<center><h1>Admin Page</h1></center>


<script>
    function updateStat(a,b)
    {
    if(b==2)
    {
        z = document.getElementById(a+'n');
        z.remove();
        $.ajax({
            type: "POST",
            url: "updateStatus.php",
            data:{oid1:a,stat1:"Confirmed"},
            dataType:"json",
            success: function(response){
                
                c = document.getElementById('row'+a+'n');
                c.innerHTML = "<p style='font-size: 20px;'>Confirmed</p>";
              sendemail(a);
            }
        });  
       document.getElementById(a).setAttribute("onclick", "updateDel(this.id)");
    }
  else{
      
  $.ajax({
    type: "POST",
    url: "updateStatus.php",
    data:{oid1:a.substring(0,a.length-1),stat1:"Rejected"},
    dataType:"json",
    success: function(response){
         c = document.getElementById('row'+a);
         c.innerHTML = "<p style='font-size: 20px;'>Rejected</p>";
         sendrejected(a);
          document.getElementById(a).remove();
          document.getElementById(a.substring(0,a.length-1)).remove();
        }
  });   
    }
}

function updateDel(a){
    $.ajax({
    type: "POST",
    url: "updateStatus.php",
    data:{oid1:a,stat1:"Delivered"},
    dataType:"json",
    success: function(response){
         c = document.getElementById('row'+a+'n');
         c.innerHTML = "<p style='font-size: 20px;'>Delivered</p>";
         document.getElementById(a).remove();
        }
  });   
}


function insertProduct()
{
  var price = document.getElementById('pprice').value;
  var name = document.getElementById('pname').value;
  var img = document.getElementById('pimg').value;
  var code = document.getElementById('pcode').value;
    
  $.ajax({
    type: "POST",
    data:{pprice:price,pname:name,pimg:img,pcode:code},
    url: "crudfun.php",
    dataType:"json",
    success: function(response){
      var x = document.getElementById("snackbar");
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
      location.reload();
    }
  });

}

function sendemail(a)
{          
      $.ajax({
            type: "POST",
            url: "getemail.php",
            data:{oid:a},
            dataType:"json",
            success: function(response){
            
            }
        });   
    
}
function sendrejected(a)
{         
      $.ajax({
            type: "POST",
            url: "sendemail.php",
            data:{oid:a},
            dataType:"json",
            success: function(response){
            
            }
        });   
    
}

function insertCat()
{
  var code = document.getElementById('ccode').value;
  var name = document.getElementById('cname').value;

  $.ajax({
    type: "POST",
    data:{ccode:code,cname:name},
    url: "crudfun1.php",
    dataType:"json",
    success: function(response){
      var x = document.getElementById("snackbarQ");
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
      location.reload();
    }
  });
}

</script>
<div class="tabordion" >
  <section id="section1" >
    <input type="radio" name="sections" id="option1" checked>
    <label for="option1">Products</label>
    <article>
      <h2>Products</h2>
      
      <button class="open-button" onclick="openForm()">ADD</button>

        <div class="form-popup" id="myForm">
          <form class="form-container">
            <h1>NEW PRODUCT</h1>
            <input type="text" placeholder="Name" name="pname" id="pname" required>
            <input type="text" placeholder="Code" name="pcode" id="pcode" required>
            <input type="text" placeholder="Price" name="pprice" id="pprice" required>
            <input type="text" placeholder="Image Path" name="pimg"id="pimg" required>
        
            <button type="button" class="btn" onclick="insertProduct()">ADD PRODUCT</button>
            <button type="button" class="btn cancel" onclick="closeForm()">CLOSE</button>
          </form>
        </div>


        <table>
        <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        </tr>
        <?php
         $product_array = $db_handle->runQuery("SELECT * FROM cart");
            foreach($product_array as $key=>$value){
                $img=$product_array[$key]['image'];
                $name=$product_array[$key]['name'];
                $price=$product_array[$key]['price'];
        echo "<tr><td style='width: 135px;'>" . "<img src= $img width=80px height=80px>". "</td><td style='width: 400px;'>"."<p style='font-size: 20px;'><b>".$name."</b></p>"."</td><td>". "<p style='font-size: 20px;'>".$price."</p>". "</td></tr>";
        } 
        ?>
        </table>
    </article>
  </section>

  <section id="section2">
    <input type="radio" name="sections" id="option2">
    <label for="option2">Categories</label>
    <article>
      <h2>Categories</h2>
      
        <button class="open-button" onclick="openForm1()">ADD</button>

        <div class="form-popup" id="myForm1">
          <form class="form-container">
            <h1>NEW CATEGORY</h1>
            <input type="text" placeholder="Name" name="cname" id="cname" required>
            <input type="text" placeholder="Code" name="ccode" id="ccode" required>
        
            <button type="button" class="btn" onclick="insertCat()">ADD CATEGORY</button>
            <button type="button" class="btn cancel" onclick="closeForm1()">CLOSE</button>
          </form>
        </div>
        
        <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
        function openForm1() {
          document.getElementById("myForm1").style.display = "block";
        }
        
        function closeForm1() {
          document.getElementById("myForm1").style.display = "none";
        }
        </script>
      
        <table>
        <tr>
        <th>Name</th>
        <th>Code</th>
        </tr>
        <?php
         $product_array = $db_handle->runQuery("SELECT * FROM categories");
            foreach($product_array as $key=>$value){
                $img=$product_array[$key]['name'];
                $code=$product_array[$key]['code'];
        echo "<tr><td>" . "<p style='font-size: 20px;'>".$img."</p>"."</td><td>" . "<p style='font-size: 20px;'>".$code."</p>"."</td></tr>";
        } 
        ?>
        </table>
        
        
   </article>
  </section>
  
  <section id="section3">
    <input type="radio" name="sections" id="option3">
    <label for="option3">Orders</label>
    <article>
      <h2>Orders</h2>
        <table>
        <tr>
        <th>Order Id</th>
        <th>IP</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Email</th>
        <th>Status</th>
        </tr>
        <?php
         $product_array = $db_handle->runQuery("SELECT ip_table.ip,order_table.*,users.Email FROM ip_table,order_table,users where order_table.person_id=users.Personid and order_table.order_id = ip_table.order_id order by Status ASC");
            foreach($product_array as $key=>$value){
                $oid=$product_array[$key]['order_id'];
                $ip=$product_array[$key]['ip'];
                $name=$product_array[$key]['name'];
                $price=$product_array[$key]['amount'];
                $date=$product_array[$key]['date'];
                $email=$product_array[$key]['Email'];
                $status=$product_array[$key]['Status'];
                $id1 = 'row'.$oid;
                $id=$id1.'n';
                
        echo "<tr><td>" . "<p style='font-size: 20px;'>".$oid."</p>". "</td><td>"."<p style='font-size: 20px;'>".$ip."</p>"."</td><td>"."<p style='font-size: 20px;'>".$name."</p>"."</td><td>". "<p style='font-size: 20px;'>".$price."</p>".
"</td><td>"."<p style='font-size: 20px;'>".$date."</p>"."</td><td>"."<p style='font-size: 20px;'>".$email."</p>". "</td><td  id = $id>"."<p style='font-size: 20px;'>".$status."</p>"."</td>";
        if($status=='Pending'){
        ?>
                    <td>
                    <button  onclick=updateStat(this.id,2) id = '<?php echo $oid;?>'><span><img src='Images/tick.png' width=20px height=20px></span>
                    </button>
                    <button id = "<?php echo $oid.'n';?>" onclick=updateStat(this.id,1)
                    <span><img src='Images/remove.png' width=20px height=20px></span>
                    </button></td></tr>
                   <?php
                }
        else if($status=='Confirmed'){
        ?>
                    <td>
                    <button  onclick=updateDel(this.id) id = '<?php echo $oid;?>'><span><img src='Images/tick.png' width=20px height=20px></span>
                    </button>
                    </td></tr>
                   <?php
                }
        } 
        ?>
        
       
        
        </table>
    </article>
  </section>

  <section id="section4" >
    <input type="radio" name="sections" id="option4">
    <label for="option4">Users</label>
    <article>
      <h2>Users</h2>
        <table>
        <tr>
        <th>Name</th>    
        <th>Mobile</th>
        <th>Email</th>
        </tr>
        <?php
         $product_array = $db_handle->runQuery("SELECT * FROM users");
            foreach($product_array as $key=>$value){
                $img=$product_array[$key]['Name'];
                $name=$product_array[$key]['Mobile_Number'];
                $price=$product_array[$key]['Email'];
        echo "<tr><td>" . "<p style='font-size: 20px;'>".$img."</p>". "</td><td>"."<p style='font-size: 20px;'>".$name."</p>"."</td><td>". "<p style='font-size: 20px;'>".$price."</p>". "</td></tr>";
        } 
        ?>
        
        </table>
         </article>
    
  </section>
  
  
   <section id="section5" >
    <input type="radio" name="sections" id="option5">
    <label for="option5">Analytics</label>
    <article>
         <?php
         $dataPoints = array(); 
         $dataPoints1 = array(); 
         
         $product_array = $db_handle->runQuery('select hits,name from cart'); 
         $date_array = $db_handle->runQuery('SELECT sum(amount) as a,date from order_table GROUP BY date ORDER BY date'); 

       foreach($product_array as $row){
           if($row['hits']>0){
               $a=$row['name'];
               array_push($dataPoints, array("label"=>"$a", "y"=> $row['hits']));
                }
           
       }
       foreach($date_array as $row){
            $a=$row['date'];
            array_push($dataPoints1, array("label"=>"$a", "y"=> $row['a']));
                
    }
    
        ?> <script>
        window.onload = function () {
         
        var chart = new CanvasJS.Chart("chartContainer", {
        	theme: "light2",
        	animationEnabled: true,
        	title: {
        		text: "Product wise sales"
        	},
        	data: [{
		        type: "column", //change type to bar, line, area, pie, etc  
		        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	           }]
        });
        chart.render();
 
            var chart1 = new CanvasJS.Chart("chartContainer1", {
        	theme: "light2",
        	animationEnabled: true,
        	title: {
        		text: "Day wise sales"
        	},
        	data: [{
		        type: "line", //change type to bar, line, area, pie, etc  
		        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	           }]
        });
        chart1.render();
         
        }
        </script>
        <div id="chartContainer" style="height: 500px; width: 1100px;"></div>
        <div id="chartContainer1" style="height: 500px; width: 1100px;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                
    </article>
  </section>
  

</body>
</html>