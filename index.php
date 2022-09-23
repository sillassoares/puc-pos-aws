<?php
$urlWsdl = 'http://www.dneonline.com/calculator.asmx?WSDL';
try {
    $soapClient = new \SoapClient($urlWsdl, [
            'exceptions' => true
        ]);

    $intA = rand(1, 100);
    $intB = rand(1, 100);

    $requestAdd = [ 'intA' => $intA, 'intB' => $intB];
    $response = $soapClient->Add($requestAdd);

    print_r("Response Add: $intA + $intB = $response->AddResult". PHP_EOL);

    $requestMultiply = [ 'intA' => $intA, 'intB' => $intB];
    $response = $soapClient->Multiply($requestMultiply);

    print_r("Response Multiply: $intA * $intB = $response->MultiplyResult". PHP_EOL);

    $intA = rand(50, 100);
    $intB = rand(1, 49);
    $requestSubtract =  [ 'intA' => $intA, 'intB' => $intB];
    $response = $soapClient->Subtract($requestSubtract);

    print_r("Response Subtract: $intA - $intB = $response->SubtractResult". PHP_EOL);

    } catch (SoapFault $exception) {
        echo $exception->getMessage();
        return;
    }
?>