
    function popup(type,title,msg)
    {
        Swal.fire({
           title: title,
           text: msg,
           type: type,
           confirmButtonClass: "btn btn-primary",
           buttonsStyling: !1
        });
    }
    function popup_reload(type,title,msg)
    {
        Swal.fire({
           title: title,
           text: msg,
           type: type,
           confirmButtonClass: "btn btn-primary",
           buttonsStyling: !1
        }).then((result) => {
          location.reload();
        });
    }
    function popup_redirect(type,title,msg,url)
    {
        Swal.fire({
           title: title,
           text: msg,
           type: type,
           confirmButtonClass: "btn btn-primary",
           buttonsStyling: !1
        }).then((result) => {
          location.href=url;
        });
    }

    function Toast_Slide() {
      toastr.success("I do not think that word means what you think it means.", "Bottom Full Width!", {
        showMethod:"slideDown",
        hideMethod:"slideUp",
        positionClass: "toast-bottom-right",
        timeOut:2e3,
        closeButton:!0
       
      })
    }

    var registrationForm = $('#Value_Store_Form');
    if(registrationForm.length){
       registrationForm.validate({
          
          errorPlacement: function(error, element) 
          {
            if (element.is(":radio")) 
            {
                error.appendTo(element.parents('.otp'));
                error.appendTo(element.parents('.login'));
            }
            else if(element.is(":checkbox")){
                error.appendTo(element.parents('.checkbox'));
            }
            else 
            { 
                error.insertAfter( element );
            }
            
           },
           submitHandler: function(form,event) {
             event.preventDefault();
            //  
                   $.ajax({
                    url:$('#url').val(),
                    type:'post',
                    data: new FormData(form),
                    processData:false,
                    contentType:false,
                    dataType:"json",
                    beforeSend : function(){
                       $('#submit').attr('disabled',true);
                       $('#submit').html('<i class="la la-spinner spinner"></i>&nbsp;Please Wait..');
                    },
                    success:function(data){
                        // console.log(data.message);
                        if(data.status==true && data.redirect==true && data.reload==false)
                        {
                          popup_redirect('success','Congratulation',data.message,data.url);
                        }
                        else if(data.status==true && data.redirect==false && data.reload==false)
                        {
                          popup('success','Congratulation',data.message);
                          $('#submit').attr('disabled',false);
                          $('#submit').html('Submit');
                        }
                        else if(data.status==true && data.redirect==false && data.reload==true)
                        {
                          popup_reload('success','Congratulation',data.message);
                        }
                        else if(data.status==false && data.redirect==false && data.reload==true)
                        {
                          popup_reload('warning','Warning',data.message);
                        }
                        else{
                          popup('warning','Warning',data.message);
                          $('#submit').attr('disabled',false);
                          $('#submit').html('Submit');
                        }
                    }
               });

              //  
           }
        });
    }
    

function Logout(token)
{
      Swal.fire({
        title: "Are you sure?",
        text: "Logout Your Account",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ok",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: !1
      }).then((function (t) {
         if(t.value)
         {
              $.ajax({
                url : "/Super/Logout_Request",
                type : "POST",
                data:{
                  _token : token
                },
                dataType : "json",
                beforeSend : function(){
                    $('#logout').html('Please wait...');
                    $('#logout').attr('disabled',true);
                },
                success : function (data)
                {
                    if(data.status==true)
                      {                   
                        location.href=''+data.url+'';
                      }
                }

              });
         }
      }))

}

 

  

// 	$(document).on('click','.Payment_Now',function(event){
         
//          $.ajax({
// 		        url : "../../action-page/admin_ajax_action.php",
// 		        type : "POST",
// 		        data : {
// 		          page : "Payment_Amount",
// 		          action :"Payment_Amount",
// 		          id : $(this).data('id')
// 		        },
// 		        dataType: "json",
// 		        success : function(data){
// 		           $('#amount').val(data.amount);
// 		           $('#id').val(data.id);
// 		           $('#exampleModalCenter').modal('show');

// 		        }
// 		    });

// 		 event.preventDefault();
// 		});
// 		//current_date = (new Date()).toISOString().split('T')[0];
// 		Display_All_Payment(
// 			$('#from_date').val(),
// 			$('#to_date').val(),
// 			$('#myInput1').val(),
// 			$('#status').val(),
// 			$('#top').val()
// 			);

