<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MobilePhoneNumberShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumber
 *
 * @phpstan-type MobilePhoneNumberGetResponseShape = array{
 *   data?: null|MobilePhoneNumber|MobilePhoneNumberShape
 * }
 */
final class MobilePhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MobilePhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MobilePhoneNumberShape $data
     */
    public static function with(MobilePhoneNumber|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MobilePhoneNumberShape $data
     */
    public function withData(MobilePhoneNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
