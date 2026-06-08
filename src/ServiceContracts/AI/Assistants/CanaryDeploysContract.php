<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams\Rule;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RuleShape from \Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams\Rule
 * @phpstan-import-type RuleShape from \Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams\Rule as RuleShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CanaryDeploysContract
{
    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param list<Rule|RuleShape> $rules
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
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
    public function retrieve(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param list<\Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams\Rule|RuleShape1> $rules
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
