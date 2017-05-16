$(document).ready(function(){

    $("#search-box").keyup(function(){
        var itemName = $("#search-box").val();

            if(itemName.length > 1){    
                $.ajax({
                    type: "GET",
                    url: "https://api.nutritionix.com/v1_1/search/"+itemName+"?fields=item_name%2Citem_id%2Cnf_serving_size_qty%2Cnf_serving_size_unit%2Cbrand_name%2Cnf_calories%2Cnf_total_fat&appId=0e3feb06&appKey=048f0574236e894edb237e0ef193d62d",
                     dataType: "json",
                    beforeSend: function(){
                        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data){
                        var foodData = data.hits;
                        var item;
                        $('.foods-dropdown-menu-main ul').html('');
                        $.each(foodData, function(key, value){
                              var itemData = value.fields;
                              item = '<li class="singal_food" data-item_id="'+itemData.item_id+'"><div class="ui-select-choices-row ng-scope active" id="ui-select-choices-row-0-0">'+
                                        '<a href="javascript:void(0);" class="ui-select-choices-row-inner" uis-transclude-append="" >'+
                                            '<div class="list-group-item ng-scope">'+
                                              '<span class="badge badge-calorie ng-binding">'+itemData.nf_calories+'<span class="block text-center grey note">cal</span></span>'+
                                              '<div class="food-image-wrap">'+
                                                '<img class="food-image" ng-src="https://d2xdmhkmkbyw75.cloudfront.net/304_thumb.jpg" alt="Tea" src="https://d2xdmhkmkbyw75.cloudfront.net/304_thumb.jpg" style="max-height: 35px;max-width: 35px;">'+
                                              '</div>'+
                                              '<span class="te ng-binding">'+itemData.brand_name+' '+itemData.item_name+'</span>'+
                                              '<span class="item-serving ng-binding" style="">'+itemData.nf_serving_size_qty+' '+itemData.nf_serving_size_unit+'</span>'+
                                            '</div>'+
                                        '</a>'+
                                    '</div>'+
                                    '</li>';
                              $('.foods-dropdown-menu-main ul').append(item);
                        });
                             
                    }
                });
            }         
    });
    fatch_food_data();

     $("#singal-search-box").keyup(function(){
         $('.singal-foods-dropdown-menu-main ul').html('');
        var itemName_pop = $("#singal-search-box").val();
            if(itemName_pop.length > 1){
                $.ajax({
                    type: "GET",
                    url: "https://api.nutritionix.com/v1_1/search/"+itemName_pop+"?fields=item_name%2Citem_id%2Cnf_serving_size_qty%2Cnf_serving_size_unit%2Cbrand_name%2Cnf_calories%2Cnf_total_fat&appId=0e3feb06&appKey=048f0574236e894edb237e0ef193d62d",
                     dataType: "json",
                    beforeSend: function(){
                        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data){
                        var foodData_pop = data.hits;
                        var item_pop;
                        $('.foods-dropdown-menu-main ul').html('');
                        $.each(foodData_pop, function(key, value){
                              var itemData_pop = value.fields;
                              item_pop = '<li class="singal_food" data-item_id="'+itemData_pop.item_id+'"><div class="ui-select-choices-row ng-scope active" id="ui-select-choices-row-0-0">'+
                                        '<a href="javascript:void(0);" class="ui-select-choices-row-inner" uis-transclude-append="" >'+
                                            '<div class="list-group-item ng-scope">'+
                                              '<span class="badge badge-calorie ng-binding">'+itemData_pop.nf_calories+'<span class="block text-center grey note">cal</span></span>'+
                                              '<div class="food-image-wrap">'+
                                                '<img class="food-image" ng-src="https://d2xdmhkmkbyw75.cloudfront.net/304_thumb.jpg" alt="Tea" src="https://d2xdmhkmkbyw75.cloudfront.net/304_thumb.jpg" style="max-height: 35px;max-width: 35px;">'+
                                              '</div>'+
                                              '<span class="te ng-binding">'+itemData_pop.brand_name+' '+itemData_pop.item_name+'</span>'+
                                              '<span class="item-serving ng-binding" style="">'+itemData_pop.nf_serving_size_qty+' '+itemData_pop.nf_serving_size_unit+'</span>'+
                                            '</div>'+
                                        '</a>'+
                                    '</div>'+
                                    '</li>';
                            $('.singal-foods-dropdown-menu-main ul').append(item_pop);
                        });
                             
                    }
                });
            }       
    });
 
    var count_start = 1;
    $(".foods-menu-add-list").on("click","li.singal_food", function(event) {
            $('.foods-dropdown-menu-main ul').html('');
            $('.singal-foods-dropdown-menu-main ul').html('');

            var item_id = $(this).data('item_id');
            $.ajax({
                    type: "GET",
                    url: "https://api.nutritionix.com/v1_1/item?id="+item_id+"&appId=0e3feb06&appKey=048f0574236e894edb237e0ef193d62d",
                    dataType: "json",
                    beforeSend: function(){
                    },
                    success: function(data){
                        // $.each(data,function(key, value){
                           var value = data;
                           var carbohydrate = value.nf_total_carbohydrate;
                           var totalFat = value.nf_total_fat;
                           var sodium   = value.nf_sodium;
                           var protein  = value.nf_protein;
                           var calories = value.nf_calories;
                           
                           var saturated = value.nf_saturated_fat;
                           var nf_dietary_fiber = value.nf_dietary_fiber;
                           var cholesterol = value.nf_cholesterol;
                           var sugars = value.nf_sugars;

                           var vitamin_a_dv = value.nf_vitamin_a_dv;
                           var nf_calcium = value.nf_calcium_dv;
                           var nf_iron_dv = value.nf_iron_dv;
                           var nf_trans_fatty_acid = value.nf_trans_fatty_acid;

                            if(carbohydrate == null){
                                carbohydrate = 0;
                            }
                            if(totalFat == null){
                                totalFat = 0;
                            }
                            if(sodium == null){
                                sodium = 0;
                            }
                            if(protein == null){
                                protein = 0;
                            }
                            if(calories == null){
                                 calories = 0;   
                            }

                            if(saturated == null){
                               saturated = 0;
                            }
                            if(nf_dietary_fiber == null){
                               nf_dietary_fiber = 0;
                            }
                            if(cholesterol == null){
                               cholesterol = 0;
                            }
                            if(sugars == null){
                               sugars = 0;
                            }
 

                            if(vitamin_a_dv == null){
                                vitamin_a_dv    = 0;
                            }
                            if(nf_calcium == null){
                                nf_calcium = 0;
                            }
                            if(nf_iron_dv == null){
                                nf_iron_dv = 0;
                            }
                            if(nf_trans_fatty_acid == null){
                                nf_trans_fatty_acid  = 0;
                            }
                                
                                var singal_item ='<div id="singal_item_'+count_start+'" class="itemProduct"><div class="col-xs-11">'+
                                        '<div class="item-calorie">'+
                                         '<div class="badge-calorie" id="calories_'+count_start+'">'+value.nf_calories+'</div>'+
                                            '<span class="block">Cal</span>'+
                                        '</div>'+
                                        '<div class="item-info"><i class="fa fa-info-circle"></i></div>'+
                                        '<div class="item-photo">IMAGE</div>'+
                                        '<div class="item-wrap">'+
                                         '<div class="item-serving-size"><input class="form-control  text-center" onkeyup="return calculate(this)" id="total_'+count_start+'" saturated="'+saturated+'" cholesterol="'+cholesterol+'" sugars="'+sugars+'" nf_dietary_fiber="'+nf_dietary_fiber+'"  loop="'+count_start+'" carbohydrate="'+carbohydrate+'" fat="'+totalFat+'" sodium="'+sodium+'"  protein="'+protein+'" cal="'+calories+'" vitamin_a_dv="'+vitamin_a_dv+'" nf_calcium="'+nf_calcium+'" nf_iron_dv="'+nf_iron_dv+'" nf_trans_fatty_acid="'+nf_trans_fatty_acid+'" value="" type="text" name="food['+count_start+'][qty_total]" placeholder="1"></div>'+
                                            // '<div class="item-serving-unit">'+
                                            //  '<select class="form-control" name="tags[]">'+
                                            //      '<option label="cup" value="object:2222">cup</option>'+
                                            //      '<option label="tsp" value="object:2223">tsp</option>'+
                                            //      '<option label="tbsp" value="object:2224">tbsp</option>'+
                                            // '</select>'+
                                            // '</div>'+
                                            '<div class="heading">&nbsp;&nbsp;&nbsp;'+value.brand_name+' '+value.item_name+'</div>'+
                                            
                                            '<input class="form-control text-center caloriesClass" id="firstCalories_'+count_start+'" value="'+calories+'" type="hidden" name="food['+count_start+'][calories]">'+
                                            '<input class="form-control text-center proteinClass" id="nf_protein_'+count_start+'" value="'+protein+'" type="hidden" name="food['+count_start+'][protein]">'+
                                            '<input class="form-control text-center carbohydrateClass" id="nf_total_carbohydrate_'+count_start+'" value="'+carbohydrate+'" type="hidden" name="food['+count_start+'][carbohydrate]">'+
                                            '<input class="form-control text-center totalFatClass" id="nf_total_fat_'+count_start+'" value="'+totalFat+'" type="hidden" name="food['+count_start+'][fat]">'+
                                            '<input class="form-control text-center sodiumClass" id="nf_sodium_'+count_start+'" value="'+sodium+'" type="hidden" name="food['+count_start+'][sodium]">'+
                                           
                                            '<input class="form-control text-center saturatedClass" id="nf_saturated_'+count_start+'" value="'+saturated+'" type="hidden" name="food['+count_start+'][saturated_fat]">'+
                                            '<input class="form-control text-center dietary_fiberClass" id="nf_dietary_fiber_'+count_start+'" value="'+nf_dietary_fiber+'" type="hidden" name="food['+count_start+'][dietary_fiber]">'+
                                            '<input class="form-control text-center cholesterolClass" id="nf_cholesterol_'+count_start+'" value="'+cholesterol+'" type="hidden" name="food['+count_start+'][cholesterol]">'+
                                            '<input class="form-control text-center sugarsClass" id="nf_sugars_'+count_start+'" value="'+sugars+'" type="hidden" name="food['+count_start+'][sugars]">'+
                                             
                                            '<input class="form-control text-center vitamin_a_Class" id="nf_vitamin_a_dv_'+count_start+'" value="'+vitamin_a_dv+'" type="hidden" name="food['+count_start+'][vitamin_a]">'+
                                            '<input class="form-control text-center nf_calcium_dvClass" id="nf_calcium_dv_'+count_start+'" value="'+nf_calcium+'" type="hidden" name="food['+count_start+'][nf_calcium_dv]">'+
                                            '<input class="form-control text-center nf_iron_dvClass" id="nf_iron_dv_'+count_start+'" value="'+nf_iron_dv+'" type="hidden" name="food['+count_start+'][nf_iron_dv]">'+
                                            '<input class="form-control text-center nf_trans_fatty_acidClass" id="nf_trans_fatty_acid_'+count_start+'" value="'+nf_trans_fatty_acid+'" type="hidden" name="food['+count_start+'][nf_trans_fatty_acid]">'+
                                           '</div>'+
                                    '</div>'+
                                    '<div class="col-xs-1 delete-item">'+
                                     '<a class="btn-delete-item delete-item" href="#" onclick="return remove_item('+count_start+');"><i class="fa fa-times"></i></a>'+
                                    '</div>'+
                                    '</div>';
 

                            $('#add_item').append(singal_item);
                            $("#modal-review-food").modal('show');
                        // });
                        $("#totalLoop").val(count_start);
                        count_start++;
                            change_total_p_c_f_s();
                    }
            });
    });
     


});


