<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
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

    #[Optional]
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
     *   messageID?: string|null,
     *   recordType?: string|null,
     *   timeClicked?: \DateTimeInterface|null,
     *   to?: string|null,
     *   url?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   messageID?: string|null,
     *   recordType?: string|null,
     *   timeClicked?: \DateTimeInterface|null,
     *   to?: string|null,
     *   url?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
