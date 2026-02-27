<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportGetSpeechToTextResponse;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportRetrieveSpeechToTextParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReportsRawContract;

/**
 * Speech to text usage reports.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UsageReportsRawService implements UsageReportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate and fetch speech to text usage report synchronously. This endpoint will both generate and fetch the speech to text report over a specified time period.
     *
     * @param array{
     *   endDate?: \DateTimeInterface, startDate?: \DateTimeInterface
     * }|UsageReportRetrieveSpeechToTextParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UsageReportGetSpeechToTextResponse>
     *
     * @throws APIException
     */
    public function retrieveSpeechToText(
        array|UsageReportRetrieveSpeechToTextParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UsageReportRetrieveSpeechToTextParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/speech_to_text',
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: UsageReportGetSpeechToTextResponse::class,
        );
    }
}
