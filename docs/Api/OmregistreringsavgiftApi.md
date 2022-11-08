# Swagger\Client\OmregistreringsavgiftApi

All URIs are relative to *https://api-test.sits.no/api/omregistreringsavgift/v1/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**hentOmregistreringsavgift**](OmregistreringsavgiftApi.md#hentomregistreringsavgift) | **GET** /{rettighetspakke}/{kjennemerke} | Hent omregistreringsavgift

# **hentOmregistreringsavgift**
> \Swagger\Client\Model\Omregistreringsavgift hentOmregistreringsavgift($kjennemerke, $rettighetspakke, $omregistreringsdato, $korrelasjonsid)

Hent omregistreringsavgift

Hent omregistreringsavgift for et oppgitt kjennemerke

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\OmregistreringsavgiftApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$kjennemerke = "kjennemerke_example"; // string | Kjennemerket på kjøretøyet avgiften gjelder for
$rettighetspakke = "rettighetspakke_example"; // string | Datakonsumenter plasseres i en rettighetspakke (per datasett) basert på en juridisk vurdering. Rettighetspakken styrer skjermingsregler, filtrering og detaljering som benyttes når det gis innsyn i data i datasett.
$omregistreringsdato = "omregistreringsdato_example"; // string | Dato avgiftsbeløpet gjelder for, default verdi er dagens dato. Skal være på ISO 8601 format åååå-mm-dd eller ååååmmdd
$korrelasjonsid = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | Korrelasjonsid, unik identifikator for den tekniske forespørselen. Må være på UUID-format

try {
    $result = $apiInstance->hentOmregistreringsavgift($kjennemerke, $rettighetspakke, $omregistreringsdato, $korrelasjonsid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OmregistreringsavgiftApi->hentOmregistreringsavgift: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **kjennemerke** | **string**| Kjennemerket på kjøretøyet avgiften gjelder for |
 **rettighetspakke** | **string**| Datakonsumenter plasseres i en rettighetspakke (per datasett) basert på en juridisk vurdering. Rettighetspakken styrer skjermingsregler, filtrering og detaljering som benyttes når det gis innsyn i data i datasett. |
 **omregistreringsdato** | **string**| Dato avgiftsbeløpet gjelder for, default verdi er dagens dato. Skal være på ISO 8601 format åååå-mm-dd eller ååååmmdd | [optional]
 **korrelasjonsid** | [**string**](../Model/.md)| Korrelasjonsid, unik identifikator for den tekniske forespørselen. Må være på UUID-format | [optional]

### Return type

[**\Swagger\Client\Model\Omregistreringsavgift**](../Model/Omregistreringsavgift.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

