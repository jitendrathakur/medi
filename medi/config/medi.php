<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['theme']			= 'oms';

// SSL support
$config['ssl_support']		= false;

// Business information
$config['company_name']		= '';
$config['address1']			= '';
$config['address2']			= '';
$config['country']			= ''; // use proper country codes only
$config['city']				= ''; 
$config['state']			= '';
$config['zip']				= '';
$config['email']			= '';

// Store currency
$config['currency']						= 'INR';  // USD, EUR, etc
$config['currency_symbol']				= 'INR ';
$config['currency_symbol_side']			= 'left'; // anything that is not "left" is automatically right
$config['currency_decimal']				= '.';
$config['currency_thousands_separator']	= ',';

// Shipping config units
$config['weight_unit']	    = 'LB'; // LB, KG, etc
$config['dimension_unit']   = 'IN'; // FT, CM, etc

// site logo path (for packing slip)
$config['site_logo']		= '/assets/img/logo.png';

//change the name of the admin controller folder 
$config['admin_folder']		= '';

//file upload size limit
$config['size_limit']		= intval(ini_get('upload_max_filesize'))*1024;

//are new registrations automatically approved (true/false)
$config['new_customer_status']	= true;

//are new registrations automatically approved (true/false)
$config['new_event_register_status']	= false;

//do we require customers to log in 
$config['require_login']		= false;

//default order status
$config['order_status']			= 'Pending';

// default Status for non-shippable orders (downloads)
$config['nonship_status'] = 'Delivered';

$config['order_statuses']	= array(
	'Pending'  				=> 'Pending',
	'Processing'    		=> 'Processing',
	'Shipped'				=> 'Shipped',
	'On Hold'				=> 'On Hold',
	'Cancelled'				=> 'Cancelled',
	'Delivered'				=> 'Delivered'
);

// enable inventory control ?
$config['inventory_enabled']	= true;

// allow customers to purchase inventory flagged as out of stock?
$config['allow_os_purchase'] 	= true;

//do we tax according to shipping or billing address (acceptable strings are 'ship' or 'bill')
$config['tax_address']		= 'ship';

//do we tax the cost of shipping?
$config['tax_shipping']		= false;

// upload_dir must be a single public root level directory
$config['upload_dir'] = 'uploads';

$config['primary_dir'] = date('Y');

$config['secondary_dir'] = date('m');

$config['acceptable_files'] = 'gif|jpg|jpeg|png';

$config['max_kb'] = '2000000';

$config['max_width'] = '1024000000';

$config['max_height'] = '76800000';


//change the name of the admin controller folder 
$config['supert']		= 'supert';

$config['email']		= 'email';

$config['patient']		= 'patient';

$config['sms_feature']	= true;

$config['sms_group']	= array('supert');

$config['therapist']	= 'therapist';

$config['admin']	= 'admin';