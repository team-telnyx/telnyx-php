<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportGetSpeechToTextResponse;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportRetrieveSpeechToTextParams;
use Telnyx\RequestOptions;

interface UsageReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|UsageReportRetrieveSpeechToTextParams $params
     *
     * @throws APIException
     */
    public function retrieveSpeechToText(
        array|UsageReportRetrieveSpeechToTextParams $params,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetSpeechToTextResponse;
}
