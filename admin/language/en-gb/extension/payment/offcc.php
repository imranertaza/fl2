<?php
// Heading
$_['heading_title']      = 'Offline credit card';

// Text
$_['text_extension']     = 'Extensions';
$_['text_success']       = 'Success: You have modified '.$_['heading_title'].' details!';
$_['text_edit']          = 'Edit '.$_['heading_title'];

// Entry
$_['entry_offcc_heading']= 'Offline Credit card Heading';
$_['entry_offcc_extra_description']= 'Extra Description';


$_['entry_offcc_card_number']= 'Text card Number';
$_['entry_offcc_error_card_number']= 'Card Number validation error';


$_['entry_offcc_cvc']= 'Text CVC';
$_['entry_offcc_error_cvc']= 'CVC validation error';

$_['entry_offcc_card_owner']= 'Text Card Owner';
$_['entry_offcc_error_card_owner']= 'Card Owner validation error';

$_['entry_offcc_expiry_date']= 'Text Expiry date';
$_['entry_offcc_error_expiry_date']= 'Expiry date validation error';


$_['entry_offcc_card_type']= 'Text Card Type';
$_['entry_offcc_error_card_type']= 'Card Type validation error';


$_['entry_total']        = 'Total';
$_['entry_order_status'] = 'Order Status';
$_['entry_geo_zone']     = 'Geo Zone';
$_['entry_status']       = 'Status';
$_['entry_sort_order']   = 'Sort Order';

$_['entry_allow_card']   = 'Allow card type';
$_['all_card_types']     = array(
    'amex'               => 'American Express',
    'dinersclub'         => 'Diners Club',
    'discover'           => 'Discover Card',
    'dankort'            => 'Dankort',
    'forbrugsforeningen' => 'Forbrugsforeningen',
    'jcb'                => 'JCB',
    'mastercard'         => 'Mastercard',
    'maestro'            => 'Maestro',
    'unionpay'           => 'UnionPay',
    'visaelectron'       => 'Visa Electron',
    'visa'               => 'Visa',
);
// Help
$_['help_total']         = 'The checkout total the order must reach before this payment method becomes active.';

// Error
$_['error_permission']   = 'Warning: You do not have permission to modify payment '.$_['heading_title'].'!';
$_['error_heading']      = 'Heading field is Required!';
$_['error_card_number']  = 'Card number field is Required!';
$_['error_card_cvc']     = 'Card CVC field is Required!';
$_['error_card_owner']   = 'Card owner field is Required!';
$_['error_expiry_date']  = 'Expiry date field is Required!';
$_['error_card_type']    = 'Card type field is Required!';