<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams\Body;

/**
 * Create a new Public Internet Gateway.
 *
 * @see Telnyx\Services\PublicInternetGatewaysService::create()
 *
 * @phpstan-import-type BodyShape from \Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams\Body
 *
 * @phpstan-type PublicInternetGatewayCreateParamsShape = array{
 *   body: Body|BodyShape
 * }
 */
final class PublicInternetGatewayCreateParams implements BaseModel
{
    /** @use SdkModel<PublicInternetGatewayCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Body $body;

    /**
     * `new PublicInternetGatewayCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicInternetGatewayCreateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicInternetGatewayCreateParams)->withBody(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Body|BodyShape $body
     */
    public static function with(Body|array $body): self
    {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * @param Body|BodyShape $body
     */
    public function withBody(Body|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
