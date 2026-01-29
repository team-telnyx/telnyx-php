<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewParams;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SimCardOrderPreviewRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SimCardOrderPreviewPreviewParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardOrderPreviewPreviewResponse>
     *
     * @throws APIException
     */
    public function preview(
        array|SimCardOrderPreviewPreviewParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
