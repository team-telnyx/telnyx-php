<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\HostedSignups\HostedSignupCreateParams;
use Telnyx\Whatsapp\HostedSignups\HostedSignupGetResponse;
use Telnyx\Whatsapp\HostedSignups\HostedSignupListParams;
use Telnyx\Whatsapp\HostedSignups\HostedSignupNewResponse;
use Telnyx\Whatsapp\HostedSignups\WhatsappHostedSignup;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface HostedSignupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|HostedSignupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HostedSignupNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|HostedSignupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Hosted signup ID returned when the hosted signup was created
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HostedSignupGetResponse>
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
     * @param array<string,mixed>|HostedSignupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<WhatsappHostedSignup>>
     *
     * @throws APIException
     */
    public function list(
        array|HostedSignupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
