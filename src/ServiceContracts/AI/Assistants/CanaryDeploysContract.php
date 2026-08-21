<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\RuleInput;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RuleInputShape from \Telnyx\AI\Assistants\CanaryDeploys\RuleInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CanaryDeploysContract
{
    /**
     * @api
     *
     * @param string $assistantID path param: Unique identifier of the assistant
     * @param list<RuleInput|RuleInputShape> $rules Body param
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        ?array $rules = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param list<RuleInput|RuleInputShape> $rules
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        ?array $rules = null,
        RequestOptions|array|null $requestOptions = null,
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
