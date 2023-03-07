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
</html>



