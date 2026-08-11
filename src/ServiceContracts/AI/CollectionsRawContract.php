<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Collections\Collection;
use Telnyx\AI\Collections\CollectionCreateParams;
use Telnyx\AI\Collections\CollectionEnvelope;
use Telnyx\AI\Collections\CollectionGetDocumentsResponse;
use Telnyx\AI\Collections\CollectionListParams;
use Telnyx\AI\Collections\CollectionRetrieveDocumentsParams;
use Telnyx\AI\Collections\CollectionUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CollectionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CollectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionEnvelope>
     *
     * @throws APIException
     */
    public function create(
        array|CollectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $slug the collection's slug (unique within your organization)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionEnvelope>
     *
     * @throws APIException
     */
    public function retrieve(
        string $slug,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param array<string,mixed>|CollectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionEnvelope>
     *
     * @throws APIException
     */
    public function update(
        string $uuid,
        array|CollectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CollectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Collection>>
     *
     * @throws APIException
     */
    public function list(
        array|CollectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionEnvelope>
     *
     * @throws APIException
     */
    public function retrieveByID(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $slug the collection's slug (unique within your organization)
     * @param array<string,mixed>|CollectionRetrieveDocumentsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionGetDocumentsResponse>
     *
     * @throws APIException
     */
    public function retrieveDocuments(
        string $slug,
        array|CollectionRetrieveDocumentsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
