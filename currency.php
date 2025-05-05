<?

 $client = new SoapClient('http://nbg.gov.ge/currency.wsdl');
 print $client->GetCurrencyDescription('USD').'<br>';
 print $client->GetCurrency('USD').'<br>';
 print $client->GetCurrencyRate('USD').'<br>';
 print $client->GetCurrencyChange('USD').'<br>';
 print $client->GetDate().'<br>';
 

?>