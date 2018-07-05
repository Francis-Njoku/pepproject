<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/Dashboard_model','dashboard');
        $this->load->helper('url');
    }

    public function index2()
    {
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'/login/');
        }
        /*front page*/
        $data['pending_work'] = $this->dashboard->pending_work(); //get referral data
        $data['done_work'] = $this->dashboard->done_work(); //get referral data
        $data['declined_work'] = $this->dashboard->declined_work(); //get referral data
        $data['jobs_reported'] = $this->dashboard->jobs_reported(); //get referral data
        $data['retrieve_user'] = $this->dashboard->retrieve_user(); //get referral data

         $this->load->view('user/header4');
        // $this->load->view('login/index', $data);
        $this->load->view('user/user_index', $data);

        // $this->load->view('login/footer');

}
    public function index()
    {
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'/login/');
        }
        $data['retrieve_user'] = $this->dashboard->retrieve_user(); //get referral data
        $data['retrieve_kyc'] = $this->dashboard->retrieve_kyc(); //get referral data

        /* wallet summary
       $data['total_sent_xpep'] = $this->dashboard->total_sent_xpep(); //get referral data
        $data['total_escrow_xpep'] = $this->dashboard->total_escrow_xpep(); //get referral data
        $data['total_received_steem'] = $this->dashboard->total_received_steem(); //get referral data
        $data['total_sent_steem'] = $this->dashboard->total_sent_steem(); //get referral data
        $data['total_escrow_steem'] = $this->dashboard->total_escrow_steem(); //get referral data

        /* end wallet summary */
        $data['count_airdrop'] = $this->dashboard->count_airdrop(); //get referral data

        foreach($data['retrieve_user'] as $retrieve_user)
        {
            $phone = $retrieve_user['phone'];
            $first_name = $retrieve_user['first_name'];
            $last_name = $retrieve_user['last_name'];
            $active = $retrieve_user['active'];
        }
        if($phone != '')
        {
            $cell1a = 3;
        }
        else{
            $cell1a = 0;
        }
        if($first_name != '')
        {
            $cell1b = 3;
        }
        else{
            $cell1b = 0;
        }
        if($active != '')
        {
            $cell1c = 1;
        }
        else{
            $cell1c = 0;
        }
        if($last_name != '')
        {
            $cell1d = 3;
        }
        else{
            $cell1d = 0;
        }
        $data['cell1'] = $cell1a + $cell1b + $cell1c + $cell1d;

        foreach($data['retrieve_kyc'] as $retrieve_kyc)
        {
            $address = $retrieve_kyc['address'];
            $idcard = $retrieve_kyc['idCard'];
            $picture = $retrieve_kyc['picture'];
            $id_status = $retrieve_kyc['status'];
        }
        if($address != '')
        {
            $cell2a = 2;
        }
        else{
            $cell2a = 0;
        }
        if($idcard != '')
        {
            $cell2b = 2;
        }
        else{
            $cell2b = 0;
        }
        if($picture != '')
        {
            $cell2c = 2;
        }
        else{
            $cell2c = 0;
        }
        if($id_status != '')
        {
            $cell2d = 4;
        }
        else{
            $cell2d = 0;
        }
        $data['cell2'] = $cell2a + $cell2b + $cell2c + $cell2d;

        $data['total_credit_pep'] = $this->dashboard->total_credit_pep(); //get referral data
        $data['total_debit_pep'] = $this->dashboard->total_debit_pep(); //get referral data
        $data['total_credit_xpep'] = $this->dashboard->total_credit_xpep(); //get referral data
        $data['total_debit_xpep'] = $this->dashboard->total_debit_xpep(); //get referral data


        $this->load->view('user/header3');
        // $this->load->view('login/index', $data);
        $this->load->view('user/user_index2', $data);

         $this->load->view('user/footer');

    }
    public function pep()
    {
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'/login/');
        }
        $data['ico'] = $this->dashboard->ico(); //get referral data
        $data['currency'] = $this->dashboard->currency(); //get referral data
        $data['retrieve_user'] = $this->dashboard->retrieve_user(); //get referral data
        $data['retrieve_kyc'] = $this->dashboard->retrieve_kyc(); //get referral data


        /* wallet summary
       $data['total_sent_xpep'] = $this->dashboard->total_sent_xpep(); //get referral data
        $data['total_escrow_xpep'] = $this->dashboard->total_escrow_xpep(); //get referral data
        $data['total_received_steem'] = $this->dashboard->total_received_steem(); //get referral data
        $data['total_sent_steem'] = $this->dashboard->total_sent_steem(); //get referral data
        $data['total_escrow_steem'] = $this->dashboard->total_escrow_steem(); //get referral data

        /* end wallet summary */
        $data['count_airdrop'] = $this->dashboard->count_airdrop(); //get referral data

        foreach($data['retrieve_user'] as $retrieve_user)
        {
            $phone = $retrieve_user['phone'];
            $first_name = $retrieve_user['first_name'];
            $last_name = $retrieve_user['last_name'];
            $active = $retrieve_user['active'];
        }
        if($phone != '')
        {
            $cell1a = 3;
        }
        else{
            $cell1a = 0;
        }
        if($first_name != '')
        {
            $cell1b = 3;
        }
        else{
            $cell1b = 0;
        }
        if($active != '')
        {
            $cell1c = 1;
        }
        else{
            $cell1c = 0;
        }
        if($last_name != '')
        {
            $cell1d = 3;
        }
        else{
            $cell1d = 0;
        }
        $data['cell1'] = $cell1a + $cell1b + $cell1c + $cell1d;
        $data['pep_wallet'] = $this->dashboard->pep_wallet(); //get referral data
        $data['total_credit_pep'] = $this->dashboard->total_credit_pep(); //get referral data
        $data['total_debit_pep'] = $this->dashboard->total_debit_pep(); //get referral data
        $data['currency_naira'] = $this->dashboard->currency_naira();
        $data['currency_steem'] = $this->dashboard->currency_steem();
        $data['currency_waves'] = $this->dashboard->currency_waves();
        $data['currency_litcoin'] = $this->dashboard->currency_litcoin();

        $this->load->view('user/header3');
        // $this->load->view('login/index', $data);
        $this->load->view('user/pep_wallet_view', $data);

        $this->load->view('user/footer3');

    }
    public function xpep()
    {
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'/login/');
        }
        $data['ico'] = $this->dashboard->ico(); //get referral data
        $data['currency'] = $this->dashboard->currency(); //get referral data
        $data['retrieve_user'] = $this->dashboard->retrieve_user(); //get referral data
        $data['retrieve_kyc'] = $this->dashboard->retrieve_kyc(); //get referral data
        $data['count_airdrop'] = $this->dashboard->count_airdrop(); //get referral data

        foreach($data['retrieve_user'] as $retrieve_user)
        {
            $phone = $retrieve_user['phone'];
            $first_name = $retrieve_user['first_name'];
            $last_name = $retrieve_user['last_name'];
            $active = $retrieve_user['active'];
        }
        if($phone != '')
        {
            $cell1a = 3;
        }
        else{
            $cell1a = 0;
        }
        if($first_name != '')
        {
            $cell1b = 3;
        }
        else{
            $cell1b = 0;
        }
        if($active != '')
        {
            $cell1c = 1;
        }
        else{
            $cell1c = 0;
        }
        if($last_name != '')
        {
            $cell1d = 3;
        }
        else{
            $cell1d = 0;
        }
        $data['cell1'] = $cell1a + $cell1b + $cell1c + $cell1d;
        $data['xpep_wallet'] = $this->dashboard->xpep_wallet(); //get referral data
        $data['currency_naira'] = $this->dashboard->currency_naira();
        $data['currency_steem'] = $this->dashboard->currency_steem();
        $data['currency_waves'] = $this->dashboard->currency_waves();
        $data['currency_litcoin'] = $this->dashboard->currency_litcoin();
        $data['total_credit_xpep'] = $this->dashboard->total_credit_xpep(); //get referral data
        $data['total_debit_xpep'] = $this->dashboard->total_debit_xpep(); //get referral data


        $this->load->view('user/header3');
        // $this->load->view('login/index', $data);
        $this->load->view('user/xpep_wallet_view', $data);

        $this->load->view('user/footer3');

    }

    public function waves()
    {
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'/login/');
        }
        $data['ico'] = $this->dashboard->ico(); //get referral data
        $data['currency'] = $this->dashboard->currency(); //get referral data
        $data['retrieve_user'] = $this->dashboard->retrieve_user(); //get referral data
        $data['retrieve_kyc'] = $this->dashboard->retrieve_kyc(); //get referral data
        $data['count_airdrop'] = $this->dashboard->count_airdrop(); //get referral data

        foreach($data['retrieve_user'] as $retrieve_user)
        {
            $phone = $retrieve_user['phone'];
            $first_name = $retrieve_user['first_name'];
            $last_name = $retrieve_user['last_name'];
            $active = $retrieve_user['active'];
        }
        if($phone != '')
        {
            $cell1a = 3;
        }
        else{
            $cell1a = 0;
        }
        if($first_name != '')
        {
            $cell1b = 3;
        }
        else{
            $cell1b = 0;
        }
        if($active != '')
        {
            $cell1c = 1;
        }
        else{
            $cell1c = 0;
        }
        if($last_name != '')
        {
            $cell1d = 3;
        }
        else{
            $cell1d = 0;
        }
        $data['cell1'] = $cell1a + $cell1b + $cell1c + $cell1d;
        $data['waves_wallet'] = $this->dashboard->waves_wallet(); //get referral data
        $data['currency_naira'] = $this->dashboard->currency_naira();
        $data['currency_steem'] = $this->dashboard->currency_steem();
        $data['currency_waves'] = $this->dashboard->currency_waves();
        $data['currency_litcoin'] = $this->dashboard->currency_litcoin();
        $data['total_credit_waves'] = $this->dashboard->total_credit_waves(); //get referral data
        $data['total_debit_waves'] = $this->dashboard->total_debit_waves(); //get referral data


        $this->load->view('user/header3');
        // $this->load->view('login/index', $data);
        $this->load->view('user/waves_wallet_view', $data);

        $this->load->view('user/footer3');

    }

    public function ethereum()
    {
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'/login/');
        }
        $data['ico'] = $this->dashboard->ico(); //get referral data
        $data['currency'] = $this->dashboard->currency(); //get referral data
        $data['retrieve_user'] = $this->dashboard->retrieve_user(); //get referral data
        $data['retrieve_kyc'] = $this->dashboard->retrieve_kyc(); //get referral data
        $data['count_airdrop'] = $this->dashboard->count_airdrop(); //get referral data

        foreach($data['retrieve_user'] as $retrieve_user)
        {
            $phone = $retrieve_user['phone'];
            $first_name = $retrieve_user['first_name'];
            $last_name = $retrieve_user['last_name'];
            $active = $retrieve_user['active'];
        }
        if($phone != '')
        {
            $cell1a = 3;
        }
        else{
            $cell1a = 0;
        }
        if($first_name != '')
        {
            $cell1b = 3;
        }
        else{
            $cell1b = 0;
        }
        if($active != '')
        {
            $cell1c = 1;
        }
        else{
            $cell1c = 0;
        }
        if($last_name != '')
        {
            $cell1d = 3;
        }
        else{
            $cell1d = 0;
        }
        $data['cell1'] = $cell1a + $cell1b + $cell1c + $cell1d;
        $data['ethereum_wallet'] = $this->dashboard->ethereum_wallet(); //get referral data
        $data['currency_naira'] = $this->dashboard->currency_naira();
        $data['currency_ethereum'] = $this->dashboard->currency_ethereum();
        $data['currency_waves'] = $this->dashboard->currency_waves();
        $data['currency_litcoin'] = $this->dashboard->currency_litcoin();
        $data['total_credit_ethereum'] = $this->dashboard->total_credit_ethereum(); //get referral data
        $data['total_debit_ethereum'] = $this->dashboard->total_debit_ethereum(); //get referral data


        $this->load->view('user/header3');
        // $this->load->view('login/index', $data);
        $this->load->view('user/ethereum_wallet_view', $data);

        $this->load->view('user/footer3');

    }

    public function bitcoin()
    {
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'/login/');
        }
        $data['ico'] = $this->dashboard->ico(); //get referral data
        $data['currency'] = $this->dashboard->currency(); //get referral data
        $data['retrieve_user'] = $this->dashboard->retrieve_user(); //get referral data
        $data['retrieve_kyc'] = $this->dashboard->retrieve_kyc(); //get referral data
        $data['count_airdrop'] = $this->dashboard->count_airdrop(); //get referral data

        foreach($data['retrieve_user'] as $retrieve_user)
        {
            $phone = $retrieve_user['phone'];
            $first_name = $retrieve_user['first_name'];
            $last_name = $retrieve_user['last_name'];
            $active = $retrieve_user['active'];
        }
        if($phone != '')
        {
            $cell1a = 3;
        }
        else{
            $cell1a = 0;
        }
        if($first_name != '')
        {
            $cell1b = 3;
        }
        else{
            $cell1b = 0;
        }
        if($active != '')
        {
            $cell1c = 1;
        }
        else{
            $cell1c = 0;
        }
        if($last_name != '')
        {
            $cell1d = 3;
        }
        else{
            $cell1d = 0;
        }
        $data['cell1'] = $cell1a + $cell1b + $cell1c + $cell1d;
        $data['bitcoin_wallet'] = $this->dashboard->bitcoin_wallet(); //get referral data
        $data['currency_naira'] = $this->dashboard->currency_naira();
        $data['currency_ethereum'] = $this->dashboard->currency_ethereum();
        $data['currency_waves'] = $this->dashboard->currency_waves();
        $data['currency_bitcoin'] = $this->dashboard->currency_bitcoin();
        $data['total_credit_bitcoin'] = $this->dashboard->total_credit_bitcoin(); //get referral data
        $data['total_debit_bitcoin'] = $this->dashboard->total_debit_bitcoin(); //get referral data


        $this->load->view('user/header3');
        // $this->load->view('login/index', $data);
        $this->load->view('user/bitcoin_wallet_view', $data);

        $this->load->view('user/footer3');

    }
}
