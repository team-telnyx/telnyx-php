<?php

declare(strict_types=1);

namespace Telnyx\Requirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a document requirement record.
 *
 * @see Telnyx\Services\RequirementsService::retrieve()
 *
 * @phpstan-type RequirementRetrieveParamsShape = array{version?: int|null}
 */
final class RequirementRetrieveParams implements BaseModel
{
    /** @use SdkModel<RequirementRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by requirement version number. When omitted, returns the currently-active version.
     */
    #[Optional]
    public ?int $version;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $version = null): self
    {
        $self = new self;

        null !== $version && $self['version'] = $version;

        return $self;
    }

    /**
     * Filter by requirement version number. When omitted, returns the currently-active version.
     */
    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
