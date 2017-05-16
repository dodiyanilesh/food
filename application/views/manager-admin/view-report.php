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
        $total_vitamina = 0;
        $total_calcium = 0;
        $total_iron = 0;
        $total_trans_fat = 0;
        
        $total_protien_balance = 0;
        $total_carbs_balance = 0;
        $total_fat_balance = 0;
        $total_sodium_balance = 0;
        $total_calories_balance = 0;
        $total_cholesterol_balance = 0;
        $total_saturatedfat_balance = 0;
        $total_dietaryfiber_balance = 0;
        $total_sugar_balance = 0;
        $total_vitaminb = 0;
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
            $total_vitamina = $food->total_sugars+$total_vitamina;
            $total_calcium = $food->total_calcium+$total_calcium;
            $total_iron = $food->total_iron+$total_iron;
            $total_trans_fat = $food->total_trans_fatty_acid+$total_trans_fat;
            $total_vitaminb = $food->total_vitamin_b+$total_vitaminb;
        }
        $total_calories_breakfast = 0;
        $total_calories_lunch = 0;
        $total_calories_dinner = 0;
        if($breakfast != FALSE){
            foreach($breakfast as $breakfastfood)
            {
                $total_calories_breakfast = $breakfastfood->tatal_calories+$total_calories_breakfast;
            }
        }
        if($lunch != FALSE){
            foreach($lunch as $lunchfood)
            {
                $total_calories_lunch = $lunchfood->tatal_calories+$total_calories_lunch;
            }
        }
        if($dinner != FALSE){
            foreach($dinner as $dinnerfood)
            {
                $total_calories_dinner = $dinnerfood->tatal_calories+$total_calories_dinner;
            }
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
        $chart_carb = 25;
        $chart_protein = 45;
        $chart_fat = 30;
    }else if($profile->goals == "Gain Fat")
    {
        $proti_calc = $bmr*$active_level*0.25;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.20;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.55;
        $carb_allowence = round($carb_calc/4,2);
        $chart_carb = 55;
        $chart_protein = 25;
        $chart_fat = 20;
    }else if($profile->goals == "Gain muscle")
    {
        $proti_calc = $bmr*$active_level*0.35;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.20;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.45;
        $carb_allowence = round($carb_calc/4,2);
        $chart_carb = 25;
        $chart_protein = 45;
        $chart_fat = 30;
    }else if($profile->goals == "Maintain and stay fit")
    {
        $proti_calc = $bmr*$active_level*0.35;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.30;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.35;
        $carb_allowence = round($carb_calc/4,2);
        $chart_carb = 35;
        $chart_protein = 35;
        $chart_fat = 30;
    }else if($profile->goals == "Other")
    {
        $proti_calc = $bmr*$active_level*0.35;
        $protein_allowence = round($proti_calc/4,2);
        $fat_calc = $bmr*$active_level*0.30;
        $fat_allowence = round($fat_calc/9,2);
        $carb_calc = $bmr*$active_level*0.35;
        $carb_allowence = round($carb_calc/4,2);
        $chart_carb = 35;
        $chart_protein = 35;
        $chart_fat = 30;
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
$access_calories = $total_calories-($bmr*$active_level);
$apple_bar = $access_calories/9;
$equivalant_jogging = $access_calories/(0.16*$weight);

//////////////// new calculation
$bmi_calc1 = $weight*10000;
$bmi_calc2 = $height*$height;
$bmi = round($bmi_calc1/$bmi_calc2);
$remain_calory = round(abs($access_calories)-$total_calories);
if($remain_calory > 0)
{
    $percent_calory = round(100*$total_calories/abs($access_calories));
    $percent_calory_remain = 100-$percent_calory;
    $cal_bar_class = "inlimit";
    $cal_bar_msg = '';
}else{
    $percent_calory = '100';
    $percent_calory_remain = 0;
    $cal_bar_class = "overlimit";
    $cal_bar_msg = ' - Over your limit';
}

$remain_fat = round($fat_allowence-$total_fat);
if($remain_fat > 0)
{
    $percent_fat = round(100*$total_fat/$fat_allowence);
    $percent_fat_remain = 100-$percent_fat;
    $fat_bar_class = "inlimit";
    $fat_bar_msg = '';
}else{
    $percent_fat = '100';
    $percent_fat_remain = 0;
    $fat_bar_class = "overlimit";
    $fat_bar_msg = ' - Over your limit';
}

$remain_satufat = round(20-$total_saturatedfat);
if($remain_satufat > 0)
{
    $percent_satufat = round(100*$total_saturatedfat/20);
    $percent_satufat_remain = 100-$percent_satufat;
    $satufat_bar_class = "inlimit";
    $satufat_bar_msg = '';
}else{
    $percent_satufat = '100';
    $percent_satufat_remain = 0;
    $satufat_bar_class = "overlimit";
    $satufat_bar_msg = ' - Over your limit';
}
$transfat_allowence = $percent_daily_value/900;
$remain_transfat = round($transfat_allowence-$total_trans_fat,2);
if($remain_transfat > 0)
{
    $percent_transfat = round(100*$total_trans_fat/$transfat_allowence);
    $percent_transfat_remain = 100-$percent_transfat;
    $transfat_bar_class = "inlimit";
    $transfat_bar_msg = '';
}else{
    $percent_transfat = '100';
    $percent_transfat_remain = 0;
    $transfat_bar_class = "overlimit";
    $transfat_bar_msg = ' - Over your limit';
}

$remain_carb = round($carb_allowence-$total_carbs);
if($remain_carb > 0)
{
    $percent_carb = round(100*$total_carbs/$carb_allowence);
    $percent_carb_remain = 100-$percent_carb;
    $carb_bar_class = "inlimit";
    $carb_bar_msg = '';
}else{
    $percent_carb = '100';
    $percent_carb_remain = 0;
    $carb_bar_class = "overlimit";
    $carb_bar_msg = ' - Over your limit';
}
$remain_sugar = round($sugar_allowence-$total_sugar);
if($remain_sugar > 0)
{
    $percent_sugar = round(100*$total_sugar/$sugar_allowence);
    $percent_sugar_remain = 100-$percent_sugar;
    $sugar_bar_class = "inlimit";
    $sugar_bar_msg = '';
}else{
    $percent_sugar = '100';
    $percent_sugar_remain = 0;
    $sugar_bar_class = "overlimit";
    $sugar_bar_msg = ' - Over your limit';
}

$remain_protien = round($protein_allowence-$total_protien);
if($remain_protien > 0)
{
    $percent_protien = round(100*$total_protien/$protein_allowence);
    $percent_protien_remain = 100-$percent_protien;
    $protien_bar_class = "inlimit";
    $protien_bar_msg = '';
}else{
    $percent_protien = '100';
    $percent_protien_remain = 0;
    $protien_bar_class = "overlimit";
    $protien_bar_msg = ' - Over your limit';
}

$remain_dietaryfiber = round(25-$total_dietaryfiber);
if($remain_dietaryfiber > 0)
{
    $percent_dietaryfiber = round(100*$total_dietaryfiber/25);
    $percent_dietaryfiber_remain = 100-$percent_dietaryfiber;
    $dietaryfiber_bar_class = "inlimit";
    $dietaryfiber_bar_msg = '';
}else{
    $percent_dietaryfiber = '100';
    $percent_dietaryfiber_remain = 0;
    $dietaryfiber_bar_class = "overlimit";
    $dietaryfiber_bar_msg = ' - Over your limit';
}

$remain_cholesterol = round($cholesterol_allowence-$total_cholesterol);
if($remain_cholesterol > 0)
{
    $percent_cholesterol = round(100*$total_cholesterol/$cholesterol_allowence);
    $percent_cholesterol_remain = 100-$percent_cholesterol;
    $cholesterol_bar_class = "inlimit";
    $cholesterol_bar_msg = '';
}else{
    $percent_cholesterol = '100';
    $percent_cholesterol_remain = 0;
    $cholesterol_bar_class = "overlimit";
    $cholesterol_bar_msg = ' - Over your limit';
}

$remain_sodium = round(2400-$total_sodium);
if($remain_sodium > 0)
{
    $percent_sodium = round(100*$total_sodium/2400);
    $percent_sodium_remain = 100-$percent_sodium;
    $sodium_bar_class = "inlimit";
    $sodium_bar_msg = '';
}else{
    $percent_sodium = '100';
    $percent_sodium_remain = 0;
    $sodium_bar_class = "overlimit";
    $sodium_bar_msg = ' - Over your limit';
}

$remain_vitamina = round(5000-$total_vitamina);
if($remain_vitamina > 0)
{
    $percent_vitamina = round(100*$total_vitamina/5000);
    $percent_vitamina_remain = 100-$percent_vitamina;
    $vitamina_bar_class = "inlimit";
    $vitamina_bar_msg = '';
}else{
    $percent_vitamina = '100';
    $percent_vitamina_remain = 0;
    $vitamina_bar_class = "overlimit";
    $vitamina_bar_msg = ' - Over your limit';
}
$remain_calcium = round(1000-$total_calcium);
if($remain_calcium > 0)
{
    $percent_calcium = round(100*$total_calcium/1000);
    $percent_calcium_remain = 100-$percent_calcium;
    $calcium_bar_class = "inlimit";
    $calcium_bar_msg = '';
}else{
    $percent_calcium = '100';
    $percent_calcium_remain = 0;
    $calcium_bar_class = "overlimit";
    $calcium_bar_msg = ' - Over your limit';
}
$remain_iron = round(18-$total_iron);
if($remain_iron > 0)
{
    $percent_iron = round(100*$total_iron/18);
    $percent_iron_remain = 100-$percent_iron;
    $iron_bar_class = "inlimit";
    $iron_bar_msg = '';
}else{
    $percent_iron = '100';
    $percent_iron_remain = 0;
    $iron_bar_class = "overlimit";
    $iron_bar_msg = ' - Over your limit';
}
//Vitamin B
$remain_vitaminb = round(2000-$total_vitaminb);
if($remain_vitaminb > 0)
{
    $percent_vitaminb = round(100*$total_vitaminb/2000);
    $percent_vitaminb_remain = 100-$percent_vitaminb;
    $vitaminb_bar_class = "inlimit";
    $vitaminb_bar_msg = '';
}else{
    $percent_vitaminb = '100';
    $percent_vitaminb_remain = 0;
    $vitaminb_bar_class = "overlimit";
    $vitaminb_bar_msg = ' - Over your limit';
}

    
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row" id="capture_image" style="padding:50px 0; background:#edf1f5;">
            <div class="top-bar-gebe" style="display:inline-block; width:100%; margin-bottom:20px;">
                <div class="col-sm-6">
                    <img src="<?php echo base_url('theme/images/logo.png'); ?>" width="300" />
                </div>
                <div class="col-sm-6">
                    <div class="text-right">
                        <p style="color:#7cc91e; font-size:20px; font-weight:bold; margin-bottom:0"><?php echo $user->first_name.' '.$user->last_name; ?></p>
                        <p style="color:#7cc91e; font-size:18px;"><?php echo $report_date; ?></p>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            <div class="col-md-4">
              <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                <div class="head text-center">Calories Breakdown by Meal</div>
            <div class="Instruction row" style="margin-top:20px;">
                <div class="col-sm-4" style="padding:0 5px 0 15px;">
                    <div class="blue-box-in"><div class="stocked1"></div> <label>Breakfast</label></div>
                </div>
                <div class="col-sm-4" style="padding:0 5px;">
                    <div class="blue-box-in"><div class="stocked2"></div> <label>Lunch</label></div>
                </div>
                <div class="col-sm-4" style="padding:0 15px 0px 0;">
                    <div class="blue-box-in"><div class="stocked3"></div> <label>Dinner</label></div>
                </div>
                <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4">
              <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                <div class="head text-center">Today’s Sources of calories</div>
                <div class="Instruction row" style="margin-top:20px;">
                <div class="col-sm-4" style="padding:0 5px 0 15px;">
                    <div class="blue-box-in"><div class="stocked1"></div> <label>Carbs</label></div>
                </div>
                <div class="col-sm-4" style="padding:0 5px;">
                    <div class="blue-box-in"><div class="stocked2"></div> <label>Protein</label></div>
                </div>
                <div class="col-sm-4" style="padding:0 15px 0px 0;">
                    <div class="blue-box-in"><div class="stocked3"></div> <label>Fats</label></div>
                </div>
                <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4">
              <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
                <div class="head text-center">Your Ideal Sources of calories</div>
            <div class="Instruction row" style="margin-top:20px;">
                <div class="col-sm-4" style="padding:0 5px 0 15px;">
                    <div class="blue-box-in"><div class="stocked1"></div> <label>Carbs</label></div>
                </div>
                <div class="col-sm-4" style="padding:0 5px;">
                    <div class="blue-box-in"><div class="stocked2"></div> <label>Protein</label></div>
                </div>
                <div class="col-sm-4" style="padding:0 15px 0px 0;">
                    <div class="blue-box-in"><div class="stocked3"></div> <label>Fats</label></div>
                </div>
                <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="green-box-big">
                <div class="col-sm-4"><div class="green1">
                    <?php 
                        if($access_calories > 0){
                            echo 'You had an excess of '.abs(round($access_calories)).' Calories';
                        }else{
                            echo 'You had a deficit of '.abs(round($access_calories)).' Calories';
                        }
                    ?>
                </div></div>
                <div class="col-sm-4"><div class="green2">This is equivalant to <?php echo abs(round($equivalant_jogging)); ?> minutes jogging</div></div>
                <div class="col-sm-4"><div class="green3">Or <?php echo abs(round($apple_bar)); ?> Apples</div></div>
                <!--<div class="col-sm-3"><div class="green4">
                    Height : <?php echo $profile->height; ?><br/>
                    Weight : <?php echo $profile->actual_weight; ?><br/>
                    Age : <?php echo $profile->age; ?><br/>
                    BMI : <?php echo $bmi; ?><br/>
                </div>-->
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="macro-details">
                <div class="col-sm-8">
                    <div class="macro-list">
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-8">
                             
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Calories</div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                                <div class="progress-bar progress-bar-success <?php echo $cal_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_calory; ?>%"><?php echo $total_calories.' '.$cal_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_calory_remain; ?>%"><?php echo $remain_calory; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Fats/<span class="caps-small">g</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                                <div class="progress-bar progress-bar-success <?php echo $fat_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_fat; ?>%"><?php echo $total_fat; ?>g<?php echo $fat_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_fat_remain; ?>%"><?php echo $remain_fat; ?>g</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Saturated Fats/<span class="caps-small">g</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                                <div class="progress-bar progress-bar-success <?php echo $satufat_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_satufat; ?>%"><?php echo $total_saturatedfat; ?>g<?php echo $satufat_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_satufat_remain; ?>%"><?php echo $remain_satufat; ?>g</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Trans Fats/<span class="caps-small">g</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                                <div class="progress-bar progress-bar-success <?php echo $transfat_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_transfat; ?>%"><?php echo $total_trans_fat; ?>g<?php echo $transfat_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_transfat_remain; ?>%"><?php echo $remain_transfat; ?>g</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Carbohydrates/<span class="caps-small">g</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                                <div class="progress-bar progress-bar-success <?php echo $carb_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_carb; ?>%"><?php echo $total_carbs; ?>g<?php echo $carb_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_carb_remain; ?>%"><?php echo $remain_carb; ?>g</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Sugars/<span class="caps-small">g</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                                <div class="progress-bar progress-bar-success <?php echo $sugar_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_sugar; ?>%"><?php echo $total_sugar; ?>g<?php echo $sugar_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_sugar_remain; ?>%"><?php echo $remain_sugar; ?>g</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Protein/<span class="caps-small">g</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                              <div class="progress-bar progress-bar-success <?php echo $protien_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_protien; ?>%"><?php echo $total_protien; ?>g<?php echo $protien_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_protien_remain; ?>%"><?php echo $remain_protien; ?>g</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Fiber/<span class="caps-small">g</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                              <div class="progress-bar progress-bar-success <?php echo $dietaryfiber_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_dietaryfiber; ?>%"><?php echo $total_dietaryfiber; ?>g<?php echo $dietaryfiber_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_dietaryfiber_remain; ?>%"><?php echo $remain_dietaryfiber; ?>g</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Cholesterol/<span class="caps-small">mg</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                              <div class="progress-bar progress-bar-success <?php echo $cholesterol_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_cholesterol; ?>%"><?php echo $total_cholesterol; ?>mg<?php echo $cholesterol_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_cholesterol_remain; ?>%"><?php echo $remain_cholesterol; ?>mg</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Sodium/<span class="caps-small">mg</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                              <div class="progress-bar progress-bar-success <?php echo $sodium_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_sodium; ?>%"><?php echo $total_sodium; ?>mg<?php echo $sodium_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_sodium_remain; ?>%"><?php echo $remain_sodium; ?>mg</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Vitamin A/<span class="caps-small">IU</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                              <div class="progress-bar progress-bar-success <?php echo $vitamina_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_vitamina; ?>%"><?php echo $total_vitamina; ?>iu<?php echo $vitamina_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_vitamina_remain; ?>%"><?php echo $remain_vitamina; ?>iu</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Vitamin B/<span class="caps-small">IU</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                              <div class="progress-bar progress-bar-success <?php echo $vitaminb_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_vitaminb; ?>%"><?php echo $total_vitaminb; ?>iu<?php echo $vitaminb_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_vitaminb_remain; ?>%"><?php echo $remain_vitaminb; ?>iu</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Calcium/<span class="caps-small">mg</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                              <div class="progress-bar progress-bar-success <?php echo $calcium_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_calcium; ?>%"><?php echo $total_calcium; ?>mg<?php echo $calcium_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_calcium_remain; ?>%"><?php echo $remain_calcium; ?>mg</div>
                            </div>
                        </div>
                    </div>
                    <div class="macro-list">
                        <div class="col-sm-4">
                            <div class="macro-title">Iron/<span class="caps-small">mg</span></div>
                        </div>
                        <div class="col-sm-8">
                             <div class="progress process-bar">
                              <div class="progress-bar progress-bar-success <?php echo $iron_bar_class; ?>" role="progressbar" style="width:<?php echo $percent_iron; ?>%"><?php echo $total_iron; ?>mg<?php echo $iron_bar_msg; ?></div>
                                <div class="progress-bar progress-bar-blue" role="progressbar" style="width:<?php echo $percent_iron_remain; ?>%"><?php echo $remain_iron; ?>mg</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="nutri-comment">
                        <textarea class="form-control custom-general-repo" id="food_comment" rows="7" placeholder="Enter Note Here..."></textarea>
                        <p id="food_comment_append"></p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix">
            <div class="col-sm-12">
                <div class="food-consume" style="margin-bottom:30px; margin-top:20px;">
                    <p><input type="text" class="form-control custom-general-repo" id="consume_day_note" placeholder="Food You Consumed Today" /></p>
                </div>
                <div class="food-consume">
                    <p><input type="text" class="form-control custom-general-repo" id="food_analysts_note" placeholder="Food Analysts" /></p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <a href="Javascript:void(0);" id="generate_report_btn" onclick="return capture();" class="btn btn-lg btn-primary">Generate Final Report</a>
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
            var chart = new CanvasJS.Chart("chartContainer",
            {
                animationEnabled: true,
                data: [
                {      
                    backgroundColor: "transparent",
                    type: "pie",
                    colorSet:  "customColorSet1",
                    indexLabelFontSize: 14,
                    indexLabelFontWeight: "bold",
                    startAngle:0,
                    indexLabelFontColor: "MistyRose",       
                    indexLabelLineColor: "darkgrey", 
                    indexLabelPlacement: "inside", 
                    toolTipContent: "{name}: {y}",
                    showInLegend: false,
                    indexLabel: "#percent%", 
                    dataPoints: [
                        {  y: <?php echo $total_calories_breakfast; ?>, name: "Breakfast",color:"#0067b5"},
                        <?php if($total_calories_lunch != 0){ ?>{  y: <?php echo $total_calories_lunch; ?>, name: "Lunch",color:"#b70000"}, <?php } ?>
                         <?php if($total_calories_dinner != 0){ ?>{  y: <?php echo $total_calories_dinner; ?>, name: "Dinner",color:"#7bc917"} <?php } ?>
                    ]
                    
                }
                ]
            });
            var chart2 = new CanvasJS.Chart("chartContainer2",
            {

                animationEnabled: true,
                data: [
                {       
                    backgroundColor: "transparent",
                    type: "pie",
                    colorSet:  "customColorSet1",
                    indexLabelFontSize: 14,
                    indexLabelFontWeight: "bold",
                    startAngle:0,
                    indexLabelFontColor: "MistyRose",       
                    indexLabelLineColor: "darkgrey", 
                    indexLabelPlacement: "inside", 
                    toolTipContent: "{name}: {y}g",
                    showInLegend: false,
                    indexLabel: "#percent%", 
                    dataPoints: [
                        {  y: <?php echo $caloties_from_carb; ?>, name: "Carbs",color:"#0067b5"},
                        {  y: <?php echo $caloties_from_protein; ?>, name: "Protein",color:"#b70000"},
                        {  y: <?php echo $caloties_from_fat; ?>, name: "Fats",color:"#7bc917"}
                        
                    ]
                }
                ]
            });

            var chart3 = new CanvasJS.Chart("chartContainer3",
            {
                
                animationEnabled: true,
                data: [
                {        
                    type: "pie",    
                    indexLabelFontSize: 14,
                    indexLabelFontWeight: "bold",
                    colorSet: "greenShades",
                    startAngle:0,
                    indexLabelFontColor: "MistyRose",       
                    indexLabelLineColor: "darkgrey", 
                    indexLabelPlacement: "inside", 
                    toolTipContent: "{name}: {y}g",
                    showInLegend: false,
                    indexLabel: "#percent%", 
                    dataPoints: [
                        {  y: <?php echo $chart_carb; ?>, name: "Carbs",color:"#0067b5",},
                        {  y: <?php echo $chart_protein; ?>, name: "Protein",color:"#b70000",},
                        {  y: <?php echo $chart_fat; ?>, name: "Fats",color:"#7bc917"}
                    ]
                }
                ]
            });
            chart.render();
            chart2.render();
            chart3.render();
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
