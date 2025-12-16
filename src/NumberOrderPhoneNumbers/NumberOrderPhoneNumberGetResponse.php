<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumberOrderPhoneNumberShape from \Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber
 *
 * @phpstan-type NumberOrderPhoneNumberGetResponseShape = array{
 *   data?: null|NumberOrderPhoneNumber|NumberOrderPhoneNumberShape
 * }
 */
final class NumberOrderPhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumberOrderPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberOrderPhoneNumberShape $data
     */
    public static function with(NumberOrderPhoneNumber|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberOrderPhoneNumberShape $data
     */
    public function withData(NumberOrderPhoneNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
