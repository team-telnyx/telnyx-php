<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tests\AssistantTest;
use Telnyx\AI\Assistants\Tests\TestCreateParams;
use Telnyx\AI\Assistants\Tests\TestListParams;
use Telnyx\AI\Assistants\Tests\TestListResponse;
use Telnyx\AI\Assistants\Tests\TestUpdateParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface TestsContract
{
    /**
     * @api
     *
     * @param array<mixed>|TestCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TestCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): AssistantTest;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $testID,
        ?RequestOptions $requestOptions = null
    ): AssistantTest;

    /**
     * @api
     *
     * @param array<mixed>|TestUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $testID,
        array|TestUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssistantTest;

    /**
     * @api
     *
     * @param array<mixed>|TestListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TestListParams $params,
        ?RequestOptions $requestOptions = null
    ): TestListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $testID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
