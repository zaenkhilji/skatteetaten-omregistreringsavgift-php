<?php
/**
 * OmregistreringsavgiftApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Omregistreringsavgift API
 *
 * Tjenesten leverer omregistreringsavgiften for kjøretøy spesifisert av kjennemerke og eventuelt omregistreringsdato.
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.35
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * OmregistreringsavgiftApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OmregistreringsavgiftApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation hentOmregistreringsavgift
     *
     * Hent omregistreringsavgift
     *
     * @param  string $kjennemerke Kjennemerket på kjøretøyet avgiften gjelder for (required)
     * @param  string $rettighetspakke Datakonsumenter plasseres i en rettighetspakke (per datasett) basert på en juridisk vurdering. Rettighetspakken styrer skjermingsregler, filtrering og detaljering som benyttes når det gis innsyn i data i datasett. (required)
     * @param  string $omregistreringsdato Dato avgiftsbeløpet gjelder for, default verdi er dagens dato. Skal være på ISO 8601 format åååå-mm-dd eller ååååmmdd (optional)
     * @param  string $korrelasjonsid Korrelasjonsid, unik identifikator for den tekniske forespørselen. Må være på UUID-format (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\Omregistreringsavgift
     */
    public function hentOmregistreringsavgift($kjennemerke, $rettighetspakke, $omregistreringsdato = null, $korrelasjonsid = null)
    {
        list($response) = $this->hentOmregistreringsavgiftWithHttpInfo($kjennemerke, $rettighetspakke, $omregistreringsdato, $korrelasjonsid);
        return $response;
    }

    /**
     * Operation hentOmregistreringsavgiftWithHttpInfo
     *
     * Hent omregistreringsavgift
     *
     * @param  string $kjennemerke Kjennemerket på kjøretøyet avgiften gjelder for (required)
     * @param  string $rettighetspakke Datakonsumenter plasseres i en rettighetspakke (per datasett) basert på en juridisk vurdering. Rettighetspakken styrer skjermingsregler, filtrering og detaljering som benyttes når det gis innsyn i data i datasett. (required)
     * @param  string $omregistreringsdato Dato avgiftsbeløpet gjelder for, default verdi er dagens dato. Skal være på ISO 8601 format åååå-mm-dd eller ååååmmdd (optional)
     * @param  string $korrelasjonsid Korrelasjonsid, unik identifikator for den tekniske forespørselen. Må være på UUID-format (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\Omregistreringsavgift, HTTP status code, HTTP response headers (array of strings)
     */
    public function hentOmregistreringsavgiftWithHttpInfo($kjennemerke, $rettighetspakke, $omregistreringsdato = null, $korrelasjonsid = null)
    {
        $returnType = '\Swagger\Client\Model\Omregistreringsavgift';
        $request = $this->hentOmregistreringsavgiftRequest($kjennemerke, $rettighetspakke, $omregistreringsdato, $korrelasjonsid);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Omregistreringsavgift',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Feil',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation hentOmregistreringsavgiftAsync
     *
     * Hent omregistreringsavgift
     *
     * @param  string $kjennemerke Kjennemerket på kjøretøyet avgiften gjelder for (required)
     * @param  string $rettighetspakke Datakonsumenter plasseres i en rettighetspakke (per datasett) basert på en juridisk vurdering. Rettighetspakken styrer skjermingsregler, filtrering og detaljering som benyttes når det gis innsyn i data i datasett. (required)
     * @param  string $omregistreringsdato Dato avgiftsbeløpet gjelder for, default verdi er dagens dato. Skal være på ISO 8601 format åååå-mm-dd eller ååååmmdd (optional)
     * @param  string $korrelasjonsid Korrelasjonsid, unik identifikator for den tekniske forespørselen. Må være på UUID-format (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function hentOmregistreringsavgiftAsync($kjennemerke, $rettighetspakke, $omregistreringsdato = null, $korrelasjonsid = null)
    {
        return $this->hentOmregistreringsavgiftAsyncWithHttpInfo($kjennemerke, $rettighetspakke, $omregistreringsdato, $korrelasjonsid)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation hentOmregistreringsavgiftAsyncWithHttpInfo
     *
     * Hent omregistreringsavgift
     *
     * @param  string $kjennemerke Kjennemerket på kjøretøyet avgiften gjelder for (required)
     * @param  string $rettighetspakke Datakonsumenter plasseres i en rettighetspakke (per datasett) basert på en juridisk vurdering. Rettighetspakken styrer skjermingsregler, filtrering og detaljering som benyttes når det gis innsyn i data i datasett. (required)
     * @param  string $omregistreringsdato Dato avgiftsbeløpet gjelder for, default verdi er dagens dato. Skal være på ISO 8601 format åååå-mm-dd eller ååååmmdd (optional)
     * @param  string $korrelasjonsid Korrelasjonsid, unik identifikator for den tekniske forespørselen. Må være på UUID-format (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function hentOmregistreringsavgiftAsyncWithHttpInfo($kjennemerke, $rettighetspakke, $omregistreringsdato = null, $korrelasjonsid = null)
    {
        $returnType = '\Swagger\Client\Model\Omregistreringsavgift';
        $request = $this->hentOmregistreringsavgiftRequest($kjennemerke, $rettighetspakke, $omregistreringsdato, $korrelasjonsid);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'hentOmregistreringsavgift'
     *
     * @param  string $kjennemerke Kjennemerket på kjøretøyet avgiften gjelder for (required)
     * @param  string $rettighetspakke Datakonsumenter plasseres i en rettighetspakke (per datasett) basert på en juridisk vurdering. Rettighetspakken styrer skjermingsregler, filtrering og detaljering som benyttes når det gis innsyn i data i datasett. (required)
     * @param  string $omregistreringsdato Dato avgiftsbeløpet gjelder for, default verdi er dagens dato. Skal være på ISO 8601 format åååå-mm-dd eller ååååmmdd (optional)
     * @param  string $korrelasjonsid Korrelasjonsid, unik identifikator for den tekniske forespørselen. Må være på UUID-format (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function hentOmregistreringsavgiftRequest($kjennemerke, $rettighetspakke, $omregistreringsdato = null, $korrelasjonsid = null)
    {
        // verify the required parameter 'kjennemerke' is set
        if ($kjennemerke === null || (is_array($kjennemerke) && count($kjennemerke) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $kjennemerke when calling hentOmregistreringsavgift'
            );
        }
        // verify the required parameter 'rettighetspakke' is set
        if ($rettighetspakke === null || (is_array($rettighetspakke) && count($rettighetspakke) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $rettighetspakke when calling hentOmregistreringsavgift'
            );
        }

        $resourcePath = '/{rettighetspakke}/{kjennemerke}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($omregistreringsdato !== null) {
            $queryParams['omregistreringsdato'] = ObjectSerializer::toQueryValue($omregistreringsdato, null);
        }
        // header params
        if ($korrelasjonsid !== null) {
            $headerParams['Korrelasjonsid'] = ObjectSerializer::toHeaderValue($korrelasjonsid);
        }

        // path params
        if ($kjennemerke !== null) {
            $resourcePath = str_replace(
                '{' . 'kjennemerke' . '}',
                ObjectSerializer::toPathValue($kjennemerke),
                $resourcePath
            );
        }
        // path params
        if ($rettighetspakke !== null) {
            $resourcePath = str_replace(
                '{' . 'rettighetspakke' . '}',
                ObjectSerializer::toPathValue($rettighetspakke),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
