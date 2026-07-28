<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailValidations;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailValidations\Batch\BatchGetResponse;
use Telnyx\EmailValidations\Batch\BatchNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
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
    ): BatchNewResponse;

    /**
     * @api
     *
     * @param string $id email validation batch UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BatchGetResponse;
}
