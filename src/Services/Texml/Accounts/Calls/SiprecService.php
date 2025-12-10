<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\SiprecContract;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

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
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param 'stopped'|Status $status Body param: The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @throws APIException
     */
    public function siprecSidJson(
        string $siprecSid,
        string $accountSid,
        string $callSid,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): SiprecSiprecSidJsonResponse {
        $params = Util::removeNulls(
            ['accountSid' => $accountSid, 'callSid' => $callSid, 'status' => $status]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->siprecSidJson($siprecSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
