<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Collections;

use Telnyx\AI\Collections\Sources\SourceListResponse;
use Telnyx\AI\Collections\Sources\SourceNewResponse;
use Telnyx\AI\Collections\Sources\SourceReplaceResponse;
use Telnyx\AI\Collections\Sources\SourceRequest;
use Telnyx\AI\Collections\Sources\SourceType;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type SourceRequestShape from \Telnyx\AI\Collections\Sources\SourceRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SourcesContract
{
    /**
     * @api
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
    ): SourceNewResponse;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): SourceListResponse;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): SourceReplaceResponse;
}
