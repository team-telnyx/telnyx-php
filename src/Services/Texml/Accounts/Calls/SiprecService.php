<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\SiprecContract;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams;
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
     *   account_sid: string, call_sid: string, Status?: 'stopped'
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);
        $callSid = $parsed['call_sid'];
        unset($parsed['call_sid']);

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
                array_flip(['account_sid', 'call_sid'])
            ),
            options: $options,
            convert: SiprecSiprecSidJsonResponse::class,
        );

        return $response->parse();
    }
}
