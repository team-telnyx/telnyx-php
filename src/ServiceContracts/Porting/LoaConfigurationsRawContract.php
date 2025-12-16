<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;
use Telnyx\RequestOptions;

interface LoaConfigurationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LoaConfigurationCreateParams $params
     *
     * @return BaseResponse<LoaConfigurationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LoaConfigurationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies a LOA configuration
     *
     * @return BaseResponse<LoaConfigurationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies a LOA configuration
     * @param array<string,mixed>|LoaConfigurationUpdateParams $params
     *
     * @return BaseResponse<LoaConfigurationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|LoaConfigurationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LoaConfigurationListParams $params
     *
     * @return BaseResponse<DefaultPagination<PortingLoaConfiguration>>
     *
     * @throws APIException
     */
    public function list(
        array|LoaConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies a LOA configuration
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LoaConfigurationPreview0Params $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function preview0(
        array|LoaConfigurationPreview0Params $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies a LOA configuration
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
