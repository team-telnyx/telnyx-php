<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InfringementClaims\InfringementClaimContestParams;
use Telnyx\InfringementClaims\InfringementClaimWrapped;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InfringementClaimsRawContract
{
    /**
     * @api
     *
     * @param string $claimID claim id (lowercase UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InfringementClaimWrapped>
     *
     * @throws APIException
     */
    public function retrieve(
        string $claimID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $claimID unique identifier of the claim
     * @param array<string,mixed>|InfringementClaimContestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InfringementClaimWrapped>
     *
     * @throws APIException
     */
    public function contest(
        string $claimID,
        array|InfringementClaimContestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
