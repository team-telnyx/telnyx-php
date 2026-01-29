<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Recordings;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Recordings\JsonRawContract;
use Telnyx\Texml\Accounts\Recordings\Json\JsonDeleteRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Recordings\Json\JsonRetrieveRecordingSidJsonParams;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class JsonRawService implements JsonRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Deletes recording resource identified by recording id.
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param array{accountSid: string}|JsonDeleteRecordingSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        array|JsonDeleteRecordingSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JsonDeleteRecordingSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'texml/Accounts/%1$s/Recordings/%2$s.json', $accountSid, $recordingSid,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns recording resource identified by recording id.
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param array{accountSid: string}|JsonRetrieveRecordingSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlGetCallRecordingResponseBody>
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        array|JsonRetrieveRecordingSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JsonRetrieveRecordingSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Recordings/%2$s.json', $accountSid, $recordingSid,
            ],
            options: $options,
            convert: TexmlGetCallRecordingResponseBody::class,
        );
    }
}
