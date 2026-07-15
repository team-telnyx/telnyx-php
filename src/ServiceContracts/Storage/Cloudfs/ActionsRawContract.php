<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Cloudfs;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Cloudfs\Actions\ActionRotateMetaTokenParams;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemResponseWrapper;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id CloudFS filesystem ID
     * @param array<string,mixed>|ActionRotateMetaTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemResponseWrapper>
     *
     * @throws APIException
     */
    public function rotateMetaToken(
        string $id,
        array|ActionRotateMetaTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
