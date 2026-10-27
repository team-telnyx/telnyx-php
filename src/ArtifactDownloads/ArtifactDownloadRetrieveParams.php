<?php

declare(strict_types=1);

namespace Telnyx\ArtifactDownloads;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Downloads the artifact content. The signed URL (with expires and sig query params) is obtained from the artifact metadata endpoint.
 *
 * @see Telnyx\Services\ArtifactDownloadsService::retrieve()
 *
 * @phpstan-type ArtifactDownloadRetrieveParamsShape = array{
 *   expires: string, sig: string
 * }
 */
final class ArtifactDownloadRetrieveParams implements BaseModel
{
    /** @use SdkModel<ArtifactDownloadRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $expires;

    #[Required]
    public string $sig;

    /**
     * `new ArtifactDownloadRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtifactDownloadRetrieveParams::with(expires: ..., sig: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtifactDownloadRetrieveParams)->withExpires(...)->withSig(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $expires, string $sig): self
    {
        $self = new self;

        $self['expires'] = $expires;
        $self['sig'] = $sig;

        return $self;
    }

    public function withExpires(string $expires): self
    {
        $self = clone $this;
        $self['expires'] = $expires;

        return $self;
    }

    public function withSig(string $sig): self
    {
        $self = clone $this;
        $self['sig'] = $sig;

        return $self;
    }
}