// 		  function Display_All_Payment(from_date,to_date,search_val,status,top)
// 		  {
//              $.fn.dataTable.ext.errMode = 'none';
// 		     var table = $('#table').DataTable({
// 			      'ajax':{
// 			          'url': "<?= site_url()?>/"+$('#display_url').val()+"",
// 			          'method': 'POST',
// 			          'data' : {
// 				          'from_date' : from_date,
// 				          'to_date' : to_date,
// 				          'search_val' : search_val,
// 				          'status' : status,
// 				          'top' : top
// 			          },
// 			          'error': function(jqXHR, textStatus, errorThrown){
// 					        $('#table').DataTable().clear().draw();
// 					    }  
// 			       }, 
// 			      "bProcessing": true,
// 		        "bDestroy": true ,
// 			      'columnDefs': [{
// 					   'targets': 0,
// 					   'searchable':false,
// 					   'orderable':false,
// 					   'className': 'dt-body-center',
// 					   'render': function (data, type, full, meta){
// 					       return '<input type="checkbox" name="id[]" class="select_record" value="' + $('<div/>').text(data).html() + '">';
// 					   }
// 					}],
// 					'order': [[1, 'asc']],
// 					"responsive": true,
// 	                "autoWidth": false,
// 	                  dom: 'Bfrtip',
// 	                  buttons: [
// 	                      'copy', 'csv', 'excel', 'pdf', 'print'
// 	                  ]
// 			   });
            

//             // Handle click on "Select all" control
// 			$('#example-select-all').on('click', function(){
// 			   // Get all rows with search applied
// 			   var rows = table.rows({ 'search': 'applied' }).nodes();
// 			   // Check/uncheck checkboxes for all rows in the table
// 			   $('input[type="checkbox"]', rows).prop('checked', this.checked);
// 			});
// 			// Handle click on checkbox to set state of "Select all" control
// 			$('#example tbody').on('change', 'input[type="checkbox"]', function(){
// 			   // If checkbox is not checked
// 			   if(!this.checked){
// 			      var el = $('#example-select-all').get(0);
// 			      // If "Select all" control is checked and has 'indeterminate' property
// 			      if(el && el.checked && ('indeterminate' in el)){
// 			         // Set visual state of "Select all" control
// 			         // as 'indeterminate'
// 			         el.indeterminate = true;
// 			      }
// 			   }
// 			});

            
			
					   
// 		}

    

	// $('#delete').click(function(event){

  //       var id = $('.select_record:checked').map(function(){
  //          return $(this).val();
  //       }).get();  //.get().join(','); String  //.get(); Array
        
  //       if(id !='')
  //       {
  //          swal({
	// 		  title: "Are you sure?",
	// 		  text: "Delete Record",
	// 		  icon: "warning",
	// 		  buttons: true,
	// 		  dangerMode: true,
	// 		})
	// 		.then((willDelete) => {
	// 		  if (willDelete) {
	// 		    $.ajax({
  //                     url : "<?= site_url()?>/"+$('#delete_url').val()+"",
  //                     type : "POST",
  //                     data:{
  //                       id : id
  //                     },
  //                     dataType : "json",
  //                     beforeSend : function(){
  //                        $('#delete').html('Please wait...');
  //                        $('#delete').attr('disabled',true);
  //                     },
  //                     success : function (data)
  //                     {
  //                        if(data.success)
  //                           {                   
  //                             Display_All_Payment(
	// 							$('#from_date').val(),
	// 							$('#to_date').val(),
	// 							$('#myInput1').val(),
	// 							$('#status').val(),
	// 							$('#top').val()
	// 							);
  //                             swal("Yah",data.message, "success");
  //                             $('#delete').html('<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete');
  //                             $('#delete').attr('disabled',false);

  //                            }
  //                            else
  //                            {
  //                             swal("Wrong",data.message, "error");
  //                             $('#delete').html('<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete');
  //                             $('#delete').attr('disabled',false);
  //                            }
  //                     }

  //                   });
	// 		  } 
	// 		});
           
  //       }
  //       else
  //       {
  //          swal("Warning", "Please Select Minimun One Record", "warning");
          
  //       }

  //     event.preventDefault();
        
  //    });



//     //  TRANSFER USER

//     $('#transfer').click(function(event){

//     var id = $('.select_record:checked').map(function(){
//       return $(this).val();
//     }).get();  //.get().join(','); String  //.get(); Array

//     if(id !='' && $('#name').val() !='')
//     {
//       swal({
//     title: "Are you sure?",
//     text: "Transfer Selected Record",
//     icon: "warning",
//     buttons: true,
//     dangerMode: true,
//     })
//     .then((willDelete) => {
//     if (willDelete) {
//       $.ajax({
//                   url : "<?= site_url()?>/"+$('#transfer_url').val()+"",
//                   type : "POST",
//                   data:{
//                     id : id,
//                     name : $('#name').val()
//                   },
//                   dataType : "json",
//                   beforeSend : function(){
//                     $('#transfer').html('Please wait...');
//                     $('#transfer').attr('disabled',true);
//                   },
//                   success : function (data)
//                   {
//                     if(data.success)
//                         {                   
//                           Display_All_Payment(
//                             $('#from_date').val(),
//                             $('#to_date').val(),
//                             $('#myInput1').val(),
//                             $('#status').val(),
//                             $('#top').val()
//                             );
//                           swal("Yah",data.message, "success");
//                           $('#transfer').html('Transfer Now');
//                           $('#transfer').attr('disabled',false);

