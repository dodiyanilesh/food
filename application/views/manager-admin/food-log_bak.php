<style type="text/css">
    .foods-dropdown-menu {
    background-clip: padding-box;
    background-color: hsl(0, 0%, 100%);
    border: 1px solid hsla(0, 0%, 0%, 0.15);
    border-radius: 4px;
    box-shadow: 0 6px 12px hsla(0, 0%, 0%, 0.176);
    display: block;
    font-size: 14px;
    left: 0;
    list-style: outside none none;
    margin: 2px 0 0;
    min-width: 100%;
    padding: 5px 0;
    position: absolute;
    text-align: left;
    top: 36px;
    z-index: 1000;
}

.open > .foods-dropdown-menu{
    display: block;
}

.foods-dropdown-menu > li {
    border-bottom: 1px solid hsl(0, 0%, 93%);
}


  .singal-foods-dropdown-menu{
    background-clip: padding-box;
    background-color: hsl(0, 0%, 100%);
    border: 1px solid hsla(0, 0%, 0%, 0.15);
    border-radius: 4px;
    box-shadow: 0 6px 12px hsla(0, 0%, 0%, 0.176);
    display: block;
    font-size: 14px;
    left: 0;
    list-style: outside none none;
    margin: 2px 0 0;
    min-width: 100%;
    padding: 5px 0;
    position: absolute;
    text-align: left;
    top: 36px;
    z-index: 1000;
}

.open > .singal-foods-dropdown-menu{
    display: block;
}

.singal-foods-dropdown-menu > li {
    border-bottom: 1px solid hsl(0, 0%, 93%);
}


