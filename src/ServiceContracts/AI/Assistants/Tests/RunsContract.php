<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\Runs\RunListParams;
use Telnyx\AI\Assistants\Tests\Runs\RunRetrieveParams;
use Telnyx\AI\Assistants\Tests\Runs\RunTriggerParams;
use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

interface RunsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RunRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        array|RunRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): TestRunResponse;

    /**
     * @api
     *
     * @param array<mixed>|RunListParams $params
     *
     * @return DefaultFlatPagination<TestRunResponse>
     *
     * @throws APIException
     */
    public function list(
        string $testID,
        array|RunListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param array<mixed>|RunTriggerParams $params
     *
     * @throws APIException
     */
    public function trigger(
        string $testID,
        array|RunTriggerParams $params,
        ?RequestOptions $requestOptions = null,
    ): TestRunResponse;
}
