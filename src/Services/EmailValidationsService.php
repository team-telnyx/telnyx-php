<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailValidations\EmailValidationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailValidationsContract;
use Telnyx\Services\EmailValidations\BatchService;

/**
 * Validate email addresses synchronously or in asynchronous batches.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailValidationsService implements EmailValidationsContract
{
    /**
     * @api
     */
    public EmailValidationsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailValidationsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Validates a single email address and returns deliverability checks.
     *
     * @param string $email Body param: Email address to validate. Any non-empty string is accepted; invalid syntax returns valid=false rather than a request error.
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $email,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailValidationNewResponse {
        $params = Util::removeNulls(
            ['email' => $email, 'idempotencyKey' => $idempotencyKey]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
