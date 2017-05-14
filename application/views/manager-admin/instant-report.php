<?php 
    if($food_first != FALSE){
        $total_protien = 0;
        $total_carbs = 0;
        $total_fat = 0;
        $total_sodium = 0;
        $total_calories = 0;
        $total_cholesterol = 0;
        $total_saturatedfat = 0;
        $total_dietaryfiber = 0;
        $total_sugar = 0;
        
        $total_protien_balance = 0;
        $total_carbs_balance = 0;
        $total_fat_balance = 0;
        $total_sodium_balance = 0;
        $total_calories_balance = 0;
        $total_cholesterol_balance = 0;
        $total_saturatedfat_balance = 0;
        $total_dietaryfiber_balance = 0;
        $total_sugar_balance = 0;
        foreach($food_first as $food)
        {
            $total_protien = $food->total_protein+$total_protien;
            $total_carbs = $food->total_carbs+$total_carbs;
            $total_fat = $food->total_fat+$total_fat;
            $total_sodium = $food->total_sodium+$total_sodium;
            $total_calories = $food->tatal_calories+$total_calories;
            $total_cholesterol = $food->total_cholesterol+$total_cholesterol;
            $total_saturatedfat = $food->total_saturated_fat+$total_saturatedfat;
            $total_dietaryfiber = $food->total_dietary_fiber+$total_dietaryfiber;
            $total_sugar = $food->total_sugars+$total_sugar;
        }
        
        foreach($total_val as $food_tot)
        {
            $total_protien_balance = $food_tot->total_protein+$total_protien_balance;
            $total_carbs_balance = $food_tot->total_carbs+$total_carbs_balance;
            $total_fat_balance = $food_tot->total_fat+$total_fat_balance;
            $total_sodium_balance = $food_tot->total_sodium+$total_sodium_balance;
            $total_calories_balance = $food_tot->tatal_calories+$total_calories_balance;
            $total_cholesterol_balance = $food_tot->total_cholesterol+$total_cholesterol_balance;
            $total_saturatedfat_balance = $food_tot->total_saturated_fat+$total_saturatedfat_balance;
            $total_dietaryfiber_balance = $food_tot->total_dietary_fiber+$total_dietaryfiber_balance;
            $total_sugar_balance = $food_tot->total_sugars+$total_sugar_balance;
        }
    }

    if($profile->how_active == "Sedentary")
    {
        $active_level = 1.2;
    }else if($profile->how_active == "Lightly Active")
    {
        $active_level = 1.3;
    }else if($profile->how_active == "Active")
    {
        $active_level = 1.5;
    }else if($profile->how_active == "Very Active")
    {
        $active_level = 1.8;
    }
    if($profile->gender == "Male")
    {
        $weight = substr($profile->actual_weight, 0, -2);
        $height = substr($profile->height, 0, -3);
        $age = substr($profile->age, 0, -6);
        $calc1 = 13.75*$weight;
        $calc2 =  5.003*$height;
        $calc3 = 6.755*$age;
        $totalcalc = 66.5+$calc1+$calc2;
        $bmr = $totalcalc - $calc3;
    }else if($profile->gender == "Female"){
        $weight = substr($profile->actual_weight, 0, -2);
        $height = substr($profile->height, 0, -3);
        $age = substr($profile->age, 0, -6);
        $calc1 = 9.563*$weight;
        $calc2 =  1.850*$height;
        $calc3 = 4.676*$age;
        $totalcalc = 655.1+$calc1+$calc2;
        $bmr = $totalcalc - $calc3;
    }
    if($profile->goals == "Lose Fat")
    {
        $proti_calc = $bmr*$active_level*0.45;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.30;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.25;
        $carb_allowence = round($carb_calc/4,2);
    }else if($profile->goals == "Gain Fat")
    {
        $proti_calc = $bmr*$active_level*0.25;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.20;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.55;
        $carb_allowence = round($carb_calc/4,2);
    }else if($profile->goals == "Gain muscle")
    {
        $proti_calc = $bmr*$active_level*0.35;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.20;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.45;
        $carb_allowence = round($carb_calc/4,2);
    }else if($profile->goals == "Maintain and stay fit")
    {
        $proti_calc = $bmr*$active_level*0.35;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.30;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.35;
        $carb_allowence = round($carb_calc/4,2);
    }else if($profile->goals == "Other")
    {
        $proti_calc = $bmr*$active_level*0.35;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.30;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.35;
        $carb_allowence = round($carb_calc/4,2);
    }
    
    $sodium_allowence = 2400;
    $cholesterol_allowence = 300;
    $saturatedfat_allowence = 20;
    $dietaryfiber_allowence = 25;
    $sugar_allowence = 90;
    $percentage_protein = round(100*$total_protien/$protein_allowence);
    $percentage_carb = round(100*$total_carbs/$carb_allowence);
    $percentage_fat = round(100*$total_fat/$fat_allowence);
    $percentage_sodium = round(100*$total_sodium/$sodium_allowence);
    $percentage_cholesterol = round(100*$total_cholesterol/$cholesterol_allowence);
    $percentage_saturatedfat = round(100*$total_saturatedfat/$saturatedfat_allowence);
    $percentage_dietaryfiber = round(100*$total_dietaryfiber/$dietaryfiber_allowence);
    $percentage_sugar = round(100*$total_sugar/$sugar_allowence);

    $sodium_balance_today = $sodium_allowence-$total_sodium_balance;
    $fat_balance_today = $fat_allowence-$total_fat_balance;
    $saturatedfat_balance_today = $saturatedfat_allowence-$total_saturatedfat_balance;
    $cholesterol_balance_today = $cholesterol_allowence-$total_cholesterol_balance;
    $sodium_balance_today = $sodium_allowence-$total_sodium_balance;
    $carb_balance_today = $carb_allowence-$total_carbs_balance;
    $dietaryfiber_balance_today = $dietaryfiber_allowence-$total_dietaryfiber_balance;
    $sugar_balance_today = $sugar_allowence-$total_sugar_balance;
    $protein_balance_today = $protein_allowence-$total_protien_balance;

