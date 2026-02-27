<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsContract;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecordingsService implements RecordingsContract
{
    /**
     * @api
     */
    public RecordingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RecordingsRawService($client);
    }

    /**
     * @api
     *
     * Updates recording resource for particular call.
     *
     * @param string $recordingSid path param: Uniquely identifies the recording by id
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param Status|value-of<Status> $status Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        string $accountSid,
        string $callSid,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingRecordingSidJsonResponse {
        $params = Util::removeNulls(
            ['accountSid' => $accountSid, 'callSid' => $callSid, 'status' => $status]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordingSidJson($recordingSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
