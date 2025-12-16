<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MobileVoiceConnectionShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnection
 *
 * @phpstan-type MobileVoiceConnectionUpdateResponseShape = array{
 *   data?: null|MobileVoiceConnection|MobileVoiceConnectionShape
 * }
 */
final class MobileVoiceConnectionUpdateResponse implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MobileVoiceConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MobileVoiceConnectionShape $data
     */
    public static function with(MobileVoiceConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MobileVoiceConnectionShape $data
     */
    public function withData(MobileVoiceConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
