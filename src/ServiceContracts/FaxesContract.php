<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Faxes\FaxCreateParams;
use Telnyx\Faxes\FaxGetResponse;
use Telnyx\Faxes\FaxListParams;
use Telnyx\Faxes\FaxListResponse;
use Telnyx\Faxes\FaxNewResponse;
use Telnyx\RequestOptions;

interface FaxesContract
{
    /**
     * @api
     *
     * @param array<mixed>|FaxCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FaxCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): FaxNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FaxGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|FaxListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|FaxListParams $params,
        ?RequestOptions $requestOptions = null
    ): FaxListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
