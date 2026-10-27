<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ArtifactDownloads\ArtifactDownloadRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ArtifactDownloadsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ArtifactDownloadRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieve(
        string $artifactID,
        array|ArtifactDownloadRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