function remove_item(count_start) {
    $( "#singal_item_"+count_start).remove();
    change_total_p_c_f_s()
}

function calculate(arg){ 

    var loopNumber = arg.getAttribute('loop');
    var value = $('#total_'+loopNumber).val();
    var calories = arg.getAttribute('cal');
    var total_calories =  value * calories;
    $('#calories_'+loopNumber).html('0');
    $('#calories_'+loopNumber).html(total_calories);

    var carbohydrateData        = arg.getAttribute('carbohydrate');
    var fatData                 = arg.getAttribute('fat');
    var sodiumData              = arg.getAttribute('sodium');
    var proteinData             = arg.getAttribute('protein');
    var calData                 = arg.getAttribute('cal');

    var saturatedData           = arg.getAttribute('saturated');
    var cholesterolData         = arg.getAttribute('cholesterol');
    var sugarsData              = arg.getAttribute('sugars');
    var nf_dietary_fiberData    = arg.getAttribute('nf_dietary_fiber');

    var vitamin_a_dv            =  arg.getAttribute('vitamin_a_dv');
    var nf_calcium              =  arg.getAttribute('nf_calcium');
    var nf_iron_dv              =  arg.getAttribute('nf_iron_dv');
    var nf_trans_fatty_acid     =  arg.getAttribute('nf_trans_fatty_acid');

    var totalCarbohydrate = carbohydrateData * value;
    var totalFat = fatData * value;
    var totalSodium = sodiumData * value;
    var totalProtein = proteinData * value;
    var totalCal = calData * value;

    var toalsaturatedData        =  saturatedData        * value;
    var toalcholesterolData      =  cholesterolData      * value;
    var toalsugarsData           =  sugarsData          * value;
    var toalnf_dietary_fiberData =  nf_dietary_fiberData * value;

    var totalVitamin_a_dv        = vitamin_a_dv        * value;     
    var totalNf_calcium          = nf_calcium          * value; 
    var totalNf_iron_dv          = nf_iron_dv          * value; 
    var totalNf_trans_fatty_acid = nf_trans_fatty_acid * value; 
    

    $("#firstCalories_"+loopNumber).val(totalCal);
    $("#nf_protein_"+loopNumber).val(totalProtein);
    $("#nf_total_carbohydrate_"+loopNumber).val(totalCarbohydrate);
    $("#nf_total_fat_"+loopNumber).val(totalFat);
    $("#nf_sodium_"+loopNumber).val(totalSodium);
    
    $("#nf_saturated_"+loopNumber).val(toalsaturatedData);
    $("#nf_dietary_fiber_"+loopNumber).val(toalnf_dietary_fiberData);
    $("#nf_cholesterol_"+loopNumber).val(toalcholesterolData);
    $("#nf_sugars_"+loopNumber).val(toalsugarsData);

    $("#nf_vitamin_a_dv_"+loopNumber).val(totalVitamin_a_dv);
    $("#nf_calcium_dv_"+loopNumber).val(totalNf_calcium);
    $("#nf_iron_dv_"+loopNumber).val(totalNf_iron_dv);
    $("#nf_trans_fatty_acid_"+loopNumber).val(totalNf_trans_fatty_acid);



    change_total_p_c_f_s();
}
  

