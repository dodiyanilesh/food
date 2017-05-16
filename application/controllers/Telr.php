<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telr extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE)
        {
            redirect('login');
        }
        $this->load->model('Country_code');
        $this->load->model('Profile');
        $this->load->model('User');
    }
	public function index()
	{
        $ivp_method = $this->input->post('ivp_method');
		$ivp_store = $this->input->post('ivp_store');
		$ivp_authkey = $this->input->post('ivp_authkey');
		$ivp_amount = $this->input->post('ivp_amount');
		$ivp_currency = $this->input->post('ivp_currency');
		$ivp_test = $this->input->post('ivp_test');
		$ivp_cart = rand('123456','999999');
		$ivp_desc = $this->input->post('ivp_desc');
		$return_auth = $this->input->post('return_auth');
		$return_decl = $this->input->post('return_decl');
		$return_can = $this->input->post('return_can');
		$this->session->set_userdata('amount', $ivp_amount);
		$data = array(
			'ivp_method'  => $ivp_method,
			'ivp_store'   => $ivp_store,
			'ivp_authkey' => $ivp_authkey,
			'ivp_cart'    => $ivp_cart,
			'ivp_tranclass'  => 'cont',
			'ivp_test'    => $ivp_test,
			'ivp_amount'  => $ivp_amount,
			'ivp_currency'=> $ivp_currency,
			'ivp_desc'    => $ivp_desc,
			'return_auth' => $return_auth,
			'return_can'  => $return_can,
			'return_decl' => $return_decl
		);
        
        $url = 'https://secure.telr.com/gateway/order.json';
		
		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if ($result === FALSE) { /* Handle error */ }
		
		$result = json_decode($result,true);
		$ref = trim($result['order']['ref']);
        $this->session->set_userdata('ref', $ref);
		$this->session->set_userdata('cart', $ivp_cart);
		$url = trim($result['order']['url']);
		redirect($url);
	}
    
    public function success()
    {
        $data = array(
                    'ivp_method'	=> "check",
                    'ivp_store'	=> '18194' ,
                    'order_ref'	=> $this->session->userdata('ref'),
                    'ivp_authkey'	=> 'qsSt^bfbXX@fk7p8',
				);
        
        $url = 'https://secure.telr.com/gateway/order.json';
        // use key 'http' even if you send the request to https://...
        $options = array(
                        'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data)
                    )
            );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $result = json_decode($result,true);
        $user_id = $this->session->userdata('user_id');
        $trace_id = $result['trace'];
        $order_ref = $result['order']['ref'];
        $cart_id = $result['order']['cartid'];
        $amount = $result['order']['amount'];
        $currency = $result['order']['currency'];
        $plan_name = $result['order']['description'];
        $status = $result['order']['status']['text'];
        $trans_ref = $result['order']['transaction']['ref'];
        $message = $result['order']['transaction']['message'];
        $payment_method = $result['order']['paymethod'];
        $card_type = $result['order']['card']['type'];
        $email = $result['order']['customer']['email'];
        $name = $result['order']['customer']['name']['forenames'].' '.$result['order']['customer']['name']['surname'];
        $address = $result['order']['customer']['address']['line1'].', '.$result['order']['customer']['address']['line2'].', '.$result['order']['customer']['address']['city'].', '.$result['order']['customer']['address']['state'];
        $country = $result['order']['customer']['address']['country'];
        $areacode = $result['order']['customer']['address']['areacode'];
        
        if($amount == "18.99"){
            $membership_expired = date('Y-m-d H:i:s', strtotime('+1 months', time()));
        }else if($amount == "47.97"){
            $membership_expired = date('Y-m-d H:i:s', strtotime('+3 months', time()));
        }else if($amount == "89.94"){
            $membership_expired = date('Y-m-d H:i:s', strtotime('+6 months', time()));
        }else if($amount == "167.88"){
            $membership_expired = date('Y-m-d H:i:s', strtotime('+12 months', time()));
        }
        $created_at = date('Y-m-d H:i:s');
        $ip_address = $this->input->ip_address();
        
        $data = array(
                    'user_id' => $user_id,
                    'trace_id' => $trace_id,
                    'order_ref' => $order_ref,
                    'cart_id' => $cart_id,
                    'amount' => $amount,
                    'currency' => $currency,
                    'plan_name' => $plan_name,
                    'status' => $status,
                    'trans_ref' => $trans_ref,
                    'message' => $message,
                    'payment_method' => $payment_method,
                    'card_type' => $card_type,
                    'email' => $email,
                    'full_name' => $name,
                    'address' => $address,
                    'country' => $country,
                    'areacode' => $areacode,
                    'membership_expired' => $membership_expired,
                    'created_at' => $created_at,
                    'ip_address' => $ip_address
                );
        
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('membership');
        if($query->num_rows() > 0)
        {
            $row = $query->row();
            $this->db->where('id',$row->id);
            if($this->db->update('membership', $data))
            {
                if($status == 'Authorised'){
                    redirect('membership');
                }
            }else{
                echo '<h1>Something error please try again!</h1>';
            }
        }else{
            if($this->db->insert('membership', $data))
            {
                if($status == 'Authorised'){
                    redirect('membership');
                }
            }else{
                echo '<h1>Something error please try again!</h1>';
            }
        }
        //echo 'Your Payment is Successful';
    }
    
    public function cancel()
    {
        echo 'cancel by you';
    }
}