<?php
include('header.php');
?>
<div class="content-page">
   <div class="content">
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <!-- start page title -->
      <div class="row ">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Setup payment informations</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <div class="row">
         <div class="col-md-7" style="padding: 0;">
            <!-- System Currency Settings -->
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">
                        <p>System currency settings</p>
                     </h4>
                     <form class="" action="#/admin/payment_settings/system_currency" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>System currency</label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" id="system_currency" name="system_currency" required="" data-select2-id="system_currency" tabindex="-1" aria-hidden="true">
                              <option value="">Select system currency</option>
                              <option value="ALL"> ALL                                </option>
                              <option value="USD" selected="" data-select2-id="2"> USD                                </option>
                              <option value="AFN"> AFN                                </option>
                              <option value="ARS"> ARS                                </option>
                              <option value="AWG"> AWG                                </option>
                              <option value="AUD"> AUD                                </option>
                              <option value="AZN"> AZN                                </option>
                              <option value="BSD"> BSD                                </option>
                              <option value="BBD"> BBD                                </option>
                              <option value="BYR"> BYR                                </option>
                              <option value="EUR"> EUR                                </option>
                              <option value="BZD"> BZD                                </option>
                              <option value="BMD"> BMD                                </option>
                              <option value="BOB"> BOB                                </option>
                              <option value="BAM"> BAM                                </option>
                              <option value="BWP"> BWP                                </option>
                              <option value="BGN"> BGN                                </option>
                              <option value="BRL"> BRL                                </option>
                              <option value="GBP"> GBP                                </option>
                              <option value="BND"> BND                                </option>
                              <option value="KHR"> KHR                                </option>
                              <option value="CAD"> CAD                                </option>
                              <option value="KYD"> KYD                                </option>
                              <option value="CLP"> CLP                                </option>
                              <option value="CNY"> CNY                                </option>
                              <option value="COP"> COP                                </option>
                              <option value="CRC"> CRC                                </option>
                              <option value="HRK"> HRK                                </option>
                              <option value="CUP"> CUP                                </option>
                              <option value="CZK"> CZK                                </option>
                              <option value="DKK"> DKK                                </option>
                              <option value="DOP "> DOP                                 </option>
                              <option value="XCD"> XCD                                </option>
                              <option value="EGP"> EGP                                </option>
                              <option value="SVC"> SVC                                </option>
                              <option value="FKP"> FKP                                </option>
                              <option value="FJD"> FJD                                </option>
                              <option value="GHC"> GHC                                </option>
                              <option value="GIP"> GIP                                </option>
                              <option value="GTQ"> GTQ                                </option>
                              <option value="GGP"> GGP                                </option>
                              <option value="GYD"> GYD                                </option>
                              <option value="HNL"> HNL                                </option>
                              <option value="HKD"> HKD                                </option>
                              <option value="HUF"> HUF                                </option>
                              <option value="ISK"> ISK                                </option>
                              <option value="INR"> INR                                </option>
                              <option value="IDR"> IDR                                </option>
                              <option value="IRR"> IRR                                </option>
                              <option value="IMP"> IMP                                </option>
                              <option value="ILS"> ILS                                </option>
                              <option value="JMD"> JMD                                </option>
                              <option value="JPY"> JPY                                </option>
                              <option value="JEP"> JEP                                </option>
                              <option value="KZT"> KZT                                </option>
                              <option value="KPW"> KPW                                </option>
                              <option value="KRW"> KRW                                </option>
                              <option value="KGS"> KGS                                </option>
                              <option value="LAK"> LAK                                </option>
                              <option value="LVL"> LVL                                </option>
                              <option value="LBP"> LBP                                </option>
                              <option value="LRD"> LRD                                </option>
                              <option value="CHF"> CHF                                </option>
                              <option value="LTL"> LTL                                </option>
                              <option value="MKD"> MKD                                </option>
                              <option value="MYR"> MYR                                </option>
                              <option value="MUR"> MUR                                </option>
                              <option value="MXN"> MXN                                </option>
                              <option value="MNT"> MNT                                </option>
                              <option value="MZN"> MZN                                </option>
                              <option value="NAD"> NAD                                </option>
                              <option value="NPR"> NPR                                </option>
                              <option value="ANG"> ANG                                </option>
                              <option value="NZD"> NZD                                </option>
                              <option value="NIO"> NIO                                </option>
                              <option value="NGN"> NGN                                </option>
                              <option value="NOK"> NOK                                </option>
                              <option value="OMR"> OMR                                </option>
                              <option value="PKR"> PKR                                </option>
                              <option value="PAB"> PAB                                </option>
                              <option value="PYG"> PYG                                </option>
                              <option value="PEN"> PEN                                </option>
                              <option value="PHP"> PHP                                </option>
                              <option value="PLN"> PLN                                </option>
                              <option value="QAR"> QAR                                </option>
                              <option value="RON"> RON                                </option>
                              <option value="RUB"> RUB                                </option>
                              <option value="SHP"> SHP                                </option>
                              <option value="SAR"> SAR                                </option>
                              <option value="RSD"> RSD                                </option>
                              <option value="SCR"> SCR                                </option>
                              <option value="SGD"> SGD                                </option>
                              <option value="SBD"> SBD                                </option>
                              <option value="SOS"> SOS                                </option>
                              <option value="ZAR"> ZAR                                </option>
                              <option value="LKR"> LKR                                </option>
                              <option value="SEK"> SEK                                </option>
                              <option value="SRD"> SRD                                </option>
                              <option value="SYP"> SYP                                </option>
                              <option value="TWD"> TWD                                </option>
                              <option value="THB"> THB                                </option>
                              <option value="TTD"> TTD                                </option>
                              <option value="TRY"> TRY                                </option>
                              <option value="TRL"> TRL                                </option>
                              <option value="TVD"> TVD                                </option>
                              <option value="UAH"> UAH                                </option>
                              <option value="UYU"> UYU                                </option>
                              <option value="UZS"> UZS                                </option>
                              <option value="VEF"> VEF                                </option>
                              <option value="VND"> VND                                </option>
                              <option value="YER"> YER                                </option>
                              <option value="ZWD"> ZWD                                </option>
                           </select>
              
                        </div>
                        <div class="form-group">
                           <label>Currency position</label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" id="currency_position" name="currency_position" required="" data-select2-id="currency_position" tabindex="-1" aria-hidden="true">
                              <option value="left" selected="" data-select2-id="4">Left</option>
                              <option value="right">Right</option>
                              <option value="left-space">Left with a space</option>
                              <option value="right-space">Right with a space</option>
                           </select>
                        </div>
                        <div class="row justify-content-md-center">
                           <div class="form-group col-md-6">
                              <button class="btn btn-block btn-primary" type="submit">Update system currency</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">
                        <p>Setup paypal settings</p>
                     </h4>
                     <form class="" action="#/admin/payment_settings/paypal_settings" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Active</label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" id="paypal_active" name="paypal_active" data-select2-id="paypal_active" tabindex="-1" aria-hidden="true">
                              <option value="0"> No</option>
                              <option value="1" selected="" data-select2-id="6"> Yes</option>
                           </select>
            
                        </div>
                        <div class="form-group">
                           <label>Mode</label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" id="paypal_mode" name="paypal_mode" data-select2-id="paypal_mode" tabindex="-1" aria-hidden="true">
                              <option value="sandbox" selected="" data-select2-id="8"> Sandbox</option>
                              <option value="production"> Production</option>
                           </select>
            
                        </div>
                        <div class="form-group">
                           <label>Paypal currency</label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" id="paypal_currency" name="paypal_currency" required="" data-select2-id="paypal_currency" tabindex="-1" aria-hidden="true">
                              <option value="">Select paypal currency</option>
                              <option value="USD" selected="" data-select2-id="10"> USD                            </option>
                              <option value="AUD"> AUD                            </option>
                              <option value="EUR"> EUR                            </option>
                              <option value="BRL"> BRL                            </option>
                              <option value="GBP"> GBP                            </option>
                              <option value="CAD"> CAD                            </option>
                              <option value="CZK"> CZK                            </option>
                              <option value="DKK"> DKK                            </option>
                              <option value="HKD"> HKD                            </option>
                              <option value="HUF"> HUF                            </option>
                              <option value="INR"> INR                            </option>
                              <option value="ILS"> ILS                            </option>
                              <option value="JPY"> JPY                            </option>
                              <option value="CHF"> CHF                            </option>
                              <option value="MYR"> MYR                            </option>
                              <option value="MXN"> MXN                            </option>
                              <option value="NZD"> NZD                            </option>
                              <option value="NOK"> NOK                            </option>
                              <option value="PHP"> PHP                            </option>
                              <option value="PLN"> PLN                            </option>
                              <option value="RUB"> RUB                            </option>
                              <option value="SGD"> SGD                            </option>
                              <option value="SEK"> SEK                            </option>
                              <option value="TWD"> TWD                            </option>
                              <option value="THB"> THB                            </option>
                           </select>
                 
                        </div>
                        <div class="form-group">
                           <label>Client id (Sandbox)</label>
                           <input type="text" name="sandbox_client_id" class="form-control" value="AY_-L6KttfRzyNieXd07urH4vLHIwpeyfj3zNN5ahTBu2A9N0OUgfjE_KB0Z6ibpbivoOH05YLniPYy1" required="">
                        </div>
                        <div class="form-group">
                           <label>Secret key (Sandbox)</label>
                           <input type="text" name="sandbox_secret_key" class="form-control" value="EEmsBqTfyBPOCUcJQ4YgfqEeh2NVNTHWnf5GONSgE9yTTwv7otDbUKnqk53an2lHnK24zDZfVUcHt2B3" required="">
                        </div>
                        <div class="form-group">
                           <label>Client id (Production)</label>
                           <input type="text" name="production_client_id" class="form-control" value="1234" required="">
                        </div>
                        <div class="form-group">
                           <label>Secret key (Production)</label>
                           <input type="text" name="production_secret_key" class="form-control" value="1234" required="">
                        </div>
                        <div class="row justify-content-md-center">
                           <div class="form-group col-md-6">
                              <button class="btn btn-block btn-primary" type="submit">Update paypal keys</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">
                        <p>Setup stripe settings</p>
                     </h4>
                     <form class="" action="#/admin/payment_settings/stripe_settings" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Active</label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" id="stripe_active" name="stripe_active" data-select2-id="stripe_active" tabindex="-1" aria-hidden="true">
                              <option value="0"> No</option>
                              <option value="1" selected="" data-select2-id="12"> Yes</option>
                           </select>
                 
                        </div>
                        <div class="form-group">
                           <label>Test mode</label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" id="testmode" name="testmode" data-select2-id="testmode" tabindex="-1" aria-hidden="true">
                              <option value="on" selected="" data-select2-id="14"> On</option>
                              <option value="off"> Off</option>
                           </select>
                 
                        </div>
                        <div class="form-group">
                           <label>Stripe currency</label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" id="stripe_currency" name="stripe_currency" required="" data-select2-id="stripe_currency" tabindex="-1" aria-hidden="true">
                              <option value="">Select stripe currency</option>
                              <option value="ALL"> ALL                        </option>
                              <option value="USD" selected="" data-select2-id="16"> USD                        </option>
                              <option value="AFN"> AFN                        </option>
                              <option value="ARS"> ARS                        </option>
                              <option value="AWG"> AWG                        </option>
                              <option value="AUD"> AUD                        </option>
                              <option value="AZN"> AZN                        </option>
                              <option value="BSD"> BSD                        </option>
                              <option value="BBD"> BBD                        </option>
                              <option value="EUR"> EUR                        </option>
                              <option value="BZD"> BZD                        </option>
                              <option value="BMD"> BMD                        </option>
                              <option value="BOB"> BOB                        </option>
                              <option value="BAM"> BAM                        </option>
                              <option value="BWP"> BWP                        </option>
                              <option value="BGN"> BGN                        </option>
                              <option value="BRL"> BRL                        </option>
                              <option value="GBP"> GBP                        </option>
                              <option value="BND"> BND                        </option>
                              <option value="KHR"> KHR                        </option>
                              <option value="CAD"> CAD                        </option>
                              <option value="KYD"> KYD                        </option>
                              <option value="CLP"> CLP                        </option>
                              <option value="CNY"> CNY                        </option>
                              <option value="COP"> COP                        </option>
                              <option value="CRC"> CRC                        </option>
                              <option value="HRK"> HRK                        </option>
                              <option value="CZK"> CZK                        </option>
                              <option value="DKK"> DKK                        </option>
                              <option value="DOP "> DOP                         </option>
                              <option value="XCD"> XCD                        </option>
                              <option value="EGP"> EGP                        </option>
                              <option value="FKP"> FKP                        </option>
                              <option value="FJD"> FJD                        </option>
                              <option value="GIP"> GIP                        </option>
                              <option value="GTQ"> GTQ                        </option>
                              <option value="GYD"> GYD                        </option>
                              <option value="HNL"> HNL                        </option>
                              <option value="HKD"> HKD                        </option>
                              <option value="HUF"> HUF                        </option>
                              <option value="ISK"> ISK                        </option>
                              <option value="INR"> INR                        </option>
                              <option value="IDR"> IDR                        </option>
                              <option value="ILS"> ILS                        </option>
                              <option value="JMD"> JMD                        </option>
                              <option value="JPY"> JPY                        </option>
                              <option value="KZT"> KZT                        </option>
                              <option value="KRW"> KRW                        </option>
                              <option value="KGS"> KGS                        </option>
                              <option value="LAK"> LAK                        </option>
                              <option value="LBP"> LBP                        </option>
                              <option value="LRD"> LRD                        </option>
                              <option value="CHF"> CHF                        </option>
                              <option value="MKD"> MKD                        </option>
                              <option value="MYR"> MYR                        </option>
                              <option value="MUR"> MUR                        </option>
                              <option value="MXN"> MXN                        </option>
                              <option value="MNT"> MNT                        </option>
                              <option value="MZN"> MZN                        </option>
                              <option value="NAD"> NAD                        </option>
                              <option value="NPR"> NPR                        </option>
                              <option value="ANG"> ANG                        </option>
                              <option value="NZD"> NZD                        </option>
                              <option value="NIO"> NIO                        </option>
                              <option value="NGN"> NGN                        </option>
                              <option value="NOK"> NOK                        </option>
                              <option value="PKR"> PKR                        </option>
                              <option value="PAB"> PAB                        </option>
                              <option value="PYG"> PYG                        </option>
                              <option value="PEN"> PEN                        </option>
                              <option value="PHP"> PHP                        </option>
                              <option value="PLN"> PLN                        </option>
                              <option value="QAR"> QAR                        </option>
                              <option value="RON"> RON                        </option>
                              <option value="RUB"> RUB                        </option>
                              <option value="SHP"> SHP                        </option>
                              <option value="SAR"> SAR                        </option>
                              <option value="RSD"> RSD                        </option>
                              <option value="SCR"> SCR                        </option>
                              <option value="SGD"> SGD                        </option>
                              <option value="SBD"> SBD                        </option>
                              <option value="SOS"> SOS                        </option>
                              <option value="ZAR"> ZAR                        </option>
                              <option value="LKR"> LKR                        </option>
                              <option value="SEK"> SEK                        </option>
                              <option value="SRD"> SRD                        </option>
                              <option value="TWD"> TWD                        </option>
                              <option value="THB"> THB                        </option>
                              <option value="TTD"> TTD                        </option>
                              <option value="TRY"> TRY                        </option>
                              <option value="UAH"> UAH                        </option>
                              <option value="UYU"> UYU                        </option>
                              <option value="UZS"> UZS                        </option>
                              <option value="VND"> VND                        </option>
                              <option value="YER"> YER                        </option>
                           </select>
             
                        </div>
                        <div class="form-group">
                           <label>Test secret key</label>
                           <input type="text" name="secret_key" class="form-control" value="sk_test_iatnshcHhQVRXdygXw3L2Pp2" required="">
                        </div>
                        <div class="form-group">
                           <label>Test public key</label>
                           <input type="text" name="public_key" class="form-control" value="pk_test_CAC3cB1mhgkJqXtypYBTGb4f" required="">
                        </div>
                        <div class="form-group">
                           <label>Live secret key</label>
                           <input type="text" name="secret_live_key" class="form-control" value="sk_live_xxxxxxxxxxxxxxxxxxxxxxxx" required="">
                        </div>
                        <div class="form-group">
                           <label>Live public key</label>
                           <input type="text" name="public_live_key" class="form-control" value="pk_live_xxxxxxxxxxxxxxxxxxxxxxxx" required="">
                        </div>
                        <div class="row justify-content-md-center">
                           <div class="form-group col-md-6">
                              <button class="btn btn-block btn-primary" type="submit">Update stripe keys</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!--Paystack payment gateway addon-->
            <!--payumoney payment gateway addon-->
            <!--razorpay payment gateway addon-->
            <!--instamojo payment gateway addon-->
            <!--pagseguro payment gateway addon-->
            <!--mercadopago payment gateway addon-->
            <!--ccavenue payment gateway addon-->
            <!--flutterwave payment gateway addon-->
            <!--paytm payment gateway addon-->
         </div>
         <div class="col-md-5">
            <div class="alert alert-info" role="alert">
               <h4 class="alert-heading">Heads up!</h4>
               <p>Please make sure that "System currency", "Paypal currency" and "Stripe currency" Are same.</p>
            </div>
         </div>
      </div>
      <!-- END PLACE PAGE CONTENT HERE -->
   </div>
</div>

<?php
include('footer.php');
?>