<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt\HTTP;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\ListOf;

/**
 * Request details.
 *
 * @phpstan-type RequestShape = array{
 *   headers?: list<list<string>>|null, url?: string|null
 * }
 */
final class Request implements BaseModel
{
    /** @use SdkModel<RequestShape> */
    use SdkModel;

    /**
     * List of headers, limited to 10kB.
     *
     * @var list<list<string>>|null $headers
     */
    #[Optional(list: new ListOf('string'))]
    public ?array $headers;

    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<list<string>> $headers
     */
    public static function with(?array $headers = null, ?string $url = null): self
    {
        $obj = new self;

        null !== $headers && $obj['headers'] = $headers;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    /**
     * List of headers, limited to 10kB.
     *
     * @param list<list<string>> $headers
     */
    public function withHeaders(array $headers): self
    {
        $obj = clone $this;
        $obj['headers'] = $headers;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
