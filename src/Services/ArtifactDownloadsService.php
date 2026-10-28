<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ArtifactDownloadsContract;

/**
 * Download screenshots and other artifacts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ArtifactDownloadsService implements ArtifactDownloadsContract
{
    /**
     * @api
     */
    public ArtifactDownloadsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ArtifactDownloadsRawService($client);
    }

    /**
     * @api
     *
     * Downloads the artifact content. The signed URL (with expires and sig query params) is obtained from the artifact metadata endpoint.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $artifactID,
        string $expires,
        string $sig,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = ['expires' => $expires, 'sig' => $sig];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($artifactID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
