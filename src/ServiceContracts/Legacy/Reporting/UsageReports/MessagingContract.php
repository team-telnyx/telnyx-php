<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MdrUsageReportResponseLegacy;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingListParams;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingNewResponse;
use Telnyx\PerPagePagination;
use Telnyx\RequestOptions;

interface MessagingContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingListParams $params
     *
     * @return PerPagePagination<MdrUsageReportResponseLegacy>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        ?RequestOptions $requestOptions = null
    ): PerPagePagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse;
}
