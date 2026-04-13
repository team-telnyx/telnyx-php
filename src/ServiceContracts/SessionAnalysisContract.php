<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse;
use Telnyx\SessionAnalysis\SessionAnalysisRetrieveParams\Expand;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SessionAnalysisContract
{
    /**
     * @api
     *
     * @param string $eventID path param: The event identifier (UUID)
     * @param string $recordType path param: The record type identifier
     * @param \DateTimeInterface $dateTime Query param: ISO 8601 timestamp or date to narrow index selection for faster lookups. Accepts full datetime (e.g., 2026-03-17T10:00:00Z) or date-only format (e.g., 2026-03-17).
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
    ): SessionAnalysisGetResponse;
}
