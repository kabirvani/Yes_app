<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CompanyDetails;
use App\ContactDetails;
use App\User;
use Illuminate\Support\Facades\DB;
use App\WS_Curl_Class;
use Salaros\Vtiger\VTWSCLib\WSClient;

class CompanyDetailsController extends Controller
{
    //
    private $billstreet, $billstate, $billcountry, $billcity, $billcode, $shipstreet, $shipstate, $shipcountry, $shipcode, $shipcity;

    public function save_company_detail(Request $request){
        
        DB::table('company_details')->where('email', $request['email'])->update(
            [
                
                'reg_num'                   => $request['reg_num'],
                'company_type'              => $request['company_type'],
                'industry'                  => $request['industry'],
                'tel_num'                   => $request['tel_num'],
                'country_code'              => $request['country_code'],
                'website_address'           => $request['website_address'],
                'financial_year_end'        => $request['financial_year_end'],
                'vat_num'                   => $request['vat_num'],
                'beee_level'                => $request['beee_level'],
                'beee_certificate'          => $request['beee_certificate'],
                'physical_address_line1'    => $request['physical_address_line1'],
                'physical_address_line2'    => $request['physical_address_line2'],
                'physical_city'             => $request['physical_city'],
                'physical_state'            => $request['physical_state'],
                'physical_zip_code'         => $request['physical_zip_code'],
                'physical_country'          => $request['physical_country'],
                'postal_address_line1'      => $request['postal_address_line1'],
                'postal_address_line2'      => $request['postal_address_line2'],
                'postal_city'               => $request['postal_city'],
                'postal_state'              => $request['postal_state'],
                'postal_zip_code'           => $request['postal_zip_code'],
                'postal_country'            => $request['postal_country'],
            ]
        );

        return view('/home');
    }

    public function save_contact_detail(Request $request){
        DB::table('contact_details')->where('email', $request['email'])->update(
            [ 
                'primary_first_name'          => $request['primary_first_name'],
                'primary_last_name'           => $request['primary_last_name'],
                'primary_country_code'        => $request['primary_country_code'],
                'primary_phone_num'           => $request['primary_phone'],
                'account_email'               => $request['account_email'],
                'account_first_name'          => $request['account_first_name'],
                'account_last_name'           => $request['account_last_name'],
                'account_country_code'        => $request['account_country_code'],
                'account_phone_num'           => $request['account_phone']
            ]
        );
        return view('/contact_details');
    }

    public function show_contact_detail(Request $request){
        DB::table('company_details')->where('email', $request['email'])->update(
            [
                
                'reg_num'                   => $request['reg_num'],
                'company_type'              => $request['company_type'],
                'industry'                  => $request['industry'],
                'tel_num'                   => $request['tel_num'],
                'country_code'              => $request['country_code'],
                'website_address'           => $request['website_address'],
                'financial_year_end'        => $request['financial_year_end'],
                'vat_num'                   => $request['vat_num'],
                'beee_level'                => $request['beee_level'],
                'beee_certificate'          => $request['beee_certificate'],
                'physical_address_line1'    => $request['physical_address_line1'],
                'physical_address_line2'    => $request['physical_address_line2'],
                'physical_city'             => $request['physical_city'],
                'physical_state'            => $request['physical_state'],
                'physical_zip_code'         => $request['physical_zip_code'],
                'physical_country'          => $request['physical_country'],
                'postal_address_line1'      => $request['postal_address_line1'],
                'postal_address_line2'      => $request['postal_address_line2'],
                'postal_city'               => $request['postal_city'],
                'postal_state'              => $request['postal_state'],
                'postal_zip_code'           => $request['postal_zip_code'],
                'postal_country'            => $request['postal_country'],
            ]
        );
        $this->billstreet = $request['physical_address_line1'].$request['physical_address_line2'];
        $this->billcity = $request['physical_city'];
        $this->billstate = $request['physical_state'];
        $this->billcode = $request['physical_zip_code'];
        $this->billcountry = $request['physical_country'];
        $this->shipstreet = $request['postal_address_line1'].$request['postal_address_line2'];
        $this->shipcity = $request['postal_city'];
        $this->shipstate = $request['postal_state'];
        $this->shipcode = $request['postal_zip_code'];
        $this->shipcountry = $request['postal_country'];

        $client = new WSClient(env('serveraddress') . "/webservice.php", env('crm_username'), env('crm_useraccesskey'));
        $create_supervisor = array(
            'accountname'               => $request['name'],
            'email1'                    => $request['email'],
            'cf_878'                    => $request['reg_num'],
            'cf_896'                    => $request['company_type'],
            'cf_898'                    => $request['industry'],
            'phone'                     => $request['country_code'].$request['tel_num'],
            'website'                   => $request['website_address'],
            'cf_900'                    => $request['financial_year_end'],
            'cf_1164'                   => $request['vat_num'],
            'cf_930'                    => $request['beee_level'],
            'assigned_user_id'          => '19x1',
            'bill_street'               => $this->billstreet,
            'bill_city'                 => $this->billcity,
            'bill_state'                => $this->billstate,
            'bill_code'                 => $this->billcode,
            'bill_country'              => $this->billcountry,
            'ship_street'               => $this->shipstreet,
            'ship_city'                 => $this->shipcity,
            'ship_state'                => $this->shipstate,
            'ship_zip_code'             => $this->shipcode,
            'ship_country'              => $this->shipcountry,
        );

        $data = array(
            'cf_1326'                   => $request['id'],
        );
        $id = $client->entities->getID('Accounts', $data);
        $id = explode("x", $id);
        $id = $id[1];
        $client->entities->updateOne('Accounts', $id, $create_supervisor);

        return view('contact_details');
    }

