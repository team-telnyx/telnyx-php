<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\Signup\SignupGetStatusResponse;
use Telnyx\Whatsapp\Signup\SignupListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SignupContract
{
    /**
     * @api
     *
     * @param \DateTimeInterface $filterCreatedAtGte Return sessions created at or after this time (RFC 3339)
     * @param \DateTimeInterface $filterCreatedAtLte Return sessions created at or before this time (RFC 3339)
     * @param string $filterCustomerID Filter by the tech provider customer reference
     * @param string $filterWabaID Filter by Meta WABA ID
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<SignupListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?\DateTimeInterface $filterCreatedAtGte = null,
        ?\DateTimeInterface $filterCreatedAtLte = null,
        ?string $filterCustomerID = null,
        ?string $filterWabaID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id Signup session ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SignupGetStatusResponse;
}
