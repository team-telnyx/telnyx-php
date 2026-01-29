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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FaxesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FaxCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FaxNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FaxCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FaxGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FaxListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Fax>>
     *
     * @throws APIException
     */
    public function list(
        array|FaxListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
