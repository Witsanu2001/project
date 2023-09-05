

<?php
    session_start();
    require_once('./db.php');
    // $userjson = json_encode($_SESSION['userid']);
    // print_r($userid);
    // echo $_SESSION['userid'];
        

    try {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $object = new stdClass();
            $amount = 0;
            $product = $_POST['product'];

            $stmt = $db->prepare('select id,m_price from food order by id desc');
            if($stmt->execute()) {

                $queryproduct = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $items = array(
                        "id" => $id,
                        "price" => $m_price
                    );
                    array_push( $queryproduct, $items );
                    
                }
                $num_item = 0;
                for ($i=0; $i < count($product) ; $i++) { 
                    $num_item += $product[$i]['count'];
                    for ($k=0; $k < count($queryproduct) ; $k++) { 
                        if( intval($product[$i]['id']) == intval($queryproduct[$k]['id']) ) {
                            $amount += intval($product[$i]['count']) * intval($queryproduct[$k]['price']);
                            // $money = $product[$i] * $queryproduct[$k];
                            break;
                        }
                    }
                }
                $userid =  $_SESSION['userid'];
                $shiping = $num_item * 10;
                $netamount = $shiping + $amount;
                //$transid = round(microtime(true) * 1000);
                $transid = time();
                $product = json_encode($product);
                $mil = time()*1000;
                $updated_at = date("Y-m-d h:i:sa");

                $stmt = $db->prepare('insert into sp_transaction (userid,transid,orderlist,amount,shiping,netamount,operation,mil,updated_at) values (?,?,?,?,?,?,?,?,?)');
                if($stmt->execute([
                    $userid, $transid ,$product, $amount, $shiping , $netamount, 'รอดำเนินการ', $mil, $updated_at
                ])) {
                    $object->RespCode = 200;
                    $object->RespMessage = 'success';
                    $object->Amount = new stdClass();
                    $object->Amount->Userid = $userid;
                    $object->Amount->Product = $product;
                    $object->Amount->Transid = $transid;
                    $object->Amount->Amount = $amount;
                    $object->Amount->Shipping = $shiping;
                    $object->Amount->Netamount = $netamount;
                    $object->Amount->Updated_at = $updated_at;

                    http_response_code(200);
                }
                else {
                    $object->RespCode = 300;
                    $object->Log = 0;
                    $object->RespMessage = 'bad : insert transaction fail';
                    http_response_code(300);
                }
            }
            else {
                $object->RespCode = 500;
                $object->Log = 1;
                $object->RespMessage = 'bad : cant get product';
                http_response_code(500);
            }
            echo json_encode($object);
        }
        else {
            http_response_code(405);
        }
    }
    catch(PEOException $e) {
        http_response_code(500);
        echo $e->getMessage();
    }

?> 