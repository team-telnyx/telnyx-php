<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportGetSpeechToTextResponse;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportRetrieveSpeechToTextParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReportsContract;
use Telnyx\Services\Legacy\Reporting\UsageReports\MessagingService;
use Telnyx\Services\Legacy\Reporting\UsageReports\NumberLookupService;
use Telnyx\Services\Legacy\Reporting\UsageReports\VoiceService;

use const Telnyx\Core\OMIT as omit;

final class UsageReportsService implements UsageReportsContract
{
    /**
     * @@api
     */
    public MessagingService $messaging;

    /**
     * @@api
     */
    public NumberLookupService $numberLookup;

    /**
     * @@api
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
     * @param \DateTimeInterface $endDate
     * @param \DateTimeInterface $startDate
     *
     * @throws APIException
     */
    public function retrieveSpeechToText(
        $endDate = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null
    ): UsageReportGetSpeechToTextResponse {
        $params = ['endDate' => $endDate, 'startDate' => $startDate];

        return $this->retrieveSpeechToTextRaw($params, $requestOptions);
    }

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
    ): UsageReportGetSpeechToTextResponse {
        [$parsed, $options] = UsageReportRetrieveSpeechToTextParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/speech_to_text',
            query: $parsed,
            options: $options,
            convert: UsageReportGetSpeechToTextResponse::class,
        );
    }
}
