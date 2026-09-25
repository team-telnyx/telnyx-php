<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory\Namespaces;

use Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse;
use Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams;
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
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceSettingsResponse>
     *
     * @throws APIException
     */
    public function list(
        string $namespace,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param array<string,mixed>|SettingPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceSettingsResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        string $namespace,
        array|SettingPatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
