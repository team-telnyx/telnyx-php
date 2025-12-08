<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsJsonContract;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRetrieveRecordingsJsonParams;

final class RecordingsJsonService implements RecordingsJsonContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Starts recording with specified parameters for call idientified by call_sid.
     *
     * @param array{
     *   account_sid: string,
     *   PlayBeep?: bool,
     *   RecordingChannels?: 'single'|'dual',
     *   RecordingStatusCallback?: string,
     *   RecordingStatusCallbackEvent?: string,
     *   RecordingStatusCallbackMethod?: 'GET'|'POST',
     *   RecordingTrack?: 'inbound'|'outbound'|'both',
     *   SendRecordingUrl?: bool,
     * }|RecordingsJsonRecordingsJsonParams $params
     *
     * @throws APIException
     */
    public function recordingsJson(
        string $callSid,
        array|RecordingsJsonRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingsJsonRecordingsJsonResponse {
        [$parsed, $options] = RecordingsJsonRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<RecordingsJsonRecordingsJsonResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Recordings.json', $accountSid, $callSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['account_sid']),
            options: $options,
            convert: RecordingsJsonRecordingsJsonResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns recordings for a call identified by call_sid.
     *
     * @param array{
     *   account_sid: string
     * }|RecordingsJsonRetrieveRecordingsJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $callSid,
        array|RecordingsJsonRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingsJsonGetRecordingsJsonResponse {
        [$parsed, $options] = RecordingsJsonRetrieveRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<RecordingsJsonGetRecordingsJsonResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Recordings.json', $accountSid, $callSid,
            ],
            options: $options,
            convert: RecordingsJsonGetRecordingsJsonResponse::class,
        );

        return $response->parse();
    }
}
