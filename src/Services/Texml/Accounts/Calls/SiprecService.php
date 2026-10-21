<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\SiprecContract;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SiprecService implements SiprecContract
{
    /**
     * @api
     */
    public SiprecRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SiprecRawService($client);
    }

    /**
     * @api
     *
     * Updates siprec session identified by siprec_sid.
     *
     * @param string $siprecSid path param: The SiprecSid that uniquely identifies the Sip Recording
     * @param string $accountSid Path param: The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param Status|value-of<Status> $status Body param: The new status of the resource. Specifying `stopped` will end the siprec session.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function siprecSidJson(
        string $siprecSid,
        string $accountSid,
        string $callSid,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): SiprecSiprecSidJsonResponse {
        $params = array_filter(
            [
                'accountSid' => $accountSid,
                'callSid' => $callSid,
                'status' => $status ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->siprecSidJson($siprecSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
