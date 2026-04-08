<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\ReputationCreateParams\CheckFrequency;
use Telnyx\Enterprises\Reputation\ReputationListResponse;
use Telnyx\Enterprises\Reputation\ReputationNewResponse;
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
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param string $loaDocumentID ID of the signed Letter of Authorization (LOA) document uploaded to the document service
     * @param CheckFrequency|value-of<CheckFrequency> $checkFrequency Frequency for automatically refreshing reputation data
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        string $loaDocumentID,
        CheckFrequency|string $checkFrequency = 'business_daily',
        RequestOptions|array|null $requestOptions = null,
    ): ReputationNewResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): ReputationListResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAll(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param \Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency|value-of<\Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency> $checkFrequency New frequency for refreshing reputation data
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
