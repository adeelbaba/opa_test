<?php
class FeedbackRatingController extends BaseController {
    
     public function getFeedback(){
 
            return View::make('feedback');
        }
        
        
      public function postFeedback(){
          
          $formparams = Input::all;
          
           $ip = $_SERVER["REMOTE_ADDR"];
    	   $username = $formparams['username'];
    	   $feedback = $formparams['message'];
	   $thepost = $formparams['id_post'];
           Log::info('formparams = ' . $formparams);
           DB::table('wcd_feedback')->insert(['username' => $username, 'id_post' => $thepost, 'feedback' => $feedback, 'ip' => $ip]);
           return View::make('feedback');
        }  
        
 
        public function getRating(){
            Log::info('getRating::data starts ');
            $data = DB::table('wcd_rate')->select()->where('id_post', $_SERVER['REQUEST_URI'])->take(1);
            Log::info('getRating::data = '. Response::json($data[0]));
            return View::make('rating')->with('data', Response::json($data[0]));
        }
        
        public function postRating(){
 
            return View::make('rating');
        }  
}
?>