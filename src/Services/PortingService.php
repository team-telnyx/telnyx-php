<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\PortingListUkCarriersResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingContract;
use Telnyx\Services\Porting\EventsService;
use Telnyx\Services\Porting\LoaConfigurationsService;
use Telnyx\Services\Porting\ReportsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PortingService implements PortingContract
{
    /**
     * @api
     */
    public PortingRawService $raw;

    /**
     * @api
     */
    public EventsService $events;

    /**
     * @api
     */
    public ReportsService $reports;

    /**
     * @api
     */
    public LoaConfigurationsService $loaConfigurations;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PortingRawService($client);
        $this->events = new EventsService($client);
        $this->reports = new ReportsService($client);
        $this->loaConfigurations = new LoaConfigurationsService($client);
    }

    /**
     * @api
     *
     * List available carriers in the UK.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listUkCarriers(
        RequestOptions|array|null $requestOptions = null
    ): PortingListUkCarriersResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listUkCarriers(requestOptions: $requestOptions);

        return $response->parse();
    }
}
