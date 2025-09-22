<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Client\Legacy\Reporting;

use Telnyx\Client\Legacy\Reporting\UsageReports\UsageReportGetSpeechToTextResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return UsageReportGetSpeechToTextResponse<HasRawResponse>
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
     * @return UsageReportGetSpeechToTextResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveSpeechToTextRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UsageReportGetSpeechToTextResponse;
}
