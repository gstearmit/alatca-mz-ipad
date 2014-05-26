localStorage['serviceURL'] =  "http://service2.topprinter.org/magazinepublish-rest"; 
var serviceURL = localStorage['serviceURL'];
var img = "http://service2.topprinter.org/images/";
//$(document).ajaxError(function(event, request, settings) {
	//alert("Not connected internet. Try again..");
//});
		$.ajax({
	        url : serviceURL,
	        dataType : 'json',
			async:false,
	        success : function(data){
	        	var array = data.data;	        	
			 $('#employeeList li').remove();
	            $.each(array, function(i , employee){
	                // alert(JSON.stringify(employee));
					$('#employeeList').append('<li><figure><a href="details.html?id=' + employee.id + '">' +
					'<img src="'+img + employee.imgkey + '" /></a>' +
					'<figcaption><h3>' + employee.title + '</h3>' +
					'<p class="line2">' + employee.descriptionkey + '</p><figcaption><figure></li>' );
	            });
			//$.each(array, function(i, employee) {
			//$('#List').append('<div class="cover cover3"> <a href="?id=' + employee.id + '">' +
				//	'<img class="img-top" src="'+ img + employee.imgkey + '" />' +
					//'<p>' + employee.title + '</p></a></div>' );
		});
	        },
	        //error : function(XMLHttpRequest,textStatus, errorThrown) {   
	            //$.mobile.loading( 'hide',{text:"Fetching blogs.."});  
	           // alert("Not connected internet. Try again..");  
	                 
	       // }
	    });