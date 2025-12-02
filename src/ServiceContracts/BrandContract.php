<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Brand\BrandCreateParams;
use Telnyx\Brand\BrandGetFeedbackResponse;
use Telnyx\Brand\BrandGetResponse;
use Telnyx\Brand\BrandListParams;
use Telnyx\Brand\BrandListResponse;
use Telnyx\Brand\BrandUpdateParams;
use Telnyx\Brand\TelnyxBrand;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BrandContract
{
    /**
     * @api
     *
     * @param array<mixed>|BrandCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|BrandCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): TelnyxBrand;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|BrandUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $brandID,
        array|BrandUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxBrand;

    /**
     * @api
     *
     * @param array<mixed>|BrandListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|BrandListParams $params,
        ?RequestOptions $requestOptions = null
    ): BrandListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getFeedback(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetFeedbackResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resend2faEmail(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function revet(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): TelnyxBrand;
}
