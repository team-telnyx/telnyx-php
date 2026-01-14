<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;
use Telnyx\PhoneNumbers\Voice\VoiceGetResponse;
use Telnyx\PhoneNumbers\Voice\VoiceListParams;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param string $id identifies the resource
     * @param array<string,mixed>|VoiceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VoiceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VoiceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberWithVoiceSettings>>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
