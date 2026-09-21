<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\CallsRawContract;
use Telnyx\Texml\Calls\CallCreateParams;
use Telnyx\Texml\Calls\CallCreateParams\Method;
use Telnyx\Texml\Calls\CallNewResponse;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallsRawService implements CallsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Initiate an outbound TeXML call using a TeXML application connection ID, not an account SID. Request parameter names are case-sensitive. From and To are required; Texml supplies inline instructions and Url overrides the application XML request URL. When neither is supplied, the application configuration supplies the instructions. The response is a flat call object without a data wrapper.
     *
     * @param string $connectionID the ID of the connection holding the TeXML application to call from
     * @param array{
     *   from: string,
     *   to: string,
     *   method?: Method|value-of<Method>,
     *   texml?: string,
     *   url?: string,
     * }|CallCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array|CallCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['texml/calls/%1$s', $connectionID],
            body: (object) $parsed,
            options: $options,
            convert: CallNewResponse::class,
        );
    }
}
