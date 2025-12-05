<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ReplacedLinkClickWebhookEvent\Data;

/**
 * @phpstan-type ReplacedLinkClickWebhookEventShape = array{data?: Data|null}
 */
final class ReplacedLinkClickWebhookEvent implements BaseModel
{
    /** @use SdkModel<ReplacedLinkClickWebhookEventShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   message_id?: string|null,
     *   record_type?: string|null,
     *   time_clicked?: \DateTimeInterface|null,
     *   to?: string|null,
     *   url?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   message_id?: string|null,
     *   record_type?: string|null,
     *   time_clicked?: \DateTimeInterface|null,
     *   to?: string|null,
     *   url?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
