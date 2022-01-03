<?php

include_once './BaseController.php';
include '../model/order.php';


class PayController extends BaseController
{
    public function __construct($order_action)
    {
        switch ($order_action) {
            case 'order':
                session_start();
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $address = $_POST["address"];
                $note = $_POST["note"];
                $user_id = $_SESSION['user_id'];
                $amount = $_POST['thanhtien'];
                orderModel::insertOrder($name,$phone,  $address, $email, $amount, $user_id, $note);
                $newOrder = orderModel::getNewOrder();
                $madon = $newOrder[0]['order_id'];
                foreach ($_SESSION['cart_item'] as $value):
                    $id_pr=$value['id'];
                    $sum=0;
                    $sum = $value['price'] * $value['qty'];
                    orderModel::insertDetailOrder($madon,$id_pr,$value['qty'],$sum);
                endforeach;
                unset($_SESSION['cart_item']);
                alertM("Đặt Hàng Thành Công Thành Công !!! ", "../view/index.php");
                exit;
        }
    }
}
function alertM($smg, $link)
{
    echo '<script language="javascript">';
    echo 'alert("' . $smg . '")';
    echo '</script>';
    echo '<script type="text/javascript">
            window.location = "' . $link . '" </script>';
}

$order_action = "";
if (count($_POST) > 0) {
    $order_action = $_POST["order_action"];
}
$orderCortrol = new PayController($order_action);
