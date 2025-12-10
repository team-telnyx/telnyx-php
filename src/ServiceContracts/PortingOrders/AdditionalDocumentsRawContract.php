<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentDeleteParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;

interface AdditionalDocumentsRawContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<mixed>|AdditionalDocumentCreateParams $params
     *
     * @return BaseResponse<AdditionalDocumentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|AdditionalDocumentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<mixed>|AdditionalDocumentListParams $params
     *
     * @return BaseResponse<DefaultPagination<AdditionalDocumentListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|AdditionalDocumentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $additionalDocumentID additional document identification
     * @param array<mixed>|AdditionalDocumentDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        array|AdditionalDocumentDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
