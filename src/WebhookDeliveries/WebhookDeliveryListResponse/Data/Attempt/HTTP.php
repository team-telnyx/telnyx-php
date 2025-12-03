<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt\HTTP\Request;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt\HTTP\Response;

/**
 * HTTP request and response information.
 *
 * @phpstan-type HTTPShape = array{
 *   request?: Request|null, response?: Response|null
 * }
 */
final class HTTP implements BaseModel
{
    /** @use SdkModel<HTTPShape> */
    use SdkModel;

    /**
     * Request details.
     */
    #[Api(optional: true)]
    public ?Request $request;

    /**
     * Response details, optional.
     */
    #[Api(nullable: true, optional: true)]
    public ?Response $response;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?Request $request = null,
        ?Response $response = null
    ): self {
        $obj = new self;

        null !== $request && $obj->request = $request;
        null !== $response && $obj->response = $response;

        return $obj;
    }

    /**
     * Request details.
     */
    public function withRequest(Request $request): self
    {
        $obj = clone $this;
        $obj->request = $request;

        return $obj;
    }

    /**
     * Response details, optional.
     */
    public function withResponse(?Response $response): self
    {
        $obj = clone $this;
        $obj->response = $response;

        return $obj;
    }
}
