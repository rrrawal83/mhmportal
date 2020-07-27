$(document).ready(function(){
  $("#add").click(function(){
    var div_id = parseInt($(".add_products").last().attr("id").replace(/product_row_/, ''));
    $(".products_table").append($("#product_row_1").clone());
    $(".add_products").last().attr("id","product_row_"+(div_id + 1));
    $("#product_row_"+(div_id + 1)).find("#product_gst").val("");
    $("#product_row_"+(div_id + 1)).find("#product_hsn").val("");
    $("#product_row_"+(div_id + 1)).find("#product_price").val("");
    $("#product_row_"+(div_id + 1)).find("#product_sub_total").val("");
    $("#product_row_"+(div_id + 1)).find("#product_main_total").val("");
    $("#product_row_"+(div_id + 1)).find("#product_quantity").val("1");
  });
  $("#remove").click(function(){
    var div_id = $(".add_products").last().attr("id");
    $(".add_products").last().remove();
  });

  $(document).on("change",".product_select",function(){
    var product_id = $(this).val();
    var div_id = $(this).closest(".add_products").attr("id");
    var product_quantity = $(this).closest(".add_products").find("#product_quantity").val();
    $.ajax({
      dataType:"json",
      type:"post",
      url:"http://localhost/assignment_nextasy/get_product_details",
      data:{product_id:product_id},
      success:function(data){
        $.each(data, function(index,item) {
					$("#"+div_id).find("#product_gst").val(item.gst);
					$("#"+div_id).find("#product_hsn").val(item.hsn_code);
					$("#"+div_id).find("#product_price").val(item.price);
					$("#"+div_id).find("#product_sub_total").val(item.price * product_quantity);
          var sub_total = item.price * product_quantity;
          var tax_amount = sub_total * item.gst / 100;
					$("#"+div_id).find("#product_main_total").val(sub_total + tax_amount);
          getGrandTotal();
				});
      }
    });
  });

  $(document).on("change","#product_quantity",function(){
    var quantity = parseInt($(this).val());
    if(isNaN(quantity) || quantity <= 0){
      $(this).val("1");
    }
    var price = $(this).closest(".add_products").find("#product_price").val();
    var gst = $(this).closest(".add_products").find("#product_gst").val();
    var actual_quantity = parseInt($(this).val());
    var sub_total = price * actual_quantity;
    var tax_amount = sub_total * gst / 100;
    $(this).closest(".add_products").find("#product_sub_total").val(sub_total);
    $(this).closest(".add_products").find("#product_main_total").val(sub_total + tax_amount);
    getGrandTotal();
  });

  function getGrandTotal(){
    var grand_total = 0;
    $(".product_final_total").each(function(){
      grand_total += parseInt($(this).val()); //<==== a catch  in here !! read below
    });
    $("#grand_total").val(grand_total);
  }
});
