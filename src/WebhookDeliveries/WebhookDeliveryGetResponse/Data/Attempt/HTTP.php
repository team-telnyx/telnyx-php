<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP\Request;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP\Response;

/**
 * HTTP request and response information.
 *
 * @phpstan-import-type RequestShape from \Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP\Request
 * @phpstan-import-type ResponseShape from \Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP\Response
 *
 * @phpstan-type HTTPShape = array{
 *   request?: null|Request|RequestShape, response?: null|Response|ResponseShape
 * }
 */
final class HTTP implements BaseModel
{
    /** @use SdkModel<HTTPShape> */
    use SdkModel;

    /**
     * Request details.
     */
    #[Optional]
    public ?Request $request;

    /**
     * Response details, optional.
     */
    #[Optional]
    public ?Response $response;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RequestShape $request
     * @param ResponseShape $response
     */
    public static function with(
        Request|array|null $request = null,
        Response|array|null $response = null
    ): self {
        $self = new self;

        null !== $request && $self['request'] = $request;
        null !== $response && $self['response'] = $response;

        return $self;
    }

    /**
     * Request details.
     *
     * @param RequestShape $request
     */
    public function withRequest(Request|array $request): self
    {
        $self = clone $this;
        $self['request'] = $request;

        return $self;
    }

    /**
     * Response details, optional.
     *
     * @param ResponseShape $response
     */
    public function withResponse(Response|array $response): self
    {
        $self = clone $this;
        $self['response'] = $response;

        return $self;
    }
}