if($sodium_balance_today < 0){ $sodium_balance_today = 'Over your limit'; }
if($fat_balance_today < 0){ $fat_balance_today = 'Over your limit'; }
if($saturatedfat_balance_today < 0){ $saturatedfat_balance_today = 'Over your limit'; }
if($cholesterol_balance_today < 0){ $cholesterol_balance_today = 'Over your limit'; }
if($sodium_balance_today < 0){ $sodium_balance_today = 'Over your limit'; }
if($carb_balance_today < 0){ $carb_balance_today = 'Over your limit'; }
if($dietaryfiber_balance_today < 0){ $dietaryfiber_balance_today = 'Over your limit'; }
if($sugar_balance_today < 0){ $sugar_balance_today = 'Over your limit'; }
if($protein_balance_today < 0){ $protein_balance_today = 'Over your limit'; }
    
$caloties_from_fat = $total_fat*9;
$caloties_from_protein = $total_protien*4;
$caloties_from_carb = $total_carbs*4;
$percent_daily_value = $bmr*$active_level;
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row" id="capture_image">
            <div class="col-sm-6 middle-report">
                <div class="logo-tops text-center">
                    <img src="<?php echo base_url('theme/images/logo.png'); ?>" width="200" />
                </div>
                <h2 class="text-center all-caps">Nutrition Facts </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-lay">
                        <div class="head list-instant">
                            <div class="col-sm-5 big-font">Calories <?php echo $total_calories; ?></div>
                            <div class="col-sm-4">Calories from Fat <?php echo $caloties_from_fat; ?></div>
                            <div class="col-sm-3"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-3">% daily value</div>
                            <div class="col-sm-4">Balance for Today</div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant">
                            <div class="col-sm-5 big-font">Total Fat <span class="small-list"><?php echo $total_fat; ?>g</span></div>
                            <div class="col-sm-4"><?php echo $percentage_fat; ?>%</div>
                            <div class="col-sm-3"><?php echo $fat_balance_today; ?><?php if($fat_balance_today != 'Over your limit'){ echo 'g';} ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant">
                            <div class="col-sm-5">Saturated Fat <span class="small-list"><?php echo $total_saturatedfat; ?>g</span></div>
                            <div class="col-sm-4"><?php echo $percentage_saturatedfat; ?>%</div>
                            <div class="col-sm-3"><?php echo $saturatedfat_balance_today; ?><?php if($saturatedfat_balance_today != 'Over your limit'){ echo 'g';} ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant">
                            <div class="col-sm-5 big-font">Cholesterol <span class="small-list"><?php echo $total_cholesterol; ?>mg</span></div>
                            <div class="col-sm-4"><?php echo $percentage_cholesterol; ?>%</div>
                            <div class="col-sm-3"><?php echo $cholesterol_balance_today; ?><?php if($cholesterol_balance_today != 'Over your limit'){ echo 'mg';} ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant">
                            <div class="col-sm-5 big-font">Sodium <span class="small-list"><?php echo $total_sodium; ?>g</span></div>
                            <div class="col-sm-4"><?php echo $percentage_sodium; ?>%</div>
                            <div class="col-sm-3"><?php echo $sodium_balance_today; ?><?php if($sodium_balance_today != 'Over your limit'){ echo 'g';} ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant">
                            <div class="col-sm-5 big-font">Total Carbohydrates <span class="small-list"><?php echo $total_carbs; ?>g</span></div>
                            <div class="col-sm-4"><?php echo $percentage_carb; ?>%</div>
                            <div class="col-sm-3"><?php echo $carb_balance_today; ?><?php if($carb_balance_today != 'Over your limit'){ echo 'g';} ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant">
                            <div class="col-sm-5">Dietary Fiber <span class="small-list"><?php echo $total_dietaryfiber; ?>g</span></div>
                            <div class="col-sm-4"><?php echo $percentage_dietaryfiber; ?>%</div>
                            <div class="col-sm-3"><?php echo $dietaryfiber_balance_today; ?><?php if($dietaryfiber_balance_today != 'Over your limit'){ echo 'g';} ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant">
                            <div class="col-sm-5">Sugar <span class="small-list"><?php echo $total_sugar; ?>g</span></div>
                            <div class="col-sm-4"><?php echo $percentage_sugar; ?>%</div>
                            <div class="col-sm-3"><?php echo $sugar_balance_today; ?><?php if($sugar_balance_today != 'Over your limit'){ echo 'g';} ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-instant last-col">
                            <div class="col-sm-5 big-font">Protein <span class="small-list"><?php echo $total_protien; ?>g</span></div>
                            <div class="col-sm-4"><?php echo $percentage_protein; ?>%</div>
                            <div class="col-sm-3"><?php echo $protein_balance_today; ?><?php if($protein_balance_today != 'Over your limit'){ echo 'g';} ?></div>
                            <div class="clearfix"></div>
                        </div>
                        </div>
                        <p class="small-dt">* Percent Daily Value are based on a <?php echo round($percent_daily_value); ?> calorie diet</p>
                        <p class="grey-box-dt">Source of Calories</p>
                        <div class="col-sm-6">
                            <div class="svg-parent-inst">
                                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="instant-instru">
                                <div class="col-sm-12">
                                    <div class="blue-box-in"><div class="stocked1"></div> <label>Protein <?php echo $caloties_from_protein; ?>g</label></div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="blue-box-in"><div class="stocked3"></div> <label>Carbohydrates <?php echo $caloties_from_carb; ?>g</label></div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="blue-box-in"><div class="stocked2"></div> <label>Fats <?php echo $caloties_from_fat; ?>g</label></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="fb-button text-center">
                            <img src="<?php echo base_url('theme/images/share-fb.png'); ?>" width="250" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <a href="Javascript:void(0);" id="generate_report_btn" onclick="return capture();" class="btn btn-lg btn-primary">Generate Instant Report</a>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
