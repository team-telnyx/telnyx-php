<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Results\ResultListParams;
use Telnyx\AI\Tests\TestFramework\V1\Results\ResultListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ResultsRawContract
{
    /**
     * @api
     *
     * @param int $id numeric ID of the test run batch
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestRunResult>
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ResultListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ResultListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ResultListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the test run batch
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the test run batch to rerun
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestRunResult>
     *
     * @throws APIException
     */
    public function rerun(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
