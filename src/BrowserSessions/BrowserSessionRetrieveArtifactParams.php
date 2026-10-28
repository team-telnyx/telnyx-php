<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns artifact metadata and a signed download URL. The download URL requires Bearer auth.
 *
 * @see Telnyx\Services\BrowserSessionsService::retrieveArtifact()
 *
 * @phpstan-type BrowserSessionRetrieveArtifactParamsShape = array{id: string}
 */
final class BrowserSessionRetrieveArtifactParams implements BaseModel
{
    /** @use SdkModel<BrowserSessionRetrieveArtifactParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new BrowserSessionRetrieveArtifactParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrowserSessionRetrieveArtifactParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrowserSessionRetrieveArtifactParams)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
