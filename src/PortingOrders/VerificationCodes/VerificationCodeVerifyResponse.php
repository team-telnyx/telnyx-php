<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingVerificationCodeShape from \Telnyx\PortingOrders\VerificationCodes\PortingVerificationCode
 *
 * @phpstan-type VerificationCodeVerifyResponseShape = array{
 *   data?: list<PortingVerificationCode|PortingVerificationCodeShape>|null
 * }
 */
final class VerificationCodeVerifyResponse implements BaseModel
{
    /** @use SdkModel<VerificationCodeVerifyResponseShape> */
    use SdkModel;

    /** @var list<PortingVerificationCode>|null $data */
    #[Optional(list: PortingVerificationCode::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortingVerificationCode|PortingVerificationCodeShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<PortingVerificationCode|PortingVerificationCodeShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
