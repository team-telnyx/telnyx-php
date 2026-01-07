<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\Runs\RunRetrieveParams;
use Telnyx\AI\Assistants\Tests\Runs\RunTriggerParams;
use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RunsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RunRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestRunResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        array|RunRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RunListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TestRunResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $testID,
        array|RunListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RunTriggerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestRunResponse>
     *
     * @throws APIException
     */
    public function trigger(
        string $testID,
        array|RunTriggerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
