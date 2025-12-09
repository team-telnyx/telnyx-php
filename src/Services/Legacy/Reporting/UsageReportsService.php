<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\UsageReportGetSpeechToTextResponse;
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
    public UsageReportsRawService $raw;

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
        $this->raw = new UsageReportsRawService($client);
        $this->messaging = new MessagingService($client);
        $this->numberLookup = new NumberLookupService($client);
        $this->voice = new VoiceService($client);
    }

    /**
     * @api
     *
     * Generate and fetch speech to text usage report synchronously. This endpoint will both generate and fetch the speech to text report over a specified time period.
     *
     * @throws APIException
     */
    public function retrieveSpeechToText(
        string|\DateTimeInterface|null $endDate = null,
        string|\DateTimeInterface|null $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetSpeechToTextResponse {
        $params = ['endDate' => $endDate, 'startDate' => $startDate];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSpeechToText(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
