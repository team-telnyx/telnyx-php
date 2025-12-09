<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingListParams;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;

interface MessagingRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingCreateParams $params
     *
     * @return BaseResponse<MessagingNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<MessagingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingListParams $params
     *
     * @return BaseResponse<MessagingListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<MessagingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
