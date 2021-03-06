<title>NhanhAPI | Update order</title>
<?php
/**
 * Code sample update order's information: payment status, order status
 */
header('Content-type: text/html; charset=utf-8');

require_once '../src/NhanhService.php';

$data = array(
    "id" => 8935432,
    "paymentId" => "27937BK7164",
    "paymentCode" => "308AU130",
    "paymentGateway" => "Bảo Kim",
    "moneyTransfer" => 12000000,
    "status" => "Canceled", // or: Confirmed | Aborted
    "reasonDescription" => "Description about cancel reason"
);

// the storeId in e-commerce platforms, individual websites set $storeId = null;
$storeId = 2335458;

$service = new NhanhService();
$response = $service->sendRequest(NhanhService::URI_ORDER_UPDATE, $data, $storeId);

if($response->code) {
	echo "<h1>Success!</h1>";
} else {
	echo "<h1>Failed!</h1>";
	foreach ($response->messages as $message) {
		echo "<p>$message</p>";
	}
}