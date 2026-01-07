<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tests\AssistantTest;
use Telnyx\AI\Assistants\Tests\TestCreateParams;
use Telnyx\AI\Assistants\Tests\TestListParams;
use Telnyx\AI\Assistants\Tests\TestUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TestsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TestCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssistantTest>
     *
     * @throws APIException
     */
    public function create(
        array|TestCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssistantTest>
     *
     * @throws APIException
     */
    public function retrieve(
        string $testID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TestUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssistantTest>
     *
     * @throws APIException
     */
    public function update(
        string $testID,
        array|TestUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TestListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AssistantTest>>
     *
     * @throws APIException
     */
    public function list(
        array|TestListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $testID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
