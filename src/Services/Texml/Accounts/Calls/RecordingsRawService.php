<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsRawContract;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecordingsRawService implements RecordingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Updates recording resource for particular call.
     *
     * @param string $recordingSid path param: Uniquely identifies the recording by id
     * @param array{
     *   accountSid: string, callSid: string, status?: Status|value-of<Status>
     * }|RecordingRecordingSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingRecordingSidJsonResponse>
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        array|RecordingRecordingSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecordingRecordingSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $callSid = $parsed['callSid'];
        unset($parsed['callSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Recordings/%3$s.json',
                $accountSid,
                $callSid,
                $recordingSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['accountSid', 'callSid'])
            ),
            options: $options,
            convert: RecordingRecordingSidJsonResponse::class,
        );
    }
}
