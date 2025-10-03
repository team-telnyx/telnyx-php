<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportGetSpeechToTextResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface UsageReportsContract
{
    /**
     * @api
     *
     * @param \DateTimeInterface $endDate
     * @param \DateTimeInterface $startDate
     *
     * @throws APIException
     */
    public function retrieveSpeechToText(
        $endDate = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetSpeechToTextResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveSpeechToTextRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UsageReportGetSpeechToTextResponse;
}
