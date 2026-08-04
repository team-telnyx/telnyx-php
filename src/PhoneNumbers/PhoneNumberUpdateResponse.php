<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumbersPhoneNumberDetailedShape from \Telnyx\PhoneNumbers\NumbersPhoneNumberDetailed
 *
 * @phpstan-type PhoneNumberUpdateResponseShape = array{
 *   data?: null|NumbersPhoneNumberDetailed|NumbersPhoneNumberDetailedShape
 * }
 */
final class PhoneNumberUpdateResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumbersPhoneNumberDetailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumbersPhoneNumberDetailed|NumbersPhoneNumberDetailedShape|null $data
     */
    public static function with(
        NumbersPhoneNumberDetailed|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumbersPhoneNumberDetailed|NumbersPhoneNumberDetailedShape $data
     */
    public function withData(NumbersPhoneNumberDetailed|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
