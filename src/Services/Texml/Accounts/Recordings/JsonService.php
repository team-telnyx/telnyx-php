<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Recordings;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['accountSid' => $accountSid]);

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
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): TexmlGetCallRecordingResponseBody {
        $params = Util::removeNulls(['accountSid' => $accountSid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordingSidJson($recordingSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
