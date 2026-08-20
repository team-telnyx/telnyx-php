<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Collections;

use Telnyx\AI\Collections\Sources\SourceListResponse;
use Telnyx\AI\Collections\Sources\SourceNewResponse;
use Telnyx\AI\Collections\Sources\SourceReplaceResponse;
use Telnyx\AI\Collections\Sources\SourceRequest;
use Telnyx\AI\Collections\Sources\SourceType;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Collections\SourcesContract;

/**
 * Create and manage logical collections of your Telnyx data, tune retrieval settings, manage sources, and run collection-scoped semantic search.
 *
 * @phpstan-import-type SourceRequestShape from \Telnyx\AI\Collections\Sources\SourceRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SourcesService implements SourcesContract
{
    /**
     * @api
     */
    public SourcesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SourcesRawService($client);
    }

    /**
     * @api
     *
     * Attaches a new content source to the specified collection and returns the created source. The source's content is ingested and embedded so it becomes searchable within the collection.
     *
     * @param string $uuid the collection's unique identifier
     * @param SourceType|value-of<SourceType> $sourceType The type of Telnyx data attached as a source. `bucket` requires an additional `bucket_id`. Only `voice` is searchable today; `meeting_bot`, `message`, and `bucket` attach but are not yet searchable (Coming soon).
     * @param string $bucketID The Telnyx Storage bucket name. Required when `source_type` is `bucket`; ignored otherwise.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $uuid,
        SourceType|string $sourceType,
        ?string $bucketID = null,
        RequestOptions|array|null $requestOptions = null,
    ): SourceNewResponse {
        $params = Util::removeNulls(
            ['sourceType' => $sourceType, 'bucketID' => $bucketID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($uuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the sources attached to a collection.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): SourceListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($uuid, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes a single source from a collection.
     *
     * @param string $sourceID the identifier of the source to remove
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $sourceID,
        string $uuid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['uuid' => $uuid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($sourceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replaces the collection's entire source set. The response `meta` reports which sources were added, retained, and removed.
     *
     * @param string $uuid the collection's unique identifier
     * @param list<SourceRequest|SourceRequestShape> $sources
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $uuid,
        array $sources,
        RequestOptions|array|null $requestOptions = null,
    ): SourceReplaceResponse {
        $params = Util::removeNulls(['sources' => $sources]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replace($uuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
