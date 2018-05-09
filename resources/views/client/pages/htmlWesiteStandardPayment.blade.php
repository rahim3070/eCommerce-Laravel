<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <title>Website Payment Standard</title>
        <script type="text/javascript" language="javascript">

            function paypal_submit()
            {
                //For Live Operation Mode
                //var actionName='https://www.paypal.com/cgi-bin/webscr';

                //For Testing Mode        
                var actionName = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

                document.forms.frmOrderAutoSubmit.action = actionName;
                document.forms.frmOrderAutoSubmit.submit());
            }
        </script>
    </head>
    <!--onload='paypal_submit();"-->
    <body onload="paypal_submit();" >
        <form style="padding:0px; margin:0px;" name="frmOrderAutoSubmit" method="post">
<!--            For Order Return 
            <input type="hidden" name="return" value="<?//=base_url()?>paymentMethods/payment_utility/paymentSuccess/<?//=$order_row_id?>.html">
                For Cancel Return
                <input type="hidden" name="cancel_return" value="<?//=base_url()?>paymentMethods/payment_utility/cancelExpressCheckoutSale/<?//=$order_row_id?>.html">-->

                    <!--Start Paypal Info-->
                    <input type="hidden" name="upload" value="1">
                        <input type="hidden" name="cmd" value="_xclick">                    
                            <input type="hidden" name="business" value="topu1826@gmail.com"> <!--This is PayPal ID-->
                                <!--End Paypal Info-->

                                <!--Start Product Info-->
                                <input type="hidden" name="quantity" value="2" />
                                <input type="hidden" name="item_name" value="laptop">
                                    <input type="hidden" name="amount" value="1000">
                                        <!--End Product Info-->

                                        <!--Start Shipping Info-->
                                        <input type="hidden" name="rm" value="2" />
                                        <input TYPE="hidden" name="address_override" value="0">
                                            <input type="hidden" name="ﬁrst_name" value="<?//=$customer_info->shipping>">
                                                <input type="hidden" name='last_name' value="">
                                                    <input type="hidden" name=“address1" value="">
                                                        <input type="hidden" name="address2" value="">
                                                            <input type="hidden" name="city" value="">
                                                                <input type="hidden" name="state" value="">
                                                                    <input type="hidden" name="zip" value="">
                                                                        <!--End Shipping Info-->

<!--<input type="hidden" name="night_phone_a" value="">
<input type="hidden" name:"night_phone_b" value="">
<input type="hidden" name="night_phone_c" value=""> -->
                                                                        </form>
                                                                        </body>
                                                                        </html>