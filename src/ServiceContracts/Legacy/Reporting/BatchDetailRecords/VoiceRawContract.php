<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetFieldsResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VoiceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VoiceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceGetFieldsResponse>
     *
     * @throws APIException
     */
    public function retrieveFields(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
