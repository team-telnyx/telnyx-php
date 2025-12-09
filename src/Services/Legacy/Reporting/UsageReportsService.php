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
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReportsContract;
use Telnyx\Services\Legacy\Reporting\UsageReports\MessagingService;
use Telnyx\Services\Legacy\Reporting\UsageReports\NumberLookupService;
use Telnyx\Services\Legacy\Reporting\UsageReports\VoiceService;

final class UsageReportsService implements UsageReportsContract
{
    /**
     * @api
     */
    public MessagingService $messaging;

    /**
     * @api
     */
    public NumberLookupService $numberLookup;

    /**
     * @api
     */
    public VoiceService $voice;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->messaging = new MessagingService($client);
        $this->numberLookup = new NumberLookupService($client);
        $this->voice = new VoiceService($client);
    }

    /**
     * @api
     *
     * Generate and fetch speech to text usage report synchronously. This endpoint will both generate and fetch the speech to text report over a specified time period.
     *
     * @param array{
     *   endDate?: string|\DateTimeInterface, startDate?: string|\DateTimeInterface
     * }|UsageReportRetrieveSpeechToTextParams $params
     *
     * @throws APIException
     */
    public function retrieveSpeechToText(
        array|UsageReportRetrieveSpeechToTextParams $params,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetSpeechToTextResponse {
        [$parsed, $options] = UsageReportRetrieveSpeechToTextParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<UsageReportGetSpeechToTextResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/speech_to_text',
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: UsageReportGetSpeechToTextResponse::class,
        );

        return $response->parse();
    }
}
