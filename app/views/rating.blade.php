<div id='ratingplugin'>       
    <link type='text/css' rel='stylesheet' href='{{{ asset('bootstrap/css/exampleRating.css') }}}' />
    <?php  
        $post_id = '1'; 
	$userrec = Auth::user();
        $user_id = $userrec['username'];
        $disp = !(!isset($user_id) || $user_id == '');
    ?>  
   <?php if ( $disp) { ?>
    <div class='rate-board'>
        <div class='rate-ex3-cnt'>
			<p>How would you rate this Dashboard?</p>
            <div id='1' class='rate-btn-1 rate-btn'></div>
            <div id='2' class='rate-btn-2 rate-btn'></div>
            <div id='3' class='rate-btn-3 rate-btn'></div>
            <div id='4' class='rate-btn-4 rate-btn'></div>
            <div id='5' class='rate-btn-5 rate-btn'></div>
        </div>
        <?php
                $data1 = DB::table('wcd_rate')->select('rate')->where('id_post', $_SERVER['REQUEST_URI'])->take(1)->get();
                $rate_times[] = array();
                $sum_rates[] = array();
                $rate_bg = 0;
                $rate_time = 0;
                $sum_rate = 0;
                $rate_value = 0;
                foreach($data1 as $datum) {
                    $rate_db[] = $datum;
                    $sum_rates[] = $datum->rate;
                    if(@count($rate_db)){
                        $rate_time = count($rate_db);
                        $sum_rate = array_sum($sum_rates);
                        $rate_value = $sum_rate/$rate_time;
                        $rate_bg = (($rate_value)/5)*100;
                    }else{
                        $rate_times = 0;
                        $rate_value = 0;
                        $rate_bg = 0;
                    }
                }
            ?>
        <?php if (Auth::user()->hasRole('admin'))   { ?>
        <font size='2' style='align: left !important;'><?php echo $rate_time; ?> times: <strong><?php echo $rate_value; ?></strong> avg.</font>
        <div>
            <div class='rate-result-cnt'>
                <div class='rate-bg' style='width:<?php echo $rate_bg; ?>%'></div>
                <div class='rate-stars'></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <script>
        
        $(document).ready(function(){ 
            $('.rate-btn').hover(function(){
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });
                            
            $('.rate-btn').click(function(){    
                var therate = $(this).attr('id');
                var dataRate = 'act=rate&post_id=<?php echo $_SERVER['REQUEST_URI']; ?>&rate='+ therate + '&user_id=<?php echo $user_id; ?>';
                $('.rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-active');
                };
                $.ajax({
                    type : 'POST',
                    url : '/rating/ajax.php',
                    data: dataRate,
                    success:function(){}
                });
                
            });
        });
    </script>
    <?php } ?>
</div>