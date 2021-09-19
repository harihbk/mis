
  <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Order History</td>
         </tr>
    </thead>
    <tbody>
        @foreach ($order_history as $item)
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
            <b>Order ID:</b> {{ $item->order_id ?? ''}}<br>
            <b>Order Status:</b> {{ $item->getStatus->name ?? ''}}<br>
            <b>Order Date:</b> {{ $item->date_added ?? ''}}<br>
        </td>
         </tr>
         @endforeach
    </tbody>
  </table>