    public function show_my_commitment(Request $request){
        DB::table('contact_details')->where('email', $request['email'])->update(
            [ 
                'primary_first_name'          => $request['primary_first_name'],
                'primary_last_name'           => $request['primary_last_name'],
                'primary_country_code'        => $request['primary_country_code'],
                'primary_phone_num'           => $request['primary_phone'],
                'account_email'               => $request['account_email'],
                'account_first_name'          => $request['account_first_name'],
                'account_last_name'           => $request['account_last_name'],
                'account_country_code'        => $request['account_country_code'],
                'account_phone_num'           => $request['account_phone']
            ]
        );
        $client = new WSClient(env('serveraddress') . "/webservice.php", env('crm_username'), env('crm_useraccesskey'));        
        $create_supervisor = array(
            'firstname'               => $request['primary_first_name'],
            'lastname'                => $request['primary_last_name'],
            'mobile'                  => $request['primary_phone'],
            'otherphone'              => $request['account_phone'],
            'email'                   => $request['email'],
            'secondaryemail'          => $request['account_email'],
            'mailingstreet'           => $this->billstreet,
            'mailingcity'             => $this->billcity,
            'assigned_user_id'        => '19x1',
            'mailingzip'              => $this->billcode,
            'cf_882'                  => $this->billstate,
            'mailingcountry'          => $this->billcountry,
            'otherstreet'             => $this->shipstreet,
            'othercity'               => $this->shipcity,
            'otherzip'                => $this->shipcode,
            'cf_884'                  => $this->shipstate,
            'othercountry'            => $this->shipcountry,
        );
        $data = array(
            'cf_1338'                   => $request['id'],
        );
        
        $id = $client->entities->getID('Contacts', $data);
        $id = explode("x", $id);
        $id = $id[1];
        
        $client->entities->updateOne('Contacts', $id, $create_supervisor);

        return view('my_commitment');
    }

    public function show_submit_payment(Request $request){
        $user['youth'] = $request['youth'];
        $user['regFee'] = $request['regFee'];
        $data['user'] = $user;
        return view('submit_payment', $data);
    }
    public function send_pledge(){
        
    }

