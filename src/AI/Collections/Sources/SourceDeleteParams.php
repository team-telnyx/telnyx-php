<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Removes a single source from a collection.
 *
 * @see Telnyx\Services\AI\Collections\SourcesService::delete()
 *
 * @phpstan-type SourceDeleteParamsShape = array{uuid: string}
 */
final class SourceDeleteParams implements BaseModel
{
    /** @use SdkModel<SourceDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $uuid;

    /**
     * `new SourceDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceDeleteParams::with(uuid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceDeleteParams)->withUuid(...)
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
    public static function with(string $uuid): self
    {
        $self = new self;

        $self['uuid'] = $uuid;

        return $self;
    }

    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
