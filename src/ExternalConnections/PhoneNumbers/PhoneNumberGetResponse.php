<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalConnectionPhoneNumberShape from \Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber
 *
 * @phpstan-type PhoneNumberGetResponseShape = array{
 *   data?: null|ExternalConnectionPhoneNumber|ExternalConnectionPhoneNumberShape
 * }
 */
final class PhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ExternalConnectionPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalConnectionPhoneNumberShape $data
     */
    public static function with(
        ExternalConnectionPhoneNumber|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ExternalConnectionPhoneNumberShape $data
     */
    public function withData(ExternalConnectionPhoneNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
