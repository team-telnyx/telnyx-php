<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TermsOfService;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\Agreements\AgreementListParams;
use Telnyx\TermsOfService\Agreements\TosAgreement;
use Telnyx\TermsOfService\Agreements\TosAgreementWrapped;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgreementsRawContract
{
    /**
     * @api
     *
     * @param string $agreementID unique identifier of the agreement
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TosAgreementWrapped>
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
     * @return BaseResponse<DefaultFlatPagination<TosAgreement>>
     *
     * @throws APIException
     */
    public function list(
        array|AgreementListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
