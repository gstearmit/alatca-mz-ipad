<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rebound - Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Alatca Magazinge">
    <meta name="author" content="Pukeko Design Studio">    
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
	<!-- quảng cao-->
	<link rel="stylesheet" type="text/css" href="css/demoad.css" />
    <link rel="stylesheet" type="text/css" href="css/flipbook.style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<style type="text/css">		
		.cover{
			position:relative; 
			display:inline-block;	
			width:110px;
			float:left;
			
		}
		.img-top{
			width:110px; 
			height:140px;
			margin: 0px;
		}
		.cover a{
			font-size:12px;
			text-align:center;
		}
	</style>  
	
	<script lang="javascript" type="text/javascript">
    function OnLoad(){
        //alert('Xin Chao Ban Hoang COng Phuc');
        
    }
	</script>
    <!-- Fav and touch icons -->
  </head>
  <body  onload="OnLoad()"  > 
    <div class="wrapper">
      <div class="row">
	  <div class="recent ">	
		<div id="List" class="recent_carousel" data-settings='{ 
						"auto": true,
						"pause": 5000,
						"slideWidth": 120,
						"minSlides": 1,
						"infiniteLoop": 1,
						"maxSlides": 10,
						"slideMargin": 20,
						"controls" : false,
						"pager" : false,
						"infiniteLoop": true
					}'>
			</div>
		 <div/>
     </div> <!--end row -->
    </div><!-- end wrapper -->
    <div class="">
			<div id="grid-gallery" class="grid-gallery">
				<section class="grid-wrap">
					<ul id="employeeList" class="grid"></ul>
				</section><!-- // grid-wrap -->
				<section class="slideshow">
					<ul>
						<li>
						</li>
					</ul>
					<nav>
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"></span>
					</nav>					
					</section><!-- // slideshow -->
					</div><!-- // grid-gallery -->		
		<div class="pagination-wrapper">		  
            <ul class="pagination">
              <li class="disabled"><span>Prev</span></li>
              <li class="active"><a href="#none">1</a></li>
              <li><a href="#none">2</a></li>
              <li><a href="#none">3</a></li>
              <li><a href="#none">4</a></li>
              <li><a href="#none">5</a></li>
              <li><a href="#none">Next</a></li>
            </ul>
          </div><!-- end pagination-wrapper -->
		  </div> <!-- end content -->
    <footer class="hidden-xs">
      <p class="pull-left"></p>
      <p class="pull-right"><a href="#">&copy; 2014 Alatca. All Rights Reserved</a>.</p>
    </footer>  
	<!-- Quảng cáo -->
	<div id="cdawrap" onclick='Remove_adv()' >
			<div id="bsap_402" class="bsap" data-serve="CKSDE">				 
				<div id="fusion_ad">				
				<span class="fusionentire">
				 <a href="#" title="testting adv alatca" target="_top">
				   <img src="img/adv.jpg" alt="magazin-publish" border="0"  style=" margin-top:10px;"/></a>
				   <a href="#" class="fusiontext" title="testting adv alatca." target="_top">Auto Cart</a>
				</span>
			</div>			
			</div>				
			<span id="cda-remove"></span>
	</div>
			<!-- END quảng cáo -->
	<script src="js/remove_adv.js" type="text/javascript"></script>	
    <!-- Le javascript-->
	<script src="js/jquery.js"></script>
	<script src="js/employeelist.js"></script>
	<script src="js/three66.min.js"></script>
	<script src="js/flipbook.preview.min.js"></script>
	<script type="text/javascript">
        jQuery(document).ready(function ($) {
		    localStorage['serviceURL'] =  "http://service.topprinter.org/magazinepublish-rest"; 
			var serviceURL = localStorage['serviceURL'];
			var service2 = serviceURL +'/';
			var img = "http://service.topprinter.org/images/";
			//$(document).ajaxError(function(event, request, settings) {
				//$('#busy').hide();
				//alert("Not connected internet. Try again..");
			//});
			 var bookArray =  new Array();
			 var bookjsonAr = new Array();
		
					$.ajax({
						url : serviceURL,
						dataType : 'json',
						async:false,
						success : function(data)
						{
						   var array = data.data;
						   var totalrecord = array.lenght;
							$.each(array, function(i , books)
							{
								// alert(JSON.stringify(books));
								 alert(books.id);
								 bookArray[books.id] = new Array();
								 bookjsonAr[books.id] = new Array();
								
													$.ajax({
												        url : service2 + books.id,
														dataType : 'json',
													    async:false,
														success : function(array)
														{
														   var array1 = array.data;	  
															$.each(array1, function(j , detail)
															{
																// alert(JSON.stringify(detail));
																// return false;
																  
																  var tmp = new Array();
																      tmp = JSON.stringify(detail);
																      bookArray[books.id] = bookArray[books.id].concat(tmp);


																//  var detail_img = detail.img;
																//  var detail_page = detail.page;
																      bookjsonAr[books.id] = [
																						      bookjsonAr[books.id].concat(tmp)
																							 ];
															});
															
														},
														
														});
								alert('phuc :'+bookArray[books.id]);	
								alert('json page :'+ bookjsonAr[books.id]);
								// return false;				
								//alert('tong chieu dai '+ totalrecorl);					
								return false;
							});
							//$.each(array, function(i, employee) 
							//{
							//   $('#List').append('<div class="cover cover3"> <a href="#">' +
							//	'<img class="img-top" src="'+img + employee.imgkey + '" />' +
							//	'<p>' + employee.title + '</p></a></div>' );
								//'<span class="bubble">' + employee.reportCount + '</span></a></li>');
							//});
						},
						
					});

					
        
      //  for(var i=0 ;i<book.length;i++)
      //  	{
      //  	alert(book[i]);
      //  	}
   //   book.forEach(funtion(candy))
   //   {
    //	  alert(candy);
    	  
     // }
		   
   //i<= totalrecord 
//    var booka = new Array();
//    var test = new Array();
//    for(var i = 0 ; i<5 ;i++)
// 	   {
// 	    booka[i] =  {
// 			         pages:[
			                
// 			                $.ajax({
// 								url : serviceURL,
// 								dataType : 'json',
// 								async:false,
// 								success : function(data)
// 								{
// 								   var array = data.data;
// 								   $.each(array, function(i , books)
// 									{
						                  
// 						                      $.ajax({
// 											        url : service2 + books.id,
// 													dataType : 'json',
// 												    async:false,
// 													success : function(array)
// 													{
// 													   var array1 = array.data;	  
// 														$.each(array1, function(j , detail)
// 														{  
// 															 //alert(JSON.stringify(detail));
// 															 //return false;
// 															// {src: "detail.img", thumb:"detail.img", title:"detail.page"},
// 						                                     // {src: detail.img, thumb:detail.img, title:detail.page},
// 															test = [{src: ' detail.img', thumb:'detail.img', title:'detail.page'}];
															
// 												        });
									
// 											        },
											
// 											        });//end jax
											        
												
// 									 });
// 								 },
											
// 							   }) //; end jax
							
// 					  ],
// 					lightBox:true, 
// 					webgl:true,
// 					skin:"light",
// 					tilt:-15,
// 					bookY:50,
// 					zoom:.9
					
// 	                 };
	   
// 	}// end for   
	   
	   
	   
			var book1 = {
			   
                pages:[
                    {src:"images/book1/car_magazine_1.jpg", thumb:"images/book1/car_magazine_1.jpg", title:"Cover"},
                    {src:"images/book1/car_magazine_2.jpg", thumb:"images/book1/car_magazine_2.jpg", title:"Page two"},
                    {src:"images/book1/car_magazine_3.jpg", thumb:"images/book1/car_magazine_3.jpg", title:"Page three"},
                    {src:"images/book1/1.jpg", thumb:"images/book1/1.jpg", title:""},
                    {src:"images/book1/2.jpg", thumb:"images/book1/2.jpg", title:"Page five"},
                    {src:"images/book1/3.jpg", thumb:"images/book1/3.jpg", title:"Page six"},
                    {src:"images/book1/page1.png", thumb:"images/book1/page1.png", title:""},
                    {src:"images/book1/page2.png", thumb:"images/book1/page2.png", title:"Page eight"},
                    {src:"images/book1/page3.png", thumb:"images/book1/page3.png", title:"page testting"},
                    {src:"images/book1/page4.png", thumb:"images/book1/page4.png", title:""},
                    {src:"images/book1/page5.png", thumb:"images/book1/page5.png", title:""},
                    {src:"images/book1/page6.png", thumb:"images/book1/page6.png", title:""},
                    {src:"images/book1/page7.png", thumb:"images/book1/page7.png", title:""},
                    {src:"images/book1/page8.png", thumb:"images/book1/page8.png", title:""},
                    {src:"images/book1/page9.png", thumb:"images/book1/page9.png", title:"Page fifteen"},
                    {src:"images/book1/page1.png", thumb:"images/book1/page1.png", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				tilt:-15,
				bookY:50,
				zoom:.9
			};	
			var book2 = {
                pages:[
                    {src:"images/book2/1.jpg", thumb:"images/book2/2.jpg", title:"Cover"},
                    {src:"images/book2/2.jpg", thumb:"images/book2/1.jpg", title:"Page two"},
                    {src:"images/book2/1.jpg", thumb:"images/book2/2.jpg", title:"Page three"},
                    {src:"images/book2/2.jpg", thumb:"images/book2/1.jpg", title:"Page 4"},
                    {src:"images/book2/1.jpg", thumb:"images/book2/2.jpg", title:"Page 5"},
                    {src:"images/book2/2.jpg", thumb:"images/book2/1.jpg", title:"Page 6"},
                    {src:"images/book2/1.jpg", thumb:"images/book2/2.jpg", title:"Page 7"},
                    {src:"images/book2/2.jpg", thumb:"images/book2/1.jpg", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,
			};
			var book3 = {
                pages:[
                    {src:"images/book3/1.jpg", thumb:"images/book3/2.jpg", title:"Cover"},
                    {src:"images/book3/2.jpg", thumb:"images/book3/1.jpg", title:"Page two"},
                    {src:"images/book3/3.png", thumb:"images/book3/4.png", title:"Page three"},
                    {src:"images/book3/4.png", thumb:"images/book3/3.png", title:"Page 4"},
                    {src:"images/book3/1.jpg", thumb:"images/book3/2.jpg", title:"Page 5"},
                    {src:"images/book3/2.jpg", thumb:"images/book3/1.jpg", title:"Page 6"},
                    {src:"images/book3/3.png", thumb:"images/book3/3.png", title:"Page 7"},
                    {src:"images/book3/4.png", thumb:"images/book3/4.png", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,
			};		
			var book4 = {
                pages:[
                    {src:"images/book4/1.png", thumb:"images/book4/4.png", title:"Cover"},
                    {src:"images/book4/2.png", thumb:"images/book4/3.png", title:"Page two"},
                    {src:"images/book4/3.png", thumb:"images/book4/2.png", title:"Page three"},
                    {src:"images/book4/4.png", thumb:"images/book4/1.png", title:"Page 4"},
                    {src:"images/book4/1.png", thumb:"images/book4/4.png", title:"Page 5"},
                    {src:"images/book4/2.png", thumb:"images/book4/3.png", title:"Page 6"},
                    {src:"images/book4/3.png", thumb:"images/book4/2.png", title:"Page 7"},
                    {src:"images/book4/4.png", thumb:"images/book4/1.png", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,
			};
			var book5 = {
                pages:[
                    {src:"images/book5/1.png", thumb:"images/book5/4.png", title:"Cover"},
                    {src:"images/book5/2.png", thumb:"images/book5/3.png", title:"Page two"},
                    {src:"images/book5/3.png", thumb:"images/book5/2.png", title:"Page three"},
                    {src:"images/book5/4.png", thumb:"images/book5/1.png", title:"Page 4"},
                    {src:"images/book5/1.png", thumb:"images/book5/4.png", title:"Page 5"},
                    {src:"images/book5/2.png", thumb:"images/book5/3.png", title:"Page 6"},
                    {src:"images/book5/3.png", thumb:"images/book5/2.png", title:"Page 7"},
                    {src:"images/book5/4.png", thumb:"images/book5/1.png", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,
			};
			var book1 = {
                pages:[
                    {src:"images/book1/car_magazine_1.jpg", thumb:"images/book1/car_magazine_1.jpg", title:"Cover"},
                    {src:"images/book1/car_magazine_2.jpg", thumb:"images/book1/car_magazine_2.jpg", title:"Page two"},
                    {src:"images/book1/car_magazine_3.jpg", thumb:"images/book1/car_magazine_3.jpg", title:"Page three"},
                    {src:"images/book1/1.jpg", thumb:"images/book1/1.jpg", title:""},
                    {src:"images/book1/2.jpg", thumb:"images/book1/2.jpg", title:"Page five"},
                    {src:"images/book1/3.jpg", thumb:"images/book1/3.jpg", title:"Page six"},
                    {src:"images/book1/page1.png", thumb:"images/book1/page1.png", title:""},
                    {src:"images/book1/page2.png", thumb:"images/book1/page2.png", title:"Page eight"},
                    {src:"images/book1/page3.png", thumb:"images/book1/page3.png", title:"page testting"},
                    {src:"images/book1/page4.png", thumb:"images/book1/page4.png", title:""},
                    {src:"images/book1/page5.png", thumb:"images/book1/page5.png", title:""},
                    {src:"images/book1/page6.png", thumb:"images/book1/page6.png", title:""},
                    {src:"images/book1/page7.png", thumb:"images/book1/page7.png", title:""},
                    {src:"images/book1/page8.png", thumb:"images/book1/page8.png", title:""},
                    {src:"images/book1/page9.png", thumb:"images/book1/page9.png", title:"Page fifteen"},
                    {src:"images/book1/page1.png", thumb:"images/book1/page1.png", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				tilt:-15,
				bookY:50,
				zoom:.9
			};
			var book2 = {
                pages:[
                    {src:"images/book2/1.jpg", thumb:"images/book2/2.jpg", title:"Cover"},
                    {src:"images/book2/2.jpg", thumb:"images/book2/1.jpg", title:"Page two"},
                    {src:"images/book2/1.jpg", thumb:"images/book2/2.jpg", title:"Page three"},
                    {src:"images/book2/2.jpg", thumb:"images/book2/1.jpg", title:"Page 4"},
                    {src:"images/book2/1.jpg", thumb:"images/book2/2.jpg", title:"Page 5"},
                    {src:"images/book2/2.jpg", thumb:"images/book2/1.jpg", title:"Page 6"},
                    {src:"images/book2/1.jpg", thumb:"images/book2/2.jpg", title:"Page 7"},
                    {src:"images/book2/2.jpg", thumb:"images/book2/1.jpg", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,
			};
			var book3 = {
                pages:[
                    {src:"images/book3/1.jpg", thumb:"images/book3/2.jpg", title:"Cover"},
                    {src:"images/book3/2.jpg", thumb:"images/book3/1.jpg", title:"Page two"},
                    {src:"images/book3/3.jpg", thumb:"images/book3/4.jpg", title:"Page three"},
                    {src:"images/book3/4.jpg", thumb:"images/book3/3.jpg", title:"Page 4"},
                    {src:"images/book3/1.jpg", thumb:"images/book3/2.jpg", title:"Page 5"},
                    {src:"images/book3/2.jpg", thumb:"images/book3/1.jpg", title:"Page 6"},
                    {src:"images/book3/3.jpg", thumb:"images/book3/3.jpg", title:"Page 7"},
                    {src:"images/book3/4.jpg", thumb:"images/book3/4.jpg", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,
			};
			
			var book4 = {
                pages:[
                    {src:"images/book4/1.jpg", thumb:"images/book4/4.jpg", title:"Cover"},
                    {src:"images/book4/2.jpg", thumb:"images/book4/3.jpg", title:"Page two"},
                    {src:"images/book4/3.jpg", thumb:"images/book4/2.jpg", title:"Page three"},
                    {src:"images/book4/4.jpg", thumb:"images/book4/1.jpg", title:"Page 4"},
                    {src:"images/book4/1.jpg", thumb:"images/book4/4.jpg", title:"Page 5"},
                    {src:"images/book4/2.jpg", thumb:"images/book4/3.jpg", title:"Page 6"},
                    {src:"images/book4/3.jpg", thumb:"images/book4/2.jpg", title:"Page 7"},
                    {src:"images/book4/4.jpg", thumb:"images/book4/1.jpg", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,
			};
			var book5 = {
                pages:[
                    {src:"images/book5/1.jpg", thumb:"images/book5/4.jpg", title:"Cover"},
                    {src:"images/book5/2.jpg", thumb:"images/book5/3.jpg", title:"Page two"},
                    {src:"images/book5/3.jpg", thumb:"images/book5/2.jpg", title:"Page three"},
                    {src:"images/book5/4.jpg", thumb:"images/book5/1.jpg", title:"Page 4"},
                    {src:"images/book5/1.jpg", thumb:"images/book5/4.jpg", title:"Page 5"},
                    {src:"images/book5/2.jpg", thumb:"images/book5/3.jpg", title:"Page 6"},
                    {src:"images/book5/3.jpg", thumb:"images/book5/2.jpg", title:"Page 7"},
                    {src:"images/book5/4.jpg", thumb:"images/book5/1.jpg", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,
			};
			var book6= {
                pages:[
                    {src:"images/book5/1.png", thumb:"images/book5/4.png", title:"Cover"},
                    {src:"images/book5/2.png", thumb:"images/book5/3.png", title:"Page two"},
                    {src:"images/book5/3.png", thumb:"images/book5/2.png", title:"Page three"},
                    {src:"images/book5/4.png", thumb:"images/book5/1.png", title:"Page 4"},
                    {src:"images/book5/1.png", thumb:"images/book5/4.png", title:"Page 5"},
                    {src:"images/book5/2.png", thumb:"images/book5/3.png", title:"Page 6"},
                    {src:"images/book5/3.png", thumb:"images/book5/2.png", title:"Page 7"},
                    {src:"images/book5/4.png", thumb:"images/book5/1.png", title:"End"}
                ],
				lightBox:true, 
				webgl:true,
				skin:"light",
				zoom:.9,				
			};
			
			$('.cover1').flipBook(book1);
			$('.cover2').flipBook(book2);
			$('.cover3').flipBook(book3);
			$('.cover4').flipBook(book4);
			$('.cover5').flipBook(book5);
			$('.cover6').flipBook(book5);
        });	
    </script>	   
	<script src="js-slide/modernizr.custom.js"></script>
	<script src="js-slide/imagesloaded.pkgd.min.js"></script>
	<script src="js-slide/masonry.pkgd.min.js"></script>
	<!--<script src="js-slide/classie.js"></script>-->
	<script src="js-slide/cbpGridGallery.js"></script>
	<script>
			new CBPGridGallery(document.getElementById( 'grid-gallery' ) );
	</script>
	<script type='text/javascript' src='js/jquery.fitvids.js'></script>
	<script type='text/javascript' src='js/jquery.bxslider.min.js'></script>
	<script type='text/javascript' src='js/js.js'></script>
  </body>
</html>
