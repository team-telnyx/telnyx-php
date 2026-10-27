<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ArtifactDownloads\ArtifactDownloadRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ArtifactDownloadsRawContract;

/**
 * Download screenshots and other artifacts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ArtifactDownloadsRawService implements ArtifactDownloadsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Downloads the artifact content. The signed URL (with expires and sig query params) is obtained from the artifact metadata endpoint.
     *
     * @param array{
     *   expires: string, sig: string
     * }|ArtifactDownloadRetrieveParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ArtifactDownloadRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['artifact_downloads/%1$s', $artifactID],
            query: $parsed,
            headers: ['Accept' => 'application/octet-stream'],
            options: $options,
            convert: 'string',
        );
    }
}
