<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewParams;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

interface SimCardOrderPreviewRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SimCardOrderPreviewPreviewParams $params
     *
     * @return BaseResponse<SimCardOrderPreviewPreviewResponse>
     *
     * @throws APIException
     */
    public function preview(
        array|SimCardOrderPreviewPreviewParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