//                         }
//                         else
//                         {
//                           swal("Wrong",data.message, "error");
//                           $('#transfer').html('Transfer Now');
//                           $('#transfer').attr('disabled',false);
//                         }
//                   }

//                 });
//     } 
//     });
      
//     }
//     else
//     {
//       swal("Warning", "Please Select Minimun One Record &  Transfer User", "warning");
      
//     }

//     event.preventDefault();

//     });

 

// 	   $('#from_date').change(function(event){
// 	      let from_date = $(this).val();
//           Display_All_Payment(from_date,$('#to_date').val(),$('#myInput1').val(),$('#status').val(),$('#top').val());       
// 	    event.preventDefault();
// 	   });

// 	   $('#to_date').change(function(event){
// 	      let to_date = $(this).val();
//           Display_All_Payment($('#from_date').val(),to_date,$('#myInput1').val(),$('#status').val(),$('#top').val());       
// 	    event.preventDefault();
// 	   });

// 	   $('#top').change(function(event){
// 	      let top = $(this).val();
//           Display_All_Payment($('#from_date').val(),$('#to_date').val(),$('#myInput1').val(),$('#status').val(),top);       
// 	    event.preventDefault();
// 	   });

// 	   $('#myInput1').change(function(event){
// 	      let myInput1 = $(this).val();
//           Display_All_Payment($('#from_date').val(),$('#to_date').val(),myInput1,$('#status').val(),$('#top').val());       
// 	    event.preventDefault();
// 	   });

// 	  // Select All Checkbox
// 	   $('#select_all').change(function(event){
// 	     $('.select_record').prop("checked",$(this).prop("checked"));

// 	    event.preventDefault();
// 	   });
// 	   // $('#select_all').on('change',function(event){
// 	   //   $('.select_record').prop("checked",$(this).prop("checked"));
// 	   //   event.preventDefault();
// 	   // })

// 	   $('#excel_downlode_btn').click(function(){
// 	      var id = $('.select_record:checked').map(function(){
// 	         return $(this).val();
// 	      }).get().join(' ');
// 	      window.open('export_excel_all_payment_list.php?id='+id+'','_blank' );
	      
// 	   });

// 	   // Search All AppointMent
// 	    // $("#myInput1").on("keyup", function() {
// 	    //   // var value = $(this).val().toLowerCase();
// 	    //   // $("#data_ tr").filter(function() {
// 	    //   //   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
// 	    //   // });
// 	    //    var Search_val = $(this).val();
// 	    //    if(Search_val !="")
// 	    //    {
// 	    //      Display_All_Payment(
// 	    //      	$('#from_date').val(),
// 		// 		$('#to_date').val(),
// 		// 		$('#myInput1').val(),
// 		// 		$('#status').val()
// 		// 		);
// 	    //    }
// 	    // });

  
// 		/////////////// BTN /////////////
//    $(document).on('click','.status_update',function(event){
        
//         var btn = $(this);
//         var id = $(this).data('id');
//         var val = $(this).data('val');

//            swal({
// 			  title: "Are you sure?",
// 			  text: "Update Status",
// 			  icon: "warning",
// 			  buttons: true,
// 			  dangerMode: true,
// 			})
// 			.then((willDelete) => {
// 			  if (willDelete) {
// 			    $.ajax({
//                       url : "<?= site_url()?>/"+$('#status_url').val()+"",
//                       type : "POST",
//                       data:{
//                         id : id,
//                         val : val
//                       },
//                       dataType : "json",
//                       beforeSend : function(){
//                          btn.html('Please wait...');
//                          btn.attr('disabled',true);
//                       },
//                       success : function (data)
//                       {
//                          if(data.success)
//                             {                   
//                               Display_All_Payment(
// 								$('#from_date').val(),
// 								$('#to_date').val(),
// 								$('#myInput1').val(),
// 								$('#status').val(),
// 								$('#top').val()
// 								);
//                               swal("Yah",data.message, "success");
//                               btn.html('<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete');
//                               btn.attr('disabled',false);

//                              }
//                              else
//                              {
//                               swal("Wrong",data.message, "error");
//                               btn.html('<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete');
//                               btn.attr('disabled',false);
//                              }
//                       }

//                     });
// 			  } 
// 			});
           


//       event.preventDefault();
        
//      });



// 	 /////////////// SELECT TAG
// $(document).on('change','.select_tag',function(event){
        
//         var id = $(this).find(':selected').data('id');
//         var val = $(this).val();

