

<table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222" colspan="2">Order Details</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px"><b>Order ID:</b> {{ $order->id ?? ''}} <br>
          <b>Date Added:</b> {{ $order->created_at ?? ''}}<br>
          <b>Payment Method:</b> Cash On Delivery<br>

          </td>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px"><b>E-mail:</b> <a href="mailto:{{ $oc_address->billing_email ?? ''}}" target="_blank">{{ $oc_address->billing_email ?? ''}}</a><br>
          <b>Mobile NO:</b> {{ $oc_address->billing_phone ?? ''}}<br>

          <b>Order Status:</b> {{ $status}}<br></td>
      </tr>
    </tbody>
  </table>




  <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Billing Address</td>
         </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
            {{ $oc_address->billing_name ?? ''}}
            <br>{{ $oc_address->billing_address ?? ''}}
            <br>{{ $oc_address->billing_city ?? ''}} {{ $oc_address->billing_postalcode ?? ''}}
            <br>{{ $oc_address->billing_province ?? ''}}
            <br>{{ $oc_address->billing_phone ?? ''}}
        </td>
         </tr>
    </tbody>
  </table>



  <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
    <thead>
      <tr>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Part Number</td>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">Model</td>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">SQB</td>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Quantity</td>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Price</td>
        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">Total</td>
      </tr>
    </thead>
    <tbody>

          <?php
            $i=0;
            ?>
        @foreach ($order_product as $item)

        <tr>

            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px"> {{ $item->partno->part_number ?? ''}}
              </td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">{{ $item->partno->nominal_thread_m ?? ''}}</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">{{ $item->partno->weight->description ?? ''}}</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">{{ $item->quantity ?? '' }}</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">₹{{ $item->partno->original_price ?? ''}}</td>
            <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">₹{{ $item->partno->original_price * $item->quantity * $item->partno->weight->name ?? '' }}</td>
          </tr>

        @endforeach
      </tbody>

    <tfoot>

        <tr>
      <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5"><b>Total:</b></td>
      <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">₹{{ $order->total ?? '' }}</td>
        </tr>


            <tr >
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5"><b>SubTotal:</b></td>
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">₹{{ $order->subtotal ?? '' }}</td>
            </tr>

                <tr>
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5"><b>IGST({{ $settings->igst }})%:</b></td>
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">₹{{ $order->igst ?? '' }}</td>
                </tr>



                    <tr>
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5"><b>CGST({{ $settings->cgst }})%:</b></td>
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">₹{{ $order->cgst }}</td>
                  </tr>


            <tr>
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5"><b>Shipping Price:</b></td>
                <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">₹{{ $order->shippingcharge }}</td>
                  </tr>


        <tr>
      <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5"><b>Total:</b></td>
      <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">₹{{ $order->grand_total }}</td>
        </tr>
          </tfoot>

  </table>
