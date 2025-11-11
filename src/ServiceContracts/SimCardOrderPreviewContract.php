<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewParams;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

interface SimCardOrderPreviewContract
{
    /**
     * @api
     *
     * @param array<mixed>|SimCardOrderPreviewPreviewParams $params
     *
     * @throws APIException
     */
    public function preview(
        array|SimCardOrderPreviewPreviewParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardOrderPreviewPreviewResponse;
}
