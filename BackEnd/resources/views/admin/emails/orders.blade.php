{{-- 
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:700px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:5px 0 5px 0;background:#eafeff77;">
              <img src="https://dynamic.brandcrowd.com/asset/logo/cbb88100-9617-444b-93ea-c95ee158aae8/logo-search-grid-1x?v=637811169477830000&text=TCC-Shop" alt="" width="100" style="height:1000;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                @if(isset($params['order']) && isset($params['orderDetails']) && isset($params['orderStatus']))
                @php
                $order = $params['order'];
                $orderDetails = $params['orderDetails'];
                $orderStatus = $params['orderStatus'];
                $totalPriceOrder = 0;
                @endphp
                @endif

                <tr>
                  <td colspan="3" style="padding:0 0 1px 0;color:#153643;">
                    <h1 style="font-size:24px;margin:0 0 -40px 0;font-family:Arial,sans-serif;"><h3>Kính chào: <i>{{ $order->name_customer }}</i></h3></h1>
                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;color:rgb(18, 168, 255)">{{ $orderStatus }}</p><br>
                    <tr>
                        <td style="width: 200px"><b>Sản phẩm</b></td>
                        <td style="width: 100px"><b>Số lượng</b></td>
                        <td style="width: 100px"><b>Giá</b></td>
                        <td style="width: 100px"><b>Tổng phụ</b></td>
                    </tr>
                    @foreach ($orderDetails as $orderDetail)
                    <tr>                    
                        <td>{{ $orderDetail->products->name.' ('.$orderDetail->products->type_gender.')' }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td >{{ number_format($orderDetail->price_at_time) }}</td>
                        <td >{{ number_format($orderDetail->price_at_time * $orderDetail->quantity) }}</td>
                        @php
                            $totalPriceOrder += $orderDetail->price_at_time * $orderDetail->quantity;    
                        @endphp
                    </tr>
                    @endforeach 
                    <tr>
                        <td colspan="3"><br><b>Tổng tiền cần thanh toán:</b></td>
                        <td><br><b style="color:rgb(34, 0, 255) ">{{ number_format($totalPriceOrder)}} VNĐ</b><br></td>
                    </tr>
                    
                </td>
                </tr>
                <tr>
                  <td colspan="3" style="padding:0;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="width:500px;padding:0;vertical-align:top;color:#153643;">
                            <br><i>TCC-Shop cảm ơn bạn đã tin dùng sản phẩm</i><br>
                            <br><b><i>Thân ái!.</i></b><br>
                          <i style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><br><a href="#" style="color:#ee4c50;text-decoration:underline;">Email: <a href="mailto:maixuancuong2906@gamil.com" style="color:rgb(17,85,204)"
                            target="_blank">maixuancuong2906@gmail.com</a></a></i>
                            <i style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><br><a href="#" style="color:#ee4c50;text-decoration:underline;">Phone: <a href="tel:0843442357" style="color:rgb(17,85,204)"
                                target="_blank">+84 83442357</a></a></i><br>
                            <br><i>Địa Chỉ: </i><i>133 Lý Thường Kiệt-thành phố Đông Hà-tỉnh Quảng Trị|<a href="https://www.google.com/maps/place/133+L%C3%BD+Th%C6%B0%E1%BB%9Dng+Ki%E1%BB%87t,+%C4%90%C3%B4ng+H%E1%BA%A3i,+%C4%90%C3%B4ng+H%C3%A0,+Qu%E1%BA%A3ng+Tr%E1%BB%8B,+Vi%E1%BB%87t+Nam/@16.802374,107.1092616,17z/data=!3m1!4b1!4m5!3m4!1s0x3140e584960ba903:0x5c5e139c80555b93!8m2!3d16.8023689!4d107.1114503"
                              style="color:rgb(17,85,204)" target="_blank">Xem bản đồ</a></i>
                        </td>
                     
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:#39caff;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="left">
                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                      &reg; TCC-Shop, limited 2022<br/>
                    </p>
                  </td>
                  <td style="padding:0;width:50%;" align="right">
                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html> --}}

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody><tr>
    <td colspan="2"></td>
    <td bgcolor="#E8E8E8" colspan="3" height="1px"></td>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8" width="1px"></td>
    <td bgcolor="#E8E8E8" width="1px"></td>
    <td bgcolor="#D1D1D1" width="1px"></td>
    
    
    <td bgcolor="#FFF">
      
      
      <div class="m_-2733758160205950340header" style="margin-bottom:15px">
        <div><table class="m_-2733758160205950340header" lang="header" cellpadding="0" cellspacing="0" width="100%" border="0" style="width:100%">
<tbody><tr>
<td width="100%" height="70" valign="top" bgcolor="#FFFFFF" style="padding-top:30px;background:#ffffff;height:70px">
        <table cellpadding="0" cellspacing="0" width="100%" height="70" border="0" style="width:100%;height:70px">
            <tbody><tr>
                <td style="width:20px" width="20"><div lang="space40"></div></td>
                <td valign="middle" align="center">
        <div style="font-size:5px;line-height:5px;height:5px">&nbsp; </div>
                    <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=top-logo&amp;url=https%3A%2F%2Fwww.lazada.vn" style="text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dtop-logo%26url%3Dhttps%253A%252F%252Fwww.lazada.vn&amp;source=gmail&amp;ust=1669191851252000&amp;usg=AOvVaw3qcVYyYq0OxtdnrV8mmOzM">
          <img src="https://ci3.googleusercontent.com/proxy/ZzHr7MmLae7X24TWLPA-tLBF--4fqYw_tXJ9JYQRHR-lEGul9fbmPqCr0T24AUjKIz_2RZCOpLXlqyit0cxivsbH4FSTj9sxjDMkdQ4xCRpbKR3v-VokpV9nM3wx89yevf9rWagU2xK9vy5Ikc0=s0-d-e1-ft#https://img.alicdn.com/imgextra/i4/O1CN01wgAMaQ1q4wVmH1wP3_!!6000000005443-2-tps-209-55.png" width="209" style="display:block;max-width:209px;border:none" class="CToWUd" data-bit="iit">
                    </a>
        <div style="font-size:5px;line-height:5px;height:5px">&nbsp; </div>
                </td>
            </tr>
        </tbody></table>
</td>
</tr>
<tr>
<td width="100%" height="50" valign="middle" bgcolor="#FFFFFF" style="background:#ffffff;height:50px">
  <table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody><tr>
      <td align="center" width="150">
        <p style="font-size:11pt;font-weight:bold;font-family:Arial,Helvetica,sans-serif;color:#0f146d;background-color:#ffffff">
          
          
          <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=top-menu&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fshop%2Fbach-hoa-lazada" style="text-decoration:none;font-weight:bold;color:#0f146d!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dtop-menu%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fshop%252Fbach-hoa-lazada&amp;source=gmail&amp;ust=1669191851252000&amp;usg=AOvVaw16BjkEikk8A_1g3zYtHi20">Bách Hóa<br> Lazada</a>
        </p>
      </td>
      <td align="center" width="150">
        <p style="font-size:11pt;font-weight:bold;font-family:Arial,Helvetica,sans-serif;color:#0f146d;background-color:#ffffff">
          <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=top-menu&amp;url=https%3A%2F%2Fpages.lazada.vn%2Fwow%2Fi%2Fvn%2FLandingPage%2Flazmall" style="text-decoration:none;font-weight:bold;color:#0f146d!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dtop-menu%26url%3Dhttps%253A%252F%252Fpages.lazada.vn%252Fwow%252Fi%252Fvn%252FLandingPage%252Flazmall&amp;source=gmail&amp;ust=1669191851252000&amp;usg=AOvVaw0WqsNBaHw2iTkvzNzNm1Pi">LazMall</a>
        </p>
      </td>
      <td align="center" width="150">
        <p style="font-size:11pt;font-weight:bold;font-family:Arial,Helvetica,sans-serif;color:#0f146d;background-color:#ffffff">
          
          
          
          
          <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=top-menu&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fvoucher" style="text-decoration:none;font-weight:bold;color:#0f146d!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dtop-menu%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fvoucher&amp;source=gmail&amp;ust=1669191851252000&amp;usg=AOvVaw2egT2WERGCm6W1v-G4aXDw">Mã Giảm Giá</a>
        </p>
      </td>
      <td align="center" width="150">
        <p style="font-size:11pt;font-weight:bold;font-family:Arial,Helvetica,sans-serif;color:#0f146d;background-color:#ffffff">
          
          
          <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=top-menu&amp;url=https%3A%2F%2Fpages.lazada.vn%2Fwow%2Fi%2Fvn%2FLandingPage%2Fglobal" style="text-decoration:none;font-weight:bold;color:#0f146d!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dtop-menu%26url%3Dhttps%253A%252F%252Fpages.lazada.vn%252Fwow%252Fi%252Fvn%252FLandingPage%252Fglobal&amp;source=gmail&amp;ust=1669191851252000&amp;usg=AOvVaw3JlBowpBKbl4QA1lymjOt1">Hàng<br> Quốc Tế</a>
        </p>
      </td>
    </tr>
  </tbody></table>
    </td>
</tr>
</tbody></table></div>
      </div>
      
      <div class="m_-2733758160205950340section" style="padding-top:0px">		 
        <div class="m_-2733758160205950340header-title" style="color:#0f146d;text-align:center">Thủ tục hoàn tiền đã hoàn tất</div>
        <p class="m_-2733758160205950340header-subText">(Scroll down for English version)</p>
        <div class="m_-2733758160205950340section-content">
        <h2>xuancuong ơi!</h2>
        <p>Lazada đã&nbsp;hoàn tất thủ tục hoàn&nbsp;tiền&nbsp;cho đơn hàng <strong>#381837118092016</strong> của bạn. Tổng giá trị hoàn trả là  <b>1000</b> đồng</p>
  
    
        </div>
      </div>
       

<div class="m_-2733758160205950340section" style="padding-bottom:0px">
<div class="m_-2733758160205950340section-content">




            <div class="m_-2733758160205950340section-header m_-2733758160205950340section-header--yourPackage">Kiện Hàng #1</div>
            <p style="padding-left:10px;margin-top:0px;margin-bottom:0px;color:#585858">
              Được bán bởi: Wallet
            </p>


            <div class="m_-2733758160205950340product" style="border-bottom:0px none">
              <table cellpadding="0" cellspacing="0" style="width:100%">
                <tbody><tr>
                  <td style="width:40%">
                    <div style="padding-right:10px">
                      <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=main&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fproducts%2Fi2060683352-s9625951247.html%3FurlFlag%3Dtrue%26mp%3D1" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dmain%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fproducts%252Fi2060683352-s9625951247.html%253FurlFlag%253Dtrue%2526mp%253D1&amp;source=gmail&amp;ust=1669191851252000&amp;usg=AOvVaw0YKuuXO4zMzsQTASurVMfS"><img src="https://ci3.googleusercontent.com/proxy/z6QqQ13HajLCkRjBD_5mNCXAOHYyWlQtSmsI5nO-KOh-tjMNvtGk82n1AM7xVXS3zPqj-VflKVIO4eAvGRdQmPv3YFJe3DiBpTQ8hQ0PgFd0NEPt=s0-d-e1-ft#https://vn-live.slatic.net/p/d6d5db7c5b4612f9a382c2512873ab81.jpg" style="width:100%;max-width:160px" class="CToWUd" data-bit="iit"></a>
                    </div>
                  </td>
                  <td style="width:60%">
                    <div class="m_-2733758160205950340product-productInfo-name">
                      <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=main&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fproducts%2Fi2060683352-s9625951247.html%3FurlFlag%3Dtrue%26mp%3D1" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dmain%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fproducts%252Fi2060683352-s9625951247.html%253FurlFlag%253Dtrue%2526mp%253D1&amp;source=gmail&amp;ust=1669191851252000&amp;usg=AOvVaw0YKuuXO4zMzsQTASurVMfS"><span style="font-size:14px">[Game 1K - Tham gia bằng ví ZaloPay - Mở bán 15/11/2022] Iphone 13</span></a>
                    </div>
                    <div class="m_-2733758160205950340product-productInfo-price"><span style="font-size:14px">VND 1,000</span></div>
                    <div class="m_-2733758160205950340product-productInfo-subInfo"><span style="font-size:14px">Số lượng: 1</span></div>
                  </td>
                </tr>
              </tbody></table>
            </div>



</div>
</div>

        <div class="m_-2733758160205950340section" style="padding-top:0px">
          <div class="m_-2733758160205950340section-content">							
            <div class="m_-2733758160205950340checkout">
              <div class="m_-2733758160205950340two_col">

                <table cellpadding="0" cellspacing="0" class="m_-2733758160205950340checkout-amount" style="border-bottom:1px solid #d8d8d8">
                  <tbody><tr>
                    <td valign="top" style="color:#585858;width:49%">Thành tiền:</td>
                    <td align="right" valign="top">VND</td>
                    <td align="right" valign="top">1,000</td>
                  </tr>
                  <tr>
                    <td valign="top" style="color:#585858">Phí vận chuyển:</td>
                    <td align="right" valign="top">VND</td>
                    <td align="right" valign="top">0</td>
                  </tr>
                  <tr>
                    <td valign="top" style="color:#585858">Giảm giá:</td>
                    <td align="right" valign="top">VND</td>
                    <td align="right" valign="top">(0)</td>
                  </tr>
                  <tr>
                    <td valign="top" style="color:#585858">Tổng cộng:</td>
                    <td align="right" valign="top"><div style="color:#f27c24;font-weight:bold">VND</div></td>
                    <td align="right" valign="top"><div style="color:#f27c24;font-weight:bold">1,000</div></td>
                  </tr>                                        
                </tbody></table>

                <br>

                <table cellpadding="0" cellspacing="0" class="m_-2733758160205950340checkout-amount">
                  <tbody><tr>
                    <td valign="top" style="color:#585858;width:49%">Tùy chọn vận chuyển:</td>
                    <td align="right" valign="top" colspan="2">Digital</td>
                  </tr>
                  <tr>
                    <td valign="top" style="color:#585858;width:49%">Hình thức thanh toán:</td>
                    <td align="right" valign="top" colspan="2">WALLET_ZALOPAY_CASHIER</td>
                  </tr>
                </tbody></table>
              </div>
            </div>
          </div>
        </div>
  


<div class="m_-2733758160205950340section">
<div class="m_-2733758160205950340section-header m_-2733758160205950340section-header--notes">Có phải bạn thắc mắc?</div>
<div class="m_-2733758160205950340section-content"> 
      <p><strong>Bạn muốn biết bao giờ mới nhận được tiền hoàn?</strong>
        <br>Để biết thời gian bạn sẽ nhận được tiền hoàn dự kiến cho đơn hàng này, bạn có thể tham khảo tại&nbsp;đây <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=Help%20Center&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fhelpcenter%2Fsau-bao-lau-ke-tu-luc-gui-lai-san-pham-thi-toi-nhan-duoc-tien-hoan-lai.html" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3DHelp%2520Center%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fhelpcenter%252Fsau-bao-lau-ke-tu-luc-gui-lai-san-pham-thi-toi-nhan-duoc-tien-hoan-lai.html&amp;source=gmail&amp;ust=1669191851253000&amp;usg=AOvVaw2CoIde_ZNSAOEjvKHKJMNT">đây</a>
      </p><p><strong>Mã giảm giá bạn đã áp dụng cho đơn hàng này sẽ như thế nào?</strong>
        <br>Tùy theo từng trường hợp, Lazada sẽ kiểm tra và hoàn lại mã mới tại&nbsp;<a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=main&amp;url=https%3A%2F%2Fmy.lazada.vn%2Fpromotion%2Fmy-voucher%2F" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dmain%26url%3Dhttps%253A%252F%252Fmy.lazada.vn%252Fpromotion%252Fmy-voucher%252F&amp;source=gmail&amp;ust=1669191851253000&amp;usg=AOvVaw12g6ujzrHZKtBMsrDwqlFT">đây</a>&nbsp;khi đơn hàng của bạn đủ điều kiện được hoàn lại mã giảm giá.</p>

<div class="m_-2733758160205950340two_col" align="center">
</div>
<div class="m_-2733758160205950340two_col" align="center">
  <div style="font-size:10px;line-height:20px;height:15px">&nbsp;</div>
  <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=Help%20Center&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fhelpcenter%2F" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3DHelp%2520Center%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fhelpcenter%252F&amp;source=gmail&amp;ust=1669191851253000&amp;usg=AOvVaw3nXkqWU4DSEs_lmr93OuLw"><div style="background:#0f146d;color:#fff;border-radius:10px;padding:12px 25px!important;display:block!important;text-align:center;text-transform:uppercase;min-width:140px;border-bottom:1px solid #8f8f8f;border-right:1px solid #8f8f8f">Bạn vẫn còn thắc mắc? Đã có Trung tâm hỗ trợ</div></a>
</div>

<p></p></div>
</div>



      

      <div class="m_-2733758160205950340header" style="margin-bottom:15px">
        <div>


          
          </div>
      </div>
      <div class="m_-2733758160205950340section" style="padding-top:0px">		 
        <div class="m_-2733758160205950340header-title" style="color:#0f146d;text-align:center">Your refund has been processed
        </div>
        <div class="m_-2733758160205950340section-content">
          <h2>Hi xuancuong,</h2>
          <p>We would like to inform you that the refund amount of VND <b>1000 </b>for your item(s) listed below in order&nbsp;<strong>#381837118092016</strong>&nbsp;has been initiated.
We're sorry that this order did not work out for you. We hope that this will not affect your shopping experience.</p>
        
        </div>
      </div>



<div class="m_-2733758160205950340section" style="padding-bottom:0px">
<div class="m_-2733758160205950340section-content">


            <div class="m_-2733758160205950340section-header m_-2733758160205950340section-header--yourPackage">Package 1</div>
            <p style="padding-left:10px;margin-top:0px;margin-bottom:0px;color:#585858">
              Sold by: Wallet
            </p>
            <div class="m_-2733758160205950340product" style="border-bottom:0px none">      
              <table cellpadding="0" cellspacing="0" style="width:100%">
                <tbody><tr>
                  <td style="width:40%">
                    <div style="padding-right:10px">
                      <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=main&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fproducts%2Fi2060683352-s9625951247.html%3FurlFlag%3Dtrue%26mp%3D1" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dmain%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fproducts%252Fi2060683352-s9625951247.html%253FurlFlag%253Dtrue%2526mp%253D1&amp;source=gmail&amp;ust=1669191851253000&amp;usg=AOvVaw0HNC4Yzwnc-IJTa3l45lii"><img src="https://ci3.googleusercontent.com/proxy/z6QqQ13HajLCkRjBD_5mNCXAOHYyWlQtSmsI5nO-KOh-tjMNvtGk82n1AM7xVXS3zPqj-VflKVIO4eAvGRdQmPv3YFJe3DiBpTQ8hQ0PgFd0NEPt=s0-d-e1-ft#https://vn-live.slatic.net/p/d6d5db7c5b4612f9a382c2512873ab81.jpg" style="width:100%;max-width:160px" class="CToWUd" data-bit="iit"></a>
                    </div>
                  </td>
                  <td style="width:60%">
                    <div class="m_-2733758160205950340product-productInfo-name">
                      <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=main&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fproducts%2Fi2060683352-s9625951247.html%3FurlFlag%3Dtrue%26mp%3D1" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dmain%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fproducts%252Fi2060683352-s9625951247.html%253FurlFlag%253Dtrue%2526mp%253D1&amp;source=gmail&amp;ust=1669191851253000&amp;usg=AOvVaw0HNC4Yzwnc-IJTa3l45lii"><span style="font-size:14px">[Game 1K - Tham gia bằng ví ZaloPay - Mở bán 15/11/2022] Iphone 13</span></a>
                    </div>
                    <div class="m_-2733758160205950340product-productInfo-price"><span style="font-size:14px">VND 1,000</span></div>
                    <div class="m_-2733758160205950340product-productInfo-subInfo"><span style="font-size:14px">Quantity: 1</span></div>
                  </td>
                </tr>
              </tbody></table>
            </div>
</div>
</div>

        
        <div class="m_-2733758160205950340section" style="padding-top:0px">
          <div class="m_-2733758160205950340section-content">							
            <div class="m_-2733758160205950340checkout">
              <div class="m_-2733758160205950340two_col">

                <table cellpadding="0" cellspacing="0" class="m_-2733758160205950340checkout-amount" style="border-bottom:1px solid #d8d8d8">
                  <tbody><tr>
                    <td valign="top" style="color:#585858;width:49%">Subtotal:</td>
                    <td align="right" valign="top">VND</td>
                    <td align="right" valign="top">1,000</td>
                  </tr>
                  <tr>
                    <td valign="top" style="color:#585858;width:49%">Shipping fee:</td>
                    <td align="right" valign="top">VND</td>
                    <td align="right" valign="top">0</td>
                  </tr>
                  <tr>
                    <td valign="top" style="color:#585858;width:49%">Discount:</td>
                    <td align="right" valign="top">VND</td>
                    <td align="right" valign="top">(0)</td>
                  </tr>
                  <tr>
                    <td valign="top" style="color:#585858">Total (VAT included):</td>
                    <td align="right" valign="top"><div style="color:#f27c24;font-weight:bold">VND</div></td>
                    <td align="right" valign="top"><div style="color:#f27c24;font-weight:bold">1,000</div></td>
                  </tr>
                </tbody></table>

                <br>

                <table cellpadding="0" cellspacing="0" class="m_-2733758160205950340checkout-amount">
                  <tbody><tr>
                      <td valign="top" style="color:#585858;width:49%">Delivery Type:</td>
                      <td align="right" valign="top" colspan="2">Digital</td>
                  </tr>
                  <tr>
                      <td valign="top" style="color:#585858;width:49%">Payment Method:</td>
                      <td align="right" valign="top" colspan="2">WALLET_ZALOPAY_CASHIER</td>
                  </tr>
                </tbody></table>
              </div>
            </div>
          </div>
        </div>



<div class="m_-2733758160205950340section">
<div class="m_-2733758160205950340section-header m_-2733758160205950340section-header--notes">Need help?</div>
<div class="m_-2733758160205950340section-content"> 

 <b>You want to know when you will receive your refund?</b><br>
    Please check&nbsp;<a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=Help%20Center&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fhelpcenter%2Fsau-bao-lau-ke-tu-luc-gui-lai-san-pham-thi-toi-nhan-duoc-tien-hoan-lai.html" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3DHelp%2520Center%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fhelpcenter%252Fsau-bao-lau-ke-tu-luc-gui-lai-san-pham-thi-toi-nhan-duoc-tien-hoan-lai.html&amp;source=gmail&amp;ust=1669191851253000&amp;usg=AOvVaw2CoIde_ZNSAOEjvKHKJMNT">here</a>&nbsp;for estimated refund time.  ​
    <p><b>If you applied any type of voucher? </b>
      <br>You can find new vouchers <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=main&amp;url=https%3A%2F%2Fmy.lazada.vn%2Fpromotion%2Fmy-voucher%2F" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3Dmain%26url%3Dhttps%253A%252F%252Fmy.lazada.vn%252Fpromotion%252Fmy-voucher%252F&amp;source=gmail&amp;ust=1669191851253000&amp;usg=AOvVaw12g6ujzrHZKtBMsrDwqlFT">here</a>, except special cases. 
    </p>
<div class="m_-2733758160205950340two_col" align="center">
    </div>


<div class="m_-2733758160205950340two_col" align="center">
  <div style="font-size:10px;line-height:20px;height:15px">&nbsp;</div>
  <a href="https://c.lazada.vn/t/c.VkePT?sub_id1=ROC&amp;sub_id2=VN_VOYAGER_Refund_processed&amp;sub_id3=20221117&amp;sub_id4=Help%20Center&amp;url=https%3A%2F%2Fwww.lazada.vn%2Fhelpcenter%2F" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://c.lazada.vn/t/c.VkePT?sub_id1%3DROC%26sub_id2%3DVN_VOYAGER_Refund_processed%26sub_id3%3D20221117%26sub_id4%3DHelp%2520Center%26url%3Dhttps%253A%252F%252Fwww.lazada.vn%252Fhelpcenter%252F&amp;source=gmail&amp;ust=1669191851253000&amp;usg=AOvVaw3nXkqWU4DSEs_lmr93OuLw"><div style="background:#0f146d;color:#fff;border-radius:10px;padding:12px 25px!important;display:block!important;text-align:center;text-transform:uppercase;min-width:140px;border-bottom:1px solid #8f8f8f;border-right:1px solid #8f8f8f"><span>Still have questions? Help Center</span></div></a>
</div>

</div>




     </div></td>
     
     <td bgcolor="#B3B3B3" width="1px"></td>
     <td bgcolor="#D1D1D1" width="1px"></td>
     <td bgcolor="#E8E8E8" width="1px"></td>
     <td bgcolor="#F8F8F8" width="1px"></td>
  </tr>
  <tr>
     <td colspan="2"></td>
     <td bgcolor="#B3B3B3" colspan="3" height="1px"></td>
     <td colspan="3"></td>
  </tr>
  <tr>
     <td colspan="2"></td>
     <td bgcolor="#D1D1D1" colspan="3" height="1px"></td>
     <td colspan="3"></td>
  </tr>
  <tr>
     <td colspan="2"></td>
     <td bgcolor="#E8E8E8" colspan="3" height="1px"></td>
     <td colspan="3"></td>
  </tr>
  <tr>
     <td colspan="2"></td>
     <td bgcolor="#F8F8F8" colspan="3" height="1px"></td>
     <td colspan="3"></td>
  </tr>

</tbody></table>


