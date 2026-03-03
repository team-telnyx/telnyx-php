<?php

declare(strict_types=1);

namespace Telnyx\Services\SessionAnalysis;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SessionAnalysis\MetadataContract;
use Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse;
use Telnyx\SessionAnalysis\Metadata\MetadataGetResponse;

/**
 * Analyze voice AI sessions, costs, and event hierarchies across Telnyx products.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MetadataService implements MetadataContract
{
    /**
     * @api
     */
    public MetadataRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MetadataRawService($client);
    }

    /**
     * @api
     *
     * Returns all available record types and supported query parameters for session analysis.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): MetadataGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns detailed metadata for a specific record type, including relationships and examples.
     *
     * @param string $recordType The record type identifier (e.g. "call-control").
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordType(
        string $recordType,
        RequestOptions|array|null $requestOptions = null
    ): MetadataGetRecordTypeResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordType($recordType, requestOptions: $requestOptions);

        return $response->parse();
    }
}
