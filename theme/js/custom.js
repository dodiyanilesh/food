/*!
 * Designed By WaveInfotech.biz
 */
 /*wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
wow.init();*/

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    $("#login_form").validate({
        onblur:false,
        rules: {
            email:{
                required : true,
                email : true
            },
            password: "required",
        }
    });

    $("#signup_form").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            email:{
                required : true,
                email : true
            },
            password: "required",
            conf_password:{
                required : true,
                equalTo : "#password"
            },
        }
    });  
    
    $("#profile1_form").validate({
        rules: {
            whatsapp_no: "required",
            age: "required",
            height: "required",
            actual_weight: "required",
        }
    });
    $("#profile2_form").validate({
        rules: {
            goals: "required",
            how_active: "required",
            no_ex_inweek: "required",
            target_calories: "required",
            vegiterian: "required",
            lactose: "required",
            gluten: "required",
            alcohol: "required",
            diabetic: "required",
            heart_problem: "required",
            cholesterol_problem: "required",
            high_blood_pressure: "required",
            terms: "required"
        }
    });
});