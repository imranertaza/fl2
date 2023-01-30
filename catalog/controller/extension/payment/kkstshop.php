<?php
class ControllerExtensionPaymentKkstshop extends Controller {

    public function index() {
        $data['mode'] = $this->config->get('payment_kkstshop_mode');
        if($data['mode'] ==1){
            $this->load->language('extension/payment/kkstshop');
            $data['button_confirm'] = $this->language->get('button_confirm');
            $data['action']= $this->url->link('extension/payment/kkstshop/pay');
            return $this->load->view('extension/payment/kkstshop', $data);
        }else{
            $this->load->model('checkout/order');
            $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
            if ($order_info) {
                if(empty($this->config->get('payment_kkstshop_key')) ||
                    empty($this->config->get('payment_kkstshop_url'))){
                    echo 'Payment Api error.';exit;
                }
                $this->db->query("update ".DB_PREFIX."order set order_status_id=1 where order_id=".$this->session->data['order_id']);
                $CurrencyCode= $order_info['currency_code'];
                $total = sprintf("%.2f",$this->currency->format($order_info['total'], $order_info['currency_code'], false, false));
                $gateurl = $this->config->get('payment_kkstshop_url');
                $end = substr($gateurl,-1,1);
                if($end=='/'){
                    $gateurl =  substr($gateurl,0,strlen($gateurl)-1);
                }
                $param = array();
                $param['url'] = substr(HTTPS_SERVER,0,strlen(HTTPS_SERVER)-1);
                $param['orderid'] = $order_info['order_id'];
                $param['wtype'] = 'oc3';
                $param['mode'] = $data['mode'] ;
                $param['merkey'] = $this->config->get('payment_kkstshop_key');
                $param['total'] = $total;
                $param['currency'] = $CurrencyCode;
                $param['firstname'] = $order_info['shipping_firstname']?$order_info['shipping_firstname']:$order_info['payment_firstname'];
                $param['username'] = $order_info['shipping_lastname']?$order_info['shipping_lastname']:$order_info['payment_lastname'];
                $param['email'] = $order_info['email'];
                $param['telephone'] = $order_info['telephone'];
                $param['address'] = ($order_info['shipping_country']?$order_info['shipping_country']:$order_info['payment_country'])." ".
                    ($order_info['shipping_zone']?$order_info['shipping_zone']:$order_info['payment_zone'])." ".($order_info['shipping_city']?$order_info['shipping_city']:$order_info['payment_city'])
                    ." ".($order_info['shipping_address_1']?$order_info['shipping_address_1']:$order_info['payment_address_1'])
                    ." ".($order_info['shipping_address_2']?$order_info['shipping_address_2']:$order_info['payment_address_2']);
                $param['ip'] =  $order_info['ip'];
                $param['useragent1'] = $order_info['user_agent'];
                $param['useragent2'] = isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])?$_SERVER['HTTP_ACCEPT_LANGUAGE']:'';
                $param['comment'] = $order_info['comment'];


                foreach ($this->cart->getProducts() as $product) {
                    foreach ($product['option'] as $option) {
                        if ($option['type'] != 'file') {
                            $value = $option['value'];
                        } else {
                            $upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

                            if ($upload_info) {
                                $value = $upload_info['name'];
                            } else {
                                $value = '';
                            }
                        }
                        $product['name'].= ' ('.$option['name'].":".(utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value).")";
                    }

                    $param['goodsname'][] = array(
                        'name'     => htmlspecialchars($product['name']),
                        'price'    => $this->currency->format($product['price'], $order_info['currency_code'], false, false),
                        'qty' => $product['quantity']
                        //'url' => $this->url->link('product/product', 'product_id='.$product['product_id']),
                        // 'img'=>$this->db->query("select image from ".DB_PREFIX."product where product_id=".$product['product_id'])->row['image'],
                    );
                }
                $param['goodsname'] = base64_encode(serialize($param['goodsname']));

                //print_r($param);exit;
                //echo $gateurl."/api/paypal/";exit;
                $headers = array("Content-type: application/x-www-form-urlencoded", "'charset='utf-8'");
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL,$gateurl."/api/stripe/");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch ,CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch ,CURLOPT_POSTFIELDS, http_build_query($param));
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                $res = curl_exec($ch);
                if(curl_errno($ch)){
                    $data['msg']  = 'Failed,connect to gateway:'.$gateurl.',Curl error: ' . curl_error($ch);
                }else{
                    $result = json_decode($res, true);
                    if($result['code']<>'1'){
                        $data['msg'] = $result['msg'];
                    }else{
                        $data['url']= base64_encode($result['data']['purl']);
                        $data['action']= $this->url->link('extension/payment/kkstshop/pay');
                    }
                }
                curl_close($ch);
                $this->load->language('extension/payment/kkstshop');
                $data['button_confirm'] = $this->language->get('button_confirm');
                return $this->load->view('extension/payment/kkstshop', $data);
            }
        }
    }

    private function showloadingstripe(){

        echo " <script src='".HTTPS_SERVER."/catalog/view/theme/default/template/extension/payment/layer/jquery-2.1.1.min.js' type='text/javascript'></script>
                <script src='".HTTPS_SERVER."/catalog/view/theme/default/template/extension/payment/layer/layer.js' type='text/javascript'></script><script>
        layer.msg('Processing payment...', {
            icon: 16
            ,shade: 0.3
            ,time: false
        });

</script>";
    }
    public function pay() {
        try {
            $data['mode'] = $this->config->get('payment_kkstshop_mode');
            if($data['mode'] ==1) {
                $this->load->model('checkout/order');

                $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

                if ($order_info) {
                    if (empty($this->config->get('payment_kkstshop_key')) ||
                        empty($this->config->get('payment_kkstshop_url'))) {
                        echo 'Payment Api error.';
                        exit;
                    }
                    $this->db->query("update " . DB_PREFIX . "order set order_status_id=1 where order_id=" . $this->session->data['order_id']);
                    $CurrencyCode = $order_info['currency_code'];
                    $total = sprintf("%.2f", $this->currency->format($order_info['total'], $order_info['currency_code'], false, false));
                    $gateurl = $this->config->get('payment_kkstshop_url');
                    $end = substr($gateurl, -1, 1);
                    if ($end == '/') {
                        $gateurl = substr($gateurl, 0, strlen($gateurl) - 1);
                    }
                    $param = array();
                    $param['url'] = substr(HTTPS_SERVER, 0, strlen(HTTPS_SERVER) - 1);
                    $param['orderid'] = $order_info['order_id'];
                    $param['wtype'] = 'oc3';
                    $param['merkey'] = $this->config->get('payment_kkstshop_key');
                    $param['total'] = $total;
                    $param['currency'] = $CurrencyCode;
                    $param['mode'] = $data['mode'] ;
                    $years = explode("/",$_REQUEST['dhpay_expires']);
                    $param['cardNumberKeyValue'] = str_replace(" ","",$_REQUEST['dhpay_number']);
                    $param['expireMonth'] = $years['0'];
                    $param['expireYear'] = '20'.$years['1'];
                    $param['cvv'] = $_REQUEST['dhpay_checkcode'];
                    $param['mode'] =1 ;
                    $param['firstname'] = $order_info['shipping_firstname'] ? $order_info['shipping_firstname'] : $order_info['payment_firstname'];
                    $param['username'] = $order_info['shipping_lastname'] ? $order_info['shipping_lastname'] : $order_info['payment_lastname'];
                    $param['email'] = $order_info['email'];
                    $param['telephone'] = $order_info['telephone'];
                    $param['address'] = ($order_info['shipping_country'] ? $order_info['shipping_country'] : $order_info['payment_country']) . " " .
                        ($order_info['shipping_zone'] ? $order_info['shipping_zone'] : $order_info['payment_zone']) . " " . ($order_info['shipping_city'] ? $order_info['shipping_city'] : $order_info['payment_city'])
                        . " " . ($order_info['shipping_address_1'] ? $order_info['shipping_address_1'] : $order_info['payment_address_1'])
                        . " " . ($order_info['shipping_address_2'] ? $order_info['shipping_address_2'] : $order_info['payment_address_2']);
                    $param['ip'] = $order_info['ip'];
                    $param['useragent1'] = $order_info['user_agent'];
                    $param['useragent2'] = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '';
                    $param['comment'] = $order_info['comment'];


                    foreach ($this->cart->getProducts() as $product) {
                        foreach ($product['option'] as $option) {
                            if ($option['type'] != 'file') {
                                $value = $option['value'];
                            } else {
                                $upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

                                if ($upload_info) {
                                    $value = $upload_info['name'];
                                } else {
                                    $value = '';
                                }
                            }
                            $product['name'] .= ' (' . $option['name'] . ":" . (utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value) . ")";
                        }

                        $param['goodsname'][] = array(
                            'name' => htmlspecialchars($product['name']),
                            'price' => $this->currency->format($product['price'], $order_info['currency_code'], false, false),
                            'qty' => $product['quantity']
                            //'url' => $this->url->link('product/product', 'product_id='.$product['product_id']),
                            // 'img'=>$this->db->query("select image from ".DB_PREFIX."product where product_id=".$product['product_id'])->row['image'],
                        );
                    }
                    $param['goodsname'] = base64_encode(serialize($param['goodsname']));

                    //print_r($param);exit;
                    //echo $gateurl."/api/paypal/";exit;
                    $headers = array("Content-type: application/x-www-form-urlencoded", "'charset='utf-8'");
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $gateurl . "/api/stripe/");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
                    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    $res = curl_exec($ch);
                    if (curl_errno($ch)) {
                        $data['msg'] = 'Failed,connect to gateway:' . $gateurl . ',Curl error: ' . curl_error($ch);
                    } else {
                        $result = json_decode($res, true);
                        curl_close($ch);
                        if ($result['code'] <> '1') {
                            echo $res;exit();
                        } else {
                            $_POST['url']= base64_encode($result['data']['purl']);
                        }
                    }
                }
            }
            $url =  base64_decode($_POST['url']);
            if(strpos($url,'checkout.php')!==false){
                $url = str_replace('checkout.php','codstripe/checkout.php',$url);
            }elseif(strpos($url,'createPay.php')!==false){
                $url = str_replace('createPay.php','codstripe/createPay.php',$url);
            }
            if(!$url){
                die('url error');
            }
            $re['url'] = $url;
            echo json_encode($re);exit();
            header("Location:".$url."\n");exit;
       
        } catch (Exception $e) {
            $re['msg']  = $e->getMessage(); // 返回自定义的异常信息
            echo json_encode($re);
        }
        // $this->showloadingstripe();
        

    }
    public function success()
    {

        //$this->login3323(json_encode($_POST));
        $merkey = isset($_POST['merkey']) ? trim($_POST['merkey']) : '';
        $orderid = isset($_POST['orderid']) ? trim($_POST['orderid']) : '';
        $status = isset($_POST['status']) ? trim($_POST['status']) : '';
        if (empty($merkey) || empty($orderid)) {
            echo 'API error.';
            exit;
        }
        if ($merkey <> $this->config->get('payment_kkstshop_key')) {
            echo 'API error.';
            exit;
        }
        $this->load->model('checkout/order');
        $order = $this->model_checkout_order->getOrder($orderid);
        if ($order) {
            if ($status) {
                $this->model_checkout_order->addOrderHistory($orderid, $this->config->get('payment_kkstshop_order_status_id'), '', true);
            }
        }
    }

    private function callback() {
        $pay_memberid = $this->config->get('payment_kkstshop_id');   //商户ID
        $Md5key = $this->config->get('payment_kkstshop_key');   //密钥
        $this->login3323('log....='.file_get_contents('php://input', 'r'));
        $response = json_decode(file_get_contents('php://input', 'r'), true);
        ksort($response);
        $sign = '';
        foreach($response as $k=>$v){
            if($k!='ActualAmount' && $k!='Sign'){
                $sign.=$k."=".$v."&";
            }
        }
        $sign.=$Md5key;
        $this->login3323('sign....='.$sign);
        if ($response['Status'] == 1 && $response['Sign']==strtolower(md5($sign))) {//验证成功
            //请在这里加上商户的业务逻辑程序代
            //商户订单号
            $order_id = $response['ReferenceID'];
            //RoyalPay订单号
            $royal_order_id = $response['TransactionID'];
            //判断支付金额是否和订单金额相等
            $order_id = explode("-",$order_id);
            $this->login3323('orderid....='.$order_id);
            if(isset($order_id[1])){
                $this->load->model('checkout/order');
                $order_info = $this->model_checkout_order->getOrder($order_id[1]);
                if($order_info){
                    $this->model_checkout_order->addOrderHistory($order_id[1], $this->config->get('payment_kkstshop_completed_status_id'),
                        'Transaction No:'.$royal_order_id,true);
                    $this->login3323('success.....');
                    exit('SUCCESS');
                }
            }
        } else {//验证失败
            echo "fail";exit;
        }
    }
    private function strFilter2($str){
        $str = str_replace('`', '', $str);
        $str = str_replace('·', '', $str);
        $str = str_replace('~', '', $str);
        $str = str_replace('!', '', $str);
        $str = str_replace('！', '', $str);
        $str = str_replace('@', '', $str);
        $str = str_replace('#', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('￥', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('……', '', $str);
        $str = str_replace('&', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('(', '', $str);
        $str = str_replace(')', '', $str);
        $str = str_replace('（', '', $str);
        $str = str_replace('）', '', $str);
        $str = str_replace('-', '', $str);
        $str = str_replace('_', '', $str);
        $str = str_replace('——', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('|', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('【', '', $str);
        $str = str_replace('】', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        $str = str_replace(';', '', $str);
        $str = str_replace('；', '', $str);
        $str = str_replace(':', '', $str);
        $str = str_replace('：', '', $str);
        $str = str_replace('\'', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('“', '', $str);
        $str = str_replace('”', '', $str);
        $str = str_replace(',', '', $str);
        $str = str_replace('，', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        $str = str_replace('《', '', $str);
        $str = str_replace('》', '', $str);
        $str = str_replace('.', '', $str);
        $str = str_replace('。', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('、', '', $str);
        $str = str_replace('?', '', $str);
        $str = str_replace('&quot;', '', $str);
        $str = str_replace(' ', '', $str);
        $str  = trim($str);
        if($str && is_numeric($str)){
            if(strlen($str)>14){
                $str =substr($str,0,14);
            }
        }else{
            $str = '000000';
        }
        return $str;
    }
    function login3323($txt){
        $myfile = fopen("000.txt", "a+") or die("Unable to open file!");
        fwrite($myfile, date("Y-m-d H:i:s")."**".$txt."\n");
        fclose($myfile);
    }
}