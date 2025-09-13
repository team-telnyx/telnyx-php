<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Recordings;

use Telnyx\Client;
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
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['accountSid' => $accountSid];

        return $this->deleteRecordingSidJsonRaw(
            $recordingSid,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRecordingSidJsonRaw(
        string $recordingSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = JsonDeleteRecordingSidJsonParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
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
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): TexmlGetCallRecordingResponseBody {
        $params = ['accountSid' => $accountSid];

        return $this->retrieveRecordingSidJsonRaw(
            $recordingSid,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJsonRaw(
        string $recordingSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TexmlGetCallRecordingResponseBody {
        [$parsed, $options] = JsonRetrieveRecordingSidJsonParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
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
