<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\ListOf;

/**
 * Response details, optional.
 *
 * @phpstan-type ResponseShape = array{
 *   body?: string|null, headers?: list<list<string>>|null, status?: int|null
 * }
 */
final class Response implements BaseModel
{
    /** @use SdkModel<ResponseShape> */
    use SdkModel;

    /**
     * Raw response body, limited to 10kB.
     */
    #[Api(optional: true)]
    public ?string $body;

    /**
     * List of headers, limited to 10kB.
     *
     * @var list<list<string>>|null $headers
     */
    #[Api(list: new ListOf('string'), optional: true)]
    public ?array $headers;

    #[Api(optional: true)]
    public ?int $status;

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
    public static function with(
        ?string $body = null,
        ?array $headers = null,
        ?int $status = null
    ): self {
        $obj = new self;

        null !== $body && $obj['body'] = $body;
        null !== $headers && $obj['headers'] = $headers;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Raw response body, limited to 10kB.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

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

    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
