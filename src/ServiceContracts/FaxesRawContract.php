<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Faxes\Fax;
use Telnyx\Faxes\FaxCreateParams;
use Telnyx\Faxes\FaxGetResponse;
use Telnyx\Faxes\FaxListParams;
use Telnyx\Faxes\FaxNewResponse;
use Telnyx\RequestOptions;

interface FaxesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|FaxCreateParams $params
     *
     * @return BaseResponse<FaxNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FaxCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
     *
     * @return BaseResponse<FaxGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FaxListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<Fax>>
     *
     * @throws APIException
     */
    public function list(
        array|FaxListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
