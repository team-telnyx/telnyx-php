<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentDeleteParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AdditionalDocumentsRawContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|AdditionalDocumentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdditionalDocumentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|AdditionalDocumentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|AdditionalDocumentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AdditionalDocumentListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|AdditionalDocumentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $additionalDocumentID additional document identification
     * @param array<string,mixed>|AdditionalDocumentDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        array|AdditionalDocumentDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
