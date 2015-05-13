<?
Stripe::setApiKey($stripe_private_key);
$customer = Stripe_Customer::retrieve($stripe_cus_id);
$customer->default_source=$card['id'];
$customer->save();
?>