//            swal({
// 			  title: "Are you sure?",
// 			  text: "Update Status",
// 			  icon: "warning",
// 			  buttons: true,
// 			  dangerMode: true,
// 			})
// 			.then((willDelete) => {
// 			  if (willDelete) {
// 			    $.ajax({
//                       url : "<?= site_url()?>/"+$('#select_url').val()+"",
//                       type : "POST",
//                       data:{
//                         id : id,
//                         val : val
//                       },
//                       dataType : "json",
//                       success : function (data)
//                       {
//                          if(data.success)
//                             {                   
//                               Display_All_Payment(
// 								$('#from_date').val(),
// 								$('#to_date').val(),
// 								$('#myInput1').val(),
// 								$('#status').val(),
// 								$('#top').val()
// 								);
//                               swal("Yah",data.message, "success");
//                              }
//                              else
//                              {
//                               swal("Wrong",data.message, "error");
//                              }
//                       }

//                     });
// 			  } 
// 			});
           


//       event.preventDefault();
        
//      });


// 	//  //////////////////////. MODAL DATA REQUEST METHOD .//////////////////////

// $(document).on('click','.Model_Data_show',function(event){
        
//         var btn = $(this);
//         var id = $(this).data('id');
// 		var url = $(this).data('url');

          
// 			    $.ajax({
//                       url : "<?= site_url()?>/"+url+"",
//                       type : "POST",
//                       data:{
//                         id : id,
//                       },
//                       dataType : "json",
//                       beforeSend : function(){
//                          btn.html('Wait...');
//                          btn.attr('disabled',true);
//                       },
//                       success : function (data)
//                       {
//                          if(data.success)
//                             {  
// 							  $('#follow_date').val(data.follow_date); 
// 							  $('#remark').val(data.remark);
// 							  $('#id').val(data.id);  
// 							  $('#access_id').val(data.access_id);                
//                               $('#modal_form').modal('show');
//                               btn.html('Update');
//                               btn.attr('disabled',false);

//                              }
//                              else
//                              {
                              
//                               btn.html('Update');
//                               btn.attr('disabled',false);
//                              }
//                       }

//                     });

//       event.preventDefault();
        
//      });

// // History SHOW
  
// $(document).on('click','.History_show',function(event){
        
//     var btn = $(this);
//     var id = $(this).data('id');
// 		var url = $(this).data('url');

          
// 			    $.ajax({
//                       url : "<?= site_url()?>/"+url+"",
//                       type : "POST",
//                       data:{
//                         id : id,
//                       },
//                       dataType : "json",
//                       beforeSend : function(){
//                          btn.html('Wait...');
//                          btn.attr('disabled',true);
//                       },
//                       success : function (data)
//                       {
//                          if(data.success)
//                             {  
//                               $('#data').html(data.message);          
//                               $('#history_form').modal('show');
//                               btn.html('History');
//                               btn.attr('disabled',false);

//                              }
//                              else
//                              {
                              
//                               btn.html('History');
//                               btn.attr('disabled',false);
//                              }
//                       }

//                     });

//       event.preventDefault();
        
//      });

// 	 $('#Admin_login_form').parsley();
//         $('#Admin_login_form').on('submit',function(event){
//           if($('#Admin_login_form').parsley().validate())
//           {
//             $.ajax({
//               url:"<?= site_url()?>/"+$('#modal_url').val()+"",
//               method:"post",
//               data : $(this).serialize(),
//               dataType:"json",
//               beforeSend:function()
//               {
//                 $('#submit').val('Please Wait..');
//                 $('#submit').attr('disabled',true);
//               },
//               success:function(data)
//               {
//               if(data.success)
//                   {
//                     swal("Thankyou",data.message, "success");
// 					$('#modal_form').modal('hide');
//                     Display_All_Payment(
// 					$('#from_date').val(),
// 					$('#to_date').val(),
// 					$('#myInput1').val(),
// 					$('#status').val()
// 					);
//                     $('#submit').val('Submit');
//                     $('#submit').attr('disabled',false);
                     
//                   }
//                    else
//                    {
//                       toastr.options = {
//                         "closeButton": true,  // true or false
//                         "debug": false,
//                         "newestOnTop": false,
//                         "progressBar": true,  // true or false
//                         "rtl": false,
//                         "positionClass": "toast-top-right",
//                         "preventDuplicates": false, // true or false
//                         "showDuration": 300,
//                         "hideDuration": 1000,
//                         "timeOut": 5000,
//                         "extendedTimeOut": 1000,
//                         "showEasing": "swing",
//                         "hideEasing": "linear",
//                         "showMethod": "fadeIn",
//                         "hideMethod": "fadeOut"
//                       }
//                      toastr["error"](data.message, "Message");
//                      $('#submit').val('Submit');
//                      $('#submit').attr('disabled',false);
//                    }
//               }
//             });
//           }
//         event.preventDefault();
//         });








