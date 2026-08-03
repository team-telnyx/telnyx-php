<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailValidations;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailValidations\Batch\BatchGetResponse;
use Telnyx\EmailValidations\Batch\BatchNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailValidations\BatchContract;

/**
 * Validate email addresses synchronously or in asynchronous batches.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Creates an asynchronous batch validation job for up to 1,000 email addresses.
     *
     * @param list<string> $emails Body param
     * @param string $webhookURL Body param: URL for batch completion webhook. Empty string is treated as omitted. SSRF-protected; private/reserved IPs and internal hostnames are rejected.
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $emails,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchNewResponse {
        $params = Util::removeNulls(
            [
                'emails' => $emails,
                'webhookURL' => $webhookURL,
                'idempotencyKey' => $idempotencyKey,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the current status and, once completed, validation results for a batch job.
     *
     * @param string $id email validation batch UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BatchGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
