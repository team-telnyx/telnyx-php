<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OutboundVoiceProfileShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile
 *
 * @phpstan-type OutboundVoiceProfileGetResponseShape = array{
 *   data?: null|OutboundVoiceProfile|OutboundVoiceProfileShape
 * }
 */
final class OutboundVoiceProfileGetResponse implements BaseModel
{
    /** @use SdkModel<OutboundVoiceProfileGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OutboundVoiceProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OutboundVoiceProfileShape $data
     */
    public static function with(OutboundVoiceProfile|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param OutboundVoiceProfileShape $data
     */
    public function withData(OutboundVoiceProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
