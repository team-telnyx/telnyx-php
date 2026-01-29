<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PhoneNumberDetailedShape from \Telnyx\PhoneNumbers\PhoneNumberDetailed
 *
 * @phpstan-type PhoneNumberUpdateResponseShape = array{
 *   data?: null|PhoneNumberDetailed|PhoneNumberDetailedShape
 * }
 */
final class PhoneNumberUpdateResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PhoneNumberDetailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberDetailed|PhoneNumberDetailedShape|null $data
     */
    public static function with(PhoneNumberDetailed|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PhoneNumberDetailed|PhoneNumberDetailedShape $data
     */
    public function withData(PhoneNumberDetailed|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
