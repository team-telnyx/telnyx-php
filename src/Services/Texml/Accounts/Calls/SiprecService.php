<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\SiprecContract;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

use const Telnyx\Core\OMIT as omit;

final class SiprecService implements SiprecContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Updates siprec session identified by siprec_sid.
     *
     * @param string $accountSid
     * @param string $callSid
     * @param Status|value-of<Status> $status The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @return SiprecSiprecSidJsonResponse<HasRawResponse>
     */
    public function siprecSidJson(
        string $siprecSid,
        $accountSid,
        $callSid,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): SiprecSiprecSidJsonResponse {
        [$parsed, $options] = SiprecSiprecSidJsonParams::parseRequest(
            ['accountSid' => $accountSid, 'callSid' => $callSid, 'status' => $status],
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $callSid = $parsed['callSid'];
        unset($parsed['callSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Siprec/%3$s.json',
                $accountSid,
                $callSid,
                $siprecSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['accountSid', 'callSid'])
            ),
            options: $options,
            convert: SiprecSiprecSidJsonResponse::class,
        );
    }
}
