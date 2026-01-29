<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessagingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
