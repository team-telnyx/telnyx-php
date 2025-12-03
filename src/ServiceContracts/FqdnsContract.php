<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Fqdns\Fqdn;
use Telnyx\Fqdns\FqdnCreateParams;
use Telnyx\Fqdns\FqdnDeleteResponse;
use Telnyx\Fqdns\FqdnGetResponse;
use Telnyx\Fqdns\FqdnListParams;
use Telnyx\Fqdns\FqdnNewResponse;
use Telnyx\Fqdns\FqdnUpdateParams;
use Telnyx\Fqdns\FqdnUpdateResponse;
use Telnyx\RequestOptions;

interface FqdnsContract
{
    /**
     * @api
     *
     * @param array<mixed>|FqdnCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FqdnCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): FqdnNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|FqdnUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FqdnUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FqdnUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|FqdnListParams $params
     *
     * @return DefaultPagination<Fqdn>
     *
     * @throws APIException
     */
    public function list(
        array|FqdnListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnDeleteResponse;
}