function change_total_p_c_f_s(){

        totalCalories = 0;
        $(".caloriesClass").each(function(){
            totalCalories += +$(this).val();
        });

        totalProtein = 0;
        $(".proteinClass").each(function(){
            totalProtein += +$(this).val();
        });

        totalCarbohydrate = 0;
        $(".carbohydrateClass").each(function(){
            totalCarbohydrate += +$(this).val();
        });

        totalFat = 0;
        $(".totalFatClass").each(function(){
            totalFat += +$(this).val();
        });

        totalSodium = 0;
        $(".sodiumClass").each(function(){
            totalSodium += +$(this).val();
        });

        totalsaturatedClass = 0;
        $(".saturatedClass").each(function(){
            totalsaturatedClass += +$(this).val();
        });

         totaldietary_fiberClass = 0;
        $(".dietary_fiberClass").each(function(){
            totaldietary_fiberClass += +$(this).val();
        });

         totalcholesterolClass = 0;
        $(".cholesterolClass").each(function(){
            totalcholesterolClass += +$(this).val();
        });

         totalsugarsClass = 0;
        $(".sugarsClass").each(function(){
            totalsugarsClass += +$(this).val();
        });

        totalVitamin_a_Class = 0;
        $(".vitamin_a_Class").each(function(){
            totalVitamin_a_Class += +$(this).val();
        });

        totalnf_calcium_dvClass = 0;
        $(".nf_calcium_dvClass").each(function(){
            totalnf_calcium_dvClass += +$(this).val();
        });

        totalNf_iron_dvClass = 0;
        $(".nf_iron_dvClass").each(function(){
            totalNf_iron_dvClass += +$(this).val();
        });

        totalNf_trans_fatty_acidClass = 0;
        $(".nf_trans_fatty_acidClass").each(function(){
            totalNf_trans_fatty_acidClass += +$(this).val();
        });

        totalClass = 0;
       
        $("#totalProtein").html("");
        $("#totalCarbs").html("");
        $("#totalFat").html("");
        $("#totalCalories").html("");

        $("#totalProtein").html(totalProtein+"g<span>Protein</span>");
        $("#totalCarbs").html(totalCarbohydrate+"g<span>Carbs</span>");
        $("#totalFat").html(totalFat+"g<span>Fat</span>");
        $("#totalSodium").html(totalSodium+"mg<span>Sodium</span>");
        $("#totalCalories").html(totalCalories);

        $("#totalpost_Calories").val(totalCalories);
        $("#totalpost_Protein").val(totalProtein);
        $("#totalpost_Carbs").val(totalCarbohydrate);
        $("#totalpost_Fat").val(totalFat);
        $("#totalpost_Sodium").val(totalSodium);

        $("#totalpost_saturated").val(totalsaturatedClass);
        $("#totalpost_dietary_fiber").val(totaldietary_fiberClass);
        $("#totalpost_cholesterol").val(totalcholesterolClass);
        $("#totalpost_sugars").val(totalsugarsClass);


        $("#totalpost_vitamin").val(totalVitamin_a_Class);
        $("#totalpost_calcium").val(totalnf_calcium_dvClass);
        $("#totalpost_iron").val(totalNf_iron_dvClass);
        $("#totalpost_trans_fatty_acid").val(totalNf_trans_fatty_acidClass);

}

 


