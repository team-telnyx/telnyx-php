<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Recordings;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Recordings\JsonContract;
use Telnyx\Texml\Accounts\Recordings\Json\JsonDeleteRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Recordings\Json\JsonRetrieveRecordingSidJsonParams;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

final class JsonService implements JsonContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Deletes recording resource identified by recording id.
     *
     * @param array{account_sid: string}|JsonDeleteRecordingSidJsonParams $params
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        array|JsonDeleteRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = JsonDeleteRecordingSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'texml/Accounts/%1$s/Recordings/%2$s.json', $accountSid, $recordingSid,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns recording resource identified by recording id.
     *
     * @param array{account_sid: string}|JsonRetrieveRecordingSidJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        array|JsonRetrieveRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): TexmlGetCallRecordingResponseBody {
        [$parsed, $options] = JsonRetrieveRecordingSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<TexmlGetCallRecordingResponseBody> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Recordings/%2$s.json', $accountSid, $recordingSid,
            ],
            options: $options,
            convert: TexmlGetCallRecordingResponseBody::class,
        );

        return $response->parse();
    }
}
