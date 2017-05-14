 /*jslint browser: true*/
 /*global $, jQuery, alert*/

 $(document).ready(function () {
     "use strict";
     var body = $("body");
     $(function () {
         $(".preloader").fadeOut();
     });
       /* ===== Theme Settings ===== */

     $(".open-close").on("click", function () {
         body.toggleClass("show-sidebar").toggleClass("hide-sidebar");
         $(".sidebar-head .open-close i").toggleClass("ti-menu");
     });
     /* ===========================================================
         Loads the correct sidebar on window load.
         collapses the sidebar on window resize.
         Sets the min-height of #page-wrapper to window size.
     =========================================================== */

     $(function () {
         var set = function () {
                 var topOffset = 60,
                     width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width,
                     height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
                 if (width < 768) {
                     $('div.navbar-collapse').addClass('collapse');
                     topOffset = 100; /* 2-row-menu */
                 } else {
                     $('div.navbar-collapse').removeClass('collapse');
                 }

                 /* ===== This is for resizing window ===== */

                 if (width < 1170) {
                     body.addClass('content-wrapper');
                     $(".sidebar-nav, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
                 } else {
                     body.removeClass('content-wrapper');
                 }

                 height = height - topOffset;
                 if (height < 1) {
                     height = 1;
                 }
                 if (height > topOffset) {
                     $("#page-wrapper").css("min-height", (height) + "px");
                 }
             },
             url = window.location,
             element = $('ul.nav a').filter(function () {
                 return this.href === url || url.href.indexOf(this.href) === 0;
             }).addClass('active').parent().parent().addClass('in').parent();
         if (element.is('li')) {
             element.addClass('active');
         }
         $(window).ready(set);
         $(window).bind("resize", set);
     });


     /* ===== Task Initialization ===== */

     $(".list-task li label").on("click", function () {
         $(this).toggleClass("task-done");
     });
     $(".settings_box a").on("click", function () {
         $("ul.theme_color").toggleClass("theme_block");
     });

     /* ===== Collepsible Toggle ===== */

     $(".collapseble").on("click", function () {
         $(".collapseblebox").fadeToggle(350);
     });

     /* ===== Sidebar ===== */

     $('.slimscrollright').slimScroll({
         height: '100%',
         position: 'right',
         size: "5px",
         color: '#dcdcdc'
     });
     $('.slimscrollsidebar').slimScroll({
         height: '100%',
         position: 'right',
         size: "6px",
         color: 'rgba(0,0,0,0.3)'
     });
     /* ===== Resize all elements ===== */
     body.trigger("resize");
     /* ===== Visited ul li ===== */
     $('.visited li a').on("click", function (e) {
         $('.visited li').removeClass('active');
         var $parent = $(this).parent();
         if (!$parent.hasClass('active')) {
             $parent.addClass('active');
         }
         e.preventDefault();
     });
     /* ===== Login and Recover Password ===== */
     $('#to-recover').on("click", function () {
         $("#loginform").slideUp();
         $("#recoverform").fadeIn();
     });
     /* ================================================================= 
         Update 1.5
         this is for close icon when navigation open in mobile view
     ================================================================= */
     $(".navbar-toggle").on("click", function () {
         $(".navbar-toggle i").toggleClass("ti-menu").addClass("ti-close");
     });
 });

$(document).ready(function(){
    $("#update_profile_form").validate({
        onblur:false,
        rules: {
            first_name:"required",
            last_name:"required",
            email:{
                required : true,
                email : true
            },
        }
    });
    $("#update_password_form").validate({
        onblur:false,
        rules: {
            current_password:"required",
            new_password:"required",
            cofirm_new_password:{
                required : true,
                equalTo : "#new_password"
            },
        }
    });
    $("#user_add_form").validate({
        onblur:false,
        rules: {
            first_name:"required",
            last_name:"required",
            email:{
                required : true,
                email : true
            },
            password:"required"
        }
    });
    $("#analysts_update_profile_form").validate({
        onblur:false,
        rules: {
            first_name:"required",
            last_name:"required",
            email:{
                required : true,
                email : true
            },
            whatsapp_no:"required",
            gender:"required",
            age:"required",
            height:"required",
            actual_weight:"required",
            how_active:"required",
            no_ex_inweek:"required",
            goals:"required",
            vegiterian:"required",
            lactose:"required",
            gluten:"required",
            alcohol:"required",
            diabetic:"required",
            heart_problem:"required",
            cholesterol_problem:"required",
            high_blood_pressure:"required",
        }
    });
});

$('.delete_user').click(function(event) {
    event.preventDefault();
    var retVal = confirm("Do you want to continue ?");
    if( retVal == true ){
        window.location = $(this).attr('href');
    }
});