    public function download_invoice(Request $request){
        $result = $this->confirmPledge($request);
        
        $sendgrid_api_key = env('SENDGRID_API_KEY');
        $from_addres = env('MAIL_FROM_ADDRESS');
        $from_name = env('MAIL_FROM_NAME');
        $email = $request->input('email');
        $name = $request->input('name');
        $youth = $request->input('youth');
        $regFee = $request->input('regFee');
        $invoiceUrl = $request->input('invoiceUrl');
        $supportUrl = $request->input('supportUrl');
        $ch = curl_init();
        $vars = '{
            "from":{
                "email":"'.$from_addres.'",'.
                '"name":"'.$from_name.'"'.
            '},
            "personalizations":[
                {
                    "to":[
                        {
                        "email":"'.$email.'"'.
                        '}
                    ],
                    "dynamic_template_data":{
                        "name": "'.$name.'",'.
                        '"youth": "'.$youth.'",'.
                        '"regFee": "'.$regFee.'",'.
                        '"invoiceUrl": "'.$result['invoice'][0].'",'.
                        '"supportUrl": "'.$supportUrl.'",'.
                        '"year": "2019",
                        "profile_type": "company"
                    }
                }
            ],
            "template_id":"d-b34c7eb8f60c4f26aa358a285e762bbb"
            }';
        curl_setopt($ch, CURLOPT_URL,"https://api.sendgrid.com/v3/mail/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Authorization: Bearer '.$sendgrid_api_key,
            'Content-Type: application/json',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        // $result = $this->getvTigerSalesOrderID();
        
    }
    public function back_company_detail(){
        return view('home');
    }
    public function back_contact_detail(){
        return view('contact_details');
    }

    public function getvTigerSalesOrderID() {
        $user = User::find(Auth::user()->id);
        $client = new WSClient(env('serveraddress') . "/webservice.php", env('crm_username'), env('crm_useraccesskey'));        
        $salesorder_no = $user->company_detail->salesorder_no;

		if($salesorder_no==""){
			$data = array(
				'cf_1326' => Auth::user()->id,
			);

			$vTigerUserID = $client->entities->getID('Accounts', $data);

			$data = array(
					'account_id' => $vTigerUserID,
				);

			$vTigerSalesOrderIDs = $client->entities->findMany('SalesOrder', $data);
			if(!empty($vTigerSalesOrderIDs)){
				$vTigerSalesOrderID = end($vTigerSalesOrderIDs);
			
				if($vTigerSalesOrderID != ''){
					
					if($salesorder_no!=$vTigerSalesOrderID['salesorder_no']){
						$company_details = CompanyDetails::find(Auth::user()->company_detail->id);
                        $company_details->salesorder_no = $vTigerSalesOrderID['salesorder_no'];
						$company_details->save();
					}
					$salesOrderID = $vTigerSalesOrderID['id'];
					$salesID = $salesOrderID;
				}
				else {                
					$salesOrderID = $vTigerUserID;                
					$salesID = '';
				}			
			}else {
				$salesOrderID = $vTigerUserID;
				$salesID = '';
			}
			$vTigerSalesOrderID_getpdf = explode("x", $salesOrderID);
			$getvTigerSalesOrderID =  $vTigerSalesOrderID_getpdf[1];
			
			$invoice_number = $user->company_detail->invoice_number;
			$vTigerInvoiceOrderIDs = $client->entities->findMany('Invoice', $data);
			
			if(!empty($vTigerInvoiceOrderIDs)){
				$vTigerInvoiceOrderID = end($vTigerInvoiceOrderIDs);			
				if($vTigerInvoiceOrderID != ''){
					
					if($invoice_number!=$vTigerInvoiceOrderID['invoice_no']){
						$company_details = CompanyDetails::find(Auth::user()->company_detail->id);
						$company_details->invoice_number = $vTigerInvoiceOrderID['id'];
						$company_details->save();
					}
					$invoiceOrderID = $vTigerInvoiceOrderID['id'];
					$invoiceID = $invoiceOrderID;
				}
				else {                
					$invoiceOrderID = $vTigerUserID;                
					$invoiceID = '';
				}	
			}else{
				$invoiceOrderID = $vTigerUserID;
				$invoiceID = '';
			}
			
			$vTigerInvoiceOrderID_getpdf = explode("x", $invoiceOrderID);
			$getvTigerInvoiceOrderID =  $vTigerInvoiceOrderID_getpdf[1];
			
			
			return array("getvTigerSalesOrderID"=> $getvTigerSalesOrderID,'salesID'=>$salesID,'getvTigerInvoiceOrderID'=>$getvTigerInvoiceOrderID,'invoiceID'=>$invoiceID);
			
		}else{
			return array("getvTigerSalesOrderID"=> "",'salesID'=>"",'getvTigerInvoiceOrderID'=>"",'invoiceID'=>"");
		}
    }
    public function confirmPledge(Request $request) {
            $user = User::find(Auth::user()->id);
            $business = CompanyDetails::find(Auth::user()->company_detail->id);
            
            $business->commit_confirm = 1;
            $business->save();
            
            $client = new WSClient(env('serveraddress') . "/webservice.php", env('crm_username'), env('crm_useraccesskey'));
            
            $data = array(
                'cf_1326' => Auth::user()->id,
            );

            $vTigerUserID = $client->entities->getID('Accounts', $data);
            $id = explode("x", $vTigerUserID);
            $BMSUserid = $id[1];
            
            $registrationFee = $request->input('regFee');
            
            $update = array(
                'cf_1334' => 'Awaiting Pledge and Payment', 
            );
    
            $client->entities->updateOne('Accounts', $vTigerUserID, $update);
            
            if(strtolower($registrationFee)!='free'){				
                $bill_address = $business->physical_address_line1.' '.$business->physical_address_line2.' '.$business->physical_city.' '.$business->physical_state.' '.$business->physical_zip_code.' '. $business->physical_country;

                $ship_address = $business->postal_address_line1.' '.$business->postal_address_line2.' '.$business->postal_city.' '.$business->postal_state.' '.$business->postal_zip_code.' '. $business->postal_country;

                $data = array(
                    'subject' => 'Registration Proforma Invoice',
                    'sostatus' => 'Created',
                    'account_id' => $vTigerUserID,
                    'assigned_user_id' => '19x1',
                    'productid' => '26x110194',
                    'invoicestatus' => 'Created',
                    'bill_street' => $bill_address,
                    'ship_street' => $ship_address,
                    'hdnTaxType' => 'Group',
                    'duedate' => date("Y-m-d"),
                    'currency_id' => '21x1',
                    'vtiger_purchaseorder' => $business->po_number
                );
                $lineItems[] = array('productid' => '26x110194',
                                     'quantity' => 1,
                                     'tax1' => 15,
                                     'listprice' => ltrim(str_replace(',', '',$registrationFee), 'R'));
                
                $data['LineItems'] = $lineItems;
                // if(!empty($request->salesorderno)){
                    // $salesOrder = $client->entities->findOne('SalesOrder', array('id' => $request->salesorderno), array('id','salesorder_no'));
                // }else{
                $salesOrder = $client->entities->createOne('SalesOrder', $data);
                // }
                
                $vTigerSalesOrderID = $salesOrder['id'];
                $invoiceData = array(
                    'salesorder_id' => $vTigerSalesOrderID,
                    'subject' => 'YES Registration Fee - Tax Invoice',                
                    'account_id' => $vTigerUserID,
                    'assigned_user_id' => '19x1',
                    'productid' => '26x110194',
                    'invoicestatus' => 'Created',
                    'bill_street' => $bill_address,
                    'ship_street' => $ship_address,
                    'hdnTaxType' => 'Group',
                    'duedate' => date("Y-m-d"),
                    'currency_id' => '21x1',
                    'vtiger_purchaseorder' => $business->po_number,
                    'invoicedate' => \Carbon\Carbon::now()->format('d-m-Y')
                );
                
    
                $invoiceLineItems[] = array('productid' => '26x110194',
                                     'quantity' => 1,
                                     'tax1' => 15,
                                     'listprice' => ltrim(str_replace(',', '', $registrationFee), 'R'));
    
                $invoiceData['LineItems'] = $invoiceLineItems;
                // if(!empty($request->invoiceorderno)){
                //     $data = array(
                //             'id' => $request->invoiceorderno
                //         );
                //     $invoice = $vTiger = $client->entities->findOne('Invoice', $data,array('id','invoice_no'));
                // }else{
                    $invoice = $client->entities->createOne('Invoice', $invoiceData);
                // }		
                
                $invoiceId = $invoice['id'];
                $invoicePDFId = explode("x",$invoiceId);
                
                $vTigerSalesOrderID_getpdf = explode("x", $vTigerSalesOrderID);
    
                
                // $business = Business::find(Auth::user()->business->id);
                $business = CompanyDetails::find(Auth::user()->company_detail->id);
    
                $business->salesorder_no = $salesOrder['salesorder_no']; 
                $business->invoice_number = $invoice['invoice_no'];
                $business->save();
    
                return array(
                    'sales_order' => array(
                        env('APP_VTIGER_URL', 'https://bmsuat.yes4youth.co.za') . '/getpdf.php?id=' . $vTigerSalesOrderID_getpdf[1] . '&currentModule=SalesOrder', 
                        $salesOrder['salesorder_no'],
                        $vTigerSalesOrderID
                    ),
                    'invoice' => array(
                        env('APP_VTIGER_URL', 'https://bmsuat.yes4youth.co.za') . '/getpdf.php?id=' . $invoicePDFId[1] . '&currentModule=Invoice',
                        $invoiceId
                    )
                );
            }else{
                $business->payment_confirm = 1;
                $business->save();
    
                $update = array(
                    'cf_1334' => 'Confirming',
                );
    
                $updted = $client->entities->updateOne('Accounts', $BMSUserid, $update);
                        
                
                return array(
                    'sales_order' => array(),    
                    'invoice' => array(),
                    'updated' => $updted
                );
            }
        }
}

