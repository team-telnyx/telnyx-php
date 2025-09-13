<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Porting\PortingListUkCarriersResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingContract;
use Telnyx\Services\Porting\EventsService;
use Telnyx\Services\Porting\LoaConfigurationsService;
use Telnyx\Services\Porting\ReportsService;

final class PortingService implements PortingContract
{
    /**
     * @@api
     */
    public EventsService $events;

    /**
     * @@api
     */
    public ReportsService $reports;

    /**
     * @@api
     */
    public LoaConfigurationsService $loaConfigurations;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->events = new EventsService($client);
        $this->reports = new ReportsService($client);
        $this->loaConfigurations = new LoaConfigurationsService($client);
    }

    /**
     * @api
     *
     * List available carriers in the UK.
     *
     * @return PortingListUkCarriersResponse<HasRawResponse>
     */
    public function listUkCarriers(
        ?RequestOptions $requestOptions = null
    ): PortingListUkCarriersResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'porting/uk_carriers',
            options: $requestOptions,
            convert: PortingListUkCarriersResponse::class,
        );
    }
}
