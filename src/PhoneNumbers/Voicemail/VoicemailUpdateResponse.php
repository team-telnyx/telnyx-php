<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type VoicemailPrefResponseShape from \Telnyx\PhoneNumbers\Voicemail\VoicemailPrefResponse
 *
 * @phpstan-type VoicemailUpdateResponseShape = array{
 *   data?: null|VoicemailPrefResponse|VoicemailPrefResponseShape
 * }
 */
final class VoicemailUpdateResponse implements BaseModel
{
    /** @use SdkModel<VoicemailUpdateResponseShape> */
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
     * @param VoicemailPrefResponseShape $data
     */
    public static function with(VoicemailPrefResponse|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param VoicemailPrefResponseShape $data
     */
    public function withData(VoicemailPrefResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
