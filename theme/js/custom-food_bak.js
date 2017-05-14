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


    //  $("#singal-search-box").keyup(function(){
    //     var itemName = $("#search-box").val();

    //         if(itemName.length > 1){
    //             $.ajax({
    //                 type: "GET",
    //                 url: "https://api.nutritionix.com/v1_1/search/"+itemName+"?fields=item_name%2Citem_id%2Cbrand_name%2Cnf_calories%2Cnf_total_fat&appId=0e3feb06&appKey=048f0574236e894edb237e0ef193d62d",
    //                  dataType: "json",
    //                 beforeSend: function(){
    //                     $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    //                 },
    //                 success: function(data){
    //                     var foodData = data.hits;
    //                     var item;
    //                     $('.foods-dropdown-menu-main ul').html('');
    //                     $.each(foodData, function(key, value){
    //                           var itemData = value.fields;
    //                           item = '<li class="singal_food" data-item_id="'+itemData.item_id+'"><div class="ui-select-choices-row ng-scope active" id="ui-select-choices-row-0-0">'+
    //                                     '<a href="javascript:void(0);" class="ui-select-choices-row-inner" uis-transclude-append="" >'+
    //                                         '<div class="list-group-item ng-scope">'+
    //                                           '<span class="badge badge-calorie ng-binding">'+itemData.nf_calories+'<span class="block text-center grey note">cal</span></span>'+
    //                                           '<div class="food-image-wrap">'+
    //                                             '<img class="food-image" ng-src="https://d2xdmhkmkbyw75.cloudfront.net/304_thumb.jpg" alt="Tea" src="https://d2xdmhkmkbyw75.cloudfront.net/304_thumb.jpg" style="max-height: 35px;max-width: 35px;">'+
    //                                           '</div>'+
    //                                           '<span class="te ng-binding">'+itemData.item_name+'</span>'+
    //                                           '<span class="item-serving ng-binding" style="">'+itemData.nf_total_fat+' fl oz</span>'+
    //                                         '</div>'+
    //                                     '</a>'+
    //                                 '</div>'+
    //                                 '</li>';
    //                           $('.singal-foods-dropdown-menu ul').append(item);
    //                     });
                             
    //                 }
    //             });
    //         }       
    // });



            
    var count_start = 1;
    $("#foods-menu").on("click","li.singal_food", function(event) {    
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
                            var singal_item ='<div id="singal_item_'+count_start+'"><div class="col-xs-11">'+
                                        '<div class="item-calorie">'+
                                         '<div class="badge-calorie" id="calories_'+count_start+'">'+value.nf_calories+'</div>'+
                                            '<span class="block">Cal</span>'+
                                        '</div>'+
                                        '<div class="item-info"><i class="fa fa-info-circle"></i></div>'+
                                        '<div class="item-photo"><img src="http://localhost/food/theme/admin-theme/images/coconut-img.jpg" alt=""></div>'+
                                        '<div class="item-wrap">'+
                                         '<div class="item-serving-size"><input class="form-control  text-center" onkeyup="return calculate('+count_start+')" id="total_'+count_start+'" value="1" type="text" name="total[]" placeholder="1"></div>'+
                                            // '<div class="item-serving-unit">'+
                                            //  '<select class="form-control" name="tags[]">'+
                                            //      '<option label="cup" value="object:2222">cup</option>'+
                                            //      '<option label="tsp" value="object:2223">tsp</option>'+
                                            //      '<option label="tbsp" value="object:2224">tbsp</option>'+
                                            // '</select>'+
                                            // '</div>'+
                                            '<div class="heading">&nbsp;&nbsp;&nbsp;'+value.brand_name+' '+value.item_name+'</div>'+
                                            
                                            '<input class="form-control text-center" id="firstCalories_'+count_start+'" value="'+value.nf_calories+'" type="hidden">'+
                                            '<input class="form-control text-center" id="nf_protein_'+count_start+'" value="'+value.nf_protein+'" type="hidden" name="nf_protein[]">'+
                                            '<input class="form-control text-center" id="nf_total_carbohydrate'+count_start+'" value="'+value.nf_total_carbohydrate+'" type="hidden" name="nf_total_carbohydrate[]">'+
                                            '<input class="form-control text-center" id="nf_total_fat'+count_start+'" value="'+value.nf_total_fat+'" type="hidden" name="nf_total_fat[]">'+
                                            '<input class="form-control text-center" id="nf_sodium'+count_start+'" value="'+value.nf_sodium+'" type="hidden" name="nf_sodium[]">'+
                                        
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-xs-1 delete-item">'+
                                     '<a class="btn-delete-item delete-item" href="#" onclick="return remove_item('+count_start+');"><i class="fa fa-times"></i></a>'+
                                    '</div>'+
                                    '</div>';

                            $('#add_item').append(singal_item);
                            $("#modal-review-food").modal('show');
                        // });
                        count_start++;
                    }
            });
    });

});


