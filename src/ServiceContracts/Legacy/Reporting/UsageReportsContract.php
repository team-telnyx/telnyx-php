<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportGetSpeechToTextResponse;
use Telnyx\RequestOptions;

interface UsageReportsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveSpeechToText(
        string|\DateTimeInterface|null $endDate = null,
        string|\DateTimeInterface|null $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetSpeechToTextResponse;
}
