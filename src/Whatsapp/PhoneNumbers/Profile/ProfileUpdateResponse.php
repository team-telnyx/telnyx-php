<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\Profile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ProfileDataShape from \Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileData
 *
 * @phpstan-type ProfileUpdateResponseShape = array{
 *   data?: null|ProfileData|ProfileDataShape
 * }
 */
final class ProfileUpdateResponse implements BaseModel
{
    /** @use SdkModel<ProfileUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ProfileData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ProfileData|ProfileDataShape|null $data
     */
    public static function with(ProfileData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ProfileData|ProfileDataShape $data
     */
    public function withData(ProfileData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
