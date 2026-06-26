<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\ReputationEnableParams\CheckFrequency;
use Telnyx\Enterprises\Reputation\ReputationEnableResponse;
use Telnyx\Enterprises\Reputation\ReputationGetResponse;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReputationContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): ReputationGetResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disable(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $loaDocumentID Id of the signed Letter of Authorization document, returned by the Telnyx Documents API after upload (upload via `POST /v2/documents`; see https://developers.telnyx.com/api/documents).
     * @param CheckFrequency|value-of<CheckFrequency> $checkFrequency how often Telnyx refreshes the stored reputation data for this enterprise's registered numbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enable(
        string $enterpriseID,
        string $loaDocumentID,
        CheckFrequency|string $checkFrequency = 'business_daily',
        RequestOptions|array|null $requestOptions = null,
    ): ReputationEnableResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param \Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency|value-of<\Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency> $checkFrequency how often Telnyx refreshes the stored reputation data for this enterprise's registered numbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateFrequency(
        string $enterpriseID,
        \Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency|string $checkFrequency,
        RequestOptions|array|null $requestOptions = null,
    ): ReputationUpdateFrequencyResponse;
}
