
$(document).ready(function(){
$('#modal_default').on('show.bs.modal',function(e){
   var modal = $(this);
   var table = modal.find('.modal-body').find('table').find('tbody')
   var data =  $(e.relatedTarget)
   var uid = data.data('uid')
   var status = data.data('status')
   var type = data.data('type')
 var year = $.cookie('year')
  
        var tracking = new serverData('tracking',[  
                                           {
                                            name:"type",
                                            value:type
                                           },
                                           {
                                            name:"year",
                                            value:year
                                           },
                                           {
                                            name:"uid",
                                            value:uid
                                           },
                                           {
                                            name:"status",
                                            value:status
                                           },
                                           {
                                            name:"unit",
                                            value:unit
                                           }
                                         ]
                                                 );
                                                 

tracking.done(function(xhr){
   
            
   table.empty()
   

   size = xhr.length;
   totalpage = size/10;
       totalpage = (totalpage % 1 !=0)? parseInt(totalpage) +1:totalpage;
       
  $('.pagination_c').twbsPagination('destroy');
         $('.pagination_c').twbsPagination({
            totalPages: totalpage,
            visiblePages: 3,
            prev: 'Prev',
            first: null,
            last: null,
            onPageClick: function (event, page) {
              var start ;
              var end ;
              
                start = (page*10) - 10;
                
                
                end = (page*10) ;
            
            end = end>size?size:end;
                
            
              
                  table.empty()
               for(start;start<end;start++){
                   
                  table.append("<tr class='click' data-href='https://cats.chedro1.com/home/details/"+xhr[start].comusers_tracking_number +"'>\n\
<td>"+(start+1)+"</td>\n\
<td style='min-width:120px'><a href='#' >"+xhr[start].comusers_tracking_number +"</a></td>\n\
 <td>"+xhr[start].com_subject+"</td>\n\
 <td style='min-width:120px'>"+xhr[start].date+"</td>\n\
       <td class='text-center'>"+xhr[start].status+"\n\
								</td>\n\
</tr>")
       
  ;
               }
            }
        });
   
   
    
})
})




$(document).on("click","tr.click",function(){
    var lnk = $(this).data("href");
window.open(lnk, '_blank');
})
})




