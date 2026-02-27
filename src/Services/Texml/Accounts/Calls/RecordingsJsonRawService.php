<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsJsonRawContract;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRetrieveRecordingsJsonParams;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecordingsJsonRawService implements RecordingsJsonRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Starts recording with specified parameters for call idientified by call_sid.
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param array{
     *   accountSid: string,
     *   playBeep?: bool,
     *   recordingChannels?: RecordingChannels|value-of<RecordingChannels>,
     *   recordingStatusCallback?: string,
     *   recordingStatusCallbackEvent?: string,
     *   recordingStatusCallbackMethod?: RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
     *   recordingTrack?: RecordingTrack|value-of<RecordingTrack>,
     *   sendRecordingURL?: bool,
     * }|RecordingsJsonRecordingsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingsJsonRecordingsJsonResponse>
     *
     * @throws APIException
     */
    public function recordingsJson(
        string $callSid,
        array|RecordingsJsonRecordingsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecordingsJsonRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Recordings.json', $accountSid, $callSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, array_flip(['accountSid'])),
            options: $options,
            convert: RecordingsJsonRecordingsJsonResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns recordings for a call identified by call_sid.
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param array{
     *   accountSid: string
     * }|RecordingsJsonRetrieveRecordingsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingsJsonGetRecordingsJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $callSid,
        array|RecordingsJsonRetrieveRecordingsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecordingsJsonRetrieveRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Recordings.json', $accountSid, $callSid,
            ],
            options: $options,
            convert: RecordingsJsonGetRecordingsJsonResponse::class,
        );
    }
}
