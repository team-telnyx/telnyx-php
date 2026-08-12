<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Collections;

use Telnyx\AI\Collections\Settings\SettingCreateParams;
use Telnyx\AI\Collections\Settings\SettingPatchAllParams;
use Telnyx\AI\Collections\Settings\SettingsEnvelope;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SettingsRawContract
{
    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param array<string,mixed>|SettingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsEnvelope>
     *
     * @throws APIException
     */
    public function create(
        string $uuid,
        array|SettingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsEnvelope>
     *
     * @throws APIException
     */
    public function list(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param array<string,mixed>|SettingPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsEnvelope>
     *
     * @throws APIException
     */
    public function patchAll(
        string $uuid,
        array|SettingPatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
