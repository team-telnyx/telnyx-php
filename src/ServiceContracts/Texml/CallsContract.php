<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Calls\CallCreateParams\Method;
use Telnyx\Texml\Calls\CallNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallsContract
{
    /**
     * @api
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
    ): CallNewResponse;
}
