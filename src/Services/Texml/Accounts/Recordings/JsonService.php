<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Recordings;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Recordings\JsonContract;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class JsonService implements JsonContract
{
    /**
     * @api
     */
    public JsonRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new JsonRawService($client);
    }

    /**
     * @api
     *
     * Deletes recording resource identified by recording id.
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = ['accountSid' => $accountSid];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteRecordingSidJson($recordingSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns recording resource identified by recording id.
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): TexmlGetCallRecordingResponseBody {
        $params = ['accountSid' => $accountSid];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordingSidJson($recordingSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
