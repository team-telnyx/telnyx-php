<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListParams;
use Telnyx\RequestOptions;

interface NumberLookupContract
{
    /**
     * @api
     *
     * @param array<mixed>|NumberLookupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumberLookupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|NumberLookupListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NumberLookupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
