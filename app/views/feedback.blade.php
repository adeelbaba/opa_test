<?php $userrec = Auth::user();
        $user_id = $userrec['username'];
        $disp = !(!isset($user_id) || $user_id == '');
        
        $htmlRating = View::make('rating')->render();
        $htmlRating = str_replace(">", "&gt;", $htmlRating);
        $htmlRating = str_replace("<", "&lt;", $htmlRating);
        $htmlRating = preg_replace( "/\r|\n/", "", $htmlRating );
       //echo "html starts";
        //echo $htmlRating;
       // echo "html ends";
        //exit();
        if ( $disp) { 
        ?>
<link href="{{{ asset('bootstrap/css/jquery.feedBackBox.css') }}}" rel="stylesheet" type="text/css">
   
    <script>var id_post = '<?php echo $_SERVER['REQUEST_URI']; ?>'; </script>
    <script src="{{{ asset('bootstrap/js/jquery.feedBackBox.js') }}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
		defaultOptions ={ 
                    userName: '<?php echo $user_id; ?>',
                    message: '',
                    ajaxUrl: '/feedback/ajax.php'
		};
            $('#test-feedback').feedBackBox(defaultOptions, "<?php echo $htmlRating; ?>");});
    </script>
    <div id="test-feedback">
    </div>
    
        <?php } ?>