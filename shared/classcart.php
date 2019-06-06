
<?php
class cart
{
    private static $conn = null;
    public static function  connect()
    {
        self::$conn = mysqli_connect("localhost", "root", "", "priya_store");
        return self::$conn;
    }
    public static function disconnect()
    {
        mysqli_close($conn);
        self::$conn = null;
    }
    public function selectCartByUid($uid)
    {
        $cnn = cart::connect();
        $q = 'select * from product_tbl as p join product_cat as pc on p.fk_cat_id=pc.cat_id join kart_product as kp on kp.product_id=p.product_id join kart_tbl as kt on kp.kart_id=kt.kart_id where kt.user_id=' . $uid;
        $result = $cnn->query($q);
        return $result;
        cart::disconnect();
    }
    public function updateQuant($pid,$kart_id,$quant)
    {
      $cnn = cart::connect();
      $q = "update kart_product set product_qty=" . $quant . " where kart_id=" . $kart_id . " and product_id=" . $pid;
      $result = $cnn->query($q);
      return $result;
      cart::disconnect();
    }
    public function deleteKart($kid)
    {
      $cnn = cart::connect();
      $q="delete from kart_product where kart_id=".$kid;
      $result = $cnn->query($q);
      return $result;
      cart::disconnect();
    }
    public function addToCart($uid, $pid, $qty)
    {
        $cnn = cart::connect();
        $q = "select * from kart_tbl where user_id=" . $uid;
        $result = $cnn->query($q);
        if ($result->num_rows == 0) {
            $q1 = "insert into kart_tbl values(0," . $uid . ")";
            $result = $cnn->query($q1);
            if ($result === true) { } else {
                return false;
            }
        }
        $q = "select * from kart_tbl as kt join kart_product as kp on kt.kart_id=kp.kart_id where kt.user_id=" . $uid . " and kp.product_id=" . $pid;
        echo $q;
        $result = $cnn->query($q);
        if ($result->num_rows == 0) {
            $q = "select * from kart_tbl as kt where kt.user_id=" . $uid;
            // echo $q;
            $result = $cnn->query($q);
            $row = $result->fetch_assoc();
            $kart_id = $row["kart_id"];
            $q = "insert into kart_product values(" . $kart_id . "," . $pid . "," . $qty . ")";
            $result = $cnn->query($q);
            if ($result === true) {
                return true;
            } else {
                return false;
            }
        } else {
            $row = $result->fetch_assoc();
            $existedQuantity = $row["product_qty"];
            $existedQuantity += $qty;
            $kart_id = $row["kart_id"];
            $q = "update kart_product set product_qty=" . $existedQuantity . " where kart_id=" . $kart_id . " and product_id=" . $pid;
            $result = $cnn->query($q);
            if ($result === true) {
                return true;
            } else {
                return false;
            }
        }
        //return $result;
        cart::disconnect();
    }
    public function removeProductFromKart($pid, $kid)
    {
        $cnn = cart::connect();
        $q = "delete from kart_product where product_id=" . $pid . " and kart_id=" . $kid;
        $result = $cnn->query($q);
        return $result;
        cart::disconnect();
    }
    public function deleteUid($uid){
        $cnn = cart::connect();
        $q="select kart_id from kart_tbl where user_id=".$uid;
        $result=$cnn->query($q);
        if($result->num_rows>0)
        $row=$result->fetch_assoc();
        $kid=$row["kart_id"];
        $q = "delete from kart_product where kart_id=".$kid;
        $result = $cnn->query($q);
        return $result;
        cart::disconnect();
    }
    public function getQuote($uid)
    {
        date_default_timezone_set('Europe/London');
        $cnn = cart::connect();
        $q = "select * from user_tbl where user_id=" . $uid;
        $result = $cnn->query($q);
        $row = $result->fetch_assoc();
        $user_email = $row["user_email"];
        $user_name = $row["user_name"];
        $user_company = $row["user_company_name"];
        $user_contact = $row["user_contact"];
        $timestamp = time();
        $date = date("F jS, Y", strtotime($timestamp));
        $message = '<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- <title>Simple Transactional Email</title> -->
    <style>  
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }
      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }
      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */
      .body {
        background-color: #f6f6f6;
        width: 100%; 
      }
      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }
      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }
      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }
      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }
      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }
      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; 
      }
      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }
      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }
      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }
      a {
        color: #3498db;
        text-decoration: underline; 
      }
      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }
      .btn-primary table td {
        background-color: #3498db; 
      }
      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; 
      }
      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }
      .first {
        margin-top: 0; 
      }
      .align-center {
        text-align: center; 
      }
      .align-right {
        text-align: right; 
      }
      .align-left {
        text-align: left; 
      }
      .clear {
        clear: both; 
      }
      .mt0 {
        margin-top: 0; 
      }
      .mb0 {
        margin-bottom: 0; 
      }
      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }
      .powered-by a {
        text-decoration: none; 
      }
      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }
      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; 
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; 
        }
        table[class=body] .content {
          padding: 0 !important; 
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table[class=body] .btn table {
          width: 100% !important; 
        }
        table[class=body] .btn a {
          width: 100% !important; 
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }
      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        .btn-primary table td:hover {
          background-color: #34495e !important; 
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; 
        } 
      }
    </style>
  </head>
  <body class="">
  <center><h1>Riya Foods Limited</h1></center>
    <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p>Hello Ram Kishor,</p>
                        <p>Your customer wants you to send quotes of your products.Below are the details of customer</p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table role="presentation" border="2" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th>Client Email</th>
                                    <th>Client Name</th>
                                    <th>Client Company Name</th>
                                    <th>Client Contact</th>
                                    <th>Date</th>
                                </tr>
                                <tr>
                                    <td>' . $user_email . '</td>
                                    <td>' . $user_name . '</td>
                                    <td>' . $user_company . '</td>
                                    <td>' . $user_contact . '</td>
                                    <td>' . $date . '</td>
                                </tr>
                                </table>
                              </tr>
                            </tr>
                          </tbody>
                        </table>
                        <table role="presentation" border="1" cellpadding="0" cellspacing="0" >
                            <thead>
                                <tr><th>Product Category</th><th>Product Name</th><th>Quantity</th></tr>
                            </thead>
                            <tbody>';
        $q = "select * from kart_tbl as kt join kart_product as kp on kp.kart_id=kt.kart_id join product_tbl as pt on kp.product_id=pt.product_id join product_cat as pc on pt.fk_cat_id=pc.cat_id";
        $result = $cnn->query($q);
        while ($row = $result->fetch_assoc()) {
            $message = $message . '<tr><td align="center">' . $row["cat_name"] . '</td><td align="center">' . $row["product_name"] . '</td><td align="center">' . $row["product_qty"] . '</td></tr>';
        }
        $message = $message . '</tbody>
                        </table>
                        <table role="presentation"  border="2" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td> <a href="#" target="_blank">Fill Rates</a> </td>
                                    </tr>
              </table>
                        <p>This email is generated from your website riyafoods.com.</p>
                        <p>Good luck! Hope it works.</p>
                      </td>
                    </tr>
                  </table>
                  
                </td>
              </tr>
            </table>
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">195a Kenton Road, Harrow, Middlesex, England</span>
                  </td>
                </tr>
              </table>
              
            </div>
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';
        require_once './shared/classmail.php';
        $mail = new Mail;
        if ($mail->sendMail("mdshah9574@gmail.com", "Malav Shah", "medskyy@gmail.com", "Riya Foods Limited", "Get Quotation Request", $message)) {
          $q = "select * from kart_tbl as kt join kart_product as kp on kp.kart_id=kt.kart_id join product_tbl as pt on kp.product_id=pt.product_id join product_cat as pc on pt.fk_cat_id=pc.cat_id";
          $result = $cnn->query($q);
          while($row = $result->fetch_assoc()){
            $qs="insert into past_order_tbl values('',".$uid.",".$row["product_id"].",".$row["product_qty"].",'')";  
            $res=$cnn->query($qs);
            if(!$res){
              return false;
            }
          }
          if($this->deleteUid($uid))
          return true;
          else
          return false;
        } else {
            return false;
        }
        // return true;
    }
}
?>
