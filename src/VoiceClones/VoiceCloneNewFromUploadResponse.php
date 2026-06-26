<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response envelope for a single voice clone.
 *
 * @phpstan-import-type VoiceCloneDataShape from \Telnyx\VoiceClones\VoiceCloneData
 *
 * @phpstan-type VoiceCloneNewFromUploadResponseShape = array{
 *   data?: null|VoiceCloneData|VoiceCloneDataShape
 * }
 */
final class VoiceCloneNewFromUploadResponse implements BaseModel
{
    /** @use SdkModel<VoiceCloneNewFromUploadResponseShape> */
    use SdkModel;

    /**
     * A voice clone object.
     */
    #[Optional]
    public ?VoiceCloneData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VoiceCloneData|VoiceCloneDataShape|null $data
     */
    public static function with(VoiceCloneData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A voice clone object.
     *
     * @param VoiceCloneData|VoiceCloneDataShape $data
     */
    public function withData(VoiceCloneData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
