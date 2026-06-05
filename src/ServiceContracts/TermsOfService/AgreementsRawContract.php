<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TermsOfService;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\Agreements\AgreementGetResponse;
use Telnyx\TermsOfService\Agreements\AgreementListParams;
use Telnyx\TermsOfService\Agreements\AgreementListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgreementsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgreementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $agreementID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AgreementListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AgreementListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AgreementListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