<footer class="footer text-center"> <?php echo date('Y'); ?> &copy; The Food Analysts </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('theme/admin-theme/js/jquery.min.js'); ?>"></script>
    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/bootstrap.min.js'); ?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/jquery.slimscroll.js'); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('theme/admin-theme/js/waves.js'); ?>"></script>
    
    <!-- Validation JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
    
    <!-- Datatable JS -->
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<!-- Circular Chart -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/snap.svg/0.1.0/snap.svg-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="<?php echo base_url('theme/admin-theme/js/canvasjs.min.js'); ?>"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/custom.js'); ?>"></script>
    <script src="<?php echo base_url('theme/js/custom-food.js'); ?>"></script>
    <script>
        window.onload = function () {
            CanvasJS.addColorSet('customColorSet1',
             [//colorSet Array
             "#0067b4",
             "#7ac81a",
             "#404040",
            ]); 
            var chartinstant = new CanvasJS.Chart("chartContainer",
            {
                animationEnabled: true,
                data: [
                {      
                    backgroundColor: "transparent",
                    type: "pie",
                    colorSet:  "customColorSet1",
                    indexLabelFontSize: 20,
                    indexLabelFontWeight: "bold",
                    startAngle:0,
                    indexLabelFontColor: "MistyRose",       
                    indexLabelLineColor: "darkgrey", 
                    indexLabelPlacement: "inside", 
                    toolTipContent: "{name}: {y}g",
                    showInLegend: false,
                    indexLabel: "#percent%", 
                    dataPoints: [
                        {  y: <?php echo $caloties_from_carb; ?>, name: "Carbohydrates"},
                        {  y: <?php echo $caloties_from_protein; ?>, name: "Protein"},
                        {  y: <?php echo $caloties_from_fat; ?>, name: "Fats"}
                    ]
                }
                ]
            });
            chartinstant.render();
            $('.canvasjs-chart-credit').remove();
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable();
        })
    </script>
</body>

</html>
