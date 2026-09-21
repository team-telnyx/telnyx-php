<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\CallsContract;
use Telnyx\Texml\Calls\CallCreateParams\Method;
use Telnyx\Texml\Calls\CallNewResponse;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallsService implements CallsContract
{
    /**
     * @api
     */
    public CallsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallsRawService($client);
    }

    /**
     * @api
     *
     * Initiate an outbound TeXML call using a TeXML application connection ID, not an account SID. Request parameter names are case-sensitive. From and To are required; Texml supplies inline instructions and Url overrides the application XML request URL. When neither is supplied, the application configuration supplies the instructions. The response is a flat call object without a data wrapper.
     *
     * @param string $connectionID the ID of the connection holding the TeXML application to call from
     * @param string $from The E.164-formatted phone number or SIP URI to present as the caller.
     * @param string $to The E.164-formatted phone number or SIP URI to call.
     * @param Method|value-of<Method> $method HTTP method used to retrieve TeXML instructions from Url
     * @param string $texml inline TeXML instructions to execute when the call is answered
     * @param string $url The URL from which to retrieve TeXML instructions. Overrides the TeXML application XML request URL.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        string $from,
        string $to,
        Method|string|null $method = null,
        ?string $texml = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallNewResponse {
        $params = array_filter(
            [
                'from' => $from,
                'to' => $to,
                'method' => $method ?? Omitted::VALUE,
                'texml' => $texml ?? Omitted::VALUE,
                'url' => $url ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($connectionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
