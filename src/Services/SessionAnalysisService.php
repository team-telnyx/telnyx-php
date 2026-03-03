<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SessionAnalysisContract;
use Telnyx\Services\SessionAnalysis\MetadataService;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse;
use Telnyx\SessionAnalysis\SessionAnalysisRetrieveParams\Expand;

/**
 * Analyze voice AI sessions, costs, and event hierarchies across Telnyx products.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SessionAnalysisService implements SessionAnalysisContract
{
    /**
     * @api
     */
    public SessionAnalysisRawService $raw;

    /**
     * @api
     */
    public MetadataService $metadata;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SessionAnalysisRawService($client);
        $this->metadata = new MetadataService($client);
    }

    /**
     * @api
     *
     * Retrieves a full session analysis tree for a given event, including costs, child events, and product linkages.
     *
     * @param string $eventID path param: The event identifier (UUID)
     * @param string $recordType path param: The record type identifier
     * @param \DateTimeInterface $dateTime query param: ISO 8601 timestamp to narrow index selection for faster lookups
     * @param Expand|value-of<Expand> $expand query param: Controls what data to expand on each event node
     * @param bool $includeChildren query param: Whether to include child events in the response
     * @param int $maxDepth query param: Maximum traversal depth for the event tree
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        string $recordType,
        ?\DateTimeInterface $dateTime = null,
        Expand|string $expand = 'record',
        bool $includeChildren = true,
        int $maxDepth = 2,
        RequestOptions|array|null $requestOptions = null,
    ): SessionAnalysisGetResponse {
        $params = Util::removeNulls(
            [
                'recordType' => $recordType,
                'dateTime' => $dateTime,
                'expand' => $expand,
                'includeChildren' => $includeChildren,
                'maxDepth' => $maxDepth,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
