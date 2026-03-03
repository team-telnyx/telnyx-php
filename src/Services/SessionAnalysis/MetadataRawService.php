<?php

declare(strict_types=1);

namespace Telnyx\Services\SessionAnalysis;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SessionAnalysis\MetadataRawContract;
use Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse;
use Telnyx\SessionAnalysis\Metadata\MetadataGetResponse;

/**
 * Analyze voice AI sessions, costs, and event hierarchies across Telnyx products.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MetadataRawService implements MetadataRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns all available record types and supported query parameters for session analysis.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MetadataGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'session_analysis/metadata',
            options: $requestOptions,
            convert: MetadataGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns detailed metadata for a specific record type, including relationships and examples.
     *
     * @param string $recordType The record type identifier (e.g. "call-control").
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MetadataGetRecordTypeResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordType(
        string $recordType,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['session_analysis/metadata/%1$s', $recordType],
            options: $requestOptions,
            convert: MetadataGetRecordTypeResponse::class,
        );
    }
}
