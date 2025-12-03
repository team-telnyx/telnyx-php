<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\RequestOptions;

interface LoaConfigurationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|LoaConfigurationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|LoaConfigurationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|LoaConfigurationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|LoaConfigurationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|LoaConfigurationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|LoaConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LoaConfigurationPreview0Params $params
     *
     * @throws APIException
     */
    public function preview0(
        array|LoaConfigurationPreview0Params $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;
}
