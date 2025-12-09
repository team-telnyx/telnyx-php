<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VoicemailGetResponseShape = array{
 *   data?: VoicemailPrefResponse|null
 * }
 */
final class VoicemailGetResponse implements BaseModel
{
    /** @use SdkModel<VoicemailGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?VoicemailPrefResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VoicemailPrefResponse|array{enabled?: bool|null, pin?: string|null} $data
     */
    public static function with(VoicemailPrefResponse|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param VoicemailPrefResponse|array{enabled?: bool|null, pin?: string|null} $data
     */
    public function withData(VoicemailPrefResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
