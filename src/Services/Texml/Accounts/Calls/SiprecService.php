<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\SiprecContract;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

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
     * @param array{
     *   accountSid: string, callSid: string, status?: 'stopped'|Status
     * }|SiprecSiprecSidJsonParams $params
     *
     * @throws APIException
     */
    public function siprecSidJson(
        string $siprecSid,
        array|SiprecSiprecSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): SiprecSiprecSidJsonResponse {
        [$parsed, $options] = SiprecSiprecSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $callSid = $parsed['callSid'];
        unset($parsed['callSid']);

        /** @var BaseResponse<SiprecSiprecSidJsonResponse> */
        $response = $this->client->request(
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

        return $response->parse();
    }
}
