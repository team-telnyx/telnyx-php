<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt;

use Telnyx\Core\Attributes\Optional;
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
    #[Optional]
    public ?Request $request;

    /**
     * Response details, optional.
     */
    #[Optional(nullable: true)]
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
     * @param Request|array{
     *   headers?: list<list<string>>|null, url?: string|null
     * } $request
     * @param Response|array{
     *   body?: string|null, headers?: list<list<string>>|null, status?: int|null
     * }|null $response
     */
    public static function with(
        Request|array|null $request = null,
        Response|array|null $response = null
    ): self {
        $obj = new self;

        null !== $request && $obj['request'] = $request;
        null !== $response && $obj['response'] = $response;

        return $obj;
    }

    /**
     * Request details.
     *
     * @param Request|array{
     *   headers?: list<list<string>>|null, url?: string|null
     * } $request
     */
    public function withRequest(Request|array $request): self
    {
        $obj = clone $this;
        $obj['request'] = $request;

        return $obj;
    }

    /**
     * Response details, optional.
     *
     * @param Response|array{
     *   body?: string|null, headers?: list<list<string>>|null, status?: int|null
     * }|null $response
     */
    public function withResponse(Response|array|null $response): self
    {
        $obj = clone $this;
        $obj['response'] = $response;

        return $obj;
    }
}
