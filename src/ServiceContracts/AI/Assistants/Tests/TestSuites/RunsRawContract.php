<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests\TestSuites;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunTriggerParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

interface RunsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|RunListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<TestRunResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $suiteName,
        array|RunListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|RunTriggerParams $params
     *
     * @return BaseResponse<list<TestRunResponse>>
     *
     * @throws APIException
     */
    public function trigger(
        string $suiteName,
        array|RunTriggerParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
