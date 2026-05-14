<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicInternetGatewayReadShape from \Telnyx\PublicInternetGateways\PublicInternetGatewayRead
 *
 * @phpstan-type PublicInternetGatewayNewResponseShape = array{
 *   data?: null|PublicInternetGatewayRead|PublicInternetGatewayReadShape
 * }
 */
final class PublicInternetGatewayNewResponse implements BaseModel
{
    /** @use SdkModel<PublicInternetGatewayNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PublicInternetGatewayRead $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PublicInternetGatewayRead|PublicInternetGatewayReadShape|null $data
     */
    public static function with(
        PublicInternetGatewayRead|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PublicInternetGatewayRead|PublicInternetGatewayReadShape $data
     */
    public function withData(PublicInternetGatewayRead|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
