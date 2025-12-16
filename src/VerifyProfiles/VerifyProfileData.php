<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type VerifyProfileShape from \Telnyx\VerifyProfiles\VerifyProfile
 *
 * @phpstan-type VerifyProfileDataShape = array{
 *   data?: null|VerifyProfile|VerifyProfileShape
 * }
 */
final class VerifyProfileData implements BaseModel
{
    /** @use SdkModel<VerifyProfileDataShape> */
    use SdkModel;

    #[Optional]
    public ?VerifyProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VerifyProfileShape $data
     */
    public static function with(VerifyProfile|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param VerifyProfileShape $data
     */
    public function withData(VerifyProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