$(document).ready(function() {
    // process the form
    $('form').submit(function(event) {
        $.ajax({
            type        : 'POST',
            url         : base_url+"manager-admin/users/food_log/store",
            data        : $('#myForm').serialize(),
            dataType    : 'json',
        })
        .done(function(data) {
            $(".itemProduct").remove();
            $("#modal-review-food").modal('hide');
            $('.foods-dropdown-menu-main ul').html('');
            $('#search-box').val('');
        });
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
});


function fatch_food_data(){
                $.ajax({
                    type: "post",
                    url: base_url+"manager-admin/users/food_log/fetch_food_data",
                    dataType: "json",
                    success: function(data){
                        var foodData = data;
                        var item;
                        item = '<li class="list-group-item drag-container">'+
                                '<div class="angle-right"><i class="fa fa-angle-right"></i></div>'+
                                '<span class="badge-calorie">25</span>'+
                                '<div class="item-photo"><img src="http://localhost/food/theme/admin-theme/images/coconut-img.jpg" alt=""></div>'+
                                'Coconut<span class="item-serving">5 grams</span>'+
                                '</li>';
                        $('.foods-item-type-dinner ul').append(item);
                        // });

                    },error: function(){

                    }
            });
        }


$(function() {
		var eventDates = {};
    eventDates[ new Date( '05/04/2017' )] = new Date( '12/04/2016' );
    eventDates[ new Date( '05/06/2017' )] = new Date( '12/06/2016' );
    eventDates[ new Date( '05/20/2017' )] = new Date( '12/20/2016' );
    eventDates[ new Date( '05/25/2017' )] = new Date( '12/25/2016' );

    var SeletedText = {};
    SeletedText[new Date('05/04/2017')] = 'Holiday1';
    SeletedText[new Date('05/06/2017')] = 'Holiday2';
    SeletedText[new Date('05/20/2017')] = 'Holiday3'; 
	
    $( "#datepicker" ).datepicker({
    dateFormat: 'dd/mm/yy',
      beforeShowDay: function(date) {
          var highlight = eventDates[date];
          var HighlighText = SeletedText[date];
          if (highlight) {
                return [true, "Highlighted", HighlighText];
            }
            else {
                return [true, '', ''];
            }
       }
    });
    $("#datepicker").on("change",function(){
        var selected = $(this).val();
        alert(selected);
    });
    
    $(".").tooltip();
       $( "#datepicker_2" ).datepicker();
});

$("#generate_report_btn").click(function(){
     html2canvas($("#capture_image"), {
        onrendered: function(canvas) {
           var imgsrc = canvas.toDataURL("image/png");
           console.log(imgsrc);
            var a = $("<a>")
                .attr("href", imgsrc)
                .attr("download", "img.png")
                .appendTo("body");
            a[0].click();
            a.remove();
        }
     });
  });  
