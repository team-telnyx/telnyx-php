<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\FaxFailedWebhookEvent\Data;
use Telnyx\Webhooks\FaxFailedWebhookEvent\Meta;

/**
 * @phpstan-import-type DataShape from \Telnyx\Webhooks\FaxFailedWebhookEvent\Data
 * @phpstan-import-type MetaShape from \Telnyx\Webhooks\FaxFailedWebhookEvent\Meta
 *
 * @phpstan-type FaxFailedWebhookEventShape = array{
 *   data?: null|Data|DataShape, meta?: null|Meta|MetaShape
 * }
 */
final class FaxFailedWebhookEvent implements BaseModel
{
    /** @use SdkModel<FaxFailedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    /**
     * Metadata about the webhook delivery.
     */
    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     * @param Meta|MetaShape|null $meta
     */
    public static function with(
        Data|array|null $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Metadata about the webhook delivery.
     *
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
