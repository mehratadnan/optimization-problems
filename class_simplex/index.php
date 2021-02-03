<?php?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>jQuery UI Draggable - Default functionality</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.plot.ly/plotly-1.35.2.min.js"></script>
  <style>
    body {
  font-family: "Lato", sans-serif !important;
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10+ and Edge */
  user-select: none; /* Standard syntax */
}
* {
  box-sizing: border-box;
}

body {
  background-color: #b4b3b34d;
  font-family: Helvetica, sans-serif !important;
}
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #5f5f5f;
  overflow-x: hidden;
  padding-top: 20px;
  box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 2px;
  text-align:center;
}

td {
  background-color: grey !important;
  border: 1px solid #ddd;
  color:white;
}

.head{background-color: white !important;}
.arr{
 padding: 8px;
 background-color: #4CAF50 !important;
 
}
.arr1{
 padding: 8px;
 background-color: white !important;
  color:black;
  
}
.arr22{
    border-bottom: 4px solid grey;
}

.main {
   /*margin-left: 200px; Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 95%;
}

/* The circles on the timeline */
.container::after {
  box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: #5f5f5f;
  border: 3px solid #5f5f5f;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  margin-bottom: 40px;
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
  box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}

a{
    cursor: pointer;
}
.a{
    color:#7be77f !important;
}
.progress-container {
  width: 100%;
  height: 8px;
  background: #ccc;
  position: absolute;
  bottom: 0px;
}

.progress-bar {
  height: 8px;
  background: #4caf50;
  width: 0%;
}

.btn2 {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}
.info {background-color: #2196F3;} /* Blue */
.info:hover {background: #0b7dda;}
.success1 {background-color: #4CAF50;} /* Green */
.success1:hover {background-color: #46a049;} /* Green */
.success {background-color: #4CAF50;} /* Green */
.success:hover {background-color: #0b7dda;}
.color {background-color: #0b7dda !important;}
.btn1 {
  border: none;
  margin:2px;
  color: white;
  padding: 10px;
  font-size: 12px;
  cursor: pointer;
  float:left;
}

@media (min-width: 768px){
  .modal-dialog {
      width: 72%;
      margin: 30px auto;
  }
}

@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: 0.7 !important;
}


/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-1 {height: 18px; background-color: #4CAF50;}
.bar-2 {height: 18px; background-color: #2196F3;}

@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}

.newcolor{
    background-color:red !important;
}
.removeme{
  min-width: 200px !important;
}
.arr2{
  min-width:200px !important;
}

hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #100f0f;
}
.hr1 {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid red;
}


.nodemorethan4{
  background-color: #ff1717 !important;
}
  </style>
  

</head>
<body>


    <div class="main">
     
       
        
        <div id="s5" class="container left" >
            <div  class="content">
              <h2> Simplex Method </h2>
              <figure>
                <pre>
                  <code >
        0-      Fonksiyon iki değişkenli olduğu için n = 2 olsun.    𝑚 = 1.65 ∗ 𝑛 + 0.05 𝑛^2  =>   𝑚 = 3.5 ≌ 4
        1-      # minimum bulmak için  (maximum bulmak için büyük kelimesi yerine küçük yazılır).
        2-      nokta_0 = # kullanıcıdan
        3-      kenar_uzunluğu = (kullanıcı veya program tarafından belirlenir)
        4-
        5-      procedure Simpleks_Yöntemi(nokta_0 , kenar_uzunluğu){
        6-          noktalar = [] boş bir dizi olsun.
        7-          yansıtılan_noktalar = [] boş bir dizi olsun.
        8-          nokta_1 ve nokta_2 hesapla ve noktalar dizisine yerleştir.
        9-
        10-         while( nokta sayacı 𝑚 değilse  && kenar_uzunluğu > hata ){ // bu örnekte  𝑚  ≌ 4 
        11-             noktalar - yansıtılan_noktalar  dizisinde en son 3 noktaların seçilen fonksiyona göre değerlerini hesapla.
        12-             en büyük değere sahip noktayı karşı tarafa yansıt. 
        13-             yansıtma işleminde elde edilen yeni nokta, önceden var ise en büyük değere sahip 2.noktayı karşı tarafa yansıt.
        14-             yansıtma işleminde yansıtılan nokta, yansıtılan_noktalar dizisine yerleştir.
        15-             yansıtma işlemi için kullanılan noktaların (yansıtılan nokta hariç) sayaçlarını bir ile arttır.
        16-             yansıtma işleminde elde edilen yeni nokta, noktalar dizisine yerleştir ve onun sayacı bir olsun.
        17-         }
        18-
        19-         nokta_0 = nokta;
        20-         kenar_uzunluğu = kenar_uzunluğu / 2;
        21-     }
        22-
        23-     Simpleks_Yöntemi(nokta_0 , kenar_uzunluğu);
                  </code>
                </pre>
              </figure>
            </div>
        </div>

       
     
        <div id="s4" class="container left" style="display: block;">
            <div  class="content">
              <h2>Starting Parameters :</h2>
              <br>
                 <ul>
                    <li><p style="float: left;"><strong >F(x) = </strong></p>
                          <div class="form-group" style="width: 18.3%; float: left;margin-left: 20px;">
                            <input type="text" list="func" class="form-control" id="fun" name="username" >
                            <datalist id="func">
                                <option value="((Math.sqrt(x**2 + y**2)) - 0.5)**2 + 2 * ((Math.sqrt(x**2 + (y-1)**2)) - 0.5)**2 + 3 * ((Math.sqrt((x-2)**2 + (y-1)**2)) - 0.5)**2">((Math.sqrt(x**2 + y**2)) - 0.5)**2 + 2 * ((Math.sqrt(x**2 + (y-1)**2)) - 0.5)**2 + 3 * ((Math.sqrt((x-2)**2 + (y-1)**2)) - 0.5)**2</option>
                                <option value="((x**2) + (3*(y**3)) - y)">((x**2) + (3*(y**3)) - y)</option>
                                <option value="-(x**4) + x + (3*(y**3)) - y">-(x**4) + x + (3*(y**3)) - y</option>
                            </datalist>
                          </div>
                      <div class="form-group" style=" float: left;margin-left: 20px;"> Function </div>
                      <br><br>
                    <li><p style="float: left;"><strong >Side length =</strong></p>
                        <div class="form-group" style="width: 14%; float: left;margin-left: 20px;">
                            <input type="number" class="form-control" id="side" name="username" value="0.5">
                        </div>
                        <div class="form-group" style=" float: left;margin-left: 20px;"> Side length </div>
                        <br><br>
                    </li>
                    <li><p style="float: left;"><strong >node0_x =</strong></p>
                        <div class="form-group" style="width: 15.8%; float: left;margin-left: 20px;">
                            <input type="number" class="form-control" id="node0_x" name="username" value="0">
                        </div>
                        <div class="form-group" style=" float: left;margin-left: 20px;"> x of the starting pointg </div>
                        <br><br>
                    </li>
                    <li><p style="float: left;"><strong >node0_y =</strong></p>
                        <div class="form-group" style="width: 15.8%; float: left;margin-left: 20px;">
                            <input type="number" class="form-control" id="node0_y" name="username" value="0">
                        </div>
                        <div class="form-group" style=" float: left;margin-left: 20px;"> y of the starting point </div>
                        <br><br>
                    </li>
                    <li><p style="float: left;"><strong >Error =</strong></p>
                      <div class="form-group" style="width: 18%; float: left;margin-left: 20px;">
                          <input type="number" class="form-control" id="error" name="username" value="0.0001">
                      </div>
                      <div class="form-group" style=" float: left;margin-left: 20px;"> Error to stop running </div>
                      <br><br>
                  </li>
                  <li><p style="float: left;"><strong >Wanted = </strong></p>
                    <div class="form-group" style="width: 16.3%; float: left;margin-left: 20px;">
                      <select class="form-control" id="wanted">
                        <option value="Min">min</option>
                        <option value="Max">max</option>
                      </select>
                    </div>
                    <div class="form-group" style=" float: left;margin-left: 20px;"> Maxima or minima options </div>
                  </li>
                </ul>
                </div>
        </div>


        <div id="s6" class="container left" >
            <div  class="content" id="tables">
              <button id="itera" class="btn2 info" style="float:right" onclick="simplex_method()">Start</button>
              <button id="itera" class="btn2 info" style="float:left" onclick="restart_param()">Restart</button>
              <br><br>
              <h2 style="float:left">Example</h2> 
              <br><br><br>
            </div>
        </div>
      <br><br><br><br><br><br><br><br><br>
      <div id="s9" class="container left" >
        <div  class="content" >
          <h2 style="text-align: center;">Thanks!</h2> 
          <h4 style="text-align: center;">Adnan Mehrat</h5> 
        </div>
      </div>
      <br><br><br><br><br><br><br> 
    </div>
    

    

<script>


var drawed_points = [] ;
var nodes = [];
var reflected_nodes = [];
var nodes_for_using = [];
var side = 0.5;
var node0_y = 0;
var node0_x = 0;
var f = 0;
var counter_of_node = 0;
var restart_ctrl = 1 ;
var err = 0;
var table_counter=0;
var min_max = "" ;
var iter =-1 ;

function simplex_method(){
    write_file("method=remove");
    node0_x = parseFloat($("#node0_x").val());
    node0_y = parseFloat($("#node0_y").val()); 
    side = parseFloat($("#side").val()); 
    err=$("#error").val();
    min_max = $("#wanted").val();
    // var o = 0 ; 
    //alert(side +" < "+err);
    while(check_counter() == true && side > err  ){
      //o++;
      //alert(side +" = "+err);
      if(restart_ctrl!=0){
        creat_table_1();
        creat_table_2();
        first_3_node();
        write_nodes(1);
        write_reflected_node();
        extract_node_for_using();
        write_node_for_using();
        //draw_3_point();
        restart_ctrl=0;
        table_counter++;
        $("#tables").append('<hr class="removeme">' );
      }
      creat_table_1();
      creat_table_2();
      get_new_point(get_worst_fitness());
      write_nodes(1);
      write_reflected_node();
      extract_node_for_using();
      write_node_for_using();
      //draw_3_point();
      table_counter++;
      $("#tables").append('<hr class="removeme">' );
    }
    $("#tables").append('<strong  style="text-align: center;color : green " class="removeme"><br>Iter = '+iter+' </strong>');
    $("#tables").append('<strong  style="text-align: center;color : green " class="removeme"><br>Error = '+side+' <= ' +err+ ' </strong>');
    //var myJSON = JSON.stringify(drawed_points);
    //$("#tables").append('<strong  style="text-align: center;color : green " class="removeme"><br>'+myJSON+'</strong>');
}

//function my_function1(coords){
//    return ((Math.sqrt(coords[0]**2 + coords[1]**2)) - 0.5)**2 + 2 * ((Math.sqrt(coords[0]**2 + (coords[1]-1)**2)) - 0.5)**2 + 3 * ((Math.sqrt((coords[0]-2)**2 + (coords[1]-1)**2)) - 0.5)**2 ;
//}
//((Math.sqrt(x**2 + y**2)) - 0.5)**2 + 2 * ((Math.sqrt(x**2 + (y-1)**2)) - 0.5)**2 + 3 * ((Math.sqrt((x-2)**2 + (y-1)**2)) - 0.5)**2

function my_function(coords){
    var expression = $('#fun').val();
    var x = coords[0];
    var y = coords[1];
    var z = eval(expression);                     
    return z ;
}

function first_3_node(){
    
    // first node
    f = my_function([node0_x,node0_y]);
    var node = {
        number:counter_of_node,
        x:node0_x,
        y:node0_y,
        counter:0,
        f:parseFloat(f.toFixed(8))
    }
    nodes.push(node);
    counter_of_node++;
    // second node
    var node1_x = node0_x ;
    var node1_y = node0_y + side ;
    f = my_function([node1_x,node1_y]);
    node = {
        number:counter_of_node,
        x:parseFloat(node1_x.toFixed(8)) ,
        y:parseFloat(node1_y.toFixed(8)),
        counter:0,
        f:parseFloat(f.toFixed(8))
    }
    nodes.push(node);
    counter_of_node++;
    // third node
    var s60 = Math.sin(60 * Math.PI / 180.0);    
    var c60 = Math.cos(60 * Math.PI  / 180.0);
    var node2_x = c60 * (nodes[0].x - nodes[1].x) - s60 * (nodes[0].y - nodes[1].y) + nodes[0].x ;
    var node2_y = s60 * (nodes[0].x - nodes[1].x) + c60 * (nodes[0].y - nodes[1].y) + nodes[1].y ;
    f = my_function([node2_x,node2_y]);
    node = {
        number:counter_of_node,
        x:parseFloat(node2_x.toFixed(8)),
        y:parseFloat(node2_y.toFixed(8)),
        counter:0,
        f:parseFloat(f.toFixed(8))
    }
    var str = "method=writefile&str="+parseFloat(node0_x.toFixed(8))+", "+parseFloat(node0_y.toFixed(8))+", "+parseFloat(node1_x.toFixed(8))+", "+parseFloat(node1_y.toFixed(8))+", "+parseFloat(node2_x.toFixed(8))+", "+parseFloat(node2_y.toFixed(8))+", "+side;
    write_file(str);
    nodes.push(node);
    counter_of_node++;
}

function write_nodes(ctrl){
    
    var str = "[ ";
    for(var i = 0 ; i < nodes.length ;i++){
        str=str+nodes[i].number+" ,";
        if(ctrl == 1){
            $('#name_of_nodes_'+table_counter).append('<td class="arr2 removeme" id="">'+nodes[i].number+'</td>');
            $('#x_y_of_nodes_'+table_counter).append('<td class="arr1 removeme" id="">( '+nodes[i].x+' , '+nodes[i].y+' )</td>');
            $('#fitness_of_nodes_'+table_counter).append('<td class="arr1 removeme" id="">'+nodes[i].f+'</td>');
            $('#counter_of_nodes_'+table_counter).append('<td class="arr1 removeme" id="">'+nodes[i].counter+'</td>');
            //$("#just").append("nodes = ["+nodes[i].number+" , "+nodes[i].x +" , "+ nodes[i].y+" , "+nodes[i].f+" , "+nodes[i].counter+"]<br>");
        }
    }
    str = str.slice(0, -1);
    str = str + " ]";
    $('#nodes_'+table_counter).text(str);
    
    //$("#just").append("nodes = "+str+"<br>");
}

function write_reflected_node(){
    var str = "[ ";
    for(var i = 0 ; i < reflected_nodes.length ;i++){
        str=str+reflected_nodes[i].number+" ,";
    }
    str = str.slice(0, -1);
    str = str + " ]";
    $('#reflected_nodes_'+table_counter).text(str);
    
    
}

function extract_node_for_using(){
  nodes_for_using=[];
  for(var i=0 ; i<nodes.length; i++ ){
    //$("#just").append("**    "+nodes[i].number+"    **<br> ");
    var index = 1;
    for(var k=0 ; k<reflected_nodes.length; k++ ){
      //$("#just").append("****    "+reflected_nodes[k].number+"    ****<br> ");
      if(nodes[i].number == reflected_nodes[k].number){
        index = 0 ;
        //$("#just").append("****    "+reflected_nodes[k].number+"    ****<br> ");
        break;
      }
    }
    if(index !=0){
      nodes_for_using.push(nodes[i]);
      //$("#just_my_"+table_counter).append("****    "+nodes[i].number+"    ****<br> ");
    }
  }
  drawed_points.push(nodes_for_using);
}

    
function write_node_for_using(){
    var str = "[ ";
    for(var i = 0 ; i < nodes_for_using.length ;i++){
        str=str+nodes_for_using[i].number+" ,";
    }
    str = str.slice(0, -1);
    str = str + " ]";
    //alert('#node_for_using_'+table_counter);
    $('#node_for_using_'+table_counter).text(str);
    //$("#just").append("node_for_using = "+str+"<br>");
}

function get_worst_fitness(){
  var nodes_for_using_sorted = nodes_for_using;
  if(min_max == "Min"){
    nodes_for_using_sorted.sort(function(a, b) { 
      return a.f - b.f;
    });
  }else{
    nodes_for_using_sorted.sort(function(a, b) { 
      return b.f - a.f;
    });
  }
  
  return nodes_for_using_sorted ;
}

function get_new_point(nodes_to_do_reflect){
    
    
    
    var x_mid = (nodes_to_do_reflect[0].x + nodes_to_do_reflect[1].x ) /2 ;
    var y_mid = (nodes_to_do_reflect[0].y + nodes_to_do_reflect[1].y ) /2 ;
    var x_new = (2 * x_mid) - nodes_to_do_reflect[2].x ;
    var y_new = (2 * y_mid) - nodes_to_do_reflect[2].y ;
    var f = my_function([x_new, y_new]);
    if(check_if_node_exist(parseFloat(f.toFixed(8)))== true ){
      nodes_to_do_reflect.unshift(nodes_to_do_reflect.pop());
       x_mid = (nodes_to_do_reflect[0].x + nodes_to_do_reflect[1].x ) /2 ;
       y_mid = (nodes_to_do_reflect[0].y + nodes_to_do_reflect[1].y ) /2 ;
       x_new = (2 * x_mid) - nodes_to_do_reflect[2].x ;
       y_new = (2 * y_mid) - nodes_to_do_reflect[2].y ;
       f = my_function([x_new, y_new]);
       if(check_if_node_exist(parseFloat(f.toFixed(8)))== true ){
        nodes_to_do_reflect.unshift(nodes_to_do_reflect.pop());
        x_mid = (nodes_to_do_reflect[0].x + nodes_to_do_reflect[1].x ) /2 ;
        y_mid = (nodes_to_do_reflect[0].y + nodes_to_do_reflect[1].y ) /2 ;
        x_new = (2 * x_mid) - nodes_to_do_reflect[2].x ;
        y_new = (2 * y_mid) - nodes_to_do_reflect[2].y ;
        f = my_function([x_new, y_new]);
      }
    }
    $("#just_my_"+table_counter).append("<strong class='removeme' style='color:red'>reflected_node: "+nodes_to_do_reflect[2].number+"</strong>");
    reflected_nodes.push(nodes_to_do_reflect[2]);
    counter_increase(nodes_to_do_reflect[0]);
    counter_increase(nodes_to_do_reflect[1]);
    var node = {
      number:counter_of_node,
      x:parseFloat(x_new.toFixed(8)),
      y:parseFloat(y_new.toFixed(8)),
      counter:1,
      f:parseFloat(f.toFixed(8))
    }
    var str = "method=writefile&str="+parseFloat(nodes_to_do_reflect[0].x.toFixed(8))+", "+parseFloat(nodes_to_do_reflect[0].y.toFixed(8))+", "+parseFloat(nodes_to_do_reflect[1].x.toFixed(8))+", "+parseFloat(nodes_to_do_reflect[1].y.toFixed(8))+", "+parseFloat(x_new.toFixed(8))+", "+parseFloat(y_new.toFixed(8))+", "+side;
    write_file(str);

    nodes.push(node);
    counter_of_node++;
   
}

function counter_increase(node){
  for(var i = 0 ; i < nodes.length ;i++){
      if(nodes[i].number == node.number){
        nodes[i].counter = nodes[i].counter+1;
      }
  }
}

function check_counter(){
  for(b=0  ; b < nodes.length ; b++){
      if(nodes[b].counter > 3){
        $("#name_of_nodes_"+(table_counter-1)).children().eq(b+1).addClass('nodemorethan4');
        
        //.addClass("nodemorethan4");
        restart(nodes[b]);
        $("#tables").append('<hr class="hr1 removeme">' );
        return true;
      }
  }
  return true; 
}

function check_if_node_exist(f){
  for(b=0  ; b < reflected_nodes.length ; b++){
      if(reflected_nodes[b].f == f){
        return true ;
      }
  }
  return false; 
}

function restart(node){
  restart_ctrl = 1 ;
  node0_x = node.x;
  node0_y = node.y;
  
  nodes = [];
  reflected_nodes = [];
  nodes_for_using = [];
  side = (side/2);
  $("#side").val(side);
  $("#node0_x").val(node0_x);
  $("#node0_y").val(node0_y);
  
  
  //$("#just").append("<br>"+side+"</br></br>____________________________________________________________ <br>");
}

function write_file(str){
  iter++;
  //alert(str);
  $.get('controller.php?'+str, function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
  });
}


               
       

function creat_table_2(){
  $("#tables").append(
        '<div style="overflow-x: auto;" class="removeme" > <table class=table table-bordered removeme" id="table_'+table_counter+'>'+
          '<tr id="">'+
            '<td class="arr2" id=""> <strong id="side" style="font-weight: bold;font-size: 20px;"> arrays </strong></td>'+
            '<td class="arr2" id=""> <strong id="side" style="font-weight: bold;font-size: 20px;">  </strong></td>'+
          '</tr>'+
          '<tr  >'+
              '<td class="arr1" id="">nodes =</td>'+
              '<td class="arr1" id="nodes_'+table_counter+'">[ ]</td>'+
          '</tr>'+
          '<tr  >'+
              '<td class="arr1" id="">reflected_nodes =</td>'+
              '<td class="arr1" id="reflected_nodes_'+table_counter+'">[ ]</td>'+
          '</tr>'+
          '<tr >'+
              '<td class="arr1" id="">nodes - reflected_nodes =</td>'+
              '<td class="arr1" id="node_for_using_'+table_counter+'">[ ]</td>'+
          '</tr>'+
        '</table></div><div class="removeme" id="just_my_'+table_counter+'" ></div> '
    );
  
    
}

function creat_table_1(){
  $("#tables").append(
        '<div style="overflow-x: auto;"  class="removeme"> <table class="table table-bordered removeme" id="table1_1'+table_counter+'">'+
          '<tr id="name_of_nodes_'+table_counter+'">'+
              '<td class="arr2" id=""> <strong id="side_text_'+table_counter+'" > Side length = 0.5 </strong></td>'+
          '</tr>'+
          '<tr id="x_y_of_nodes_'+table_counter+'" >'+
              '<td class="arr2" id="">node (x,y) = </td>'+
          '</tr>'+
          '<tr id="fitness_of_nodes_'+table_counter+'" >'+
              '<td class="arr2" id="">node_fitness = </td>'+
          '</tr>'+
          '<tr id="counter_of_nodes_'+table_counter+'">'+
              '<td class="arr2" id="">node_counter = </td>'+
          '</tr>'+
        '</table></div><br class="removeme">'
    );
    $('#side_text_'+table_counter).text(side);
}

function draw_3_point(){
  if(table_counter <11 ){
    for(var b=0  ; b < drawed_points.length ; b++){
      if(b+1 == drawed_points.length){
        draw(drawed_points[b],1);
      }else{
        draw(drawed_points[b],0);
      }
      
    }
  }

  $('.infolayer').remove();
  //var myJSON = JSON.stringify(drawed_points);
  //$("#tables").append('<strong  style="text-align: center;color : green " class="removeme"><br>'+myJSON+'</strong>');
}


function draw(drawed_points,text_last_points) {
  var x1_name = '';
  var x2_name='';
  var x3_name='';
  var color ='grey';
  var color1 ='black';
  if(text_last_points==1){
    x1_name = drawed_points[0].number;
    x2_name = drawed_points[1].number;
    x3_name = drawed_points[2].number;
    color='red';
    color1 ='red';
  }
    var trace1 = {
      x: [drawed_points[0].x,drawed_points[1].x,drawed_points[2].x,drawed_points[0].x],
      y: [drawed_points[0].y,drawed_points[1].y,drawed_points[2].y,drawed_points[0].y],
      type: 'scatter',
      mode: 'lines+markers+text',
      text: [x1_name,x2_name,x3_name],
      textposition: "center",
      textfont: {
        family: "sans serif",
        size: 20,
        color: "white",
      },
      line: {
        color: color ,
        width: 3
      },
      marker: {
        color: color1,
        size: 25
      },
      
    };
    var trace2 = {
        x: [5],
        y: [3],
        marker: {
          color: 'white',
          size: 10
        },
    };
    var data = [trace1,trace2];
    //alert($('#plot_'+table_counter).length);
    if ($('#plot_'+table_counter).length > 0){
      Plotly.addTraces("plot_"+table_counter, data);
    }else{
      $("#tables").append('<div class="removeme" id="plot_'+table_counter+'" style="overflow-x: scroll;"></div> ' );
      
      var layout = {
        height: 800,
        xaxis: {
          autotick: false,
          ticks: 'outside',
          tick0: 0,
          dtick: 0.5,
          ticklen: 8,
          tickwidth: 4,
          tickcolor: '#000'
        },
        yaxis: {
          autotick: false,
          ticks: 'outside',
          tick0: 0,
          dtick: 0.5,
          ticklen: 8,
          tickwidth: 4,
          tickcolor: '#000'
        }
      };
      Plotly.newPlot('plot_'+table_counter, data,layout);
    }
}


function restart_param(){
  drawed_points = [] ;
  nodes = [];
  reflected_nodes = [];
  nodes_for_using = [];
  side = 0.5;
  node0_y = 0;
  node0_x = 0;
  f = 0;
  counter_of_node = 0;
  restart_ctrl = 1 ;
  err = 0;
  table_counter=0;
  iter=-1;
  min_max = "" ;
  $("#node0_x").val(node0_x);
  $("#node0_y").val(node0_x);
  $("#side").val(side);
  $("#error").val(0.0001);
  $("#wanted").val("Min");
  $(".removeme").remove();
}

</script>
</body>
</html>


                    
               