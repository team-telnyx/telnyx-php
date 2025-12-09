<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsContract;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

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
     * @param 'in-progress'|'paused'|'stopped'|Status $status Body param:
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        string $accountSid,
        string $callSid,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): RecordingRecordingSidJsonResponse {
        $params = [
            'accountSid' => $accountSid, 'callSid' => $callSid, 'status' => $status,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordingSidJson($recordingSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
