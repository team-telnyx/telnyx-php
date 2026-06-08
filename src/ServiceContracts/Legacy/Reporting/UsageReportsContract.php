<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportGetSpeechToTextResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsageReportsContract
{
    /**
     * @api
     *
     * @param \DateTimeInterface $endDate end of the date range filter (inclusive, ISO 8601)
     * @param \DateTimeInterface $startDate start of the date range filter (inclusive, ISO 8601)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSpeechToText(
        ?\DateTimeInterface $endDate = null,
        ?\DateTimeInterface $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): UsageReportGetSpeechToTextResponse;
}
