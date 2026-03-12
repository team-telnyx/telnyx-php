<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneUpdateResponse\Data;

/**
 * Response envelope for a single voice clone.
 *
 * @phpstan-import-type DataShape from \Telnyx\VoiceClones\VoiceCloneUpdateResponse\Data
 *
 * @phpstan-type VoiceCloneUpdateResponseShape = array{data?: null|Data|DataShape}
 */
final class VoiceCloneUpdateResponse implements BaseModel
{
    /** @use SdkModel<VoiceCloneUpdateResponseShape> */
    use SdkModel;

    /**
     * A voice clone object.
     */
    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A voice clone object.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