function remove_item(count_start) {
    $( "#singal_item_"+count_start).remove();
}

function calculate(count_start){

   var totalItem = $('#total_'+count_start).val();
   var calories = $('#calories_'+count_start).text();
   
   if(calories == 0){
     calories = $("#firstCalories_"+count_start).val();
   }
   
   var total_calories =  calories * totalItem;
   $('#calories_'+count_start).html('0');
   $('#calories_'+count_start).html(total_calories);

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

(function ($, window, document, undefined) {
  'use strict';

  var Pizza = {
    version : '0.0.1',

    settings : {
      donut: false,
      donut_inner_ratio: 0.4,   // between 0 and 1
      percent_offset: -50,       // relative to radius
      stroke_color: '#fff',
      stroke_width: 0,
      show_percent: true,       // show or hide the percentage on the chart.
      animation_speed: 500,
      animation_type: 'backin' // options: backin, backout, bounce, easein, 
                                //          easeinout, easeout, linear
    },

    init : function (scope, options) {
      var self = this;
      this.scope = scope || document.body;

      var pies = $('[data-pie-id]', this.scope);

      $.extend(true, this.settings, options)

      if (pies.length > 0) {
        pies.each(function () {
          return self.build($(this), options);
        });
      } else {
        this.build($(this.scope), options);
      }

      this.events();
    },

    events : function () {
      var self = this;

      $(window).off('.pizza').on('resize.pizza', self.throttle(function () {
        self.init();
      }, 100));

      $(this.scope).off('.pizza').on('mouseenter.pizaa mouseleave.pizza touchstart.pizza', '[data-pie-id] li', function (e) {
        var parent = $(this).parent(),
            path = Snap($('#' + parent.data('pie-id') + ' path[data-id="s' + $(this).index() + '"]')[0]),
            text = Snap($(path.node).parent()
              .find('text[data-id="' + path.node.getAttribute('data-id') + '"]')[0]),
            settings = $(this).parent().data('settings');

        if (/start/i.test(e.type)) {
          $(path.node).siblings('path').each(function () {
            if (this.nodeName) {
              path.animate({
                transform: 's1 1 ' + path.node.getAttribute('data-cx') + ' ' + path.node.getAttribute('data-cy')
              }, settings.animation_speed, mina[settings.animation_type]);
              Snap($(this).next()[0]).animate({
                opacity: 0
              }, settings.animation_speed);
            }
          });
        }

        if (/enter|start/i.test(e.type)) {
          path.animate({
            transform: 's1.05 1.05 ' + path.node.getAttribute('data-cx') + ' ' + path.node.getAttribute('data-cy')
          }, settings.animation_speed, mina[settings.animation_type]);

          if (settings.show_percent) {
            text.animate({
              opacity: 1
            }, settings.animation_speed);
          }
        } else {
          path.animate({
            transform: 's1 1 ' + path.node.getAttribute('data-cx') + ' ' + path.node.getAttribute('data-cy')
          }, settings.animation_speed, mina[settings.animation_type]);
          text.animate({
            opacity: 0
          }, settings.animation_speed);
        }
      });
    },

    build : function(legends, options) {
      var self = this;

      var legend = legends, graph;

      legend.data('settings', $.extend({}, self.settings, options, legend.data('options')));
      self.data(legend, options || {});

      return self.update_DOM(self.pie(legend));
    },

    data : function (legend, options) {
      var data = [],
          count = 0;

      $('li', legend).each(function () {
        var segment = $(this);

        if (options.data) {
          data.push({
            value: options.data[segment.index()], 
            color: segment.css('color'),
            segment: segment
          });
        } else {
          data.push({
            value: segment.data('value'),
            color: segment.css('color'),
            segment: segment
          });
        }
      });

      return legend.data('graph-data', data);
    },

    update_DOM : function (parts) {
      var legend = parts[0],
          graph = parts[1];

      return $(this.identifier(legend)).html(graph);
    },

    pie : function (legend) {
      // pie chart concept from JavaScript the 
      // Definitive Guide 6th edition by David Flanagan
      var settings = legend.data('settings'),
          svg = this.svg(legend, settings),
          data = legend.data('graph-data'),
          total = 0,
          angles = [],
          start_angle = 0,
          base = $(this.identifier(legend)).width() - 4;

      for (var i = 0; i < data.length; i++) {
        total += data[i].value;
      }

      for (var i = 0; i < data.length; i++) {
        angles[i] = data[i].value / total * Math.PI * 2;
      }

      for (var i = 0; i < data.length; i++) {
        var end_angle = start_angle + angles[i];
        var cx = (base / 2),
            cy = (base / 2),
            r = ((base / 2) * 0.85);

        if (!settings.donut) {
          // Compute the two points where our wedge intersects the circle
          // These formulas are chosen so that an angle of 0 is at 12 o'clock
          // and positive angles increase clockwise
          var x1 = cx + r * Math.sin(start_angle);
          var y1 = cy - r * Math.cos(start_angle);
          var x2 = cx + r * Math.sin(end_angle);
          var y2 = cy - r * Math.cos(end_angle);

          // This is a flag for angles larger than than a half circle
          // It is required by the SVG arc drawing component
          var big = 0;
          if (end_angle - start_angle > Math.PI) big = 1;

          // This string holds the path details
          var d = "M" + cx + "," + cy +  // Start at circle center
              " L" + x1 + "," + y1 +     // Draw line to (x1,y1)
              " A" + r + "," + r +       // Draw an arc of radius r
              " 0 " + big + " 1 " +      // Arc details...
              x2 + "," + y2 +            // Arc goes to to (x2,y2)
              " Z";                      // Close path back to (cx,cy)
        }

        var existing_path = $('path[data-id="s' + i + '"]', svg.node);

        if (existing_path.length > 0) {
          var path = Snap(existing_path[0]);
        } else {
          var path = svg.path();
        }

        var percent = (data[i].value / total) * 100.0;

        // thanks to Raphael.js
        var existing_text = $('text[data-id="s' + i + '"]', svg.node);

        if (existing_text.length > 0) {
          var text = Snap(existing_text[0]);
          text.attr({
            x: cx + (r + settings.percent_offset) * Math.sin(start_angle + (angles[i] / 2)),
            y: cy - (r + settings.percent_offset) * Math.cos(start_angle + (angles[i] / 2))
          });
        } else {
          var text = path.paper.text(cx + (r + settings.percent_offset) * Math.sin(start_angle + (angles[i] / 2)),
               cy - (r + settings.percent_offset) * Math.cos(start_angle + (angles[i] / 2)), Math.ceil(percent) + '%');
        }

        var left_offset = text.getBBox().width / 2;

        text.attr({
          x: text.attr('x') - left_offset,
          opacity: 0,
            fill: "#fff"
        });

        text.node.setAttribute('data-id', 's' + i);
        path.node.setAttribute('data-cx', cx);
        path.node.setAttribute('data-cy', cy);

        if (settings.donut) {
          this.annular_sector(path.node, {
            centerX:cx, centerY:cy,
            startDegrees:start_angle, endDegrees:end_angle,
            innerRadius: (r * settings.donut_inner_ratio), outerRadius:r
          });
        } else {
          path.attr({d:d});
        }

        path.attr({
          fill: data[i].color,
          stroke: settings.stroke_color,
          strokeWidth: settings.stroke_width
        });

        path.node.setAttribute('data-id', 's' + i);

        this.animate(path, cx, cy, settings);

        // The next wedge begins where this one ends
        start_angle = end_angle;
      }

      return [legend, svg.node];
    },

    animate : function (el, cx, cy, settings) {
      var self = this;

      el.hover(function (e) {
        var path = Snap(e.target),
            text = Snap($(path.node).parent()
              .find('text[data-id="' + path.node.getAttribute('data-id') + '"]')[0]);

        path.animate({
          transform: 's1.05 1.05 ' + cx + ' ' + cy
        }, settings.animation_speed, mina[settings.animation_type]);

        text.touchend(function () {
          path.animate({
            transform: 's1.05 1.05 ' + cx + ' ' + cy
          }, settings.animation_speed, mina[settings.animation_type]);
        });

        if (settings.show_percent) {
          text.animate({
            opacity: 1
          }, settings.animation_speed);
          text.touchend(function () {
            text.animate({
              opacity: 1
            }, settings.animation_speed);
          });
        }
      }, function (e) {
        var path = Snap(e.target),
            text = Snap($(path.node).parent()
              .find('text[data-id="' + path.node.getAttribute('data-id') + '"]')[0]);

        path.animate({
          transform: 's1 1 ' + cx + ' ' + cy
        }, settings.animation_speed, mina[settings.animation_type]);

        text.animate({
          opacity: 0
        }, settings.animation_speed);
      });
    },

    svg : function (legend, settings) {
      var container = $(this.identifier(legend)),
          svg = $('svg', container),
          width = container.width(),
          height = width;

      if (svg.length > 0) {
        svg = Snap(svg[0]);
      } else {
        svg = Snap(width, height);
      }

      svg.node.setAttribute('width', width + settings.percent_offset);
      svg.node.setAttribute('height', height + settings.percent_offset);
      svg.node.setAttribute('viewBox', '-' + settings.percent_offset + ' -' + settings.percent_offset + ' ' + 
        (width + (settings.percent_offset * 1.5)) + ' ' + 
        (height + (settings.percent_offset * 1.5)));

      return svg;
    },

    // http://stackoverflow.com/questions/11479185/svg-donut-slice-as-path-element-annular-sector
    annular_sector : function (path, options) {
      var opts = optionsWithDefaults(options);

      var p = [ // points
        [opts.cx + opts.r2*Math.sin(opts.startRadians),
         opts.cy - opts.r2*Math.cos(opts.startRadians)],
        [opts.cx + opts.r2*Math.sin(opts.closeRadians),
         opts.cy - opts.r2*Math.cos(opts.closeRadians)],
        [opts.cx + opts.r1*Math.sin(opts.closeRadians),
         opts.cy - opts.r1*Math.cos(opts.closeRadians)],
        [opts.cx + opts.r1*Math.sin(opts.startRadians),
         opts.cy - opts.r1*Math.cos(opts.startRadians)],
      ];

      var angleDiff = opts.closeRadians - opts.startRadians;
      var largeArc = (angleDiff % (Math.PI*2)) > Math.PI ? 1 : 0;
      var cmds = [];
      cmds.push("M"+p[0].join());                                // Move to P0
      cmds.push("A"+[opts.r2,opts.r2,0,largeArc,1,p[1]].join()); // Arc to  P1
      cmds.push("L"+p[2].join());                                // Line to P2
      cmds.push("A"+[opts.r1,opts.r1,0,largeArc,0,p[3]].join()); // Arc to  P3
      cmds.push("z");                                // Close path (Line to P0)
      path.setAttribute('d',cmds.join(' '));

      function optionsWithDefaults(o){
        // Create a new object so that we don't mutate the original
        var o2 = {
          cx           : o.centerX || 0,
          cy           : o.centerY || 0,
          startRadians : (o.startDegrees || 0),
          closeRadians : (o.endDegrees   || 0),
        };

        var t = o.thickness!==undefined ? o.thickness : 100;
        if (o.innerRadius!==undefined)      o2.r1 = o.innerRadius;
        else if (o.outerRadius!==undefined) o2.r1 = o.outerRadius - t;
        else                                o2.r1 = 200           - t;
        if (o.outerRadius!==undefined)      o2.r2 = o.outerRadius;
        else                                o2.r2 = o2.r1         + t;

        if (o2.r1<0) o2.r1 = 0;
        if (o2.r2<0) o2.r2 = 0;

        return o2;
      }
    },

    identifier : function (legend) {
      return '#' + legend.data('pie-id');
    },

    throttle : function(fun, delay) {
      var timer = null;
      return function () {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
          fun.apply(context, args);
        }, delay);
      };
    }
  };

  window.Pizza = Pizza;

}($, this, this.document));

$(window).load(function() {
      Pizza.init();
})

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