</style>
<div id="page-wrapper" class="track">
            <div class="container">
            	<div class="row">
                	<div class="col-md-12">
                    	<div class="browse-btn">
                        	<button class="btn btn-browse" data-toggle="modal" data-target="#add-food"><i class="fa fa-plus"></i> <strong>Browse Foods</strong></button>
                            <a data-toggle="tooltip" data-placement="top" title="Your basket is empty" href="#">
                            	<sup class="notifier">2</sup>
                                <i class="fa fa-shopping-basket" data-toggle="modal" data-target="#modal-review-food"></i>
                            </a>
                        </div>
                        <h2 class="heading">veer ramlugon's Food Log</h2>
                        <div class="rightbar">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel panel-default panel-chart">
                                        <div class="panel-heading" style="padding-bottom:5px;">
                                            <div class="text-center">Track Calendar</div>
                                        </div>
                                        <div class="panel-body text-center">
                                            <div id="datepicker"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        	<table class="table table-stats">
                            	<thead>
                                	<tr><th colspan="3">Stats</th></tr>
                                </thead>
                                <tbody>
                                	<tr>
                                    	<td>Days Tracked <h3>9</h3>days</td>
                                        <td>Unique Foods <h3>54</h3>foods</td>
                                        <td>Current Streak <h3>0</h3>days</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="foodlog">
                        	
                            <div class="search-box">
                            	<div class="input-group">
                                    <input class="form-control" type="search" id="search-box" placeholder="Search foods to add">
                                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                </div>
                            <div class="foods-dropdown-menu-main">
                                <ul class="foods-dropdown-menu" id="foods-menu"></ul>
                            </div>
                            </div>

                            <div class="date-nav hidden-xs">
                            	<div class="col-sm-3">
                                	<button class="btn btn-prev"><i class="fa fa-angle-left"></i></button>
                                </div>
                                <div class="col-sm-6 text-center">
                                	<button class="btn"><strong>Today</strong><span>05/03</span></button>
                                </div>
                                <div class="col-sm-3 text-right">
                                	<button class="btn btn-next"><i class="fa fa-angle-right"></i></button>
                                </div>
                            </div>
                            <div class="log-panel">
                            	<div class="panel-heading">
                                	<div class="progress-wrap">
                                    	<div class="target-calories" data-target="#nutrition-modal" data-toggle="modal">remaining <span>2,000</span></div>
                                        <div class="burned-calories" data-target="#nutrition-modal" data-toggle="modal"><span class="ng-binding"> - 0</span> Cal burned</div>
                                        <div class="current-calories" data-target="#nutrition-modal" data-toggle="modal"><span class="ng-binding">0</span> Cal intake</div>
                                        <div class="progress">
                                        	<div class="progress-bar"><span class="sr-only"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="macronutrients">
                                    <div class="col protein" data-target="#nutrition-modal" data-toggle="modal">0g<span>Protein</span></div>
                                    <div class="col carb" data-target="#nutrition-modal" data-toggle="modal">0g<span>Carbs</span></div>
                                    <div class="col fat" data-target="#nutrition-modal" data-toggle="modal">0g<span>Fat</span></div>
                                    <div class="col sodium" data-target="#nutrition-modal" data-toggle="modal">0mg<span>Sodium</span></div>
                                </div>
                                <ul class="list-group list-group-items">
                                	<li class="list-group-item" data-target="#nutrition-modal" data-toggle="modal">
                                    	<div class="meal-info">
                                        	<span class="badge-calorie"><i class="fa fa-info-circle"></i> 0</span>
                                        </div>
                                        <span class="heading">BREAKFAST <i class="fa fa-plus-circle"></i></span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-items">
                                	<li class="list-group-item" data-target="#nutrition-modal" data-toggle="modal">
                                    	<div class="meal-info">
                                        	<span class="badge-calorie"><i class="fa fa-info-circle"></i> 0</span>
                                        </div>
                                        <span class="heading">LUNCH <i class="fa fa-plus-circle"></i></span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-items">
                                	<li class="list-group-item" data-target="#nutrition-modal" data-toggle="modal">
                                    	<div class="meal-info">
                                        	<span class="badge-calorie"><i class="fa fa-info-circle"></i> 0</span>
                                        </div>
                                        <span class="heading">DINNER <i class="fa fa-plus-circle"></i></span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-items">
                                	<li class="list-group-item" data-target="#nutrition-modal" data-toggle="modal">
                                        <span class="heading">SNACKS <i class="fa fa-plus-circle"></i></span>
                                    </li>
                                    <li class="list-group-item drag-container">
                                        <div class="angle-right"><i class="fa fa-angle-right"></i></div>
                                        <span class="badge-calorie">25</span>
                                        <div class="item-photo"><img src="<?php echo base_url('theme/admin-theme/images/coconut-img.jpg'); ?>" alt=""></div>
                                        Coconut<span class="item-serving">5 grams</span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-items">
                                	<li class="list-group-item" data-target="#nutrition-modal" data-toggle="modal">
                                        <span class="heading">Morning Snacks <i class="fa fa-plus-circle"></i></span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-items">
                                	<li class="list-group-item" data-target="#nutrition-modal" data-toggle="modal">
                                        <span class="heading">Afternoon Snacks <i class="fa fa-plus-circle"></i></span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-items">
                                	<li class="list-group-item" data-target="#nutrition-modal" data-toggle="modal">
                                        <span class="heading">Additional Snacks <i class="fa fa-plus-circle"></i></span>
                                    </li>
                                </ul>
                                
                                <div class="form-group" style="margin-top:30px;">
                                    <a href="#" class="btn btn-primary">Generate Food Chart</a>
                                </div>
                                <!--<div class="info-box clear"><sup>*</sup>Click and drag foods to move to different meal time or day</div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-12">
                    	<div class="panel panel-default panel-chart">
                        	<div class="panel-heading">
                            	<div class="text-center">Weight history</div>
                                <form class="clear">
                                	<div class="row">
                                    	<div class="col-xs-12">
                                        	<label class="control-label">Interval</label>
                                            <select class="form-control input-sm">
                                            	<option>Last 7 days</option>
                                                <option>Last 30 days</option>
                                                <option>This Month</option>
                                                <option>Last Month</option>
                                                <option>Last 3 Months</option>
                                                <option>Last 6 Months</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-6 col-md-6">
                                        	<label class="control-label">From</label>
                                            <div class="input-group input-group-sm">
                                            	<input class="form-control" type="text">
                                                <span class="input-group-btn">
                                                	<button class="btn btn-default"><span class="glyphicon glyphicon-calendar"></span></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                        	<label class="control-label">To</label>
                                            <div class="input-group input-group-sm">
                                            	<input class="form-control" type="text">
                                                <span class="input-group-btn">
                                                	<button class="btn btn-default"><span class="glyphicon glyphicon-calendar"></span></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-body text-center">
                            	<p>No data has been tracked for this period</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
            <!-- add food modal start -->
            <div class="modal fade add_food_modal" id="add-food" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            	<div class="modal-dialog" role="document">
                	<div class="modal-content">
                    	<div class="modal-header">
                        	<div class="row">
                            	<div class="col-xs-6"><h3>Add Food</h3></div>
                                <div class="col-xs-6 text-right">
                                	<a data-toggle="tooltip" data-placement="top" title="Your basket is empty" href="#">
                                    	<sup class="notifier">2</sup>
                                        <i class="fa fa-shopping-basket"></i>
                                    </a>
                                    <span class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                        	<div class="search-wrap">
                            	<div class="search-box">
                                	<div class="input-group">
                                    	<input class="form-control" id="" type="search" placeholder="Search foods to item">
                                        <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="review-foods-basket-notification"></div>
                            <div class="tab-block">
                            	<ul class="nav nav-tabs" role="tablist">
                                	<li class="active"><a data-toggle="tab" href="#tab-1">Freeform</a></li>
                                    <li><a data-toggle="tab" href="#tab-2">History</a></li>
                                </ul>
                                <div class="tab-content">
                                	<div id="tab-1" class="tab-pane active">
                                    	<div class="form-group">
                                        	<label>What did you eat?</label>
                                            <textarea class="form-control" rows="10" cols="100" placeholder="Eg: Turkey Club Sandwich and a 12 oz coke"></textarea>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                    	<input class="form-control" type="text" placeholder="Search Food History">
                                        <ul class="list-group">
                                        	<li class="list-group-item history-item">
                                            	<span class="badge">105 <span class="block">Cal</span></span>Banana
                                                <span class="item-serving">1 medium (7" to 7-7/8" long)</span>
                                            </li>
                                            <li class="list-group-item history-item">
                                            	<span class="badge">105 <span class="block">Cal</span></span>Banana
                                                <span class="item-serving">1 medium (7" to 7-7/8" long)</span>
                                            </li>
                                            <li class="list-group-item history-item">
                                            	<span class="badge">105 <span class="block">Cal</span></span>Banana
                                                <span class="item-serving">1 medium (7" to 7-7/8" long)</span>
                                            </li>
                                            <li class="list-group-item history-item">
                                            	<span class="badge">105 <span class="block">Cal</span></span>Banana
                                                <span class="item-serving">1 medium (7" to 7-7/8" long)</span>
                                            </li>
                                            <li class="list-group-item history-item">
                                            	<span class="badge">105 <span class="block">Cal</span></span>Banana
                                                <span class="item-serving">1 medium (7" to 7-7/8" long)</span>
                                            </li>
                                        </ul>
                                        <div class="clear text-center"><a class="btn more-btn" href="#">Show more</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="consumed-at">
                            	<strong>When:</strong>
                                <span class="tags">Wednesday, 5/3, Breakfast</span>
                            </div>
                            <div class="clear">
                            	<a class="btn add-btn disabled" href="#"><i class="fa fa-shopping-basket"></i> Add to Basket</a>
                            </div>
                            <div class="note">
                            	<h4>How does Natural Work?</h4>
                                <p>Type or speak freeform text in the box above and we use state-of-the-art natural language processing technology to accurately determine what you ate.</p>
                                <p>After you add foods to the basket, you will have a chance to review the foods, change the time you ate them, and change serving sizes before adding to your food log.</p>
                            </div>
                        </div>
            		</div>
                </div>
            </div>
            <!-- add food modal end -->
            <!-- nutrition modal start -->
            <div class="modal fade nutrition_modal" id="nutrition-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            	<div class="modal-dialog modal-label" role="document">
                	<div class="modal-content">
                    	<div class="modal-header">
                        	<h3 class="modal-title">Daily Total</h3>
                        </div>
                        <div class="modal-body">
                        	<div class="nutritionLabel">
                            	<div class="title">Nutrition Facts</div>
                                <div class="headerSpacer"></div>
                                <div class="bar1"></div>
                                <div class="line">
                                    <div class="fr">Calories from Fat 0</div>
                                    <div><b>Calories</b> <span>0</span></div>
                                </div>
                                <div class="bar2"></div>
                                <div class="line ar"><b>% Daily Value<sup>*</sup></b></div>
                                <div class="line">
                                    <div class="dv"><b>0</b>%</div>
                                    <b>Total Fat</b>
                                    <span>0g</span>
                                </div>
                                <div class="line indent">
                                    <div class="dv"><b>0</b>%</div>
                                    Saturated Fat <span>0g</span>
                                </div>
                                <div class="line">
                                    <div class="dv"><b>0</b>%</div>
                                    <b>Cholesterol</b>
                                    <span>0mg</span>
                                </div>
                                <div class="line">
                                    <div class="dv"><b>0</b>%</div>
                                    <b>Sodium</b>
                                    <span>0mg</span>
                                </div>
                                <div class="line">
                                    <div class="dv"><b>0</b>%</div>
                                    <b>Total Carbohydrates</b>
                                    <span>0g</span>
                                </div>
                                <div class="line indent">
                                    <div class="dv"><b>0</b>%</div>
                                    Dietary Fiber <span>0g</span>
                                </div>
                                <div class="line indent">Sugars <span>0g</span></div>
                                <div class="line"><b>Protein</b> <span>0g</span></div>
                                <div class="bar1"></div>
                                <div class="line vitaminA">
                                    <div class="dv">0%</div>
                                    Vitamin A
                                </div>
                                <div class="line vitaminC">
                                    <div class="dv">0%</div>
                                    Vitamin C
                                </div>
                                <div class="line calcium">
                                    <div class="dv">0%</div>
                                    Calcium
                                </div>
                                <div class="line iron">
                                    <div class="dv">0%</div>
                                    Iron
                                </div>
                                <div class="dvCalorieDiet line">
                                    <div class="calorieNote">
                                        <span class="star">*</span> Percent Daily Values are based on a 2000 calorie diet.
                                    </div>
                                </div>
                            </div>
                            <p><strong>Net Carbs:</strong> 0g</p>
                            <ul class="nutrition-label-attr">
                                <li>Vitamin D<span class="note">**</span> : 0 IU</li>
                                <li>Phosphorus<span class="note">**</span> : 0 mg</li>
                                <li>Potassium<span class="note">**</span> : 0 mg</li>
                                <li>Caffeine<span class="note">**</span> : 0 mg</li>
                            </ul>
                            <div class="label-note">** Please note that our restaurant and branded grocery food database does not have these attributes available, and if your food log contains restaurant or branded grocery foods, these totals may be incorrect. The data from these these attributes is for reference purpose only, and should not be used for any chronic disease management.</div>
                        </div>
                        <div class="modal-footer text-center"><button class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button></div>
            		</div>
                </div>
            </div>
            <!-- nutrition modal end -->
            <!-- review modal start -->
            <div class="modal fade modal_review_food" id="modal-review-food" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
             <div class="modal-dialog modal-label" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <div class="row">
                             <div class="col-xs-12">
                                 <span class="btn-modal-back"><i class="fa fa-angle-left"></i></span>
                                    <span class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
                                    <h3 class="modal-title text-center">Basket</h3>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                         <form class="review-food-form clear">
                             <div class="search-box">
                                 <div class="input-group">
                                     <input class="form-control" id="singal-search-box" type="search" placeholder="Search foods to test">
                                        <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                    </div>
                                
                               <!--  <div class="singal-foods-dropdown-menu-main">
                                    <ul class="singal-foods-dropdown-menu foods-menu" id="singal-foods-menu"></ul>
                                </div> -->
                                
                                </div>
                                <div class="basket-notification"></div>
                                <div id="add_item" class="form-group row">
                                </div>
                                <div class="item-total-calories row">
                                 <div class="item-calorie">130</div>Total Calories
                                </div>
                                <div class="macronutrients row">
                                 <div class="col protein">1g<span>Protein</span></div>
                                    <div class="col carb">29g<span>Carbs</span></div>
                                    <div class="col fat">2g<span>Fat</span></div>
                                    <div class="col sodium">14mg<span>Sodium</span></div>
                                </div>
                                <div class="when-data">
                                    <p><b>When :</b><span>Today, Lunch</span></p>
                                    <p><b>Meal</b></p>
                                    <div class="meal-at">
                                        <div class="btn-group colors" data-toggle="buttons">
                                          <label class="btn btn-default active">
                                            <input type="radio" name="options" value="Breakfast" autocomplete="off" checked> Breakfast
                                          </label>
                                          <label class="btn btn-default">
                                            <input type="radio" name="options" value="Lunch" autocomplete="off"> Lunch
                                          </label>
                                          <label class="btn btn-default">
                                            <input type="radio" name="options" value="Dinner" autocomplete="off"> Dinner
                                          </label>
                                            <label class="btn btn-default">
                                            <input type="radio" name="options" value="Morning Snacks" autocomplete="off"> Morning Snacks
                                          </label>
                                            <label class="btn btn-default">
                                            <input type="radio" name="options" value="Afternoon Snacks" autocomplete="off"> Afternoon Snacks
                                          </label>
                                            <label class="btn btn-default">
                                            <input type="radio" name="options" value="Additional Snacks" autocomplete="off"> Additional Snacks
                                          </label>
                                        </div>
                                    </div>
                                    <p style="margin-top:20px;"><b>Date</b></p>
                                    <div class="meal-at">
                                        <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-default active">
                                            <input type="radio" name="options" value="Breakfast" autocomplete="off" checked> Breakfast
                                          </label>
                                          <label class="btn btn-default">
                                            <input type="radio" name="options" value="today" autocomplete="off"> Today
                                          </label>
                                          <label class="btn btn-default">
                                            <input type="radio" name="options" value="yesterday" autocomplete="off"> Yesterday
                                          </label>
                                            <label class="btn btn-default">
                                            <input type="radio" name="options" value="yesterday" autocomplete="off"> Choose Date
                                          </label>
                                        </div>
                                    </div>
                                    <div class="log-button" style="margin-top:20px;">
                                        <div class="btn btn-block btn-success">Log Food</div>
                                    </div>
                                </div>
                            </form>
                        </div>
              </div>
                </div>
            </div>
            <!-- review modal end -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>